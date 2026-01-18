import { contieneCaracteresPeligrosos } from "./contieneCaracteresPeligrosos.js";

document.addEventListener("DOMContentLoaded" , () => {
    const nombre  = document.getElementById("nombre")
    const desarrollador = document.getElementById("desarrollador")
    const genero = document.getElementById("genero")

    const mensajeCorreccion = (valor,mensaje) => {
        mensaje.innerText = contieneCaracteresPeligrosos(valor) ? "El campo no debe contener los siguientes caracteres: <>\'\"&" : "";
    }

    nombre.addEventListener("input", () => {
        mensajeCorreccion(nombre.value,document.getElementById("nombreCorreccion"))
    })
     
    desarrollador.addEventListener("input", () => {
        mensajeCorreccion(desarrollador.value,document.getElementById("desarrolladorCorreccion"))
    })

    genero.addEventListener("input", () => {
        mensajeCorreccion(genero.value,document.getElementById("generoCorreccion"))
    })

})