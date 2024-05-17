<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario | SecondMarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand img {
            width: 100px;
            /* Ajustar el tamaño del logo */
            height: 60px;
            /* Ajustar el tamaño del logo */
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }

        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .profile-bio {
            margin-top: 15px;
        }

        .action-buttons {
            margin-top: 15px;

        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .product-grid .card {
            width: 200px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .product-grid .card:hover {
            transform: scale(1.05);
        }

        .product-grid img {
            height: 200px;
            object-fit: cover;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
            border-top: 1px solid #ddd;
        }

        .foto {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/insta.png') }}" alt="Instagram Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="profile-header">
            <img class="foto" src="{{ asset('images/icono.png') }}" alt="Profile Picture">
            <h2>SecondMarket</h2>
            <div class="profile-stats">
                <div>
                    <h5>3</h5>
                    <p>Publicaciones</p>
                </div>
                <div>
                    <h5>150 K</h5>
                    <p>Seguidores</p>
                </div>
                <div>
                    <h5>180</h5>
                    <p>Seguidos</p>
                </div>
            </div>
            <div class="profile-bio">
                <p><b>Si lo imaginas, está en SecondMarket</b></p>
            </div>
            <div class="action-buttons">
                <button class="btn btn-primary">Seguir</button>
                <button class="btn btn-outline-secondary">Mensaje</button>
            </div>
        </div>

        <div class="product-grid">
            <div class="card">
                <img src="{{ asset('images/movil.jpeg') }}" class="card-img-top" alt="Producto 1">
            </div>
            <div class="card">
                <img src="{{ asset('images/chaqueta.jpg') }}" class="card-img-top" alt="Producto 2">
            </div>
            <div class="card">
                <img src="{{ asset('images/asieslaputa.jpg') }}" class="card-img-top" alt="Producto 3">
            </div>
            <!-- Agrega más productos según sea necesario -->
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>© 2024 SecondMarket. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>