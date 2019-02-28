<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyAmenity $propertyAmenity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="propertyAmenities form large-9 medium-8 columns content">
    <?= $this->Form->create($propertyAmenity) ?>
    <fieldset>
        <legend><?= __('Add Property Amenity') ?></legend>
        <?php
            echo $this->Form->control('property_id', ['options' => $properties]);
            echo $this->Form->control('amenity_id', ['options' => $amenities]);
            echo $this->Form->control('amenity_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
