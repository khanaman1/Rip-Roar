-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 08:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_slot`
--

CREATE TABLE `booked_slot` (
  `slot_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_slot`
--

INSERT INTO `booked_slot` (`slot_id`, `booking_id`) VALUES
(29, 1),
(30, 2),
(31, 2),
(32, 3),
(33, 3),
(34, 4),
(35, 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_detail_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `sport_detail_id`, `booking_date`, `price`, `quantity`) VALUES
(1, 4, 16, '2021-04-16 23:05:39', 9000, 1),
(2, 4, 2, '2021-04-16 23:09:40', 7000, 2),
(3, 4, 4, '2021-04-16 23:11:36', 13000, 2),
(4, 4, 2, '2021-04-16 23:13:38', 7000, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `booking_detail`
-- (See below for the actual view)
--
CREATE TABLE `booking_detail` (
`booking_id` int(11)
,`sport_detail_id` int(11)
,`slot_id` int(11)
,`user_id` int(11)
,`name` varchar(50)
,`sport_name` varchar(255)
,`start_time` timestamp
,`number_of_people` int(11)
,`quantity` int(11)
,`slot_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `desctiption` varchar(1000) NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`, `desctiption`, `thumbnail`) VALUES
(1, 'Pokhara', 'Pokhara is the second most visited city in Nepal, as well as one of the most popular tourist destinations. It is famous for its tranquil atmosphere and the beautiful surrounding countryside. Pokhara lies on the shores of the Phewa Lake. The Seti Gandaki River has created spectacular gorges in and around the city.', 'pokhara.jpg'),
(2, 'Annapurna Conservation Area', 'Annapurna Conservation Area is Nepal\'s largest protected area covering 7,629 km2 (2,946 sq mi) in the Annapurna range of the Himalayas. It ranges in elevation from 790 m (2,590 ft) to the peak of Annapurna I at 8,091 m (26,545 ft).', 'aca.jpg'),
(3, 'Nagarjun Forest', 'Shivapuri Nagarjun National Park (159 sq km) is situated on the northern fringe of Kathmandu valley and lies about 12 km away from the center of capital city. The area was gazetted as the country\'s ninth national park in 2002. Prior its declaration as national park, it was managed under the Shivapuri Watershed Development Board, and was later declared as Shivapuri Watershed and Wildlife Reserve.', 'nagarjun.jpg'),
(4, 'Hattiban', 'If you’re in search of a full day trip out of Kathmandu with some sport climbing on limestone crags, Hattiban is the spot for you. You can even stay at a nearby monastery and develop some meditative abilities. It’ll be a really fun and exciting day. Not only because you’ll improve your climbing skills but also because you’ll learn a lot about Nepalese culture. Hattiban is a climbing site 15 km southwest of Kathmandu. It’s specially ideal for professional climbers looking for some top level grades climbs. There are 8 different routes in Hattiban, all of them really well bolted.', 'hattiban.jpg'),
(5, 'Nagarkot', 'Nagarkot is a village in central Nepal, at the rim of the Kathmandu Valley. It’s known for its views of the Himalayas, including Mount Everest to the northeast, which are especially striking at sunrise and sunset. The surrounding scrubland is laced with trails and home to many butterflies. To the west is the ancient, pagoda-style Changunarayan Temple, dedicated to Vishnu and a Hindu pilgrimage site.', 'nagarkot.jpg'),
(6, 'Shivapuri National Park', 'Shivapuri Nagarjun National Park is the ninth national park in Nepal and was established in 2002. It is located in the country\'s mid-hills on the northern fringe of the Kathmandu Valley and named after Shivapuri Peak of 2,732 m altitude.', 'sna.jpg'),
(7, 'Tika Bhairav Trails', 'Away from the city, there are many places that are too often overlooked or forgotten but have plenty to offer. The neglected landscapes in Lalitpur are a dream for anyone looking for solitude and escape. I had been to Lele a few times, but hadn\'t visited Tika Bhairav, one of the many popular Bhairav temples in the valley. Famous British painter Henry Ambrose Oldfield, who had painted many popular monuments in the valley in the 1850s, including the durbar squares in Patan, Kathamndu, and Bhaktapur, and Pashupatinath Temple, had also painted the temple in Tika Bhairav in 1857. Oldfield described the Bhairav shrine at the time as \'Head of \'Teekha Bhairab\' near Pherphing. This painting is a colorful depiction of the Bhairav shrine, an open-air image under a sheltering roof.', 'tikabhairav.jpg'),
(8, 'Muktinath Region', 'Muktinath is a Vishnu temple, sacred to both Hindus and Buddhists. It is located in Muktinath Valley at the foot of the Thorong La mountain pass in Mustang, Nepal. It is one of the world\'s highest temples.', 'muktinath.jpg'),
(9, 'Bhote Koshi River', 'The Bhote Koshi is the upper river course of the Sun Kosi, known as Poiqu in Tibet. It is part of the Koshi River system in Nepal. A western tributary of the upper Dudh Koshi is also called Bhote Koshi.', 'bhotekoshi.jpg'),
(10, 'Trisuli River', 'The Trishuli River is one of the major tributaries of the Narayani River basin in central Nepal. It originates in Tibet as a stream and enters Nepal at Gyirong Town.', 'trisuli.jpg'),
(11, 'Hinku Valley, Lamjung', 'Hinku Hongu Valley Trek located to the west of Solukhumbu is the secluded and rarely visited Rolwaling valley. The upper reaches of the valley are connected to the Solukhumbu by the high and difficult pass of Tashi Lapsta pass. Trekkers contemplating trek that connects Rolwaling with Khumbu valley should always travel from east to west (khumbu to Rolwaling). To attempt to do the trek in reverse is likely to result in technical and altitude problems. The trek, particularly the crossing of Tashi Lapsta pass, is one of the more difficult treks in Nepal and should only be attempted by self-sufficient and experienced parties. Some basic mountaineering skills are required. ', 'hinkuvalley.jpg'),
(12, 'Kaligandaki River', 'The Gandaki River, also known as the Narayani and the Gandak, is one of the major rivers in Nepal and a left bank tributary of the Ganges in India. Its total catchment area amounts to 46,300 km², most of it in Nepal. In the Nepal Himalayas, it is notable for its deep canyon.', 'kaligandaki.jpg'),
(13, 'Sunkoshi River', 'The Sunkoshi, also called Sunkosi, is a trans-boundary river that originates in Tibet Autonomous Region and is part of the Koshi or Saptkoshi River system in Nepal. ', 'sunkoshi.jpg'),
(14, 'Karnali River', 'Ghaghara, also called Karnali is a perennial trans-boundary river originating on the Tibetan Plateau near Lake Manasarovar. It cuts through the Himalayas in Nepal and joins the Sharda River at Brahmaghat in India. Together they form the Ghaghara River, a major left bank tributary of the Ganges.', 'karnali.jpg'),
(15, 'Lukla', 'Lukla is a small town in the Khumbu Pasanglhamu rural municipality of the Solukhumbu District in the Province No. 1 of north-eastern Nepal. Situated at 2,860 metres, it is a popular place for visitors to the Himalayas near Mount Everest to arrive.', 'lukla.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `number_of_people` int(11) DEFAULT NULL,
  `slot_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `start_time`, `end_time`, `number_of_people`, `slot_date`) VALUES
(29, '2021-04-18 03:15:00', '2021-04-29 03:15:00', 14, '2021-04-18'),
(30, '2021-04-18 01:15:00', '2021-04-18 01:30:00', 0, '2021-04-18'),
(31, '2021-04-18 01:30:00', '2021-04-18 01:45:00', 0, '2021-04-18'),
(32, '2021-04-18 03:15:00', '2021-04-18 03:25:00', 0, '2021-04-18'),
(33, '2021-04-18 03:25:00', '2021-04-18 03:35:00', 0, '2021-04-18'),
(34, '2021-04-18 01:45:00', '2021-04-18 02:00:00', 0, '2021-04-18'),
(35, '2021-04-18 02:00:00', '2021-04-18 02:15:00', 0, '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `available_season` varchar(255) NOT NULL,
  `slot_duration` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `total_slots` int(11) NOT NULL,
  `max_slot_capacity` int(11) NOT NULL,
  `price` double NOT NULL,
  `thumbnail1` varchar(500) NOT NULL,
  `thumbnail2` varchar(500) NOT NULL,
  `thumbnail3` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `name`, `available_season`, `slot_duration`, `opening_time`, `closing_time`, `total_slots`, `max_slot_capacity`, `price`, `thumbnail1`, `thumbnail2`, `thumbnail3`, `description`) VALUES
(1, 'zipline', 'all seasons', 10, '07:00:00', '17:00:00', 60, 1, 3500, 'zipline1.jpg', 'zipline2.jpg', 'zipline3.jpg', 'A zip line, zip-line, zipline, zip wire, or aerial runway, is a pulley suspended on a cable, usually made of stainless steel, mounted on a slope.'),
(2, 'bunjee jumping', 'all seasons', 15, '07:00:00', '17:00:00', 40, 1, 3500, 'bunjee1.jpg', 'bunjee2.jpg', 'bunjee3.jpg', 'Bungee jumping, also spelt bungy jumping, is an activity that involves a person jumping from a great height while connected to a large elastic cord. The launching pad is usually erected on a tall structure such as a building or crane, a bridge across a deep ravine, or on a natural geographic feature such as a cliff. '),
(3, 'paragliding', 'all seasons', 10, '09:00:00', '16:00:00', 42, 1, 6500, 'paragliding1.jpg', 'paragliding2.jpg', 'paragliding3.jpg', 'Paragliding is the recreational and competitive adventure sport of flying paragliders: lightweight, free-flying, foot-launched glider aircraft with no rigid primary structure. The pilot sits in a harness or lies supine in a cocoon-like speed bag suspended below a fabric wing. '),
(4, 'skydiving', 'all seasons', 120, '10:00:00', '16:00:00', 3, 6, 35000, 'skydiving1.jpg', 'skydiving2.jpg', 'skydiving3.jpg', 'Sky Diving in Nepal An excitingly extreme aerial adventure, Everest skydiving is an amazingly unique experience in the world. Skydiving is done from a plane or a chopper onto the worlds highest drop zone at Gorak Shep, Kala Patthar.'),
(5, 'paramotor gliding', 'all seasons', 30, '10:00:00', '04:00:00', 12, 1, 25000, 'paramotorgliding1.jpg', 'paramotorgliding2.jpg', 'paramotorgliding3.jpg', 'Powered paragliding, also known as paramotoring or PPG, is a form of ultralight aviation where the pilot wears a back-mounted motor which provides enough thrust to take off using a paraglider. It can be launched in still air, and on level ground, by the pilot alone — no assistance is required. '),
(6, 'kayaking and canyoning', 'all seasons', 60, '08:00:00', '17:00:00', 9, 1, 500, 'kayakingandcanyoning1.jpg', 'kayakingandcanyoning2.jpg', 'kayakingandcanyoning3.jpg', 'A kayak is a small, narrow watercraft which is typically propelled by means of a double-bladed paddle. The word kayak originates from the Greenlandic word qajaq. The traditional kayak has a covered deck and one or more cockpits, each seating one paddler. '),
(7, 'ice climbing', 'all seasons', 420, '10:00:00', '17:00:00', 1, 20, 1000, 'iceclimbing1.jpg', 'iceclimbing2.jpg', 'iceclimbing3.jpg', 'Ice climbing is the activity of ascending inclined ice formations. Usually, ice climbing refers to roped and protected climbing of features such as icefalls, frozen waterfalls, and cliffs and rock slabs covered with ice refrozen from flows of water. '),
(8, 'rock climbing', 'all seasons', 360, '09:00:00', '15:00:00', 1, 50, 5000, 'rockclimbing1.jpg', 'rockclimbing2.jpg', 'rockclimbing3.jpg', 'Rock climbing is a sport in which participants climb up, down or across natural rock formations or artificial rock walls. The goal is to reach the summit of a formation or the endpoint of a usually pre-defined route without falling.'),
(9, 'mountain biking', 'all seasons', 60, '09:00:00', '19:00:00', 100, 100, 200, 'mountainbiking1.jpeg', 'mountainbiking2.jpg', 'mountainbiking3.jpg', 'Mountain biking is a sport of riding bicycles off-road, often over rough terrain, usually using specially designed mountain bikes.'),
(10, 'white-water rafting', 'all seasons', 480, '08:00:00', '15:00:00', 50, 10, 5000, 'rafting1.jpg', 'rafting2.jpg', 'rafting3.jpg', 'Rafting and whitewater rafting are recreational outdoor activities which use an inflatable raft to navigate a river or other body of water. This is often done on whitewater or different degrees of rough water. Dealing with risk is often a part of the experience.'),
(11, 'Honey Hunting', 'all seasons', 54, '08:00:00', '17:00:00', 10, 1, 3000, 'honeyhunting1.jpg', 'honeyhunting2.jpg', 'honeyhunting3.jpg', 'Wild honey from Apis Laboriosa the Himalayan giant honey bee has been gathered by Gurung people from cliffs in the Himalayan foothills of Nepal for centuries. Apis Laboriosa is the largest honeybee in the world and is referred to as Bheer Mauri in Nepali which directly translates into cliff bee. It is crucial for pollinating wild flora and crops in the mountains. The Gurung people across many parts of Nepal especially the Kaski and Lamjung Districts value their tradition of honey hunting as part of their lifestyle and collect honey twice a year during the spring and autumn. The honey they gather is prized due to both its medicinal properties and monetary worth.'),
(12, 'Trekking', 'all seasons', 15840, '09:00:00', '09:00:00', 1, 20, 1500, 'trekking1.jpg', 'trekking2.jpg', 'trekking3.jpg', 'Nepal has attracted trekkers from around the world since the 1960s when Col Jimmy Roberts organized the first commercial trek. Trekking has been the leading activity of tourists in Nepal and thousands take to the Himalayas, some doing a few days of hiking while others take on a month long trek through valleys and high mountain passes. Two of the most popular trekking regions are the Everest and Annapurna where many different trails can be followed while the other popular treks are in the Langtang and Kanchenjunga regions.');

-- --------------------------------------------------------

--
-- Table structure for table `sport_detail`
--

CREATE TABLE `sport_detail` (
  `sport_detail_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `thumbnail1` varchar(500) NOT NULL,
  `thumbnail2` varchar(500) NOT NULL,
  `thumbnail3` varchar(500) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport_detail`
--

INSERT INTO `sport_detail` (`sport_detail_id`, `location_id`, `sport_id`, `name`, `description`, `thumbnail1`, `thumbnail2`, `thumbnail3`, `link`) VALUES
(1, 1, 1, 'Zipflyer Nepal', 'Zipflyer Nepal is the Ultimate Zipline experience in the heart of the Himalayas. It has an initial incline of 56 degrees (which makes it the steepest Zipline in the world), a total length of 1850 meters and a vertical drop of more than 600 meters.\r\n\r\nIt is the tallest, longest and the steepest zipline in the world. Its also located in one of the most beautiful places on the planet. Experience 180 degree panoramic views of the majestic Annapurna mountain range as you soar at over 85 miles (100+km) an hour.\r\nThe HighGround ZipFlyer launch site is located a short 30 minutes drive from Pokhara Lakeside. Transportation is included to and from the sites.  \r\nGoPro® cameras will be provided to each guest who wishes to capture video of their individual experience. Guests then have the option to purchase the videos and the associated footage.', 'zipflyer1.jpg', 'zipflyer2.jpg', 'zipflyer3.jpg', 'https://www.highgroundnepal.com/zipflyer'),
(2, 1, 2, 'Bungy Nepal', 'Bungy Nepal Adventure was started in 2018 with the motive to provide quality service, unique culture, safety environment, and customer satisfaction. Bungy Nepal Adventure believes in providing a totally safe environment in harmony with the local culture where people can present themselves with the ultimate personal challenge and achieve something they never dreamt possible. Bungy Nepal adventure is a specialist in infrastructure tourism using the regional and national bridge. Bungy Nepal Adventure is the only company in Pokhara that offers Cantilever bridge natural Bungy Bungy jumps.\r\n\r\n The idea of the development is the Bungy Nepal implementation defining the set of key interests of people worked for the Bungy.\r\n\r\nBungy Nepal Adventure strive to provide a positive and rewarding experience in a safe and controlled environment. Bungy jumping is an exciting chance to face your fears test your will and realize your own potential, offering an experience that you will never forget. We focus on helping every jumper discover the inner strength to overcome their fears by providing an extreme test of courage in a safe, professional in a fun way.', 'bungynepal1.jpg', 'bungynepal2.jpg', 'bungynepal3.jpg', 'https://bungynepaladventure.com/'),
(3, 1, 4, 'Pokhara Skydiving', 'Skydiving is an extreme adventure sport for thrill seekers. When talking about skydiving most of the peoples think, they would never be able to afford because comparatively skydiving price is too expensive than other adventure sport. But now Himalayan Excursion Nepal offering skydiving in Pokhara is relatively reasonable price. Pokhara is the most beautiful city in central Nepal flanked by majestic Himalayan peaks including mount Annapurna, Dhaulagiri, Fishtail and Manaslu; embedded by emerald lakes. Pokhara is also known as gateway to a popular trekking trail in the Himalayas including Annapurna Basecamp, Annapurna circuit, Ghorepani Poonhill, Jomsom-Muktinath, Upper Mustang and also a place to relax and enjoy leisure tour.  \r\n\r\n \r\n\r\nThe thrilling skydiving is being offered in the heart of stunning Pokhara city. Backed up by the well experience and professional skydive crew, skydive will be held at Pame Danda drop zone west of beautiful Phewa lake where skydivers will leap from helicopter or small twin otter aircraft at the height of 12,000ft/3,658m. During skydiving one can enjoy free falling for around 40 seconds before deploying their parachute, screaming themselves with the excitement, a feeling of exhilaration you have never before experienced in your lifetime. Your entire skydiving will be captured by our two crew photographers who fall alongside to take photos and videos for your lifetime memory.', 'pokharaskydiving1.jpg', 'pokharaskydiving2.jpg', 'pokharaskydiving3.jpg', 'https://www.nepalskydive.com/pokhara-skydive/'),
(4, 1, 3, 'Sunrise Paragliding', 'We are the first paragliding company in Nepal with over 23 years of experience! And, our knowledge of the local flying conditions is unmatched. Paragliding, like everything in life, is constantly evolving, and we are committed to guiding its growth here in Nepal in the most professional, safe, and enjoyable way possible. We take our title “The Paragliding Pioneers of Nepal” very seriously, and we are constantly searching for new flying routes, sites, and ways to ensure that the adventuresome spirit that gave birth to this sport is alive and well for years to come.', 'sunriseparagliding1.jpg', 'sunriseparagliding2.jpg', 'sunriseparagliding3.jpg', 'https://sunrise-paragliding.com/about-us/'),
(5, 1, 5, 'Paddling Nepal', 'If you are already part of the international paddling community, then you know Nepal is the ultimate whitewater playground. Kayaking in Nepal is not just about the thrill of running rapids, but about sharing a unique river culture, good times with new friends from around the world, riverside camping, exploring authentic places and cultures, challenging yourself and embracing nature at its best in the heart of the Himalayas.\r\n\r\nAnd if you are not yet part of this community – here’s your chance to join one of the coolest outdoor adventure scenes on the planet! Take the thrill of whitewater into your own hands and learn to kayak with members of Nepal’s National White Water Team! Whether you are a beginner looking for an introduction to river kayaking or an experienced paddler looking to develop your skills, our internationally trained instructors will help you realize your dreams on some of the best rivers in the world. Our courses take place on Himalayan lakes and rivers allowing you to really experience Nepal and enjoy the diversity of our scenery, culture and outstanding white water!\r\n\r\nExperienced kayakers are invited to join any of our commercial whitewater rafting adventures and enjoy the comforts and safety of the group environment. Alternatively we offer kayak and guide hire to help you run your own self-supported eco-adventure.\r\n\r\n', 'kayaking1.jpg', 'kayaking2.jpg', 'kayaking3.jpg', 'https://www.paddlenepal.com/kayaking/'),
(6, 3, 8, 'Nagarjun Rock Climbing', 'Nagarjun Rock Climbing is one of the popular and closet Climbing Site of Kathmandu valley. It is located 3km in the northwest of Kathmandu valley in Nagarjun Forest Reserve. From you can continue to sacred Buddhist site Langlungten, Padmasambhava (Guru Rinpoche in Tibetan) took his meditation there. Beside, you will see good view of the Annapurna, Langtang, Machhapuchare, Manaslu and Ganesh Himal, Kathmandu valley.\r\n\r\nWe ascend more than 21 routes about 55m high on a dizzying limestone cliff. Nagarjun Rock climbing is suitable for all sorts of climbers from beginners to experts. Rock climbing is appreciated outdoor activities, it evaluates your strength, tolerance, activity and balance.\r\n\r\nAll our treks can be booked as private trips - no large, impersonal groups but small, individual experiences. Let Incredible Himalayan Sherpa Adventure take you on your very own adventure climb to Nagarjun Rock Climbing.', 'nagarjunrockclimbing1.jpg', 'nagarjunrockclimbing2.jpg', 'nagarjunrockclimbing3.jpg', 'https://www.himalayansherpaadventure.com/nagarjun-rock-climbing.html'),
(7, 4, 8, 'Hattiban Rock Climbing', 'Rock climbing is a sport to climb up, down or across the rock formations/walls. The goal is to summit the endpoint pre-defined route without falling. Rock climbing is a physically and mentally demanding sport, tests a climber\'s strength, endurance, agility, and balance along with mental control. Knowledge of proper climbing techniques and the use of specialized climbing equipment are crucial for the safe completion of routes. Due to the wide range and variety of rock formations around the world, rock climbing has been separated into several different styles and sub-disciplines.\r\n\r\nHattiban climbing offers an advanced level climb. The area is located 26km south-west of Kathmandu valley on the way to Dakshinkali temple, where we enjoy top-level grade climbing. Along the way, pass by Samye Monastery, and get a great view of the Kathmandu Valley. The climbing grades start from 5a to 6b. This place is very good in winter because it is south face and sunlight all day. We start hiking with a beautiful village under the lush pine forest and monasteries. Crossing village with short uphill walking around 30min gaining an elevation of around 2000ft we reach the spot named big crag.\r\n\r\nA short private 1hr drive through the city and beautiful village brings us to Hattiban. Hattiban is a beautiful destination offering a great view of Kathmandu city. Then a short uphill walk around 25min through the jungle to the climbing ground named big crag. Cliff has 10 intermediate to advanced single-pitch climbing routes, all bolted for sport climbing with bolted anchors at the top of each route. The cliff is vertical, with slight overhangs. Hattiban Rock climbing is suitable for all sorts of climbers from beginners to experts.', 'hattibanrockclimbing1.jpg', 'hattibanrockclimbing2.jpg', 'hattibanrockclimbing3.jpg', 'https://www.himalayansherpaadventure.com/hattiban-rock-climbing.html'),
(8, 5, 8, 'Nagarkot Rock Climbing', 'The mountainous Nepal, which hosts the majority of the highest mountain peaks worldwide, is the perfect destination for extreme mountain activities. Rock climbing here acquires a different meaning. In a land where the hill\'s altitude ranges between 3500 m/11482 ft and 1000 m/3280 ft, climbing in the rock of the \'\'next door\'\' seems so natural!\r\nThe Nagarkot area, northeast of Kathmandu Valley, is literally the hottest point to admire the magnificent Himalayas. The most impressive ranges such as Annapurna, Manaslu, Ganesh, Langtang, Jugal, Mahalangur (Everest peak), Numbur and Rolwaling can be viewed from there. Nagarkot lies in the hilly zone of Nepal, surrounded by the most impressive and grandiose summits worldwide.\r\nThe morphology of the region due to its position is shaped by the weather conditions, the climate zones and the routes created by the melting snow of the neighboring mountain glaciers. Spectacular rock formations with slippery surface and sharp edges lies all over in the entire area. Their average altitude is around 25 m/82 ft high. Many and very professional training centers are operating in the zone.', 'nagarkotrockclimbing1.jpg', 'nagarkotrockclimbing2.jpg', 'nagarkotrockclimbing3.jpg', 'http://www.xtremespots.com/mountain-sports/rock-climbing/nagarkot-bhaktapur-district-nepal/'),
(9, 6, 9, 'Single Track Nepal', 'Single Track Nepal is a local mountain biking expedition company owned by two Nepali mountain biking enthusiasts, Rakesh Manandhar and Sumit Joshi. The mission of Single Track Nepal is simple: to showcase the best of Nepal’s wilderness and culture from the thrill of a mountain bike. Single Track Nepal aims to promote Nepal as a premier destination for world class single track mountain biking. Explorers and adventurers at heart, Rakesh and Sumit push the boundaries of traditional mountain biking operators by always seeking new trails, new trips and new ways to travel through Nepal and the South Asian region on mountain bike. Exploratory trails in development include any sections of the Great Himalayan Trail, routes in Sikkim, Kerala and Bhutan.\r\n\r\nAt Single Track Nepal, every trip is personalised to help you reach personal ambitions and fulfil special interests. We can find you trails to fit your desired level of riding be it super enduro and technical, or relaxed and spiritual. With over a decade’s years of experience guiding mountain biking trips, and in addition to more than twenty years experience leading trekking and climbing expeditions in Nepal and in South Asia, you can be confident that Single Track Nepal have the experience and skill to provide the best experience for you.', 'singletracknepal1.jpg', 'singletracknepal2.jpg', 'singletracknepal3.jpg', 'http://singletracknepal.com.np/'),
(10, 6, 9, 'Himalayan Single Track', 'By far and away the most ridden trail in Nepal, this short mountain biking adventure takes you into the heart of the Himalaya and rips down some of the best trails in the Lower Mustang region, including the famous Lubra Valley Trail. The route follows the raging Kaligandaki (Black River), famed as being part of the deepest gorge in the world, splitting the massive peaks of Annapurna and Dhaulagiri.\r\n\r\nThe upper part of the gorge is also called Thak Khola after the local Thakhali people who became prosperous from trans-Himalayan trade and are famed for their delicious food, apple growing and the making of local Apple Brandy.\r\n\r\nOur trail climbs up to Muktinath at the foot of the mighty Throng Pass on route from the Annapurna Circuit. From here there are many options for some amazing single track and downhill riding, past ancient monasteries and traditional villages. Bump along on cobble paths and get your feet wet in ice fed streams. This is surely one of the most spectacular short mountain biking holidays in the world. If you ride with the HST Team we will take you on trails other companies don’t know to hidden lakes, villages and single track descents.\r\n\r\nYou have to try it once in your life.', 'himalayansingletrack1.jpg', 'himalayansingletrack2.jpg', 'himalayansingletrack3.jpg', 'http://himalayansingletrack.com/tours/jomsom-muktinath-mountainbiking-nepal/'),
(11, 10, 10, 'White Water Nepal', 'The scenery of river Trishuli includes small gorges and a glimpse of the cable car leading to the famous Hindu Temple Manakamana.\r\nFor the most of the year the rapids encountered on the Trisuli are straightforward, easily negotiated and well spaced out. Trisuli river is an excellent river for those looking for a short river trip, without the challenge of huge rapids, but with some really exciting rapids, with beautiful scenery and a relatively peaceful environment. During the monsoon months the intensity of the rapids increases and attracts a radically different set of rafters. But there are sections for rafting during the monsoon for those who are looking for simply exciting trip!', 'whitewaternepal1.jpg', 'whitewaternepal2.jpg', 'whitewaternepal3.jpg', 'http://www.raftnepal.com/trisuli_rafting.htm'),
(12, 11, 11, 'Hop Nepal', 'Honey hunting is culturally important and has been practised in Nepal for centuries. Earlier, during the Udhauli and Ubhauli festivals, it was performed twice a year. \r\nIn an attempt to harvest the purest type of honey, Indigenous Himalayan people have been practising this craft. While a tradition, honey hunting is often performed for honey\'s medicinal values. \r\n\r\nHoney intake stimulates digestion and serves to enhance immunity. Honey\'s effects help retain body temperature, which is critical if you are a resident of the Himalayas. No wonder these people, for this edible molten gold, gamble their lives. \r\n\r\nHoney harvested from the hives of such wild bees is often assumed to have a strange hallucinating quality, which has lately drawn such finding natural highs.', 'hopnepal1.jpg', 'hopnepal2.jpg', 'hopnepal3.jpg', 'https://www.hopnepal.com/blog/honey-hunting-in-nepal'),
(13, 12, 10, 'Kaligandaki River Rafting Tour', '<ul>\r\n<li>Starting point : Maldhunga at 8am in the morning</li>\r\n<li>Stopping point: Mirmi</li>\r\n<li>Distance covered: 90km</li>\r\n<li>Included: accommodations, food, transportation, safety gears, insurance</li>\r\n</ul>\r\n', 'kaligandakirafting1.jpg', 'kaligandakirafting2.jpg', 'kaligandakirafting3.jpg', 'www.kaligandakiriverraftingtour.com'),
(14, 12, 10, 'Sunkoshi River Rafting Tour ', '<ul>\r\n<li>Starting point : Dumja at 8am in the morning</li>\r\n<li>Stopping point: Chatara</li>\r\n<li>Distance covered: 270km</li>\r\n<li>Included: accommodations, food, transportation, safety gears, insurance </li>\r\n</ul>\r\n', 'sunkoshirafting1.jpg', 'sunkoshirafting2.jpg', 'sunkoshirafting3.jpg', 'www.sunkoshiriverraftingtour.jpg'),
(15, 12, 10, 'Karnali River Rafting Tour', '<ul>\r\n<li>Starting point : Dungeshwor at 8am in the morning</li>\r\n<li>Stopping point: CHisapani</li>\r\n<li>Distance covered: 270km</li>\r\nIncluded: accommodations, food, transportation, safety gears, insurance</li>\r\n</ul>', 'karnalirafting1.jpg', 'karnalirafting2.jpg', 'karnalirafting3.jpg', 'www.karnaliriverraftingtour.com'),
(16, 15, 12, 'Everest base camp trekking.', '<ul>\r\n<li>Starting point: Lukla at 9 am</li>\r\n<li>Stopping point: lukla</li>\r\n\r\n<li>Itinerary:</li>\r\n<li>Day 1: Lukla(2810 m)</li>\r\n<li>Day 2: Phakding(2640m)</li>\r\n<li>Day 3: Namche bazaar(3450)</li>\r\n<li>Day 4: tengboche(3864m)</li>\r\n<li>Day 5: dingboche(4360m)</li>\r\n<li>Day 6: lobuche(4930m)</li>\r\n<li>Day 7:gorakshep(5357m)</li>\r\n<li>Day 8: kalapathar(5550m)</li>\r\n<li>Day 9: pheriche(3420m)</li>\r\n<li>Day 10: Namche(3450m)</li>\r\n<li>Day 11: Lukla (2810m)</li>\r\n</ul>', 'everesttrekking1.jpg', 'everesttrekking2.jpg', 'everesttrekking3.jpg', 'everesttrekking.com'),
(17, 2, 7, 'Annapurna Ice Climbing', 'Want to ice climb in Annapurna Conservation Area? Check out our huge selection of holidays and vacations, courses and lessons, experiences and day trips, hotels and other accommodation. There are also deals and discounts to help you save money when you plan Annapurna Conservation Area ice climbing trips.\r\n\r\nLooking for inspiration? Check out our articles about ice climbing in Annapurna Conservation Area including reviews of holidays and experiences, top 10s, gear and much more.\r\n\r\nUse the blue menus to change the activity or destination. You can also filter by the type of content you are looking for to help plan Annapurna Conservation Area ice climbing trips.\r\n\r\nTo ice climb in Annapurna Conservation Area is a great way to spend your time and we are stoked to share our knowledge with you. So scroll down, look at the top holidays, best courses, epic experiences, awesome accommodation, money saving discounts and inspiring articles in this guide to Annapurna Conservation Area ice climbing trips.', 'annapurnaiceclimbing1.jpg', 'annapurnaiceclimbing2.jpg', 'annapurnaiceclimbing3.jpg', 'https://awe365.com/activity/ice-climbing/destination/annapurna-conservation-area/'),
(18, 10, 6, 'Trisuli Kayaking and Canyoning', 'The Trisuli is Nepal’s best river for day trips. Located centrally between Kathmandu, Chitwan, and Pokhara, it’s the perfect way to break up a long bus journey to your next destination. Why sit on a bus for 8 hours when you can raft half of it! It’s one of the most popular day trips in Nepal and is great for everyone, all year round.\r\n', 'trisulikayaking1.jpg', 'trisulikayaking2.jpg', 'trisulikayaking3.jpg', 'https://www.kimkim.com/c/trisuli-rafting-kayaking-trip');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sport_detail_ko_view`
-- (See below for the actual view)
--
CREATE TABLE `sport_detail_ko_view` (
`name` varchar(255)
,`price` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sport_view`
-- (See below for the actual view)
--
CREATE TABLE `sport_view` (
`sport_detail_id` int(11)
,`sport_id` int(11)
,`name` varchar(255)
,`price` double
,`opening_time` time
,`closing_time` time
,`slot_duration` int(11)
,`total_slots` int(11)
,`max_slot_capacity` int(11)
,`location` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `age`, `country`, `password`, `role`, `status`) VALUES
(3, 'Sataka Gintoki', 'gintama', 'gintama@gmail.com', 30, 'Kyoto', '0fe2fae8317d253679535764c7843200', 3, 1),
(4, 'Uzumaki Naruto', 'naruto', 'naruto@gmail.com', 29, 'Japan', 'fa6400da740226c369f5e71b85b50ef9', 0, 1),
(5, 'Aman Khan', 'aman', 'khanaman9730@gmail.com', 25, 'Nepal', '73b25522615dac9cfd289ee35faef4ef', 3, 1),
(6, 'Gopal Thapa', 'gopal', 'gopstc@gmail.com', 25, 'Nepal', '0c675f5c3546d0f6f99d90b5ab8dfe7e', 3, 1),
(7, 'Monkey D. Luffy', 'luffy', 'luffy@gmail.com', 19, 'Japan', 'bc0062c11767b7edaebb887c547180e0', 0, 1);

-- --------------------------------------------------------

--
-- Structure for view `booking_detail`
--
DROP TABLE IF EXISTS `booking_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `booking_detail`  AS SELECT `booking`.`booking_id` AS `booking_id`, `booking`.`sport_detail_id` AS `sport_detail_id`, `slot`.`slot_id` AS `slot_id`, `booking`.`user_id` AS `user_id`, `users`.`name` AS `name`, `sport_detail`.`name` AS `sport_name`, `slot`.`start_time` AS `start_time`, `slot`.`number_of_people` AS `number_of_people`, `booking`.`quantity` AS `quantity`, `slot`.`slot_date` AS `slot_date` FROM ((((`slot` join `booked_slot`) join `booking`) join `sport_detail`) join `users`) WHERE `sport_detail`.`sport_detail_id` = `booking`.`sport_detail_id` AND `booking`.`booking_id` = `booked_slot`.`booking_id` AND `booked_slot`.`slot_id` = `slot`.`slot_id` AND `users`.`user_id` = `booking`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `sport_detail_ko_view`
--
DROP TABLE IF EXISTS `sport_detail_ko_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sport_detail_ko_view`  AS SELECT `sport`.`name` AS `name`, `sport`.`price` AS `price` FROM (`sport` join `sport_detail`) WHERE `sport`.`sport_id` = `sport_detail`.`sport_id` ;

-- --------------------------------------------------------

--
-- Structure for view `sport_view`
--
DROP TABLE IF EXISTS `sport_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sport_view`  AS SELECT `sd`.`sport_detail_id` AS `sport_detail_id`, `s`.`sport_id` AS `sport_id`, `sd`.`name` AS `name`, `s`.`price` AS `price`, `s`.`opening_time` AS `opening_time`, `s`.`closing_time` AS `closing_time`, `s`.`slot_duration` AS `slot_duration`, `s`.`total_slots` AS `total_slots`, `s`.`max_slot_capacity` AS `max_slot_capacity`, `l`.`location` AS `location` FROM ((`sport_detail` `sd` join `sport` `s`) join `location` `l`) WHERE `sd`.`sport_id` = `s`.`sport_id` AND `sd`.`location_id` = `l`.`location_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_detail`
--
ALTER TABLE `sport_detail`
  ADD PRIMARY KEY (`sport_detail_id`),
  ADD KEY `ForeignKeySportId` (`sport_id`),
  ADD KEY `ForeignKeyLocationId` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sport_detail`
--
ALTER TABLE `sport_detail`
  MODIFY `sport_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
