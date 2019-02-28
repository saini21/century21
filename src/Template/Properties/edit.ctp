<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['controller' => 'PropertyAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['controller' => 'PropertyAmenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Property Images'), ['controller' => 'PropertyImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property Image'), ['controller' => 'PropertyImages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="properties form large-9 medium-8 columns content">
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('state_id', ['options' => $states]);
            echo $this->Form->control('zip');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
            echo $this->Form->control('image_id', ['options' => $images]);
            echo $this->Form->control('status');
            echo $this->Form->control('is_premium');
            echo $this->Form->control('is_featured');
            echo $this->Form->control('last_searched_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
