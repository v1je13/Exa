<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список продуктов</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="flex justify-between">
        <h1>Интернет-магазин</h1>
        
    </header>
    <main>
        <div class="container mx-auto">
            <h2>Каталог товаров</h2>
            <div>
                @foreach ($reports as $report)
                            <a href="{{route('reports.index',['report'=>$report])}}">
                                <h3>{{ $report->number }}</h3>
                            </a>
                            <p>{{ $report->description }}</p>
                            <p>{{ $report->timestamps}}</p>
                        </div>
                      
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>