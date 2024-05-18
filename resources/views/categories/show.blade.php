<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $category->name }} - Ecomarket</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <x-navbar />


    <!--product-->
    <div class="container mt-5">
        <h1 class="mb-3">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        <h2>Productos</h2>
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($category->products ?? [] as $product)
            <div class="col mb-4">
                <!-- Enlace que envuelve la tarjeta, llevando al show del producto -->
                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }} €</p>
                            <p class="card-category mb-0">Categoría: {{ $category->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <x-footer />


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>