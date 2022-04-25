-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 08:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glazba`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `godina` int(11) NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `naziv`, `godina`, `slika`, `promjena`) VALUES
(1, 'Vruće igre', 1980, 'https://upload.wikimedia.org/wikipedia/hr/8/80/Vruce_igre.jpg', '2022-02-08 17:41:30'),
(4, 'Još fališ', 2015, 'https://www.menartshop.hr/data/public/2018-08/tn_vigor.jpg', '2022-03-11 15:30:25'),
(5, 'Utorak', 1999, 'https://i.discogs.com/0insfTd9M4K-fdtzjgla1IsGahLMgKWnRF1n_UZfKOE/rs:fit/g:sm/q:90/h:600/w:591/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTUxMDcz/MzAtMTQzNjg4NTEw/My01MzE0LmpwZWc.jpeg', '2022-03-11 15:30:25'),
(12, 'Tebi', 1986, 'https://i.discogs.com/NDh0Ub7CyGeuaUy7QcV2fGtxGTxx4O-I677ZAPnFzdk/rs:fit/g:sm/q:40/h:300/w:300/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTY5MzU0/NjUtMTQyOTg4Njgz/Ni0zODUwLmpwZWc.jpeg', '2022-04-02 17:17:47'),
(13, 'En tus planes', 2020, 'https://ih1.redbubble.net/image.1263796763.6414/st,small,507x507-pad,600x600,f8f8f8.jpg', '2022-04-02 17:20:19'),
(14, 'Forever', 2011, 'https://i.discogs.com/Xi6Rvm0yow8WqOUgvbWv3AbkySJdDsD6xg7Uujni5_M/rs:fit/g:sm/q:90/h:500/w:500/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTE1NDA0/MDM3LTE1OTA5NzAy/MDEtMjQxOC5qcGVn.jpeg', '2022-04-02 17:21:25'),
(15, 'Loose', 2006, 'https://upload.wikimedia.org/wikipedia/hr/e/ef/Loose.jpg', '2022-04-02 17:22:47'),
(16, 'Masterpiece', 2006, 'https://upload.wikimedia.org/wikipedia/en/thumb/6/63/R.K.M._%26_Ken-Y-Masterpiece.jpg/220px-R.K.M._%26_Ken-Y-Masterpiece.jpg', '2022-04-02 17:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `izvodac`
--

CREATE TABLE `izvodac` (
  `id` int(11) NOT NULL,
  `naziv` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `bio` text COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `rang` int(11) NOT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `izvodac`
--

INSERT INTO `izvodac` (`id`, `naziv`, `bio`, `slika`, `rang`, `promjena`) VALUES
(1, 'Parni Valjak', 'Parni valjak hrvatski je pop-rock sastav. Osnovan je 1975., razilaženjem Grupe 220, a na sceni je do danas, s malom pauzom 1988. godine te četverogodišnjom pauzom od 2005. do 2009. godine. Prvu postavu tvorili su Husein Hasanefendić &quot;Hus&quot; (solo gitara, akustične gitare i vokal), Aki Rahimovski (vokal, klavijature), Srećko Antonioli (bubnjevi, udaraljke i prateći vokal), Zlatko Miksić &quot;Fuma&quot; (bas-gitara) i Jurica Pađen (solo gitara, akustične gitare i vokal). Parni valjak je jedan od &quot;pokretača&quot; čitavog vala rock i pop-rock sastava u Hrvatskoj i ostatku bivše Jugoslavije.', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT-978JqgXJbraGZHGpHOK2BxFz7fVHxhxXkqLq602yaWNL9JY0', 5, '2022-04-20 13:46:40'),
(4, 'Grupa Vigor', 'Grupa Vigor je osječki pop sastav. Grupa Vigor je skupina od šest momaka iz Osijeka koji vole i žive glazbu. Mario Roth, Sebastijan Novoselec, Goran Djurković, Žarko Marinović, Stjepan Rudinski i Dario  Slamek su tih šest momaka koji, više manje, u grupi Vigor sviraju i pjevaju već 20 i  nešto malo više godina.', 'https://cdn.kme.si/public/images-cache/630xX/2021/09/10/1439bb4363639110e3d6480594884c4a/613afd85b65c4/1439bb4363639110e3d6480594884c4a.jpeg', 2, '2022-03-11 15:23:56'),
(6, 'Petar Grašo', 'Petar Grašo (Split, 19. ožujka 1976.) hrvatski je pjevač i skladatelj zabavne i pop glazbe.', 'https://evarazdin.hr/upload/publish/368885/14192687-10154402341964178-6206003310159627458-n_5a7ae38eb01ed.jpg', 6, '2022-03-11 15:51:27'),
(10, 'UB40', 'UB40 je ime britanske rege muzičke grupe. Osnovani su 1978. godine u Birminghamu, Engleska. Najveće uspjehe postizali su 80-tih godina 20. stoljeća hitovima poput Red Red Wine, Kingston Town, i obradama Can\'t Help Falling in Love i I Got You Babe.', 'https://i1.sndcdn.com/artworks-000149760574-7esf9b-t500x500.jpg', 10, '2022-04-02 16:15:53'),
(11, 'Ray Charles', 'Ray Charles bilo je umjetničko ime Raymonda Charlesa Robinsona (Albany, Georgia, 23. rujna 1930. – Beverly Hills, Kalifornija, 10. lipnja 2004.), legendarnog američkog crnačkog glazbenika. Bio je američki pionir glasovira u soulu, koji je oblikovao zvuk rhythm and bluesa. U country i pop glazbu unio je dah soula, a obradu pjesme \"America the Beautiful\" nazivaju klasikom, kao i čovjeka koji ju je izvodio.[3]\r\n\r\nFrank Sinatra zvao ga je \"jedinim pravim genijem u show biznisu\",[3][4] a 2004. godine časopis Rolling Stone postavio ga među prvih deset u svom popisu stotine besmrtnika.', 'https://i1.sndcdn.com/artworks-22wLabSBkwVk9oWq-fuzQWQ-t500x500.jpg', 7, '2022-04-02 16:15:53'),
(12, 'Miroslav Ilić', 'Miroslav Ilić (Mrčajevci kod Čačka, 10. prosinca 1950.) je srpski pjevač narodne glazbe, i jedan od najpriznatijih pjevača na srpskoj glazbenoj sceni.', 'https://express.ba/wp-content/uploads/2019/09/20712_miroslav-ilic01-public-promo_f.jpg', 8, '2022-04-02 16:19:49'),
(13, 'David Bisbal', 'David Bisbal, punim imenom David Bisbal Ferre (Almería, 5. lipnja 1979.), španjolski pjevač i dobitnik Latin Grammy-nagrade. Trenutnu slavu stekao je kao sudionik TV showa Operacion Triunfo. Do sada je snimio 4 studijska albuma, koji su svi bili uvršteni u Spanish Albums Chart top ljestvicu. Tijekom godina turnejama je prešao cijelu Europu i Latinsku Ameriku te je priznati internacionalni izvođač.', 'https://cdns-images.dzcdn.net/images/artist/fa26c7497c948a335cfe65b787a40094/264x264.jpg', 1, '2022-04-02 16:19:49'),
(14, 'Rakim & Ken-Y ', 'Rakim & Ken-Y je reggaeton duo koji su 2003. stvorili José Nieves i Kenny Vázquez. Umjetnici su poznati u svijetu latino glazbe po tome što su prvi uspješno spojili mainstream pop glazbu s reggaeton uličnim ritmovima Portorika i izložili stil širokoj međunarodnoj publici.', 'https://cdns-images.dzcdn.net/images/artist/dc464366754ea4a04d3d543b87c95829/500x500.jpg', 3, '2022-04-02 16:32:55'),
(15, 'Aretha Franklin', 'Aretha Franklin (Memphis, 25. ožujka 1942. – Detroit, 16. kolovoza 2018.[1]), bila je američka soul pjevačica.', 'https://geo-media.beatport.com/image_size/590x404/d67cd2a7-787e-42fc-a21c-5d50900483b2.jpg', 9, '2022-04-02 16:32:55'),
(16, 'Billy Ray Cyrus\r\n', 'Billy Ray Cyrus je američki pjevač i glumac. Od 1992. godine objavio je 16 studijskih albuma i 53 singla, a poznat je po svom hit singlu \"Achy Breaky Heart\", koji se našao na vrhu američke ljestvice Hot Country Songs i postao prvi singl ikada koji je postigao trostruko platinasti status u Australiji. ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWMyvM_sWR6u_wU2Y4AK2pMExZvlqWHFPsEY8UDlB7Q9Jzo-3z_mOi5izYq5nIXo_6-5E&usqp=CAU', 12, '2022-04-02 16:39:31'),
(17, 'Nelly Furtado', 'Nelly Kim Furtado je kanadska pjevačica, producentica i glumica portugalskog podrijetla. Prodala je više od 40 milijuna albuma širom svijeta. Živi u Torontu. Poznata je po eksperimentiranju s različitim instrumentima, zvukovima, žanrovima, vokalnim stilovima i jezicima', 'https://angartwork.akamaized.net/?id=2113278&size=640', 11, '2022-04-02 16:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `izvodac_album`
--

CREATE TABLE `izvodac_album` (
  `id` int(11) NOT NULL,
  `izvodac_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `promjena` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `izvodac_album`
--

INSERT INTO `izvodac_album` (`id`, `izvodac_id`, `album_id`, `promjena`) VALUES
(1, 1, 1, '2022-02-08 17:43:32'),
(4, 4, 4, '2022-03-11 16:50:32'),
(5, 6, 5, '2022-03-11 16:50:32'),
(6, 13, 13, '2022-04-02 17:26:37'),
(7, 12, 12, '2022-04-02 17:26:37'),
(8, 17, 15, '2022-04-02 17:27:12'),
(9, 14, 16, '2022-04-02 17:27:12'),
(10, 14, 14, '2022-04-02 17:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `lozinka` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `tip_korisnika_id` int(11) DEFAULT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `lozinka`, `tip_korisnika_id`, `promjena`) VALUES
(1, 'Mirko', 'Posavec', 'admin@mailinator.com', '$2y$10$IH5gBQPPRjEcU0c3JwmyZ.wQbQn8BsZFEkQzaQ2.5wl4tGNTOvWU.', 1, '2022-02-15 18:34:04'),
(2, 'Verica', 'Verić', 'verica@mailinator.com', '$2y$10$XW8Fr.NiZahpbdmzXsaDZ.kt24l.09U1ET7iChiGwgN28RcfeT1X.', 2, '2022-02-15 18:37:21'),
(3, 'Stipe ', 'Stipić', 'stipe@mail.com', '$2y$10$EuJupM5.S7vM5DeIryjc0OR.tuMcuw0VTpIjjD07lPl2dS5ZLlGkK', 2, '2022-02-22 16:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8_bin NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dogadaj` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `email`, `vrijeme`, `dogadaj`) VALUES
(1, 'admin@mailinator.com', '2022-04-03 07:18:05', 'Odjava korisnika'),
(2, 'admin@mailinator.com', '2022-04-03 07:18:12', 'Prijava korisnika'),
(3, 'admin@mailinator.com', '2022-04-03 07:18:17', 'Odjava korisnika'),
(4, 'stipe@mail.com', '2022-04-03 07:18:22', 'Prijava korisnika'),
(5, 'stipe@mail.com', '2022-04-03 07:18:29', 'Dodavanje nove playliste'),
(6, 'stipe@mail.com', '2022-04-03 07:18:34', 'Odjava korisnika'),
(7, 'admin@mailinator.com', '2022-04-03 07:18:44', 'Prijava korisnika'),
(8, 'admin@mailinator.com', '2022-04-03 07:19:05', 'Prijava korisnika'),
(43, 'admin@mailinator.com', '2022-04-20 18:41:18', 'Odjava korisnika'),
(44, 'stipe@mail.com', '2022-04-03 07:36:28', 'Prijava korisnika'),
(45, 'stipe@mail.com', '2022-04-03 07:59:34', 'Odjava korisnika'),
(46, 'admin@mailinator.com', '2022-04-20 18:41:45', 'Prijava korisnika'),
(47, 'admin@mailinator.com', '2022-04-03 08:27:47', 'Odjava korisnika'),
(48, 'stipe@mail.com', '2022-04-03 08:39:15', 'Prijava korisnika'),
(49, 'stipe@mail.com', '2022-04-03 08:39:27', 'Odjava korisnika'),
(50, 'stipe@mail.com', '2022-04-04 14:18:39', 'Prijava korisnika'),
(51, 'stipe@mail.com', '2022-04-04 14:19:42', 'Dodavanje nove playliste'),
(52, 'stipe@mail.com', '2022-04-04 14:21:18', 'Odjava korisnika'),
(53, 'admin@mailinator.com', '2022-04-04 14:21:37', 'Prijava korisnika'),
(54, 'admin@mailinator.com', '2022-04-04 14:24:58', 'Odjava korisnika'),
(55, 'admin@mailinator.com', '2022-04-19 14:51:39', 'Prijava korisnika'),
(56, 'admin@mailinator.com', '2022-04-19 22:29:15', 'Odjava korisnika'),
(57, 'admin@mailinator.com', '2022-04-20 11:50:45', 'Prijava korisnika'),
(58, 'admin@mailinator.com', '2022-04-20 20:16:09', 'Odjava korisnika'),
(59, 'admin@mailinator.com', '2022-04-24 16:07:55', 'Prijava korisnika'),
(60, 'admin@mailinator.com', '2022-04-24 17:25:29', 'Odjava korisnika'),
(61, 'admin@mailinator.com', '2022-04-24 17:26:10', 'Prijava korisnika'),
(62, 'admin@mailinator.com', '2022-04-24 17:33:21', 'Odjava korisnika'),
(63, 'stipe@mail.com', '2022-04-24 17:33:46', 'Prijava korisnika'),
(64, 'stipe@mail.com', '2022-04-24 17:52:36', 'Dodavanje nove playliste'),
(65, 'stipe@mail.com', '2022-04-24 17:55:07', 'Odjava korisnika'),
(66, 'admin@mailinator.com', '2022-04-24 17:55:15', 'Prijava korisnika'),
(67, 'admin@mailinator.com', '2022-04-24 18:00:52', 'Odjava korisnika'),
(68, 'stipe@mail.com', '2022-04-24 18:01:11', 'Prijava korisnika'),
(69, 'stipe@mail.com', '2022-04-24 18:38:17', 'Dodavanje nove playliste'),
(70, 'stipe@mail.com', '2022-04-24 18:41:14', 'Odjava korisnika');

-- --------------------------------------------------------

--
-- Table structure for table `pjesma`
--

CREATE TABLE `pjesma` (
  `id` int(11) NOT NULL,
  `naziv` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `tekst` text COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `zanr_id` int(11) DEFAULT NULL,
  `trajanje` time NOT NULL,
  `ocjena` float NOT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pjesma`
--

INSERT INTO `pjesma` (`id`, `naziv`, `tekst`, `slika`, `link`, `album_id`, `zanr_id`, `trajanje`, `ocjena`, `promjena`) VALUES
(1, 'Ljubavna', 'Naoružan samo smiješkom hodam ja kroz grad\r\nZvona zvone, nedjelja je, gdje ja pripadam\r\nMoje ime nije važno jer je namjera\r\nTo što čini razliku od čovjeka do čovjeka\r\nNemam nikog da me vodi, to mi ne treba\r\nJer još uvijek moja glava meni pripada\r\nMoraš prvo puzati da bi znao hodati\r\nA kad te stvarno sve\r\nUza zid pritisne digni glavu\r\nNe daj se, pjevaj pjesme ljubavne\r\nZaplači da te nitko ne vidi\r\nNaoružan samo smiješkom hodam ja kroz grad\r\nZvona zvone, nedjelja je, gdje ja pripadam\r\nBole riječi, boli vrijeme, bole sudbine\r\nDaj još rundu prijatelju, kome je do istine\r\nMoraš prvo puzati da bi znao hodati\r\nA kad te stvarno sve\r\nUza zid pritisne digni glavu\r\nNe daj se, pjevaj pjesme ljubavne\r\nZaplači da te nitko ne vidi\r\nAj, ja ja ja ja ja ja\r\nAj, ja ja ja ja ii\r\nAj, ja ja ja ja ja ja\r\nDigni glavu\r\nNe daj se, pjevaj pjesme ljubavne\r\nSlušaj me, ma boli te\r\nNe daj se, pjevaj pjesme ljubavne\r\nZaplači da te nitko ne vidi\r\nNe vidi\r\nNe vidi\r\nNe vidi', 'https://i.ytimg.com/vi/9QnUOrTsxXA/hqdefault.jpg', 'https://www.youtube.com/watch?v=r_4FfAurBn4', 1, 1, '04:10:00', 8, '2022-04-02 17:34:50'),
(2, 'Utorak', 'Pred tebe razlit\' cu svoju bol\r\nk\'o crno vino na bijeli stol\r\njos nosim onaj trag\r\nsto boli al\' je drag\r\na tebe nema i nema te\r\n\r\nProlazi jos jedan utorak\r\nsve ide, znam\r\nmoram biti jak\r\nal\' cuvam jastuk nas\r\ntek ako zalutas\r\na tebe nema i nema te\r\n\r\nRef.\r\nI sve dok zivim\r\ni dok imam glas\r\nja plakat\' cu za nas\r\nto me zivot okuje\r\n\r\nI sve dok zivim\r\ni dok imam glas\r\nja plakat\' cu za nas\r\nBoze daj da budem jak\r\nda mi prodje utorak\r\n\r\nZivim k\'o vuk\r\nponosan i sam\r\nne znam za bol\r\nljubav niti sram\r\n\r\nAl\' cuvam jastuk nas\r\ntek ako zalutas\r\na tebe nema i nema te', 'https://tekstomanija.com/wp-content/uploads/2018/10/Petar-Gra%C5%A1o-Utorak.jpg', 'https://www.youtube.com/watch?v=gcq3DvVC7f0', 5, 2, '00:00:00', 7.5, '2022-04-02 17:34:50'),
(3, 'Još fališ', 'Još osjećam tvoje ruke iako me grli tuga\r\nLjudi kažu navika\r\nAl sve dok uzdah nade čujem\r\nNiti jednoj blizu ne dam\r\nJer to što nosim ispod košulje\r\nTuce samo za tebe\r\n\r\nJoš fališ do bola, ostarit nemam s kime\r\nProlaze nam dani, proljeća, ljeta, zime\r\nJa sve sam ti dao i nemam što da gubim\r\nSve je moje s tobom kad te srcem ljubim\r\n\r\nJoš fališ do bola, još uvijek sve si moje\r\nJoš spavaš kraj mene, na praznom dlanu mome\r\nDaljine nas dijele, pa molim dane, sate\r\nDa te nađu i noćas te meni vrate\r\n\r\nRekla si mi da ti treba vremena da budeš sama\r\nProšlo je i previše\r\nAl sve dok uzdah nade čujem\r\nNiti jednoj srce ne dam\r\nJer crna noć na mome jastuku\r\nJoš po tebi miriše\r\n\r\nDođi, dođi, bez tebe nije isto\r\nDođi, dođi, i dalje jedno mi smo\r\n\r\nJoš fališ mi', 'https://is5-ssl.mzstatic.com/image/thumb/Music4/v4/1e/5b/c4/1e5bc449-55f3-f125-c70e-087d4c084627/3859892682323_cover.jpg/400x400cc.jpg', 'https://www.youtube.com/watch?v=4awp5blLLUI', 4, 2, '04:09:00', 10, '2022-04-02 17:48:49'),
(4, 'Kingston Town', 'The night seems to fade\r\nBut the moonlight lingers on\r\nThere are wonders for everyone\r\nThe stars shine so bright\r\nBut they\'re fading after dawn\r\nThere is magic in Kingston Town\r\nOh Kingston Town\r\nThe place I long to be\r\nIf I had the whole world\r\nI would give it away\r\nJust to see, the girls at play\r\nAnd when I am king\r\nSurely I would need a queen\r\nAnd a palace and everything, yeah\r\nAnd now I am king\r\nAnd my queen will come at dawn\r\nShe\'ll be waiting in Kingston Town\r\nOh Kingston Town\r\nThe place I long to be\r\nIf I had the whole world\r\nI would give it away\r\nJust to see, the girls at play\r\nYeah\r\nWhen I am king\r\nSurely I would need a queen\r\nAnd a palace and everything, yeah\r\nAnd now I am king\r\nAnd my queen will come at dawn\r\nShe\'ll be waiting in Kingston Town\r\nShe\'ll be waiting in Kingston Town\r\nRight now\r\nShe\'ll be waiting in Kingston Town\r\nOh yeah\r\nShe\'ll be waiting in Kingston Town', 'https://upload.wikimedia.org/wikipedia/en/e/e7/Labour_of_Love_II_album_cover.jpg', 'https://www.youtube.com/watch?v=9c4KAnQpdGw', NULL, 3, '04:43:00', 7, '2022-04-02 17:48:49'),
(5, 'Mas', 'Uuu\r\nRakim y Ken Y\r\nForever\r\n\r\nComo en un cuento de hadas\r\nllegaste tu\r\na iluminar con tu carita mi camino\r\ny no encontré las palabras\r\nni la actitud\r\npara decirte que contigo quiero mas\r\n\r\nQuiero amarte mas\r\nte invito a volar\r\nven a mi cielo\r\nyo no te dejare jamas\r\n\r\nQuiero amarte mas\r\nmas aya del mar\r\nyo solo quiero amarte mas\r\n\r\nwuooh\r\nwuooh\r\nYo solo quiero amarte mas [x2]\r\n\r\nVen y abrázame mi amor siente el latido de mi pecho\r\noye mi corazón que esta gritando lo que siento\r\nte dice que te ama como nadie lo ha hecho\r\n(quiero amarte mas)\r\n\r\npero muchos se imaginan que el amor es de suerte\r\npero yo me siento mas que bendecido al tenerte\r\npor siempre, yo prometo quererte\r\ny amarte hasta la muerte yo\r\n\r\nQuiero amarte mas\r\nte invito a volar\r\nven a mi cielo\r\nyo no te dejare jamas [x2]\r\n\r\nwuooh (quiero amarte mas)\r\nwuooh\r\nYo solo quiero amarte mas\r\n\r\nComo en un cuento de hadas\r\nllegaste tu\r\na iluminar con tu carita mi camino\r\ny no encontré las palabras\r\nni la actitud\r\npara decirte que contigo quiero mas\r\n(Forever)\r\n\r\nwuoooh\r\nMystico\r\nEliel\r\nPina Records\r\nRakim y Ken Y\r\nPina Records\r\nRakim y Ken Y\r\nForever\r\nPina... dile a los estudiantes que están\r\nhaciendo mal su tarea\r\nRakim y Ken Y\r\nPina Records', 'https://upload.wikimedia.org/wikipedia/en/4/42/Rakim_%26_Ken-Y_-_Forever.jpg', 'https://www.youtube.com/watch?v=WlJLpjFmwGc', 14, 10, '03:34:00', 9.1, '2022-04-02 18:09:10'),
(6, 'Tebi', 'Tebi, koja vecno cekas\r\nusamljena noci duge\r\ntebi koja znas, a cutis\r\nda sam pored neke druge\r\n\r\nRef.\r\nTebi, moja verna drugo\r\nmoja sreco moja tugo\r\ntebi dacu srce ludo\r\nsve sam dao, nemam drugo\r\n\r\nTebi, koja suze ronis\r\na ne zelis da ja vidim\r\ntebi koja ludo volis\r\ntebi kojoj ja se divim\r\n\r\nRef.\r\n\r\nTebi, pesmom zelim reci\r\nda me boli tvoja tama\r\ni da ce me savest peci\r\nza sve sto si bila sama\r\n\r\nRef. 2x', 'https://i.discogs.com/NDh0Ub7CyGeuaUy7QcV2fGtxGTxx4O-I677ZAPnFzdk/rs:fit/g:sm/q:40/h:300/w:300/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTY5MzU0/NjUtMTQyOTg4Njgz/Ni0zODUwLmpwZWc.jpeg', 'https://www.youtube.com/watch?v=k0TbsXVLOCk', 12, 8, '04:00:00', 6, '2022-04-02 18:06:40'),
(7, 'Maneater', 'Take it back\r\nEverybody look at me, me\r\nI walk in the door you start screaming\r\nCome on everybody, what you here for?\r\nMove your body around like a nympho\r\nEverybody get your neck to crack around\r\nAll you crazy people come on jump around\r\nI wanna see you all on your knees knees\r\nYou either wanna be with me or be me\r\nCome on now\r\nMan eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nMake you fall real hard in love\r\nShe\'s a man eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nWish you never ever met her at all\r\nAnd when she walks she walks with passion\r\nWhen she talks, she talks like she can handle it\r\nWhen she asks for something boy she means it\r\nEven if you never ever see it\r\nEverybody get your neck to crack around\r\nAll you crazy people come on jump around\r\nYou doing anything to keep her by your side\r\nBecause she says she love you, love you long time\r\nCome on now\r\nMan eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nMake you fall real hard in love\r\nShe\'s a man eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nWish you never ever met her at all\r\nCome on now\r\nMan eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nMake you fall real hard in love\r\nShe\'s a man eater, make you work hard, make you spend hard\r\nMake you want all of her love\r\nShe\'s a man eater, make you buy cars, make you cut cards\r\nWish you never ever met her at all\r\nNo, never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\n(Come on)\r\nYou wish you\'d never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\n(What you sayin\', girl?)\r\nYou wish you\'d never ever met her at all\r\nI been around the world I ain\'t ever seen a girl like this\r\nShe\'s a man eater, a man eater\r\nI been around the world I ain\'t ever seen a girl like this\r\nShe\'s a man eater, a man eater\r\nI been around the world I ain\'t ever seen a girl like this\r\nShe\'s a man eater, a man eater\r\nI been around the world I ain\'t ever seen a girl like this', 'https://upload.wikimedia.org/wikipedia/en/5/55/Loose_%28Nelly_Furtado_album_-_cover_art%29.png', 'https://www.youtube.com/watch?v=I512Mgmb678', 15, 12, '04:25:00', 7.4, '2022-04-02 18:16:32'),
(8, 'Love not war', 'Jason Derulo (yeah)\r\nOh, oh\r\nOoh\r\nBust it open for a gift\r\nI put diamonds on your wrist\r\nI can\'t buy your lovin\'\r\nIt\'s never enough\r\nI took that girl on a trip\r\n\'Cause we was arguin\'\r\nEver since we stopped touchin\'\r\nWe\'re not in touch\r\nI know money can\'t buy, buy, buy your love\r\nI guess I didn\'t try, try hard enough\r\nBut we could work this like a nine-to-five\r\nOh, oh\r\nMama told me stop playin\', playin\' all the games\r\nSteady throwin\' dollars, expectin\' change\r\nBut every war ends the same\r\nCan we just make love, not war?\r\nOh, oh\r\nCan we just make love, not war?\r\nOh, oh\r\nI solved my problems with a check\r\nNow I\'m payin\' for it\r\nYou wanted nothin\', uh\r\nNothin\' but love\r\nI can\'t lie, I\'m a mess\r\nI\'m too jealous, yes\r\nSo hard to trust you\r\nWhen I don\'t trust myself\r\nI know money can\'t buy, buy, buy your love\r\nI guess I didn\'t try, try hard enough\r\nBut we could work this like a nine-to-five\r\nOh, oh\r\nMama told me stop playin\', playin\' all the games\r\nSteady throwin\' dollars, expectin\' change\r\nBut every war ends the same\r\nCan we just make love, not war?\r\nOh, oh\r\nCan we just make love, not war?\r\nOh, oh\r\nAnd my people say\r\nOh, oh\r\nOh, oh\r\nLet\'s just trust in lovin\', baby\r\nBut, shawty, I know\r\nI know money can\'t buy, buy, buy your love\r\nI guess I didn\'t try, try hard enough\r\nCall, we could work this like a nine-to-five, five, five\r\nOh, oh, baby\r\nMama told me stop playin\', playin\' all the games (stop playin\' the games)\r\nSteady throwin\' dollars, expectin\' change\r\nBut every war ends the same\r\nCan we just make love, and not war?\r\nOh, oh, baby\r\nCan we just make love, not war?\r\nOh, oh\r\nNot war, baby', 'https://cdns-images.dzcdn.net/images/cover/353f82fb97a8aa5d0004acd60d1a420d/500x500.jpg', 'https://www.youtube.com/watch?v=fZMRc-UyPm0', NULL, 12, '03:34:00', 8.6, '2022-04-02 18:16:32'),
(9, 'A partir de hoy', 'Siempre hay alguien como tú\r\nQue te nubla la razón pero no quiere escucharte\r\nSiempre hay alguien como yo\r\nCuanto más me dicen no, más intento enamorarte\r\nTú me obligaste a soltarte\r\nY me tiraste al viento\r\nYo me obligaré a olvidarte\r\nO muero en el intento\r\nA partir de hoy\r\nLe vendaré los ojos a mi corazón\r\nNo quiero que te mire y vuelva a enamorarse\r\nY aunque duela extrañarte\r\nA partir de hoy\r\nDel cuento que escribimos borraré el final\r\nPara que nada quede de lo que juraste\r\nY aunque duela dejarte\r\nPuede que mañana sea ya tarde\r\nY ya no pueda olvidarte\r\nAunque me duela olvidarte\r\nSé que voy dejarte a partir de hoy (a partir de hoy)\r\nAunque me duela olvidarte\r\nSé que voy a dejarte a partir de hoy (a partir de hoy)\r\nMi vida entera, te prometo que a partir de hoy\r\nVoy alejarme y no escribirte como un perdedor\r\nAl fin y al cabo ya no hay nada que contarte\r\nYo ya di mi parte, y aún así no ya volverás\r\nY aunque sea difícil ya no verte más\r\nSerá por mi bien no saber dónde estás\r\nYo para tus juegos ya no estoy\r\nDe tus brazos yo me voy, por que\r\nA partir de hoy\r\nLe vendaré los ojos a mi corazón\r\nNo quiero que te mire y vuelva a enamorarse\r\nY aunque duela extrañarte (y aunque me duela el corazón, me voy)\r\nA partir de hoy\r\nDel cuento que escribimos borraré el final\r\nPara que nada quede de lo que juraste\r\nY aunque duela dejarte (y aunque me duela a mí olvidarte y dejarte)\r\nPuede que mañana sea tarde\r\nY ya no pueda olvidarte\r\nAunque me duela olvidarte\r\nSé que voy dejarte a partir de hoy (a partir de hoy)\r\nAunque me duela olvidarte\r\nSé que voy a dejarte a partir de hoy\r\nY es que para ser sincero\r\nSabes que es mentira\r\nTú siempre estarás conmigo\r\nVida de mi vida\r\nA partir de hoy\r\nLe vendare los ojos a mi corazón\r\nNo quiero que te mire y vuelva a enamorarse\r\nY aunque me duela extrañarte (y aunque me duela el corazón, me voy)\r\nA partir de hoy,\r\nDel cuento Que escribimos borrare el final\r\nPara que nada quede de lo que juraste\r\nY aunque me duela dejarte (y aunque me duela a mí olvidarte y dejarte)\r\nPuede que mañana sea tarde\r\nY ya no pueda olvidarte', 'https://geniuslyrics.net/i/bands/350/david-bisbal-en-tus-planes.jpg', 'https://www.youtube.com/watch?v=Iwz4P8HfGVM', 13, 9, '03:33:00', 8.4, '2022-04-02 18:26:29'),
(10, 'Hit the road Jack', 'Hit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nWhat you say?\r\nHit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nOld woman, old woman, don\'t treat me so mean\r\nYou\'re the meanest old woman that I\'ve ever seen\r\nI guess if you said so\r\nI\'ll have to pack my things and go (that\'s right)\r\nHit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nWhat you say?\r\nHit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nNow baby, listen baby, don\'t ya treat me this way\r\n\'Cause I\'ll be back on my feet some day\r\n(Don\'t care if you do \'cause it\'s understood)\r\n(You ain\'t got no money, you just ain\'t no good)\r\nWell, I guess if you say so\r\nI\'ll have to pack my things and go (that\'s right)\r\nHit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nWhat you say?\r\nHit the road Jack and don\'t you come back\r\nNo more, no more, no more, no more\r\nHit the road Jack and don\'t you come back no more\r\nWell (don\'t you come back no more)\r\nUh, what you say? (Don\'t you come back no more)\r\nI didn\'t understand you (don\'t you come back no more)\r\nYou can\'t mean that (don\'t you come back no more)\r\nOh, now baby, please (don\'t you come back no more)\r\nWhat you tryin\' to do to me? (Don\'t you come back no more)\r\nOh, don\'t treat me like that (don\'t you come back no more)', 'https://i.discogs.com/7Ca3auZUGZ8kl1LewTjE245Ya0Z1y7Ho1YyBO4NIldk/rs:fit/g:sm/q:90/h:599/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTMzMTU4/MjktMTYxOTc2NDU3/Ny03NDkzLmpwZWc.jpeg', 'https://www.youtube.com/watch?v=Kq80fW90laE', NULL, 4, '02:17:00', 6.7, '2022-04-02 18:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `playlista`
--

CREATE TABLE `playlista` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `opis` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `korisnik_id` int(11) DEFAULT NULL,
  `kreirano` timestamp NOT NULL DEFAULT current_timestamp(),
  `izmjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playlista`
--

INSERT INTO `playlista` (`id`, `naziv`, `opis`, `slika`, `korisnik_id`, `kreirano`, `izmjena`) VALUES
(10, 'Stipina playlista', 'Playlista prema preferenciji Stipeta.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ89Al0cmEym2vswaSswYvFTXxkUGvHV4V5Tw&usqp=CAU', 3, '2022-04-02 20:31:04', '2022-04-02 20:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `playlista_pjesma`
--

CREATE TABLE `playlista_pjesma` (
  `id` int(11) NOT NULL,
  `playlista_ID` int(11) DEFAULT NULL,
  `pjesma_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playlista_pjesma`
--

INSERT INTO `playlista_pjesma` (`id`, `playlista_ID`, `pjesma_ID`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(34, 10, 1),
(35, 10, 10),
(36, 10, 4),
(37, 10, 7),
(38, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id`, `naziv`, `promjena`) VALUES
(1, 'administrator', '2022-02-22 16:40:17'),
(2, 'registrirani', '2022-02-22 16:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  `rang` int(11) NOT NULL,
  `promjena` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id`, `naziv`, `slika`, `opis`, `rang`, `promjena`) VALUES
(1, 'Rock', 'https://upload.wikimedia.org/wikipedia/hr/7/7d/LedZeppelin1969Promo.jpg', 'Rock, skraćeno od rock and roll (često zapisano kao rock n&#039; roll ili r&#039;n&#039;r), vrsta je popularne glazbe, najčešće s vokalima, električnim i bas-gitarama, te naglašenim, jakim ritmom; u nekim podžanrovima rocka pojavljuju se i drugi instrumenti, primjerice saksofon. Kao kulturni fenomen, rock-glazba je na svijet utjecala kao nijedna druga – smatra se zaslužnom za okončavanje ratova i širenje mira i tolerancije, kao i kvarenje nevinih i širenje moralne truleži. Popularna je širom svijeta i razvila se u veliko množinu vrlo različitih stilova. Žanr rock-glazbe je širok i nije strogo definiran - naziv rock često se koristi kao skupni naziv za veći broj različitih podžanrova od metala do soula. Izraz rock&#039;n&#039;roll se češće koristi za specifičnu vrstu rocka iz 1950-ih i &#039;60-ih, a kraći rock za krovnu kategoriju. ', 3, '2022-03-31 14:59:22'),
(2, 'Pop', 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Duran_Duran_2011.jpg', 'Pop ili pop-glazba (od engleskog popular, omiljen) je vrsta glazbe koja u pravilu sadrži jednostavne, pamtljive melodije s refrenima koji lako ulaze u &quot;uho&quot;, tj. one što su lako pamtljive. Često imaju &quot;udicu&quot; - jednu ili više glazbenih, ritmičkih ili vokalnih zamisli dizajniranih da ponavljanjem zakvače slušateljevu pažnju. Pop je glazba najčešće izravno pristupačna svakome, čak i glazbenom početniku. ', 1, '2022-03-07 17:32:27'),
(3, 'Reggae', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4ZejZOT3BiVkHi7yZGrwJVIAjFiiQhOd4_g&usqp=CAU', 'Reggae je glazbeni žanr nastao na Jamajci u kasnim 1960im.  Najpoznatiji izvođač tog žanra je Bob Marley. Termin reggae se ponekad koristi u širem smislu i tada se odnosi na više vrsta jamajkanske glazbe, poput ska, dub i rocksteadyja. Reggae kao pojam u užem smislu se koristi kao specifičan naziv za određeni glazbeni stil koji je nastao razvojem rocksteadya.', 9, '2022-04-03 07:21:19'),
(4, 'Blues', 'https://upload.wikimedia.org/wikipedia/commons/7/79/Taj_Mahal_Trio_MQ2007-a.jpg', 'Blues je vokalno-instrumentalni glazbeni stil koji se temelji na uporabi &quot;plavih nota&quot; i strukturi od najčešće 12 taktova koji se ponavljaju. Pojavio se u afroameričkim zajednicama Sjedinjenih Američkih Država, a korijene vuče iz duhovne glazbe i himni, radnih i žetvenih pjesama s plantaža pamuka, improviziranog pjevanja na radu umjesto razgovora koji je robovima bio zabranjen, kao i napjeva. Uporaba &quot;plavih nota&quot; i učestalost pjevačkog obrasca poziv-odgovor u glazbi i tekstovima ukazuju na zapadnoafričke korijene bluesa. Blues je imao znatan utjecaj na kasniju američku i zapadnu popularnu glazbu, a postao je i dijelom žanrova kao što su ragtime, jazz, bluegrass, rhythm and blues, rock and roll, hip-hop i pop.', 10, '2022-03-03 21:14:52'),
(8, 'Popfolk', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Miroslav_Ilic_in_2016.jpg/220px-Miroslav_Ilic_in_2016.jpg', 'Pop-folk je glazbeni žanr nastao stapanjem klasične folk, odnosno tradicionalne glazbe s pop glazbom. To je se uradilo iz razloga da se modernizira folk glazba, da se ubace neki novi, moderni ritmovi i instrumenti, te da je ljudi više slušaju. Pop-folk glazba nije doživjela značajan procvat, niti je naročito popularna.', 6, '2022-04-02 16:50:55'),
(9, 'Latino pop', 'https://i0.wp.com/themusicalhype.com/wp-content/uploads/2018/06/15-latin-infused-latin-pop-songs.jpg?ssl=1', 'Latinski pop je podžanr pop glazbe koji je fuzija glazbene produkcije u američkom stilu s latino glazbenim žanrovima s bilo kojeg mjesta u Latinskoj Americi. Latinski pop, koji potječe od glazbenika koji govore španjolski, mogu stvarati i glazbenici na portugalskom i raznim romanskim kreolskim jezicima.', 4, '2022-04-02 16:50:55'),
(10, 'Reggaeton', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDMtD296cLtRQ4TVCJ-Y2pcda-cDyEs3EBhg&usqp=CAU', 'Reggaeton je vrsta dance glazbe, koja je postala vrlo popularna u Latinskoj Americi početkom 90-ih godina 20. stoljeća. Početkom 21. stoljeća, reggaeton se širi i na prostore Sjeverne Amerike, Europe, Azije i Australije. ', 7, '2022-04-02 16:59:24'),
(11, 'Jazz', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQF2vV4rar4VSwcvb_Wx-t9evkfeIJG4Jhtaw&usqp=CAU', 'Jazz (ili džez) je glazbeni žanr koji je nastao u afroameričkim zajednicama New Orleansa, Sjedinjenim Državama,[1] krajem 19. i početkom 20. stoljeća, a svoje je korijene povukao iz bluesa i ragtimea.[2] Od početka doba jazza u 1920-ima, jazz je postao priznat kao veliki oblik glazbenog izričaja. Zajednički smisao afroamerikanaca i euroamerikanaca za nastup i izvedbu povezao je tada neovisnu tradicionalnu i popularnu glazbu.[3] Jazz karakteriziraju swing (zamahnute) i plave note (note pjevane ili svirane za četvrt ili pola tona više ili niže od standardnih), \"razgovor\" među instrumentima, poliritmija i improvizacija. Svoje korijene vuče iz zapadnoafričke kulture i glazbe, time i afroameričke glazbene tradicije koje podrazumijevaju blues i ragtime, kao i europske vojne koračnice', 8, '2022-04-02 16:59:24'),
(12, 'Hip hop', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4gjsmVJtQS2-twpsw0q2IrfoECYW4IMhznA&usqp=CAU', 'Hip-hop glazba glazbeni je žanr nastao iz hip-hop pokreta, a čimbenici koji su utjecali na rani hip-hop su složeni i brojni. Iako se većini može uzeti korijen iz afričke kulture, multikulturalno društvo New York Cityja rezultiralo je raznim glazbenim utjecajima koji su pronalazili svoj put do hip-hop glazbe. ', 2, '2022-04-02 17:12:16'),
(13, 'Country ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8WEhyGg1BZze9ODQ1Uqntif23KYsKZdnPag&usqp=CAU', 'Country glazba, koja se još naziva i country & western glazba, je sjevernoamerički glazbeni žanr, koji je nastao početkom 20. stoljeća iz tradicionalnih elemenata narodne glazbe europskih doseljenika - osobito Iraca i Engleza. ', 5, '2022-04-02 17:12:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izvodac`
--
ALTER TABLE `izvodac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izvodac_album`
--
ALTER TABLE `izvodac_album`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `izvodac_id` (`izvodac_id`,`album_id`),
  ADD KEY `izvodac_album_album` (`album_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_ibfk_1` (`tip_korisnika_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pjesma`
--
ALTER TABLE `pjesma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pjesma_zanr` (`zanr_id`),
  ADD KEY `pjesma_album` (`album_id`);

--
-- Indexes for table `playlista`
--
ALTER TABLE `playlista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `playlista_pjesma`
--
ALTER TABLE `playlista_pjesma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlista_pjesma_pjesma` (`pjesma_ID`),
  ADD KEY `playlista_pjesma_playlista` (`playlista_ID`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `izvodac`
--
ALTER TABLE `izvodac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `izvodac_album`
--
ALTER TABLE `izvodac_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pjesma`
--
ALTER TABLE `pjesma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `playlista`
--
ALTER TABLE `playlista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `playlista_pjesma`
--
ALTER TABLE `playlista_pjesma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `izvodac_album`
--
ALTER TABLE `izvodac_album`
  ADD CONSTRAINT `izvodac_album_album` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `izvodac_album_izvodac` FOREIGN KEY (`izvodac_id`) REFERENCES `izvodac` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pjesma`
--
ALTER TABLE `pjesma`
  ADD CONSTRAINT `pjesma_album` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pjesma_zanr` FOREIGN KEY (`zanr_id`) REFERENCES `zanr` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `playlista`
--
ALTER TABLE `playlista`
  ADD CONSTRAINT `playlista_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `playlista_pjesma`
--
ALTER TABLE `playlista_pjesma`
  ADD CONSTRAINT `playlista_pjesma_pjesma` FOREIGN KEY (`pjesma_ID`) REFERENCES `pjesma` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `playlista_pjesma_playlista` FOREIGN KEY (`playlista_ID`) REFERENCES `playlista` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
