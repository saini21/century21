<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PropertyImage[]|\Cake\Collection\CollectionInterface $propertyImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Property Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="propertyImages index large-9 medium-8 columns content">
    <h3><?= __('Property Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('property_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propertyImages as $propertyImage): ?>
            <tr>
                <td><?= $this->Number->format($propertyImage->id) ?></td>
                <td><?= $propertyImage->has('property') ? $this->Html->link($propertyImage->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyImage->property->id]) : '' ?></td>
                <td><?= $propertyImage->has('image') ? $this->Html->link($propertyImage->image->id, ['controller' => 'Images', 'action' => 'view', $propertyImage->image->id]) : '' ?></td>
                <td><?= h($propertyImage->status) ?></td>
                <td><?= h($propertyImage->created) ?></td>
                <td><?= h($propertyImage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $propertyImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyImage->id)]) ?>
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
