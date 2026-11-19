<?php
namespace App\Services;
use PDO;
final class AuthService {
    public function __construct(private PDO $pdo) {}
    public function login(string $email, string $mdp): ?array {
        $s = $this->pdo->prepare('SELECT * FROM etudiant WHERE email = :e');
        $s->execute([':e' => $email]);
        $u = $s->fetch();
        if ($u && password_verify($mdp, $u['mot_de_passe_hash'] ?? '')) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $u['id'];
            return $u;
        }
        return null;
    }
}