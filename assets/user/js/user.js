$(function() { 

    // Add product
    $("#add_product").submit(function(event) {

        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        var err_msg = '';
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Product created successfully!');
                    window.location.href = base_url + 'product/add';
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
    //
    //         longInput.value = longitude;
    //         latInput.value = latitude;
    //
    //
    //     });
    // });

});
