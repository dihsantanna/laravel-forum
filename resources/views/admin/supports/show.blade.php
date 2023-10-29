@extends('admin.layouts.app')

@section('title', "Dúvida: {$support->subject}")

@section('header')
    <div class="flex items-center gap-x-3">
        <h1 class="text-lg text-black-500">Dúvida: {{ $support->subject }}</h1>
    </div>
@endsection

@section('content')
<ul class="max-w-md space-y-1 text-gray-700 list-decimal list-inside list-none my-4">
    <li>
        <span class="font-semibold text-gray-900 mr-2">Assunto: </span>
        {{ $support->subject }}
    </li>
    <li>
        <span class="font-semibold text-gray-900 mr-2">Status: </span>
        <x-status-support :status="$support->status" />
    </li>
    <li>
        <span class="font-semibold text-gray-900 mr-2">Descrição: </span>
        {{ $support->body }}
    </li>
</ul>

<form action="{{route('supports.destroy', $support->id)}}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Deletar</button>
</form>
@endsection
