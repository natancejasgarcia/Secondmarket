<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Agregar Producto | Ecomarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-control,
        .form-control-file {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .product-image-container {
            position: relative;
            max-width: 100%;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .upload-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
        }

        .upload-button input[type="file"] {
            display: none;
        }

        .form-section {
            padding: 20px;
        }

        .carta {
            padding: 10px;
        }

        .error-message {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container carta">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-0">Agregar Producto</h3>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="product-image-container">
                                        <img src="{{ asset('images/default.jpg') }}" alt="Imagen del producto" class="product-image" id="productImage">
                                        <label for="image" class="upload-button">
                                            Subir Imagen
                                            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" onchange="loadFile(event)">
                                        </label>
                                    </div>
                                    @error('image')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Nombre del producto</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea name="description" class="form-control" id="description" required>{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                                        @error('price')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Categoría</label>
                                        <select name="category_id" class="form-control" id="category_id" required>
                                            <option value="" selected>Selecciona una categoría</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function loadFile(event) {
            var output = document.getElementById('productImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        }
    </script>
    <x-footer />
</body>

</html>