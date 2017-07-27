<?php
/**
  * @var \App\View\AppView $this
  */

?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($booking); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Booking']) ?></legend>
    <?php
    echo $this->Form->control('booking_date'); ?>
    <div class="input-group bootstrap-timepicker timepicker">
        <label class="control-label" for="booking-from">Booking from</label>
        <input id="booking-from" type="text" required="required" name="booking_from" class="form-control input-small">
        <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i></span>
    </div> <br />
    <div class="input-group bootstrap-timepicker timepicker">
        <label class="control-label" for="booking-to">Booking To</label>
        <input id="booking-to" type="text" required="required" name="booking_to" class="form-control input-small">
        <span class="input-group-addon">
        <i class="glyphicon glyphicon-time"></i></span>
    </div><br />
<?php echo $this->Form->control('booker_id', ['label' => 'Docter(s)', 'options' => $users]);
    //echo $this->Form->control('created_at');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end(); ?>