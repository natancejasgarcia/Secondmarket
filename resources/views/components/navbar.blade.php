<div class="navbar">
    <a href="{{ route('welcome') }}" class="navbar-brand">SecondMarket</a>
    <button class="toggle-button">☰</button>
    <div class="navbar-links">
        <ul>
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('products.index') }}">Todos los Productos</a></li>
            <li><a href="{{ route('contact') }}">Contacto</a></li>
            @auth
            <li><a href="{{ route('dashboard') }}">Mis productos</a></li>
            <li><a href="{{ route('createproduct.create') }}" class="btn-success">Subir Producto</a></li>
            <li><a href="{{ route('profile.edit') }}">Mi Cuenta</a></li>
            @else
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Registrarse</a></li>
            @endif
            @endauth
        </ul>
    </div>
</div>
<style>
    .navbar {
        background-color: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #f0f0f0;
    }

    .navbar-brand {
        text-decoration: none;
        color: #0056b3;
        font-size: 1.75rem;
        font-weight: bold;
    }

    .navbar-links {
        display: flex;
        align-items: center;
    }

    .navbar-links ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar-links ul li {
        padding: 0 20px;
    }

    .navbar-links ul li a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s, transform 0.3s;
    }

    .navbar-links ul li a:hover,
    .navbar-links ul li a:focus {
        transform: translateY(-2px);
    }

    .navbar .btn-success {
        padding: 0.5rem 1rem;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
        border: none;
    }

    .navbar .btn-success:hover {
        background-color: #218838;
        transform: scale(1.1);
    }

    .toggle-button {
        display: none;
        background-color: #333;
        color: white;
        border: none;
        padding: 0.8rem;
        font-size: 1.2rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .navbar-links ul {
            flex-direction: column;
            width: 100%;
            padding: 0;
        }

        .navbar-links ul li {
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

        .navbar-links {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }

        .navbar-links.active {
            max-height: 500px;
        }

        .toggle-button {
            display: block;
        }
    }
</style>

<script>
    document.querySelector('.toggle-button').addEventListener('click', function() {
        var links = document.querySelector('.navbar-links');
        links.classList.toggle('active');
    });
</script>