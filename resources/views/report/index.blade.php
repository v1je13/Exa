<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявлений</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-bg dark:bg-gray-900">

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

    <main>
        <x-app-layout>

            <x-filter :sort="$sort" :status="$status" :statuses="$statuses"></x-filter>

            <div class="mx-auto px-4 p-4">
                <a href="{{ route('reports.create') }}"
                    class="bg-primary hover:bg-primary/90 dark:bg-primary/80 dark:hover:bg-primary/60 text-white px-6 py-3 rounded-md inline-block w-full sm:w-auto text-center">
                    Создать заявление
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                @foreach ($reports as $report)
                <div class="bg-white dark:bg-gray-800 rounded p-4 border border-border dark:border-gray-700">
                    <div class="mb-2 text-text-muted dark:text-gray-400 text-sm">
                        {{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i') }}
                    </div>

                    <h3 class="text-primary dark:text-primary/80 text-xl font-bold mb-3">
                        {{ $report->number }}
                    </h3>

                    <p class="mb-3 text-text dark:text-gray-300 text-sm">
                        {{ $report->description }}
                    </p>
                    @isset($report->path_img)
                        <img src="{{Storage::url($report->path_img)}}" class="contact-block__img" alt="#">
                    @endisset
                    <x-status :type="$report->status_id">
                        {{ $report->status->name}}
                    </x-status>
                    <div class="flex flex-col sm:flex-row gap-2 mt-4">
                        <form action="{{route('reports.destroy', $report->id)}}" method="post" class="w-full sm:w-1/2">
                            @method('delete') @csrf
                            <input type="submit" value="Удалить"
                                class="w-full bg-danger hover:bg-danger/80 dark:bg-danger/80 dark:hover:bg-danger/60 text-white px-4 py-2 rounded cursor-pointer text-sm">
                        </form>

                        <a href="{{ route('reports.edit', ['report' => $report]) }}"
                           class="inline-block text-center w-full sm:w-1/2 bg-secondary hover:bg-secondary/80 dark:bg-secondary/80 dark:hover:bg-secondary/60 text-white px-4 py-2 rounded text-sm">
                            Редактировать
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="px-4 pb-4">
                {{$reports->appends(request()->query())->links()}}
            </div>
        </x-app-layout>
    </main>

</body>

</html>
