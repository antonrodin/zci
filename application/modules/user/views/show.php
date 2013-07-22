<?php
    $object = array_pop($object->result());
    $inserted = new DateTime($object->inserted_date);
    $updated = new DateTime($object->updated_date);
?>
<h1><?php echo "#{$object->id}"; ?> <?php echo $object->username; ?></h1>
<ul>
    <li>Slug: <?php echo $object->email_address; ?></li>
    <li>Inserted: <?php echo $inserted->format("Y/m/d H:i:s"); ?></li>
    <li>Updated: <?php echo $updated->format("Y/m/d H:i:s"); ?></li>
</ul>