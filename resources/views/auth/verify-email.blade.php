<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo Electrónico | SecondMarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .verification-container {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .verification-box {
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .verification-box h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .verification-box p {
            margin-bottom: 30px;
        }

        .verification-box button {
            width: 100%;
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container verification-container">
        <div class="verification-box">
            <h1>Verifica tu dirección de correo electrónico</h1>
            <p>Hemos enviado un enlace de verificación a tu correo electrónico. Por favor, revisa tu bandeja de entrada y sigue las instrucciones.</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-redo-alt"></i> Reenviar enlace de verificación
                </button>
            </form>
        </div>
    </div>

    <x-footer />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>