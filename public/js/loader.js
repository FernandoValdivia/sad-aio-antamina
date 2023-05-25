
function onLoad(){
    /* Quitar scroll */
    var body = document.querySelector('body');
    body.classList.add('no-scroll');
    document.getElementById("containerLoad").classList.remove("hidden");
    document.getElementById("containerLoad").classList.add("show");
}
