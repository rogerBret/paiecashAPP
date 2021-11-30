<?php

namespace App\Http\Controllers;

use App\Http\Resources\StadeResource;
use App\Models\Stade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class StadeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/stades",
     *      operationId="getAllStade",
     *      tags={"Stades"},

     *      summary="Liste tous les stades",
     *      description="Retourne tous les stades",
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
        $stade = Stade::paginate(10);

        return StadeResource::collection($stade);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\POST(
     *      path="/stade",
     *      operationId="createStade",
     *      tags={"Stades"},

     *      summary="créer un stade",
     *      description="Création d'un nouveau stade",
     *      
     *        @OA\Parameter(
        *      name="name",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     * @OA\Parameter(
     *      name="address",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="longitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="latitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="capacity",
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
            'name' => ['required','string'],
            'address' => ['required','string'],
            'longitude' => ['required','string'],
            'latitude' => ['required','string'],
            'capacity' => ['required']
        ]);
        
        if($validator){
            $stade = new Stade();

        $stade->name = $request->name;
        $stade->address = $request->address;
        $stade->longitude = $request->longitude;
        $stade->latitude = $request->latitude;
        $stade->capacity = $request->capacity;

        $stade->save();

        return new StadeResource($stade);
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
     *      path="/stade/{id}",
     *      operationId="showStade",
     *      tags={"Stades"},

     *      summary="Visualiser un stade",
     *      description="Permet de visualiser un stade donné",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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
        $stade = Stade::find($id);

        return new StadeResource($stade);
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
     *      path="/stade/{id}",
     *      operationId="createStade",
     *      tags={"Stades"},

     *      summary="Mise du stade",
     *      description="Mettre à jour stade",
     *      
     *        @OA\Parameter(
        *      name="id",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="int"
        *      )
        *   ),
     *        @OA\Parameter(
        *      name="name",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     * @OA\Parameter(
     *      name="address",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="longitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="latitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="capacity",
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
            'name' => ['required','string'],
            'address' => ['required','string'],
            'longitude' => ['required','string'],
            'latitude' => ['required','string'],
            'capacity' => ['required']
        ]);
        
        if($validator){
            $stade = Stade::find($id);

        $stade->name = $request->name;
        $stade->address = $request->address;
        $stade->longitude = $request->longitude;
        $stade->latitude = $request->latitude;
        $stade->capacity = $request->capacity;

        $stade->save();

        return new StadeResource($stade);
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
     *      path="/stade/{id}",
     *      operationId="deleteStade",
     *      tags={"Stades"},

     *      summary="Supprimer un stade",
     *      description="Permet de supprimer un stade donné",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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
        $stade =Stade::find($id);
        $stade->delete();

        return new StadeResource($stade);
    }
}
