<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State Code') ?></th>
            <td><?= h($city->state_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($city->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($city->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $city->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Apartments') ?></h4>
        <?php if (!empty($city->apartments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Market Place Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Is Premium') ?></th>
                <th scope="col"><?= __('Is Available') ?></th>
                <th scope="col"><?= __('Has Floor Plan') ?></th>
                <th scope="col"><?= __('Last Searched At') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->apartments as $apartments): ?>
            <tr>
                <td><?= h($apartments->id) ?></td>
                <td><?= h($apartments->user_id) ?></td>
                <td><?= h($apartments->name) ?></td>
                <td><?= h($apartments->address) ?></td>
                <td><?= h($apartments->city_id) ?></td>
                <td><?= h($apartments->state_id) ?></td>
                <td><?= h($apartments->zip) ?></td>
                <td><?= h($apartments->lat) ?></td>
                <td><?= h($apartments->lng) ?></td>
                <td><?= h($apartments->market_place_id) ?></td>
                <td><?= h($apartments->image_id) ?></td>
                <td><?= h($apartments->status) ?></td>
                <td><?= h($apartments->is_premium) ?></td>
                <td><?= h($apartments->is_available) ?></td>
                <td><?= h($apartments->has_floor_plan) ?></td>
                <td><?= h($apartments->last_searched_at) ?></td>
                <td><?= h($apartments->created) ?></td>
                <td><?= h($apartments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Apartments', 'action' => 'view', $apartments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Apartments', 'action' => 'edit', $apartments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Apartments', 'action' => 'delete', $apartments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($city->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('No Of Searches') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->user_id) ?></td>
                <td><?= h($customers->first_name) ?></td>
                <td><?= h($customers->last_name) ?></td>
                <td><?= h($customers->email) ?></td>
                <td><?= h($customers->phone) ?></td>
                <td><?= h($customers->address) ?></td>
                <td><?= h($customers->city_id) ?></td>
                <td><?= h($customers->state_id) ?></td>
                <td><?= h($customers->zip) ?></td>
                <td><?= h($customers->note) ?></td>
                <td><?= h($customers->no_of_searches) ?></td>
                <td><?= h($customers->created) ?></td>
                <td><?= h($customers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Market Place Cities') ?></h4>
        <?php if (!empty($city->market_place_cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->market_place_cities as $marketPlaceCities): ?>
            <tr>
                <td><?= h($marketPlaceCities->id) ?></td>
                <td><?= h($marketPlaceCities->city_id) ?></td>
                <td><?= h($marketPlaceCities->status) ?></td>
                <td><?= h($marketPlaceCities->created) ?></td>
                <td><?= h($marketPlaceCities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MarketPlaceCities', 'action' => 'view', $marketPlaceCities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MarketPlaceCities', 'action' => 'edit', $marketPlaceCities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MarketPlaceCities', 'action' => 'delete', $marketPlaceCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketPlaceCities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($city->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Reporting Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Reporting Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Forgot Password Token') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Registration Steps Done') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('No Of Apartments') ?></th>
                <th scope="col"><?= __('No Of Customers') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->reporting_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->reporting_email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->forgot_password_token) ?></td>
                <td><?= h($users->image_id) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->city_id) ?></td>
                <td><?= h($users->state_id) ?></td>
                <td><?= h($users->zip) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->registration_steps_done) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->no_of_apartments) ?></td>
                <td><?= h($users->no_of_customers) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
