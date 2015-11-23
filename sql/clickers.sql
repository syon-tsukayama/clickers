-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 6 朁E09 日 16:54
-- サーバのバージョン： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clickers`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answer_results`
--

CREATE TABLE IF NOT EXISTS `answer_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- テーブルのデータのダンプ `answer_results`
--

INSERT INTO `answer_results` (`id`, `question_id`, `answer_id`, `user_id`, `created`, `updated`) VALUES
(1, 1, 3, 100, '2015-05-27 16:42:43', '2015-05-27 16:42:43'),
(2, 2, 4, 100, '2015-05-27 16:43:03', '2015-05-27 16:43:03'),
(3, 1, 4, 1, '2015-05-27 16:50:58', '2015-05-27 16:50:58'),
(4, 1, 4, 1, '2015-06-09 09:02:36', '2015-06-09 09:02:36'),
(5, 1, 4, 1, '2015-06-09 13:48:55', '2015-06-09 13:48:55'),
(6, 2, 2, 1, '2015-06-09 13:52:17', '2015-06-09 13:52:17'),
(7, 2, 3, 1, '2015-06-09 13:52:40', '2015-06-09 13:52:40'),
(8, 2, 1, 1, '2015-06-09 13:52:59', '2015-06-09 13:52:59'),
(9, 1, 1, 1, '2015-06-09 13:53:05', '2015-06-09 13:53:05'),
(10, 2, 4, 1, '2015-06-09 13:53:12', '2015-06-09 13:53:12'),
(11, 1, 2, 1, '2015-06-09 13:53:55', '2015-06-09 13:53:55'),
(12, 1, 1, 1, '2015-06-09 14:41:26', '2015-06-09 14:41:26'),
(13, 1, 4, 2, '2015-06-09 15:00:50', '2015-06-09 15:00:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` varchar(255) NOT NULL,
  `answer_3` varchar(255) NOT NULL,
  `answer_4` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`id`, `name`, `content`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `created`, `updated`) VALUES
(1, 'りんごのいろ', 'りんごのいろは、何色ですか？', '赤', '青', '緑', '黄', '2015-05-27 09:46:01', '2015-05-27 09:46:01'),
(2, 'みかんの味', 'ミカンの味', 'すっぱい', 'あまい', 'からい', 'のがい', '2015-05-27 09:47:03', '2015-05-27 09:47:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `updated`) VALUES
(1, 'user_1', '1111', '2015-05-27 13:05:26', '2015-05-27 13:05:26'),
(2, 'user_2', '1111', '2015-05-27 13:06:19', '2015-05-27 13:06:19'),
(3, 'user_3', '1111', '2015-05-27 13:06:46', '2015-05-27 13:06:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
