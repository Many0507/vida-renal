<?php
namespace App\Helpers;

class TimeAgoHelper {
    public $timeAgo;

    public function __construct ($timestamp) {
        date_default_timezone_set('America/Mexico_City');

        $time_ago = strtotime($timestamp);  
        $current_time = time();  
        $time_difference = $current_time - $time_ago;  
        
        $seconds = $time_difference;  
        $minutes = round($seconds / 60 );           
        $hours = round($seconds / 3600);            
        $days = round($seconds / 86400);         
        $weeks = round($seconds / 604800);         
        $months = round($seconds / 2629440);     
        $years = round($seconds / 31553280);

        if ($seconds <= 60) {  
            $this->timeAgo = "Just Now";  
        }  
        else if($minutes <=60) {  
            if($minutes==1) {  
                $this->timeAgo = "one minute ago";  
            }  
            else {  
                $this->timeAgo = "$minutes minutes ago";  
            }  
        }  
        else if($hours <=24) {  
            if($hours==1) {  
                $this->timeAgo = "an hour ago";  
            }  
            else {  
                $this->timeAgo = "$hours hrs ago";  
            }  
        }  
        else if($days <= 7) {  
            if($days==1) {  
                $this->timeAgo = "yesterday";  
            }  
            else {  
                $this->timeAgo = "$days days ago";  
            }  
        }  
        else if($weeks <= 4.3) {  
            if($weeks==1) {  
                $this->timeAgo = "a week ago";  
            }  
            else {  
                $this->timeAgo = "$weeks weeks ago";  
            }  
        }  
        else if($months <=12) {  
            if($months==1) {  
                $this->timeAgo = "a month ago";  
            }  
            else {  
                $this->timeAgo = "$months months ago";  
            }  
        }  
        else {  
            if($years==1) {  
                $this->timeAgo = "one year ago";  
            }  
            else {  
                $this->timeAgo = "$years years ago";  
            }  
        }
    }
}
