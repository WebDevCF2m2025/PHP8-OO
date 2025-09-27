-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 17 sep. 2025 à 12:50
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.3.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `testoo_1`
--
CREATE DATABASE IF NOT EXISTS `testoo_1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testoo_1`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `article_title` varchar(120) NOT NULL,
                                         `article_slug` varchar(125) NOT NULL,
                                         `article_text` text DEFAULT NULL,
                                         `article_date` timestamp NULL DEFAULT current_timestamp(),
                                         `article_visibility` tinyint(1) UNSIGNED DEFAULT 1,
                                         PRIMARY KEY (`id`),
                                         UNIQUE KEY `article_slug` (`article_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
