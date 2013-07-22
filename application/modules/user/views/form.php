<h1><?php echo ucwords($action); ?></h1>
<div class="error"><?php echo validation_errors('<p>', '</p>') ?></div>
<form action="<?php echo site_url("/admin/user/insert"); ?>" method="post">
    <p class="small"><label for="username">Username: </label> <input type="text" id="username" name="username" value="<?php echo set_value('username', $username); ?>" /></p>
    <p class="small"><label for="password">Password: </label> <input type="password" id="password" name="password" value="<?php echo set_value('password', $password); ?>" /></p>
    <p class="small"><label for="confirm_password">Confirm Password: </label> <input type="password" id="confirm_password" name="confirm_password" value="<?php echo set_value('confirm_password', $confirm_password); ?>" /></p>
    <p class="small"><label for="email_address">Email: </label> <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address', $email_address); ?>" /></p>
    <p>
        <input type="hidden" name="action" value="<?php echo set_value('action', $action); ?>" />
        <input type="hidden" name="id" value="<?php echo set_value('id',$id); ?>" />
    </p>
    <p class="green"><button type="submit"><?php echo ucwords($action); ?></button></p>
</form>