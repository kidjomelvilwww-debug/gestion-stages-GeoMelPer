ALTER TABLE etudiant ADD COLUMN mot_de_passe_hash VARCHAR(255) NOT NULL DEFAULT '';
UPDATE etudiant SET mot_de_passe_hash = '$2y$10$exemplefictif' WHERE id = 1;