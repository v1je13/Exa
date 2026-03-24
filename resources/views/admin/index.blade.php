<x-app-layout>
    <div class="mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Административная панель</h1>




        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="text-left border-b border-gray-200 dark:border-gray-700">
                        <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-200">ФИО</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-200">Текст заявления</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-200">Номер автомобиля</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-200">Статус</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach ($reports as $report)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                            {{ $report->users->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 max-w-md">
                            {{ $report->description }}
                        </td>
                        <td class="px-6 py-4 text-sm font-mono text-gray-900 dark:text-gray-100">
                            {{ $report->number }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="text-gray-600 dark:text-gray-400">
                                {{ $report->status->name }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</x-app-layout>