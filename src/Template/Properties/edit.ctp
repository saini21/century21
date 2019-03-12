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
            echo $this->Form->control('tour_url');
            echo $this->Form->control('ad_text');
            echo $this->Form->control('extras');
            echo $this->Form->control('Legal_desc');
            echo $this->Form->control('community');
            echo $this->Form->control('idx_date');
            echo $this->Form->control('pix_update');
            echo $this->Form->control('sql_timestamp');
            echo $this->Form->control('bedroom');
            echo $this->Form->control('bedroom_plus');
            echo $this->Form->control('bath_total');
            echo $this->Form->control('realtor');
            echo $this->Form->control('class_type');
            echo $this->Form->control('ml_num');
            echo $this->Form->control('lp_dol');
            echo $this->Form->control('address');
            echo $this->Form->control('area');
            echo $this->Form->control('county');
            echo $this->Form->control('zip');
            echo $this->Form->control('municipality_district');
            echo $this->Form->control('municipality');
            echo $this->Form->control('property_json');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
