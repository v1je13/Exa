<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans">
    <header class="flex justify-between bg-white border-b shadow-sm">
       <nav class="bg-white w-full">
        <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
            <a href="/reports" class="font-bold tracking-tighter">
                <span class="text-blue-600 text-3xl">НАРУШЕНИЙ</span>
                <span class="text-red-600 text-3xl">.НЕТ</span>
            </a>
         
        </div>
    </nav>
    </header>
    <main class="py-12">
        <div class="container mx-auto max-w-lg bg-white p-10 rounded-2xl shadow-lg border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Новое заявление</h2>
            <form method="POST" action="{{route('reports.store')}}" >
                @csrf
                <input type="text" name="number" id="number" placeholder="Номер авто" required class="w-full mb-4 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all placeholder:text-gray-400 shadow-sm"><br>
                
                <textarea name="description" id="description" placeholder="Описание" required class="w-full mb-6 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all placeholder:text-gray-400 shadow-sm min-h-[150px]"></textarea><br>
                
                <input type="submit" value="Создать" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl cursor-pointer transition-all shadow-md active:scale-[0.98]">
            </form>
        </div>
    </main>
</body>
</html>
