$(document).ready(function() {
    let btnPayment = $('#btn_payment');

    btnPayment.click(function() {
        var paymentMethod = $("input[name='payment']:checked").val();
        
        
        $.ajax({
            url: `invoice.php`,
            method: 'post',
            data: {proceed: {status: true, payment: paymentMethod}}
        }).done(function(data) {
            let dataNew = JSON.parse(data);

            if(dataNew['status']) {
                $('.pop-up-completed-payment').css('display', 'block');

                let linkInvoice = `information.php?page=receipt&inv=${dataNew['idinvoice']}`;

                $('#id_invoice').text(dataNew['idinvoice']).attr('href', linkInvoice);
                $('#link_invoice').attr('href', linkInvoice);
            }

        });

    });

    $('.close-popup').click(function() {
        $('.pop-up-completed-payment').css('display', 'none');
    })
})