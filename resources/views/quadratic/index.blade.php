<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Решение квадратного уравнения</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #d7e9f7;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .form-control {
            font-size: 14px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #65a23b;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4c8331;
        }

        .link {
            margin-top: 15px;
            display: block;
            color: #007bff;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }

        .history-link {
            text-align: right;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-label {
            margin-right: 10px;
            margin-bottom: 0;
        }

        .form-control {
            width: 70%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Решение квадратного уравнения</h1>
        <form action="{{ route('quadratic.solve') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="a" class="form-label">a =</label>
                <input type="number" name="a" class="form-control" placeholder="введите значение..." required>
            </div>
            <div class="form-group">
                <label for="b" class="form-label">b =</label>
                <input type="number" name="b" class="form-control" placeholder="введите значение..." required>
            </div>
            <div class="form-group">
                <label for="c" class="form-label">c =</label>
                <input type="number" name="c" class="form-control" placeholder="введите значение..." required>
            </div>
            <button type="submit" class="btn btn-primary">Найти решение</button>
        </form>
        <div class="history-link">
            <a href="{{ route('quadratic.history') }}" class="link">История</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
