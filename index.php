<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
//inicializar una nueva sesion de cURL; ch = curl handler
$ch = curl_init(API_URL);
//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

/* ejecutar la peticion y guardar el reultado */
$result = curl_exec($ch);
//obtener el json del resultado y guardarlo en un array asociativo

$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <title>Proxima pelicula de UCM</title>
    <meta charset="UTF-8" />
    <meta name="Viewport" content="width=device-width, inital-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="250" alt="poster de <?= $data["title"]; ?> "
        style= "border-radius: 16px">
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?$data["days_until"];?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]?></p>
    </hgroup>

</main>

<style>
    :root{
        color-scheme: dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
</style>