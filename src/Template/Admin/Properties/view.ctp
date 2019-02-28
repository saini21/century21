<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
?>
<div class="apartments view large-9 medium-8 columns content">
    <h3><?= h($apartment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $apartment->has('user') ? $this->Html->link($apartment->user->id, ['controller' => 'Users', 'action' => 'view', $apartment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($apartment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($apartment->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $apartment->has('city') ? $this->Html->link($apartment->city->name, ['controller' => 'Cities', 'action' => 'view', $apartment->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $apartment->has('state') ? $this->Html->link($apartment->state->name, ['controller' => 'States', 'action' => 'view', $apartment->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($apartment->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Place') ?></th>
            <td><?= $apartment->has('market_place') ? $this->Html->link($apartment->market_place->name, ['controller' => 'MarketPlaces', 'action' => 'view', $apartment->market_place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $apartment->has('image') ? $this->Html->link($apartment->image->id, ['controller' => 'Images', 'action' => 'view', $apartment->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($apartment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($apartment->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($apartment->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Searched At') ?></th>
            <td><?= h($apartment->last_searched_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($apartment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($apartment->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $apartment->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Premium') ?></th>
            <td><?= $apartment->is_premium ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Available') ?></th>
            <td><?= $apartment->is_available ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Floor Plan') ?></th>
            <td><?= $apartment->has_floor_plan ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Apartment Amenities') ?></h4>
        <?php if (!empty($apartment->apartment_amenities)): ?>
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
            <?php foreach ($apartment->apartment_amenities as $apartmentAmenities): ?>
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
    <div class="related">
        <h4><?= __('Related Apartment Images') ?></h4>
        <?php if (!empty($apartment->apartment_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Apartment Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($apartment->apartment_images as $apartmentImages): ?>
            <tr>
                <td><?= h($apartmentImages->id) ?></td>
                <td><?= h($apartmentImages->apartment_id) ?></td>
                <td><?= h($apartmentImages->image_id) ?></td>
                <td><?= h($apartmentImages->status) ?></td>
                <td><?= h($apartmentImages->created) ?></td>
                <td><?= h($apartmentImages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ApartmentImages', 'action' => 'view', $apartmentImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ApartmentImages', 'action' => 'edit', $apartmentImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApartmentImages', 'action' => 'delete', $apartmentImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartmentImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scheduled Email Apartments') ?></h4>
        <?php if (!empty($apartment->scheduled_email_apartments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scheduled Email Id') ?></th>
                <th scope="col"><?= __('Apartment Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($apartment->scheduled_email_apartments as $scheduledEmailApartments): ?>
            <tr>
                <td><?= h($scheduledEmailApartments->id) ?></td>
                <td><?= h($scheduledEmailApartments->scheduled_email_id) ?></td>
                <td><?= h($scheduledEmailApartments->apartment_id) ?></td>
                <td><?= h($scheduledEmailApartments->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScheduledEmailApartments', 'action' => 'view', $scheduledEmailApartments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScheduledEmailApartments', 'action' => 'edit', $scheduledEmailApartments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScheduledEmailApartments', 'action' => 'delete', $scheduledEmailApartments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailApartments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Searched Apartments') ?></h4>
        <?php if (!empty($apartment->searched_apartments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Search Id') ?></th>
                <th scope="col"><?= __('Apartment Id') ?></th>
                <th scope="col"><?= __('Selected') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($apartment->searched_apartments as $searchedApartments): ?>
            <tr>
                <td><?= h($searchedApartments->id) ?></td>
                <td><?= h($searchedApartments->customer_search_id) ?></td>
                <td><?= h($searchedApartments->apartment_id) ?></td>
                <td><?= h($searchedApartments->selected) ?></td>
                <td><?= h($searchedApartments->notified) ?></td>
                <td><?= h($searchedApartments->created) ?></td>
                <td><?= h($searchedApartments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SearchedApartments', 'action' => 'view', $searchedApartments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SearchedApartments', 'action' => 'edit', $searchedApartments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SearchedApartments', 'action' => 'delete', $searchedApartments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchedApartments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
