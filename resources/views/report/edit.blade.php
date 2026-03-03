<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
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
    <main class="py-10">

          <div class="container mx-auto max-w-lg bg-white p-8 rounded-xl shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Редактирование заявления</h1>
             <form method="post" action="{{route('reports.update', ['report'=>$report])}}" >
            @csrf
            @method('put')
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Номер авто</label>
                <input type="text" name="number" id="number" value="{{$report->number}}" required class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">


                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                <textarea name="description" id="description" required class="w-full mb-6 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all min-h-[120px]">{{$report->description}}</textarea>
                
             <input type="submit" value="Обновить" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl cursor-pointer transition-all shadow-md active:scale-[0.98]">

         </form>
        </div>
    </main>
</body>
</html>
