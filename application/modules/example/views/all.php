<ul>
    <li><a href="<?php echo site_url("/object/all"); ?>">All</a></li>
    <li><a href="<?php echo site_url("/object/add"); ?>">Add</a></li>    
</ul>
<h1>Show All</h1>

<ul>
<?php foreach($all->result() as $object) { ?>
    <li>
        <?php echo $object->id; ?> - <?php echo $object->slug; ?> :: 
        <a href="<?php echo site_url("/object/show/{$object->id}"); ?>">Show</a> ::
        <a href="<?php echo site_url("/object/edit/{$object->id}"); ?>">Edit</a> ::
        <a href="<?php echo site_url("/object/delete/{$object->id}"); ?>">Delete</a> ::
    </li>
<?php } ?>
</ul>