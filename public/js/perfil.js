/*
    Imprime mensaje de error en los campos.
*/
function showErrorInField(  fieldName, error )
{
    var field = $("#"+fieldName).closest(".input-group");
    $(field).children(".invalid-feedback").remove();
    $.each(error, function(key,value){
        field.append('<span class="invalid-feedback d-block" role="alert"><strong>'+value+'</strong></span>');
    });
}
/* 
    Realizamos la validación desde laravel comunicandonos por AJAX
*/
function validateForm(event){
    event.preventDefault();
    var datos = {
        name : $('#name').val(),
        lastName : $('#lastName').val(),
        city : $('#city').val(),
        address : $('#address').val(),
        phone : $('#phone').val(),
        bank : $('#bank').val(),
        cardNumber : $('#cardNumber').val(),
        
        }
        fetch( "/perfil/validateData", {
            method: 'POST',
            body: JSON.stringify( datos ),
            headers: {
                'Content-Type': "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        } ).then( 
            function(success){
                console.log("oki");
                console.log(success);
                return success.json();
            }
        )
        .then( function(data){
            if( data.valida == true){
                //Guardamos el formulario
                this.submit();
            }else{
                /*Mostrar en errores generales
                $('.alert-danger').show();
                $('.alert-danger').empty();
                $('.alert-danger').append("<ul></ul");
                $.each( data.errores, function(key,value){
                    $('.alert-danger ul').append("<li>"+value+"</li>")
                })*/
                
                $.each( data.errores, function(key,value){
                    showErrorInField(key,value);
                })
            }
            console.log(data);
        })
        .catch(function(error){
            console.log("fail");
            console.log(error);
        })
        console.log(datos);
    }

// Cuando se carga la página agrego la funcion al boton subir imagen.
function validarImagen(){

    var input = $("#imagenPerfil");
    var url = $(input).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input[0].files && input[0].files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
    {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#PerfilImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(input[0].files[0]);
    }
    else
    {
        $('#PerfilImage').attr('src', '/storage/perfil/NotFound-ProfilePhoto.png');
    }
        
}
