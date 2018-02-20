$(function() {

    $('#add_category').submit(function(e) {
        e.preventDefault();
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    window.location.href = base_url + 'admin/category';
                }
            }
        });
    })

    $('#edit_category').submit(function(e) {
        e.preventDefault();
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    window.location.href = base_url + 'admin/category';
                }
            }
        });
    })

    $('#add_sub_category').submit(function(e) {
        e.preventDefault();
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    window.location.href = base_url + 'admin/subcategory';
                }
            }
        });
    })

    $('#edit_sub_category').submit(function(e) {
        e.preventDefault();
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    window.location.href = base_url + 'admin/subcategory';
                }
            }
        });
    })

})