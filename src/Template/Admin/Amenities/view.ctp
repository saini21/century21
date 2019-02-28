<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 */
?>
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
        <h4><?= __('Related Apartment Amenities') ?></h4>
        <?php if (!empty($amenity->apartment_amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Apartment Id') ?></th>
                <th scope="col"><?= __('Amenity Id') ?></th>
                <th scope="col"><?= __('Amenity Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($amenity->apartment_amenities as $apartmentAmenities): ?>
            <tr>
                <td><?= h($apartmentAmenities->id) ?></td>
                <td><?= h($apartmentAmenities->apartment_id) ?></td>
                <td><?= h($apartmentAmenities->amenity_id) ?></td>
                <td><?= h($apartmentAmenities->amenity_value) ?></td>
                <td><?= h($apartmentAmenities->created) ?></td>
                <td><?= h($apartmentAmenities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApartmentAmenities', 'action' => 'view', $apartmentAmenities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApartmentAmenities', 'action' => 'edit', $apartmentAmenities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApartmentAmenities', 'action' => 'delete', $apartmentAmenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartmentAmenities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
