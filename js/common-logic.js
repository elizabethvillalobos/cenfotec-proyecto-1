
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
  
  if(!expreg.test(pCorreo))
    pElementoError.innerHTML=pMsjError;
    pElementoError.className += ' error';;
}