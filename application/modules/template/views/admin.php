<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang(); ?>"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php _e($title); ?></title>
        <meta name="description" content="<?php _e($description); ?>" >
        <meta name="viewport" content="width=device-width">

        <?php foreach($admin_css as $href) { ?>
            <link href="<?php echo base_url("public/css/$href"); ?>" rel="stylesheet" >
        <?php } ?>
        <?php foreach($admin_js as $src) { ?>
            <script src="<?php echo $src; ?>"></script>
        <?php } ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
<div class="header-container">
        <header class="wrapper clearfix">
            <?php $this->load->view("{$admin_header}") ?>
        </header>
</div>
        
<div class="main-container">
    <div class="main wrapper clearfix">
        <aside>
            <?php $this->load->view("{$module}/{$admin_sidebar}") ?>
        </aside>
        
        <article>
            <?php $this->load->view("{$module}/{$view}") ?>
        </article>    
    </div>
</div>

    <div class="footer-container">
        <footer class="wrapper">
                <?php $this->load->view("{$admin_footer}") ?>
       </footer>
    </div>

</body></html>