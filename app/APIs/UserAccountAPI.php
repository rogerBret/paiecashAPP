<?php

class UserAccountAPI
{
    public static function CreateUserAccount(string $first_name, string $last_name, string $phone, string $email){
        // $username = "B2BUser_45188";
        // $password = "HM7XVC54ANW7IJUMY3G3L84CKGPGSNSIXYCKBR4V0E07HQN2EE";
        // $encode = $username.":".$password;
        // $authorization = base64_encode($encode);
        // $url = "https://sandbox.lerextech.com/api/rest/users";

        // $data = array(
        //     {
        //         "id": "00000000-0000-0000-0000-000000000000",
        //         "userId": "00000000-0000-0000-0000-000000000000",
        //         "currencyId": 0,
        //         "status": 0,
        //         "beneficiaryName": "string",
        //         "sortCode": "string",
        //         "accountNumber": "string",
        //         "iban": "string",
        //         "bicCode": "string",
        //         "bankName": "string",
        //         "bankCode": "string",
        //         "bankBranchName": "string",
        //         "bankBranchCode": "string",
        //         "bankAddress": "string",
        //         "bankCity": "string",
        //         "createdAt": "2019-08-24T14:15:22Z",
        //         "updatedAt": "2019-08-24T14:15:22Z",
        //         "deletedAt": "2019-08-24T14:15:22Z",
        //         "isDeleted": true
        //         }
        // );

        // $body = json_encode($data);

        // $headers = array(
        //     'Authorization: Basic '.$authorization,
        //     'Content-Type: application/json'
        // );

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




        // $resultat1 = curl_exec($ch);

        // // $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // $info = curl_getinfo($ch);
        // curl_close($ch);


        // return json_decode($resultat1,TRUE);

    }
}
