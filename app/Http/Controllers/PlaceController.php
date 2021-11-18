<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceResource;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{   
   /**
     * @OA\Get(
     *      path="/places",
     *      operationId="getAllSeat",
     *      tags={"Places dans un stade"},

     *      summary="Retourne  la liste des  places",
     *      description="Retourne toutes les  places dans un stade. Lors de l'utilisation une variable $place est retourné contenant les données",
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
        $place = Place::paginate();

        return PlaceResource::collection($place);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
/**
     * @OA\POST(
     *      path="/place",
     *      operationId="createCategoriesSeat",
     *      tags={"Places dans un stade"},

     *      summary="Mettre à jour une  place",
     *      description="Mettre à jour une place dans in stade donné",
     *      
     *        @OA\Parameter(
     *      name="rowNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="seatNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="gateNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="section",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="stade_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
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
        $this->validate($request, [
            'rowNumber' => 'request|string',
            'seatNumber' => 'request|string',
            'gateNumber' => 'request|string',
            'section' => 'request|string',
            'stade_id' => 'request|string'
        ]);

        $place = new Place();

        $place->rowNumber = $request->rowNumber;
        $place->seatNumber = $request->seatNumber;
        $place->gateNumber = $request->gateNumber;
        $place->section = $request->section;
        $place->stade_id = $request->stade_id;

        $place->save();

        return new PlaceResource($place);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\GET(
     *      path="/place/{id}",
     *      operationId="showCategoriesSeat",
     *      tags={"Places dans un stade"},

     *      summary="Visualiser une catégorie",
     *      description="Permet de visualiser une catégorie donné",
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
        $place = Place::findOrFail($id);

        return PlaceResource::collection($place);
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
     *      path="/place/{id}",
     *      operationId="createCategoriesSeat",
     *      tags={"Places dans un stade"},

     *      summary="Mettre à jour une  place",
     *      description="Mettre à jour une place dans in stade donné",
     *        @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
     *        @OA\Parameter(
     *      name="rowNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="seatNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="gateNumber",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="section",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="stade_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
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
        $this->validate($request, [
            'rowNumber' => 'request|string',
            'seatNumber' => 'request|string',
            'gateNumber' => 'request|string',
            'section' => 'request|string',
            'stade_id' => 'request|string'
        ]);

        $place =  Place::findOrFail($id);

        $place->rowNumber = $request->rowNumber;
        $place->seatNumber = $request->seatNumber;
        $place->gateNumber = $request->gateNumber;
        $place->section = $request->section;
        $place->stade_id = $request->stade_id;

        $place->save();

        return new PlaceResource($place);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\DELETE(
     *      path="/place/{id}",
     *      operationId="showCategoriesSeat",
     *      tags={"Places dans un stade"},

     *      summary="Suprimer une catégory",
     *      description="Permet de supprimer une catégorie donné",
     *      @OA\Parameter(
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
        $place =Place::findOrFail($id);
        $place->delete();

        return new PlaceResource($place);
    }
}
