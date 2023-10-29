@extends('admin.layouts.app')

@section('title', 'Nova Dúvida')

@section('header')
    <div class="flex items-center gap-x-3">
        <h1 class="text-lg text-black-500">Nova Dúvida</h1>
    </div>
@endsection

@section('content')
<form action="{{route('supports.store')}}" method="POST">
    @include('admin.supports.partials.form')
</form>
@endsection
