<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use OpenApi\Annotations\Server;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/services",
     *      operationId="getAllServices",
     *      tags={"Les Services offerts"},

     *      summary="Retourne  la liste des service",
     *      description="Retourne tout les services",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function index()
    {
        $service = Service::paginate(10);

        return ServiceResource::collection($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\POST(
     *      path="/service",
     *      operationId="createService",
     *      tags={"Les Services offerts"},

     *      summary="crée un nouveau service",
     *      description="Crée un service",
     *      @OA\Parameter(
     *      name="serviceName",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="tarification",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="price",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_app",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = FacadesValidator::make($input, [
            'serviceName' => 'required|string',
            'facturation' => 'required|string',
            'price' => 'required|integer',
            'id_app' => 'required|integer',
        ]);
        if($validator){
            $service = new Service();

            $service->seviceName = $request->serviceName;
            $service->facturation = $request->facturation;
            $service->price = $request->price;
            $service->id_app = $request->id_app;

            $service->save();

            return new ServiceResource($service);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\GET(
     *      path="/service/{id}",
     *      operationId="showService",
     *      tags={"Les Services offerts"},

     *      summary="Visualiser un service",
     *      description="Permet de visualiser un service",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return new ServiceResource($service);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\PUT(
     *      path="/service/{id}",
     *      operationId="updateService",
     *      tags={"Les Services offerts"},

     *      summary="Mettre à jour un service",
     *      description="Mettre à jour un service",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="serviceName",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="facturation",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="price",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="id"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_app",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * 
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = FacadesValidator::make($input, [
            'serviceName' => 'required|string',
            'facturation' => 'required|string',
            'price' => 'required|integer',
            'id_app' => 'required|integer',
        ]);
        if($validator){
            $service =  Service::find();

            $service->seviceName = $request->serviceName;
            $service->facturation = $request->facturation;
            $service->price = $request->price;
            $service->id_app = $request->id_app;

            $service->save();

            return new ServiceResource($service);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\DELETE(
     *      path="/service/{id}",
     *      operationId="deleteService",
     *      tags={"Les Services offerts"},

     *      summary="Supression de services",
     *      description="Supression d'un service",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        return new ServiceResource($service);

    }
}
