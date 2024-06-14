<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>SecondMarket</h5>
                <p>&copy; 2024 SecondMarket. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-3">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/products') }}">Productos</a></li>
                    <li><a href="{{ url('/contact') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contacto</h5>
                <p>Email: natan@natan.com</p>
                <p>Teléfono: +34 123 456 789</p>
                <div class="social-icons">
                    <a href="{{ url('/instagram') }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ url('/instagram') }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ url('/instagram') }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ url('/instagram') }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <h5>Donaciones Cripto</h5>
                <p>Ayúdanos a mantener la plataforma activa con tus donaciones cripto.</p>
                <p class="crypto-address" id="crypto-address">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</p>
                <button class="btn btn-outline-light" onclick="copyCryptoAddress()">Copiar Dirección</button>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Estilos para el footer */
    .footer {
        background-color: #343a40;
        color: #ffffff;
        padding: 40px 0;
        border-top: 5px solid #007bff;
        width: 100%;
    }

    .footer h5 {
        color: #ffffff;
        margin-bottom: 20px;
    }

    .footer p {
        color: #bdbdbd;
    }

    .footer a {
        color: #007bff;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .footer .social-icons {
        margin-top: 10px;
    }

    .footer .social-icons a {
        color: #ffffff;
        margin-right: 15px;
        font-size: 1.2rem;
        transition: color 0.3s;
    }

    .footer .social-icons a:hover {
        color: #007bff;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    .crypto-address {
        font-family: monospace;
        background-color: #444;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        word-break: break-all;
    }
</style>

<script>
    function copyCryptoAddress() {
        var copyText = document.getElementById("crypto-address");
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        alert("Dirección cripto copiada: " + copyText.textContent);
    }
</script>