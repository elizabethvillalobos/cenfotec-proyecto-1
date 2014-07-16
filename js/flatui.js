
// ------------------------------------------
// Inializar funcionalidad de Flat-UI (no modificar)
// ------------------------------------------
(function($) {
	var selects = $('select');
	if (selects) {
		$('select').selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
	}
    
    var btnGroud = $(".btn-group");
    if (btnGroud) {
    	$('.btn-group').on('click', 'a', function() {
      	$(this).siblings().removeClass('active').end().addClass('active');
    	});
	}
})(jQuery);