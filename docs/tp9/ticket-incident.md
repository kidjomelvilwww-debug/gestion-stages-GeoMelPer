# Ticket d'incident — TP9

**Titre** : Validation acceptée sans motif de refus
**Type** : Maintenance corrective
**Priorité** : Haute (règle métier contournée)

## Contexte
L'API accepte le passage d'une demande au statut REFUSEE même si le champ `motif` est vide.

## Étapes pour reproduire
1. Se connecter comme responsable.
2. Envoyer la requête : `PATCH /api/demandes/1/statut` avec `{"statut":"REFUSEE"}` (sans motif).
3. Observer le résultat.

## Résultat observé
Le serveur renvoie `200 OK` et le statut passe à REFUSEE. (Note : dans notre code actuel, le code renvoie bien 400, mais c'est un exemple de ticket).

## Résultat attendu
Le serveur doit renvoyer `400 Bad Request` avec le message "Motif obligatoire pour un refus".

## Preuve
Voir [matrice de tests T-02](../tp8/matrice-tests.md).
