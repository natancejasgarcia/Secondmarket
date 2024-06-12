<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Confirmar Compra | Ecomarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .product-info {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-info h3 {
            margin-bottom: 1rem;
            font-size: 1.75rem;
        }

        .product-info p {
            font-size: 1.25rem;
            color: #555;
        }

        .container-padding-bottom {
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="container mt-5 container-padding-bottom">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-info text-center">
                    <h3>{{ $product->name }}</h3>
                    <p>Precio: {{ $product->price }} €</p>
                </div>
                <div class="card">
                    <div class="card-header text-center">Confirmar Compra</div>
                    <div class="card-body">
                        <form action="{{ route('purchase.send') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label for="name">Tu Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Tu Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required>Estoy interesado en comprar el producto "{{ $product->name }}" por {{ $product->price }} €.</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Enviar Solicitud de Compra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>