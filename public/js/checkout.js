Stripe.setPublishableKey('pk_test_WmOsdwEJaDIuLTabd7RB3UC2');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        //type: $('#card-type').val()
        //address_zip:$('#address-zip').val(),
    }, stripeResponseHandler);
    return false;
   /* Stripe.createToken('card',{
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val(),
        //address_zip:$('#address-zip').val(),
    }, stripeResponseHandler);*/
    
});

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
}
