<?php
#Define o token e url (produção ou testes)
define('TOKEN','8C6097E7C5AE4A65B38567AFD37E0E62');
define('URL','https://sandbox.api.pagseguro.com/orders');

#Define os campos a serem enviados ao Pagseguro
$data['reference_id'] = "ex-00001";
$data["customer"] = [
    "name"=> "Jose da Silva",
        "email"=> "email@test.com",
        "tax_id"=> "12345678909",
        "phones"=> [
        [
            "country"=> "55",
            "area"=> "11",
            "number"=> "999999999",
            "type"=> "MOBILE"
        ]
    ]
];
$data["items"] = [
    [
        "name"=> "nome do item",
        "quantity"=> 1,
        "unit_amount"=> 500
    ]
];

$data["qr_codes"] = [
    [
        "amount"=> [
            "value"=> 500
        ],
        "expiration_date"=> "2023-12-29T20:15:59-03:00",
    ]
];
$data["shipping"] = [
"address"=> [
    "street"=> "Avenida Brigadeiro Faria Lima",
        "number"=> "1384",
        "complement"=> "apto 12",
        "locality"=> "Pinheiros",
        "city"=> "São Paulo",
        "region_code"=> "SP",
        "country"=> "BRA",
        "postal_code"=> "01452002"
    ]
];
$data["notification_urls"] = [
    "https://yourserver.com/nas_ecommerce/277be731-3b7c-4dac-8c4e-4c3f4a1fdc46/"
];
$data = json_encode($data);


#Requisição ao Pagseguro
$curl = curl_init(URL);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_HTTPHEADER,array(
    'Authorization:'.TOKEN,
    'Content-Type: application/json'
));
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
$ress = curl_exec($curl);
$ress = json_decode($ress);
// echo "<pre>",print_r($ress),"</pre>";
echo "<img src='".$ress->qr_codes[0]->links[0]->href."' alt='Qrcode Pix'>";