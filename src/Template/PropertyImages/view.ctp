<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyImage $propertyImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property Image'), ['action' => 'edit', $propertyImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Image'), ['action' => 'delete', $propertyImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="propertyImages view large-9 medium-8 columns content">
    <h3><?= h($propertyImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $propertyImage->has('property') ? $this->Html->link($propertyImage->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyImage->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $propertyImage->has('image') ? $this->Html->link($propertyImage->image->id, ['controller' => 'Images', 'action' => 'view', $propertyImage->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($propertyImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($propertyImage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($propertyImage->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $propertyImage->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
