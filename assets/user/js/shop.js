$(function() {

    $('#add_to_cart').submit(function(e){
        e.preventDefault();
        var formData = $(this);
        var base_url = $('#base_url').val();
        var action_url = $('#action_url').val();
        console.log(action_url);
        $.ajax({
            type: 'POST',
            url: action_url,
            data: formData.serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    alert("Error adding item(s) on cart");
                } else {
                    alert("Product Added into Cart");
                    location.reload();
                }
            }
        });

    })

    $('#clear_cart').click(function(){
        var url = $(this).data('url');
        console.log(url);
        var result = confirm('Are you sure want to clear all cart items?');

        if (result) {
            $.ajax({
                url: url,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (!data.success) {
                        alert("Error removing items on cart");
                    } else {
                        location.reload();
                    }
                }
            });
        } else {
            return false; // cancel button
        }

    })

    $('#btn-plus').click(function(){
        console.log(this);
        var quantity = $('#quantity').val();
        console.log(quantity);
    })

    $('#btn-minus').click(function(){
        console.log(this);
    })
})
