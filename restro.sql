-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 29, 2023 at 10:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restro`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `booking_user_id` int(11) NOT NULL,
  `booking_res_id` int(11) NOT NULL,
  `booking_res_owner_id` int(11) NOT NULL,
  `booking_phone` bigint(255) NOT NULL,
  `booking_childs` int(11) NOT NULL,
  `booking_adults` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_user_id`, `booking_res_id`, `booking_res_owner_id`, `booking_phone`, `booking_childs`, `booking_adults`, `booking_date`, `booking_type`, `created_at`, `updated_at`) VALUES
(18, 2, 3, 3, 8967392427, 2, 6, '2023-08-31', 'Dinner', '2023-08-28 07:22:55', '2023-08-28 07:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_16_141111_create_resturants_table', 2),
(6, '2023_08_21_085200_add_fields_to_users', 3),
(7, '2023_08_21_090241_create_users_table', 4),
(8, '2023_08_23_151424_create_bookings_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resturants`
--

CREATE TABLE `resturants` (
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `res_user_id` int(11) NOT NULL,
  `res_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_price` decimal(5,2) NOT NULL,
  `res_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturants`
--

INSERT INTO `resturants` (`res_id`, `res_user_id`, `res_name`, `res_address`, `res_description`, `res_price`, `res_image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Taniya Hotel', 'Gangarampur Bus Stand, Dakshin Dinajpur', 'Can be booked for lunch and dinner', '999.99', '', NULL, NULL),
(2, 3, 'Laban Hotel', 'Gangarampur Bus Stand, Dakshin Dinajpur', 'Take any types of order', '501.00', '', NULL, NULL),
(3, 3, 'Appayan Restaurant', 'Gangarampur New Market', '24 Hours Open', '0.00', '', '2023-08-19 12:50:05', '2023-08-19 12:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_mail`, `user_type`, `user_password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Dipankar', 'Roy', 'dipankar@gmail.com', 'Owner', 'eyJpdiI6IjkwdXdnbFJDZVFFc3NsTW10V2Jjd2c9PSIsInZhbHVlIjoiV0hQbEJFNDh5RDNWeTNJeEhhU3gvZz09IiwibWFjIjoiZjUwYmFlYjUzMmIxOTA3NTczMjVhOGQ1N2VmMjFmYmU5MGVkOGU3NWMxNzQzNzQ1NTg4M2I0NTU0MGY0MDBjMiIsInRhZyI6IiJ9', '2023-08-21 10:04:54', '2023-08-28 07:12:20', 1),
(2, 'Bhaskar', 'Sarkar', 'bhaskar@gmail.com', 'Customer', 'eyJpdiI6IjFab2djeGZrdHpnTHJNRGZmaDI4dWc9PSIsInZhbHVlIjoiU0lhaTEvbkIzbjh2ZFV6ZVBaRHpsZz09IiwibWFjIjoiYWRjMzMzYmMwZjliNDQ5MjViMDliNjkwYTYzOWUyODMyNTZlY2YwN2RlMjNmMjljYjM2MDI2OTBjYjEyZmI1MSIsInRhZyI6IiJ9', '2023-08-22 06:10:13', '2023-08-22 06:10:13', 0),
(3, 'Subhankar', 'Barman', 'subhankar@gmail.com', 'Owner', 'eyJpdiI6IkJCWDVZclpZNDNOVTZDZzlWSTcrTVE9PSIsInZhbHVlIjoiZ3dCeWlvWnBpZkJUeWtjRXFsUkdsdz09IiwibWFjIjoiZmFhNTRkOGYwYmVjZDU4YmI3YzhmY2VmN2I1YzQwMTkxMzRlYzFiZTM4Y2Q5MzhiYjA5ZTViZDgxMmZmMWE1YyIsInRhZyI6IiJ9', '2023-08-22 06:13:08', '2023-08-22 06:13:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_mail_unique` (`user_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `res_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
