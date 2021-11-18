<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @OA\Get(
     *      path="/tickets",
     *      operationId="getAllTicket",
     *      tags={"Tickets"},

     *      summary="Fournir la liste des ticket",
     *      description="Retourne tous les tickets créer",
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
        $ticket = Ticket::paginate();

        return TicketResource::collection($ticket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\POST(
     *      path="/ticket/{id}",
     *      operationId="createTicket",
     *      tags={"Tickets"},

     *      summary="Créer du ticket",
     *      description="Créer Ticket",
     *      
     *        @OA\Parameter(
        *      name="type",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     *        @OA\Parameter(
        *      name="price",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="int"
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
     *
     * @OA\Parameter(
     *      name="match_id",
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
            'type' => 'request|string',
            'price' => 'request|integer',
            'stade_id' => 'request|integer',
            'place_id' => 'request|integer',
            'match_id' => 'request|integer',
            'category_id' => 'request|integer'
        ]);

        $ticket =  new Ticket();

        $ticket->name = $request->name;
        $ticket->address = $request->address;
        $ticket->longitude = $request->longitude;
        $ticket->latitude = $request->latitude;
        $ticket->capacity = $request->capacity;

        $ticket->save();

        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\GET(
     *      path="/ticket/{id}",
     *      operationId="showTicket",
     *      tags={"Tickets"},

     *      summary="Visualiser un Ticket",
     *      description="Permet de visualiser un ticket donné",
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
        $ticket = Ticket::findOrFail($id);

        return TicketResource::collection($ticket);
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
     *      path="/ticket/{id}",
     *      operationId="createTicket",
     *      tags={"Tickets"},

     *      summary="Mise du ticket",
     *      description="Mettre à jour Ticket",
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
        *      name="type",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="string"
        *      )
        *   ),
     *        @OA\Parameter(
        *      name="price",
        *      in="path",
        *      required=true,
        *      @OA\Schema(
        *           type="int"
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
     *
     * @OA\Parameter(
     *      name="match_id",
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
            'type' => 'request|string',
            'price' => 'request|integer',
            'stade_id' => 'request|integer',
            'place_id' => 'request|integer',
            'match_id' => 'request|integer',
            'category_id' => 'request|integer'
        ]);

        $ticket =  Ticket::findOrFail($id);

        $ticket->name = $request->name;
        $ticket->address = $request->address;
        $ticket->longitude = $request->longitude;
        $ticket->latitude = $request->latitude;
        $ticket->capacity = $request->capacity;

        $ticket->save();

        return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\DELETE(
     *      path="/ticket/{id}",
     *      operationId="deleteTicket",
     *      tags={"Tickets"},

     *      summary="Supprimer un ticket",
     *      description="Permet de supprimer un ticket donné",
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
        $ticket =Ticket::findOrFail($id);
        $ticket->delete();

        return new TicketResource($ticket);
    }
}
