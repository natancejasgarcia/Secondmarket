<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>SecondMarket | Inicio</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
            max-width: 120px;
            margin: auto;
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
            font-size: 1.1rem;
            color: #333;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            max-width: 200px;
            margin: auto;
        }

        .card1 {
            display: flex;
            flex-direction: column;
            height: 100%;
            max-width: 120px;
            margin: auto;
        }

        .card img {
            object-fit: cover;
            height: 150px;
            width: 100%;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }

        .card-title,
        .card-text {
            margin-bottom: 0.5rem;
        }

        .card {
            height: 300px;
        }

        @media (max-width: 576px) {
            .row-cols-1.row-cols-md-3.g-4 .col {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .card {
                height: 250px;
            }

            .card img {
                height: 120px;
            }
        }

        .swiper-container .card {
            max-width: 150px;
        }

        .swiper-container .card i {
            font-size: 2.5rem;
        }

        .swiper-container .card img {
            height: 100px;
        }

        .swiper-container .card-body {
            padding: 10px;
        }

        .footer-space {
            margin-bottom: 50px;
        }

        .video-background {
            position: relative;
            width: 100%;
            height: 40vh;
            /* Cambiar la altura del video */
            overflow: hidden;
            z-index: -1;
        }

        h1 {
            padding: 20px;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            z-index: 1;
        }

        .jumbotron {
            padding: 0;
            margin: 0;
            position: relative;
            height: 60vh;
            /* Cambiar la altura de la jumbotron */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .jumbotron h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .jumbotron p {
            font-size: 1.5rem;
        }

        .swiper-container {
            position: relative;
            width: 100%;
            padding: 20px 0;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #007bff;
            top: 50%;
            transform: translateY(-50%);
        }

        .swiper-button-prev {
            left: 10px;
        }

        .swiper-button-next {
            right: 10px;
        }

        .swiper-slide {
            transition: opacity 0.3s ease;
        }

        .swiper-container {
            overflow: hidden;
        }

        .swiper-wrapper {
            display: flex;
            align-items: center;
        }

        .swiper-container-fade .swiper-slide {
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .swiper-container-fade .swiper-slide-visible {
            pointer-events: auto;
            opacity: 1;
        }

        @media (max-width: 576px) {
            .swiper-button-prev {
                left: 1px;
            }

            .swiper-button-next {
                right: 1px;
            }

        }

        .video-text-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .video-text-container .text-content,
        .video-text-container .video-content {
            flex: 1;
            min-width: 300px;
            margin: 10px;
        }

        .video-text-container .text-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .video-text-container .video-content {
            display: flex;
            justify-content: center;
        }

        .video-text-container video {
            width: 100%;
            height: auto;
            border-radius: 10px;
            aspect-ratio: 1 / 1;
            /* Para mantener un formato cuadrado */
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay">
            <div>
                <p class="display-5">Si lo imaginas, <br> esta en <b>Secondmarket</b></p>
            </div>
        </div>
    </div>
    <h1 class="display-4 text-center mb-4">El mayor mercado de segunda mano <br> más grande del mundo</h1>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Categorías</h2>
        <div class="swiper-container swiper-container-fade">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                <div class="swiper-slide swiper-slide-visible">
                    <a href="{{ route('categories.show', $category->id) }}" class="category-card">
                        <i class="fas {{ $category->icon }} category-icon"></i>
                        <p class="category-name">{{ $category->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <h3 class="fw-bold p-3 text-center">Estos productos te pueden interesar...</h3>
    <div class="container mt-5">
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
            <p class="text-center">No hay productos disponibles.</p>
            @endforelse
        </div>
    </div>
    <div class="container mt-5">
        <div class="video-text-container">
            <div class="text-content">
                <p class="lead">Descubre una amplia gama de productos de segunda mano a precios increíbles. Compra y vende de manera fácil y segura en nuestra plataforma.</p>
            </div>
            <div class="video-content">
                <video autoplay muted loop playsinline>
                    <source src="{{ asset('images/video2.mp4') }}" type="video/mp4">
                    Tu navegador no soporta la etiqueta de video.
                </video>
            </div>
        </div>
    </div>

    <div class="footer-space">
        <div class="container mt-5 footer-space">
            <h2 class="text-center mb-4">Suscríbete a nuestro Boletín</h2>
            <form action="#" method="POST" class="row justify-content-center">
                @csrf
                <div class="col-12 col-md-8 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
                </div>
                <div class="col-12 col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Suscribirse</button>
                </div>
            </form>
        </div>
    </div>

    <x-footer />

    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: "auto",
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
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

        // Fade effect for the swiper slides
        swiper.on('slideChange', function() {
            const slides = swiper.slides;
            const activeIndex = swiper.activeIndex;
            const slidesPerView = swiper.params.slidesPerView;
            slides.each(function(index, slide) {
                if (index >= activeIndex && index < activeIndex + slidesPerView) {
                    $(slide).addClass('swiper-slide-visible');
                } else {
                    $(slide).removeClass('swiper-slide-visible');
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>