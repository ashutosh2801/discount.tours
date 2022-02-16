$(function() {
    
    var creditCard = $('#cc-number');

  function validateCard() {

    creditCard.after('<i class="icon-ok"></i>');
    creditCard.before('<span class="card"></span>');
    var cardHolder = $('span.card');


    creditCard.validateCreditCard(function(result) {

			console.log('test');
      var ele = $(this),
          paymentIcons = ele.hasClass('*[class*="card-"]'),
          checkmark = ele.siblings('.icon-ok');


      var removeIcon = ele.removeClass(function(index, css) {
        return (css.match (/\bcard-\S+/g) || []).join(' ');
      });

			if (result.card_type !== null) {
				cardHolder.html('<span class="card-'+result.card_type.name+'"></span>');
			}
			else {
				cardHolder.html('<span class="card-generic"></span>');
			}


      if (result.valid) return checkmark.addClass('valid');
      else return checkmark.removeClass('valid');

      }, {
        accept: ['visa', 'mastercard', 'discover', 'amex']
      });

  }
  if (creditCard.data('creditcard') == true) {
      validateCard();
  }
});