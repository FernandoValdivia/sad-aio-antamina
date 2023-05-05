/* ================ ABRIR MODAL ================ */
function abrirModal2() {
    /* Quitar scroll */
    var body = document.querySelector('body');
    body.classList.add('no-scroll');
    /* Abrir Modal */
    mainModal2 = document.getElementById("main__modal2")
    modalContainer2 = document.getElementById("modal-container2")
    mainModal2.classList.add("mainModal2")
    modalContainer2.classList.add('show-modal2')
}

/*=============== CLOSE MODAL ===============*/
const closeBtn2 = document.querySelectorAll('.close-modal2')

function closeModal2() {
    /* Poner scroll */
    var body = document.querySelector('body');
    body.classList.remove('no-scroll');
    /* Cerrar Modal */
    const modalContainer2 = document.getElementById('modal-container2')
    modalContainer2.classList.remove('show-modal2')
}

closeBtn2.forEach(c => c.addEventListener('click', closeModal2))