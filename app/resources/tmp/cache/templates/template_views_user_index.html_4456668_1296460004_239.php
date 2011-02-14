<table>
<tr><th>User</th></tr>
<?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $this->html->link($user->username,'./lithium/user/view/'.$user->id); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<a href="user/add">Add User</a>
