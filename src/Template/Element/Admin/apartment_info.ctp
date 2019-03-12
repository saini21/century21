<?php $inputClasses = 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'; ?>
<h4 class="mt-0">Apartment Sign Up - Continue Step 2</h4>
<!-- Form -->
<?= $this->Form->create(null, ['url' => 'javascript:void(0);', 'id' => 'apartmentInfoForm', 'class' => "g-py-15"]) ?>

<div class="row">
    
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Manager  Name:</label>
        <?= $this->Form->input('manager_name', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Account Manager Name']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Manager Email:</label>
        <?= $this->Form->input('manager_email', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Account Manager Email']) ?>
    </div>
</div>
<div class="row">
    
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Regional Manager Name:</label>
        <?= $this->Form->input('regional_manager_name', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Regional Manager Name']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Regional Manager Email:</label>
        <?= $this->Form->input('regional_manager_email', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Regional Manager Email']) ?>
    </div>
</div>

<div class="row">
    <div class="col-6 align-self-center text-left">
        <?= $this->Form->button(__('Back'), ['type' => 'button', 'id' => 'apartmentInfoBackBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
    <div class="col-6 align-self-center text-right">
        <?= $this->Form->button(__('Sign Up'), ['id' => 'apartmentInfoBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
</div>
<?= $this->form->end(); ?>
