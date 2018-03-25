$(function() {

    $('#add_to_cart').submit(function(e) {
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

    $('#clear_cart').click(function() {
        var url = $(this).data('url');
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

    $('#btn-plus').click(function() {
        var quantity = $('#quantity').val();
        var url = $(this).data('url');
        var id = $(this).data('id');
        var newQuantity = 0;
        if (quantity > 0) {
            quantity++;
        }
        document.getElementById("quantity").value = quantity;

        $.ajax({
            url: url + "/" + quantity + "/" + id,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    alert("Error updating items on cart");
                } else {
                    location.reload();
                }
            }
        });

    })

    $('#btn-minus').click(function() {
      var quantity = $('#quantity').val();
      var url = $(this).data('url');
      var id = $(this).data('id');
      var newQuantity = 0;
      if (quantity > 0) {
          quantity--;
      }
      document.getElementById("quantity").value = quantity;
      $.ajax({
          url: url + "/" + quantity + "/" + id,
          dataType: 'json',
          success: function(data) {
              console.log(data);
              if (!data.success) {
                  alert("Error updating items on cart");
              } else {
                  location.reload();
              }
          }
      });
    })

    $('#btn-remove').click(function(){
      var id = $(this).data('id');
      var url = $(this).data('url');
      var result = confirm('Are you sure want to remove this item?');
      if (result) {
          $.ajax({
              url: url + "/" + id,
              dataType: 'json',
              success: function(data) {
                  console.log(data);
                  if (!data.success) {
                      alert("Error removing item on cart");
                  } else {
                      location.reload();
                  }
              }
          });
      } else {
          return false; // cancel button
      }
    })

    $('#place_order').submit(function(e){
      e.preventDefault();
      var formData = $(this);
      var action = $(this).data('action');
      var url = $(this).data('url');

      $.ajax({
          type: 'POST',
          url: action,
          data: formData.serialize(),
          dataType: 'json',
          success: function(data) {
              console.log(data);
              if (!data.success) {
                  $('#err').html('<div class="alert alert-danger" role="alert"><strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + data.errors + '</strong></div>');
                  //alert("Error on processing items");
              } else {
                  alert("Products ordered successfully! Please wait a few minutes for confirmation");
                  window.location.href = url;
              }
          }
      });

    })

    $("#upload_form").submit(function(event) {

        var formData = new FormData(this);
        var base_url = $(this).data('url');

        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: base_url + "upload/form",
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if (!data.success) {
                    $('#err').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data.errors + '</div>');
                } else {
                    alert('Form uploaded successfully!');
                    window.location.reload(true);
                }
            }
        });

    });


    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    $('#product_sort').on('change', function() {
        var category = $(this).data('category');
        var subcategory = $(this).data('subcategory');
        var filter = $(this).val();
        var base_url = $(this).data('url');
        var type = $(this).data('filter');
        var loc = '';
        if (type == 'all') {
            window.location.href = base_url + 'products/all?q=' + filter;
        } else {
            if (filter == 'nearest_5') {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }

            } else {
                window.location.href = base_url + 'products/cat/' + category + '/sub/' + subcategory + '?q=' + filter;
            }

        }
    })

    function showPosition(position) {
        var x = document.getElementById("product_sort");
        var category = $("#product_sort").data('category');
        var subcategory = $("#product_sort").data('subcategory');
        var filter = $("#product_sort").val();
        var base_url = $("#product_sort").data('url');

        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        console.log(lat);
        console.log(long);
        window.location.href = base_url + 'products/all?q=' + filter + '&lat=' + lat + '&long=' + long;
    }
})
