<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('My Appointments'), ['controller' => 'Bookings', 'action' => 'appointments']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('booking_date', ['Appointment Date']); ?></th>
            <th><?= $this->Paginator->sort('booking_from'); ?></th>
            <th><?= $this->Paginator->sort('booking_to'); ?></th>
            <th><?= $this->Paginator->sort('user_id', ['Patient']); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= h($booking->booking_date) ?></td>
            <td><?= h($booking->booking_from) ?></td>
            <td><?= h($booking->booking_to) ?></td>
            <td><?= $booking->user->full_name; ?></td>
            <td><?= $booking->created_at; ?></td>
            <td class="actions">
                <?= $this->Form->postLink('', ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
