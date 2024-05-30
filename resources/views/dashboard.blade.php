<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Ecomarket</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrap {
            flex: 1;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .no-products {
            text-align: center;
            margin-top: 50px;
        }

        .default-image {
            background: url('https://via.placeholder.com/400x200?text=No+Image+Available') center center / cover no-repeat;
            height: 200px;
        }

        .no-products-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .no-products-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="page-container">
        <x-navbar />


        <!-- Product Section -->
        <div class="container mt-5 content-wrap">
            <h1 class="mb-3">Tus Productos</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($products as $product)
                <div class="col mb-4">
                    <div class="card h-100">
                        @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="card-img-top img-fluid rounded border">
                        @else
                        <div class="default-image rounded border"></div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }} €</p>
                            <div class="d-flex justify-content-between align-items-center">
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
                @empty
                <div class="col-12 no-products-container">
                    <h3>No hay productos disponibles.</h3>
                    <img src="https://via.placeholder.com/600x400?text=No+Products+Available" alt="No products available" class="img-fluid mt-4">
                </div>
                @endforelse
            </div>
        </div>
        <x-footer />
    </div>

    @include('sweetalert::alert')

    <!-- Incluir jQuery antes de Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js, necesario para los dropdowns, tooltips y popovers en Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>