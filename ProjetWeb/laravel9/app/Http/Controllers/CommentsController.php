<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    $comments = Comments::create([ 
    "content"=> $request->content,
    "author"=> $request->author,
    "post_id"=> $request->post_id
    ]);

    return response ('comment created', 200)
                ->json($request);
        
        

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
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $show = Comments::where('id',$req->id)->get();
        return $show;

        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $res=Comments::where("id", $req->id)->get();//variable choix contient title ou content
                                                              //si title, modifie title
                                                              //si content; modifie le contenu
        if (count($res)>0)                                    //si rien, 404
        {                                                           
            Comments::where('id',$req->id)
                -> update(['content' => $req->modify]);

            return response ('modified', 200)
                ->header('Content-Type', 'text/plain');
        }

        else
        {
            return response('Not found', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
       
            $res =Comments::where("id", $req->id)->delete();//supprimer le post
            
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        
    }

    public function seeAll()
    {
       $posts = Comments::all();

       return response()->json($posts);
        
    }
}
