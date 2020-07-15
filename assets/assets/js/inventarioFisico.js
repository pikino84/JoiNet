function invGetProd(el){

	//console.log($(this).val());

	var cve_art = $(el).val();

	$.ajax({
		method  : 'POST',
		url     : '/InventarioFisico/GetProducto',
		dataType: 'json',
		data    : { 'cve_art': cve_art }
	}).done(function(ret) {
		
		$('#descr-1').val(ret.products_name);
		$('#exist_sae-1').val(ret.exist_sae);
		
	});
}

$(function () {

/***********/


   
/***********/
});
