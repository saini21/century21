$(document).ready(function () {

        $('#apartmentPhone, #realtorPhone').usPhoneFormat();

        $('.js-select').selectpicker();

    $("#apartmentRegisterForm").validate({
        ignore: ":hidden:not(#apartmentIAccept)",
        rules: {
            apartment_name: {
                required: true
            },
            management_company: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: SITE_URL + '/users/isUniqueEmail'
            },
            password: {
                required: true,
                minlength: 8,
                pwcheck: true
            },
            confirm_password: {
                required: true,
                equalTo: "#apartmentPassword"
            },
            phone: {
                required: true,
                phoneUS: true
            },
            address: {
                required: true
            },
            city_id: {
                required: true
            },
            state_id: {
                required: true
            },
            zip: {
                required: true
            },
            how_did_you_find_us: {
                required: false
            },

            i_accept: {
                required: true
            }
        },
        messages: {
            apartment_name: {
                required: "Please enter apartment name."
            },
            management_company: {
                required: "Please enter management company."
            },
            email: {
                required: "Please enter email.",
                email: "Please enter valid email.",
                remote: "Email already exists"
            },
            password: {
                required: "Please enter password.",
                minlength: "Password must be greater than 8 characters",
                pwcheck: "Password must contain atleast one capital character and one numeric."
            },
            confirm_password: {
                required: "Please confirm password.",
                equalTo: "Password does not match."
            },
            phone: {
                required: "Please enter phone number."
            },
            address: {
                required: "Please enter address."
            },
            city_id: {
                required: "Please select city name."
            },
            state_id: {
                required: "Please select state name."
            },
            zip: {
                required: "Please enter zip."
            },
            how_did_you_find_us: {
                required: "Please fill this field."
            },
            i_accept: {
                required: "Please accept terms and conditions."
            }
        },
        submitHandler: function (form) {
            var options = {direction: 'left'};
            $('#signUpApartmentUserForm').hide('drop', options, 700, function () {
                $("#signUpApartmentInfoForm").fadeIn();
            });
            return false;
        }
    });


    $(document).on("click", "#apartmentInfoBackBtn", function (e) {
        e.preventDefault();
        var options = {direction: 'right'};
        $('#signUpApartmentInfoForm').hide('drop', options, 700, function () {
            $("#signUpApartmentUserForm").fadeIn();
        });
    });

    $('#apartmentStateId').change(function () {
        $.ajax({
            url: SITE_URL + 'users/getOptions',
            type: "POST",
            data: {query: $(this).val(), find: 'Cities', match: 'state_id'},
            dataType: "json",
            success: function (response) {
                if (response.suggestions.length > 0) {
                    var options = [];
                    options.push('<option class="bs-title-option" value="">City</option>');
                    $.each(response.suggestions, function (index, data) {
                        options.push('<option value="' + data.value + '" data-content=\'<span class="d-flex align-items-center w-100">' + data.label + '</span>\'>' + data.label + '</option>');
                    });

                    $('#apartmentCityId').html(options.join(''));

                    $('#apartmentCityId').selectpicker('refresh');
                }

            }
        });

        $.ajax({
            url: SITE_URL + 'users/getOptions',
            type: "POST",
            data: {query: $(this).val(), find: 'MarketPlaces', match: 'state_id'},
            dataType: "json",
            success: function (response) {
                if (response.suggestions.length > 0) {
                    var options = [];
                    options.push('<option class="bs-title-option" value="">City</option>');
                    $.each(response.suggestions, function (index, data) {
                        options.push('<option value="' + data.value + '" data-content=\'<span class="d-flex align-items-center w-100">' + data.label + '</span>\'>' + data.label + '</option>');
                    });

                    $('#apartmentMarketPlaceId').html(options.join(''));

                    $('#apartmentMarketPlaceId').selectpicker('refresh');
                }

            }
        });
    });


    $("#apartmentInfoForm").validate({
        ignore: ".ignore",
        rules: {
            manager_name: {
                required: true
            },
            regional_manager_name: {
                required: true
            },
            manager_email: {
                required: true,
                email: true,
                //remote: SITE_URL + 'users/isUniqueEmail',
                // remote: {
                //     url: SITE_URL + 'users/isUniqueEmail',
                //     type: "get",
                //     data: {
                //         email: function () {
                //             return $("#accounting-email").val();
                //         }
                //     }
                // }
            },
            regional_manager_email: {
                email: true,
                required: true,
                //remote: SITE_URL + 'users/isUniqueEmail',
                // remote: {
                //     url: SITE_URL + 'users/isUniqueEmail',
                //     type: "get",
                //     data: {
                //         email: function () {
                //             return $("#reporting-email").val();
                //         }
                //     }
                // }
            }

        },
        messages: {
            manager_name: {
                required: "Please enter manager name.",
            },
            regional_manager_name: {
                required: "Please enter regional manager name.",
            },
            manager_email: {
                required: "Please enter manager email.",
                email: "Please enter valid email.",
                // remote: "Email already exists"
            },
            regional_manager_email: {
                required: "Please enter regional manager email.",
                email: "Please enter valid email.",
                //remote: "Email already exists"
            }
        },
        submitHandler: function () {
            $('#apartmentInfoBtn').html('<i class="fa fa-spinner fa-spin"></i> processing...').attr('disabled', 'disabled');
            $.ajax({
                url: SITE_URL + "apartment-users/add",
                type: "POST",
                data: $("#apartmentRegisterForm").serialize() + "&" + $("#apartmentInfoForm").serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {

                        var options = {direction: 'right'};
                        $('#mainSection').hide('size', options, 700, function () {
                            $("#thankYouSection").fadeIn();
                        });
                    } else {
                        $('#anyErrorFromServer').html(response.message);
                        $('#apartmentInfoBtn').html('Sign Up').removeAttr('disabled');
                    }
                }
            });
            return false;
        }

    });


    $('.apartment-find-us-via').click(function () {
        console.log('hear');
        if ($(this).attr('id') == "apartmentFindViaInternet") {
            $('#apartmentReasonBox').fadeOut();
            $("#apartmentHowDidYouFindUs").rules("add", {
                required: false
            });
            $("#apartmentHowDidYouFindUs").val('Internet');
        } else {
            $('#apartmentReasonBox').fadeIn();
            $("#apartmentHowDidYouFindUs").rules("add", {
                required: true
            });
            $("#apartmentHowDidYouFindUs").val('');
        }

        if ($(this).attr('id') == "apartmentFindViaOther") {
            $("#apartmentHowDidYouFindUs").attr('placeholder', 'Other..');
        }

        if ($(this).attr('id') == "apartmentFindViaApartmentCommunity") {
            $("#apartmentHowDidYouFindUs").attr('placeholder', 'Apartment Community');
        }

        if ($(this).attr('id') == "apartmentFindViaRealtor") {
            $("#apartmentHowDidYouFindUs").attr('placeholder', 'Realtor Name');
        }

    });


    $("#realtorRegisterForm").validate({
        ignore: ":hidden:not(#realtorIAccept)",
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            company: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: SITE_URL + '/users/isUniqueEmail'
            },
            password: {
                required: true,
                minlength: 8,
                pwcheck: true
            },
            confirm_password: {
                required: true,
                equalTo: "#realtorPassword"
            },
            phone: {
                required: true,
                phoneUS: true
            },
            how_did_you_find_us: {
                required: false
            },

            i_accept: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please enter first name."
            },
            last_name: {
                required: "Please enter last name."
            },
            company: {
                required: "Please enter company name."
            },
            email: {
                required: "Please enter email.",
                email: "Please enter valid email.",
                remote: "Email already exists"
            },
            password: {
                required: "Please enter password.",
                minlength: "Password must be greater than 8 characters",
                pwcheck: "Password must contain atleast one capital character and one numeric."
            },
            confirm_password: {
                required: "Please confirm password.",
                equalTo: "Password does not match."
            },
            phone: {
                required: "Please enter phone number."
            },
            how_did_you_find_us: {
                required: "Please fill this field."
            },
            i_accept: {
                required: "Please accept terms and conditions."
            }
        },
        submitHandler: function (form) {
            var options = {direction: 'left'};
            $('#signUpRealtorUserForm').hide('drop', options, 700, function () {
                $("#signUpRealtorInfoForm").fadeIn();
            });
            return false;
        }
    });

    $(document).on("click", "#realtorInfoBackBtn", function (e) {
        e.preventDefault();
        var options = {direction: 'right'};
        $('#signUpRealtorInfoForm').hide('drop', options, 700, function () {
            $("#signUpRealtorUserForm").fadeIn();
        });
    });


    $('.find-us-via').click(function () {
        if ($(this).attr('id') == "realtorFindViaInternet") {
            $('#realtorReasonBox').fadeOut();
            $("#realtorHowDidYouFindUs").rules("add", {
                required: false
            });
            $("#realtorHowDidYouFindUs").val('Internet');
        } else {
            $('#realtorReasonBox').fadeIn();
            $("#realtorHowDidYouFindUs").rules("add", {
                required: true
            });
            $("#realtorHowDidYouFindUs").val('');
        }

        if ($(this).attr('id') == "realtorFindViaOther") {
            $("#realtorHowDidYouFindUs").attr('placeholder', 'Other..');
        }

        if ($(this).attr('id') == "realtorFindViaApartmentCommunity") {
            $("#realtorHowDidYouFindUs").attr('placeholder', 'Apartment Community');
        }

        if ($(this).attr('id') == "realtorFindViaRealtor") {
            $("#realtorHowDidYouFindUs").attr('placeholder', 'Realtor Name');
        }

    });


    $("#realtorInfoForm").validate({
        ignore: ".ignore",
        rules: {
            address: {
                required: true
            },
            city_id: {
                required: true
            },
            state_id: {
                required: true
            },
            zip: {
                required: true
            },
            licence_number: {
                required: true
            },
            state_licensed_in: {
                required: true
            }
        },
        messages: {
            address: {
                required: "Please enter address."
            },
            city_id: {
                required: "Please enter city name."
            },
            state_id: {
                required: "Please enter state name."
            },
            zip: {
                required: "Please enter zip."
            },
            licence_number: {
                required: "Please enter licence number."
            },
            state_licensed_in: {
                required: "Please select state."
            }
        },
        submitHandler: function (form) {

            var options = {direction: 'left'};
            $('#signUpRealtorInfoForm').hide('drop', options, 700, function () {
                $("#signUpRealtorChooseCities").fadeIn();
            });

            return false;
        }
    });

    $('#searchCityByName').keyup(function () {
        var key = $(this).val();
        $(".city-main").hide();
        if (key.length > 0 && key != "") {
            $(".city-main[data-name^='" + key.toLowerCase() + "']:not(:empty)").show();
        } else {
            $(".city-main:not(:empty)").show();
        }
    });

    $('#searchCityByName').keydown(function () {
        var key = $(this).val();
        $(".city-main:not(:empty)").hide();
        if (key.length > 0 && key != "") {
            $(".city-main[data-name^='" + key.toLowerCase() + "']:not(:empty)").show();
        } else {
            $(".city-main").show();
        }
    });


    $("#addMarketPlaceForm").validate({
        ignore: ":hidden:not(.not-ignore)",
        rules: {
            'city[]': {required: true}
        },
        messages: {
            'city[]': {required: "Please choose atleast one city."}
        },
        submitHandler: function (form) {

             $('#realtorInfoBtn').html('<i class="fa fa-spinner fa-spin"></i> processing...').attr('disabled', 'disabled');

            $.ajax({
                url: SITE_URL + "realtors/add",
                type: "POST",
                data: $("#realtorRegisterForm").serialize() + "&" + $("#realtorInfoForm").serialize() + "&" + $("#addMarketPlaceForm").serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {
                        var options = {direction: 'left'};
                        $('#mainSection').hide('size', options, 700, function () {
                            $("#thankYouSection").fadeIn();
                        });
                    } else {
                        $('#anyErrorFromServer').html(response.message);
                        $('#realtorInfoBtn').html('Sign Up').removeAttr('disabled');
                    }
                }
            });
            return false;
        }
    });

    $('#realtorMarketPlaceId').change(function () {
        if ($(this).val().length > 0) {
            $('[for="city[]"]').hide();
            $('[name="city[]"]').rules("add", {
                required: false
            });
        } else {
            $('[name="city[]"]').rules("add", {
                required: true
            });
        }
    });


    $('#selectAll').click(function (e) {
        $('.select-row').prop('checked', true);
        $(this).addClass('active');
        $('#deselectAll').removeClass('active');

        $('#selectedCityHeading').html('All cities has been selected.');
        $('#selectedCities .select-row').each(function () {
            var cityId = $(this).val();
            $('#city_' + cityId).prop('checked', true);
            $('#citiBox_' + cityId).html($('#selectedCity_' + cityId).html())
            $('#selectedCity_' + cityId).remove();
            $('#citiBox_' + cityId).fadeIn();
            $('#city_' + cityId).prop('checked', true);
        });
    });

    $('#deselectAll').click(function (e) {
        $(this).addClass('active');
        $('#selectAll').removeClass('active');

        $('.select-row').prop('checked', false);
        $('#selectedCities .select-row').click();
        $('#selectedCityHeading').html('Selected Cities');
    });

    $('#chooseCities').on('click', '.select-row', function (e) {
        var totalChecks = $('.select-row').length;
        var checkedChecks = $('.select-row:checked').length;

        $('#selectAll').prop('checked', ((totalChecks == checkedChecks) ? true : false));


        var cityId = $(this).val();
        $('<div/>', {
            id: 'selectedCity_' + cityId,
            class: "col-md-12"
        }).appendTo('#selectedCities').append($('#citiBox_' + cityId).html());

        $('#citiBox_' + cityId).html("");
        $('#citiBox_' + cityId).hide();
        $('#city_' + cityId).prop('checked', true);
    });

    $('#selectedCities').on('click', '.select-row', function (e) {
        var cityId = $(this).val();
        $('#city_' + cityId).prop('checked', true);
        $('#citiBox_' + cityId).html($('#selectedCity_' + cityId).html())
        $('#selectedCity_' + cityId).remove();
        $('#citiBox_' + cityId).fadeIn();
        $('#city_' + cityId).prop('checked', false);
    });

    $('#realtorChooseCitiesBackBtn').click(function (e) {
        e.preventDefault();
        var options = {direction: 'right'};
        $('#signUpRealtorChooseCities').hide('drop', options, 700, function () {
            $("#signUpRealtorInfoForm").fadeIn();
        });
    });

    $('#realtorStateId').change(function () {
        $.ajax({
            url: SITE_URL + 'users/getOptions',
            type: "POST",
            data: {query: $(this).val(), find: 'Cities', match: 'state_id'},
            dataType: "json",
            beforeSend: function () {
                $('#citiesSelectBox').hide();
                $('#loadingRealtorCities').show();
            },
            success: function (response) {
                if (response.suggestions.length > 0) {
                    var options = [];
                    options.push('<option class="bs-title-option" value="">City</option>');
                    $.each(response.suggestions, function (index, data) {
                        options.push('<option value="' + data.value + '" data-content=\'<span class="d-flex align-items-center w-100">' + data.label + '</span>\'>' + data.label + '</option>');
                    });

                    $('#loadingRealtorCities').hide();
                    $('#citiesSelectBox').fadeIn();

                    $('#realtorCityId').html(options.join(''));

                    $('#realtorCityId').selectpicker('refresh');
                }

            }
        });
    });
    $('#realtorStateLicensedInId').change(function () {
        $.ajax({
            url: SITE_URL + 'users/getOptions',
            type: "POST",
            data: {query: $(this).val(), find: 'Cities', match: 'state_id'},
            dataType: "json",
            beforeSend: function () {
                $('#selectedLicensedStateName').val($.trim($('#realtorStateLicensedInId').find("option:selected").text()));
                //$('#selectAll').html("Select All Cities in " + $.trim($('#realtorStateLicensedInId').find("option:selected").text()));
                //$('#deselectAll').html("Deselect All Cities in " + $.trim($('#realtorStateLicensedInId').find("option:selected").text()));
                $("#chooseCities").html("<h3>Fetching Cities ...</h3>");
                $('#searchCityBox').hide();
            },
            success: function (response) {
                if (response.suggestions.length > 0) {
                    $('#searchCityBox, #selectAllCitiesBox').fadeIn();
                    $("#chooseCities").html("");
                    $.template("checkTmpl", $('#checkTmpl').html());
                    $.tmpl("checkTmpl", response.suggestions).appendTo("#chooseCities");
                }
            }
        });

        $.ajax({
            url: SITE_URL + 'users/getOptions',
            type: "POST",
            data: {query: $(this).val(), find: 'MarketPlaces', match: 'state_id'},
            dataType: "json",
            success: function (response) {
                if (response.suggestions.length > 0) {
                    var options = [];
                    options.push('<option class="bs-title-option" value="">Market Place</option>');
                    $.each(response.suggestions, function (index, data) {
                        options.push('<option value="' + data.value + '" data-content=\'<span class="d-flex align-items-center w-100">' + data.label + '</span>\'>' + data.label + '</option>');
                    });

                    $('#realtorMarketPlaceId').html(options.join(''));

                    $('#realtorMarketPlaceId').selectpicker('refresh');
                }

            }
        });
    });

});

$(document).on('ready', function () {
    // initialization of tabs
    $.HSCore.components.HSTabs.init('[role="tablist"]');

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    $('.select-user-type').click(function () {
        $('.select-user-type').removeClass('active');
        $(this).addClass('active');
        $('.select-user-form').hide();
        $('#' + $(this).attr('id') + 'Form').fadeIn();
    });
});

$(window).on('load', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });
});

$(window).on('resize', function () {
    setTimeout(function () {
        $.HSCore.components.HSTabs.init('[role="tablist"]');
    }, 200);
});
