<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | SecondMarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .contact-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            margin-bottom: 20px;
        }

        .contact-info {
            margin-top: 30px;
        }

        .contact-info h4 {
            margin-bottom: 10px;
        }

        .contact-info p {
            margin-bottom: 5px;
        }

        .contact-info i {
            color: #007bff;
        }

        .contact-info a {
            color: #007bff;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .padin {
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container mt-5">
        <h1 class="text-center mb-4">Contacto</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-form">
                    <h2>Envíanos un mensaje</h2>
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="message">Mensaje:</label>
                            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
                <div class="contact-info mt-5 text-center padin ">
                    <h4>Información de Contacto</h4>
                    <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle Ejemplo 123, Ciudad, País</p>
                    <p><i class="fas fa-phone"></i> Teléfono: +34 123 456 789</p>
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:natan@natan.com">natan@natan.com</a></p>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>