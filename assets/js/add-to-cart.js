$(document).ready(function() {
    btnAddToCart = $('.btn-add-cart');
    form = $('.form-cart');
    action = form.attr('action');
    valueQuantity = $('.quantity-cart').val();
    popUpAdd = $('.popup-add');
    error = $('.error');

    // Block out Submit Input
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    btnAddToCart.click(function(e) {
        e.preventDefault();
        valueQuantity = $('.quantity-cart').val();

        $.ajax({
            url: action,
            method: 'post',
            data: {quantity: valueQuantity}
        }).done(function(data) {
            if(data === 'Success') {
                popUpAdd.css('display', 'block');
                error.text('');
            } else {
                error.text(data);
                popUpAdd.css('display', 'none');
            }
        });
    })

    // Close Popup
    $('.btn-close-popup').click(function() {
        popUpAdd.css('display', 'none');
    })

})