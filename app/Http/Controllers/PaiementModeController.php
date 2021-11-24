<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaiementmodeResource;
use App\Models\PaiementMode;
use Illuminate\Http\Request;

class PaiementModeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/mode-paiements",
     *      operationId="getAllPaiementMode",
     *      tags={"Mode de Paiement"},

     *      summary="Retourne  la liste des modes de paiements",
     *      description="Retourne toutes les modes de paiements",
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
       $paiementM = PaiementMode::paginate(10);

       return PaiementmodeResource::collection($paiementM);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\POST(
     *      path="/mode-paiement",
     *      operationId="createPaiementMode",
     *      tags={"Mode de Paiement"},

     *      summary="crée un nouveau mode de paiement",
     *      description="Crée un mode de paiement",
     *    @OA\Parameter(
     *      name="singuelPaiement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="paiementGroup",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_parameter",
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
        $this->validate($request, [
            'singlePaiement' => 'request|string',
            'paiementGroup' => 'request|string',
            'id_parameter' => 'request|integer',
        ]);

        $paiementM = new PaiementMode();

        $paiementM->singlePaiement = $request->singlePaiement;
        $paiementM->paiementGroup = $request->paiementGroup;
        $paiementM->id_parametrer = $request->id_parameter;

        $paiementM->save();

        return new PaiementmodeResource($paiementM);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\GET(
     *      path="/mode-paiement/{id}",
     *      operationId="showPaiementMode",
     *      tags={"Mode de Paiement"},

     *      summary="Visualiser un mode de paiement",
     *      description="Permet de visualiser un mode de paiement",
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
        $paiementM = PaiementMode::findOrFail($id);

        return new PaiementmodeResource($paiementM);
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
     *      path="/mode-paiement/{id}",
     *      operationId="updatepaiementMode",
     *      tags={"Mode de Paiement"},

     *      summary="Mettre à jour un mode de paiement",
     *      description="Mettre à jour un mode de paiement",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="singuelPaiement",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="paiementGroup",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="id_parameter",
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
        $this->validate($request, [
            'singlePaiement' => 'request|string',
            'paiementGroup' => 'request|string',
            'id_parameter' => 'request|integer',
        ]);

        $paiementM =  PaiementMode::findOrFail($id);

        $paiementM->singlePaiement = $request->singlePaiement;
        $paiementM->paiementGroup = $request->paiementGroup;
        $paiementM->id_parametrer = $request->id_parameter;

        $paiementM->save();

        return new PaiementmodeResource($paiementM);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\DELETE(
     *      path="/mode-paiement/{id}",
     *      operationId="deletePaiementMode",
     *      tags={"Mode de Paiement"},

     *      summary="Supression d'un mode de paiement",
     *      description="Supression de l'application  donné",
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
       $paiementM = PaiementMode::findOrFail($id);

       return new PaiementmodeResource($paiementM);
    }
}
