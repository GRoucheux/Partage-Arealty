<?php

namespace App\Http\Controllers;

use App\Models\Posts_liked_by;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostsLikedByController extends Controller
{
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
    public function create(Request $req)
    {
        $like = Posts_liked_by::Create([
            'username' => $req-> username,
            'id' => $req -> id,
        ]);

        return response('Liked', 200)
        ->json($req);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts_liked_by  $posts_liked_by
     * @return \Illuminate\Http\Response
     */
    public function show(Posts_liked_by $posts_liked_by)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts_liked_by  $posts_liked_by
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts_liked_by $posts_liked_by)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts_liked_by  $posts_liked_by
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts_liked_by $posts_liked_by)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts_liked_by  $posts_liked_by
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $res =Posts_liked_by::where("id", $req->id)->delete();//supprimer le like
            
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
    }

    public function seeAll()
    {
       $posts = Posts_liked_by::all();

       return response()->json($posts);
        
    }
}
