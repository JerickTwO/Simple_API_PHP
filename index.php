<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva version de cURL; ch = cURL   handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* 
Ejecutar la petición
y guardar el resultado
*/
$result = curl_exec($ch);
//otra alternativa sería utilizar file_get_contents
//$result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API
$data = json_decode($result, true);

curl_close($ch);

?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA PRÓXIMA PELÍCULA DE MARVEL</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<main>
    <!-- <pre style="font-size: 8px; overflow: scroll; height:300px;">
        DUMP     
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"];?>" alt="Poster de <?= $data["title"]?>">
        <h2>La próxima película de Marvel</h2>
    </section>
    <section>
        <h3><?=$data["title"];?> se estrena en <?= $data["days_until"];?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"];?></p>
    </section>
</main>
<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    section{
        text-align: center;
    }
    img{
        width:300px ;
        border-radius: 10px;
        margin: 20px 0 30px 0;
    }
</style>