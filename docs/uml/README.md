# UML ↔ BDD — TP3 final

## Cas d'utilisation ↔ Tables
| Cas | Acteur(s) | Table(s) |
|---|---|---|
| S'authentifier | Tous | compte |
| Gérer son compte | Étudiant | compte, etudiant |
| Soumettre une demande (extend) | Étudiant | demande_stage |
| Consulter une demande (extend) | Étudiant | demande_stage |
| Gérer une demande | Responsable + Admin (héritage) | demande_stage |
| Confirmer une demande (extend) | Responsable + Admin | demande_stage |
| Refuser une demande (extend) | Responsable + Admin | demande_stage |
| Programmer une soutenance | Responsable + Admin | soutenance |
| Gérer les comptes | Administrateur | compte |

## Relations UML
- `<<include>>` : S'authentifier inclus par les 4 cas pivots.
- `<<extend>>` : Soumettre/Consulter étendent Gérer son compte ; Confirmer/Refuser étendent Gérer une demande.
- Héritage : `Administrateur -|> Responsable`.

## Contraintes SQL
- compte.email UNIQUE
- etudiant.compte_id UNIQUE (1 compte ↔ 0..1 étudiant)
- soutenance.demande_id UNIQUE → 0..1
- UNIQUE(date_heure, salle) → anti-conflit

## Diagrammes
- cas-utilisation.png
- classes.png
- sequence-gerer-compte.png
- sequence-gerer-demande.png
- activite-gerer-demande.png