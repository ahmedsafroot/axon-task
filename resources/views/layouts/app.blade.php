<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Axon Task</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1">
            Phone Number Validator
        </span>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="text-center text-muted py-4 mt-5">
    © {{ date('Y') }} Ahmed Refaat. All rights reserved.
</footer>

</body>
</html>
