# Fiche de cadrage — Gestion des stages

## 1. Problème et valeur attendue 
Les dossiers de stage circulent sur papier : validations perdues, pièces manquantes,
deux soutenances parfois programmées sur le même créneau. Le secrétariat relance
plusieurs fois chaque dossier. L'application centralise dépôt, décision motivée,
affectation d'un encadreur et programmation des soutenances. Valeur : circuit
traçable, sans perte de pièces ni conflit de calendrier.

## 2. Trois indicateurs mesurables
| Indicateur | Unité | Mode de mesure |
|---|---|---|
| Délai moyen de validation | jours | horodatage dépôt → décision |
| Dossiers incomplets 1ʳᵉ lecture | % | incomplets / déposés × 100 |
| Conflits de calendrier / session | nb/session | créneaux en double |

## 3. Parties prenantes
| Partie prenante | Attente principale | MVP |
|---|---|---|
| Étudiant | Déposer et suivre | Oui |
| Secrétariat | Vérifier, planifier | Oui |
| Responsable | Valider/refuser  avec motif | Oui |
| Encadreur | Consulter ses étudiants | Oui |
| Administrateur | Gérer les comptes | Oui |
| Entreprise | Déposer des offres | Non (v2) |

## 4. Périmètre du MVP

### Inclus (5)
1. Dépôt d'une demande de stage (EF-02)
2. Validation ou refus motivé par le responsable (EF-03)
3. Affectation d'un encadreur à une demande validée (EF-04)
4. Programmation d'une soutenance (EF-05)
5. Contrôle d'accès par rôle (EF-01)

### Exclus (3) — justifications
1. **Paiement en ligne** : hors budget 25 h, dépendance prestataire externe,
   exigerait des données réelles (interdites par le cours).
2. **SMS de rappel** : coût opérateur et dépendance externe ; reporté en v2.
3. **Portail entreprise** (dépôt d'offres) : reporté en v2 (figure 1.2).

## 5a. Objectifs SMART
| Objectif | Mesure | Test | Seuil | Preuve |
|---|---|---|---|---|
| Retrouver un dossier | nb recherches | 5 essais | ≤ 3 | fiche de test |
| Valider une demande | durée | démo | < 2 min | vidéo/log |
| Refuser sans fuite | code HTTP | requête interdite | 403 | sortie |

## 5b. Risques
| Risque | P | I | Criticité | Préventif | Propriétaire |
|---|---|---|---|---|---|
| MySQL indisponible | 2 | 3 | 6 | MariaDB local séance 1 | Admin |
| Conflit Git | 3 | 2 | 6 | fusions fréquentes | Chef de projet |
| Fuite données réelles | 1 | 3 | 3 | jeu fictif | Tous |
