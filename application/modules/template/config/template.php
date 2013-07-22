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
        '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
    ),
    
    //Styles for Admin Template
    'admin_css' => array(
        'admin-global.css',
        'admin-structure.css',
        'admin-style.css'
    ),
    
    //JavaScript for Main template
    'home_js' => array(
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        'jquery ui' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
     ),
    
    //Just Meta Tag Description
    'title' => 'Zkeleton Codeigniter',
    'description' => 'Zkeleton is a CI framework with HMVC, i18n, template management system, jQuery and jQuery UI...',   
    
);