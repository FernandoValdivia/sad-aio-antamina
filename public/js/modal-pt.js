// Obtén el modal
var modal = document.getElementById("modal");

// Obtén la imagen y agrega el evento onclick
var imagen = document.getElementById("img-potencialidad");
    imagen.onclick = function() {
    modal.style.display = "flex";
}

// Obtén el botón cerrar y agrega el evento onclick
var cerrar = document.getElementsByClassName("cerrar")[0];
    cerrar.onclick = function() {
    modal.style.display = "none";
}

// Cierra el modal cuando el usuario haga clic fuera de él
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}