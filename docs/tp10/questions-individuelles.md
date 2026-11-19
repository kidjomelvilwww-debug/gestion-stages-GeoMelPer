# Questions individuelles — TP10

Voici les questions probables du jury pour chaque membre, avec les réponses attendues.

## Membre 1 (Backend / API)
- **Règle métier** : Quelles sont les transitions autorisées pour une demande ?
  *Réponse* : BROUILLON → SOUMISE, SOUMISE → VALIDEE ou REFUSEE (avec motif), REFUSEE → BROUILLON.
- **Requête** : Montrez une requête préparée dans `DemandeRepository`.
  *Réponse* : `SELECT * FROM demande_stage WHERE id = :id` avec `execute([':id' => $id])`.
- **Test** : Comment avez-vous testé le code 409 (transition interdite) ?
  *Réponse* : Via un `PATCH` sur une demande déjà VALIDEE (voir TP6, test 409).

## Membre 2 (Base de données / Modélisation)
- **Règle métier** : Pourquoi la contrainte `UNIQUE` sur `soutenance.demande_id` ?
  *Réponse* : Pour traduire la multiplicité 0..1 (une demande validée a au plus une soutenance).
- **Requête** : Comment avez-vous fait la sauvegarde/restauration ?
  *Réponse* : `mysqldump` pour exporter, puis import dans une base de test (`gestion_stages_test`).
- **Commit** : Expliquez le commit de résolution de conflit Git (TP5).

## Membre 3 (Frontend / Sécurité)
- **Règle métier** : Comment empêchez-vous les injections SQL côté PHP ?
  *Réponse* : PDO avec `ATTR_EMULATE_PREPARES => false` et requêtes préparées (`prepare` + `execute`).
- **Requête** : Comment protégez-vous l'interface contre le XSS ?
  *Réponse* : Utilisation de `textContent` au lieu de `innerHTML` (voir TP7, test XSS).
- **Test** : Comment testez-vous le contrôle d'accès (401/403) ?
  *Réponse* : Requête `curl` sans cookie de session (401) ou avec un rôle insuffisant (403).
