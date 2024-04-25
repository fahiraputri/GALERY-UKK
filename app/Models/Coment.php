<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use Illuminate\Http\Request;

class komenController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data komentar
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'nama' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        
        $comment = Comment::create([
            'post_id' => $validated['post_id'],
            'nama' => $validated['nama'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('status', 'Komentar berhasil ditambahkan.');
    }

    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return response()->json($comments);
    }

    public function show($id)
{
    $post = Post::find($id);
    $komen = Comment::all();
    return view('post.post',['post'=>$post,'komen'=>$komen,'id'=>$id]);
}

    public function insertData(Request $request, $id)
    {
        $faker = Faker::create();
        $post = Post::find($id);
        $user = new Comment();
        $user->comment = $request->komentar;
        $user->id_post = $request->id;
        return redirect()->action('CommentController@comment',['id'=>$id]);
    }
}