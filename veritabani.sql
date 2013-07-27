-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Anamakine: localhost
-- Üretim Zamanı: 15 Şubat 2008 saat 15:25:18
-- Sunucu sürümü: 5.0.41
-- PHP Sürümü: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Veritabanı: `ytelefon`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `bilgiler`
-- 

CREATE TABLE `bilgiler` (
  `no` int(11) NOT NULL auto_increment,
  `isim` varchar(150) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `ev` varchar(15) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;