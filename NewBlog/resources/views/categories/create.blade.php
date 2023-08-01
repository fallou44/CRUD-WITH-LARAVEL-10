@extends('layouts.app')
@section('title', "alouter d'une nouvelle categorie")
@section('content')
    <div class="row">
        <h3>Formulaire de creation d'une categories</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @include('categories.form')
            <div class="d-grid-gap-2">
                <button type="submit" class="btn btn-primary">
                    Ajouter une categorie
                </button>
            </div>
        </form>
    </div>
@endsection
