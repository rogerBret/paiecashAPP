<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntrepriseResource;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/entreprises",
     *      operationId="getAllEntreprises",
     *      tags={"Marketplace"},

     *      summary="Retourne  la liste de entreprises ",
     *      description="Retourne toutes les entreprise qui effectuent les promotion sur paiecash",
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
        $entreprise = Entreprise::paginate(10);

        return EntrepriseResource::collection($entreprise);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
      /**
     * @OA\POST(
     *      path="/entreprise",
     *      operationId="createEntreprise",
     *      tags={"Marketplace"},

     *      summary="crée une nouvelle entreprise",
     *      description="Crée une entreprise ",
     *      @OA\Parameter(
     *      name="raisonSociale",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="longitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="latitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="city",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="address1",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="email",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="phone",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="user_id",
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
        $request->validate([

             'raisonSociale'=> "required|string", 
            'longitude'=> "required|string", 
            'latitude'=> "required|string", 
            'city'=> "required|string", 
            'address1'=> "required|string", 
            'address2'=> "string", 
            'email'=> "required|string", 
            'phone'=> "required|string", 
            'user_id'=> "required|integer"
        ]);

        $entreprise = new Entreprise();

        $entreprise->raisonSociale = $request->raisonSociale;
        $entreprise->longitude = $request->longitude;
        $entreprise->latitude = $request->latitude;
        $entreprise->city = $request->city;
        $entreprise->address1 = $request->address1;
        $entreprise->address2 = $request->address2;
        $entreprise->email = $request->email;
        $entreprise->phone = $request->phone;

        $entreprise->user_id = auth()->user()->id;

        $entreprise->save();

        return new EntrepriseResource($entreprise);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\GET(
     *      path="/entreprise/{id}",
     *      operationId="showEntreprise",
     *      tags={"Marketplace"},

     *      summary="Visualiser Entreprise",
     *      description="Permet de visualiser une entreprise  donné",
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
        $entreprise = Entreprise::findOrFail($id);

        return new EntrepriseResource($entreprise);
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
     *      path="/entreprise/{id}",
     *      operationId="updateEntreprise",
     *      tags={"Marketplace"},

     *      summary="Mettre à jour une entreprise",
     *      description="Mettre à jour une entreprise",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="raisonSociale",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="longitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="latitude",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="city",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="address1",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="email",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="phone",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="user_id",
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
        $request->validate([

            'raisonSociale'=> "required|string", 
           'longitude'=> "required|string", 
           'latitude'=> "required|string", 
           'city'=> "required|string", 
           'address1'=> "required|string", 
           'address2'=> "string", 
           'email'=> "required|string", 
           'phone'=> "required|string", 
           'user_id'=> "required|integer"
       ]);

       $entreprise =  Entreprise::findOrFail($id);

       $entreprise->raisonSociale = $request->raisonSociale;
       $entreprise->longitude = $request->longitude;
       $entreprise->latitude = $request->latitude;
       $entreprise->city = $request->city;
       $entreprise->address1 = $request->address1;
       $entreprise->address2 = $request->address2;
       $entreprise->email = $request->email;
       $entreprise->phone = $request->phone;

       $entreprise->user_id = auth()->user()->id;

       $entreprise->save();

       return new EntrepriseResource($entreprise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\DELETE(
     *      path="/entreprise/{id}",
     *      operationId="deleteEntreprise",
     *      tags={"Marketplace"},

     *      summary="Supression entreprise",
     *      description="Supression d'une entreprise",
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
        $user =  auth()->user()->rememberToken;
        $entreprise = Entreprise::findOrFail($id)->where($user)->get();

        
       $entreprise->delete();

        return new EntrepriseResource($entreprise);
    }
}
