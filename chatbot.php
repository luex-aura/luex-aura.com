<?php
$apiKey = "sk-xxxxxxxxxxxxxxxxxxxx"; // your real API key
$input = json_decode(file_get_contents("php://input"), true);

$data = [
  "model" => "gpt-3.5-turbo",
  "messages" => [
    ["role" => "user", "content" => $input["message"]]
  ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Content-Type: application/json",
  "Authorization: Bearer $apiKey"
]);

$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>
