 // Función que comprueba si una cadena de texto contiene algún caracter potencialmente peligroso
    export function contieneCaracteresPeligrosos(texto){
        const regex = /[<>'"&]/;

        return regex.test(texto);
    }