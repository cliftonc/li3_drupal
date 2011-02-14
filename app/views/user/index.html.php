<table>
<tr>
	<th>User</th>
	<th>Password</th>
	<th>Delete</th>
</tr>
<?php foreach($users as $user): ?>
    <tr>
        <td><?=$this->html->link($user->username,array('User::view','id'=>$user->id)); ?></td>
        <td><?=$user->password ?></td>
	<td><?=$this->html->link('X',array('User::delete','id'=>$user->id),array('title','Delete')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<a href="user/add">Add User</a>
