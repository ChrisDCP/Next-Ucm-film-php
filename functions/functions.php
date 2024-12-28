<?php

//contexto para ignorar certificado ssl usando y headers para get_file_contents
$context = stream_context_create([
    "ssl" => [
        "verify_peer" => false,       
        "verify_peer_name" => false, 
    ],
    "http" => [
        "method" => "GET",
        "header" => "Content-Type: application/json\r\n"
    ]
]);

function render_template(string $template, array $data = [])
{
    extract($data);
    require "templates/$template.php";
}


function get_data(string $url, $context): array
{
    $result = file_get_contents($url, false, $context);
    //obtener el json del resultado y guardarlo en un array asociativo
    $data = json_decode($result, true);
    
    return $data;
}