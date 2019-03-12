<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyAttribute $propertyAttribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyAttribute->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyAttribute->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Property Attributes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="propertyAttributes form large-9 medium-8 columns content">
    <?= $this->Form->create($propertyAttribute) ?>
    <fieldset>
        <legend><?= __('Edit Property Attribute') ?></legend>
        <?php
            echo $this->Form->control('property_id', ['options' => $properties]);
            echo $this->Form->control('attribute');
            echo $this->Form->control('attribute_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
