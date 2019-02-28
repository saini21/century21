<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Amenity'), ['action' => 'edit', $amenity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Amenity'), ['action' => 'delete', $amenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Amenities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amenity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['controller' => 'PropertyAmenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['controller' => 'PropertyAmenities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="amenities view large-9 medium-8 columns content">
    <h3><?= h($amenity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($amenity->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($amenity->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($amenity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($amenity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($amenity->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $amenity->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Property Amenities') ?></h4>
        <?php if (!empty($amenity->property_amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Amenity Id') ?></th>
                <th scope="col"><?= __('Amenity Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($amenity->property_amenities as $propertyAmenities): ?>
            <tr>
                <td><?= h($propertyAmenities->id) ?></td>
                <td><?= h($propertyAmenities->property_id) ?></td>
                <td><?= h($propertyAmenities->amenity_id) ?></td>
                <td><?= h($propertyAmenities->amenity_value) ?></td>
                <td><?= h($propertyAmenities->created) ?></td>
                <td><?= h($propertyAmenities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PropertyAmenities', 'action' => 'view', $propertyAmenities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyAmenities', 'action' => 'edit', $propertyAmenities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyAmenities', 'action' => 'delete', $propertyAmenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyAmenities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
