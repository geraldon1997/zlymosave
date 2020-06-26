<?php
namespace App\Controllers;

use App\Models\Activity as AM;

class Activity extends AM
{
    public function addNewActivity($username, $activity)
    {
        $this->addActivity($username, $activity);
    }

    public function displayActivities()
    {
        foreach ($this->getActivities() as $key => $value) {
            echo "<tr>";
            echo "<td>".$value['username'].' '.$value['activity']."<td>";
            echo "</tr>";
        }
    }

    public function displayActivity()
    {
        foreach ($this->getActivity() as $key => $value) {
            echo "<tr>";
            echo "<td>".$value['username'].' '.$value['activity']."<td>";
            echo "</tr>";
        }
    }
}
