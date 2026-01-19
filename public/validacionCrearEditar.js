// Se importa la función que devuelve un boolean indicando si un string contiene caracteres potencialmente peligrosos
import { contieneCaracteresPeligrosos } from "./contieneCaracteresPeligrosos.js";

// Evento para asegurar que el conenido del DOM se ha cargado antes de intentar acceder a este
document.addEventListener("DOMContentLoaded" , () => {
    // Variables que almacenan la referencia a los objetos formulario y mensaje de corrección de envío
    const formulario = document.getElementById("form")
    const correccionEnvio = document.getElementById("correccionEnvio")
    
    // Objeto que almacena las distintas variables 'flag' asociadas a los id de los campos del formulario
    const camposValidos = {
        nombre: true,
        desarrollador: true,
        genero: true
    }

    // Función que recibe las referencias a un campo del form y su mensaje de corrección para realizar la validación con la función importada
    const mensajeCorreccion = (campo,mensaje) => {
        mensaje.innerText = contieneCaracteresPeligrosos(campo.value) ? "El campo no debe contener los siguientes caracteres: <>\'\"&" : "";
        camposValidos[campo.id] = mensaje.innerText.length > 0 ? false : true;

    }

    // Función que generaliza el acceso a los campos del formulario y a sus respectivos mensajes mediante sus id y llama a mensaje corrección
    const validar = (idCampo,idMensaje) => {
        const campo = document.getElementById(idCampo)
        const mensaje = document.getElementById(idMensaje)

        campo.addEventListener("input", () => {
            mensajeCorreccion(campo,mensaje)
        })
    }

    // Llamadas a la función validar con los id de cada campo y su mensaje de correccióna asociado
    validar("nombre","nombreCorreccion")

    validar("desarrollador","desarrolladorCorreccion")

    validar("genero","generoCorreccion")

    // Control del evento submit del formulario que comprueba que todas las variables flag sean verdaderas antes de enviar
    formulario.addEventListener("submit", (e) => {
        e.preventDefault()
        Object.values(camposValidos).every((valido) => valido) ? formulario.submit() : correccionEnvio.innerText = "Todos los campos deben ser correctos"
    })

})