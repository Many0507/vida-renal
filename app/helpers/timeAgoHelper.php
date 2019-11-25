<?php

namespace App\Helpers;

class TimeAgoHelper
{
    public $timeAgo;

    public function __construct($timestamp)
    {
        date_default_timezone_set('America/Mexico_City');

        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;

        $seconds = $time_difference;
        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);
        $weeks = round($seconds / 604800);
        $months = round($seconds / 2629440);
        $years = round($seconds / 31553280);

        if ($seconds <= 60) {
            $this->timeAgo = "Justo ahora";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                $this->timeAgo = "Un minuto atrás";
            } else {
                $this->timeAgo = "$minutes minutos atrás";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                $this->timeAgo = "una hora atrás";
            } else {
                $this->timeAgo = "$hours horas atrás";
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                $this->timeAgo = "ayer";
            } else {
                $this->timeAgo = "$days dias atrás";
            }
        } else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                $this->timeAgo = "una semana atrás";
            } else {
                $this->timeAgo = "$weeks semanas atrás";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                $this->timeAgo = "un mes atrás";
            } else {
                $this->timeAgo = "$months meses atrás";
            }
        } else {
            if ($years == 1) {
                $this->timeAgo = "un año atrás";
            } else {
                $this->timeAgo = "$years años atrás";
            }
        }
    }
}
