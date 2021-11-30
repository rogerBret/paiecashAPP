<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Http\Resources\MatchResource;
use PhpParser\Node\Expr\Match_;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class MatchController extends Controller
{
    /**
     * @OA\Get(
     *      path="/matchs",
     *      operationId="getAllMatch",
     *      tags={"Matchs"},

     *      summary="Fournir la liste des Matchs",
     *      description="Retourne tous les match enregistrer",
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
        $allmatch = Matches::paginate(10);
        return MatchResource::collection($allmatch);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\POST(
     *      path="/match",
     *      operationId="createMatch",
     *      tags={"Matchs"},

     *      summary="créer un match",
     *      description="Création d'un nouveau match",
     *      
     *        @OA\Parameter(
        *      name="type_match",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     * @OA\Parameter(
     *      name="equipe",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="date_match",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="heure_match",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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
       

            'type_match' =>'required|string',
            'equipe' =>'required|string',
            'date_match' =>'required|string',
            'heure_match' =>'required|string'
        ]);
        if($validator){
        $match = new Matches();
        $match->type_match = $request->type_match;
        $match->equipe = $request->equipe;
        $match->date_match = $request->date_match;
        $match->heure_match = $request->heure_match;

        $match->save();
        
        return new MatchResource($match);
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
     *      path="/match/{id}",
     *      operationId="showMatcht",
     *      tags={"Matchs"},

     *      summary="Visualiser un match",
     *      description="Permet de visualiser un match donné",
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
        $match = Matches::find($id);

        return new MatchResource($match);
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
     *      path="/match/{id}",
     *      operationId="createMatch",
     *      tags={"Matchs"},

     *      summary="Mise à jour de match",
     *      description="Mettre à jour un match",
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
        *      name="type_match",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     * @OA\Parameter(
     *      name="equipe",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="date_match",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     *
     * @OA\Parameter(
     *      name="heure_match",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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
       

            'type_match' =>'required|string',
            'equipe' =>'required|string',
            'date_match' =>'required|string',
            'heure_match' =>'required|string'
        ]);
        if($validator){
             $match =  Matches::findOrFail($id);
            $match->type_match = $request->type_match;
            $match->equipe = $request->equipe;
            $match->date_match = $request->date_match;
            $match->heure_match = $request->heure_match;

            $match->save();
            
            return new MatchResource($match);
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
     *      path="/match/{id}",
     *      operationId="deleteMatcht",
     *      tags={"Matchs"},

     *      summary="Supprimer un match",
     *      description="Permet de supprimer un match donné",
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
        $match = Matches::find($id);

        $match->delete();
        return redirect()->back();
    }
}
