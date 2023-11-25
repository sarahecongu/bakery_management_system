<?php

class Helper{

    /**
     * To format the date
     * @param string $date
     * @return string
     */
    public static function date($date){

        $date = new DateTime($date, new DateTimeZone("Africa/Kampala"));

        return  $date->format("d-m-Y");
    }

    public static function time($time){
        $time = new DateTime($time, new DateTimeZone("Africa/Kampala"));

        return $time->format("H:i:s");
    }

    /**
     * Generating and storing statuses to session
     * @param $status
     * @param $message
     * @return void
     */
    public static function statusMessage($status, $message){
    
        // $status = strtolower($status);

        switch ($status) {
            case 'success':
                $_SESSION['status'] = $status;
                break;

            case 'error':
                $_SESSION['status'] = 'danger';
                break;

        }

        $_SESSION['message'] = $message;

        return null;
    }

    public static function formatNumber($number){
        return number_format($number,0,'.',',');
    }

}