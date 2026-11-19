<?php
namespace App\Services;
use PDO;
use App\Repositories\DemandeRepository;
final class DemandeService {
    private const TRANSITIONS = [
        'BROUILLON' => ['SOUMISE'],
        'SOUMISE'   => ['VALIDEE', 'REFUSEE'],
        'REFUSEE'   => ['BROUILLON'],
        'VALIDEE'   => [],
    ];
    public static function peutPasser(string $de, string $vers): bool {
        return in_array($vers, self::TRANSITIONS[$de] ?? [], true);
    }
    public static function motifRequis(string $vers): bool {
        return $vers === 'REFUSEE';
    }
    public static function valider(PDO $pdo, int $id, string $nouveau, ?string $motif): array {
        $pdo->beginTransaction();
        try {
            $repo = new DemandeRepository($pdo);
            $d = $repo->findById($id);
            if (!$d) { $pdo->rollBack(); return ['code' => 404]; }
            if (!self::peutPasser($d['statut'], $nouveau)) { $pdo->rollBack(); return ['code' => 409]; }
            if (self::motifRequis($nouveau) && !$motif) { $pdo->rollBack(); return ['code' => 400]; }
            $repo->updateStatus($id, $nouveau, $motif);
            $pdo->commit();
            return ['code' => 200];
        } catch (\Throwable $e) {
            $pdo->rollBack();
            return ['code' => 500];
        }
    }
}