<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Dashboard | SecondMarkert</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>

    <x-navbar />
    <x-app-layout />

    <!--product-->
    <div class="container mt-5">
        <h1 class="mb-3">Tus Productos</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($products as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded border">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} €</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('dashboard.edit', $product->id) }}" class="btn btn-secondary">Editar</a>
                                <form action="{{ route('dashboard.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>No hay productos disponibles.</p>
            @endforelse
        </div>
    </div>
    <x-footer />

    <!-- jQuery, necesario para Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js, necesario para los dropdowns, tooltips y popovers en Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>