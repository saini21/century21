<?php
$inputClasses = 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15';
$classes = "js-select u-select--v3-select u-sibling w-100";
$dropIconClasses = "d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15";
?>
<?= $this->Form->create(null, ['id' => 'addMarketPlaceForm']) ?>
<h4 class="mt-0">Add New Realtor - Continue Step 3</h4>
<h3 class="d-flex align-self-center g-font-size-12 g-font-size-default--md  font-weight-bold g-mr-10 mb-0">
    Please select the market(s) you would like to receive apartment flyers including specials, current prices,
    commissions, realtor parties, etc..
</h3>

<p> Note: You can also narrow this down by city and/or specific apartments.</p>
<h4 class="d-flex align-self-center g-font-size-12 g-font-size-default--md g-mr-10 mb-0">
    You should be able to select Apartment Name or choose area/location on Map from your account settings page.</h4>
<div class="row p-lg-4">
    <div class="col-xs-6 col-sm-5 ">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">State where you are licensed: </label>
        <input id="selectedLicensedStateName" readonly="readonly" disabled="disabled"
               class="<?= $inputClasses; ?> disabled" value="">
    </div>
    <div class="col-xs-6 col-sm-7">
        &nbsp;
    </div>
    <div class="col-xs-6 col-sm-3 ">
        <label class="g-color-gray-dark-v2 mt-5 g-font-weight-600 g-font-size-13 " id="selectByCities">Select by Cities Below </label>
    </div>
    <div class="col-xs-4 col-sm-2">
        <h4 class="h5 text-center mt-5">OR </h4>
    
    </div>
    <div class="col-xs-6 col-sm-7">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Select by Preferred Marketplace:</label>
        <div id="loadingMarketPlaces" style="display:none;">Loading marketPlaces...</div>
        <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v4 g-rounded-4" id="marketPlaceSelectBox">
            <select name="market_place_id" class="<?= $classes; ?>" title="Select Market Place"
                    style="display: none;" data-live-search="true" id="realtorMarketPlaceId">
            </select>
            <div
                class="<?= $dropIconClasses; ?>">
                <i class="hs-admin-angle-down"></i>
            </div>
        </div>
        <label for="realtorCityId" class="error"></label>
    
    </div>
    
    <div class="col-xs-6 col-sm-4 city-section">
        <div class="form-group g-mt-40" id="selectAllCitiesBox">
            <div class="form-group g-mt-10">
                <a href="javascript:void(0);" class="btn btn-md u-btn-primary rounded g-px-25 g-font-weight-600"
                   id="selectAll"> Select All </a>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 city-section">
        <div class="form-group g-mt-40" id="deselectAllCitiesBox">
            <div class="form-group g-mt-10">
                <a href="javascript:void(0);" class="btn btn-md u-btn-primary rounded  g-px-25 g-font-weight-600"
                   id="deselectAll"> Deselect All </a>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 city-section">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Search Cities:</label>
        <div class="form-group" id="searchCityBox">
            <div class="g-pos-rel">
                      <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-50 h-100">
	                    <i class="hs-admin-search g-absolute-centered g-font-size-16 g-color-gray-light-v6"></i>
	                  </span>
                <input id="searchCityByName"
                       class="<?= $inputClasses; ?>"
                       type="text" placeholder="Search city by name">
            </div>
        </div>
    
    </div>
    <div class="col-md-9 city-section">
        <label for="city[]" class="error" style="display: none; margin-bottom: 10px;">Please choose atleast one
            city.</label>
        <div id="chooseCities" class="row" style="max-height: 460px; overflow-y: auto;"></div>
    </div>
    <div class="col-md-3 city-section">
        <h4 class="h4" id="selectedCityHeading">Selected Cities</h4>
        <div id="selectedCities" class="row" style="max-height: 460px; overflow-y: auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col-6 align-self-center text-left">
        <?= $this->Form->button(__('Back'), ['type' => 'button', 'id' => 'realtorChooseCitiesBackBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
    <div class="col-6 align-self-center text-right">
        <?= $this->Form->button(__('Sign Up'), ['id' => 'realtorInfoBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25 g-font-weight-600"]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
</div>

<template id="checkTmpl">
    <div class="col-md-3 city-main" data-name="${label.toLowerCase()}" id="citiBox_${value}">
        <div class="form-group g-mb-10">
            <label class="u-check g-pl-25">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 not-ignore select-row" type="checkbox"
                       name="city[]"
                       id="city_${value}" value="${value}">
                <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                </div>
                ${label}
            </label>
        </div>
    </div>
</template>
