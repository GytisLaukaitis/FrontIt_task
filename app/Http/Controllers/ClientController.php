<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

      /**
     * @SWG\Get(
     *   path="/api/clients/{user}",
     *   summary="Get Users",
     *   operationId="testing",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=403, description="forbidden"),
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Parameter(name="user", in="path", required=true, type="string"),
     * )
     */

    public function index() {
        return response()->json(['clients' => Client::orderBy('id')->get()]);
    }



   /**
    * @SWG\Post(
     *      path="/api/clients",
     *      operationId="ApiV1saveUser",
     *      summary="Add User",
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="surname", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="yearOfBirth", in="formData", required=true, type="string"),
     *      @SWG\Response(response=200, description="Success"),
     *      @SWG\Response(response=201, description="Created"),
     *      @SWG\Response(response=204, description="No Content"),
     * )
     */


    public function store(Request $request) {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:clients'],
            'surname' => ['required', 'string', 'max:255'],
            'yearOfBirth' => 'required|date_format:Y-m-d|before:today'
        ],
            [
                'name.required' => 'Enter name',
                'surname.required' => 'Enter surname',
                'yearOfBirth.required' => 'Enter year of birth',
                'name.unique' => 'Name already exist',
            ]);

        $client = new Client();
        $client->fill($request->all());
        $client->save();
        return response()->json($client, 201);
    }
}
