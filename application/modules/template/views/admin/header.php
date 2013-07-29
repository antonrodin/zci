    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://www.zci.es">ZCI</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a class="active" href="<?php echo base_url(); ?>">Home</a></li>
            <?php foreach($admin_menu as $anchor => $link) { ?>
                <li><a href="<?php echo base_url("admin/$link"); ?>"><?php echo $anchor; ?></a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>