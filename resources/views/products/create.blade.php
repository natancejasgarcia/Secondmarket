<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Página de Registro</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Swiper's JavaScript -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Barra de navegación -->
    <style>
        .navbar .btn-success {
            padding: 0.5rem 1rem;
            /* Ajusta el padding para alinear el texto */
            font-size: 1rem;
            /* Coincide con el tamaño de fuente de .nav-link */
            line-height: 1.5;
            /* Ajusta la altura de línea para centrar verticalmente el texto */
        }
    </style>


    <x-navbar />

    <div class="container mt-5">
        <h1 class="mb-3">Agregar Producto</h1>
        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="text" name="price" class="form-control" id="price" required>
            </div>
            <div class="form-group">
                <label for="category">Categoría</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" name="image" class="form-control-file" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>




    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Intercepta el envío del formulario
        $('#productForm').submit(function(e) {
            e.preventDefault(); // Evita que el formulario se envíe normalmente
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: new FormData(form[0]),
                processData: false,
                contentType: false,
                success: function(response) {
                    // Muestra una alerta de éxito con SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: '¡Producto creado exitosamente!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // Limpia los campos del formulario
                    form[0].reset();
                },
                error: function(error) {
                    // Muestra una alerta de error con SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error al crear el producto!',
                        text: 'Hubo un problema al procesar tu solicitud. Por favor, intenta nuevamente.'
                    });
                }
            });
        });
    </script>
    <x-footer />

</body>

</html>