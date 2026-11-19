# Contrat d'API — TP4

| Méthode | Chemin | Rôle autorisé | Succès | Erreurs |
|---|---|---|---|---|
| GET | /api/sante | Tous | 200 | 503 |
| GET | /api/demandes | Responsable, secrétariat | 200 | 401, 403 |
| POST | /api/demandes | Étudiant | 201 | 400, 401 |
| PATCH | /api/demandes/{id}/statut | Responsable | 200 | 400, 403, 404, 409 |