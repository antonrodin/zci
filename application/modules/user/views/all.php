<header>
    <h1>article header h1</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
</header>
<section>
<h2>article section h2</h2>
<table>
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
</section>
                    <footer>
                        <h3>article footer h3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
                    </footer>