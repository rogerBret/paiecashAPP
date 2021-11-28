<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandeResource;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/commandes",
     *      operationId="getAllCommandes",
     *      tags={"Marketplace"},

     *      summary="Retourne  la liste des commande",
     *      description="Retourne toutes les commande",
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
        $commande = Commande::paginate(10);

        return CommandeResource::collection($commande);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
      /**
     * @OA\POST(
     *      path="/commande",
     *      operationId="createCaommande",
     *      tags={"Marketplace"},

     *      summary="crée une nouvelle commande",
     *      description="Crée une commande",
     *        *      @OA\Parameter(
     *      name="isDelived",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="quantities",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="taxe",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="dateCommande",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="numeroCommande",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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

            
            'isDelived' => "required",
            'quantities'=>"required|integer",
            'taxe'=>"required|integer",
            'dateCommande' =>"required|string",
            'numeroCommande' => "'required|string",
        ]);

        $commande = new Commande();

        $commande->isDelived = $request->isDelived;
        $commande->quantities = $request->quantities;
        $commande->taxe = $request->taxe;
        $commande->dateCommande = $request->dateCommande;
        $commande->numeroCommande = $request->numeroCommande;

        $commande->save();
         
        return new CommandeResource($commande);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\GET(
     *      path="/commande/{id}",
     *      operationId="showCommande",
     *      tags={"Marketplace"},

     *      summary="Visualiser Commande",
     *      description="Permet de visualiser une commande  donné",
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
        $commande = Commande::findOrFail($id);

        return new CommandeResource($commande);
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
     *      path="/commande/{id}",
     *      operationId="updateCommande",
     *      tags={"Marketplace"},

     *      summary="Mettre à jour une commande",
     *      description="Mettre à jour une commande",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="isDelived",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="quantities",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="taxe",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="dateCommande",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="numeroCommande",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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

            
            'isDelived' => "required",
            'quantities'=>"required|integer",
            'taxe'=>"required|integer",
            'dateCommande' =>"required|string",
            'numeroCommande' => "'required|string",
        ]);

        $commande = Commande::findOrFail($id);

        $commande->isDelived = $request->isDelived;
        $commande->quantities = $request->quantities;
        $commande->taxe = $request->taxe;
        $commande->dateCommande = $request->dateCommande;
        $commande->numeroCommande = $request->numeroCommande;

        $commande->save();
         
        return new CommandeResource($commande);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\DELETE(
     *      path="/commande/{id}",
     *      operationId="deleteCommande",
     *      tags={"Marketplace"},

     *      summary="Supression de la commande",
     *      description="Supression de commande",
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
        $commande= Commande::findOrFail($id);

        $commande->delete();

        return new CommandeResource($commande);
    }
}
