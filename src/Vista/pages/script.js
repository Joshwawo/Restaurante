//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");



//FUNCIONES

function anchoPage() {

    if (window.innerWidth > 850) {
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
    }
}

anchoPage();


function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "10px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}
const datos = {
    nombre: '',
    correo: '',
    usuario: '',
    contrasena: '',
    direct: ''

}

const nombreInput = document.querySelector('#nombre');
const coreoInput = document.querySelector('#correo');
const usuarioInput = document.querySelector('#usuario');
const contrasenaInput = document.querySelector('#contrasena');
const directInput = document.querySelector('#direct');
const formulario = document.querySelector('.formulario__register');

// nombreInput.addEventListener('input', function(a){
//     console.log(object);
// })



nombreInput.addEventListener('input', leerTexto);
coreoInput.addEventListener('input', leerTexto);
usuarioInput.addEventListener('input', leerTexto);
contrasenaInput.addEventListener('input', leerTexto);
directInput.addEventListener('input', leerTexto);

formulario.addEventListener('submit', function (e) {


    const { nombre, correo, usuario, contrasena, direct } = datos;
    if (nombre === '' || correo === '' || usuario === '' || contrasena === '' || direct == '') {
        mostrarError('todos los campos son obligatorios');

        return;
    }

    mostrarRegistro('Te has Registrado Correctamente!');


});

function mostrarError(mensaje) {
    const error = document.createElement('P');
    error.textContent = mensaje;
    error.classList.add('error');
    formulario.appendChild(error)
    console.log(error);

    setTimeout(() => {
        error.remove();

    }, 3000);

}

function mostrarRegistro(mensaje) {
    const completo = document.createElement('P');
    completo.textContent = mensaje;
    completo.classList.add('completo');
    formulario.appendChild(completo)
    console.log(completo);

    setTimeout(() => {
        completo.remove();
    }, 3000);
}



function leerTexto(e) {
    datos[e.target.id] = e.target.value;
    console.log(e.target.value);
}



