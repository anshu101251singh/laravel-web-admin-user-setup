<?php
use Carbon\Carbon;

if (!function_exists('clean_single_input')) {
    function clean_single_input($input)
    {
        // Remove HTML tags
        $input = strip_tags($input);

        // Convert special characters to HTML entities to prevent XSS attacks
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        // Optionally, trim spaces from the beginning and end
        $input = trim($input);

        return $input;
    }
}

if (!function_exists('format_date')) {
    function format_date($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}

if(!function_exists('displayInIST')){
    function displayInIST($date) {
        return Carbon::parse($date)->setTimezone('Asia/Kolkata')->format('d-m-Y h:i:s A');
    }
}

// if (!function_exists('update_visitors_count')){
//     function update_visitors_count(){
        
//     }
// }