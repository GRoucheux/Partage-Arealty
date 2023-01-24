<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class User extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
        'id' => $this->id,
        'username' => $this-> username,
        'name' => $this->name,
        'lastname' => $this->lastname,
        'email' => $this->email, 
        'password' => $this -> password,
        'admin' => $this -> admin,
        'created_at' => $this -> created_at,
        'updated_at' => $this -> updated_at,
        ];
    }
}
