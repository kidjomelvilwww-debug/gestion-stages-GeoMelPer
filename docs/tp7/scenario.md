# Scénario bout-en-bout — TP7

## Démonstration
1. L'utilisateur saisit le nom de l'entreprise et clique sur "Envoyer".
2. Le JavaScript fait un appel `fetch POST /api/demandes`.
3. Le serveur répond `201 Created` et renvoie l'ID.
4. L'interface ajoute la demande à la liste en utilisant `textContent` (sécurisé).

## Test XSS
Saisir `<b>test</b>` dans le champ entreprise → les balises s'affichent **telles quelles** (pas de gras).
Cela prouve que `textContent` est utilisé à la place de `innerHTML`.

## Preuves
- [Création réussie](captures/creation.png)
- [Test XSS (balises affichées en texte brut)](captures/xss.png)
- [Persistance dans la base de données](captures/persistance.png)
