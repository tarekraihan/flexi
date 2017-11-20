<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pr'))
{
    function pr($var)
    {
        echo '<pre>';
        if(is_array($var) || is_object($var)) {
            print_r($var);
        } else {
            var_dump($var);
        }
        echo '</pre>';
    }
}

if ( ! function_exists('getBrowserName'))
{
    function getBrowserName(){
        $agent = null;

        if ( empty($agent) ) {
            $agent = $_SERVER['HTTP_USER_AGENT'];

            if ( stripos($agent, 'Firefox') !== false ) {
                $agent = 'firefox';
            } elseif ( stripos($agent, 'MSIE') !== false ) {
                $agent = 'ie';
            } elseif ( stripos($agent, 'iPad') !== false ) {
                $agent = 'ipad';
            } elseif ( stripos($agent, 'Android') !== false ) {
                $agent = 'android';
            } elseif ( stripos($agent, 'Chrome') !== false ) {
                $agent = 'chrome';
            } elseif ( stripos($agent, 'Safari') !== false ) {
                $agent = 'safari';
            } elseif ( stripos($agent, 'AIR') !== false ) {
                $agent = 'air';
            } elseif ( stripos($agent, 'Fluid') !== false ) {
                $agent = 'fluid';
            }
        }

        return $agent;
    }
}