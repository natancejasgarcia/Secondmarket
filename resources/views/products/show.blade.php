<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Producto | {{ $product->name }}</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Swiper's JavaScript -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <style>
        .flag-count {
            color: #ffc107;
            /* Color amarillo */
            font-weight: bold;
            margin-left: 5px;
        }

        .flag-buttons {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .flag-button {
            border: none;
            background-color: white;
            cursor: pointer;
            margin-left: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .flag-button:hover {
            transform: scale(1.1);
        }

        .flag-button img {
            width: 24px;
            height: 24px;
        }


        .content-with-padding {
            padding-bottom: 50px;
            /* Ajusta el valor según tus necesidades */
        }

        .img-fluid {
            border-width: 3px;
            /* Grosor del borde de la imagen */
        }

        .btn-success {
            border-width: 4px;
            /* Grosor del borde del botón */
            font-size: 1.25rem;
            /* Tamaño de la fuente del botón para hacerlo más legible */
        }

        .card-header.bg-primary {
            background-color: #007bff;
            /* Color de fondo más vibrante para la cabecera */
        }

        .product-details p {
            line-height: 1.8;
            /* Mejora la legibilidad de la descripción */
        }
    </style>
    <!-- Barra de navegación -->
    <x-navbar />

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">Detalles del Producto</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="product-details">
                                    <h2 class="mb-3">{{ $product->name }}</h2>
                                    <p class="text-muted">{{ $product->description }}</p>
                                    <p class="font-weight-bold">Precio: {{ $product->price }} €</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded border">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <a href="{{ route('products.buy', $product->id) }}" class="btn btn-success btn-lg btn-block py-3">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-3 content-with-padding">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <span>Información del Vendedor</span>
                        <div class="flag-buttons">
                            <form action="{{ route('user.flag', $product->user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="flag_type" value="green">
                                <button type="submit" class="flag-button btn btn-success" data-toggle="tooltip" data-placement="top" title="Notifica que el usuario está cumpliendo con las normas de conducta de SecondMarket">
                                    <img src="{{ asset('images/verde.png') }}" alt="Bandera Verde" />
                                    <span class="flag-count">{{ $product->user->flags->where('flag_type', 'green')->count() }}</span>
                                </button>
                            </form>
                            <form action="{{ route('user.flag', $product->user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="flag_type" value="red">
                                <button type="submit" class="flag-button btn btn-danger" data-toggle="tooltip" data-placement="top" title="Notifica que el usuario está incumpliendo las normas de conducta de SecondMarket">
                                    <img src="{{ asset('images/roja.png') }}" alt="Bandera Roja" />
                                    <span class="flag-count">{{ $product->user->flags->where('flag_type', 'red')->count() }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($product->user)
                        <p><strong>Nombre:</strong> {{ $product->user->name }}</p>
                        <p><strong>Teléfono:</strong> {{ $product->user->phone ?? 'No proporcionado' }}</p>
                        <p><strong>Correo Verificado:</strong> {{ $product->user->email_verified_at ? 'Sí' : 'No' }}</p>
                        <a href="https://wa.me/{{ $product->user->phone }}?text=Estoy%20interesado%20en%20tu%20producto%20{{ urlencode($product->name) }}" class="btn btn-primary" target="_blank">
                            Enviar Mensaje
                        </a>
                        @else
                        <p>Información del usuario no disponible.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <x-footer />
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>