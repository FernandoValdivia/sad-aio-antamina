{{-- Chat Whatsapp --}}
<a href="https://api.whatsapp.com/send?phone=51922753771&text=Hola%21%20vengo%20del%20SAD%20AIO%20Antamina." class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
{{-- Loader --}}
<div id="containerLoad" class="loader hidden">
    <h2>Cargando...</h2>
</div>
<script src="{{ asset('js/loader.js') }}"></script>
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
{{-- Modal Simulación --}}
<section class="modal2 containermodal2" id="main__modal2">
    <div class="modal__container2" id="modal-container2">
        <div class="modal__content2">
            <div class="modal__close2 close-modal2" title="Cerrar">
                <i class="bx bx-x"></i>
            </div>
            <div class="text">Simulación</div>
            <form action="#" method="post">
                @csrf
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__sname" id="__sname" required>
                        <div class="underline"></div>
                        <label for="__sname">Nombre del Proyecto</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="__sfullname" id="__sfullname" required>
                        <div class="underline"></div>
                        <label for="__sfullname">Región</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__semail" id="__semail" required>
                        <div class="underline"></div>
                        <label for="__semail">Indicador</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__semail" id="__semail" required>
                        <div class="underline"></div>
                        <label for="__semail">Numero de Beneficiarios</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="__semail" id="__semail" required>
                        <div class="underline"></div>
                        <label for="__semail">Inicio de Operación</label>
                    </div>
                </div>
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <input type="submit" value="Simular">
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
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/modal2.js') }}"></script>
{{-- Chat Bot --}}
<script src="{{ asset('widget.js') }}"></script>
<script src="{{ asset('botman.js') }}"></script>
{{-- End Modal  --}}
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>San Isidro, Lima - Perú</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+51 959 468 741</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>luis.valdivia@sadglobalcompany.com</p>
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