<!DOCTYPE html>
<html lang="<?php echo $this->lang->lang(); ?>">
    <head>
	<meta charset="UTF-8" />
        <title><?php _e($title); ?></title>
        <meta name="description" content="<?php _e($description); ?>" />
	<meta name="robots" content="all" />
        <?php foreach($admin_css as $href) { ?>
            <link href="<?php echo base_url("public/css/$href"); ?>" rel="stylesheet" >
        <?php } ?>
        <?php foreach($admin_js as $src) { ?>
            <script src="<?php echo $src; ?>"></script>
        <?php } ?>          
    </head>
    <body>
        <header>
            <?php $this->load->view("{$admin_header}") ?>
        </header>
        <aside>
            <?php $this->load->view("{$module}/{$admin_sidebar}") ?>
        </aside>
        <section>
            <?php $this->load->view("{$module}/{$view}") ?>
        </section>
        <footer>
            <?php $this->load->view("{$admin_footer}") ?>
        </footer>
    </body>
</html>