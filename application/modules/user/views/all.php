<h1>All Users</h1>
    
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID: </th>
            <th>User name: </th>
            <th>Password: </th>
            <th>Email adress: </th>
            <th>Control: </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($all->result() as $object) { ?>
        <tr>
            <td><?php echo $object->id; ?></td>
            <td><?php echo $object->username; ?></td>
            <td><?php echo $object->password; ?></td>
            <td><?php echo $object->email_address; ?></td>
            <td class="control_panel">
                <ul>
                    <li>
                        <a href="<?php echo site_url('admin/user/edit/'. $object->id); ?>" title="Edit"><?php _e("Edit"); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/user/delete/'. $object->id); ?>" title="Delete"><?php _e("Delete"); ?></a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>