<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
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

    <main class="py-6 sm:py-12">

        <div class="container mx-auto px-4 sm:px-0 max-w-full sm:max-w-lg bg-surface dark:bg-gray-800 p-6 sm:p-10 rounded-xl sm:rounded-2xl shadow-lg border border-border dark:border-gray-700">
            <h2 class="text-xl sm:text-2xl font-bold text-text dark:text-white mb-4 sm:mb-6">Новое заявление</h2>

            <form method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">

                @csrf

                <input type="text" name="number" id="number" x-data x-mask="a999aa999" x-on:input="e.target.value = e.target.value.toUpperCase().replace(/[^А-Я0-9]/g, '')" placeholder="Государственный регистрационный номер автомобиля" required
                    class="w-full mb-4 px-3 sm:px-4 py-2 sm:py-3 border border-border-dark dark:border-gray-600 bg-white dark:bg-gray-700 text-text dark:text-white rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:outline-none transition-all placeholder:text-text-light dark:placeholder:text-gray-400 shadow-sm text-sm sm:text-base">

                <textarea name="description" id="description" placeholder="Описание нарушения" required
                    class="w-full mb-6 px-3 sm:px-4 py-2 sm:py-3 border border-border-dark dark:border-gray-600 bg-white dark:bg-gray-700 text-text dark:text-white rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:outline-none transition-all placeholder:text-text-light dark:placeholder:text-gray-400 shadow-sm min-h-[120px] sm:min-h-[150px] text-sm sm:text-base"></textarea>
                <div class="flex items-center space-x-3 mt-4">
                    <label for="path_img" class="cursor-pointer bg-[#242b3d] hover:bg-[#2d354a] text-white font-bold py-2 px-4 rounded transition-colors text-sm">
                        Выберите файл
                    </label>
                    <input type="file" name="path_img" id="path_img" class="hidden" required
                        onchange="document.getElementById('file-name').innerText = this.files[0].name">
                </div>
                <input type="submit" value="Создать заявление"
                    class="w-full bg-primary hover:bg-primary/90 dark:bg-primary/80 dark:hover:bg-primary/60 text-white font-bold py-3 sm:py-4 rounded-xl cursor-pointer transition-all shadow-md active:scale-[0.98] text-sm sm:text-base">
            </form>
        </div>
    </main>
</body>

</html>