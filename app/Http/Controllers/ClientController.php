<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
      private $cust_arr = [["Jonas", "Jonaitis"], ["Petras", "Petraitis"]];

      /**
     * @SWG\Get(
     *   path="/api/clients/{mytest}",
     *   summary="Get Users",
     *   operationId="testing",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Response(response=412, description="bbz"),
     *   @SWG\Parameter(name="mytest", in="path", required=true, type="string"),
     * )
     */
	public function index(Request $request){
		return response()->json($this->cust_arr);
      }

   /**
    * @SWG\Post(
     *      path="/api/clients",
     *      operationId="ApiV1saveUser",
     *      summary="Add User",
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="surname", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="yob", in="formData", required=true, type="integer"),
     *      @SWG\Response(response=200, description="Success"),
     *      @SWG\Response(response=204, description="Created"),
     * )
     */
      public function store(Request $request){
            $this->cust_arr[count($this->cust_arr)] = [$request["name"], $request["surname"], $request["yob"]];
            return response()->json($this->cust_arr, 201);
	}
}
