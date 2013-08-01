<h1>All Examples</h1>
    
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID: </th>
            <th>Slug: </th>
            <th>Name: </th>
            <th>Edad: </th>
            <th>Control: </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($all->result() as $object) { ?>
        <tr>
            <td><?php echo $object->id; ?></td>
            <td><?php echo $object->slug; ?></td>
            <td><?php echo $object->name; ?></td>
            <td><?php echo $object->edad; ?></td>
            <td class="control_panel">
                <ul>
                    <li>
                        <a href="<?php echo site_url('admin/example/edit/'. $object->id); ?>" title="Edit">Edit</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/example/delete/'. $object->id); ?>" title="Delete">Delete</a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>