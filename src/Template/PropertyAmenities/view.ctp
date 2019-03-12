<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyAmenity $propertyAmenity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property Amenity'), ['action' => 'edit', $propertyAmenity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Amenity'), ['action' => 'delete', $propertyAmenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyAmenity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="propertyAmenities view large-9 medium-8 columns content">
    <h3><?= h($propertyAmenity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Property') ?></th>
            <td><?= $propertyAmenity->has('property') ? $this->Html->link($propertyAmenity->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyAmenity->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amenity') ?></th>
            <td><?= $propertyAmenity->has('amenity') ? $this->Html->link($propertyAmenity->amenity->name, ['controller' => 'Amenities', 'action' => 'view', $propertyAmenity->amenity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amenity Value') ?></th>
            <td><?= h($propertyAmenity->amenity_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($propertyAmenity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($propertyAmenity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($propertyAmenity->modified) ?></td>
        </tr>
    </table>
</div>
