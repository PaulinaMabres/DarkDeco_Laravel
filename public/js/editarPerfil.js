function showErrorInField(  fieldName, error )
{
    var field = $("#"+fieldName).closest(".input-group");
    $(field).children(".invalid-feedback").remove();
    $.each(error, function(key,value){
        field.append('<span class="invalid-feedback d-block" role="alert"><strong>'+value+'</strong></span>');
    });
}
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
        fetch( "/perfil/editar/validateData", {
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
                $("#mainForm").submit();
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