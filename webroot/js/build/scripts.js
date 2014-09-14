$(document).ready(function() {
  $('#SchedulePlace').on('keyup', function(){
    $(this).autocomplete({
      source: '/schedules/index.json',
      minLength: 3,
      select: function(event,ui){
        //$(this).val(ui.item.value); 
        //$('.billing-country-name').empty().append(ui.item.value);
        //$('#AddressBillingCountry').attr('value', ui.item.id);
        //$('#AddressShippingCountry').attr('value', ui.item.id);
      }
    });
  });
});
