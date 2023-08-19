//Previsualizar imagen
document.getElementById("fotoperfil").onchange = function(e) {
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
    $('#form-empleado').validate({
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
            password: {
                required: false,
                minlength: 5
            },
            repassword: {
                required: false,
                minlength: 5,
                equalTo: "#password"
              
            },
            fotoperfil: {
                required: false,
            }
        },
        messages: {
            nombre: {
                required: 'Se requiere el nombre del empleado',
            },
            apellido_paterno: {
                required: 'Se requiere el apellido paterno del empleado',
            },
            apellido_materno: {
                required: 'Se requiere el apellido paterno del empleado',
            },
            sexo: {
                required: 'Se requiere el sexo del empleado',
            },
            rol: {
                required: 'Se requiere el rol del empleado',
            },
            email: {
                required: 'Se requiere el correo electrónico del empleado',
                email: 'Se requiere un email valido'
            },
            password: {
                required: 'Se requiere la contraseña del empleado',
                minlength: 'El tamaño minimo para la contraseña es de 8 caracters'
            },
            repassword: {
                required: 'Se requiere repetir la contraseña del empleado',
                minlength: 'El tamaño minimo para la contraseña es de 8 caracteres',
                equalTo: 'Repetir contraseña debe ser igual a password.'
            },
            fotoperfil: {
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

function previsualizar_imagen(img = '', btnImg = '') {
    //Cargamos la información de los elementos
    const  loadImage = document.getElementById("#"+btnImg);
    const  previewImage = document.getElementById("#"+img);

    // Se va a seleccionar el archivo a mostrar
    const archivos = loadImage.files;

    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        previewImage.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];

    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);

    // Y a la fuente de la imagen le ponemos el objectURL
    previewImage.src = objectURL;

}//end previsualizar_imagen