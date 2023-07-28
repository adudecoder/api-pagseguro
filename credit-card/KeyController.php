<?php

class KeyController {
    public static function getPublicKey()
    {
        $data['type'] = 'card';

        $curl = curl_init('https://sandbox.api.pagseguro.com/public-keys/');
        curl_setopt($curl, CURLOPT_HTTPHEADER, Array(
            'content-type: application/json',
            'Authorization: 8C6097E7C5AE4A65B38567AFD37E0E62'
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        
        $retorno = curl_exec($curl);
        curl_close($curl);
        
        //Return
        return json_decode($retorno)->public_key;
    }
}

// curl --request POST \
//      --url https://sandbox.api.pagseguro.com/public-keys \
//      --header 'Authorization: Bearer <token>' \
//      --header 'accept: application/json' \
//      --header 'content-type: application/json' \
//      --data '{"type":"card"}'