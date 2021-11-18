<?php


use App\Models\UserAccount;

class SmsAPI
{

    public static function generateNumber($limit) {
        $code = '';
        for($i = 0; $i < $limit; $i++) {
            $code .= mt_rand(0, 9);
        }
        $count = UserAccount::where('number', $code)->count();
        if ($count > 0) {
            return self::generateNumber(11);
        }
        return $code;
    }
    /**
     * @param string $phoneNumber
     * @param string $message
     */
    public static function sendSMS(string $phoneNumber, string $message){
        $username = "etot@paiecash.com";
        $password = "Clicksend66?";
        $encode = $username.":".$password;
        $key = "529A3098-2007-EE3E-7FD9-5EDD53689A09";
        $to = trim($phoneNumber);
        $senderid = "PAIE CASH";

        $authorization = base64_encode($encode);

        $url = "https://api-mapper.clicksend.com/http/v2/send.php";

        $headers = array(
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic '.$authorization
        );

        $data = array(
            'username' => $username,
            'key' => $key,
            'to' => $to,
            'senderid' => $senderid,
            'message' => $message
        );

        $encoded = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
        curl_setopt ($ch, CURLPROTO_HTTPS, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultat = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $resultat = json_decode($resultat,TRUE);

    }



}
