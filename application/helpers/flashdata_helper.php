<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('error_flashdata')) {
    function error_flashdata($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('error', "<div class=\"alert alert-danger\">{$message}</div>");
    }
}

if (!function_exists('success_flashdata')) {
    function success_flashdata($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('error', "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>{$message}</div>");
    }
}