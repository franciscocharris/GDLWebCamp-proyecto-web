$(document).ready(function () {
    $('.sidebar-menu').tree()
//cambiar el texto del datatable del ingles al español
    $('#registros').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
        paginate: {
          next: 'siguiente',
          previous: 'Anterior',
          last: 'ultimo',
          first: 'primero'
        },
        info: 'Mostrando _START_  a  _END_ de _TOTAL_ resultados',
        emptyTable: 'no hay registros',
        infoEmpty: '0 Registros',
        search: 'Buscar: '
      }
    });

    //inabilita el boton submit con bootsrap
$('#crear_registro_admin').attr('disabled', true);

$('#repetir_password').on('input', function(){
  var password_nuevo = $('#password').val();

  if($(this).val() == password_nuevo){
    $('#resultado_password').text('correcto');
    $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
    $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
    $('#crear_registro_admin').attr('disabled', false);
  }else{
    $('#resultado_password').text('no son iguales');
    $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
    $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
    $('#crear_registro_admin').attr('disabled', true);

  }
});

    $('#fecha').datepicker({
       autoclose: true
    });

    $('.seleccionar').select2();

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    });

    $('#icono').iconpicker();

  //icheck
    $('input[type="checkbox"].minimal, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    });


    // LINE CHART
    //funcion de jquery en el que el primer parametro es la url de donde va a sacar los datos, el segundo es la funcion conlos datos

  $.getJSON('servicio-registrados.php', function(data){
      var line = new Morris.Line({
        element: 'grafica-registros',
        resize: true,
        data: data,
        //el eje x
        xkey: 'fecha',
        //el eje y acuerdate de matematicas
        ykeys: ['cantidad'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
    })

});
