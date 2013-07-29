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
        'User' => 'user/all',
    ),
    
    //JavaScript for Admin Template
    'admin_js' => array(
        base_url('public/js/bootstrap.min.js')
    ),
    
    //Styles for Admin Template
    'admin_css' => array(
        'bootstrap.min.css',
        'admin.css'
    ),
    
    //JavaScript for Main template
    'home_js' => array(
        base_url('public/js/bootstrap.min.js')
    ),
    
    //Styles for Admin Template
    'main_css' => array(
        'bootstrap.min.css',
        'main.css'
    ),
    
    //Just Meta Tag Description
    'title' => 'Zkeleton Codeigniter',
    'description' => 'Zkeleton is a CI framework with HMVC, i18n, template management system, jQuery and Twitter Bootstrap',   
    
);