@extends('admin.layouts.app')

@section('title', "Editar a Dúvida {$support->subject}")

@section('header')
    <div class="flex items-center gap-x-3">
        <h1 class="text-lg text-black-500">Dúvida: {{ $support->subject }}</h1>
    </div>
@endsection

@section('content')
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', [
        'support' => $support
    ])
</form>
@endsection
