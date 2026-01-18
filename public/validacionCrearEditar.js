import { contieneCaracteresPeligrosos } from "./contieneCaracteresPeligrosos.js";

document.addEventListener("DOMContentLoaded" , () => {
    const formulario = document.getElementById("form")
    const correccionEnvio = document.getElementById("correccionEnvio")
    const camposValidos = {
        nombre: true,
        desarrollador: true,
        genero: true
    }

    const mensajeCorreccion = (campo,mensaje) => {
        mensaje.innerText = contieneCaracteresPeligrosos(campo.value) ? "El campo no debe contener los siguientes caracteres: <>\'\"&" : "";
        camposValidos[campo.id] = mensaje.innerText.length > 0 ? false : true;
    }

    const validar = (idCampo,idMensaje) => {
        const campo = document.getElementById(idCampo)
        const mensaje = document.getElementById(idMensaje)

        campo.addEventListener("input", () => {
            mensajeCorreccion(campo,mensaje)
        })
    }

    validar("nombre","nombreCorreccion")

    validar("desarrollador","desarrolladorCorreccion")

    validar("genero","generoCorreccion")

    formulario.addEventListener("submit", (e) => {
        e.preventDefault()
        Object.values(camposValidos).every((valido) => valido) ? formulario.submit() : correccionEnvio.innerText = "Todos los campos deben ser correctos"
    })

})