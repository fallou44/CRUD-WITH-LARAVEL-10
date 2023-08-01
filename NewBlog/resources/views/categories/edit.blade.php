@extends('layouts.app')

@section('titie', "modification d'une categorie")

@section('content')
    <div class="row">
        <h3>modification d'une categorie</h3>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories.form')
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning">
                    Enregistrer la categorie
                </button>
            </div>
        </form>
    </div>
@endsection
