@extends('layouts.admin')

@section('content')
    <form class="form-horizontal" action="{{route('pages.store')}}" method="post">
        {{ csrf_field() }}

        {{-- Form include --}}
        @include('admin.pages.form')
    </form>
@endsection