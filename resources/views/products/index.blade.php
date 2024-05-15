<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todos los productos | Ecomarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

</head>

<body>
    <style>
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card img {
            object-fit: cover;
            height: 150px;
            /* Ajustar la altura de la imagen */
            width: 100%;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title,
        .card-text {
            margin-bottom: 0.5rem;
        }

        .card {
            height: 300px;
            /* Ajuste la altura total de la tarjeta */
        }

        /* Añadir estilos para hacer que se muestren dos productos por fila en móviles */
        @media (max-width: 576px) {
            .row-cols-1.row-cols-md-3.g-4 .col {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .card {
                height: 250px;
                /* Ajuste la altura total de la tarjeta para dispositivos móviles */
            }

            .card img {
                height: 120px;
                /* Ajuste la altura de la imagen para dispositivos móviles */
            }
        }
    </style>
    </head>

    <body>
        <x-navbar />

        <!-- products -->
        <div class="container mt-5">
            <h1 class="mb-3">Todos los Productos</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($products as $product)
                <div class="col mb-4">
                    <div class="card">
                        <a href="{{ auth()->check() && $product->user_id === auth()->user()->id ? route('dashboard.edit', $product) : route('products.show', $product->id) }}" class="stretched-link text-decoration-none text-dark">
                            <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded-top border-bottom">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->price }} €</p>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <p>No hay productos disponibles.</p>
                @endforelse
            </div>
        </div>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.getElementById('menuButton').addEventListener('click', function() {
                var menu = document.getElementById('mobile-menu');
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                }
            });
        </script>
        <x-footer />

    </body>

</html>