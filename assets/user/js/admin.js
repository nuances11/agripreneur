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
    $('#sub-category').hide();
    $('#category_btn').hide();
    $('#category').on('change', function() {
        var value = $(this).val();
        var source_url = $('#source_url').val();
        if (value == '') {
            $('#sub-category').hide();
        } else {
            $('#sub-category').show();
            $.ajax({
                type: 'GET',
                url: source_url + '/' + value,
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    console.log(data.length);
                    if (data.length == 0) {
                        $('#sub-category').hide();
                        $('#category_btn').hide();
                    } else {
                        var opt = '';
                        for (var i = 0; i < data.length; i++) {
                            console.log(data[i]['subcategory_name']);
                            opt += '<option value ="' + data[i]['subcategory_id'] + '">' + data[i]['subcategory_name'] + '</option>';
                        }
                        $('#sub_category').html(opt);
                        $('#category_btn').show();
                    }

                }
            });
        }
    })

    $('#add_product_category').submit(function(e){
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
                    window.location.href = base_url + 'admin/product';
                }
            }
        });
    })

    $('#add_unit').submit(function(e) {
        e.preventDefault();
        console.log(this);
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
                    window.location.href = base_url + 'admin/unit';
                }
            }
        });
    })

    // Add product
    $("#admin_add_product").submit(function(event) {

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
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Product created successfully!');
                    window.location.href = base_url + 'admin/product/add';
                }
            }
        });

    });

    $('#accept_order').click(function(){
        var id = $(this).data('id');
        var url = $(this).data('url');
        var number = $('#contact_number').data('number');
        var result = confirm('Are you sure want to accept this transaction?');
        var formData = {
            'id' : id,
            'number' : number
        }
        if (result) {
            $.ajax({
                type: 'POST',
                data: formData,
                url: url + 'admin/accept/order',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (!data.success) {
                        alert(data.error);
                    }else{
                        alert('Order Accepted');
                        window.location.href = url + 'admin/orders/pending';
                    }
                }
            });
        }
    })

    $('#cancel_order').click(function(){
        var id = $(this).data('id');
        var url = $(this).data('url');
        var number = $('#contact_number').data('number');
        var result = confirm('Are you sure want to cancel this transaction?');
        var formData = {
            'id' : id,
            'number' : number
        }
        if (result) {
            $.ajax({
                type: 'POST',
                data: formData,
                url: url + 'admin/cancel/order',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (!data.success) {
                        alert(data.error);
                    }else{
                        alert('Order Cancelled');
                        window.location.href = url + 'admin/orders/pending';
                    }
                }
            });
        }
    })
})
