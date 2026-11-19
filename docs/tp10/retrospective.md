# Rétrospective — TP10

## 1. Qu'est-ce qui a bien fonctionné ?
- L'architecture en couches (Controllers, Services, Repositories) a permis de séparer clairement les responsabilités.
- L'utilisation de Git avec des branches courtes a évité les gros conflits (sauf un, résolu en TP5).
- Les tests HTTP (200, 400, 401, 404, 409) ont validé le backend très tôt.

## 2. Qu'est-ce qui a été difficile ?
- La configuration de l'environnement (MariaDB sur le port 3307, PATH de PHP sous Windows).
- La gestion des BOM (Byte Order Mark) dans les fichiers PHP générés sous PowerShell.

## 3. Qu'allons-nous changer pour la V2 ?
- Ajouter l'authentification complète (page de login, `AuthService` intégré aux routes).
- Implémenter le contrôle d'accès (403) pour empêcher un étudiant de valider une demande.
- Ajouter l'export PDF et le portail entreprise (exclus du MVP).
