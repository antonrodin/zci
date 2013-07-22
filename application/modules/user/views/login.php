    <h1><?php echo _e("Login"); ?>: </h1>
    <div id="login-form">
        <form action="<?php echo base_url("admin/user/sign_in"); ?>" method="post">
            <p><label> <?php echo _e("User"); ?> </label><input type="text" id="username" name="username" /></p>
            <p><label> <?php echo _e("Password"); ?> </label><input type="password" id="password" name="password" /></p>
            <p><button type="submit" id="submit"><?php echo _e("Login"); ?></button></p>
        </form>
    </div>
    <div class="error"><?php echo $this->session->flashdata('error'); ?></div>