# Revue de code — TP8

## Remarques
1. **Acceptée** : Le contrôle d'accès (403) n'est pas encore implémenté sur les routes PATCH. (À corriger en V2).
2. **Reportée** : Les requêtes SQL ne sont pas indexées sur `statut`, ce qui pourrait poser problème à grande échelle.
3. **Rejetée** : Utiliser `mysqli` au lieu de `PDO`. PDO est plus sécurisé et standard.
4. **Acceptée** : Ajouter des tests unitaires automatisés (PHPUnit).
