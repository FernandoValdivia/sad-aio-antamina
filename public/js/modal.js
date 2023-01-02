/* ================ ABRIR MODAL ================ */
function abrirModal() {
    mainModal = document.getElementById("main__modal")
    modalContainer = document.getElementById("modal-container")
    mainModal.classList.add("mainModal")
    modalContainer.classList.add('show-modal')
}

/*=============== CLOSE MODAL ===============*/
const closeBtn = document.querySelectorAll('.close-modal')

function closeModal() {
    const modalContainer = document.getElementById('modal-container')
    modalContainer.classList.remove('show-modal')
}

closeBtn.forEach(c => c.addEventListener('click', closeModal))