-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2024, 02:49:49
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hospital`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `appointment_city` varchar(255) DEFAULT NULL,
  `appointment_hospital` varchar(255) DEFAULT NULL,
  `appointment_doctor_id` int(11) DEFAULT NULL,
  `appointment_profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `appointment_date`, `appointment_city`, `appointment_hospital`, `appointment_doctor_id`, `appointment_profession`) VALUES
(20, 123123, '2024-05-24 00:00:00', 'Ağrı', 'Acıbadem Hastanesi', 1903, 'Eye Diseases'),
(21, 123123, '2024-05-24 00:00:00', 'Kocaeli', 'Hospital', 123456789, 'Eye Diseases'),
(22, 123456789, '2024-05-12 00:00:00', 'İzmir', 'Hospital', 11555, 'Orthopedics'),
(24, 3131, '2024-05-24 00:00:00', 'Konya', 'Acıbadem Hastanesi', 123456789, 'Eye Diseases'),
(28, 3131, '2024-05-11 00:00:00', 'Ağrı', 'Medipol Hospital', 39849230, 'Orthopedics'),
(29, 3131, '2024-05-26 00:00:00', 'Adıyaman', 'Akdamar Hospital', 39849230, 'Eye Diseases'),
(30, 3131, '2024-05-24 00:00:00', 'Kocaeli', 'Kocaeli University Hospital', 3801471, 'Orthopedics'),
(32, 123456789, '0000-00-00 00:00:00', 'Amasya', 'Akdamar Hospital', 39849230, 'Ear Nose Throat'),
(35, 123456789, '2024-05-24 00:00:00', 'Kocaeli', 'Kocaeli University Hospital', 49232704, 'Psychiatry'),
(36, 12345, '2024-06-08 00:00:00', 'Adana', 'Acıbadem Hospital', 39849230, 'Eye Diseases');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name_surname` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `doctor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `name_surname`, `birth_date`, `gender`, `profession`, `hospital`, `doctor_password`) VALUES
(1, 123456789, 'Yusuf Karakurt', '2024-05-21', 'male', 'internal_medicine', 'acibadem_hospital', '123123'),
(2, 2147483647, 'Mustafa Gündoğu', '2002-03-08', 'female', 'internal_medicine', 'acibadem_hospital', 'mustafa123'),
(3, 1903, 'Ersin Vurgan', '2003-01-24', 'male', 'ear_nose_throat', 'akdamar_hospital', '1903'),
(4, 11555, 'Sinem', '2003-06-01', 'female', 'internal_medicine', 'acibadem_hospital', 'kedi'),
(12, 3842942, 'Fırat Kaya', '2024-05-02', 'male', 'İnternal Medicine', 'Acıbadem Hospital', '9391'),
(13, 3784014, 'Can Demir', '1991-12-12', 'male', 'Dermatology', 'Okan Hospital', '327481374'),
(14, 37841394, 'Damla', '1997-07-10', 'female', 'Dentistry', 'Konak Hospital', 'u280572054'),
(15, 3801471, 'Deva Ayan', '1995-10-12', 'female', 'Plastic Surgery', 'Koç Hospital', '3849104'),
(16, 7931070, 'Merve Efe', '1996-06-12', 'female', 'Orthopedics', 'Kocaeli University Hospital', '38147140'),
(17, 3349810, 'Efkan Kalaycı', '1993-05-13', 'male', 'Orthopedics', 'Kocaeli University Hospital', '3809111'),
(18, 389910, 'Büşra Özütok', '1997-10-16', 'female', 'Ear Nose Throat', 'Acıbadem Hospital', '8439081'),
(19, 380171134, 'Amil Özütok', '1991-12-04', 'male', 'Dermatology', 'Acıbadem Hospital', '437897419'),
(20, 839014921, 'Yakub Özkaya', '1998-10-16', 'male', 'İnternal Medicine', 'Koç Hospital', '38249142'),
(21, 39849230, 'Oğulcan Yılmaz', '1997-11-12', 'male', 'Ear Nose Throat', 'Koç Hospital', '84398041'),
(23, 49232704, 'Emir Tavşan', '1997-03-13', 'male', 'Dentistry', 'Hayat Hospital', '73842704024'),
(24, 793489341, 'Arda Aslan', '1995-06-14', 'male', 'Orthopedics', 'Hayat Hospital', '34281901');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `manager_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `managers`
--

INSERT INTO `managers` (`id`, `manager_id`, `name_surname`, `gender`, `birth_date`, `manager_password`) VALUES
(1, 123456789, 'Yusuf Karakurt', 'male', '1903-03-19', '123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `medical_reports`
--

CREATE TABLE `medical_reports` (
  `report_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL,
  `report_description` text NOT NULL,
  `report_title` varchar(255) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `medical_reports`
--

INSERT INTO `medical_reports` (`report_id`, `report_date`, `report_description`, `report_title`, `report_name`) VALUES
(37, '2024-05-18 20:50:31', 'Doktor tarafından incelenmesi istenildi.', 'Röntgen', '2674248686.jpg'),
(38, '2024-05-18 20:51:30', '3 tane kırık tespit edildi.', 'Röntgen', '1289248755.jpg'),
(39, '2024-05-18 20:56:38', 'Doktor tarafından acil çekilmesi istenildi.', 'Röntgen', '4150039699.jpg'),
(40, '2024-05-20 16:19:15', 'rapor', 'rapor', '4526020604.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `name_surname` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `patient_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `name_surname`, `birth_date`, `gender`, `phone_number`, `address`, `patient_password`) VALUES
(1, 123456789, 'Yusuf', '2000-09-11', 'male', '5521115566', 'Kocaeli', '123123'),
(2, 123123, 'Cenk Tosun', '1988-01-20', 'female', '05524367236', 'İstanbul/Beşiktaş', '1903'),
(5, 111, 'Abdullah', '2002-03-13', 'male', '05551112233', 'Kocaeli İzmit', '111'),
(7, 3131, 'Ali Bayrak', '2000-08-28', 'male', '5456996462', 'Kocaeli İzmit', '13579'),
(9, 90909090, 'Fatih', '2024-05-24', 'male', '05421112233', 'Kocaeli İzmit', '90909090');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Tablo için indeksler `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_id` (`doctor_id`);

--
-- Tablo için indeksler `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `medical_reports`
--
ALTER TABLE `medical_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Tablo için indeksler `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `medical_reports`
--
ALTER TABLE `medical_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
