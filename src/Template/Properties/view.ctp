<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Amenities'), ['controller' => 'PropertyAmenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Amenity'), ['controller' => 'PropertyAmenities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Images'), ['controller' => 'PropertyImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Image'), ['controller' => 'PropertyImages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="properties view large-9 medium-8 columns content">
    <h3><?= h($property->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Community') ?></th>
            <td><?= h($property->community) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idx Date') ?></th>
            <td><?= h($property->idx_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pix Update') ?></th>
            <td><?= h($property->pix_update) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sql Timestamp') ?></th>
            <td><?= h($property->sql_timestamp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bedroom') ?></th>
            <td><?= h($property->bedroom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bedroom Plus') ?></th>
            <td><?= h($property->bedroom_plus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bath Total') ?></th>
            <td><?= h($property->bath_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Realtor') ?></th>
            <td><?= h($property->realtor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Type') ?></th>
            <td><?= h($property->class_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ml Num') ?></th>
            <td><?= h($property->ml_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lp Dol') ?></th>
            <td><?= h($property->lp_dol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($property->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= h($property->area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= h($property->county) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($property->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipality District') ?></th>
            <td><?= h($property->municipality_district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipality') ?></th>
            <td><?= h($property->municipality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($property->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($property->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($property->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Tour Url') ?></h4>
        <?= $this->Text->autoParagraph(h($property->tour_url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ad Text') ?></h4>
        <?= $this->Text->autoParagraph(h($property->ad_text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Extras') ?></h4>
        <?= $this->Text->autoParagraph(h($property->extras)); ?>
    </div>
    <div class="row">
        <h4><?= __('Legal Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($property->Legal_desc)); ?>
    </div>
    <div class="row">
        <h4><?= __('Property Json') ?></h4>
        <?= $this->Text->autoParagraph(h($property->property_json)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Property Amenities') ?></h4>
        <?php if (!empty($property->property_amenities)): ?>
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
            <?php foreach ($property->property_amenities as $propertyAmenities): ?>
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
    <div class="related">
        <h4><?= __('Related Property Images') ?></h4>
        <?php if (!empty($property->property_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->property_images as $propertyImages): ?>
            <tr>
                <td><?= h($propertyImages->id) ?></td>
                <td><?= h($propertyImages->property_id) ?></td>
                <td><?= h($propertyImages->image_id) ?></td>
                <td><?= h($propertyImages->status) ?></td>
                <td><?= h($propertyImages->created) ?></td>
                <td><?= h($propertyImages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PropertyImages', 'action' => 'view', $propertyImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyImages', 'action' => 'edit', $propertyImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyImages', 'action' => 'delete', $propertyImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
