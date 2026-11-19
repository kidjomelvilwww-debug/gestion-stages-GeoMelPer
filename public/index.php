<?php
declare(strict_types=1);
require __DIR__ . '/../config/config.php';
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../' . str_replace(['App\\', '\\'], ['src/', '/'], $class) . '.php';
    if (file_exists($path)) require $path;
});
$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($method === 'GET' && $path === '/api/sante') {
    (new App\Controllers\SanteController())->index();
    exit;
}
http_response_code(404);
echo json_encode(['erreur' => 'Route inconnue', 'code' => 404]);