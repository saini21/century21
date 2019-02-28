<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity[]|\Cake\Collection\CollectionInterface $amenities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Amenity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['controller' => 'PropertyAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['controller' => 'PropertyAmenities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="amenities index large-9 medium-8 columns content">
    <h3><?= __('Amenities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amenities as $amenity): ?>
            <tr>
                <td><?= $this->Number->format($amenity->id) ?></td>
                <td><?= h($amenity->category) ?></td>
                <td><?= h($amenity->name) ?></td>
                <td><?= h($amenity->status) ?></td>
                <td><?= h($amenity->created) ?></td>
                <td><?= h($amenity->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $amenity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $amenity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $amenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]) ?>
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
