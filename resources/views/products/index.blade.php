<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todos los productos | Ecomarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            object-fit: cover;
            height: 200px;
            width: 100%;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }

        .input-group-append .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .pagination {
            justify-content: center;
        }

        @media (max-width: 576px) {
            .row-cols-1.row-cols-md-3.g-4 .col {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .card img {
                height: 150px;
            }

            .card {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container mt-5">
        <h1 class="mb-3 text-center">Todos los Productos</h1>
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar productos..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    @if(request('search'))
                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger">X</a>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <select name="category" class="form-control">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <input type="number" name="min_price" class="form-control" placeholder="Precio mínimo" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="number" name="max_price" class="form-control" placeholder="Precio máximo" value="{{ request('max_price') }}">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Aplicar filtros</button>
        </form>
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
            <p class="text-center w-100">No hay productos disponibles.</p>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
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