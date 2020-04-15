$(document).ready(function(){
	$('#guardar_registro').on('submit', function(e){
		e.preventDefault();
		var datos = $(this).serializeArray();
		//lamado ajax con jquery
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data){
				console.log(data);
				var resultado = data;
				if(resultado.respuesta === 'exito'){
					Swal.fire({
						title: 'Correcto',
						text: 'se Guardó correctamente',
						icon: 'success'
					});
				}else{
					Swal.fire({
					  icon: 'error',
					  title: 'Hubo un Error',
					  text: 'Hubo un error',
					})
				}
			} 
		});
	});
//se ejecuta cuando hay un archivo
$('#guardar_registro-archivo').on('submit', function(e){
	e.preventDefault();

	//LOS archivos  subirdos en ajax se procesan con un FormData(this)
	var datos = new FormData(this);

	$.ajax({
		type: $(this).attr('method'),
		data: datos,
		url: $(this).attr('action'),
		dataType: 'json',
		contentType: false,
		processData: false,
		async: true,
		cache: false,
		success: function(data){
			console.log(data);
			var resultado = data;
			if(resultado.respuesta === 'exito'){
				Swal.fire({
					title: 'Correcto',
					text: 'se Guardó correctamente',
					icon: 'success'
				});
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Hubo un Error',
				  text: 'Hubo un error',
				})
			}
		}
	});
});

//eliminar un registro
$('.borrar_registro').on('click', function(e){
	e.preventDefault();
	var id = $(this).attr('data-id');
	var tipo = $(this).attr('data-tipo');

	Swal.fire({
		  title: 'Estas Seguro?',
		  text: "esta accion no se puede deshacer!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, borrar!',
		  cancelButtonText: 'cancelar'
		}).then((result) => {
		  if (result.value) {
			  	$.ajax({
					type: 'post',
					data: {
						'id' : id,
						'registro' : 'eliminar'
					},
					url: 'modelo-'+tipo+'.php',
					success: function(data){
						console.log(data);
						var resultado = JSON.parse(data);
						if(resultado.respuesta == 'exito'){
							Swal.fire(
						      'Eliminado!',
						      'Registro eliminado',
						      'success'
						    )
						    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
						}else{
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'no se pudo eliminar'
							})
						}
						
					}
				});
		  }
	});
});
});