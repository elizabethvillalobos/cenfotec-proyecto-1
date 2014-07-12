
function validarCamposLlenos(pArreglo, pElementoError, pMsjError){
   var regis=false;
    for(var i=0; i<pArreglo.length; i++){
        
        if(pArreglo[i].value==''){
           
           regis=true;
        }
        
    }
    
    if(regis){
        pElementoError.innerHTML=pMsjError;
        pElementoError.className += ' error';
    }
    
    return regis;

}

function validarCorreo(pCorreo, pElementoError, pMsjError) { 
  var expreg = new RegExp("^[@ucenfotec.ac.cr]$");
  
  if(!expreg.test(pCorreo)){
    pElementoError.innerHTML=pMsjError;
    pElementoError.className += ' error';
  }
}

function validar(){
    
}

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
        
}
//validar que solo puedan introducirse letras//
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }