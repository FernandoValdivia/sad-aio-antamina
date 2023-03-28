{{-- Loader --}}
<div id="containerLoad" class="loader hidden">
    <h2>Cargando...</h2>
</div>
<script src="js/loader.js"></script>
{{-- Modal Sugerencias --}}
<section class="modal containermodal" id="main__modal">
    <div class="modal__container" id="modal-container">
        <div class="modal__content">
            <div class="modal__close close-modal" title="Cerrar">
                <i class="bx bx-x"></i>
            </div>
            <div class="text">Envíanos una sugerencia o recomendación</div>
            <form action="phpmailer.php" method="post">
                @csrf
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__sname" id="__sname" required>
                        <div class="underline"></div>
                        <label for="__sname">Nombres</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="__sfullname" id="__sfullname" required>
                        <div class="underline"></div>
                        <label for="__sfullname">Apellidos</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__semail" id="__semail" required>
                        <div class="underline"></div>
                        <label for="__semail">Correo</label>
                    </div>
                </div>
                <div class="form-row textarea">
                    <div class="input-data">
                        <textarea name="__smessage" id="__smessage" cols="30" rows="10" required></textarea>
                        <div class="underline"></div>
                        <label for="__smessage">Mensaje</label>
                    </div>
                </div>
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <input type="submit" value="Enviar sugerencia">
                    </div>
                </div>
            </form>
            @if (session('info'))
                <script>
                    alert("{{session('info')}}");
                </script>
            @endif
        </div>
    </div>
</section>
<script src="js/modal.js"></script>
{{-- Switch Dark/Light Mode --}}
<audio id="audio" src="audio/switch.mp3"></audio>
<script src="js/switch.js"></script>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>San Isidro, Lima - Perú</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+51 922 753 771</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@competitividadccd.com</p>
            </div>
            <div class="col-lg-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Sugerencias</h4>
                <br>
                <button class="sugg__button" onclick="abrirModal()">
                    <i class="fa-solid bi-chat-dots-fill"></i>
                        Enviar sugerencia
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center text-center mb-3 mb-md-0">
                    <a href="/">SAD</a>, Sistema de Administración del Desarrollo
                    <p>&copy; <script>document.write(new Date().getFullYear());</script> | Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->