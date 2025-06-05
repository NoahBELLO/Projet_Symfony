-- Insert compagnies
INSERT INTO compagny (id, name, description, address, city, country) VALUES
(1, 'TechCorp', 'Entreprise de technologie innovante.', '12 rue du Code', 'Paris', 'France'),
(2, 'MarketMedia', 'Société de communication et marketing.', '34 avenue Pub', 'Lyon', 'France'),
(3, 'Designly', 'Agence de design créatif.', '5 place Couleurs', 'Marseille', 'France');

-- Insert job types
INSERT INTO job_type (id, name) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Freelance'),
(4, 'Stage');

-- Insert catégories
INSERT INTO job_categorie (id, name) VALUES
(1, 'Développement'),
(2, 'Marketing'),
(3, 'Design'),
(4, 'Ressources Humaines'),
(5, 'Data');

-- Insert users
INSERT INTO user (id, username, roles, password) VALUES
(1, 'alice', '["ROLE_USER"]', 'password'),
(2, 'bob', '["ROLE_USER"]', 'password'),
(3, 'carol', '["ROLE_USER"]', 'password');

-- Insert jobs
INSERT INTO job (id, compagny_id, job_type_id, title, description, country, remote_allowed, salary_min, salary_max, release_date) VALUES
(1, 1, 1, 'Développeur PHP', 'Travailler sur des projets Symfony.', 'France', 1, 32000, 40000, '2025-06-01 09:00:00'),
(2, 2, 2, 'Chef de projet marketing', 'Gérer les campagnes publicitaires.', 'France', 0, 30000, 37000, '2025-06-02 10:30:00'),
(3, 1, 4, 'Stagiaire développeur web', 'Apprendre à coder avec Symfony.', 'France', 1, 10000, 12000, '2025-06-03 14:00:00'),
(4, 3, 3, 'Designer UX Freelance', 'Mission de 3 mois sur une app mobile.', 'France', 1, 35000, 45000, '2025-06-04 11:15:00'),
(5, 2, 1, 'Data Analyst', 'Analyse de données et reporting.', 'France', 0, 38000, 48000, '2025-06-05 08:45:00');

-- Insert liaisons job-categorie
INSERT INTO job_categorie_job (job_categorie_id, job_id) VALUES
(1, 1), -- Développement pour Développeur PHP
(2, 2), -- Marketing pour Chef de projet
(1, 3), -- Développement pour stagiaire
(3, 4), -- Design pour Designer UX
(5, 5); -- Data pour Data Analyst

-- Insert candidatures
INSERT INTO job_application (id, job_id, user_id, cover_letter, created_at) VALUES
(1, 1, 1, 'Je suis très motivée par ce poste.', '2025-06-05 12:00:00'),
(2, 2, 2, 'Mon profil correspond parfaitement.', '2025-06-05 12:05:00'),
(3, 3, 3, 'Enthousiaste à l\'idée d\'apprendre.', '2025-06-05 12:10:00'),
(4, 5, 1, 'Expérience en analyse de données.', '2025-06-05 12:15:00');
