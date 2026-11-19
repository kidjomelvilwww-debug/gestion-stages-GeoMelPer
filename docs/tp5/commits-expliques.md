# Commits expliqués — TP5

## Membre 1
Commit `cee7539` — "wip: tp4 complet + bases tp5-tp10"
- **Règle** : /api/sante renvoie 200 si la base est joignable, 503 sinon.
- **Test** : `curl.exe -i http://localhost:8000/api/sante` → 200 OK.
- **Preuve** : `docs/tp4/preuve-sante.md`.

## Membre 2
Commit `16a6601` — "merge: resolution conflit README (version unifiee)"
- **Règle** : résolution de conflit Git en gardant une version unifiée.
- **Test** : `git log --oneline --graph` montre le merge.
- **Preuve** : `docs/tp5/git-graph.txt`.

## Membre 3
Commit `158bd49` — "tp5: version A du README"
- **Règle** : création d'une branche courte `conflit-a` pour tester un conflit.
- **Test** : `git branch` montre `conflit-a` avant fusion.
- **Preuve** : `docs/tp5/git-graph.txt`.
