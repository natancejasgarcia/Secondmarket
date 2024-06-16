<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Categorías | SecondMarket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            margin: 20px;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            font-size: 3rem;
            color: #007bff;
        }

        .category-name {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .container {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <x-navbar />

    <div class="container">
        <h1 class="text-center mb-5">Categorías</h1>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none text-dark">
                    <div class="category-card">
                        <i class="fas {{ $category->icon }} category-icon"></i>
                        <p class="category-name">{{ $category->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <x-footer />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>