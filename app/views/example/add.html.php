<h1>Create a New Example</h1>
<?=$this->form->create(); ?>
        <?=$this->form->field('title');?>
        <?=$this->form->field('content',array('type'=>'textarea'));?>
        <?=$this->form->submit('Add Example'); ?>
<?=$this->form->end(); ?>

