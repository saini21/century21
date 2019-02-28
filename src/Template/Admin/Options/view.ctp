<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<div class="options view large-9 medium-8 columns content">
    <h3><?= h($option->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Option Category') ?></th>
            <td><?= h($option->option_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Option Name') ?></th>
            <td><?= h($option->option_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Value') ?></th>
            <td><?= h($option->default_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($option->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($option->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($option->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Option Value') ?></h4>
        <?= $this->Text->autoParagraph(h($option->option_value)); ?>
    </div>
</div>
