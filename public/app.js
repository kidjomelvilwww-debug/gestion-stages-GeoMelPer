document.getElementById('form-depot').addEventListener('submit', async (e) => {
  e.preventDefault();
  const entreprise = document.getElementById('entreprise').value;
  const r = await fetch('/api/demandes', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ entrepriseId: 1 }),
  });
  const err = document.getElementById('erreur');
  if (r.status === 400) { err.textContent = 'Données invalides'; return; }
  if (r.status === 401) { window.location.href = '/login.html'; return; }
  if (r.status === 500) { err.textContent = 'Erreur serveur, réessayez'; return; }
  const d = await r.json();
  const li = document.createElement('li');
  li.textContent = d.entreprise;
  document.getElementById('liste').appendChild(li);
});