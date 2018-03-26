@extends('layouts.admin')

@section('content')
        <form class="form-horizontal" action="{{route('category.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.category.partials.form')

        </form>
@endsection