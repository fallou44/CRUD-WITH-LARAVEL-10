@extends('layouts.app')

@section('title', 'Nnouvel article')

@section('content')
    <div class="row">
        <h3>Nouvel article</h3>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            @include('posts.form')
        </form>
    </div>
@endsection
