<?php echo $this->Form->create('Schedule', array(
    'inputDefaults' => array(
        'class' => 'form-control',
    )
)); ?>
    <?php echo $this->Form->Input('place'); ?>
<?php echo $this->Form->end(); ?>
