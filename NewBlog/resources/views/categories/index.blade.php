@extends('layouts.app')

@section('title', "La liste des categorie d'article")

@section('content')
    <div class="row">
        <h3>Liste des categories</h3>
        <div class="d-grid gap-2 d-md-flex justify-content-mg-end">
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-right ">Ajouter</a>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Non de la categories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td style="display: flex">
                            <a class="btn btn-warning btn-sm" style="margin-right:5px"
                                href="{{ route('categories.edit', $category->id) }}">
                                Modifier
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input onclick="return confirm('vouslez-vous vraiment supprimer ?')"
                                    class="btn btn-danger btn-sm" type="submit" value="supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
