var marker, i, map;
var markers = [];
var APTs = [];
var selectedAPTs = {};
var makeSelection = 0;
var MAP_PIN_O = 'M125 410 c-56 -72 -111 -176 -120 -224 -7 -36 11 -83 49 -124 76 -85 223 -67 270 31 28 60 29 88 6 150 -19 51 -122 205 -148 221 -6 3 -32 -21 -57 -54z m110 -175 c35 -34 33 -78 -4 -116 -35 -35 -71 -37 -105 -7 -40 35 -43 78 -11 116 34 41 84 44 120 7z';

$(function () {

    $('#searchedProperties').on('click', '.property-detail', function () {
        var id  = $(this).attr('id').split('_')[1];
        google.maps.event.trigger(markers[id], 'click');
    });

    $('#searchedProperties').on('click', '.show-property-details', function (e) {
        e.preventDefault();
        var id = $(this).parent().closest('.apartment-list-item').attr('id').split('_')[1];

        var newModal = new Custombox.modal({
            overlay: {
                close: false
            },
            content: {
                target: '#apartmentDetailModal',
                effect: 'slit',
                animateFrom: 'left',
                animateTo: 'left',
                positionX: 'center',
                positionY: 'center',
                speedIn: 300,
                speedOut: 300,
                fullscreen: false,
                onClose: function () {

                }
            }
        });
        newModal.open();
        var url = 'properties/public-view/' + APTs[id].id;
        $.get(SITE_URL + url, function (data) {
            $("#apartmentDetailPage").html(data);
        });

    });

    $('#saveSearchForm').validate({
        rules: {
            subject: {
                required: true,
                maxlength: 100
            },
            message: {
                required: true,
                maxlength: 500
            }
        },
        messages: {
            subject: {
                required: "Please enter subject",
                maxlength: "Subject can be maximum 100 characters long."
            },
            message: {
                required: "Please enter message",
                maxlength: "Message can be maximum 500 characters long."
            }
        },
        submitHandler: function () {
            $('#saveSearchError').hide();
            if ($('#searchedproperties .fa-heart').length > 0) {
                var searchedAptIds = [];
                $.each(APTs, function (index, apt) {
                    searchedAptIds.push(apt.id);
                });

                var selectedAptIds = [];

                $.each(selectedAPTs, function (index, apt) {
                    selectedAptIds.push(apt.id);
                });

                $.ajax({
                    url: SITE_URL + 'clients/save-search',
                    type: "POST",
                    data: {
                        searched_apartment_ids: searchedAptIds,
                        selected_apartment_ids: selectedAptIds,
                        subject: $('#searchSubject').val(),
                        message: $('#searchMessage').val(),
                        search_parameters: $('#searchForm').serialize()
                    },
                    dataType: "JSON",
                    beforeSend: function () {
                        $('#saveSearch').prop('disabled', true);
                        $('#saveSearch').html('<i class="fa fa-spinner fa-spin"></i> Saving Search');
                    },
                    success: function (resp) {
                        if (resp.code == 200) {
                            var newModal = new Custombox.modal({
                                overlay: {
                                    close: false
                                },
                                content: {
                                    target: '#searchSavedModal',
                                    effect: 'slide',
                                    animateFrom: 'bottom',
                                    animateTo: 'top',
                                    positionX: 'center',
                                    positionY: 'center',
                                    speedIn: 300,
                                    speedOut: 300,
                                    fullscreen: false,
                                    onClose: function () {
                                        $('.imgareaselect-outer, .imgareaselect-selection, .imgareaselect-border1, .imgareaselect-border2').hide();
                                    }
                                }
                            });
                            newModal.open();
                        } else {
                            $('#saveSearch').html('<i class="fa fa-save"></i> Save Search');
                            $('#saveSearch').prop('disabled', false);
                        }
                    }
                });
            } else {
                $('#saveSearchError').html("Please select atleast one apartment").fadeIn();
            }

            return false;
        }
    });
});

function initMap() {
    // var body = document.body,
    //     html = document.documentElement;

    var mapBoxId = document.getElementById('map');


    map = new google.maps.Map(mapBoxId, {
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();


    var bounds = new google.maps.LatLngBounds();


    $('#searchBtn').click(function () {
        $.ajax({
            url: SITE_URL + "properties/searchProperties",
            type: "post",
            data: $('#searchForm').serialize(),
            dataType: "JSON",
            beforeSend: function () {
                $('#searchedproperties').html("<h5 class='h5'><i class='fa fa-spin fa-spinner'></i> Searching ...</h5>");
                setMapOnAll(null);
                markers = [];
                APTs = [];
                selectedAPTs = {};
                makeSelection = 0;
                $('#searchBtn').prop('disabled', true);
                $("#searchBtn").html("<i class='fa fa-spin fa-spinner'></i> Searching..</h5>");
                $('#searchedProperties, #noOfRecordsFound').html("");

            },
            success: function (resp) {
                $('#searchBtn').prop('disabled', false);
                $("#searchBtn").html("<i class=\"fa fa-search\"></i> Search");
                if (resp.code == "200") {
                    $('#searchedProperties').html("");
                    if (resp.data.properties.length > 0) {
                        APTs = resp.data.properties;
                        $('#noOfRecordsFound').html(resp.data.properties.length + " properties found.");
                        $.template("infoWindow", $('#infoWindow').html());
                        $.template("listWindow", $('#listWindow').html());
                        $.each(resp.data.properties, function (index, p) {

                            var property = {
                                index: index,
                                id: p.id,
                                for_sale: p.for,
                                address: p.address,
                                short_address: p.short_address,
                                county: p.county,
                                price: '$'+p.price,
                                bedrooms: p.bedrooms,
                                bathrooms: p.bathrooms,
                                image: p.image,
                                lat: p.lat,
                                lng: p.lng
                            }

                            var infoWindowHtml = $.tmpl("infoWindow", [property]);

                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(p.lat, p.lng),
                                map: map,
                                icon: {
                                    path: MAP_PIN_O,
                                    fillColor: '#222e44',
                                    fillOpacity: 1,
                                    strokeColor: '#fff',
                                    strokeWeight: 0.5,
                                    scale: 0.1,
                                },
                                map_icon_label: '<i class="fa fa-circle"></i>'
                            });

                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent(infoWindowHtml.html());
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));

                            markers.push(marker);
                            bounds.extend(marker.position);

                            $('#searchedProperties').append($.tmpl("listWindow", [property]));

                            $('#apartment_' + index).fadeIn();

                        });


                        map.fitBounds(bounds);
                    } else {
                        $('#searchedProperties').html("<h5 class='h5'>No record found</h5>");
                    }
                }

            }
        });
    });
    setTimeout(function () {
        $('#searchBtn').click();
    }, 1000);

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

}
