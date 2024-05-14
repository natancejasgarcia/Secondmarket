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
        <h1>Conversación con {{ $conversation->participants->where('user_id', '!=', auth()->id())->first()->user->name }}</h1>
        <div class="messages">
            @foreach ($messages as $message)
            <div class="card mb-2">
                <div class="card-body">
                    <strong>{{ $message->user->name }}:</strong>
                    <p>{{ $message->content }}</p>
                    <div class="text-muted">
                        {{ $message->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <form action="{{ route('conversations.messages.store', $conversation->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" required placeholder="Escribe tu mensaje aquí..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
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