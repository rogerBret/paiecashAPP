<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/products",
     *      operationId="getAllProducts",
     *      tags={"Marketplace"},

     *      summary="Retourne  la liste de produit",
     *      description="Retourne toutes les produits disponible dans la bd",
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
        $user =  auth()->user()->id;
        $product = Product::paginate(10)->where($user);

        return ProductResource::collection($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
      /**
     * @OA\POST(
     *      path="/product",
     *      operationId="createProduct",
     *      tags={"Marketplace"},

     *      summary="crée Produit",
     *      description="Crée un nouveau produit par le partenaire",
    *      @OA\Parameter(
     *      name="name",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="ammount",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="description",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="discounte",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="quantity",
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
     *      name="color",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="warranties",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="manuel",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="brand_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="category_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="image",
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
        $input = $request->all();

        $validator = FacadesValidator::make($input, [
         
            "name"=>"required|string",
            "amount"=>"required|numerique",
            'description'=>"required|string",
            'discounte' =>"required|string",
            'quantity'=>"required|numerique",
            'price'=>"required|numerique",
            'color'=>"required|string",
            'warranties' =>"required|sting",
            'manuel'=>"required|sting",
            'brand_id' =>"required|integer",
            'category_id'=>"required|integer",
            'image'=>"string",
        ]);
        if($validator){
        $product = new Product();
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->amount = $request->description;
        $product->amount = $request->discounte;
        $product->amount = $request->quantity;
        $product->amount = $request->price;
        $product->amount = $request->color;
        $product->amount = $request->warraties;
        $product->amount = $request->manuel;
        $product->amount = $request->brand_id;
        $product->amount = $request->category_id;
        $product->image = $request->image;
        $product->code = mt_rand(1000,9999);
        $product->qrcode = mt_rand(1000,9999);

        $product->user_id = auth()->user()->id;

        $product->save();

        // return response()->json(["message"=>"product created successfully !"], 409);
        return new ProductResource($product);
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
     *      path="/product/{id}",
     *      operationId="showProduct",
     *      tags={"Marketplace"},

     *      summary="Visualiser Produit",
     *      description="Permet de visualiser un produit",
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
        $product= Product::find($id);

        return new ProductResource($product);
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
     *      path="/product/{id}",
     *      operationId="updateProduct",
     *      tags={"Marketplace"},

     *      summary="Mise à jour de produit ",
     *      description="Mettre à jour un produit",
    *      @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     *   ),
    *      @OA\Parameter(
     *      name="name",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="ammount",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="description",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="discounte",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="quantity",
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
     *      name="color",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="warranties",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="manuel",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="brand_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="category_id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="int"
     *      )
     * ),
     * @OA\Parameter(
     *      name="image",
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
        $input = $request->all();

        $validator = FacadesValidator::make($input, [
         
            "name"=>"required|string",
            "amount"=>"required|numerique",
            'description'=>"required|string",
            'discounte' =>"required|string",
            'quantity'=>"required|numerique",
            'price'=>"required|numerique",
            'color'=>"required|string",
            'warranties' =>"required|sting",
            'manuel'=>"required|sting",
            'brand_id' =>"required|integer",
            'category_id'=>"required|integer",
            'image'=>"string",
        ]);
        if($validator){
        $product =  Product::find($id);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->amount = $request->description;
        $product->amount = $request->discounte;
        $product->amount = $request->quantity;
        $product->amount = $request->price;
        $product->amount = $request->color;
        $product->amount = $request->warraties;
        $product->amount = $request->manuel;
        $product->amount = $request->brand_id;
        $product->amount = $request->category_id;
        $product->image = $request->image;
        $product->code = mt_rand(1000,9999);
        $product->qrcode = mt_rand(1000,9999);

        $product->user_id = auth()->user()->id;

        $product->save();

        // return response()->json(["message"=>"product created successfully !"], 409);
        return new ProductResource($product);
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
     *      path="/product/{id}",
     *      operationId="deleteProduct",
     *      tags={"Marketplace"},

     *      summary="Supression d'un produit",
     *      description="Supression d'un produit par l'utilisateur",
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
        $product = Product::find($id);

        $product->delete();

        return new ProductResource($product);
    }

 /**
     * @OA\GET(
     *      path="/product/{name}",
     *      operationId="findProduct",
     *      tags={"Marketplace"},

     *      summary="Effectuer une recherche de produit",
     *      description="Permet de retourner tous les produits qui ont un nom similaire au nom passé en paramètre",
     *   @OA\Parameter(
     *      name="name",
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

    public function search($name)
    {
        $product= Product::where('name', 'like', '%'.$name.'%')->get();

        return new ProductResource($product);
    }
}
