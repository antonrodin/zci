<?php $object = array_pop($object->result()); ?>
<h1>Module#Example#Show</h>
<h2><?php echo $object->name; ?></h2>
<ul>
    <li>Slug: <?php echo $object->id; ?></li>
    <li>Id: <?php echo $object->slug; ?></li>
    <li>Age: <?php echo $object->age; ?></li>
</ul>