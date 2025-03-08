<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'publish_date' => 'required|date',
        ]);

        // Crear un nuevo post para el usuario autenticado
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'user_id' => Auth::id(), // Asignar el user_id del usuario autenticado
        ]);

        return redirect()->route('posts.index');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);

        // Verificar que el usuario autenticado sea el propietario del post
        if ($post->user_id === Auth::id()) {
            $post->delete(); // Eliminar el post
            return redirect()->route('posts.index');
        }

        return redirect()->route('posts.index');
    }

    public function likePost($id)
    {
        $post = Post::findOrFail($id);

        // Obtener los usuarios que ya dieron mg
        $likedUsers = $post->liked_users ? json_decode($post->liked_users, true) : [];

        // Verificar si el usuario ya dio mg
        if (in_array(Auth::id(), $likedUsers)) {
            return back()->with('error', 'Ya has dado "me gusta" a este post');
        }

        // Si el usuario no ha dado mg agregar su ID
        $likedUsers[] = Auth::id();

        // Actualizar el campo liked_users y el contador de "Me gusta"
        $post->liked_users = json_encode($likedUsers);
        $post->n_likes = count($likedUsers); // Actualizar el contador de "Me gusta"
        $post->save();

        return back()->with('success', '¡Has dado "me gusta" a este post!');
    }
}
