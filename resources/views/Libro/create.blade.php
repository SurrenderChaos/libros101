<!DOCTYPE html>
<html lang="es">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
     <script type="text/javascript" src="jquery-1.3.2.js"> </script>

 <script type="text/javascript">

 $(document).ready(function() {

    $("#display").click(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/display.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response);
             
            //alert(response);
        }


    });
    

});
});

</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.layout')
@section('content')

<h3 align="center">Ajax con los libros</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<div id="responsecontainer" align="center">

</div>
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Libro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('libro.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del libro">
                                        
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <input type="text" name="npagina" id="npagina" class="form-control input-sm" placeholder="Número de Páginas">
                                       
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="resumen" class="form-control input-sm" placeholder="Resumen"></textarea>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <input type="text" name="edicion" id="edicion" class="form-control input-sm" placeholder="Edición del libro">
                                        
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="precio" id="precio" class="form-control input-sm" placeholder="Precio del libro">
									</div>
								</div>
							</div>
							<div class="form-group">
                                <textarea name="autor" id="autor" class="form-control input-sm" placeholder="Autor"></textarea>
                                
							</div>
							<div class="form-group">
                                        <input type="text" name="year" id="year" class="form-control input-sm" placeholder="Year del libro">
                                        
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('libro.index') }}" class="btn btn-info btn-block" >Atrás</a>
									
                                </div>
                                
                                	

							</div>
						</form>
					</div>
				</div>

			</div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	   <script type="text/javascript">
		   	function delay (URL) {
    			setTimeout( function() { window.location = URL }, 5000 );
			}
	   </script>
	   <script>
			function showCustomer(str) {
			var xhttp;  
			if (str == "") {
				document.getElementById("tabla").innerHTML = "";
				return;
			}
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 4) {
				document.getElementById("tabla").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "contactos.php?q="+str, true);
			xhttp.send();
			}
		</script>
        <script type="text/javascript">
        $(function () {
            $("#fname_error_message").hide();
            $("#fautor_error_message").hide();
            $("#fedicion_error_message").hide();
            $("#fyear_error_message").hide();
            
            var error_fname = false;
            var error_fautor = false;
            var error_fedicion = false;
            var error_fyear = false;
            
            
            $("#nombre").focusout(function () {
                check_fname();
            });
            $("#autor").focusout(function () {
                check_fautor();
            });
            $("#edicion").focusout(function () {
                check_fedicion();
            });

            $("#year").focusout(function () {
                check_fyear();
            });
            

            function check_fname() {
                var pattern = /^[A-Za-z0-9\s\-_,\.;:()]+$/;
                var fname = $("#nombre").val();
                if (pattern.test(fname) && fname !== '') {
                    $("#fname_error_message").hide();
                    $("#nombre").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#fname_error_message").html("Should contain only Characters");
                    $("#fname_error_message").show();
                    $("#nombre").css("border-bottom", "2px solid #F90A0A");
                    error_fname = true;
                }
            }
            function check_fautor() {
                var pattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
                var fautor = $("#autor").val();
                if (pattern.test(fautor) && fautor !== '') {
                    $("#fautor_error_message").hide();
                    $("#autor").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#fautor_error_message").html("Should contain only Characters");
                    $("#fautor_error_message").show();
                    $("#autor").css("border-bottom", "2px solid #F90A0A");
                    error_fautor = true;
                }
            }

            function check_fedicion() {
                var pattern = /^[A-Za-z0-9]{1,4}$/;
                var fedicion = $("#edicion").val();
                if (pattern.test(fedicion) && fedicion !== '') {
                    $("#fedicion_error_message").hide();
                    $("#edicion").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#fedicion_error_message").html("Should contain only Characters");
                    $("#fedicion_error_message").show();
                    $("#edicion").css("border-bottom", "2px solid #F90A0A");
                    error_fedicion = true;
                }
            }

            function check_fyear() {
                var pattern = /^\d{4}$/;
                var fyear = $("#year").val();
                if (pattern.test(fyear) && fyear !== '') {
                    $("#fyear_error_message").hide();
                    $("#year").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#fyear_error_message").html("Should contain only Characters");
                    $("#fyear_error_message").show();
                    $("#year").css("border-bottom", "2px solid #F90A0A");
                    error_fyear = true;
                }
            }

            
           
        });
    </script>
	</section>
	@endsection
    
</body>

</html>
