@extends('layouts.app')

@section('title', 'la liste des articles')

@section('content')
    <div class="row">
        <h3>la liste des articles</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Tithe</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Date de publication</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">categorie</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <img width="50" class="img-thumbnail" src="{{ asset('images/' . $post->image) }}"
                                alt="">
                        </td>
                        <td>
                            <strong>{{ $post->title }}</strong>
                        </td>
                        <td>
                            <strong>{{ $post->description }}</strong>
                        </td>
                        <td>
                            {{ $post->date_pub }}
                        </td>
                        <td>
                            {{ $post->author }}
                        </td>
                        <td>
                            {{ $post->category->name }}
                        </td>
                        <td>
                            @if ($post->status == 1)
                                <span class="badge text-bg-success">
                                    publié
                                </span>
                            @else
                                <span class="badge text-bg-sucess">
                                    Non publié
                                </span>
                            @endif
                        </td>
                        <td style="display : flex">
                            <a class="btn btn-primary btm-sm" style="margin-right: 5px"
                                href="{{ route('posts.show', $post->id) }}">Detail
                            </a>
                            <a class="btn btn-warning btn-sm" style="margin-right: 5px"
                                href="{{ route('posts.edit', $post->id) }}">Modifier
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input onclick="return confirm('Voulez-vous vraiment supprimer ?')"
                                    class="btn btn-sm btn-danger" type="submit" value="supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
