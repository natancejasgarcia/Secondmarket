<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../resources/css/main.css" />
    <title>Dashboard | SecondMarkert</title>
    <!-- Enlace a Swiper's CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>

    <x-navbar />
    <x-app-layout />
    <div class="container">
        <h1>Tus Conversaciones</h1>
        @if ($conversations->isEmpty())
        <p>No tienes conversaciones activas.</p>
        @else
        <ul class="list-group">
            @foreach ($conversations as $conversation)
            <li class="list-group-item">
                Conversación con {{ $conversation->otherParticipant()->user->name }}
                <a href="{{ route('conversations.show', $conversation->id) }}" class="btn btn-primary float-right">Ver</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <x-footer />

    <!-- jQuery, necesario para Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js, necesario para los dropdowns, tooltips y popovers en Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>