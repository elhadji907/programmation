<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Courrier;
use App\Notifications\newCommentPosted;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Courrier $courrier)
    {
        request()->validate(
            [
                'commentaire'   =>  'required|min:5',
            ]
        );

        $comment = new Comment();
        $comment->content  = request('commentaire');
        $comment->users_id = auth()->user()->id;
        $comment->courriers_id = $courrier->id;

        $courrier->comments()->save($comment);

        // dd($courrier);

        // Notifications

        $courrier->user->notify(new newCommentPosted($courrier, auth()->user()));

        return redirect()->route('courriers.show', $courrier->id);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function storeCommentReply(Comment $comment)
    {
        request()->validate(
            [
                'replayComment'   =>  'required|min:5',
            ]
        );

        $commentReply = new Comment();
        $commentReply->content = request('replayComment');
        $commentReply->users_id = auth()->user()->id;
        $commentReply->courriers_id = $comment->courrier->id;

        $comment->comments()->save($commentReply);

        
        //Notifications Réponse 

        $comment->user->notify(new newCommentPosted($comment->courrier, auth()->user()));

        return redirect()->back();
        
    }

}
