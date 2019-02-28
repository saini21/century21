<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<div class="options form large-9 medium-8 columns content">
    <?= $this->Form->create($option) ?>
    <fieldset>
        <legend><?= __('Edit Option') ?></legend>
        <?php
            echo $this->Form->control('option_category');
            echo $this->Form->control('option_name');
            echo $this->Form->control('option_value');
            echo $this->Form->control('default_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
