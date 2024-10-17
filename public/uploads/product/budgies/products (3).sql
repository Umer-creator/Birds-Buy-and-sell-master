-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bird2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock_status` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `short_des`, `description`, `image`, `images`, `category_id`, `store_id`) VALUES
('Blue Budgie', 'Playful and vibrant blue Budgie, a delightful and intelligent companion bird.', 'The Blue Budgie is a striking Budgie variant with vibrant blue plumage. Known for their playful and social nature, Blue Budgies make delightful companions. They are intelligent and can learn to mimic human speech and sounds. Blue Budgies thrive in spacious cages with plenty of toys and social interaction. Enjoy the company of this beautiful and charming avian friend.', 'uploads/product/1688489444.jpg', '[\"uploads\\/product\\/BlueBudgie1.jpg1688489444.jpg\",\"uploads\\/product\\/BlueBudgie2.jpg1688489444.jpg\",\"uploads\\/product\\/BlueBudgie3.png1688489444.png\"]', 21, 2),
('White Budgie:', 'Elegant white-colored Budgie', 'The White Budgie is an elegant and graceful Budgie variant with pristine white plumage. Known for their peaceful demeanor, White Budgies make wonderful pets. They are sociable birds that enjoy interacting with their owners and other Budgies. With their gentle nature and beautiful appearance, White Budgies add a touch of serenity to any aviary or home environment.', 'uploads/product/1688489574.jpg', '[\"uploads\\/product\\/1.jpg1688489574.jpg\",\"uploads\\/product\\/2.jpg1688489574.jpg\",\"uploads\\/product\\/3.jpg1688489574.jpg\"]', 21, 2),
('Lutino Budgie', 'The Lutino Budgie is a visually striking Budgie variant with vibrant yellow plumage.', 'Lutino budgies are a type of budgie that is completely yellow. They have yellow bodies, eyes, and beaks. They are more expensive than blue or white budgies, with prices starting at around Rs. 1,000 per bird.', 'uploads/product/1688489702.jpg', '[\"uploads\\/product\\/1.jpg1688489702.jpg\",\"uploads\\/product\\/2.jpg1688489702.jpg\"]', 21, 2),
('Yellow Canary', '\"Beautiful Yellow Crested Cockatoo for sale! This charismatic bird features a vibrant yellow crest and playful personality', '\"Our Yellow Crested Cockatoo is a stunning avian beauty that will captivate you with its brilliant yellow crest and inquisitive nature. This intelligent and social bird loves to interact with its human companions, displaying its playful and entertaining behaviors. With its charming personality and stunning appearance, this Yellow Crested Cockatoo is an ideal addition to any bird-loving household. Hand-raised and well-socialized, this exceptional bird is ready to bring joy and companionship to its new forever home.\"', 'uploads/product/1688490251.jpg', NULL, 22, 2),
('Fallow Canary', '\"Adorable Fallow Canary available for sale! This charming bird showcases beautiful muted colors and a sweet singing voice. A perfect choice for bird enthusiasts looking for a melodious companion.\"', 'Our Fallow Canary is a delightful avian friend that will mesmerize you with its gentle beauty and melodious songs. With its soft and muted plumage colors, this Fallow Canary stands out from the crowd. Its soothing singing voice adds a serene ambiance to any space. Known for their calm temperament and friendly disposition, Fallow Canaries make wonderful companions for bird lovers of all ages. This hand-raised and well-cared-for Fallow Canary is ready to bring joy and tranquility to its new forever hom', 'uploads/product/1688490354.jpg', '[\"uploads\\/product\\/2.jpg1688490354.jpg\",\"uploads\\/product\\/3.jpg1688490354.jpg\"]', 21, 2),
('Black-headed Canary', 'Stunning Black-headed Canary available for sale! This exquisite bird features a black head and vibrant yellow body. A perfect choice for bird enthusiasts seeking a striking and melodious companion', 'Our Black-headed Canary is a truly captivating avian beauty. With its striking black head contrasting against its vibrant yellow body, this bird is a sight to behold. Not only is it visually stunning, but it also possesses a delightful singing voice. The melodious songs of the Black-headed Canary will fill your space with joy and harmony. Known for their charming and social nature, these canaries make delightful companions. This well-cared-for Black-headed Canary is ready to find its forever home and bring beauty and melodious tunes to its new owner', 'uploads/product/1688490498.jpg', '[\"uploads\\/product\\/1.jpg1688490498.jpg\",\"uploads\\/product\\/2.jpg1688490498.jpg\"]', 22, 3),
('Muscovy Duck', 'Adorable Muscovy Duck available for sale! This charming bird is known for its unique appearance and friendly nature.', 'Our Muscovy Duck is a delightful addition to any flock or pond. With its unique appearance, including a distinctive red caruncle on the face and striking feather patterns, this duck is sure to catch the attention of bird enthusiasts. Muscovy Ducks are known for their calm and friendly nature, making them a joy to interact with.', 'uploads/product/1688490665.jpg', '[\"uploads\\/product\\/1.jpg1688490665.jpg\",\"uploads\\/product\\/2.jpg1688490665.jpg\",\"uploads\\/product\\/3.jpg1688490665.jpg\"]', 23, 3),
('Adorable Runner Duck', 'Adorable Runner Duck available for sale! This fascinating bird is known for its upright posture and excellent foraging abilities', 'Our Runner Duck is a captivating addition to any flock or farmyard. With its distinctive upright posture and slender body, this duck stands out from the crowd. Runner Ducks are renowned for their excellent foraging abilities, making them great pest controllers in gardens or farms. They are highly active and have an entertaining waddle, bringing life and energy to their surroundings', 'uploads/product/1688490762.jpg', '[\"uploads\\/product\\/1.jpg1688490762.jpg\",\"uploads\\/product\\/2.jpg1688490762.jpg\"]', 23, 3),
('Blue Finch', 'Beautiful Blue Finch available for sale! This charming bird showcases stunning blue plumage and delightful singing abilities.', 'Our Blue Finch is a true delight for bird lovers. With its striking blue plumage and petite size, this bird adds a touch of vibrant color to any aviary or home. Not only is it visually captivating, but it also possesses a sweet and melodious singing voice. The soothing songs of the Blue Finch create a tranquil ambiance', 'uploads/product/1688490891.jpg', '[\"uploads\\/product\\/1.jpg1688490891.jpg\",\"uploads\\/product\\/2.jpg1688490891.jpg\",\"uploads\\/product\\/3.jpg1688490892.jpg\"]', 24, 3),
('American Goldfinch', 'Captivating American Goldfinch available for sale! This beautiful bird features vibrant yellow plumage and delightful song. A perfect choice for bird enthusiasts seeking a visually stunning and melodious companion.', 'Our American Goldfinch is a true gem among songbirds. With its vibrant yellow plumage and contrasting black wings, this bird is a sight to behold. Not only is it visually stunning, but it also possesses a sweet and melodious song that adds a cheerful note to any environment. Known for their acrobatic flight and playful nature, American Goldfinches bring joy and entertainment to bird lovers.', 'uploads/product/1688491012.jpg', '[\"uploads\\/product\\/1.jpg1688491012.jpg\",\"uploads\\/product\\/2.jpg1688491012.jpg\",\"uploads\\/product\\/3.jpg1688491012.jpg\"]', 24, 3),
('Leghorn', 'Classic Leghorn available for sale! This popular breed is known for its excellent egg-laying abilities and elegant appearance.', '\"Our Leghorn chickens are a sought-after breed for their exceptional egg-laying capabilities. With their elegant and slim build, these birds are a true delight to behold. Leghorns are known for their prolific egg production, making them a favorite among poultry keepers. They are also known for their alert and active nature,', 'uploads/product/1688491097.jpg', '[\"uploads\\/product\\/1.jpg1688491097.jpg\"]', 25, 4),
('Leghorn', 'Australorp hens are known for their black feathers and their ability to lay a lot of eggs.', 'Australorp hens are known for their black feathers and their ability to lay a lot of eggs. They are relatively inexpensive, with prices starting at around Rs. 600 per bird.for their black feathers and their ability to lay a lot of eggs.', 'uploads/product/1688491185.jpg', '[\"uploads\\/product\\/1.jpg1688491185.jpg\",\"uploads\\/product\\/2.jpg1688491185.jpg\",\"uploads\\/product\\/3.jpg1688491185.jpg\"]', 25, 4),
('Fischer\'s Lovebird', 'Fischer\'s lovebirds are one of the most popular breeds of lovebirds.', 'Fischer\'s lovebirds are one of the most popular breeds of lovebirds. They are known for their bright green plumage and their playful personalities. They are relatively inexpensive, with prices starting at around Rs. 500 per bird.', 'uploads/product/1688491304.jpg', '[\"uploads\\/product\\/1.jpg1688491304.jpg\",\"uploads\\/product\\/2.jpg1688491304.jpg\",\"uploads\\/product\\/3.jpg1688491304.jpg\"]', 26, 4),
('Fischer\'s lovebirds', 'for their bright green plumage with neon blue wingtips.', 'Neon-winged lovebirds are known for their bright green plumage with neon blue wingtips. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.for their bright green plumage with neon blue wingtips.', 'uploads/product/1688491392.jpg', '[\"uploads\\/product\\/1.jpg1688491392.jpg\",\"uploads\\/product\\/2.jpg1688491392.jpg\",\"uploads\\/product\\/3.jpg1688491392.jpg\"]', 26, 4),
('Crested pheasant', 'pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and i', 'The crested pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and its distinctive crest. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 8,000 per bird.pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and i', 'uploads/product/1688491489.jpg', '[\"uploads\\/product\\/1.jpg1688491489.jpg\"]', 27, 4),
('Spotted pigeon', 'They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.', 'The spotted pigeon is a pigeon found in Southeast Asia. It is known for its brown plumage with white spots and its long tail feathers. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.', 'uploads/product/1688491612.jpg', '[\"uploads\\/product\\/1.jpg1688491612.jpg\",\"uploads\\/product\\/2.jpg1688491612.jpg\"]', 27, 5),
('Rock pigeon', 'The rock pigeon is a common pigeon found worldwide. It is known for its gray plumage and its black bars on its wings.', 'The rock pigeon is a common pigeon found worldwide. It is known for its gray plumage and its black bars on its wings.', 'uploads/product/1688491867.jpg', '[\"uploads\\/product\\/1.jpg1688491867.jpg\",\"uploads\\/product\\/2.jpg1688491867.jpg\"]', 28, 5),
('Amazon parrot', 'Amazon parrots are medium-sized parrots native to South America. They are known for their ability to mimic human speech and their playful personalities', 'Amazon parrots are medium-sized parrots native to South America. They are known for their ability to mimic human speech and their playful personalities. They are relatively expensive, with prices starting at around Rs. 50,000 per bird.', 'uploads/product/1688491974.jpg', '[\"uploads\\/product\\/1.jpg1688491974.jpg\",\"uploads\\/product\\/3.jpg1688491974.jpg\"]', 29, 5),
('Penguin', 'Penguins are flightless seabirds with short wings and thick bodies. They are found in the Southern Hemisphere and are known for their waddling', 'Penguins are flightless seabirds with short wings and thick bodies. They are found in the Southern Hemisphere and are known for their waddling gait and their ability to swim underwater. They are relatively common, with prices starting at around Rs. 25,000 per bird.', 'uploads/product/1688492065.jpg', '[\"uploads\\/product\\/1.jpg1688492065.jpg\",\"uploads\\/product\\/2.jpg1688492065.jpg\",\"uploads\\/product\\/3.jpg1688492065.jpg\"]', 30, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_store_id_foreign` (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
