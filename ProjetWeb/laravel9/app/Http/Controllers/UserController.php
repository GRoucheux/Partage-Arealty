<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
/**
 * @OA\Info(
 *    title="Your super  ApplicationAPI",
 *    version="1.0.0",
 * )
 */
class UserController extends BaseController
{
    ///////////////////////////////////////////////////////////////
    ////////////////////Creer un utilisateur///////////////////////
    ///////////////////////////////////////////////////////////////

    public function register(Request $request) 
    {
        //error_log($request);
        //var_dump($request);
    $utilisateur = User::create([ 
    'username' => $request->username,
    'name' => $request->name,
    'lastname' => $request->lastname,
    'email' => $request->email,
    'password' => bcrypt($request->password),
    'admin' => $request->admin]);

    return response('Success', 200)
                    ->header('Content-Type', 'text/plain');
    }

    //////////////////////////////////////////////////////////////////
    ///////////////////////Supprimer utilisateur//////////////////////
    //////////////////////////////////////////////////////////////////

    public function delUser(Request $req)
    {
        $res =User::where("username", $req->username)->get(); //veriifer que l'utilisateur existe
        if (count($res)>0)
        {
            $res =User::where("username", $req->username)->delete();//supprimer l'utilisateur
            
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        }

        else 
        {
            return response('Not found', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////Modifier un utilisateur////////////////////////
    ////////////////////////////////////////////////////////////////////

    public function modifyUser(Request $req)
    {

        $res=User::where("username", $req->username)->get();//variable choix contient email, password, username, name, lastname
                          
         //requete de bdd pour chercher un utilisateur en fonction des données reçues en post
        // return $users;
                                          //si password, modifie password                                 //si mail; modifie le mail
        if (count($res)>0)                                    //si rien, 404
        {                                                           
            if ($req['choix']==='password')                   //variable modify contient le nouveau        
            {                                                 //mot de passe ou mail
                User::where('username',$req->username)
                    -> update(['password' => bcrypt($req->modify)]);
                
                return response('Password modified', 200)
                        ->header('Content-Type', 'text/plain');
            }

            elseif($req['choix'] == 'mail')
            {  
                User::where('username',$req->username)
                    -> update(['email' => $req->modify]);

                return response('Mail modified', 200)
                        ->header('Content-Type', 'text/plain');   
            }

            elseif($req['choix'] == 'username')
            {  
                User::where('username',$req->username)
                    -> update(['username' => $req->modify]);

                return response('Mail modified', 200)
                        ->header('Content-Type', 'text/plain');   
            }

            elseif($req['choix'] == 'name')
            {  
                User::where('username',$req->username)
                    -> update(['name' => $req->modify]);

                return response('Mail modified', 200)
                        ->header('Content-Type', 'text/plain');   
            }

            elseif($req['choix'] == 'lastname')
            {  
                User::where('username',$req->username)
                    -> update(['lastname' => $req->modify]);

                return response('Mail modified', 200)
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

    /////////////////////////////////////////////////////////////////////////////
    //////////////Verifier l'existance d'un utilisateur par Username/////////////
    /////////////////////////////////////////////////////////////////////////////

    public function verifyUserExist(Request $req)
    {
        $users = User::where("username", $req->username)->get(); //requete de bdd pour chercher un utilisateur en fonction des données reçues en post
        return $users;
        if(count($users) > 0) 
        {
            
            return response('Success', 200)
                ->header('Content-Type', 'text/plain');
        } 
        else 
        {
            return response('Not found', 404)
                ->header('Content-Type', 'text/plain');
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////Voir tout les utilisateurs///////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function show() 
    {
       $users = User::all();

       return response()->json($users);
    }


    /////////////////////////////////////////////////////////////////////////////
    ////////////////////////Verification identité utilisateur////////////////////
    /////////////////////////////////////////////////////////////////////////////

    public function verifyUser(Request $req)//requis: password, username
    {   
        $res = User::where("username", $req->username)->get();
        if (count($res) > 0)
        {  
            if (Hash::check($req['password'],$res[0]['password']))
            {
                return response('Success', 200)
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

    public function getUser(Request $req)
    {
        $bidule = json_decode($req-> username);
        $user = User::where("username", $bidule)->get()->first();
        
        return response()->json($user);
    }//y faut parser jason a l'arrivée

    public function getUserA(Request $req)
    {
        $user = User::where("username", $req-> username)->get()->first();
        
        return response()->json($user);
    }
}