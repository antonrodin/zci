<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['template'] = array(
    
    //Just Admin Template Parts
    'admin_header' => 'admin/header',
    'admin_footer' => 'admin/footer',
    'admin_sidebar' => 'admin/sidebar',
    
    //Just Home Template Parts
    'main_header' => 'main/header',
    'main_footer' => 'main/footer',
    'main_sidebar' => 'main/sidebar',
    
    //Admin Top Menu
    'admin_menu' => array(
        'Config' => 'config',
        'User' => 'user',
    ),
    
    //JavaScript for Admin Template
    'admin_js' => array(
        base_url('public/js/modernizr-2.6.1-respond-1.1.0.min'),
        '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
    ),
    
    //Styles for Admin Template
    'admin_css' => array(
        'normalize.min.css',
        'admin.css'
    ),
    
    //JavaScript for Main template
    'home_js' => array(
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        'jquery ui' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
     ),
    
    //Styles for Admin Template
    'main_css' => array(
        'normalize.min.css',
        'main.css'
    ),
    
    //Just Meta Tag Description
    'title' => 'Zkeleton Codeigniter',
    'description' => 'Zkeleton is a CI framework with HMVC, i18n, template management system, jQuery and jQuery UI...',   
    
);