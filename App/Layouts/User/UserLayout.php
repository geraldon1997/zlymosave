<?php
namespace App\Layouts\User;

class UserLayout
{
    public static function startcontent()
    {
        session_start();
        include_once 'headmeta.php';
        include_once 'header.php';
        include_once 'sidebar.php';
    }

    public static function endcontent()
    {
        include_once 'footmeta.php';
    }
}
