<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', true)
            ->orderBy("id", "DESC")
            ->paginate(3);
        return view('posts.index', compact('posts')); //


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => '',
            'image' => 'nullable|image',
            'date_pub' => '',
            'author' => '',
            'status' => 'required',
            'category_id' => 'required'
        ]);
        // on cherche 
        $imageName = time() . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validated['image'] = $imageName;
        Post::create($validated);


        // Post::create($validatedData);

        return back()->with('success', 'article crée avec succes');
        // return redirect()->route('posts.index')
        //     ->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Post $post)
    // {
    //     return view('posts.edit', compact('post'));
    // }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Valider les données
        $validated = $request->validate([
            'title' => 'required',
            'description' => '',
            'image' => 'nullable|image',
            'date_pub' => '',
            'author' => '',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        // Mettre à jour les attributs du post
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->date_pub = $validated['date_pub'];
        $post->author = $validated['author'];
        $post->status = $validated['status'];
        $post->category_id = $validated['category_id'];

        // Vérifier si une nouvelle image est fournie
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        // Enregistrer les modifications
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Les modifications ont été enregistrées avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Supprimer l'image associée du dossier "images"
        if ($post->image) {
            $imagePath = public_path('images/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Supprimer le post de la base de données
        $post->delete();

        return back()->with('success', 'Article supprimé avec succès !');
    }
}
