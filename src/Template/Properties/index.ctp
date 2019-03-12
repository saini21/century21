<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?></li>
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
<div class="properties index large-9 medium-8 columns content">
    <h3><?= __('Properties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('community') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idx_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pix_update') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sql_timestamp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bedroom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bedroom_plus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bath_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('realtor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ml_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lp_dol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipality_district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($properties as $property): ?>
            <tr>
                <td><?= $this->Number->format($property->id) ?></td>
                <td><?= h($property->community) ?></td>
                <td><?= h($property->idx_date) ?></td>
                <td><?= h($property->pix_update) ?></td>
                <td><?= h($property->sql_timestamp) ?></td>
                <td><?= h($property->bedroom) ?></td>
                <td><?= h($property->bedroom_plus) ?></td>
                <td><?= h($property->bath_total) ?></td>
                <td><?= h($property->realtor) ?></td>
                <td><?= h($property->class_type) ?></td>
                <td><?= h($property->ml_num) ?></td>
                <td><?= h($property->lp_dol) ?></td>
                <td><?= h($property->address) ?></td>
                <td><?= h($property->area) ?></td>
                <td><?= h($property->county) ?></td>
                <td><?= h($property->zip) ?></td>
                <td><?= h($property->municipality_district) ?></td>
                <td><?= h($property->municipality) ?></td>
                <td><?= h($property->created) ?></td>
                <td><?= h($property->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
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
