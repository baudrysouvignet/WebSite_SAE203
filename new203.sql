-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2023 at 12:24 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new203`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `contenue` text NOT NULL,
  `img` text NOT NULL,
  `temps_de_lecture` int(11) NOT NULL,
  `article_id_ecrivain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id_article`, `titre`, `date`, `contenue`, `img`, `temps_de_lecture`, `article_id_ecrivain`) VALUES
(1, 'Comment les classements NET ont changé le jeu : une introduction au basketball universitaire', '2023-03-17', 'If you are a college basketball fan, you are starting to salivate because March Madness is just around the corner. If you are new to the college basketball scene, March Madness is the name for the NCAA tournament crowning the champion of Division I men’s basketball. Whether you are a burgeoning fan...', 'https://images.unsplash.com/photo-1574623452334-1e0ac2b3ccb4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1287&q=80', 2, 1),
(2, 'Les lentilles de contact connectées pour mesurer la glycémie des adultes.', '2023-03-17', 'Les lentilles de contact connectées sont une innovation technologique qui permet aux porteurs de lentilles de mesurer leur glycémie sans avoir besoin de faire une piqûre de sang. Les lentilles sont équipées de capteurs de glucose miniaturisés qui mesurent la concentration de glucose dans les larmes. Les données sont ensuite transmises à une application mobile pour que les patients puissent suivre leur glycémie en temps réel.\n\nCette technologie offre de nombreux avantages, notamment la réduction de la douleur liée aux piqûres de sang et une meilleure gestion de la glycémie pour les patients diabétiques. En outre, elle permet une surveillance continue de la glycémie, ce qui peut aider à prévenir les complications du diabète.', 'https://images.unsplash.com/photo-1516220362602-dba5272034e7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2670&q=80', 2, 1),
(3, 'Les technologies de réalité augmentée au service de la formation professionnelle', '2023-03-15', 'La réalité augmentée est une technologie en plein essor qui permet de superposer des éléments virtuels au monde réel. Si cette technologie a souvent été utilisée dans les jeux vidéo ou la publicité, elle offre également des possibilités intéressantes pour la formation professionnelle.\r\n\r\nEn effet, la réalité augmentée permet de créer des environnements virtuels interactifs dans lesquels les apprenants peuvent pratiquer des tâches spécifiques. Cela peut être particulièrement utile dans des domaines tels que la médecine, l\'ingénierie ou la maintenance industrielle, où les erreurs peuvent avoir des conséquences graves.\r\n\r\nLes apprenants peuvent ainsi pratiquer des procédures complexes dans un environnement virtuel, sans risque de mettre en danger des vies humaines ou d\'endommager des équipements coûteux. De plus, la réalité augmentée permet de fournir des commentaires en temps réel aux apprenants, qui peuvent ainsi améliorer leur technique en temps réel.\r\n\r\nLes entreprises peuvent également utiliser la réalité augmentée pour former leur personnel à de nouveaux processus ou équipements. La réalité augmentée peut également être utilisée pour créer des manuels d\'utilisation interactifs, qui permettent aux utilisateurs de visualiser les instructions en 3D et de suivre les étapes à leur rythme.\r\n\r\nEnfin, la réalité augmentée peut également être utilisée pour des formations en ligne, offrant ainsi des possibilités d\'apprentissage à distance plus immersives et interactives.', 'https://images.unsplash.com/photo-1592478411213-6153e4ebc07d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2612&q=80', 5, 1),
(4, 'La technologie Blockchain pour la gestion des chaînes d\'approvisionnement', '2023-03-08', 'La technologie Blockchain est une solution innovante pour la gestion des chaînes d\'approvisionnement. Cette technologie permet de suivre et d\'enregistrer toutes les transactions effectuées tout au long de la chaîne d\'approvisionnement de manière transparente et sécurisée.\r\n\r\nEn utilisant la technologie Blockchain, les entreprises peuvent assurer la traçabilité des produits tout au long de la chaîne d\'approvisionnement, ce qui permet de garantir la qualité des produits et d\'assurer la conformité aux normes de sécurité et de qualité.\r\n\r\nEn outre, la technologie Blockchain peut aider à réduire les coûts de gestion de la chaîne d\'approvisionnement en éliminant les intermédiaires et en permettant une communication directe entre les différents acteurs de la chaîne.', 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2672&q=80', 5, 1),
(16, 'Les bienfaits de la méditation sur la santé mentale des jeunes', '2023-03-19', 'La méditation est une pratique ancienne qui a gagné en popularité ces dernières années en raison de ses nombreux avantages pour la santé mentale. Les études montrent que la méditation peut réduire le stress, l\'anxiété, la dépression, et améliorer la qualité de vie en général.<br><br>\r\n\r\nLa méditation est une pratique simple qui implique la concentration de l\'esprit sur le moment présent, souvent en utilisant des techniques de respiration et de relaxation. En pratiquant régulièrement la méditation, on peut apprendre à se concentrer sur les pensées et les émotions présentes, plutôt que de se laisser emporter par les soucis et les préoccupations du passé ou du futur.<br><br>\r\n\r\nLes bienfaits de la méditation ont été démontrés dans de nombreuses études scientifiques. Par exemple, une étude a révélé que la méditation régulière peut réduire les symptômes de dépression et d\'anxiété chez les personnes atteintes de troubles de l\'humeur. Une autre étude a montré que la méditation peut améliorer la fonction cognitive chez les personnes atteintes de démence.<br><br>\r\n\r\nDe plus, la méditation peut avoir des effets physiques positifs. Des études ont montré que la méditation peut réduire la tension artérielle, le taux de cholestérol et améliorer le système immunitaire. Elle peut également réduire la douleur chronique chez les personnes atteintes de maladies telles que l\'arthrite et le cancer.<br><br>\r\n\r\nEn fin de compte, la méditation est une pratique simple et abordable qui peut avoir des avantages significatifs pour la santé mentale et physique. Si vous cherchez à améliorer votre bien-être général, la méditation peut être un bon point de départ.<br><br>', 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1598&q=80', 2, 7),
(17, 'Comment la technologie aide à réduire la pollution de l\'air urbain', '2023-03-20', 'L\'histoire d\'un sauvetage miraculeux en haute mer a ému le monde entier. En novembre dernier, un bateau de pêche australien a été pris dans une violente tempête au large des côtes de la Tasmanie. Les vagues atteignaient jusqu\'à 12 mètres de haut, balayant tout sur leur passage. Les 3 membres d\'équipage étaient pris au piège, leur bateau prenant l\'eau rapidement.\r\n\r\nLa situation devenait de plus en plus critique à mesure que le temps passait, les membres d\'équipage se préparant à l\'inévitable. Ils ont allumé une fusée de détresse, mais il n\'y avait aucun navire à l\'horizon.\r\n\r\nC\'est alors qu\'un avion de patrouille maritime de la Royal Australian Air Force est arrivé sur les lieux. L\'avion avait été envoyé pour aider à la recherche et au sauvetage, mais les conditions météorologiques rendaient les opérations de sauvetage extrêmement difficiles.\r\n\r\nL\'équipage de l\'avion a repéré le bateau en détresse et a immédiatement commencé à coordonner les efforts de sauvetage. Ils ont réussi à larguer des radeaux de sauvetage et des fournitures aux membres de l\'équipage du bateau de pêche.\r\n\r\nMais alors que l\'avion se préparait à rentrer à la base, une vague gigantesque a balayé le bateau de pêche, le faisant chavirer. Les membres de l\'équipage ont été projetés dans l\'eau glacée, leur survie devenant de plus en plus incertaine.\r\n\r\nL\'avion a alors fait une manœuvre incroyable, volant à basse altitude au-dessus de l\'eau agitée pour tenter de récupérer les naufragés. Malgré les conditions extrêmes, l\'équipage de l\'avion a réussi à secourir les 3 membres de l\'équipage, les transportant en sécurité jusqu\'à la terre ferme.\r\n\r\nLe sauvetage miraculeux en haute mer a été salué comme un acte de courage et de dévouement par les sauveteurs et le public. Les membres de l\'équipage du bateau de pêche ont pu retrouver leurs familles, reconnaissants d\'être encore en vie grâce à l\'incroyable travail des sauveteurs.', 'https://images.unsplash.com/photo-1615053835734-7752878e939e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3028&q=80', 2, 8),
(18, 'La réalité virtuelle : une solution innovante pour la gestion de la douleur', '2023-03-20', 'L\'utilisation de la réalité virtuelle pour la gestion de la douleur est une innovation passionnante dans le domaine de la santé. Les scientifiques et les médecins découvrent de plus en plus de preuves montrant que la réalité virtuelle peut être un moyen efficace de soulager la douleur, en particulier pour les patients atteints de douleur chronique.<br><br>\r\n\r\nLa réalité virtuelle permet aux patients de s\'immerger dans un environnement virtuel apaisant, distractif ou stimulant, créant une expérience immersive qui aide à détourner leur attention de la douleur. Cette technique peut également aider à réduire l\'anxiété, le stress et la dépression qui peuvent aggraver la douleur.<br><br>\r\n\r\nLes avantages de la réalité virtuelle pour la gestion de la douleur ont été démontrés dans de nombreuses études cliniques. Par exemple, une étude menée sur des patients atteints de fibromyalgie a révélé que l\'utilisation de la réalité virtuelle pendant les séances de physiothérapie peut aider à réduire la douleur et l\'anxiété, ainsi qu\'à améliorer la qualité de vie.<br><br>\r\n\r\nLa réalité virtuelle peut également être utilisée pour la gestion de la douleur lors de procédures médicales invasives, telles que la chirurgie. Les patients qui utilisent la réalité virtuelle pendant la procédure rapportent moins de douleur et moins d\'anxiété que les patients qui n\'utilisent pas cette technique.<br><br>\r\n\r\nEn conclusion, la réalité virtuelle est une solution innovante et efficace pour la gestion de la douleur. Cette technique peut aider les patients à réduire leur douleur, leur anxiété et leur stress, améliorant ainsi leur qualité de vie. Avec des recherches continues et des développements technologiques, la réalité virtuelle pourrait devenir un élément clé de la prise en charge de la douleur dans les soins de santé.<br><br>', 'https://images.unsplash.com/photo-1576633587382-13ddf37b1fc1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2672&q=80', 2, 9),
(19, 'Les 7 principes clés pour concevoir une interface utilisateur réussie: Guide complet d\'UI design ', '2023-03-20', 'L\'interface utilisateur (UI) est la partie visible de tout système, site web ou application mobile. C\'est l\'endroit où l\'utilisateur interagit avec le produit, où il effectue des actions, des recherches, des achats ou toute autre activité en ligne. Ainsi, la qualité de l\'interface utilisateur peut avoir un impact significatif sur l\'expérience globale de l\'utilisateur et sur le succès du produit.<br><br>\r\n\r\nPour concevoir une interface utilisateur réussie, il est essentiel de suivre certaines règles et principes de conception. Voici 7 principes clés pour concevoir une interface utilisateur réussie :\r\n<br><br>\r\nLa simplicité : L\'interface doit être simple, facile à utiliser et intuitive. Évitez d\'avoir trop de boutons, de menus ou d\'options qui peuvent compliquer la navigation de l\'utilisateur.\r\n<br><br>\r\nLa cohérence : L\'interface doit être cohérente dans tous les éléments de design. La couleur, la typographie, les icônes et les boutons doivent être identiques dans tout le produit pour donner une impression de professionnalisme et de qualité.\r\n<br><br>\r\nLa visibilité : Les éléments importants de l\'interface utilisateur doivent être visibles et facilement repérables. Les boutons d\'action et les liens doivent être clairement indiqués, de sorte que l\'utilisateur sache quoi faire et où aller.\r\n<br><br>\r\nLa flexibilité : L\'interface doit être flexible pour s\'adapter à différents types de dispositifs, écrans et tailles d\'affichage. La compatibilité avec les mobiles et les tablettes est aujourd\'hui essentielle pour garantir une expérience utilisateur optimale.\r\n<br><br>\r\nL\'utilité : L\'interface doit être utile pour l\'utilisateur. Chaque élément de design doit avoir une raison d\'être et aider l\'utilisateur à accomplir ses tâches de manière efficace.\r\n<br><br>\r\nL\'accessibilité : L\'interface doit être accessible à tous les utilisateurs, y compris ceux qui ont des besoins spécifiques en matière de vision, de motricité ou d\'autres handicaps.\r\n<br><br>\r\nLa personnalité : L\'interface doit avoir une personnalité distinctive et refléter l\'identité de marque du produit. Les couleurs, les typographies et les images doivent être en accord avec l\'image de marque pour renforcer la confiance et la fidélité des utilisateurs.\r\n<br><br>\r\nEn suivant ces 7 principes clés de conception d\'interface utilisateur, les concepteurs peuvent créer des produits attrayants, faciles à utiliser et efficaces pour les utilisateurs. Cependant, la conception d\'une interface utilisateur réussie ne se limite pas à ces principes. Il est également important de tester et d\'itérer constamment pour améliorer l\'expérience utilisateur et répondre aux besoins en constante évolution des utilisateurs.', 'https://images.unsplash.com/photo-1545235617-9465d2a55698?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1760&q=80', 3, 1),
(20, 'Les avantages et les inconvénients du télétravail: tout ce que vous devez savoir', '2023-03-20', 'Le télétravail est de plus en plus courant dans notre monde en constante évolution, offrant aux travailleurs la possibilité de travailler à domicile ou dans un autre lieu éloigné de leur entreprise. Alors que cette nouvelle forme de travail peut offrir une flexibilité accrue et une réduction des coûts, elle peut également présenter des défis et des difficultés pour les employeurs et les travailleurs.\r\n<br><br>\r\nDans cet article, nous explorerons les avantages et les inconvénients du télétravail pour vous aider à mieux comprendre cette pratique de travail à distance.\r\n<br><br>\r\nAvantages du télétravail:\r\n<br><br>\r\nFlexibilité: Le télétravail offre une flexibilité accrue en termes de temps et de lieu de travail. Les travailleurs peuvent organiser leur emploi du temps pour répondre à leurs besoins personnels tout en respectant leurs obligations professionnelles.\r\n<br><br>\r\nÉconomies de coûts: Les travailleurs peuvent économiser sur les coûts de transport, de repas et d\'autres dépenses liées au travail, ce qui peut leur permettre d\'économiser de l\'argent sur le long terme.\r\n<br><br>\r\nProductivité accrue: Les travailleurs peuvent travailler dans un environnement qui leur convient, réduisant les distractions et augmentant la productivité. De plus, l\'absence de déplacements domicile-travail peut réduire le stress et la fatigue, augmentant ainsi la motivation et la productivité.\r\n<br><br>\r\nInconvénients du télétravail:\r\n<br><br>\r\nIsolement: Les travailleurs à distance peuvent se sentir isolés et déconnectés de l\'équipe de travail, ce qui peut affecter leur moral et leur motivation.\r\n<br><br>\r\nDifficultés de communication: Les communications peuvent être plus difficiles et moins rapides lors du travail à distance, ce qui peut affecter la collaboration et la résolution de problèmes.\r\n<br><br>\r\nDifficultés techniques: Les travailleurs à distance peuvent rencontrer des problèmes techniques liés aux outils de communication et de collaboration à distance, ce qui peut affecter leur efficacité et leur productivité.\r\n<br><br>\r\nEn conclusion, le télétravail peut offrir des avantages significatifs pour les travailleurs et les employeurs, mais il est important de prendre en compte les inconvénients et de les surmonter pour garantir une expérience de travail à distance positive et productive. Les employeurs doivent également veiller à ce que les travailleurs à distance reçoivent un soutien adéquat, y compris une formation, des outils de communication et de collaboration, et une assistance technique pour garantir leur efficacité et leur satisfaction au travail.', 'https://images.unsplash.com/photo-1567016515344-5e3b0d67bb75?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1760&q=80', 3, 1),
(21, 'Comment améliorer la qualité de l\'air intérieur dans les bâtiments\r\n', '2023-03-21', 'La qualité de l\'air intérieur est un sujet important qui affecte la santé et le bien-être des occupants des bâtiments, qu\'il s\'agisse de maisons, de bureaux ou d\'autres types d\'espaces. Des polluants tels que les particules fines, les gaz toxiques et les allergènes peuvent se concentrer à l\'intérieur et causer des problèmes respiratoires, des maux de tête, de la fatigue et d\'autres problèmes de santé.\r\n\r\nIl est possible d\'améliorer la qualité de l\'air intérieur grâce à des mesures simples et peu coûteuses. Parmi les solutions possibles, on peut citer l\'aération régulière des espaces, l\'utilisation de produits de nettoyage écologiques, l\'installation de purificateurs d\'air, la réduction de l\'utilisation de produits chimiques et l\'utilisation de plantes d\'intérieur pour purifier l\'air. Des efforts supplémentaires peuvent également être réalisés en matière de conception et de construction des bâtiments pour garantir une meilleure qualité de l\'air intérieur.\r\n', 'https://images.unsplash.com/photo-1568932166062-012821503ca7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YnVsZGluZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=900&q=60', 1, 1),
(22, 'Les bienfaits de l\'activité physique régulière pour la santé', '2023-03-21', 'L\'activité physique régulière est importante pour maintenir une bonne santé physique et mentale. Elle permet de prévenir de nombreuses maladies chroniques telles que le diabète, les maladies cardiaques et l\'obésité, ainsi que de renforcer les os et les muscles.\r\n\r\nEn plus des bienfaits physiques, l\'activité physique peut également améliorer la santé mentale en réduisant le stress, l\'anxiété et la dépression. Elle peut également améliorer la qualité du sommeil et aider à maintenir un poids corporel santé.\r\n\r\nIl est recommandé de pratiquer au moins 150 minutes d\'activité physique modérée à intense par semaine, comme la marche rapide, la course, la natation ou le cyclisme. Des activités telles que le yoga et la méditation peuvent également contribuer à améliorer la santé physique et mentale.', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c3BvcnR8ZW58MHx8MHx8&auto=format&fit=crop&w=900&q=60', 1, 10),
(23, 'Comment adopter un mode de vie éco-responsable au quotidien\r\n', '2023-03-21', 'La protection de l\'environnement est un enjeu majeur de notre temps, et chacun peut contribuer à sa manière à réduire son impact sur la planète. Adopter un mode de vie éco-responsable consiste à modifier ses habitudes et ses comportements quotidiens pour minimiser son empreinte écologique.\r\n\r\nPour cela, il est possible de mettre en place plusieurs actions simples, telles que la réduction de la consommation d\'eau et d\'énergie, le tri et le recyclage des déchets, l\'utilisation de moyens de transport éco-responsables, l\'achat de produits locaux et biologiques, la réduction de la consommation de viande et de produits industriels, et la réduction de la consommation de plastique.\r\n\r\nEn adoptant ces gestes au quotidien, chacun peut contribuer à préserver l\'environnement et à construire un avenir plus durable pour les générations futures.', 'https://images.unsplash.com/reserve/bOvf94dPRxWu0u3QsPjF_tree.jpg?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dHJlZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=900&q=60', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Ecrivains`
--

CREATE TABLE `Ecrivains` (
  `id_ecrivains` int(4) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ecrivains`
--

INSERT INTO `Ecrivains` (`id_ecrivains`, `nom`, `prenom`, `mdp`) VALUES
(0, 'test', 'test', '$2y$10$A9w10T1mFjWasYJ5ysyBCu.kuKwFd7mY2KTKDqRDIVmWCCbhVjpoi'),
(1, 'souvignet', 'baudry', '$2y$10$Ymi14iHZYbuXEjLH89uLquq7QSkmoQkgx/qitMMxozd.1U5NLeKqW'),
(7, 'marah', 'léa', ' '),
(8, 'roux', 'jack', '$2y$10$VYi6Ro1qBVd3oHIjcoDPq.aDT.uzjlRy95R.iSTdOrCLYr73kpEoy'),
(9, 'tran', 'pierre', '$2y$10$9JMMs8hEyRl88MlzwMl9TuO9gjZHwVjOaqwLZKza2LqZTM4Uyof8O'),
(10, 'marijnissen', 'nathan', '$2y$10$kQnAd6L3jKTAaG.5ebLv3uHGq943d1p.4UQknHc0IrNKO2RgDHImG'),
(11, 'escoffier', 'matheo', '$2y$10$NESTJM5ahpHvbD41ZwS5duwODEn6lOpFB6DxI55/0YW2lPQWUrAVa');

-- --------------------------------------------------------

--
-- Table structure for table `Tag`
--

CREATE TABLE `Tag` (
  `id_tag` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `icon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tag`
--

INSERT INTO `Tag` (`id_tag`, `nom`, `icon`) VALUES
(1, 'Technologie', 'desktop'),
(2, 'Formule 1', 'flag-checkered'),
(4, 'Formation', 'briefcase'),
(5, 'VR', 'vr-cardboard'),
(6, 'Apprentissage', 'graduation-cap'),
(7, 'Santé', 'notes-medical'),
(8, 'Diabète', 'heart'),
(9, 'Mesure', 'wave-square'),
(10, 'Blockchain', 'link'),
(11, 'Sécurité', 'helmet-safety'),
(22, 'Méditation', 'circle-info'),
(23, 'Ecologie', 'circle-info'),
(24, 'UI', 'circle-info'),
(25, 'Télétravail', 'circle-info'),
(26, 'Productivité', 'circle-info'),
(27, 'Sport', 'circle-info'),
(28, 'Environement', 'circle-info');

-- --------------------------------------------------------

--
-- Table structure for table `Vconnect`
--

CREATE TABLE `Vconnect` (
  `id_tag` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vconnect`
--

INSERT INTO `Vconnect` (`id_tag`, `id_article`) VALUES
(1, 3),
(6, 3),
(4, 3),
(5, 3),
(8, 2),
(9, 2),
(7, 2),
(1, 2),
(10, 4),
(1, 4),
(11, 4),
(7, 16),
(22, 16),
(1, 17),
(23, 17),
(5, 18),
(7, 18),
(24, 19),
(1, 19),
(25, 20),
(26, 20),
(7, 21),
(25, 21),
(27, 22),
(7, 22),
(28, 23),
(23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `vues`
--

CREATE TABLE `vues` (
  `id_vue` int(10) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` varchar(17) NOT NULL,
  `vue_id_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vues`
--

INSERT INTO `vues` (`id_vue`, `ip`, `date`, `vue_id_article`) VALUES
(22, '127.0.0.1', '20/03/23 09:25', 2),
(23, '127.0.0.1', '20/03/23 09:58', 16),
(29, '127.0.0.1', '20/03/23 10:02', 3),
(30, '127.0.0.1', '20/03/23 10:10', 3),
(31, '127.0.0.1', '20/03/23 10:17', 2),
(32, '127.0.0.1', '20/03/23 10:17', 18),
(33, '127.0.0.1', '20/03/23 14:34', 19),
(34, '127.0.0.1', '20/03/23 14:34', 4),
(35, '127.0.0.1', '20/03/23 15:05', 20),
(36, '127.0.0.1', '21/03/23 08:25', 3),
(37, '127.0.0.1', '21/03/23 08:27', 18),
(38, '127.0.0.1', '21/03/23 08:28', 2),
(39, '127.0.0.1', '21/03/23 08:29', 16),
(40, '127.0.0.1', '21/03/23 09:45', 18),
(41, '127.0.0.1', '21/03/23 09:45', 2),
(42, '127.0.0.1', '21/03/23 09:46', 23),
(43, '127.0.0.1', '21/03/23 10:25', 2),
(44, '127.0.0.1', '21/03/23 10:25', 16),
(45, '127.0.0.1', '02/05/23 12:01', 2),
(46, '127.0.0.1', '02/05/23 12:02', 3),
(47, '127.0.0.1', '02/05/23 12:03', 18),
(48, '127.0.0.1', '03/05/23 06:47', 2),
(49, '127.0.0.1', '03/05/23 06:50', 2),
(50, '127.0.0.1', '03/05/23 13:52', 4),
(51, '127.0.0.1', '04/05/23 14:22', 2),
(52, '127.0.0.1', '05/05/23 06:48', 4),
(53, '127.0.0.1', '05/05/23 06:48', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `article_id_ecrivain` (`article_id_ecrivain`);

--
-- Indexes for table `Ecrivains`
--
ALTER TABLE `Ecrivains`
  ADD PRIMARY KEY (`id_ecrivains`);

--
-- Indexes for table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `Vconnect`
--
ALTER TABLE `Vconnect`
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexes for table `vues`
--
ALTER TABLE `vues`
  ADD PRIMARY KEY (`id_vue`),
  ADD KEY `vue_id_article` (`vue_id_article`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Ecrivains`
--
ALTER TABLE `Ecrivains`
  MODIFY `id_ecrivains` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Tag`
--
ALTER TABLE `Tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vues`
--
ALTER TABLE `vues`
  MODIFY `id_vue` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_id_ecrivain`) REFERENCES `Ecrivains` (`id_ecrivains`);

--
-- Constraints for table `Vconnect`
--
ALTER TABLE `Vconnect`
  ADD CONSTRAINT `vconnect_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `Tag` (`id_tag`),
  ADD CONSTRAINT `vconnect_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Articles` (`id_article`);

--
-- Constraints for table `vues`
--
ALTER TABLE `vues`
  ADD CONSTRAINT `vues_ibfk_1` FOREIGN KEY (`vue_id_article`) REFERENCES `Articles` (`id_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
