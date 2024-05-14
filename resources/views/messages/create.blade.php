<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .message {
            margin-bottom: 10px;
        }

        .message .sender {
            font-weight: bold;
        }

        .message .timestamp {
            font-size: 0.8em;
            color: #999;
        }

        .message .content {
            margin-left: 10px;
        }

        .input-group {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="container chat-container">
        <h1>Conversación con {{ $conversation->participant->name }}</h1>
        <div id="message-container">
            @foreach ($conversation->messages as $message)
            <div class="message">
                <span class="sender">{{ $message->user->name }}:</span>
                <span class="timestamp">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                <div class="content">{{ $message->content }}</div>
            </div>
            @endforeach
        </div>
        <form id="message-form">
            <div class="input-group">
                <textarea class="form-control" id="message-input" rows="3" placeholder="Escribe tu mensaje aquí"></textarea>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <x-footer />

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
    <!-- jQuery, necesario para Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js, necesario para los dropdowns, tooltips y popovers en Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>