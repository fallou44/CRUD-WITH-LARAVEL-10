@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description de l'article</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Date publication</label>
            <input type="date" name="date_pub" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Auteur</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
            <label>categories</label>
            <select name="category_id" id="status" class="form-control">
                <option>choisir une categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>


            <div class="form-group">
                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Publié</option>
                    <option value="0"> Non publié</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
