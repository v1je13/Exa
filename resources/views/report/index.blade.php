<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявлений</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="flex justify-between">
        <nav class="bg-white">
            <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
                <a href="/reports" class="font-bold">
                    <span class="text-blue-600 text-3xl">НАРУШЕНИЙ</span>
                    <span class="text-red-600 text-3xl">.НЕТ</span>
                </a>

            </div>
        </nav>
    </header>
    <main class="bg-[#DDE8FF] ">
        <div class="  mx-auto px-4 p-4">
            <a href="{{route('reports.create')}}" class="inline-block px-6 py-2 bg-mint-500 text-white rounded-md text-sm">
                Создать заявление
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach ($reports as $report)
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex mb-3">

                        {{ $report->created_at}}
                    </div>
                    <div class="flex justify-between items-start mb-4">
                        
                            <h3 class="text-xl font-bold text-blue-600 group-hover:text-blue-800 transition-colors">
                                {{ $report->number }}
                            </h3>
                       

                    </div>


                    <p class="mb-3">
                        {{ $report->description }}
                    </p>



                    <div class="flex justify-between mt-5">
                        <form action="{{route('reports.destroy', $report->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <input class="cursor-pointer border-none rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-6 py-2 transition-all shadow-sm hover:shadow-md active:scale-95" type="submit" value="Удалить">
                        </form>


                        <form action="{{ route('reports.edit', ['report' => $report]) }}" method="get">
                            @csrf
                            <input class="cursor-pointer border-none rounded-lg bg-slate-500 hover:bg-slate-600 text-white text-sm font-semibold px-6 py-2 transition-all shadow-sm hover:shadow-md active:scale-95" type="submit" value="Редактировать">
                        </form>
                    </div>


                </div>
            </div>
            @endforeach
        </div>

        </div>
        </div>
    </main>
</body>

</html>