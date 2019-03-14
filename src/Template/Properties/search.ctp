<div class="float-left w-100 pt-3 pb-3 search-top-filter">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-11">
                    <?= $this->Form->create(null, ['url' => 'javascript:void(0);', 'id' => 'searchForm']); ?>
                    
                    <div class="row">
                        <div class="col-md-2"><a class="navbar-brand" href="<?= SITE_URL; ?>"><img src="<?=SITE_URL; ?>img/lg.png"></a></div>
                        <div class="col-md-2">
                            <select class="form-control" name="for">
                                <option value="sale">For Sale</option>
                                <option value="lease">For Lease</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="key" class="form-control" placeholder="Search"
                                   value="<?= $key; ?>">
                        </div>
                        <div class="col-md-1">
                            <select class="form-control" name="bedrooms">
                                <option value="">Beds</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="5+">5+</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select class="form-control" name="bathrooms">
                                <option value="">Baths</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="5+">5+</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-lg btn-success" id="searchBtn"><i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
                <div class="col-md-1 text-right">
                    <button class="btn btn-md btn-success   "><i class="fa fa-save"></i> Save Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="float-left w-100 search-page-outer">
    <div class="float-left w-100">
        
        <div class="search-page-left">
            <div class="" id="map" style="width: 100%; height: 800px;"></div>
        </div>
        
        <div class="search-page-right" id="searchedProperties">
        </div>
    
    </div>
</div>

<template id="infoWindow">
    <div>
        <div class="row">
            <div class="col-md-3">
                <img class="detail-img-fluid"
                     src="<?= SITE_URL; ?>${image}" alt="${address}"
                     style="width: 160px;">
            </div>
            <div class="col-md-9 px-2">
                <h4 class="h4">${address}</h4>
                <p class=""><i class="fa fa-dollar"></i> ${price}</p>
            </div>
        </div>
    </div>
</template>

<template id="listWindow">
    <div class="serch-block1 mb-4 property-detail" id="propertIndex_${index}">
        <div class="block-slider-img">
            <span class="block-sale"> For ${for_sale} </span>
            <img src="<?= SITE_URL; ?>${image}" style="width:286px;">
        </div>
        <div class="block-slider-content float-left w-100">
            <h4 class="title"><i class="fas fa-map-marker-alt"></i> ${addr} </h4>
            <h5 class="title">
                <span class="pull-left" style=""><i class="fa fa-city"></i> ${county}</span>
                <span class="pull-right" style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dollar"></i> ${price}</span>
            </h5>
            <ul class="float-left w-100">
                <li>
                    <i class="fas fa-bed"></i>
                    <p> ${bedrooms} bedroom </p>
                </li>
                <li>
                    <i class="fas fa-bath"></i>
                    <p> ${bathrooms} bathroom </p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAP_KEY; ?>&libraries=drawing&callback=initMap"
        async defer></script>
<?= $this->Html->script(['jquery-ui', 'jquery.tmpl', 'search_properties']); ?>
