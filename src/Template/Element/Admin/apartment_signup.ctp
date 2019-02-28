<?php $inputClasses = 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'; ?>
<h4 class="mt-0">Apartment Sign Up - Step 1</h4>
<!-- Form -->
<?= $this->Form->create(null, ['url' => 'javascript:void(0);', 'id' => 'apartmentRegisterForm', 'class' => "g-py-15"]) ?>
<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Apartment name:</label>
        <?= $this->Form->input('apartment_name', ['class' => $inputClasses, 'label' => false, 'id' => 'apartmentFirstName', 'placeholder' => 'Apartment Name']) ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Management Company:</label>
        <?= $this->Form->input('management_company', ['class' => $inputClasses, 'label' => false, 'id' => 'apartmentLastName', 'placeholder' => 'Management Company']) ?>
    </div>
</div>
<?php
$classes = "js-select u-select--v3-select u-sibling w-100";
$dropIconClasses = "d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15";
?>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Address:</label>
        <?= $this->Form->input('address', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Address', 'id' => 'apartmentInfoAddress']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 ">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">State:</label>
        
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4 mb-0">
            <select name="state_id" class="<?= $classes; ?>" title="State"
                    style="display: none;" data-live-search="true" id="apartmentStateId">
                <?php foreach ($states as $value => $label) { ?>
                    <option value="<?= $value; ?>"
                            data-content='<span class="d-flex align-items-center w-100"><span><?= $label; ?></span></span>'>
                        <?= $label; ?>
                    </option>
                <?php } ?>
            </select>
            <div
                class="<?= $dropIconClasses; ?>">
                <i class="hs-admin-angle-down"></i>
            </div>
        </div>
        <label for="apartmentStateId" class="error"></label>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-xs-12 col-sm-6">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">City:</label>
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4 mb-0">
            <select name="city_id" class="<?= $classes; ?>" title="City"
                    style="display: none;" data-live-search="true" id="apartmentCityId">
            
            </select>
            <div
                class="<?= $dropIconClasses; ?>">
                <i class="hs-admin-angle-down"></i>
            </div>
        </div>
        <label for="apartmentCityId" class="error"></label>
    </div>
    <div class="col-6 align-self-center mb-5">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Zip:</label>
        <?= $this->Form->input('zip', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Zip']) ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Phone:</label>
        <?= $this->Form->input('phone', ['class' => $inputClasses, 'id' => 'apartmentPhone', 'label' => false, 'placeholder' => 'Phone']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
        <?= $this->Form->input('email', ['class' => $inputClasses, 'label' => false, 'id' => 'apartmentEmail', 'placeholder' => 'Email']) ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
        <?= $this->Form->input('password', ['class' => $inputClasses, 'label' => false, 'id' => 'apartmentPassword', 'placeholder' => 'Password']) ?>
    </div>
    
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm
            Password:</label>
        <?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => $inputClasses, 'label' => false, 'placeholder' => 'Confirm Password', 'id' => 'apartmentConfirmPassword']) ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">
            How did you find out about <span class="g-color-primary">ApartmentNetwork.com</span>?
        </label><br/>
        <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 apartment-find-us-via" name="how_did_you_find_apt_net"
                   checked="" type="radio" id="apartmentFindViaInternet">
            <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
            </div>
            Internet
        </label><br/>
        
        <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 apartment-find-us-via" name="how_did_you_find_apt_net"
                   type="radio" id="apartmentFindViaApartmentCommunity">
            <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
            </div>
            Apartment Community
        </label><br/>
        <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 apartment-find-us-via" name="how_did_you_find_apt_net"
                   type="radio" id="apartmentFindViaRealtor">
            <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
            </div>
            Realtor
        </label><br/>
        <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 apartment-find-us-via" name="how_did_you_find_apt_net"
                   type="radio" id="apartmentFindViaOther">
            <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
            </div>
            Other
        </label>
    
    </div>
    
    <div class="col-xs-12 col-sm-6 mb-4" id="apartmentReasonBox" style="display: none;">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13"></label>
        <?= $this->Form->input('how_did_you_find_us', ['type' => 'textarea', 'class' => $inputClasses, 'id' => 'apartmentHowDidYouFindUs', 'label' => false, 'placeholder' => 'Internet', 'value' => 'Internet']) ?>
    </div>
</div>


<div class="row justify-content-between mb-5">
    <div class="col-8 align-self-center">
        <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
            
            <input name="i_accept" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox"
                   id="apartmentIAccept">
            <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="&#xf00c"></i>
            </div>
            I accept the <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'termsAndConditions']); ?>" target="_blank">
                Terms and Conditions
            </a>
        </label>
        <br />
        <label for="i_accept" class="error" style="display: none">Please accept terms and conditions.</label>
    </div>
    <div class="col-4 align-self-center text-right">
        <?= $this->Form->button(__('Next'), ['id' => 'apartmentRegisterBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
</div>
<?= $this->form->end(); ?>
<!-- End Form -->
