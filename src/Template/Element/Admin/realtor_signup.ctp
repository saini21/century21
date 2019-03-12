<?php $inputClasses = 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'; ?>
<h4 class="mt-0">Add New Realtor - Step 1</h4>
<!-- Form -->
<?= $this->Form->create(null, ['url' => 'javascript:void(0);', 'id' => 'realtorRegisterForm', 'class' => "g-py-15"]) ?>
<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">First name:</label>
        <?= $this->Form->input('first_name', ['class' => $inputClasses, 'label' => false, 'id' => 'realtorFirstName', 'placeholder' => 'First Name']) ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Last name:</label>
        <?= $this->Form->input('last_name', ['class' => $inputClasses, 'label' => false, 'id' => 'realtorLastName', 'placeholder' => 'Last Name']) ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Company:</label>
        <?= $this->Form->input('company', ['class' => $inputClasses, 'label' => false, 'id' => 'realtorCompany', 'placeholder' => 'Company']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
        <?= $this->Form->input('email', ['class' => $inputClasses, 'label' => false, 'id' => 'realtorEmail', 'placeholder' => 'Email']) ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
        <?= $this->Form->input('password', ['class' => $inputClasses, 'label' => false, 'id' => 'realtorPassword', 'placeholder' => 'Password']) ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 mb-4">
            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Phone:</label>
            <?= $this->Form->input('phone', ['class' => $inputClasses, 'id' => 'realtorPhone', 'label' => false, 'placeholder' => 'Phone']) ?>
    </div>
</div>

<div class="row">

</div>


<div class="row justify-content-between mb-5">
    <div class="col-8 align-self-center">
        &nbsp;
    </div>
    <div class="col-4 align-self-center text-right">
        <?= $this->Form->button(__('Next'), ['id' => 'realtorRegisterBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
</div>
<?= $this->form->end(); ?>
<!-- End Form -->

