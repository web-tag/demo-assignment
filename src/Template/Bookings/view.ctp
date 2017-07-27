<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?> </li>
<li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?> </li>
<li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($booking->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Booking From') ?></td>
            <td><?= h($booking->booking_from) ?></td>
        </tr>
        <tr>
            <td><?= __('Booking To') ?></td>
            <td><?= h($booking->booking_to) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $booking->has('user') ? $this->Html->link($booking->user->id, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($booking->id) ?></td>
        </tr>
        <tr>
            <td><?= __('User Id') ?></td>
            <td><?= $this->Number->format($booking->user_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created At') ?></td>
            <td><?= $this->Number->format($booking->created_at) ?></td>
        </tr>
        <tr>
            <td><?= __('Booking Date') ?></td>
            <td><?= h($booking->booking_date) ?></td>
        </tr>
    </table>
</div>

