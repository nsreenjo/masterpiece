<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentFromDB =  Comment::all();
        return view('dashboard.comments.index', ['comments' => $commentFromDB]);

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
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show($product_id)
    // {
    //     $product = Product::findOrFail($product_id);
    
    //     $comments = $product->comment_id;
    
    //     return view('dashboard.comments.show', compact('comments', 'product'));
    // }
    



/**
 * Display the specified resource.
 */
public function show($id) 
{
    $comment = Comment::with('user','product')->findOrFail($id);

    return view('dashboard.comments.show', compact('comment')); 
}






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
    
        $comment->delete();
    
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
    
}