<?php
namespace App\Repositories;
use PDO;
final class DemandeRepository {
    public function __construct(private PDO $pdo) {}
    public function findById(int $id): ?array {
        $s = $this->pdo->prepare('SELECT * FROM demande_stage WHERE id = :id');
        $s->execute([':id' => $id]);
        return $s->fetch() ?: null;
    }
    public function findByStudent(int $etudiantId): array {
        $s = $this->pdo->prepare('SELECT * FROM demande_stage WHERE etudiant_id = :e');
        $s->execute([':e' => $etudiantId]);
        return $s->fetchAll();
    }
    public function create(int $etudiantId, int $entrepriseId): int {
        $s = $this->pdo->prepare('INSERT INTO demande_stage (etudiant_id, entreprise_id, statut) VALUES (:e, :en, "BROUILLON")');
        $s->execute([':e' => $etudiantId, ':en' => $entrepriseId]);
        return (int)$this->pdo->lastInsertId();
    }
    public function updateStatus(int $id, string $statut, ?string $motif): void {
        $s = $this->pdo->prepare('UPDATE demande_stage SET statut = :s, motif_refus = :m WHERE id = :id');
        $s->execute([':s' => $statut, ':m' => $motif, ':id' => $id]);
    }
}