--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre_t`, `paragraphe_t`, `datePublication`, `secteur_id`) VALUES
(1, 'Côte d\'Ivoire par LebronJames', 'Blablabla', '2019-10-23 12:43:40', '1'),
(2, 'Senegal par James Harden', 'Blablabla', '2019-10-23 12:43:40', '1'),
(3, 'Maroc par Zinedine Zidane', 'Blablabla', '2019-10-23 12:44:18', '1'),
(4, 'Madagascar par Mike Tyson', 'Blablabla', '2019-10-23 12:44:18', '1'),
(5, 'Chine par Sun Tzu', 'Blablabla', '2019-10-23 12:45:15', '2'),
(6, 'La Corée du Sud par Vivian Foe', 'Blablabla', '2019-10-23 12:45:15', '2'),
(7, 'La Thailande par Said Bogota', 'Blablabla', '2019-10-23 12:46:00', '2'),
(8, 'Inde ', 'Blablabla', '2019-10-23 12:46:00', '2'),
(9, 'Etats-Unis par Donald Trump', 'Blablabla', '2019-10-23 12:46:51', '3'),
(10, 'Colombie par Pablo Escobar', 'Blablabla', '2019-10-23 12:46:51', '3'),
(11, 'Brazil para Ronaldinho', 'Blablabla', '2019-10-23 12:47:58', '3'),
(12, 'Canada by Dsquared²', 'Blablabla', '2019-10-23 12:47:58', '3'),
(13, 'France par Clovis ', 'Blablabla', '2019-10-23 12:48:47', '4'),
(14, 'Italia de Berlusconi', 'Blablabla', '2019-10-23 12:48:47', '4'),
(15, 'Roumanie par Brogov Tchetchon', 'Blablabla', '2019-10-23 12:49:43', '4'),
(16, 'London with Skepta', 'Blablabla', '2019-10-23 12:49:43', '4');


--
-- Contenu de la table `assoc_secteur`
--

INSERT INTO `assoc_secteur` (`id`, `libelleSecteur`) VALUES
(1, 'Afrique'),
(2, 'Asie'),
(3, 'Amérique'),
(4, 'Europe');

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `NNI`, `password`, `admin`) VALUES
(1, 'ROOT', 'ROOT', 'ROOT', 'ROOT', 1),
(2, 'USER', 'USER', 'USER', 'USER', 0);