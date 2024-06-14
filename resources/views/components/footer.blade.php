<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>SecondMarket</h5>
                <p>&copy; 2024 SecondMarket. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/products') }}">Productos</a></li>
                    <li><a href="{{ url('/contact') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-4">
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
        </div>
    </div>
</footer>

<style>
    /* Estilos para el footer */
    .footer {
        background-color: #343a40;
        /* Color de fondo oscuro */
        color: #ffffff;
        /* Color de texto blanco */
        padding: 40px 0;
        /* Padding arriba y abajo */
        border-top: 5px solid #007bff;
        /* Borde superior azul */
        width: 100%;
        /* Asegura que el footer ocupe todo el ancho */
    }

    .footer h5 {
        color: #ffffff;
        /* Color de los títulos */
        margin-bottom: 20px;
        /* Espacio inferior */
    }

    .footer p {
        color: #bdbdbd;
        /* Color de los párrafos */
    }

    .footer a {
        color: #007bff;
        /* Color de los enlaces */
        text-decoration: none;
        /* Sin subrayado */
    }

    .footer a:hover {
        text-decoration: underline;
        /* Subrayado al pasar el ratón */
    }

    .footer .social-icons {
        margin-top: 10px;
    }

    .footer .social-icons a {
        color: #ffffff;
        /* Color de los íconos */
        margin-right: 15px;
        /* Espacio entre íconos */
        font-size: 1.2rem;
        /* Tamaño de los íconos */
        transition: color 0.3s;
    }

    .footer .social-icons a:hover {
        color: #007bff;
        /* Color de los íconos al pasar el ratón */
    }

    /* Contenedor */
    .container {
        width: 80%;
        /* Ancho del contenedor */
        margin: 0 auto;
        /* Centrado horizontal */
    }
</style>