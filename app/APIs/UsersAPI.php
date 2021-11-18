<?php

namespace App\APIs;

use Ramsey\Uuid\Type\Integer;

class UsersAPI
{
     /**
     * @param $limit
     * @return string
     */

    public static function saveUser(string $first_name, string $last_name, string $phone, string $email){
        $username = "B2BUser_45188";
        $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        $encode = $username.":".$password;
        $authorization = base64_encode($encode);
        $url = "https://sandbox.lerextech.com/api/rest/users";

        $data = array(
                "firstName" => $first_name,
                "lastName" => $last_name,
                "email" => $email,
                "sourceOfFunds" => "7",
                "emailConfirmed"=> "false",
                "emailVerificationCode" => "XXVMYY1234BB",
                "mobileNumber" => $phone,
                "dateOfBirth"=> "1996-01-01T00:00:00+00:00",
                "countryId" => "2",
                "houseNameNumber" => "200",
                "street" => "Forster Road",
                "city" => "douala",
                "postCode" => "N17 6QD",
                "kycStatus" => "0",
                "accountBlocked" => "false",
                "isDeleted" => "false",
                "mobileConfirmed" => "false",
        );

        $body = json_encode($data);

        $headers = array(
            'Authorization: Basic '.$authorization,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




        $resultat1 = curl_exec($ch);

        // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);


        return json_decode($resultat1,TRUE);

    }

    public static function update(string $id, string $first_name, string $last_name, string $phone, string $email){
        $username = "B2BUser_45188";
        $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        $encode = $username.":".$password;
        $authorization = base64_encode($encode);
        $url = "https://sandbox.lerextech.com/api/rest/users";

        $data = array(
                "id" => $id,
                "firstName" => $first_name,
                "lastName" => $last_name,
                "email" => $email,
                "sourceOfFunds" => "7",
                "emailConfirmed"=> "false",
                "emailVerificationCode" => "XXVMYY1234BB",
                "mobileNumber" => $phone,
                "dateOfBirth"=> "1996-01-01T00:00:00+00:00",
                "countryId" => "2",
                "houseNameNumber" => "200",
                "street" => "Forster Road",
                "city" => "douala",
                "postCode" => "N17 6QD",
                "kycStatus" => "0",
                "accountBlocked" => "false",
                "isDeleted" => "false",
                "mobileConfirmed" => "false",
        );

        $body = json_encode($data);

        $headers = array(
            'Authorization: Basic '.$authorization,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resultat1 = curl_exec($ch);

        // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return json_decode($resultat1,TRUE);
    }

    public static function delete(string $userId){
        $username = "B2BUser_45188";
        $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        $encode = $username.":".$password;
        $authorization = base64_encode($encode);
        $url = "https://sandbox.lerextech.com/api/rest/users/".$userId;



        $headers = array(
            'Authorization: Basic '.$authorization,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resultat1 = curl_exec($ch);

        // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return json_decode($resultat1,TRUE);
    }

    public static function get(string $userId){
        $username = "B2BUser_45188";
        $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        $encode = $username.":".$password;
        $authorization = base64_encode($encode);
        $url = "https://sandbox.lerextech.com/api/rest/users/".$userId;



        $headers = array(
            'Authorization: Basic '.$authorization,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resultat1 = curl_exec($ch);

        // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return json_decode($resultat1,TRUE);
    }

    public static function getAll(){
        $username = "B2BUser_45188";
        $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        $encode = $username.":".$password;
        $authorization = base64_encode($encode);
        $url = "https://sandbox.lerextech.com/api/rest/users/";



        $headers = array(
            'Authorization: Basic '.$authorization,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resultat1 = curl_exec($ch);

        // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return json_decode($resultat1,TRUE);
    }

}
