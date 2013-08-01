<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Anton Zekeriev Rodin">
    <title><?php echo $admin_meta_title; ?></title>
    <meta name="description" content="<?php echo $admin_meta_description; ?>" >

    <!-- Bootstrap core CSS -->
    <?php foreach($admin_css as $href) { ?>
            <link href="<?php echo base_url("public/css/$href"); ?>" rel="stylesheet" >
    <?php } ?>
  </head>
  <body>

     <?php $this->load->view("{$admin_header}") ?>
    
      <div class="container margin-top-60">
          <div class="row">
            <div class="span12">
                <?php $this->load->view("{$admin_sidebar}") ?>
            </div>
        </div>
      </div>
      
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php echo $this->session->flashdata('error'); ?>   
            </div>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php $this->load->view("{$module}/{$view}") ?>
            </div>
        </div>
    </div>

    <div id="footer" class="visible-lg">
        <?php $this->load->view("{$admin_footer}") ?>
    </div>

    <!-- Javascript in the bottom for faster loading -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <?php foreach($admin_js as $src) { ?>
        <script src="<?php echo $src; ?>" ></script>
    <?php } ?>
  </body>
</html>