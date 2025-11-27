<?php
if (!isset($_GET['account_number']) || !isset($_GET['bank_code'])) {
    echo json_encode(["status" => false, "message" => "Missing parameters"]);
    exit;
}

$account = $_GET['account_number'];
$bank = $_GET['bank_code'];

$secret_key = "sk_test_8bfc47b28da6cd4fc25e7938589f274792fda4af"; // Put your Paystack SECRET KEY here

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account&bank_code=$bank",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $secret_key",
        "Cache-Control: no-cache"
    ],
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response;
?>
