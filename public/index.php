<?php
declare(strict_types=1);
require __DIR__ . '/../config/config.php';
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../' . str_replace(['App\\', '\\'], ['src/', '/'], $class) . '.php';
    if (file_exists($path)) require $path;
});

session_start();

// Bloc de test temporaire (? retirer apr?s les tests)
if (isset($_GET['login_test'])) {
    $_SESSION['user_id'] = (int)$_GET['login_test'];
    echo json_encode(['session' => $_SESSION['user_id']]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// GET /api/sante
if ($method === 'GET' && $path === '/api/sante') {
    (new App\Controllers\SanteController())->index();
    exit;
}

// GET /api/demandes
if ($method === 'GET' && $path === '/api/demandes') {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['erreur' => 'Non authentifie']);
        exit;
    }
    $repo = new App\Repositories\DemandeRepository(App\Config\Database::pdo());
    $demandes = $repo->findByStudent((int)$_SESSION['user_id']);
    http_response_code(200);
    echo json_encode($demandes);
    exit;
}

// POST /api/demandes
if ($method === 'POST' && $path === '/api/demandes') {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['erreur' => 'Non authentifie']);
        exit;
    }
    $body = json_decode(file_get_contents('php://input'), true) ?? [];
    if (!isset($body['entrepriseId'])) {
        http_response_code(400);
        echo json_encode(['erreur' => 'entrepriseId manquant']);
        exit;
    }
    $repo = new App\Repositories\DemandeRepository(App\Config\Database::pdo());
    $id = $repo->create((int)$_SESSION['user_id'], (int)$body['entrepriseId']);
    http_response_code(201);
    echo json_encode(['id' => $id]);
    exit;
}

// PATCH /api/demandes/{id}/statut
if ($method === 'PATCH' && preg_match('#^/api/demandes/(\d+)/statut$#', $path, $m)) {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['erreur' => 'Non authentifie']);
        exit;
    }
    $body = json_decode(file_get_contents('php://input'), true) ?? [];
    $result = App\Services\DemandeService::valider(
        App\Config\Database::pdo(),
        (int)$m[1],
        $body['statut'] ?? '',
        $body['motif'] ?? null
    );
    http_response_code($result['code']);
    echo json_encode($result);
    exit;
}

http_response_code(404);
echo json_encode(['erreur' => 'Route inconnue', 'code' => 404]);

