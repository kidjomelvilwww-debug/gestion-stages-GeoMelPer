<?php
namespace App\Controllers;
use App\Config\Database;
final class SanteController {
    public function index(): void {
        header('Content-Type: application/json; charset=utf-8');
        try {
            Database::pdo()->query('SELECT 1');
            http_response_code(200);
            echo json_encode(['statut' => 'OK', 'base' => 'connectee', 'heure' => date('c')]);
        } catch (\Throwable $e) {
            http_response_code(503);
            echo json_encode(['statut' => 'DEGRADE', 'base' => 'indisponible']);
        }
    }
}