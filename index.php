<?php /*declare(strict_types=1);  */
//minuto 1:21                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
require_once './constants.php';
require_once './functions/functions.php';
require_once './functions/NextMovie.php';

//Consumir api con curl
/*
//inicializar una nueva sesion de cURL; ch = curl handler
$ch = curl_init(API_URL);
//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//evitar la validacion de certificados ssl para evitar errores de peticion https, no usar en prod
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
//ejecutar la peticion y guardar el reultado 
$result = curl_exec($ch);

curl_close($ch);
*/
$next_movie = NextMovie ::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie -> get_data();
?>

<?php render_template('header', ["title" => $next_movie_data["title"]])?>
<?php render_template('main', array_merge($next_movie_data,["until_message" => $next_movie ->get_until_message()]))?>
<?php render_template('styles')?>

