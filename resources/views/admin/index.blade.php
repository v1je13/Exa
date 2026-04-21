<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#DDE8FF]">
    <nav class="bg-white">
        <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
            <a href="/reports" class="font-bold">
                <span class="text-blue-600 text-3xl">НАРУШЕНИЙ</span>
                <span class="text-red-600 text-3xl">.НЕТ</span>
            </a>
        </div>
    </nav>

    @include('layouts.flash-messages')

    <x-app-layout>
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Административная панель</h1>

        <div class="overflow-x-auto">
            <table class="w-full text-white">
                <thead>
                    <tr class="text-gray-500">
                        <th class="px-4 text-left">ФИО</th>
                        <th class="px-4 text-left">Текст заявления</th>
                        <th class="px-4 text-left">Номер автомобиля</th>
                        <th class="px-4 text-left">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr class="text-gray-500">
                        <td class="px-4 py-2">
                            @php($u = $report->user)
                            {{ $u ? trim($u->lastname.' '.$u->name.' '.$u->middlename) : __('Не указан') }}
                        </td>
                        <td class="px-4 py-2">{{ $report->description }}</td>
                        <td class="px-4 py-2">{{ $report->number }}</td>
                        <td class="px-4 py-2">
                            <form class="status-form" action="{{route('reports.status.update', $report->id )}}" method="POST">
                                @method('patch')
                                @csrf
                                <select name="status_id" id="status_id" {{ $report->status_id != 1 ? 'disabled' : '' }}>
                                    @foreach($statuses as $status)
                                    <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                        {{$status->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($report->status_id == 1)
                                    <button type="submit" class="ms-2 px-3 py-1 rounded bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        {{ __('Сохранить') }}
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>
</body>

</html>
