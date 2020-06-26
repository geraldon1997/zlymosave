<?php
namespace App\Controllers;

use App\Models\User as UserModel;
use App\Controllers\Activity;

class User extends UserModel
{
    public $logerr;
    public $data;
    public $activity;
    public $date;
    public $time;
    public $usernameLog;

    public function __construct($data)
    {
        $this->data = $data;
        $this->activity = new Activity;
        $this->date  = Date('d-m-Y');
        $this->time = Date('h:i:s');
    }

    public function cleanInput()
    {
        foreach ($this->data as $key => $value) {
            $data = trim(htmlspecialchars(stripslashes(strip_tags($this->data[$key]))));
            $this->data[$key] = $data;
        }
    }

    public function checkInput()
    {
        foreach ($this->data as $key => $value) {
            if ($this->data[$key] === '' || $this->data[$key] === null || empty($this->data[$key])) {
                $msg = "$key should not be empty";
                $this->errmsg[$key] = $msg;
                unset($this->data[$key]);
            } else {
                $this->data[$key] = $value;
            }
        }
    }

    public function validateEmail()
    {
        $mail = $this->data['email'];
        $email = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if ($email) {
            $this->data['email'] = $email;
        } else {
            $msg = $this->data['email']." is not a valid email address";
            $this->errmsg['email'] = $msg;
            unset($this->data['email']);
        }
    }

    public function validatePhone()
    {
        $phone = $this->data['phone'];
        $validPhone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if ($validPhone) {
            $this->data['phone'] = $validPhone;
        } else {
            $msg = $phone." is not valid";
            $this->errmsg['phone'] = $msg;
            unset($this->data['phone']);
        }
    }

    public function registerController($ref)
    {
        $result = $this->cleanInput();
        $result = $this->checkInput();
        $result = $this->validateEmail();
        $result = $this->validatePhone();
        $result = $this->createUsersTable();
        $result = $this->hashpwd();
        $result = $this->register($this->data, $ref);
        

        if ($result) {
             $this->sendConfirmationMail();
            $this->activity->addNewActivity($this->data['username'], "registered on the platform on $this->date at $this->time");
            return true;
        } else {
            return false;
        }
    }

    public function loginController()
    {
        $this->cleanInput();
        $this->checkInput();
        $this->hashpwd();
        $result = $this->login($this->data['username'], $this->data['password']);
        
        if (!$result) {
            $this->logerr = 'incorrect username or password';
        } elseif (count($result) > 0) {
            foreach ($result as $key => $value) {
                if ($value['status'] == false && $value['isDeleted'] == false) {
                    $this->logerr = 'Please confirm your email before you can access your dashboard';
                } elseif ($value['status'] == false && $value['isDeleted'] == true) {
                    $this->logerr = 'you were barred for providing fake information';
                } elseif ($value['status'] == true && $value['isDeleted'] == true) {
                    $this->logerr = 'you were barred from this platform, please contact support';
                } elseif ($value['status'] == true && $value['isDeleted'] == false) {
                    session_start();
                    header('location: users');
                    $_SESSION['username'] = $this->data['username'];
                    $this->activity->addNewActivity($this->data['username'], "logged into the platform on $this->date at $this->time");
                }
            }
        }
    }

    public function logoutController()
    {
        $this->usernameLog = $_SESSION['username'];
        if (isset($this->data)) {
            $this->logout();
            $this->activity->addNewActivity($this->usernameLog, "logged out of the platform on $this->date at $this->time");
        }
    }

    public function changePasswordController()
    {
        $this->usernameLog = $_SESSION['username'];
        $this->hashpwd();
        $result = $this->changePassword($this->data['oldpassword'], $this->data['password']);
        $this->activity->addNewActivity($this->usernameLog, "changed password on $this->date at $this->time");
    }

    public function updateProfileController()
    {
        $this->usernameLog = $_SESSION['username'];
        $this->cleanInput();
        $this->checkInput();
        $this->validateEmail();
        $this->validatePhone();

        $fullname = $this->data['fullname'];
        $email = $this->data['email'];
        $phone = $this->data['phone'];
        $dob = $this->data['dob'];
        $zip = $this->data['zip'];
        $city = $this->data['city'];
        $country = $this->data['country'];

        $this->updateProfile($fullname, $email, $phone, $dob, $zip, $city, $country);
        $this->activity->addNewActivity($this->usernameLog, "updated profile on $this->date at $this->time");
    }

    public function hashpwd()
    {
        if (isset($this->data['password']) && !isset($this->data['oldpassword'])) {
            $this->data['password'] = md5($this->data['password']);
        } elseif (isset($this->data['oldpassword']) && isset($this->data['password'])) {
            $this->data['oldpassword'] = md5($this->data['oldpassword']);
            $this->data['password'] = md5($this->data['password']);
        }
    }

    public function sendConfirmationMail()
    {
        $username = $this->data['username'];
        $to = $this->data['email'];
        $from = "support@zlymosave.com";
        $subject = "Email Verification From Zlymosave";
        $message = "please click <a href='http://zlymosave.com/confirmemail.php?username=$username'>here</a> to confirm your email";
        $headers = "From: Support <$from>\r\n";
        $headers .= "MIME-Version: 1.0 \n";
        $headers .= "Content-Type: text/html; charset=UTF-8 \n";
        
        $result = mail($to, $subject, $message, $headers);
    }

    public function confirmUserEmailController()
    {
        $this->confirmUserEmail($this->data['username']);
        $this->activity->addNewActivity($this->data['username'], "confirmed email on $this->date at $this->time");
    }

    public function forgotPasswordController()
    {
        $this->cleanInput();
        $this->checkInput();
        $result = $this->forgotPassword($this->data['username']);

        if (count($result) > 0) {
            foreach ($result as $key => $value) {
                $user = $value['username'];
                $email = $value['email'];
                $to = $email;
                $subject = "Password Reset";
                $message = "click on the following link below to reset your password <br> <a href='http://zlymosave.com/reset.php?user=$user'>Reset</a>";
                $headers = 'From : Support <support@zlymosave.com>'."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                mail($to, $subject, $message, $headers);
                $this->logerr = "If the username you filled exists, you will receive a password rest link in your email";
            }
        } else {
            $this->logerr = "If the username you filled exists, you will receive a password rest link in your email";
        }
    }

    public function resetPasswordController()
    {
         $this->cleanInput();
         $this->checkInput();
         $this->hashpwd();
         $result = $this->resetPassword($this->data['user'], $this->data['password']);
        if ($result) {
            $this->logerr = 'password reset was successful, you can now login';
            $this->activity->addNewActivity($this->data['user'], "reset password on $this->date at $this->time");
        } else {
            $this->logerr = 'password reset was not successful';
        }
    }
}
