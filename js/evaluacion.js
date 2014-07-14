// document.getElementById('no').onclick = 
// function mostrarForm(){
//   document.getElementById('wrapperItems');
//   wrapperItems.classList.remove("mostrarForm");
//   wrapperItems.classList.add("ocultarForm");            
// }

var eRadiosChecked = document.querySelectorAll('.radio');
if (eRadiosChecked) {
	for(var i=0; i < eRadiosChecked.length; i++) {
		eRadiosChecked[i].addEventListener('click', function(event) {
			var eEl = event.currentTarget,
				eElParent = closestParentNode(eEl, 'accordion-detail'),
				eWrapperItems = eElParent.querySelector('.wrapperItems');

			if (eEl.querySelector('input[type="radio"]').value == 'si') {
				eWrapperItems.className += ' visible';
			} else {
				removeClass(eWrapperItems, 'visible');
			}
		});
	}
}