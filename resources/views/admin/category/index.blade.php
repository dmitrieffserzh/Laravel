@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <a href="{{ route('category.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Добавть категорию</a>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>
    @foreach ($categories as $category)

    <tr class="cat-item"><td>{!! $delimiter or "" !!}{{$category->title or ""}}</td></tr>

        @if (count($category->children) > 0)
            @include('admin.category.partials.list', [
              'categories' => $category->children,
              'delimiter'  => ' - ' . $delimiter
            ])
        @endif
        </td>
    </tr>
    @endforeach
        </tbody>
    </table>
@endsection