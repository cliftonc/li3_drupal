<h1>Create a New User</h1>
<?=$this->form->create(); ?>
        <?=$this->form->field('username');?>
        <?=$this->form->field('password');?>
        <?=$this->form->submit('Add User'); ?>
<?=$this->form->end(); ?>

