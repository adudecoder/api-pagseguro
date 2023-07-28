

define('token', '8C6097E7C5AE4A65B38567AFD37E0E62');
define('url', 'https://sandbox.api.pagseguro.com/charges');

$data['reference_id'] = 'ex-00001';
$data['description'] = 'Motivo do Pagamento';
$data['amount'] = [
    'value' => 100099,
    'currency' => 'BRL'
];
$data['payment_method'] = [
    "type" => "CREDIT_CARD",
        "installments" => 1,
        "capture" => true,
        "soft_descriptor" => "Loja do meu teste",
        "card" => [
          "number" => "4111111111111111",
          "exp_month" => "03",
          "exp_year" => "2026",
          "security_code" => "123",
          "holder" => [
            "name" => "Jose da Silva"
          ]
        ]
];
$data["notification_urls"] = ["https://yourserver.com/nas_ecommerce/277be731-3b7c-4dac-8c4e-4c3f4a1fdc46/"];
$data = json_encode($data);
echo $data;
