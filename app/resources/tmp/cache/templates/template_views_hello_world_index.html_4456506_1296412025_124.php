<?php foreach($users as $user): ?>
    <article>
        <h1><?php echo $h($user->username); ?></h1>
    </article>
<?php endforeach; ?>
