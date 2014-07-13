
// ------------- ATENCION -------------------
// Ordenen esta vara alfabeticamente porque sino se vuelve un arroz con mango. 
// Es mas facil encontrar las funciones cuando estan en orden alfabetico.
// Y por fa, documenten las funciones. Antes de declarar la funcion, 
// agreguen un comentario diciendo que hace la funcion.
// 
// 
// Organizacion del archivo
//   1. Funciones generales
//   2. Inicializacion de funcionalidad especificas.
// ------------------------------------------



// ------------------------------------------
// Funciones generales
// ------------------------------------------

// Agrega un nuevo elemento/nodo al DOM.
// @pTag: tipo de elemento a crear (div, span, etc.)
// @pId: ID que va a tener el nuevo elemento.
// @pClassName: clases que va a tener el nuevo elemento.
// pText: texto que va a tener el elemento.
// @pNode: elemento/nodo al que hay que agregar el nuevo elemento
function addElementToDOM(pTag, pId, pClassName, pText, pNode) { 
    var pId = pId || '',
        pClassName = pClassName || '',
        pText = pText || '',
        eEl = document.createElement(pTag),
        eContent = document.createTextNode(pText);

    eEl.id = pId;
    eEl.className = pClassName;
    eEl.appendChild(eContent); 
    pNode.appendChild(eEl);
}

// Busca el nodo padre mas cercano que tenga la clase 
// pParentName
// @pChildObj: elemento del DOM a partir de donde se realiza la busqueda
// @pParentName: nombre de la clase a buscar
function closestParentNode(pChildObj, pParentName) {
    var node = pChildObj.parentNode;
    while (!hasClass(node, pParentName)) {
        node = node.parentNode;
    }
    return node;
};

// Devuelve true o false si en un elemento del DOM tiene la clase
// que se pasa por parametro.
// @pEl: elemento del DOM a verificar.
// @pClassName: clase a verificar.
function hasClass(pEl, pClassName) {
    return pEl.className.indexOf(pClassName) > -1 ? true : false;
};

// Muestra una ventana modal.
// Esta funcion utliza tres clases en el HTML:
//   .js-modal: elemento que abre el modal window.
//   .js-modal-close: elemento para cerrar el modal window.
//   .js-modal-window: este es la ventana modal a mostrarse.
// Ver el pattern library como referencia para el HTML.
function modalWindow() {
    var eModalItems = document.querySelectorAll('.js-modal'),
        eModalCloseItems = document.querySelectorAll('.js-modal-close, .js-modal-aceptar'),
        eBody = document.querySelector('body');

    // Elementos que abren el modal window
    for (var modal=0; modal < eModalItems.length; modal++) {
        eModalItems[modal].addEventListener('click', function(event) {
            event.preventDefault();
            var sModalId = event.currentTarget.dataset.modalId,
                eModalWindow = document.querySelector('#' + sModalId);
            eModalWindow.className = eModalWindow.className.trim() + ' visible';
            addElementToDOM('div', 'overlay', 'overlay', '', eBody);
        });
    }
    // Elementos que cierran el modal window
    for (var modalClose=0; modalClose < eModalCloseItems.length; modalClose++) {
        eModalCloseItems[modalClose].addEventListener('click', function(event) {
            event.preventDefault();
            var eModalWindow = closestParentNode(event.currentTarget, 'js-modal-window'),
                eOverlay = document.querySelector('#overlay');

            eModalWindow.className = eModalWindow.className.replace('visible', '').trim();
            eBody.removeChild(eOverlay);
        });
    }
};

// Validar que solo puedan introducirse letras
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla)==-1 && !tecla_especial) {
        return false;
    }
}

// Hace toggle de una clase a un elemento del DOM.
// Las clases a asignar son: "collapsed" y "expanded".
// @pEl: elemento del DOM a verificar.
//
// Ejemplo:
// Antes
//  <div class="accordion collapsed"></div>
// Despues:
//  <div class="accordion expanded"></div>
function toggleClass(pEl) {
    if (hasClass(pEl, 'collapsed')) {
        if (pEl.className.indexOf(' collapsed') != -1) {
            pEl.className = pEl.className.replace('collapsed', '').trim();
        }
        pEl.className += ' expanded';        
    } else {
        if (pEl.className.indexOf('expanded') != -1) {
            pEl.className = pEl.className.replace('expanded', '').trim();
        }
        pEl.className += ' collapsed';
    }
};

// Validar que dos campos contengan la misma informacion.
function validarCamposIguales(pArreglo, pElemetoError, pMsjError){
    var diferentes=false;
    for(var i=0; i<pArreglo.length; i++){
        if(pArreglo[i].value == pArreglo[i+1].value){
            diferentes=true;
        }
    }    
    
    if(diferentes){
        pElementoError.innerHTML=pMsjError;
        pElementoError.className += ' error';
    }        
};

// Validar que los campos de un formulario esten llenos.
function validarCamposLlenos(pArreglo, pElementoError, pMsjError){
   var regis=false;
    for(var i=0; i<pArreglo.length; i++){
        
        if(pArreglo[i].value=='') {  
           regis=true;
        }
    }
    
    if(regis){
        pElementoError.innerHTML=pMsjError;
        pElementoError.className += ' error';
    }
    
    return regis;
};

// Validar que correo sea valido y pertenezca el dominio de Cenfotec.
function validarCorreo(pCorreo, pElementoError, pMsjError) { 
  var expreg = new RegExp("^[@ucenfotec.ac.cr]$");
  
  if(!expreg.test(pCorreo)){
    pElementoError.innerHTML=pMsjError;
    pElementoError.className += ' error';
  }
};


// ------------------------------------------
// Inicializar funcionalidades
// ------------------------------------------

// Inicializar acordeones
var eAccordionItems = document.querySelectorAll('.accordion-item > a');
for (var i=0; i < eAccordionItems.length; i++) {
    var eItem = eAccordionItems[i].parentNode;

    if (eItem.querySelectorAll('.accordion-detail').length) {
        // Agregar la clase collapsed a los elementos del sidebar no activos.
        if (!hasClass(eItem, 'expanded')) {
            eItem.className += ' collapsed';
        }

        eAccordionItems[i].addEventListener('click', function(event) {
            event.preventDefault();
            toggleClass(event.currentTarget.parentNode);
        });
    }
};

// Inicializar modal windows
// ------------------------------------------
modalWindow();


