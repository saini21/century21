<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyAttribute $propertyAttribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property Attribute'), ['action' => 'edit', $propertyAttribute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Attribute'), ['action' => 'delete', $propertyAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyAttribute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Attribute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="propertyAttributes view large-9 medium-8 columns content">
    <h3><?= h($propertyAttribute->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $propertyAttribute->has('property') ? $this->Html->link($propertyAttribute->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyAttribute->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute') ?></th>
            <td><?= h($propertyAttribute->attribute) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($propertyAttribute->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($propertyAttribute->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($propertyAttribute->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Attribute Value') ?></h4>
        <?= $this->Text->autoParagraph(h($propertyAttribute->attribute_value)); ?>
    </div>
</div>
