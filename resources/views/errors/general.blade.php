<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error - Money Tracking</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .error-card {
            max-width: 500px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="card shadow error-card text-center p-4">
        <div class="card-body">
            <h3 class="text-danger mb-3">Terjadi Kesalahan</h3>
            <p class="text-muted">{{ $message }}</p>
            <a href="/login" class="btn btn-primary mt-3">Kembali ke Login</a>
        </div>
    </div>

    <!-- Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
