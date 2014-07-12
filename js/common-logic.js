
function validarCamposLlenos(pArreglo, pElementoError, pMsjError){
   var regis=false;
    for(var i=0; i<pArreglo.length && regis==false; i++){
        
        if(/^\s+$/.test(pArreglo[i])){
           regis=true;
        }
        
    }
    
    if(!regis){
        pElementoError.className -= ' error'
        pElementoError.innerHTML=pMsjError;
    }

}

function validarCorreo(pCorreo) { 
  var expreg = new RegExp("^[@ucenfotec.ac.cr]$");
  
  if(!expreg.test(pCorreo))
    alert("El correo es incorrecto");
}