<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todos los productos | Ecomarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

</head>

<body>
    <x-navbar />



    <!--products-->
    <div class="container mt-5">
        <h1 class="mb-3">Todos los Productos</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($products as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded border">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} €</p>
                        @if(auth()->check() && $product->user_id === auth()->user()->id)
                        <a href="{{ route('dashboard.edit', $product) }}" class="btn btn-primary">Editar Producto</a>
                        @else
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
                        @endif
                    </div>
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