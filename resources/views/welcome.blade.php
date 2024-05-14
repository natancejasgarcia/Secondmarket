<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>SecondMarkert | Inicio</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Swiper's JavaScript -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <!-- Barra de navegación -->
    <x-navbar />

    <!-- Mensaje de bienvenida -->
    <div class="jumbotron text-center">
        <h1 class="display-4">¡Hola!</h1>
        <p class="lead">Bienvenido a Ecomarket.</p>
    </div>

    <!-- Categorías -->
    <div class="container">
        <h2 class="text-center mb-4">Categorías</h2>
        <div class="swiper-container" style="overflow: hidden;">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                <div class="swiper-slide">
                    <div class="card">
                        <a href="{{ route('categories.show', $category->id) }}" class="card-body text-center" style="color: inherit; text-decoration: none;">
                            <!-- Asumiendo que quieres usar íconos de FontAwesome, puedes personalizar cada ícono por categoría -->
                            <i class="fas {{ $category->icon }} fa-3x mb-3"></i>
                            <p class="card-text">{{ $category->name }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Agrega paginación opcional fuera del contenedor del swiper -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <h3 class="fw-bold p-3">Estos productos te pueden interesar...</h3>
    <!-- Productos -->
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
    <x-footer />
    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: "auto",
            spaceBetween: 10,
            breakpoints: {
                320: {
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });
    </script>

    <!-- jQuery, necesario para Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js, necesario para los dropdowns, tooltips y popovers en Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>