<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
</head>
<body class="bg-bg dark:bg-gray-900 font-sans">
    <header>
        <nav class="bg-white dark:bg-gray-800">
            <div class="mx-auto px-4 py-5">
                <a href="/reports" class="font-bold">
                    <span class="text-primary text-3xl">НАРУШЕНИЙ</span>
                    <span class="text-danger text-3xl">.НЕТ</span>
                </a>
            </div>
        </nav>
    </header>

    <main class="py-6 sm:py-10">
        
        <div class="container mx-auto px-4 sm:px-0 max-w-full sm:max-w-lg bg-surface dark:bg-gray-800 p-6 sm:p-8 rounded-xl shadow-md border border-border dark:border-gray-700">
            <h1 class="text-xl sm:text-2xl font-bold text-text dark:text-white mb-4 sm:mb-6 text-center">Редактирование заявления</h1>

            <form method="post" action="{{route('reports.update', ['report'=>$report])}}">
                @csrf
                @method('put')

                <label for="number" class="block text-sm font-medium text-label dark:text-gray-300 mb-1">Номер авто</label>
                <input type="text" name="number" id="number" x-data x-mask="a999aa999" x-on:input="e.target.value = e.target.value.toUpperCase().replace(/[^А-Я0-9]/g, '')" value="{{$report->number}}" required
                       class="w-full mb-4 px-3 sm:px-4 py-2 border border-border-dark dark:border-gray-600 bg-white dark:bg-gray-700 text-text dark:text-white rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all text-sm sm:text-base">

                <label for="description" class="block text-sm font-medium text-label dark:text-gray-300 mb-1">Описание</label>
                <textarea name="description" id="description" required
                          class="w-full mb-6 px-3 sm:px-4 py-2 border border-border-dark dark:border-gray-600 bg-white dark:bg-gray-700 text-text dark:text-white rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all min-h-[100px] sm:min-h-[120px] text-sm sm:text-base">{{$report->description}}</textarea>

                <input type="submit" value="Обновить"
                       class="w-full bg-primary hover:bg-primary/90 dark:bg-primary/80 dark:hover:bg-primary/60 text-white font-bold py-3 sm:py-4 rounded-xl cursor-pointer transition-all shadow-md active:scale-[0.98] text-sm sm:text-base">
            </form>
        </div>
    </main>
</body>
</html>
