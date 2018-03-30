$(function() {

    //User Registration
    $("#user_save").submit(function(event) { 
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        var err_msg = '';
        $('#err').html('');
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + data.errors + '</strong></div>');
                } else {
                    alert('User created successfully!');
                    window.location.href = base_url + 'login';
                }
            }
        });
 
    });

    // google.maps.event.addDomListener(window, "load", function() {
    //     var places = new google.maps.places.Autocomplete(document.getElementById("address"));
    //     places.setComponentRestrictions({ "country": ["ph"] });
    //     var longInput = document.getElementById("long");
    //     var latInput = document.getElementById("lat");
    //     google.maps.event.addListener(places, "place_changed", function() {
    //         var place = places.getPlace();
    //         var address = place.formatted_address;
    //         var latitude = place.geometry.location.lat();
    //         var longitude = place.geometry.location.lng();

    //         longInput.value = longitude;
    //         latInput.value = latitude;


    //     });
    // });
})
