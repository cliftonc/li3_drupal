<table>
<tr>
	<th>Title</th>
	<th>Delete</th>
</tr>
<?php foreach($examples as $example): ?>
    <tr>
        <td><?=$this->html->link($example->title,array('Example::view','id'=>$example->id)); ?></td>
	<td><?=$this->html->link('X',array('Example::delete','id'=>$example->id),array('title','Delete')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<a href="example/add">Add Example</a>
<hr/>
<small>
User:<?=$user?></br> 
Environment: <?=$env?></br> 
</small>

