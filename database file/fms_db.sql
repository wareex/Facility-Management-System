-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 11:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `service` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `purpose` text NOT NULL,
  `date_req` date NOT NULL DEFAULT current_timestamp(),
  `date_end` date NOT NULL DEFAULT current_timestamp(),
  `requester` text NOT NULL,
  `UId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `phone_no`, `service`, `status`, `purpose`, `date_req`, `date_end`, `requester`, `UId`) VALUES
(1, 'Mr Lile', 90772222, 'Plumber', 1, 'to fix my toilet sink', '2023-12-18', '2023-12-19', 'Busari, Wareez Abidemi', 765),
(2, 'Mr Jimoh', 90636377, 'Electrician', 1, 'to fix my meter', '2023-12-18', '2023-12-19', 'Ibrahim, John Wale', 566),
(5, 'Mr Chatta', 2147483647, 'BrickLayer', 0, '', '2023-12-17', '2023-12-17', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `date_updated`) VALUES
(1, 'Upcoming Events', 'For the celebrant, Mr Wareez', '2023-12-17 18:32:01'),
(2, 'Notice Board', 'From the admin', '2023-12-05 14:56:24'),
(3, 'Alert', 'Urgency', '2023-12-08 16:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `topic_id`, `user_id`, `comment`, `date_created`, `date_updated`) VALUES
(11, 2, 566, 'thanks', '2023-12-11 14:58:07', '2023-12-11 16:28:35'),
(12, 1, 566, 'vibes', '2023-12-11 15:01:48', '2023-12-11 16:29:20'),
(13, 2, 1, 'dhdh', '2023-12-11 16:23:14', '2023-12-11 16:23:14'),
(14, 2, 566, 'ok', '2023-12-11 16:28:54', '2023-12-11 16:28:54'),
(15, 1, 566, 'ok', '2023-12-11 16:29:27', '2023-12-11 16:29:27'),
(16, 60, 566, 'vcgchj', '2023-12-17 10:35:17', '2023-12-17 10:35:17'),
(17, 61, 765, 'So to save you time. Let all discuss how view to the event coming up.', '2023-12-17 18:21:46', '2023-12-17 18:21:46'),
(18, 61, 1, 'Okay, Let get it over with.', '2023-12-17 18:28:07', '2023-12-17 18:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `forum_views`
--

CREATE TABLE `forum_views` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_views`
--

INSERT INTO `forum_views` (`id`, `topic_id`, `user_id`) VALUES
(19, 1, 566),
(20, 1, 0),
(21, 2, 0),
(22, 2, 1),
(23, 61, 566),
(24, 61, 1),
(25, 1, 765),
(26, 2, 765);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(30) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `typez` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `outlet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `typez`, `description`, `price`, `outlet`) VALUES
(2, '566', 'Duplex', 'Compound Before the river.', 898989, 'Rental'),
(3, '765', 'Multiple-Family Home', 'Large yard after the river.', 45000000, 'Purchase'),
(4, '899', '2-story house', 'Beside the old sugar factory.', 900000, 'Purchase'),
(10, '003', 'Multiple-Family Home', 'Front of ICT center', 909939, 'Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `reply`, `user_id`, `date_created`, `date_updated`) VALUES
(15, 11, 'sjs', 1, '2023-12-11 16:23:31', '2023-12-11 16:23:31'),
(16, 12, 'dd', 1, '2023-12-11 16:26:34', '2023-12-11 16:26:34'),
(17, 12, ' wht do u mean', 566, '2023-12-12 10:25:57', '2023-12-12 10:25:57'),
(18, 17, 'But inform us about the event first please. ', 566, '2023-12-17 18:22:50', '2023-12-17 18:22:50'),
(19, 17, 'Yeah, It&amp;#x2019;s all about professionalism achievement Celebration', 765, '2023-12-17 18:26:47', '2023-12-17 18:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Sam Nujoma Housing Estate', 'samnujoma@info.com', '+234 ', 'Abuja', '');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `job` text NOT NULL,
  `no_of_occupant` text NOT NULL,
  `house_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `job`, `no_of_occupant`, `house_id`, `status`, `date_in`) VALUES
(1, 'Adminstrator', 'admin', 'admin', 'admin@gmail.com', '7088', 'Forum Administrative Account', '3', 1, 1, '2023-11-14'),
(2, 'John', 'AdeWale', 'Ibrahim', 'john@gmail.com', '0809696965', 'Businness man', '3', 566, 1, '2023-11-14'),
(3, 'Wareez', 'Dele', 'Ismail', 'baosoriy.abdlwarith@gmail.com', '0809696965', 'Web Dev', '4', 765, 1, '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_login`
--

CREATE TABLE `tenant_login` (
  `id` int(255) NOT NULL,
  `UId` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant_login`
--

INSERT INTO `tenant_login` (`id`, `UId`, `Password`, `avatar`, `date`) VALUES
(1, '566', '827ccb0eea8a706c4c34a16891f84e7b', '1704032940_OIP.jpeg', '2023-11-22 20:34:41'),
(9, '765', '6531401f9a6807306651b87e44c05751', '1704033000_download (2).jpeg', '2023-12-17 17:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_ids`, `title`, `content`, `user_id`, `date_created`) VALUES
(1, '2', 'Admin Topic', '&lt;h2 class=&quot;oucontent-h2 oucontent-internalsection-head&quot; style=&quot;box-sizing: border-box; margin: 1em 0px 0.5em; padding: 0px; font-size: 1em; font-weight: 700; line-height: 1.2; color: rgb(0, 0, 0); clear: both; font-family: inherit !important;&quot;&gt;Email phishing&lt;/h2&gt;&lt;h5 style=&quot;margin-bottom: 0px; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; color: rgb(0, 0, 0); padding: 0px; text-align: justify;&quot;&gt;&lt;p class=&quot;oucontent-internalsection&quot; style=&quot;margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px; text-align: left;&quot;&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;The use of electronic technologies to perform phishing attacks was described in the late 1980s, but the term did not become commonplace until the mid 1990s when a program called AOHell allowed AOL users to impersonate other people (including the founder of AOL itself).&lt;/p&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;Phishing became increasingly common as more and more people connected for the first time and began receiving official looking messages that looked very much like those sent out by genuine organisations such as banks, stores and government departments. What most of these users did not realise was that not only could email addresses be faked, but that electronic data can be easily copied &ndash; just because an email claims to come from your bank and has your bank&rsquo;s logo doesn&rsquo;t mean that it is genuine.&lt;/p&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;Phishing emails may be indiscriminate. A phisher will create an email asking the user to get in touch with a bank or credit card company claiming that there is a problem with the account or that the bank may have lost some money. These sorts of messages make people justifiably worried and more likely to follow the instruction. The phisher will then include some plausible looking details such as the bank&rsquo;s logo and address and then send it to millions of individuals. Among all the recipients, a few people will have accounts with that bank and will click the link in the message, or telephone a number, which will begin the process of eliciting further personal information.&lt;/p&gt;&lt;/p&gt;&lt;/h5&gt;&lt;h2 class=&quot;oucontent-h2 oucontent-internalsection-head&quot; style=&quot;margin-top: 1em; margin-bottom: 0.5em; padding: 0px; font-size: 1em; font-weight: 700; color: rgb(0, 0, 0); clear: both; font-family: inherit !important;&quot;&gt;What to do&lt;/h2&gt;&lt;h5 style=&quot;margin-bottom: 0px; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; color: rgb(0, 0, 0); padding: 0px; text-align: justify;&quot;&gt;&lt;p class=&quot;oucontent-internalsection&quot; style=&quot;margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px; text-align: left;&quot;&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;If you do receive an email that worries you from an organisation such as a bank or shop that you use, do not click on or follow the links in the message. Get in touch with their customer services department, or log in to your account through their website. Type in their web address or use the address in your list of favourite sites, or use their published phone number. Most organisations will have a published policy of not asking for sensitive information such as your password through email or over the phone so you should be suspicious of anything that contravenes this policy.&lt;/p&gt;&lt;/p&gt;&lt;/h5&gt;&lt;h2 class=&quot;oucontent-h2 oucontent-internalsection-head&quot; style=&quot;margin-top: 1em; margin-bottom: 0.5em; padding: 0px; font-size: 1em; font-weight: 700; color: rgb(0, 0, 0); clear: both; font-family: inherit !important;&quot;&gt;Social media phishing&lt;/h2&gt;&lt;h5 style=&quot;margin-bottom: 0px; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; color: rgb(0, 0, 0); padding: 0px; text-align: justify;&quot;&gt;&lt;p class=&quot;oucontent-internalsection&quot; style=&quot;margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px; text-align: left;&quot;&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;Although email still accounts for the majority of phishing attacks, the technique is also used in social media sites as well as in text messages. The same rules apply &ndash; if in doubt, go to the official site and make contact with the company through their published links.&lt;/p&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;As we saw in the first week of the course, phishing can sometimes be targeted at individuals or specific parts of an organisation. These attacks, commonly called a &lsquo;spear phishing attack&rsquo;, will depend on detailed information about the target. For example, an attacker might use information gleaned from recent emails to craft a plausible reply that appears to come from colleagues of the targeted user.&lt;/p&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word;&quot;&gt;Attackers may also include links to malware-infected software in personal messages posted in social media. This is especially common after major disasters or during fast-breaking news when people are likely to click on interesting looking links without thinking carefully.&lt;/p&gt;&lt;/p&gt;&lt;/h5&gt;', 1, '2020-10-16 12:25:14'),
(2, '3,2', 'Happenings in the community ', '&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px;&quot;&gt;Phishing is any attempt by attackers to steal valuable information by pretending to be a trustworthy party &ndash; a form of social engineering attack.&lt;/p&gt;&lt;p style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px;&quot;&gt;So, an attacker might impersonate a bank to obtain credit card numbers or bank account details. It gets its name from &lsquo;fishing&rsquo; &ndash; as in &lsquo;fishing for information&rsquo;, the process of luring people to disclose confidential information.&lt;/p&gt;&lt;p id=&quot;yui_3_17_2_1_1701784082884_46&quot; style=&quot;margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; overflow-wrap: break-word; color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: 16px;&quot;&gt;Phishing relies on people trusting official looking messages, or conversations with apparently authoritative individuals, as being genuine. It is widespread and it can be enormously costly to people who find their bank accounts emptied, credit references destroyed or lose personal or sensitive information.&lt;/p&gt;', 566, '2023-12-05 14:48:59'),
(61, '2', 'The Result of the last community meeting', 'CURRICULUM VITAE\r\nAbout Me:\r\nWith over 15 years of experience as a Digital Forensic Investigator, I have dedicated my career to uncovering digital evidence and bringing criminals to justice. At GRP3 FORENSICS SERVICES INC., I lead a team of experts in the field, using cutting-edge technology and innovative techniques to solve even the most complex cases. My goal is to make the digital world a safer place for all.\r\n', 765, '2023-12-17 18:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utility_bill`
--

CREATE TABLE `utility_bill` (
  `id` int(255) NOT NULL,
  `UId` int(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `item_type` varchar(100) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `amountpayable` double(10,2) DEFAULT NULL,
  `pay` double(10,2) DEFAULT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=active',
  `date` datetime DEFAULT current_timestamp(),
  `trans_id` varchar(200) NOT NULL,
  `details` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utility_bill`
--

INSERT INTO `utility_bill` (`id`, `UId`, `duration`, `item_type`, `item`, `amountpayable`, `pay`, `balance`, `status`, `date`, `trans_id`, `details`) VALUES
(79, 566, '', 'AEDC', 'Elcetricity Bill', 29500.00, 7866.00, 21634.00, 1, '2023-12-30 02:32:16', 'tr09977867566Dec 30, 2023', 9977867),
(80, 566, '', 'Monthly Package', 'Waste Bill', 29500.00, 5000.00, 0.00, 1, '2023-12-30 02:33:02', 'tr5662432566Dec 30, 2023', 5662432),
(81, 765, 'Monthly Sub', 'DSTV', 'TV Subscription', 29500.00, 12000.00, 0.00, 1, '2023-12-30 02:33:59', 'tr09867575765Dec 30, 2023', 9867575),
(82, 765, 'Monthly Subs', '9Mobile', 'Internet Subscription', 29500.00, 15050.00, 0.00, 1, '2023-12-30 02:34:35', 'tr0907556464765Dec 30, 2023', 907556464);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_login`
--
ALTER TABLE `tenant_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_bill`
--
ALTER TABLE `utility_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `item_2` (`item`),
  ADD KEY `item_3` (`item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forum_views`
--
ALTER TABLE `forum_views`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tenant_login`
--
ALTER TABLE `tenant_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utility_bill`
--
ALTER TABLE `utility_bill`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
