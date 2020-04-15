$(document).ready(function(){
	/////login
	$('#login-admin').on('submit', function(e){
		e.preventDefault();
		var datos = $(this).serializeArray();
		//llamado ajax con jquery
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data){
				var resultado = data;
				if(resultado.respuesta === 'exitoso'){
					Swal.fire({
						title: 'Login Correcto',
						text: 'Bienveni@ ' + resultado.usuario + '!!',
						icon: 'success'
					})
					.then(resultado =>{
						if(resultado.value){
							window.location.href = 'admin-area.php';
						}
					})
				}else{
					Swal.fire({
					  icon: 'error',
					  title: 'Usuario o password incorrectos',
					  text: 'Hubo un error',
					})
				}

			}
		});
	});
});
	