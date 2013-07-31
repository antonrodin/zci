
        <form action="<?php echo base_url("admin/user/sign_in"); ?>" method="post" class="form-horizontal">
            <legend><?php echo _e("Login"); ?>:</legend>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="username"> <?php echo _e("User"); ?>: </label>
                <div class="col-lg-4">
                    <input class="form-control" placeholder="User Name" type="text" id="username" name="username" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="password"> <?php echo _e("Password"); ?>: </label>
                <div class="col-lg-4">
                    <input class="form-control" placeholder="Password" type="password" id="password" name="password" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 col-offset-2">
                    <button type="submit" id="submit" class="btn btn-default"><?php echo _e("Login"); ?></button>
                </div>
            </div>
        </form>