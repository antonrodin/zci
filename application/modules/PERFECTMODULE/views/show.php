<?php
    $object = array_pop($object->result());
    $inserted = new DateTime($object->inserted_date);
    $updated = new DateTime($object->updated_date);
?>
<ul>
    <li><a href="<?php echo site_url("/object/all"); ?>">All</a></li>
    <li><a href="<?php echo site_url("/object/add"); ?>">Add</a></li>    
</ul>
<h1><?php echo "#{$object->id}"; ?> <?php echo $object->name; ?></h1>
<ul>
    <li>Slug: <?php echo $object->slug; ?></li>
    <li>Inserted: <?php echo $inserted->format("Y/m/d H:i:s"); ?></li>
    <li>Updated: <?php echo $updated->format("Y/m/d H:i:s"); ?></li>
</ul>