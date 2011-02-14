<h1>Create a New User</h1>
<?php echo $this->form->create(); ?>
        <?php echo $this->form->field('username'); ?>
        <?php echo $this->form->field('password', array('type' => 'textarea')); ?>
        <?php echo $this->form->submit('Add User'); ?>
    <?php echo $this->form->end(); ?>
<?php if ($success): ?>
<p>Post Successfully Saved</p>
<?php endif; ?>
