<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Option'), ['action' => 'edit', $option->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Option'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="options view large-9 medium-8 columns content">
    <h3><?= h($option->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Option Category') ?></th>
            <td><?= h($option->option_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Option Name') ?></th>
            <td><?= h($option->option_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Value') ?></th>
            <td><?= h($option->default_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifieds') ?></th>
            <td><?= h($option->modifieds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($option->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($option->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Option Value') ?></h4>
        <?= $this->Text->autoParagraph(h($option->option_value)); ?>
    </div>
</div>
