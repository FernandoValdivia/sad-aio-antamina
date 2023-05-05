/* ================ ABRIR MODAL ================ */
function abrirModal() {
    /* Quitar scroll */
    var body = document.querySelector('body');
    body.classList.add('no-scroll');
    /* Abrir Modal */
    mainModal = document.getElementById("main__modal")
    modalContainer = document.getElementById("modal-container")
    mainModal.classList.add("mainModal")
    modalContainer.classList.add('show-modal')
}

/*=============== CLOSE MODAL ===============*/
const closeBtn = document.querySelectorAll('.close-modal')

function closeModal() {
    /* Poner scroll */
    var body = document.querySelector('body');
    body.classList.remove('no-scroll');
    /* Cerrar Modal */
    const modalContainer = document.getElementById('modal-container')
    modalContainer.classList.remove('show-modal')
}

closeBtn.forEach(c => c.addEventListener('click', closeModal))