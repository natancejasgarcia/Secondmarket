<style>
    /* Estilos básicos para la barra de navegación */
    /* Reset básico para el estilo de la barra de navegación */
    .navbar {
        background-color: #ffffff;
        /* Fondo blanco para una apariencia más limpia */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        /* Espaciado más generoso */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        /* Sombra más sutil */
        border-bottom: 2px solid #f0f0f0;
        /* Borde sutil en la parte inferior */
    }

    .navbar-brand {
        text-decoration: none;
        color: #0056b3;
        /* Un azul más vibrante */
        font-size: 1.75rem;
        /* Tamaño de fuente más grande */
        font-weight: bold;
        /* Texto en negrita */
    }

    .navbar-links ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar-links ul li {
        padding: 0 20px;
        /* Mayor separación entre elementos */
    }

    .navbar-links ul li a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s, transform 0.3s;
        /* Agregar transformación para efecto */
    }

    .navbar-links ul li a:hover,
    .navbar-links ul li a:focus {

        transform: translateY(-2px);
        /* Ligeramente elevado al pasar el ratón */
    }

    .navbar .btn-success {
        padding: 0.5rem 1rem;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
        border: none;
        /* Eliminar borde por defecto */
    }

    .navbar .btn-success:hover {
        background-color: #218838;
        transform: scale(1.55);
        /* Efecto de crecimiento al pasar el ratón */
    }

    /* Botón de hamburguesa para la versión móvil */
    .toggle-button {
        display: none;
        background-color: #333;
        color: white;
        border: none;
        padding: 0.8rem;
        font-size: 1.2rem;
        cursor: pointer;
    }

    /* Diseño responsivo */
    @media (max-width: 768px) {
        .navbar-links ul {
            flex-direction: column;
            width: 100%;
            padding: 10px 0;
            /* Añadir un poco de padding */
        }

        .navbar-links ul li {
            text-align: center;
            /* Centrar enlaces en modo móvil */
            padding: 10px 0;
            /* Espaciado vertical entre elementos */
        }

        .navbar-links {
            display: none;
            width: 100%;
        }

        .toggle-button {
            display: block;
        }
    }
</style>


<div class="navbar">
    <a href="{{ route('welcome') }}" class="navbar-brand">SecondMarket</a>
    <button class="toggle-button">☰</button>
    <div class="navbar-links">
        <ul>
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('products.index') }}">Productos</a></li>
            <li><a href="#">Contacto</a></li>
            @auth
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products.create') }}" class="btn-success">Subir Producto</a></li>
            @else
            <li><a href="{{ route('login') }}">Log in</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
            @endif
            @endauth
        </ul>
    </div>
</div>
<script>
    document.querySelector('.toggle-button').addEventListener('click', function() {
        var links = document.querySelector('.navbar-links');
        if (links.style.display === 'block') {
            links.style.display = 'none';
        } else {
            links.style.display = 'block';
        }
    });
</script>