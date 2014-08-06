var tblSelectable = document.querySelector(".selectable");
if(tblSelectable!=null)
{
	trRedirect(tblSelectable,"reporte-especifico.php");
}
function trRedirect(ptable, ppage){
	var rows = ptable.getElementsByTagName("tr");
	for (i = 1; i < rows.length; i++) {
		var row = ptable.rows[i];
		row.onclick = function(){
						  window.location.href = ppage;
					  };
	};
}
