@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    <p>Description: {{ $post->description }}</p>
    {{-- <p>Tithe: {{ $post->Tithe }}</p> --}}
    {{-- <p>Description: {{ $post->description }}</p> --}}
    <p>Date Date de publicatiob: {{ $post->date_pub }}</p>
    <p>Auteur: {{ $post->author }}</p>
    <p>categorie: {{ $post->category->name }}</p>
    <p>Status: {{ $post->status }}</p>
    <!-- ... -->
    <a href="{{ route('posts.index', $post->id) }}" class="btn btn-outline-warning">
        <- </a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        @endsection
