# Matrice de tests — TP8

| Test | Exigence | Données | Attendu | Observé | Preuve |
|---|---|---|---|---|---|
| T-01 | EF-03 | Valider demande 999 | 404 | 404 | [404.png](captures/404.png) |
| T-02 | EF-03 | Refuser sans motif | 400 | 400 | [400.png](captures/400.png) |
| T-03 | EF-03 | Valider une demande déjà VALIDEE | 409 | 409 | [409.png](captures/409.png) |
| T-04 | EF-05 | Soutenance le 2026-02-30 10:00 | 400 | 400 | (rejet SQL) |
| T-05 | ENF-01 | Étudiant B lit dossier de A | 403 | ⏳ (à implémenter en V2) | - |
| T-06 | ENF-02 | Champ email vide | 400 | 400 | [400.png](captures/400.png) |
| T-07 | ENF-01 | Injection SQL `1 OR 1=1` | Rejeté | Rejeté (404) | [injection_sql.png](captures/injection_sql.png) |
| T-08 | EF-01 | Session expirée | 401 | 401 | [401.png](captures/401.png) |
