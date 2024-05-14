<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Dashboard | Ecomarket</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <x-navbar />


    <!--product-->
    <!-- resources/views/dashboard/edit.blade.php -->


    <div class="container">
        <h1>Editar Producto</h1>
        <form action="{{ route('dashboard.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <x-footer />


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>