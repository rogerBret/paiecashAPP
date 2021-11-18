<?php

namespace App\Http\Controllers;

use App\APIs\UsersAPI;
use App\Models\Pin;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SmsAPI;

class UserController extends Controller
{

    public function index()
    {
        $userAPI = UsersAPI::getAll();
        // return User::all();
        return $userAPI;
    }
    public function register(Request $request){

        $fields = $request->validate([
            'first_name' => 'required|string|unique:users,first_name',
            'last_name' => 'required|string',
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'town_id'=>'required|numeric'
        ]);
        // $header = $request->header('Content-Type');

        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'town_id' => $fields[ 'town_id'],
            'password' => bcrypt($fields['password']),
        ]);
        $userAPI = UsersAPI::saveUser($fields['first_name'], $fields['last_name'], $fields['phone'], $fields['email']);
        $token = $user->createToken('myapptoken')->plainTextToken;

        $qrcode = $user->qrcodes()->create([
            "qrcode"=> mt_rand(10000000,99999999)."UserQrcode".$user->id
        ]);

        $role = new Role();
        $role->name = "user";
        $role->user_id = $user->id;
        $role->save();


        $response = [
            'user' => $user,
            'userAPI' => $userAPI,
            'token' => $token,
            'role' => $role,
            'qrcode' => $qrcode
        ];

        return response($response, 201);
    }
    public function login(Request $request){

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){

            return response([
                'message'=>'User not exist !'
            ], 401);
        }
        else
        {
            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response, 201);
        }

    }
    public function logout(User $user){

        $user->tokens()->delete();

        return [
            "message" => "logged out"
        ];
    }
    public function show($userId){
        // return User::find($id);
        return response()->json([
            "userAPI" => UsersAPI::get($userId)
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        $fields = $request->validate([
            'id'=>'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|string',
        ]);

        $userAPI = UsersAPI::update($fields['id'], $fields['first_name'], $fields['last_name'], $fields['phone'], $fields['email']);

        return response()->json([
            "message"=>"user updated successfully !",
            "UserAPI"=>$userAPI], 409);
    }
    public function destroy($userId)
    {
        $userAPI = UsersAPI::get($userId);
        User::where("email", $userAPI['email'])->delete();
        UsersAPI::delete($userId);

        // return User::destroy($id);

        return response()->json([
            "message" => "User deleted successfully"
        ]);
    }
    public function sendPinToUser(){
        $request = Request::instance();
        $data = json_decode($request->getContent());

        $prefix = $data->prefix;
        $telephone = $data->telephone;

        if($prefix == NULL || $prefix == '' || $telephone == NULL || $telephone == ''){
            return response()->json(['message' => 'error','remplir_tous_les_champs' => true], 400);
        }

        //I check if phone have already pin
        $check = Pin::where('phone',$telephone)->first();

        if(empty($check)){
            $pin = SmsAPI::generateNumber(4);

            //save pin telephone
            $newInsert = new Pin();
            $newInsert->phone = $telephone;
            $newInsert->pin = $pin;
            $newInsert->confirmed = 0;
            $newInsert->save();
        }
        else{
            $date_courante = strtotime(Carbon::now());
            $date = strtotime($check->created_at);
            $difference = $date_courante - $date;
            //on teste si le code pin a été généré il y a 2 heures de temps
            /*
            if($difference < 7200){
                $pin = $check->pin;
            }
            else{
                */
                $pin = SmsAPI::generateNumber(4);
                $newUpdate = Pin::find($check->id);
                $newUpdate->pin = $pin;
                $newUpdate->updated_at = Carbon::now();
                $newUpdate->save();
            //}

        }

        $message = "PaieCash. Cher Utilisateur, votre code pin est : ".$pin.". Veuillez l'utiliser pour confirmer votre numéro de téléphone.";

        //send SMS
        SmsAPI::sendSMS($telephone,$message);

        return response()->json(['message' =>'success']);
    }

}
