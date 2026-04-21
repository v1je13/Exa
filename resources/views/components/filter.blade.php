@props(['sort', 'status', 'statuses'])

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-border dark:border-gray-700 p-4 mx-4">
    <div class="flex flex-col sm:flex-row gap-4">
        <!-- Сортировка по дате создания -->
        <div class="flex-1">
            <span class="text-sm font-medium text-text dark:text-gray-300 mb-2 block">Сортировка по дате создания:</span>
            <div class="flex gap-2">
                <a href="{{route('reports.index', ['sort'=> 'desc', 'status'=>$status])}}"
                   class="px-3 py-1.5 text-sm rounded-md transition-all {{ $sort === 'desc' ? 'bg-primary text-white font-semibold' : 'bg-gray-100 dark:bg-gray-700 text-text dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary' }}">
                    Новые
                </a>
                <a href="{{route('reports.index', ['sort'=>'asc', 'status'=>$status])}}"
                   class="px-3 py-1.5 text-sm rounded-md transition-all {{ $sort === 'asc' ? 'bg-primary text-white font-semibold' : 'bg-gray-100 dark:bg-gray-700 text-text dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary' }}">
                    Старые
                </a>
            </div>
        </div>

        <!-- Фильтрация по статусу -->
        <div class="flex-1">
            <span class="text-sm font-medium text-text dark:text-gray-300 mb-2 block">Фильтрация по статусу:</span>
            <div class="flex flex-wrap gap-2">
                @foreach ($statuses as $filterStatus)
                    <a href="{{route('reports.index', ['sort'=>$sort,'status'=>$filterStatus->id])}}"
                       class="px-3 py-1.5 text-sm rounded-md transition-all {{ $status == $filterStatus->id ? 'bg-primary text-white font-semibold' : 'bg-gray-100 dark:bg-gray-700 text-text dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary' }}">
                        {{ $filterStatus->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
