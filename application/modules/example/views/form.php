<form action="<?php echo site_url("admin/example/insert"); ?>" method="post">
    <fieldset>
        <legend><?php echo ucwords($action); ?></legend>
    <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" placeholder="Enter your Name" type="text" id="name" name="name" value="<?php if (!isset($name)) { echo set_value('name');} else { echo $name; } ?>" />
    </div>
    <div class="form-group">
        <label for="slug">Slug: </label>
        <input class="form-control" placeholder="Enter Slug" type="text" id="slug" name="slug" value="<?php if (!isset($slug)) { set_value('slug'); } else { echo $slug; } ?>" /></div>
    <div class="form-group">
        <label for="age">Age </label>
        <input class="form-control" placeholder="Enter your age" type="text" id="age" name="age" value="<?php if (!isset($age)) { set_value('age'); } else { echo $age; } ?>" /></div>
    <div class="form-group">
        <input type="hidden" name="action" value="<?php echo set_value('action', $action); ?>" />
        <input type="hidden" name="id" value="<?php echo set_value('id',$id); ?>" />
        <button type="submit" class="btn btn-default"><?php echo ucwords($action); ?></button>
    </div>
    </fieldset>
</form>