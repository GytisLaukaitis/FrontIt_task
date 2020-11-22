<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
      private $cust_arr = [["Jonas", "Jonaitis"], ["Petras", "Petraitis"]];

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
        return response()->json(['clients' => Client::orderBy('name')->get()]);
    }

    /*
	public function index(Request $request){
		return response()->json($this->cust_arr);
      }
      */

   /**
    * @SWG\Post(
     *      path="/api/clients",
     *      operationId="ApiV1saveUser",
     *      summary="Add User",
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="surname", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="yearOfBirth", in="formData", required=true, type="integer"),
     *      @SWG\Response(response=200, description="Success"),
     *      @SWG\Response(response=204, description="Created"),
     * )
     */


    public function store(Request $request) {
        $client = new Client();
        $client->fill($request->all());
        $client->save();
        return response()->json($client, 201);
    }
}
