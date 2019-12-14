<?php 
    function convertMonth($date){
        $arrayDate = explode('-', $date);
        $month = $arrayDate[1];
        $monthConvert = '';
        switch($month) {
            case "1" : 
                $monthConvert =  "Jan";
                break;
            case "2" : 
                $monthConvert =  "Feb";
                break;
            case "3" : 
                $monthConvert =  "Mar";
                break;
            case "4" : 
                $monthConvert =  "Apr";
                break;
            case "5" : 
                $monthConvert =  "May";
                break;
            case "6" : 
                $monthConvert =  "Jun";
                break;
            case "7" : 
                $monthConvert =  "Jul";
                break;  
            case "8" : 
                $monthConvert =  "Aug";
                break;
            case "9" : 
                $monthConvert =  "Sep";
                break;
            case "10" : 
                $monthConvert =  "Oct";
                break;
            case "11" : 
                $monthConvert =  "Nov";
                break;
            default : 
                $monthConvert = "Dec";
        }
        return "$monthConvert". " "."$arrayDate[2]".","." $arrayDate[0]";
    }
?>


