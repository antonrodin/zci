<?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
<form action="<?php echo site_url("/admin/user/insert"); ?>" method="post">
    <fieldset>
        <legend><?php echo ucwords($action); ?></legend>
        <div class="form-group">
                <label for="username">Username: </label>
                <input class="form-control" placeholder="User name" type="text" id="username" name="username" value="<?php if (isset($username)) { echo set_value('username', $username); } ?>" />
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input class="form-control" placeholder="Password" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password: </label>
            <input class="form-control" placeholder="Confirm password" type="password" id="confirm_password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" />
        </div>
        <div class="form-group">
            <label for="email_address">Email: </label>
            <input class="form-control" placeholder="Valid Email" type="text" id="email_address" name="email_address" value="<?php if(isset($email_address)) { echo set_value('email_address', $email_address); } ?>" />
        </div>
        
        <input type="hidden" name="action" value="<?php echo set_value('action', $action); ?>" />
        <input type="hidden" name="id" value="<?php echo set_value('id',$id); ?>" />
    
        <button type="submit" class="btn btn-default"><?php echo ucwords($action); ?></button>
    </fieldset>
</form>
<div class="margin-top-60">
    <p>&nbsp;</p>
</div>