-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`) VALUES
(1, 'ivan ', '11221', 'mulisaivan4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `DateOfBirth` date DEFAULT NULL,
  `Names` varchar(255) NOT NULL,
  `Rank` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Medication` varchar(100) DEFAULT NULL,
  `disease` varchar(50) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`DateOfBirth`, `Names`, `Rank`, `Unit`, `Gender`, `Medication`, `disease`, `dates`, `id`) VALUES
('0000-00-00', 'MULISA', 'capt', 'airforce', 'M', 'knee surgery', 'broken arm', '0000-00-00', 8),
('0000-00-00', 'RUGIRANGOGA', 'MAJ', 'SOF', 'M', 'knee surgery', 'broken leg', '0000-00-00', 10),
('0000-00-00', 'NIYIGENA', 'capt', 'infantry', 'M', 'armband', 'broken arm', '0000-00-00', 11),
('1975-04-07', 'KAMIKAZI', 'MAJ', 'SOF', 'F', 'surgery', 'knee', '2024-01-01', 12),
('1975-04-05', 'phonah', 'colonel', 'artillery', 'F', 'surgery', 'asthma', '2024-06-04', 14),
('1975-04-05', 'phonah', 'colonel', 'artillery', 'F', 'surgery', 'asthma', '2024-06-04', 15);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `dates`, `email`) VALUES
(5, 'ubuzima', 'abarwayi ba hepatitB batangiye kwitabwaho', '2024-01-04 18:27:17', 'mulisaivan4@gmail.com'),
(6, 'ubuzima', 'abarwayi ba hepatitB batangiye kwitabwaho', '2024-01-04 18:31:04', 'mulisaivan4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `retires`
--

CREATE TABLE `retires` (
  `id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `rank` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `armynumber` varchar(20) DEFAULT NULL,
  `deceased` tinyint(1) NOT NULL DEFAULT 0,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retires`
--

INSERT INTO `retires` (`id`, `dob`, `firstname`, `lastname`, `rank`, `unit`, `email`, `phone`, `gender`, `armynumber`, `deceased`, `active`) VALUES
(6, '2023-12-05', 'niyigena', 'abel', 'MAJ', 'infantry', 'niyigena4@gmail.com', '078656787854', 'M', '123456', 0, 1),
(10, '2023-12-31', 'mutamba', 'debz', 'lt colonel', 'Republican Guard', 'debz8@gmail.com', '078656787456', 'F', '456789', 0, 1),
(11, '2024-01-02', 'kanyana', 'phio', 'MAJ', 'SOF', 'phio3@gmail.com', '078656787884', 'F', '78743', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `date`, `title`, `description`, `category`, `photo`, `active`) VALUES
(2, '2023-12-18', 'amashuri', 'hatangiye kubakwa amashuri mashya muturere dutandukanye twigihug', 'Programming', 0x6372372e6a7067, 0),
(3, '2023-12-05', 'ikoranabuhanga', 'hatangijwe umushinga mushya wo koroshya serivise za rwanda air ', 'Design', 0x64642e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `description`, `date`, `author`, `photo`) VALUES
(75, 'ikoranabuhanga ', 'hatangijwe kumugaragaro uburyo bushyashya bwo gushyira muri system abaturage', '2024-01-09', 'karabure', 0x70686f746f),
(76, 'promotion', 'hatanzwe amapetii kubasirikare batandukanye mubyiciro byose bya gisirikare u Rwanda', '2024-01-10', 'janvie\r\n', 0x70686f746f),
(79, 'Announcement', 'itangazo riamagarira abasore ninkumi bafite ubushake bwo gukorera igihugu binyuze mungabo zu Rwanda kwiyandikisha ni kuturere batuyemo', '2024-01-07', 'Abel', 0x70686f746f),
(81, 'Announcement', 'itangazo riamagarira abasore ninkumi bafite ubushake bwo gukorera igihugu binyuze mungabo zu Rwanda kwiyandikisha ni kuturere batuyemo', '2024-01-07', 'author', 0x70686f746f);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`) VALUES
(12, 'mugabo12', '11441', 'mulisaivan4@gmail.com', 'MUGABO', 'Ivan'),
(13, 'gashai11', '11551', 'mulisaivan4@gmail.com', 'GASHAIJA', 'James'),
(14, 'yallah', '11111', 'mulisaivan4@gmail.com', 'mubi', 'cyane'),
(15, 'mulisa2', '11441', 'mulisaivan4@gmail.com', 'MULISA', 'Ivan'),
(16, 'ronsarb', '11111', 'ronsard5@gmail.com', 'RUGIRANGOGA ', 'ronsard'),
(17, 'kevin11', '11221', 'kevin7@gmail.com', 'NIYONSENGA', 'kevin'),
(18, 'mukunzi44', '11177', 'mukunzi8@gmail.com', 'MUKUNZI ', 'sam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retires`
--
ALTER TABLE `retires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `retires`
--
ALTER TABLE `retires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
