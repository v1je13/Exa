@props(['sort', 'status'])

<div>
        <div>
            <span>Сортировка по дате создания:</span>
            <a href="{{route('reports.index', ['sort'=> 'desc', 'status'=>$status])}}">Новые</a>
            <a href="{{route('reports.index', ['sort'=>'asc', 'status'=>$status])}}">Старые</a>
        </div>
        <div>
        <p>Филтрация по статусу</p>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{route('reports.index', ['sort'=>$sort,'status'=>$status->id])}}">{{$status->name}}</a>
                </li>
            @endforeach
        </ul>
        </div>
</div>