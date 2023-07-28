<?php
class PayController{

    public function __construct()
    {
        $data['reference_id'] = "ex-00001";
        $data["customer"] = [
            "name"=> "Jose da Silva",
            "email"=> "email@test.com",
            "tax_id"=> "51520164785",
            "phones"=> [
                [
                    "country"=> "55",
                    "area"=> "11",
                    "number"=> "999999999",
                    "type"=> "MOBILE"
                ]
            ]
        ];
        $data["items"]=[
            [
                "reference_id"=> "referencia do item",
                "name"=> "nome do item",
                "quantity"=> 1,
                "unit_amount"=> 50099
            ]
        ];
        $data["shipping"]= [
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
        $data["notification_urls"]= [
            "https=>//meusite.com/notificacoes"
        ];
        $data["charges"] = [
            [
                "reference_id"=> "referencia da cobranca",
                "description"=> "descricao da cobranca",
                "amount"=> [
                    "value"=> 500,
                    "currency"=> "BRL"
                ],
                "payment_method"=> [
                    'soft_descriptor'=>'WEBDESIGN',
                    "type"=> "CREDIT_CARD",
                    "installments"=> 1,
                    "capture"=> true,
                    "card"=> [
                        "encrypted"=>$_POST['encriptedCard'],
                        "security_code"=> "123",
                        "holder"=> [
                            "name"=> "Jose da Silva"
                        ],
                        "store"=> true
                    ]
                ]
            ]
        ];
        $curl = curl_init('https://sandbox.api.pagseguro.com/orders');
        curl_setopt($curl,CURLOPT_HTTPHEADER,Array(
            'Content-Type: application/json',
            'Authorization: 8C6097E7C5AE4A65B38567AFD37E0E62'
        ));
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $retorno = curl_exec($curl);
        curl_close($curl);
        var_dump(json_decode($retorno));
    }
}
$obj = new PayController();