<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Post = new Posts(); 
        $Post->title=$request['title'];
        $Post->content=$request['content'];
        $Post->author=$request['author'];
        $Post->save();

        return response('Post created', 200)
        ->header('Content-Type', 'text/plain');

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
        $show = Posts::where('id',$req->id)->get();

        return response()->json($show);
    }

    public function showByAuthor(Request $req)
    {
        $show = Posts::where('author', $req->author)->get();
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
        $res=Posts::where("id", $req->id)->get();//variable choix contient title ou content
                                                              //si title, modifie title
                                                              //si content; modifie le contenu
        if (count($res)>0)                                    //si rien, 404
        {                                                           
            if ($req['choix']==='title')                   //variable modify contient le nouveau        
            {                                                 //titre ou contenu
                Posts::where('username',$req->id)
                    -> update(['title' => $req->modify]);
                
                return response('Title modified', 200)
                        ->header('Content-Type', 'text/plain');
            }

            elseif($req['choix'] === 'content')
            {  
                Posts::where('id',$req->id)
                    -> update(['content' => $req->modify]);

                return response('Content modified', 200)
                        ->header('Content-Type', 'text/plain');   
            }

            else
            {
                return response('Not found', 404)
                ->header('Content-Type', 'text/plain'); 
            }
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
       
            $res =Posts::where("id", $req->id)->delete();//supprimer le post
            
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        
    }

    public function seeAll()
    {
       $posts = Posts::all();

       return response()->json($posts);
        
    }
}
