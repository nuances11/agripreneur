$(function() {

    // Add product
    $("#add_product").submit(function(event) {

        var formData = new FormData(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        var err_msg = '';
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Product created successfully!');
                    window.location.href = base_url + 'product/add';
                }
            }
        });

    });

    $("#edit_product").submit(function(event) {

        var formData = new FormData(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        var err_msg = '';
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Product updated successfully!');
                    window.location.href = base_url + 'product/list';
                }
            }
        });

    });

    $('#update_user').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();

        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Profile updated successfully!');
                    window.location.href = base_url + 'user/edit';
                }
            }
        });
    })

});
