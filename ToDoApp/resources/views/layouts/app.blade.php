<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Laravel ToDo App</title>
</head>
<body class="bg-light-mode">
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
