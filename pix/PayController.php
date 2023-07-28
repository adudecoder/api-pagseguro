
#Define o token e url (produção ou testes)
define('TOKEN', '8C6097E7C5AE4A65B38567AFD37E0E62');
define('URL', 'https://sandbox.api.pagseguro.com/charges');

#Recebimento das variáveis
$cardNumber = filter_input(INPUT_POST, 'cardNumber', FILTER_DEFAULT);

#Define os campos a serem enviados ao Pagseguro
$data['reference_id'] = "ex-00001";
$data['description'] = "Motivo do pagamento";
$data['amount'] = [
    "value" => 100099,
    "currency" => "BRL"
];
$data['payment_method'] = [
    "type" => "BOLETO",
    "boleto" => [
        "due_date" => "2024-12-31",
        "instruction_lines" => [
            "line_1" => "Pagamento processado para DESC Fatura",
            "line_2" => "Via PagSeguro"
        ],
        "holder" => [
            "name" => "Jose da Silva",
            "tax_id" => "22222222222",
            "email" => "jose@email.com",
            "address" => [
                "street" => "Avenida Brigadeiro Faria Lima",
                "number" => "1384",
                "locality" => "Pinheiros",
                "city" => "Sao Paulo",
                "region" => "Sao Paulo",
                "region_code" => "SP",
                "country" => "Brasil",
                "postal_code" => "01452002"
            ]
        ]
    ]
];
$data["notification_urls"] = [
    "https://yourserver.com/nas_ecommerce/277be731-3b7c-4dac-8c4e-4c3f4a1fdc46/"
];
$data = json_encode($data);

#Requisição ao Pagseguro
$curl = curl_init(URL);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization:' . TOKEN,
    'Content-Type: application/json'
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$ress = curl_exec($curl);
$ress = json_decode($ress);
header("location: " . $ress->links[0]->href);
