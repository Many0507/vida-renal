<?php
namespace App\Helpers;

function getTimeAgo ($date) {
    $newDate = explode(" ", $date);

    $time = date("g:i a", strtotime($newDate[1]));
    $finalDate = $newDate[0] . ' ' . $time;

    $timestamp = strtotime($finalDate);
                
    $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();

    if($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            $date = $diff . " " . $strTime[$i] . "(s) atras";
            array_push($GLOBALS['blogsTimeAgo'], $date); 
    }
}