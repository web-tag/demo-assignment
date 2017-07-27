<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $booking->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $booking->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($booking); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Booking']) ?></legend>
    <?php
    echo $this->Form->control('booking_date');
    echo $this->Form->control('booking_from');
    echo $this->Form->control('booking_to');
    echo $this->Form->control('user_id');
    echo $this->Form->control('booker_id', ['options' => $users]);
    echo $this->Form->control('created_at');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
