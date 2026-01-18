import { contieneCaracteresPeligrosos } from "./contieneCaracteresPeligrosos.js";

document.addEventListener("DOMContentLoaded" , () => {
    const formulario = document.getElementById("form")
    const correccionEnvio = document.getElementById("correccionEnvio")
    const camposValidos = {
        nombre: true,
        desarrollador: true,
        genero: true
    }

    const mensajeCorreccion = (idcampo,mensaje) => {
        mensaje.innerText = contieneCaracteresPeligrosos(document.getElementById(idcampo).value) ? "El campo no debe contener los siguientes caracteres: <>\'\"&" : "";
        camposValidos[idcampo] = mensaje.innerText.length > 0 ? false : true;
    }

    const validar = (idCampo,idMensaje) => {
        document.getElementById(idCampo).addEventListener("input", () => {
            mensajeCorreccion(idCampo,document.getElementById(idMensaje))
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