<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesPlaceResource;
use App\Models\CategoriPlace;
use Illuminate\Http\Request;

class CategoriesPlaceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/categories-places",
     *      operationId="getAllCategoriesSeat",
     *      tags={"Catégoried de places dans un stade"},

     *      summary="Retourne  la liste des catégories des places",
     *      description="Retourne toutes les catégories de places dans un stade. Lors de l'utilisation une variable $category est retourné contenant les données",
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
        $category = CategoriPlace::paginate();

        return CategoriesPlaceResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\POST(
     *      path="/categories-place",
     *      operationId="createCategoriesSeat",
     *      tags={"Catégoried de places dans un stade"},

     *      summary="crée une nouvelle catégorie de place",
     *      description="Crée une catégorie de place dans in stade donné",
     *      @OA\Parameter(
     *      name="name",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="stade_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="place_id",
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
            'name' => 'request|string',
            'stade_id' => 'request|integer',
            'place_id' => 'request|integer'
        ]);

        $category = new CategoriPlace();

        $category->name = $request->name;
        $category->stade_id = $request->stade_id;
        $category->place_id = $request->place_id;

        $category->save();

        return new  CategoriesPlaceResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\GET(
     *      path="/categories-place/{id}",
     *      operationId="showCategoriesSeat",
     *      tags={"Catégoried de places dans un stade"},

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
        $category = CategoriPlace::findOrFail($id);

        return  CategoriesPlaceResource::collection($category);
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
     *      path="/categories-place/{id}",
     *      operationId="createCategoriesSeat",
     *      tags={"Catégoried de places dans un stade"},

     *      summary="Mettre à jour une catégorie de place",
     *      description="Mettre à jour une catégorie de place dans in stade donné",
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
     *      name="stade_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="place_id",
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
            'name' => 'request|string',
            'stade_id' => 'request|integer',
            'place_id' => 'request|integer'
        ]);

        $category = CategoriPlace::findOrFail($id);

        $category->name = $request->name;
        $category->stade_id = $request->stade_id;
        $category->place_id = $request->place_id;

        $category->save();

        return new  CategoriesPlaceResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\DELETE(
     *      path="/categories-place/{id}",
     *      operationId="showCategoriesSeat",
     *      tags={"Catégoried de places dans un stade"},

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
       $category = CategoriPlace::findOrFail($id);

       $category->delete();

       return new CategoriesPlaceResource($category);
    }
}
