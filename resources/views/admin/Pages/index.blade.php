@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <a href="" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Добавть страницу</a>
    </div>

<hr><hr>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($pages->count()==0)
        <div class="alert alert-warning">Данных нет</div>
    @else
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>url</th>
            <th>Опубликация</th>
            <th>Дата добавления</th>
            <th>Дата обновления</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pages as $page)

        <tr class="cat-item">
            <td>
                <a href="{{ route('pages.edit', $page->id) }}">{{$page->title}}</a>
            </td>
            </td>
            <td>
                {{$page->slug}}
            </td>
            <td>
                @if ($page->published == 1)
                    Опубликована
                @else
                    Не опубликована
                @endif
            </td>
            <td>
                {{$page->created_at}}
            </td>
            <td>
                {{$page->updated_at}}
            </td>
            <td>
                <div class="btn-group btn-group-sm pull-right">
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
                    <a href="{{ route('pages.destroy', $page->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>
                </div>
            </td>

        </tr>

    @endforeach
    </tbody>


        @endif

</table>
@endsection