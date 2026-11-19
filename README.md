@"
# Gestion des stages — Projet Informatique 2 (L3 SIL)

Application Web de gestion des stages et des soutenances universitaires.
Projet réalisé dans le cadre du cours **Projet Informatique 2** (Licence 3, Systèmes d'Information et Logiciels).

## Équipe
- Membre 1 — KIDJO Melvil
- Membre 2 — ADANDEDJAN Geoffroy
- Membre 3 — GBAGUIDI Pérenne

## Dépôt
- URL : https://github.com/kidjomelvilwww-debug/gestion-stages-GeoMelPer
- Branche principale : `main`

## Avancement des TP

| TP | Sujet | Statut | Dossier |
|---|---|---|---|
| TP1 | Fiche de cadrage | ✅ | [docs/tp1/](docs/tp1/) |
| TP2 | Exigences et matrice | ✅ | [docs/tp2/](docs/tp2/) |
| TP3 | UML et modélisation | ✅ | [docs/tp3/](docs/tp3/) |
| TP4 | Squelette et API | ✅ | [docs/tp4/](docs/tp4/) |
| TP5 | Git et organisation | ✅ | [docs/tp5/](docs/tp5/) |
| TP6 | API des demandes | ✅ | [docs/tp6/](docs/tp6/) |
| TP7 | Interface et intégration | ✅ | [docs/tp7/](docs/tp7/) |
| TP8 | Tests et sécurité | ✅ | [docs/tp8/](docs/tp8/) |
| TP9 | Déploiement et sauvegarde | ✅ | [docs/tp9/](docs/tp9/) |
| TP10 | Soutenance et bilan | ✅ | [docs/tp10/](docs/tp10/) |

## Environnement technique
- PHP 8, MariaDB 11.8 (port **3307**), Git, VS Code
- Base de données : `gestion_stages`
- Données fictives uniquement

## Installation (second poste)
1. `git clone <url>`
2. `Copy-Item .env.example .env`
3. `Get-Content database/migrations/001_init.sql | mariadb -u root -p -P 3307 gestion_stages`
4. `Get-Content database/migrations/002_auth.sql | mariadb -u root -p -P 3307 gestion_stages`
5. `php -S localhost:8000 -t public`
6. `curl.exe http://localhost:8000/api/sante` → 200 OK

