<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Anton Zekeriev Rodin">
    <title><?php _e($title); ?></title>
    <meta name="description" content="<?php _e($description); ?>" >

    <!-- Bootstrap core CSS -->
    <?php foreach($admin_css as $href) { ?>
            <link href="<?php echo base_url("public/css/$href"); ?>" rel="stylesheet" >
    <?php } ?>
  </head>
  <body>

     <?php $this->load->view("{$admin_header}") ?>
        
    <div class="container margin-top-60">
        <div class="row">
            <div class="span4">
            <?php $this->load->view("{$module}/{$admin_sidebar}") ?>
        </div>

            <div class="span8">
                <?php $this->load->view("{$module}/{$view}") ?>
            </div>
    </div>
    </div>

    <div id="footer" class="visible-lg">
        <?php $this->load->view("{$admin_footer}") ?>
    </div>

    
  </body>
</html>