<?php

namespace App\Http\Controllers;

use App\APIs\UsersAPI;
use App\Models\Role;
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
        //
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



        $roleUsers = Role::get();

        foreach($roleUsers as $roleUser)
        {
            if($roleUser->user_id == $user)
            {
                $name = $roleUser->name;
            }
        }
        if($name == "admin")
        {
            $user = User::create([
                'first_name' => $fields['first_name'],
                'last_name' => $fields['last_name'],
                'phone' => $fields['phone'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
                'town_id' => $fields['town_id'],
                'user_id'=> $fields['user_id']
            ]);

            $token = $user->createToken('myapptoken')->plainTextToken;
            $userAPI = UsersAPI::saveUser($fields['first_name'], $fields['last_name'], $fields['phone'], $fields['email']);

            // $qrcode = $user->qrcodes()->create([
            //     "qrcode"=> mt_rand(10000000,99999999)."UserQrcode".$user->id
            // ]);


            $role = new Role();
            $role->name = "admin";
            $role->user_id = $user->id;
            $role->save();

            $response = [
                'user' => $user,
                'token' => $token,
                'userAPI' => $userAPI,
                'role' => $role
            ];

            return response($response, 201);
        }else{
            return response()->json([
                "message"=>"sorry you don't have the permission to create a new user, contact the administration."
            ]);
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
