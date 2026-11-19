INSERT INTO etudiant (compte_id, nom, prenom, email, mot_de_passe_hash) VALUES
  (1, 'ADJOVI', 'Koffi', 'koffi.adjovi@univ.test', '$2y$10$exemplefictif'),
  (2, 'BELLO', 'Aicha', 'aicha.bello@univ.test', '$2y$10$exemplefictif'),
  (3, 'DOSSOU', 'Marc', 'marc.dossou@univ.test', '$2y$10$exemplefictif');

INSERT INTO entreprise (nom, ville) VALUES
  ('Atelier Numerique', 'Porto Novo'),
  ('Reseau Plus', 'Cotonou');

INSERT INTO demande_stage (etudiant_id, entreprise_id, statut) VALUES
  (1, 1, 'SOUMISE'),
  (2, 1, 'BROUILLON'),
  (3, 2, 'BROUILLON');
