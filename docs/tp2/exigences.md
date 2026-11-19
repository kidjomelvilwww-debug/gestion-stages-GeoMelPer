# Exigences et matrice de traçabilité — Gestion des stages
Dépôt : gestion-stages-GeoMelPer — Membres : Géofroy  Melvil Pérenne

## 1. Exigences fonctionnelles (EF)
| Id | Exigence | Acteur | Priorité |
|---|---|---|---|
| EF-01 | Se connecter avec un compte | Tous | Must |
| EF-02 | Soumettre une demande de stage | Étudiant | Must |
| EF-03 | Valider ou refuser une demande (refus motivé) | Responsable | Must |
| EF-04 | Affecter un encadreur à une demande validée | Secrétariat | Must |
| EF-05 | Programmer la soutenance d'une demande validée | Secrétariat | Must |
| EF-06 | Consulter l'état de ses demandes | Étudiant | Should |
| EF-07 | Rechercher un dossier par nom ou statut | Secrétariat | Should |
| EF-08 | Consulter l'historique des décisions | Responsable | Could |
## 2. Exigences non fonctionnelles (ENF)
| Id | Exigence | Test associé | Seuil |
|---|---|---|---|
| ENF-01 | Toute lecture d'un dossier sans session valide renvoie HTTP 401 ; avec rôle insuffisant, HTTP 403 | cURL sans cookie → 401 ; rôle étudiant sur dossier d'autrui → 403 | 401 / 403 |
| ENF-02 | Tout champ est validé côté serveur ; une entrée invalide renvoie HTTP 422 sans aucune écriture en base | POST email "abc" → 422 + `SELECT COUNT` inchangé | 422 + 0 écriture |
| ENF-03 | La sauvegarde de la base est validée par une restauration (dump → restore → COUNT identique) | `mysqldump` → restore → `SELECT COUNT(*)` | COUNT identique |
## 3. User stories et critères d'acceptation

### US-02 (EF-02) — Soumettre une demande
**En tant qu'** étudiant, **je veux** soumettre une demande de stage **afin qu'** elle soit instruite par le secrétariat.

- **CA-1 (nominal)** : Given un étudiant connecté et un formulaire complet,
  When il soumet, Then la demande est créée au statut `SOUMISE` (HTTP 201)
  et apparaît dans « mes demandes ».
- **CA-2 (erreur)** : Given un étudiant connecté et un `entreprise_id` inexistant,
  When il soumet, Then la réponse est **HTTP 422**, aucune ligne `demande_stage`
  n'est créée et un message d'erreur explicite est affiché.

### US-03 (EF-03) — Valider une demande
**En tant que** responsable, **je veux** valider une demande complète **afin de** lancer la programmation.

- **CA-1 (nominal)** : Given une demande `SOUMISE` et un responsable connecté,
  When il valide, Then le statut devient `VALIDEE` et une ligne est ajoutée à l'historique.
- **CA-2 (erreur)** : Given une demande `VALIDEE`, When il tente de la refuser,
  Then la réponse est **HTTP 409** et le statut reste `VALIDEE`.
  ## 4. Matrice de traçabilité
| Exigence | Composant | Test | Statut | Preuve |
|---|---|---|---|---|
| EF-01 | `AuthService::login` | T-01 : mauvais mot de passe → 401 | fait | sortie cURL + commit |
| EF-02 | `DemandeService::soumettre` | T-02 : création SOUMISE (201) / 422 si invalide | fait | sortie cURL + commit |
| EF-03 | `DemandeService::valider` | T-03 : SOUMISE→VALIDEE ; refus d'une VALIDEE → 409 | fait | sortie cURL + commit |
| EF-04 | `DemandeService::affecterEncadreur` | T-04 : affectation sur VALIDEE uniquement | fait | sortie cURL + commit |
| EF-05 | `SoutenanceService::programmer` | T-05 : créneau occupé → 409 | à faire | — |
| EF-06 | `DemandeRepository::parEtudiant` | T-06 : liste filtrée par étudiant | à faire | — |
| EF-07 | `DemandeRepository::rechercher` | T-07 : recherche nom/statut ≤ 3 essais | à faire | — |
| EF-08 | `HistoriqueRepository::parDemande` | T-08 : historique ordonné | reporté | — |
## 5. Périmètre minimal (25 h)
- **Must (retenus)** : EF-01, EF-02, EF-03, EF-04, EF-05
  → couvrent le parcours de bout en bout : connexion → dépôt → décision → affectation → soutenance.
- **Should (si temps)** : EF-06, EF-07
  → améliorent le confort (suivi, recherche) mais ne bloquent pas la démo.
- **Reporté** : EF-08 (Could)
  → hors budget 25 h, aucune valeur bloquante pour la soutenance.