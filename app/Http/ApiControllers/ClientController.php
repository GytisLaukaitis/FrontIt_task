<?php

//namespace App\Http\ApiControllers;
//
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//
//class ClientController extends Controller
//{
//    //
//}



use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;

class ClientController extends JsonApiController
{

    public function share(\App\Client $post): \Illuminate\Http\Response
    {
        \App\Jobs\SharePost::dispatch($post);

        return $this->reply()->content(Client::orderBy('id')->get());
    }

}
