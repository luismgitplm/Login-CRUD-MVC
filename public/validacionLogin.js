import { contieneCaracteresPeligrosos } from "./contieneCaracteresPeligrosos.js";

document.addEventListener('DOMContentLoaded', () => {
    // Constantes que guardan los elementos DOM a los que este archivo accede
    const formulario = document.getElementById("formulario");
    const idusuario = document.getElementById("idusuario");
    const password = document.getElementById("password");

    // Variables globales que indican la validación de ambos campos
    let idValido;
    let passValida;

    // Validación del campo idusuario (nombre). Se comprueba que no contenga caracteres potencialmente peligrosos
    idusuario.addEventListener('input', () => {
        const mensaje = document.getElementById("idusuarioCorreccion");

        if (contieneCaracteresPeligrosos(idusuario.value)) {
            mensaje.innerText = 'El nombre no debe contener los siguientes caracteres: <>\'\"&';
            idValido = false;
        } else {
            mensaje.innerText = '';
            idValido = true;
        } 
    })

    /* Validación del campo password (contraseña). Se comprueba que no contenga caracteres potencialmente peligrosos y 
        que contenga al menos 8 caracteres, entre ellos mayúsculas, minúsculas y algún dígito */
    password.addEventListener('input', () => {
        const mensaje = document.getElementById("passwordCorreccion");
        const regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/; 
        passValida = false;

        if (contieneCaracteresPeligrosos(password.value)) {
            mensaje.innerText = 'La contraseña no debe contener los siguientes caracteres: <>\'\"& ';
        } else if (password.value.length < 8){
            mensaje.innerText = 'La contraseña debe superar los 8 caracteres. ';
        } else if (!regex.test(password.value)){
            mensaje.innerText = 'La contraseña debe contener al menos una mayúscula, una minúscula y un dígito.';
        } else {
            mensaje.innerText = '';
            passValida = true;
        }

        
    })

    // Comprobación de las variables boolean que validan ambos campos antes de enviar
    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        const mensaje = document.getElementById("envioCorreccion");
        mensaje.innerText = (!passValida || !idValido) ? 'Debe indicar un usuario y una contraseña válidos' : '';

        if (passValida && idValido) formulario.submit();
    })

   
})





