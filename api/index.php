<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Captura a rota (Ex: /api/acoes/listar)
$url = isset($_GET['url']) ? explode('/', $_GET['url']) : ['home'];

$controllerName = ucfirst($url[0]) . 'Controller'; // Ex: AcoesController
$method = isset($url[1]) ? $url[1] : 'index';     // Ex: listar

$controllerClass = "App\\Controllers\\$controllerName";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();

    if (method_exists($controller, $method)) {
        // Captura o corpo da requisição (JSON) vindo do AJAX
        $input = json_decode(file_get_contents("php://input"), true);

        // Executa o método e retorna o JSON
        echo $controller->$method($input);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Método não encontrado."]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Endpoint não existe."]);
}
