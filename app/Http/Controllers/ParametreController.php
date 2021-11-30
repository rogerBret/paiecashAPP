<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParametreResource;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/parametre-apps",
     *      operationId="getAllParameterApps",
     *      tags={"parametre App"},

     *      summary="Retourne  la liste des parametres des application",
     *      description="Retourne toutes les parametres d'application api ",
     *    
     *       @OA\Response(
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
        $parametre = Parametre::paginate(10);

        return ParametreResource::collection($parametre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\POST(
     *      path="/parametre-app",
     *      operationId="createParameter",
     *      tags={"parametre App"},

     *      summary="crée un nouveau parametre",
     *      description="Crée des parametre pour les applications qui vellent souscrire à l'api paiecash",
     *      @OA\Parameter(
     *      name="urlReturn",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="acceptePaiement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="billing",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="litigeManagement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="paiementCard",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="paiementHistry",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_paiement_mode",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_service",
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
            'urlReturn' => 'required',
            'acceptePaiement' => 'required',
            'billing' => 'required',
            'litigeManagement' => 'required',
            'paiementCard' => 'required',
            'paiementHistry' => 'required',
            'id_paiement_mode' => 'required',
            'id_app' => 'required',
            'id_service' => 'required',
        ]);
        if($validator){
        $parametre = new Parametre();
        $parametre->urlReturn = $request->urlReturn;
        $parametre->acceptePaiement = $request->acceptePaiement;
        $parametre->billing = $request->billing;
        $parametre->litigeManagement = $request->litigeManagement;
        $parametre->paiementCard = $request->paiementCard;
        $parametre->paiementHistry = $request->paiementHistry;
        $parametre->id_paiement_mode = $request->id_paiement_mode;
        $parametre->id_app = $request->id_app;
        $parametre->id_service = $request->id_service;

        $parametre->save();

        return new ParametreResource($parametre);
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
     *      path="/parametre-app/{id}",
     *      operationId="showParameters",
     *      tags={"parametre App"},

     *      summary="Visualiser parameter",
     *      description="Permet de visualiser des parametres donnés",
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
        $parametre= Parametre::find($id);

        return new ParametreResource($parametre);
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
     *      path="/parametre-app/{id}",
     *      operationId="updateParameter",
     *      tags={"parametre App"},

     *      summary="Mettre à jour les paramertres",
     *      description="Mettre à jour les parametres",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="urlReturn",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="acceptePaiement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="billing",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="litigeManagement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="paiementCard",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="paiementHistry",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_paiement_mode",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_service",
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
            'urlReturn' => 'required',
            'acceptePaiement' => 'required',
            'billing' => 'required',
            'litigeManagement' => 'required',
            'paiementCard' => 'required',
            'paiementHistry' => 'required',
            'id_paiement_mode' => 'required',
            'id_app' => 'required',
            'id_service' => 'required',
        ]);
        if($validator)
        {
            $parametre =  Parametre::find($id);
            $parametre->urlReturn = $request->urlReturn;
            $parametre->acceptePaiement = $request->acceptePaiement;
            $parametre->billing = $request->billing;
            $parametre->litigeManagement = $request->litigeManagement;
            $parametre->paiementCard = $request->paiementCard;
            $parametre->paiementHistry = $request->paiementHistry;
            $parametre->id_paiement_mode = $request->id_paiement_mode;
            $parametre->id_app = $request->id_app;
            $parametre->id_service = $request->id_service;

            $parametre->save();

            return new ParametreResource($parametre);
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
     *      path="/parametre-app/{id}",
     *      operationId="deleteParametre",
     *      tags={"parametre App"},

     *      summary="Supression du parametre",
     *      description="Supression d'un parametre'  donné",
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
        $parametre = Parametre::find($id);

        $parametre->delete();

        return new ParametreResource($parametre);
    }
}
