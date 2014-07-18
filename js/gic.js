// ------------------------------------------
// Inializar funcionalidad de Flat-UI (no modificar)
// ------------------------------------------
(function($) {
	var selects = $('select');
	if (selects.length) {
		$('select').selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
	}
    
    var btnGroud = $('.btn-group');
    if (btnGroud.length) {
    	$('.btn-group').on('click', 'a', function() {
      	$(this).siblings().removeClass('active').end().addClass('active');
    	});
	}

	var aDatePickers = $('.datepicker');
	if (aDatePickers.length) {
		for (var i = 0; i < aDatePickers.length; i++) {
			aDatePickers[i].datepicker();
		}
	}
})(jQuery);
