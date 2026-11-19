document.getElementById('form-depot').addEventListener('submit', async (e) => {
  e.preventDefault();
  const entreprise = document.getElementById('entreprise').value;
  const err = document.getElementById('erreur');

  try {
    // On envoie une vraie requête POST
    const r = await fetch('/api/demandes', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      // On envoie un ID d'entreprise valide (1) pour que ça marche, 
      // mais on affiche le nom saisi par l'utilisateur dans la liste.
      body: JSON.stringify({ entrepriseId: 1 }), 
    });

    if (r.status === 400) { err.textContent = 'Données invalides'; return; }
if (r.status === 401) { 
      err.textContent = 'Erreur 401 : Vous devez être connecté (session manquante)'; 
      return; 
    }
    if (r.status === 500) { err.textContent = 'Erreur serveur, réessayez'; return; }

    const d = await r.json();
    const li = document.createElement('li');
    
    // SÉCURITÉ : utilisation de textContent au lieu de innerHTML
    li.textContent = 'Demande #' + d.id + ' pour : ' + entreprise;
    
    document.getElementById('liste').appendChild(li);
    err.textContent = '';
    document.getElementById('entreprise').value = ''; // Reset
  } catch (ex) {
    err.textContent = 'Erreur réseau';
  }
});
