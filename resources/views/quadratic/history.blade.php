<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История решений</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // JavaScript function to confirm deletion
        function confirmDelete(event) {
            event.preventDefault();

            if (confirm("Вы уверены, что хотите удалить это решение?")) {
                event.target.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center mb-4">История решений</h1>

                @if($solutions->isEmpty())
                    <div class="alert alert-info">Нет сохранённых решений.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Коэффициент a</th>
                                    <th scope="col">Коэффициент b</th>
                                    <th scope="col">Коэффициент c</th>
                                    <th scope="col">X1</th>
                                    <th scope="col">X2</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solutions as $solution)
                                    <tr>
                                        <td>{{ $solution->a }}</td>
                                        <td>{{ $solution->b }}</td>
                                        <td>{{ $solution->c }}</td>
                                        <td>
                                            @if($solution->x1 !== null)
                                                {{ $solution->x1 }}
                                            @else
                                                Нет действительных решений
                                            @endif
                                        </td>
                                        <td>
                                            @if($solution->x2 !== null)
                                                {{ $solution->x2 }}
                                            @else
                                                Нет второго решения
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('quadratic.destroy', $solution->id) }}" method="POST" onsubmit="confirmDelete(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <nav aria-label="Page navigation">
                        {{ $solutions->links('pagination::bootstrap-5') }}
                    </nav>
                @endif

                <a href="{{ route('quadratic.index') }}" class="btn btn-primary mt-3">Назад к форме</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
