<?php


namespace App\Http\Controllers\ApiControllers;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use CloudCreativity\LaravelJsonApi\Contracts\Store\StoreInterface;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchResources;
use CloudCreativity\LaravelJsonApi\Http\Requests\CreateResource;
use Swagger\Annotations as SWG;

class ClientController extends JsonApiController
{
    /**
     * @SWG\Get(
     *   path="/api/v1/clients",
     *   summary="Get Clients",
     *   operationId="Get clients",
     *   produces={"application/vnd.api+json"},
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=403, description="forbidden"),
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     */
    public function index(StoreInterface $store, FetchResources $request)
    {
        $result = $this->doSearch($store, $request);
        if ($this->isResponse($result)) {
            return $result;
        }

        return $this->reply()->content($result->sortBy('id'));
    }


    /**
     * @SWG\Post(
     *      path="/api/v1/clients",
     *      operationId="createClient",
     *      summary="Add Clients",
     *      produces={"application/vnd.api+json"},
     *      consumes={"application/vnd.api+json"},
     *      @SWG\Parameter(parameter="clients",name="clients",in="body",required=true,type="string",description="Single client fields",
     *          @SWG\Schema(type="object",
     *              @SWG\Property(type="object",property="data",
     *                  @SWG\Property(property="type",type="string",example="clients"),
     *                  @SWG\Property(property="attributes",type="object",
     *                      @SWG\Property(type="string",property="name",description="name",example="Vardas"),
     *                      @SWG\Property(type="string",property="surname",description="surname",example="Pavarde"),
     *                      @SWG\Property(type="string",property="yearofbirth",description="year of birth",example="2000-01-01")
     *                  ),
     *                  @SWG\Property(property="relationships",type="object"),
     *              ),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Created"),
     *      @SWG\Response(response=204, description="No Content"),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=403, description="Forbidden"),
     *      @SWG\Response(response=422, description="Unprocessable Entity"),
     *      @SWG\Response(response=500, description="internal server error"),
     * )
     */
    public function create(StoreInterface $store, CreateResource $request)
    {


        $record = $this->transaction(function () use ($store, $request) {
            return $this->doCreate($store, $request);
        });
        if ($this->isResponse($record)) {
            return $record;
        }
        return $this->reply()->created($record);
    }

}
