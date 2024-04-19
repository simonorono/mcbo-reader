<!DOCTYPE html>
<html>
<head>
    <title>RSS Reader</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
<div class="container mx-auto">
    <header>
        <h1 class="text-2xl py-5 px-2">McboReader</h1>
        <hr>
    </header>
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
