<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $amenity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Amenities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['controller' => 'PropertyAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['controller' => 'PropertyAmenities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="amenities form large-9 medium-8 columns content">
    <?= $this->Form->create($amenity) ?>
    <fieldset>
        <legend><?= __('Edit Amenity') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
