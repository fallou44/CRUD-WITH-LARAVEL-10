@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required>{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Date Published</label>
                <input type="date" name="date_pub" class="form-control" value="{{ $post->date_pub }}" required>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Auteur</label>
                <input type="text" name="author" class="form-control" value=" {{ $post->author }}">
            </div>

            <div class="form-group">
                <label>categories</label>
                <select name="category_id" id="status" class="form-control">
                    <option>choisir une categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ $category->id == $post->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                {{--  --}}

                {{--  --}}
                {{-- <div class="form-group">
                    <label>Status</label>
                    <input type="checkbox" name="status" class="form-check-input" {{ $post->status ? 'checked' : '' }}>
                </div> --}}


                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $post->status ? 'checked' : '' }}>Publié</option>
                        <option value="0"{{ $post->status ? 'checked' : '' }}> Non publié</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endsection
