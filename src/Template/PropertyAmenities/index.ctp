<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyAmenity[]|\Cake\Collection\CollectionInterface $propertyAmenities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="propertyAmenities index large-9 medium-8 columns content">
    <h3><?= __('Property Amenities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amenity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amenity_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propertyAmenities as $propertyAmenity): ?>
            <tr>
                <td><?= $this->Number->format($propertyAmenity->id) ?></td>
                <td><?= $propertyAmenity->has('property') ? $this->Html->link($propertyAmenity->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyAmenity->property->id]) : '' ?></td>
                <td><?= $propertyAmenity->has('amenity') ? $this->Html->link($propertyAmenity->amenity->name, ['controller' => 'Amenities', 'action' => 'view', $propertyAmenity->amenity->id]) : '' ?></td>
                <td><?= h($propertyAmenity->amenity_value) ?></td>
                <td><?= h($propertyAmenity->created) ?></td>
                <td><?= h($propertyAmenity->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $propertyAmenity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyAmenity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyAmenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyAmenity->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
