<ul>
    <li><a href="<?php echo site_url("/object/all"); ?>">All</a></li>
    <li><a href="<?php echo site_url("/object/add"); ?>">Add</a></li>    
</ul>
<h1><?php echo ucwords($action); ?></h1>
<?php echo validation_errors('<div id="validation-errors">', '</div>') ?>
<form action="<?php echo site_url("/object/insert"); ?>" method="post">
    <p><label for="name">Name: </label> <input type="text" id="name" name="name" value="<?php echo set_value('name', $name); ?>" /></p>
    <p><label for="slug">Slug: </label> <input type="text" id="slug" name="slug" value="<?php echo set_value('slug', $slug); ?>" /></p>
    <p><label for="edad">Edad: </label> <input type="text" id="edad" name="edad" value="<?php echo set_value('edad', $edad); ?>" /></p>
    <p>
        <input type="hidden" name="action" value="<?php echo set_value('action', $action); ?>" />
        <input type="hidden" name="id" value="<?php echo set_value('id',$id); ?>" />
    </p>
    <p><input type="submit" name="submit" value="<?php echo ucwords($action); ?>" /></p>
</form>