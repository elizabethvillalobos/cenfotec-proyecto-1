(function($) {
    $("select").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    
    $(".btn-group").on('click', "a", function() {
      $(this).siblings().removeClass("active").end().addClass("active");
    });
})(jQuery);


// Devuelve true o false si en un elemento del DOM tiene una clase
function hasClass(pEl, pClassName) {
    return pEl.className.indexOf(pClassName) > -1 ? true : false;
};

// Hacer toggle de una clase a un elemento del DOM.
// Las clases a asignar son: "collapsed" y "expanded".
function toggleClass(pEl) {
    if (hasClass(pEl, 'collapsed')) {
        if (pEl.className.indexOf(' collapsed') != -1) {
            pEl.className = pEl.className.replace('collapsed', '');
        }
        pEl.className += ' expanded';        
    } else {
        if (pEl.className.indexOf('expanded') != -1) {
            pEl.className = pEl.className.replace('expanded', '');
        }
        pEl.className += ' collapsed';
    }
};

// Accordion
var eAccordionItems = document.querySelectorAll('.accordion-item > a');
for (var i=0; i < eAccordionItems.length; i++) {
    var eItem = eAccordionItems[i].parentNode;
    // Agregar la clase collapsed a los elementos del sidebar no activos.
    if (!hasClass(eItem, 'expanded')) {
        if (eItem.querySelectorAll('.accordion-detail').length) {
            eItem.className += ' collapsed';
        }
    }

    eAccordionItems[i].addEventListener('click', function(event) {
        event.preventDefault();
        toggleClass(event.currentTarget.parentNode);
    });
}


