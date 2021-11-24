<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppResource;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/apps",
     *      operationId="getAllApps",
     *      tags={"Les applications partenaires"},

     *      summary="Retourne  la liste des application utilisant notre solution",
     *      description="Retourne toutes les application ayant souscrit à notre mode de paiement",
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
        $appli = App::paginate(10);

        return AppResource::collection($appli);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\POST(
     *      path="/app",
     *      operationId="createApp",
     *      tags={"Les applications partenaires"},

     *      summary="crée une nouvelle application",
     *      description="Crée une application qui veux souscrire à l'api paiecash",
     *      @OA\Parameter(
     *      name="appName",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="userAccount",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="customersId",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="appSecreteCode",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="user_accounte_id",
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
            'appName' => 'request|string',
            'userAccounte' => 'request|string',
            'costomersId' => 'request|string',
            'appSecreteCode' => 'request|string',
            'user_accounte_id' => 'request|string'
        ]);

        $appli = new App();

        $appli->appName = $request->appName;
        $appli->userAccounte = $request->userAccounte;
        $appli->costomersId = $request->costomersId;
        $appli->appSecreteCode = $request->appSecreteCode;
        $appli->user_accounte_id = $request->user_accounte_id;

        $appli->save();

        return new AppResource($appli);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\GET(
     *      path="/app/{id}",
     *      operationId="showApp",
     *      tags={"Les applications partenaires"},

     *      summary="Visualiser Application",
     *      description="Permet de visualiser une application  donné",
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
        $appli = App::findOrFail($id);

        return new AppResource($appli);
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
     *      path="/app/{id}",
     *      operationId="updateApp",
     *      tags={"Les applications partenaires"},

     *      summary="Mettre à jour une application",
     *      description="Mettre à jour une application",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="appName",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="userAccount",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="customersId",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="appSecreteCode",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="user_accounte_id",
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
            'appName' => 'request|string',
            'userAccounte' => 'request|string',
            'costomersId' => 'request|string',
            'appSecreteCode' => 'request|string',
            'user_accounte_id' => 'request|string'
        ]);

        $appli = App::findOrFail($id);

        $appli->appName = $request->appName;
        $appli->userAccounte = $request->userAccounte;
        $appli->costomersId = $request->costomersId;
        $appli->appSecreteCode = $request->appSecreteCode;
        $appli->user_accounte_id = $request->user_accounte_id;

        $appli->save();

        return new AppResource($appli);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\DELETE(
     *      path="/app/{id}",
     *      operationId="deleteApp",
     *      tags={"Les applications partenaires"},

     *      summary="Supression de l'Application",
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
        $appli = App::findOrFail($id);
        $appli->delete();
        return new AppResource($appli);
    }

    public function generLink(){

    }


    public function genereCostomersId($length=32){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $costomersId = '';
        for ($i = 0; $i < $length; $i++) {
            $costomersId .= $characters[rand(0, $charactersLength - 1)];
        }
        return $costomersId;
    }

    public function genereAppSecreteCode($length =64){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $appSecreteCode = '';
        for ($i = 0; $i < $length; $i++) {
            $appSecreteCode .= $characters[rand(0, $charactersLength - 1)];
        }
        return $appSecreteCode;
    }
}
