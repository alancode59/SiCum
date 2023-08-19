//Previsualizar imagen
document.getElementById("foto_perfil").onchange = function(e) {
    // Se crea un objeto FileReader
    let reader = new FileReader();
    // Se leé el archivo seleccionado y se pasa como argumento al objeto FileReader
    reader.readAsDataURL(e.target.files[0]);
    // Se visualiza la imagen una vez que fue cargada en el objeto FileReader
    reader.onload = function(){
        let imgPreview = document.getElementById('img-preview');
        imgPreview.src = reader.result;
    };
};//end imagen

$(function () {
    $('#form-usuario').validate({
        rules: {
            nombre: {
                required: true,
            },
            apellido_paterno: {
                required: true,
            },
            apellido_materno: {
                required: true,
            },
            sexo: {
                required: true,
            },
            rol: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            montoM: {
                required: true,
            },
            fechai: {
                required: true,
            },
            fechap: {
                required: true,
            },
            foto_perfil: {
                required: false,
            }
        },
        messages: {
            nombre: {
                required: 'Se requiere el nombre del usuario',
            },
            apellido_paterno: {
                required: 'Se requiere el apellido paterno del usuario',
            },
            apellido_materno: {
                required: 'Se requiere el apellido paterno del usuario',
            },
            sexo: {
                required: 'Se requiere el sexo del usuario',
            },
            rol: {
                required: 'Se requiere el rol del usuario',
            },
            email: {
                required: 'Se requiere el correo electrónico del usuario',
                email: 'Se requiere un email valido'
            },
            montoM: {
                required: 'Se requiere el monto que pagara el usuario',
            },
            fechai: {
                required: 'Se requierela fecha en la que inicia el usuario en el gym',
            },
            fechap: {
                required: 'Se requierela fecha en la que debe pagar el usuario en el gym',
            },
            foto_perfil: {
                required: '',
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
});//end validation

