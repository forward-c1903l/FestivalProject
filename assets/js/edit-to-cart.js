$(document).ready(function() {
    inputQuantity = $('.quantity-item');
    priceTotal = $('.price_total');
    // Block out Submit Input
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });



    //------------------- Change quantity -------------------//
    let valueDefault = 0;
    inputQuantity.on('focusin', function() {
        // get value before change
        valueDefault = $(this).val();
    })

    inputQuantity.change(function(){ 
        let $this = $(this);
        //input current
        let valueQuantity = $this.val();// value when change
        let idInput = $this.attr('name');

        let changes = {
            id: idInput,
            value: valueQuantity
        };
        $.ajax({
            url: 'edit-to-cart.php',
            method: 'post',
            data: {changes}
        }).done(function(data) {
            // Receive JSON
            let dataNew = JSON.parse(data);

            if(!dataNew['status']) {
                $this.val(valueDefault);// Returns the value before quantity change fails

                alert(dataNew['error']);
            } else {
                let stringTotal = `${dataNew['total']} VND`;
                priceTotal.text(stringTotal);// change the total value when the quantity change is successful

                $this.attr('value', valueQuantity);// Change the value of name when the quantity change is successful
                toastr.success('You have successfully changed the number of items in your shopping cart !');
            }
        });

    })



    // ---------------------Delete item ----------------------//
    let btnDel = $("button[name='delete_item']");
    btnDel.click(function() {
        let $this = $(this);
        let idDel = $this.val();

        $.ajax({
            url: 'edit-to-cart.php',
            method: 'post',
            data: {delete: idDel}
        }).done(function(data) {
            if(data === "Success") {
                toastr.success('You have successfully deleted items in the cart !');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        });
    })
})