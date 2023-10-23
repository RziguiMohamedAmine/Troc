<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'content' => 'required|max:255',
        'blog_id' => 'required', 
    ]);
    $comment = new Comment;
    $comment->content = $validatedData['content'];
    $comment->blog_id = $validatedData['blog_id'];
    $comment->user_id = Auth::id(); 
    $comment->save();
    return redirect()->route('blogs.show', $validatedData['blog_id']);
}
     
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::with('comments')->find($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
    
        return view('comments.edit', compact('comment'));
    }
    
    

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Vérifiez si l'utilisateur est autorisé à mettre à jour le commentaire
        if (auth()->user()->can('update', $comment)) {
            $comment->update([
                'content' => $request->input('content')
            ]);
            $comment->save();
            return redirect()->back()->with('success', 'Commentaire mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de mettre à jour ce commentaire.');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Vérifiez si l'utilisateur est autorisé à supprimer le commentaire
        if (auth()->user()->can('delete', $comment)) {
            $comment->delete();
            return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
        } else {
            return redirect()->back()->with('error', 'Vous n\'avez pas la permission de supprimer ce commentaire.');
        }
    }
    
    
    

}
