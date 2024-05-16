<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Producto | Ecomarket</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <x-navbar />
    <style>
        .padin {
            padding-bottom: 150px;
        }
    </style>
    <div class="container mt-5 container-custom">
        <h1 class="text-center mb-4">Editar Producto</h1>
        <div class="row justify-content-center">
            <div class="col-md-8 padin">
                <div class="card shadow-sm ">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">Información del Producto</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="Imagen del producto" class="img-fluid rounded mb-3">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="Imagen del producto" class="img-fluid rounded mb-3">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="form-label">Cambiar Imagen:</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nombre:</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description" class="form-label">Descripción:</label>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="price" class="form-label">Precio:</label>
                                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>