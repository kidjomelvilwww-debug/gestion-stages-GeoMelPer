# Protection CSRF — TP8

## Principe
Le Cross-Site Request Forgery (CSRF) force un navigateur authentifié à envoyer une requête non désirée. Pour s'en protéger, on utilise un jeton (token) unique.

## Implémentation prévue
1. Génération du jeton : `$_SESSION['csrf_token'] = bin2hex(random_bytes(32));`
2. Ajout du jeton dans les formulaires (`<input type="hidden" name="csrf_token" value="...">`).
3. Vérification côté serveur : si le jeton reçu ne correspond pas à celui de la session, on renvoie une erreur **403**.

*(Note : dans le cadre de cette API de test, l'authentification se fait par session, mais l'ajout du jeton CSRF est une bonne pratique pour le frontend).*
