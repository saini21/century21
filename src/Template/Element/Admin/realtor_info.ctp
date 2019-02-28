<?php $inputClasses = 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'; ?>
<h4 class="mt-0">Add New Realtor - Continue Step 2</h4>
<!-- Form -->
<?= $this->Form->create(null, ['url' => 'javascript:void(0);', 'id' => 'realtorInfoForm', 'class' => "g-py-15"]) ?>
<?php
$classes = "js-select u-select--v3-select u-sibling w-100";
$dropIconClasses = "d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15";
?>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Mailing Address:</label>
        <?= $this->Form->input('address', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Mailing  Address', 'realtorInfoAddress']) ?>
    </div>
    <div class="col-xs-12 col-sm-6 ">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">State:</label>
        
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4">
            <select name="state_id" class="<?= $classes; ?>" title="State"
                    style="display: none;" data-live-search="true" id="realtorStateId">
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
        <label for="realtorStateId" class="error"></label>
    </div>
</div>

<div class="row ">
    <div class="col-xs-12 col-sm-6 ">
		
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">City:</label>
        <div id="loadingRealtorCities" style="display:none;">Loading cities...</div>
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4" id="citiesSelectBox">
            <select name="city_id" class="<?= $classes; ?>" title="City"
                    style="display: none;" data-live-search="true" id="realtorCityId">
            </select>
            <div
                class="<?= $dropIconClasses; ?>">
                <i class="hs-admin-angle-down"></i>
            </div>
        </div>
        <label for="realtorCityId" class="error"></label>
    </div>
    <div class="col-xs-12 col-sm-6">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Zip:</label>
        <?= $this->Form->input('zip', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Zip', 'id' => 'realtorInfoZip']) ?>
    </div>
</div>
<hr />
<div class="row justify-content-between mb-5 mt-5">
    <div class="col-xs-12 col-sm-6 ">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">State where you are licensed?</label>
        
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4" style="margin-bottom:0px;">
            <select name="state_licensed_in" class="<?= $classes; ?>" title="State"
                    style="display: none;" data-live-search="true" id="realtorStateLicensedInId">
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
        <label for="realtorStateLicensedInId" class="error"></label>
    </div>
    <div class="col-xs-12 col-sm-6">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Real Estate Licence No:</label>
        
        <?= $this->Form->input('licence_number', ['class' => $inputClasses, 'label' => false, 'placeholder' => 'Real Estate Licence No']) ?>
    </div>
</div>

<div class="row">
    <div class="col-6 align-self-center text-left">
        <?= $this->Form->button(__('Back'), ['type'=>'button', 'id' => 'realtorInfoBackBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
    <div class="col-6 align-self-center text-right">
        
        <?= $this->Form->button(__('Next'), ['id' => 'realtorInfoNextBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
</div>
<?= $this->form->end(); ?>
