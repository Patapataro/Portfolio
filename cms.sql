-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 03:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Creativity'),
(2, 'Entrepreneurship'),
(5, 'Science'),
(6, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(44, 108, 'Aron Swihart', 'AronSwihart@gmail.com', 'Thank you, this helped me improve my photo quality in half the time.', 'approved', '2018-10-25'),
(45, 107, 'Delphine Torrence ', 'DelphineTorrence@gmail.com', 'Can you make a Post on the Top online Markets?', 'approved', '2018-10-25'),
(46, 104, 'Aron Swihart Â ', 'AronSwihart@gmail.com', 'Wow my Desk is still dirty.', 'approved', '2018-10-25'),
(47, 104, 'EveliaPenrose ', 'EveliaPenrose@gmail.com', 'I like your desk lamp, where can I get one like that?', 'approved', '2018-10-25'),
(48, 100, 'NuSand Â ', 'NuSand@gmail.com', 'Beer Pong is a great team building exercise.', 'approved', '2018-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(98, 6, 'Being an Electrical Engineer', 'MicaErnest', '', '2018-10-25', 'board.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sodales orci in ultricies congue. Fusce aliquam enim ac ante consequat molestie. Praesent elit urna, suscipit a viverra in, tempus et lacus. Donec in justo et eros malesuada volutpat. Praesent vel ligula vulputate, rutrum mauris vitae, tempor nisl. Vivamus ut cursus dui. Etiam malesuada enim sapien, id fermentum ipsum egestas at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis et velit consectetur, hendrerit lorem sed, bibendum tellus. Aenean gravida cursus dui, ac congue purus. Nulla volutpat volutpat odio quis aliquam. Nullam hendrerit ex ac imperdiet sagittis. Donec sit.', 'Science, Electrical Engineer, Tech', 0, 'published', 2),
(99, 1, 'Best Ways to Brainstorm', 'AnnieRiehl Â ', '', '2018-10-25', 'brain.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.', 'Creativity, Brainstorm, Thinking, ideas', 0, 'published', 12),
(100, 2, 'Useful Ways to Collaborate With Your Team', 'JoanaReif Â ', '', '2018-10-25', 'collab.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.', 'Entrepreneurship, Team, Building, office, work, project,  ', 0, 'published', 8),
(101, 6, 'Where is VR Headed ', 'MarileeNey ', '', '2018-10-26', 'close-up-computer.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.\r\n\r\nAliquam quis cursus nisi. Suspendisse sit amet lacus venenatis, consequat augue a, aliquam nulla. Donec turpis metus, dapibus sed vestibulum ac, hendrerit ac velit. Donec feugiat sapien vitae volutpat condimentum. Praesent lacus dui, tempor vitae suscipit in, dictum eu lacus. Vestibulum at sapien libero. Ut ligula tortor, dignissim molestie consequat ac, tristique eu tortor. Aenean hendrerit pellentesque libero, vel dignissim eros egestas non. Maecenas pellentesque fringilla ipsum. Integer tristique nec nisi sit amet auctor. Aliquam pretium pharetra erat. Mauris maximus id sem a sollicitudin. Phasellus mauris felis, tempor pharetra tempor scelerisque, rhoncus vel lectus. Sed porta diam dui, sed finibus erat pellentesque ut. Maecenas vestibulum diam vitae dignissim placerat. Sed luctus quam elit, sed vestibulum ligula vestibulum quis.', 'Technology, science, gaming, VR, VIrtual Reality', 0, 'published', 2),
(102, 1, 'How to Boost your Creative Design', 'VinceHutchinson ', '', '2018-10-25', 'creative.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\n', 'Creativity, Design, Boost, art, ', 0, 'published', 4),
(103, 5, 'Advances in Data Science', 'SherleneMcmaster ', '', '2018-10-26', 'data.jpg', 'Lorem Ipsum\r\n\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.\r\n\r\nAliquam quis cursus nisi. Suspendisse sit amet lacus venenatis, consequat augue a, aliquam nulla. Donec turpis metus, dapibus sed vestibulum ac, hendrerit ac velit. Donec feugiat sapien vitae volutpat condimentum. Praesent lacus dui, tempor vitae suscipit in, dictum eu lacus. Vestibulum at sapien libero. Ut ligula tortor, dignissim molestie consequat ac, tristique eu tortor. Aenean hendrerit pellentesque libero, vel dignissim eros egestas non. Maecenas pellentesque fringilla ipsum. Integer tristique nec nisi sit amet auctor. Aliquam pretium pharetra erat. Mauris maximus id sem a sollicitudin. Phasellus mauris felis, tempor pharetra tempor scelerisque, rhoncus vel lectus. Sed porta diam dui, sed finibus erat pellentesque ut. Maecenas vestibulum diam vitae dignissim placerat. Sed luctus quam elit, sed vestibulum ligula vestibulum quis.', 'Data, Science, Technology, Future, Advances', 0, 'published', 0),
(104, 1, 'Neat ways to Organize your Desk', 'TarynAnastasio', '', '2018-10-26', 'desk.jpg', 'Donec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.\r\n\r\nAliquam quis cursus nisi. Suspendisse sit amet lacus venenatis, consequat augue a, aliquam nulla. Donec turpis metus, dapibus sed vestibulum ac, hendrerit ac velit. Donec feugiat sapien vitae volutpat condimentum. Praesent lacus dui, tempor vitae suscipit in, dictum eu lacus. Vestibulum at sapien libero. Ut ligula tortor, dignissim molestie consequat ac, tristique eu tortor. Aenean hendrerit pellentesque libero, vel dignissim eros egestas non. Maecenas pellentesque fringilla ipsum. Integer tristique nec nisi sit amet auctor. Aliquam pretium pharetra erat. Mauris maximus id sem a sollicitudin. Phasellus mauris felis, tempor pharetra tempor scelerisque, rhoncus vel lectus. Sed porta diam dui, sed finibus erat pellentesque ut. Maecenas vestibulum diam vitae dignissim placerat. Sed luctus quam elit, sed vestibulum ligula vestibulum quis.', 'Organize, Desk, Computer, Creativity', 0, 'published', 8),
(105, 6, 'The Future of Gaming', 'JerrodSontag Â ', '', '2018-10-26', 'future.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.\r\n\r\nAliquam quis cursus nisi. Suspendisse sit amet lacus venenatis, consequat augue a, aliquam nulla. Donec turpis metus, dapibus sed vestibulum ac, hendrerit ac velit. Donec feugiat sapien vitae volutpat condimentum. Praesent lacus dui, tempor vitae suscipit in, dictum eu lacus. Vestibulum at sapien libero. Ut ligula tortor, dignissim molestie consequat ac, tristique eu tortor. Aenean hendrerit pellentesque libero, vel dignissim eros egestas non. Maecenas pellentesque fringilla ipsum. Integer tri', 'Gaming, Future, Science, Technology', 0, 'published', 0),
(106, 1, 'New SEO Online Marketing Strategies ', 'OctaviaMaxim ', '', '2018-10-25', 'market.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.', 'SEO, Online, Marketing, Strategies', 0, 'draft', 6),
(107, 2, 'How to become an Entrepreneur', 'MicaErnest', '', '2018-10-25', 'owner.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.', 'Entrepreneur', 0, 'published', 8),
(108, 1, 'How to Capture the Perfect Photo for your Design', 'AnnieRiehl Â ', '', '2018-10-26', 'photo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum mi non enim finibus, et lobortis turpis tincidunt. Nullam tempus ultrices eros ut facilisis. Suspendisse scelerisque magna nisl, ut aliquet nisi facilisis a. Aliquam odio justo, placerat et ultrices a, vehicula vitae diam. Pellentesque vel purus id urna consequat sodales. Curabitur lectus leo, viverra vel mi id, mollis vehicula lectus. Praesent egestas nisl non ultrices luctus. Curabitur posuere dolor massa, quis ullamcorper elit placerat et. Sed ullamcorper orci ut est laoreet scelerisque. Praesent tempus eu sem at blandit. Sed interdum ante a lacus ultricies, nec fringilla erat imperdiet. In non lacus felis. Aliquam erat volutpat. Ut tempor libero ut nulla pellentesque vestibulum. In pharetra metus eget est tincidunt feugiat.\r\n\r\nMaecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.', 'Design, Photos, Pictures', 0, 'published', 4),
(109, 5, 'R&D Advances that Will Affect you', 'MarileeNey ', '', '2018-10-25', 'rnd.jpg', 'Maecenas vitae sapien ac purus volutpat tincidunt eu sit amet sapien. Morbi hendrerit purus nulla, id hendrerit elit aliquam vel. Fusce tempor lorem ultricies risus congue cursus. Sed a suscipit purus, volutpat tincidunt ante. Vestibulum eu enim ut sem aliquet placerat tincidunt vel est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus et diam sit amet ullamcorper.\r\n\r\nDonec vel tortor vel eros consectetur consequat. Suspendisse commodo odio vitae pretium faucibus. Nullam gravida velit id sapien mollis, at congue eros mollis. Nunc ultricies ipsum id accumsan feugiat. Vivamus lorem risus, ultrices a eleifend ornare, vulputate at ipsum. Morbi commodo neque et ex sodales laoreet. Aenean tempor consectetur nisi id aliquam. Aliquam tempus sodales ultrices. Praesent iaculis orci risus, sed pellentesque dolor lobortis ac. Praesent id tellus finibus, euismod lacus vitae, ultricies orci.\r\n\r\nMaecenas bibendum, eros interdum pellentesque mollis, purus metus ultricies urna, at suscipit urna ligula non nibh. Maecenas a neque consequat, laoreet nunc in, venenatis dolor. Fusce hendrerit condimentum odio sed imperdiet. Aliquam posuere leo urna, vitae facilisis sapien accumsan a. Curabitur non enim ante. Curabitur vel augue nibh. Nam placerat, tortor nec eleifend egestas, leo urna porta leo, eu laoreet mauris dolor at purus. Vestibulum quis nulla diam. Sed ac leo mollis, mattis nulla id, auctor ex. Fusce ornare, metus vitae pulvinar fermentum, sem nunc commodo turpis, sit amet finibus orci ante ut lorem. Nulla massa risus, aliquet vitae risus a, volutpat efficitur ante.\r\n\r\nAliquam quis cursus nisi. Suspendisse sit amet lacus venenatis, consequat augue a, aliquam nulla. Donec turpis metus, dapibus sed vestibulum ac, hendrerit ac velit. Donec feugiat sapien vitae volutpat condimentum. Praesent lacus dui, tempor vitae suscipit in, dictum eu lacus. Vestibulum at sapien libero. Ut ligula tortor, dignissim molestie consequat ac, tristique eu tortor. Aenean hendrerit pellentesque libero, vel dignissim eros egestas non. Maecenas pellentesque fringilla ipsum. Integer tristique nec nisi sit amet auctor. Aliquam pretium pharetra erat. Mauris maximus id sem a sollicitudin. Phasellus mauris felis, tempor pharetra tempor scelerisque, rhoncus vel lectus. Sed porta diam dui, sed finibus erat pellentesque ut. Maecenas vestibulum diam vitae dignissim placerat. Sed luctus quam elit, sed vestibulum ligula vestibulum quis.', 'R&D, Advances, Future', 0, 'published', 6),
(110, 2, 'Lorem ', 'pat', '', '2018-11-02', 'download.jpg', 'This is a Test!', 'Delete Me!', 0, 'published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'rico', '$1$9cPKUDfS$nrxN1D6u1ubUOFdXyuAme1', 'Rico', 'Suave', 'ricosuave@gmail.com', '', 'admin', ''),
(36, 'pat', '$2y$10$kuvWbn0N4OQBwcS5bD7TB.cmpRlUHeT48lqejD/tLOaSnQU4e9qq.', 'Patrick', 'Flores', 'Patrick@ymail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(43, 'MicaErnest', '$2y$10$bnhjZEas2sNB5pbrEtjMau7DxDjg2bl2AQ25oZwbcXGdR9pAR6C1i', 'Mica', 'Ernest', 'MicaErnest@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(44, 'AnnieRiehl Â ', '$2y$10$09frbC7jlTMp4JpqnKay6.phlkc5G6rSLFo7kKkoWzbl7wNZTW1AW', 'Annie', 'Riehl Â ', 'AnnieRiehl@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(45, 'JoanaReif Â ', '$2y$10$9jJhQ8ggT/IGIzZuvu9jeuUGNepFoHY.oOx3fAN61XPulVsJUg83K', 'Joana  Â ', 'Reif Â ', 'JoanaReif@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(46, 'MarileeNey ', '$2y$10$nuGZVtfi4CcZmYtWK8cB7uhp2Sl0mL/ThHMbS40et4TPgNM2Tl2XS', 'Marilee  ', 'Ney ', 'MarileeNey@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(47, 'VinceHutchinson ', '$2y$10$2rJQBU64aabdGYw3F239kO1PcZgRTRd7DMHfyZjnMYGGUrZiCBNmq', 'Vince ', 'Hutchinson ', 'VinceHutchinson@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(48, 'SherleneMcmaster ', '$2y$10$1GouUXZUoWxqNkpfJUFRfeR5my/y6bDW3qAJdmCVur.xpUu8Ewr.G', 'Sherlene ', 'Mcmaster ', 'SherleneMcmaster@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(49, 'TarynAnastasio', '$2y$10$hqg9bnCB1/4T536va4hx4OOlICM9mkP6bcZYYIDmMTcp3fHXeHupu', 'Taryn', 'Anastasio', 'TarynAnastasio@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(50, 'JerrodSontag Â ', '$2y$10$ZL3I8LnWx0j8LAcow4Rs/O2GroA0oK3G2iUf0cENqRUwfTN6802x.', 'Jerrod Â ', 'Sontag Â ', 'JerrodSontag@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(51, 'OctaviaMaxim ', '$2y$10$h/Kd/DsjLjmQxCzzYnlIpOaXXaSVTnSvRXDamWoZ05yPQw8SbFHuy', 'Octavia ', 'Maxim ', 'OctaviaMaxim@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'bdfooln794klnalttdi178r1iq', 1524463820),
(2, 'ruro9hl851ho7m7uvu33glg92p', 1524451586),
(3, '6h6gukntolg0lvj14dfo6pnfss', 1524459482),
(4, 'vfgebkgcn9ljqc6r2u90kn66ph', 1525222647),
(5, 'o64t182sgr6n14n4oujfcpuk7l', 1526837289),
(6, 'pvrfrurebj0kj2vi9euru5ifbd', 1526862765),
(7, 'kqsdrgiv1t0nuovlnkc514n3fo', 1528454706),
(8, 'l04adpg0b4qf0i236tk955fu85', 1530115316),
(9, '4d22d4b74jl1mb9tiqv928855i', 1530805523),
(10, 'nivsoansiin7a2avsp2jl81r15', 1531199198),
(11, '8i4h316fer1qb03ckg8ch32p3t', 1533324759);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
