<?php

namespace App\Http\Controllers;

use App\APIs\UsersAPI;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where("role", "admin")->get();
        return response()->json([
            "admins" => $users
        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {

        $fields = $request->validate([
            'first_name' => 'required|string|unique:users,first_name',
            'last_name' => 'required|string',
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'town_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);

        $userAPI = UsersAPI::saveUser($fields['first_name'], $fields['last_name'], $fields['phone'], $fields['email']);

        $userRole = User::where("id", $user);

        if($userRole){
            if($userRole->role == "admin"){
                $user = new User();
                $user->IdLerex = $userAPI['id'];
                $user->role = "admin";
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->town_id = $request->town_id;
                $user->user_id = $request->user_id;
                $user->save();

                $token = $user->createToken('myapptoken')->plainTextToken;

                // $role = new Role();
                // $role->name = "admin";
                // $role->user_id = $user->id;
                // $role->save();

                $response = [
                    'user' => $user,
                    'token' => $token,
                    'role' => "admin"
                ];

                return response($response, 201);
            }else{
                return response()->json([
                    "error"=>"sorry you don't have the permission to create a new user, contact the administration."
                ], 409);
            }
        }else{
            return response()->json([
                "error"=>"plsease you must authentifier first"
            ], 409);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
