# TP9 — Déploiement et sauvegarde

**Durée** : 1 h · **Statut** : ✅ Terminé

## Objectif
Installer le projet sur un second poste et tester une restauration.

## Livrable
- 📄 [Ticket d'incident](ticket-incident.md)
- 📄 [Preuve de restauration](captures/restauration.png)
- 📄 [README installation](../../README.md)

## Preuves
- **Utilisateur SQL dédié** : `stages_app` avec droits limités (pas root).
- **Restauration testée** : les données de `gestion_stages_test` sont identiques à `gestion_stages`.

## Critères d'évaluation
- ✅ Installation reproductible
- ✅ Compte SQL à droits limités
- ✅ Restauration vérifiée
