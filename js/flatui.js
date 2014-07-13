
// ------------------------------------------
// Inializar funcionalidad de Flat-UI (no modificar)
// ------------------------------------------
(function($) {
    $("select").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    
    $(".btn-group").on('click', "a", function() {
      $(this).siblings().removeClass("active").end().addClass("active");
    });
})(jQuery);