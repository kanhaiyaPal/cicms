-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 12:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visahq_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_application_status`
--

CREATE TABLE `ci_application_status` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_inquiry`
--

CREATE TABLE `ci_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_inquiry`
--

INSERT INTO `ci_inquiry` (`id`, `name`, `email`, `mobile`, `message`, `source`) VALUES
(2, 'test', 'test@test.com', '4545454545', 'test', 'contact_us_page');

-- --------------------------------------------------------

--
-- Table structure for table `ci_localisation`
--

CREATE TABLE `ci_localisation` (
  `id` int(11) NOT NULL,
  `country_name` varchar(200) NOT NULL,
  `phone_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_localisation`
--

INSERT INTO `ci_localisation` (`id`, `country_name`, `phone_code`) VALUES
(1, 'Afghanistan', '+93'),
(2, 'Albania', '+355'),
(3, 'Algeria', '+213'),
(4, 'American Samoa', '+1'),
(5, 'Andorra', '+376'),
(6, 'Angola', '+244'),
(7, 'Anguilla', '+1'),
(8, 'Antigua and Barbuda', '+1'),
(9, 'Argentina', '+54'),
(10, 'Armenia', '+374'),
(11, 'Aruba', '+297'),
(12, 'Australia', '+61'),
(13, 'Austria', '+43'),
(14, 'Azerbaijan', '+994'),
(15, 'Bahamas', '+1'),
(16, 'Bahrain', '+973'),
(17, 'Bangladesh', '+880'),
(18, 'Barbados', '+1'),
(19, 'Belarus', '+375'),
(20, 'Belgium', '+32'),
(21, 'Belize', '+501'),
(22, 'Benin', '+229'),
(23, 'Bermuda', '+1'),
(24, 'Bhutan', '+975'),
(25, 'Bolivia', '+591'),
(26, 'Bosnia', '+387'),
(27, 'Herzegovina', '+387'),
(28, 'Botswana', '+267'),
(29, 'Brazil', '+55'),
(30, 'British Virgin Islands', '+1'),
(31, 'Brunei Darussalam', '+673'),
(32, 'Bulgaria', '+359'),
(33, 'Burkina Faso', '+226'),
(34, 'Burundi', '+257'),
(35, 'Cambodia', '+855'),
(36, 'Cameroon', '+237'),
(37, 'Canada', '+1'),
(38, 'Cape Verde', '+238'),
(39, 'Cayman Islands', '+1'),
(40, 'Central African Republic', '+236'),
(41, 'Chad', '+235'),
(42, 'Chile', '+56'),
(43, 'China', '+86'),
(44, 'Christmas Island', '+61'),
(45, 'Cocos Islands', '+891'),
(46, 'Colombia', '+57'),
(47, 'Comoros', '+269'),
(48, 'Democratic Republic of the Congo', '+243'),
(49, 'Congo Republic', '+242'),
(50, 'Cook Islands', '+682'),
(51, 'Costa Rica', '+506'),
(52, 'Croatia', '+385'),
(53, 'Cuba', '+53'),
(54, 'Cyprus', '+357'),
(55, 'Czech Republic', '+420'),
(56, 'Denmark', '+45'),
(57, 'Djibouti', '+253'),
(58, 'Dominica', '+1'),
(59, 'Dominican Republic', '+1'),
(60, 'Ecuador', '+593'),
(61, 'Egypt', '+20'),
(62, 'El Salvador', '+503'),
(63, 'Equatorial Guinea', '+240'),
(64, 'Eritrea', '+291'),
(65, 'Estonia', '+372'),
(66, 'Ethiopia', '+251'),
(67, 'Falkland Islands', '+500'),
(68, 'Faroe Islands', '+298'),
(69, 'Fiji', '+679'),
(70, 'Finland', '+358'),
(71, 'France', '+33'),
(72, 'French Guiana', '+594'),
(73, 'French Polynesia', '+689'),
(74, 'Gabon', '+241'),
(75, 'Gambia', '+220'),
(76, 'Georgia', '+995'),
(77, 'Germany', '+49'),
(78, 'Ghana', '+233'),
(79, 'Gibraltar', '+350'),
(80, 'Greece', '+30'),
(81, 'Greenland', '+299'),
(82, 'Grenada', '+1'),
(83, 'Guadeloupe', '+590'),
(84, 'Guam', '+1'),
(85, 'Guatemala', '+502'),
(86, 'Guinea', '+224'),
(87, 'Guinea Bissau', '+245'),
(88, 'Guyana', '+592'),
(89, 'Haiti', '+509'),
(90, 'Honduras', '+504'),
(91, 'Hong Kong', '+852'),
(92, 'Hungary', '+36'),
(93, 'Iceland', '+354'),
(94, 'India', '+91'),
(95, 'Indonesia', '+62'),
(96, 'Iran', '+98'),
(97, 'Iraq', '+964'),
(98, 'Ireland', '+353'),
(99, 'Israel', '+972'),
(100, 'Italy', '+39'),
(101, 'Ivory Coast(Côte d Ivoire)', '+225'),
(102, 'Jamaica', '+1'),
(103, 'Japan', '+81'),
(104, 'Jordan', '+962'),
(105, 'Kazakhstan', '+7'),
(106, 'Kenya', '+254'),
(107, 'Kiribati', '+686'),
(108, 'Kosovo', '+381'),
(109, 'Kuwait', '+965'),
(110, 'Kyrgyzstan', '+996'),
(111, 'Laos', '+856'),
(112, 'Latvia', '+371'),
(113, 'Lebanon', '+961'),
(114, 'Lesotho', '+266'),
(115, 'Liberia', '+231'),
(116, 'Libya', '+218'),
(117, 'Liechtenstein', '+423'),
(118, 'Lithuania', '+370'),
(119, 'Luxembourg', '+352'),
(120, 'Macau', '+853'),
(121, 'Macedonia', '+389'),
(122, 'Madagascar', '+261'),
(123, 'Malawi', '+265'),
(124, 'Malaysia', '+60'),
(125, 'Maldives', '+960'),
(126, 'Mali', '+223'),
(127, 'Malta', '+356'),
(128, 'Marshall Islands', '+692'),
(129, 'Martinique', '+596'),
(130, 'Mauritania', '+222'),
(131, 'Mauritius', '+230'),
(132, 'Mayotte', '+262'),
(133, 'Mexico', '+52'),
(134, 'Micronesia', '+691'),
(135, 'Moldova', '+373'),
(136, 'Monaco', '+377'),
(137, 'Mongolia', '+976'),
(138, 'Montenegro', '+382'),
(139, 'Montserrat', '+1'),
(140, 'Morocco', '+212'),
(141, 'Mozambique', '+258'),
(142, 'Myanmar', '+95'),
(143, 'Namibia', '+264'),
(144, 'Nauru', '+674'),
(145, 'Nepal', '+977'),
(146, 'Netherlands', '+31'),
(147, 'Netherlands Antilles', '+599'),
(148, 'New Caledonia', '+687'),
(149, 'New Zealand', '+64'),
(150, 'Nicaragua', '+505'),
(151, 'Niger', '+227'),
(152, 'Nigeria', '+234'),
(153, 'Niue', '+683'),
(154, 'Norfolk Island', '+672'),
(155, 'North Korea', '+850'),
(156, 'Norway', '+47'),
(157, 'Oman', '+968'),
(158, 'Pakistan', '+92'),
(159, 'Palau', '+680'),
(160, 'Palestine', '+970'),
(161, 'Panama', '+507'),
(162, 'Papua New Guinea', '+675'),
(163, 'Paraguay', '+595'),
(164, 'Peru', '+51'),
(165, 'Philippines', '+63'),
(166, 'Pitcairn Island', '+64'),
(167, 'Poland', '+48'),
(168, 'Portugal', '+351'),
(169, 'Puerto Rico', '+1'),
(170, 'Qatar', '+974'),
(171, 'Reunion', '+262'),
(172, 'Romania', '+40'),
(173, 'Russia', '+7'),
(174, 'Rwanda', '+250'),
(175, 'Saint Helena', '+290'),
(176, 'Saint Kitts and Nevis', '+1'),
(177, 'Saint Lucia', ''),
(178, 'Saint Martin', '+590'),
(179, 'Saint Pierre Miquelon', '+508'),
(180, 'Saint Vincent and the Grenadines', '+1'),
(181, 'Samoa', '+685'),
(182, 'San Marino', '+378'),
(183, 'Sao Tome and Principe', '+239'),
(184, 'Saudi Arabia', '+966'),
(185, 'Senegal', '+221'),
(186, 'Serbia', '+381'),
(187, 'Seychelles', '+248'),
(188, 'Sierra Leone', '+232'),
(189, 'Singapore', '+65'),
(190, 'Slovak Republic', '+421'),
(191, 'Slovenia', '+386'),
(192, 'Solomon Islands', '+677'),
(193, 'Somalia', '+252'),
(194, 'South Africa', '+27'),
(195, 'South Korea', '+82'),
(196, 'South Sudan', '+211'),
(197, 'Spain', '+34'),
(198, 'Sri Lanka', '+94'),
(199, 'Sudan', '+249'),
(200, 'Suriname', '+597'),
(201, 'Swaziland', '+268'),
(202, 'Sweden', '+46'),
(203, 'Switzerland', '+41'),
(204, 'Syria', '+963'),
(205, 'Taiwan', '+886'),
(206, 'Tajikistan', '+992'),
(207, 'Tanzania', '+255'),
(208, 'Thailand', '+66'),
(209, 'Timor Leste', '+670'),
(210, 'Togo', '+228'),
(211, 'Tokelau', '+690'),
(212, 'Tonga', '+676'),
(213, 'Trinidad and Tobago', '+1'),
(214, 'Tunisia', '+216'),
(215, 'Turkey', '+90'),
(216, 'Turkmenistan', '+993'),
(217, 'Tuvalu', '+688'),
(218, 'US Virgin Islands', '+1'),
(219, 'Uganda', '+256'),
(220, 'Ukraine', '+380'),
(221, 'United Arab Emirates', '+971'),
(222, 'United Kingdom', '+44'),
(223, 'United States of America', '+1'),
(224, 'Uruguay', '+598'),
(225, 'Uzbekistan', '+998'),
(226, 'Vanuatu', '+678'),
(227, 'Vatican', '+39'),
(228, 'Venezuela', '+58'),
(229, 'Vietnam', '+84'),
(230, 'Wallis Futuna Islands', '+681'),
(231, 'Yemen', '+967'),
(232, 'Zambia', '+260'),
(233, 'Zimbabwe', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `ci_media`
--

CREATE TABLE `ci_media` (
  `id` int(11) NOT NULL,
  `media_path` varchar(200) NOT NULL,
  `media_type` varchar(100) NOT NULL,
  `page_id` int(11) NOT NULL,
  `media_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_media`
--

INSERT INTO `ci_media` (`id`, `media_path`, `media_type`, `page_id`, `media_name`) VALUES
(2, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/88af4647f0ddb9f8ad7cee0bd050fb4a.png', 'image/png', 3, '88af4647f0ddb9f8ad7cee0bd050fb4a.png'),
(4, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/1d12b96105e9ec2fe3ba67d17483841c.png', 'image/png', 3, '1d12b96105e9ec2fe3ba67d17483841c.png'),
(6, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/b66338a3c8c04707e316515c4f83687b.png', 'image/png', 3, 'b66338a3c8c04707e316515c4f83687b.png'),
(7, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/bb15e6975e9bb87451cb833e402a26bf.jpg', 'image/jpeg', 3, 'bb15e6975e9bb87451cb833e402a26bf.jpg'),
(10, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/f3568a413bd6af37e350cb7c369c72e1.jpg', 'image/jpeg', 6, 'f3568a413bd6af37e350cb7c369c72e1.jpg'),
(12, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/9a18c8abdccf2417f7786379542f5487.jpg', 'image/jpeg', 8, '9a18c8abdccf2417f7786379542f5487.jpg'),
(13, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/7a4ac1f0d271817514c0d40cf0d4e597.jpg', 'image/jpeg', 9, '7a4ac1f0d271817514c0d40cf0d4e597.jpg'),
(14, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/d3c2f1824dbb1e94e6b146dd8344a30b.jpg', 'image/jpeg', 10, 'd3c2f1824dbb1e94e6b146dd8344a30b.jpg'),
(15, 'D:/wamp/www/kanhaiya/visahq/ci/uploads/pages/011fc2f0d37101ae62b73384ab29067e.jpg', 'image/jpeg', 11, '011fc2f0d37101ae62b73384ab29067e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_pages`
--

CREATE TABLE `ci_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `meta-description` varchar(250) NOT NULL,
  `meta-tags` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `public_status` int(11) NOT NULL DEFAULT '0',
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_pages`
--

INSERT INTO `ci_pages` (`id`, `title`, `meta-description`, `meta-tags`, `content`, `public_status`, `last_modified`, `url`, `parent_id`) VALUES
(3, 'About Us', 'kolla', 'mark', '<p>Evisaonline is the 100% owned subsidary of DUNST &amp; CLARK PLC. We are committed to provide exemplary services to our client in obataining travel visa for UAE.Our visa services include, visa advise, pre-checking of application form before submission, applying visa on our client behalf and subsequent delivery of visa.&nbsp;</p>\r\n\r\n<p>e-visa services is the key offerings from D&amp;C to its worldwide clients. D&amp;C has state of the art online management system to support tracking of visa applications. We have effectively deployed Six Sigma Methodology to streamline processes &amp; workflows for visa applications. . Our worldwide operations are certified for Quality Management System for Information Security Management System to ensure data security at every stage of worldwide operations.<br />\r\n<br />\r\n&nbsp;We have both technical &amp; financial capabilities to deliver outsourcing solutions. We have a dedicated team of experts to manage day to day operations seamlessly and a higly skilled project management team to deliver on high magnitude projects worldwide.<br />\r\n<br />\r\nD&amp;C is a registered company under Republic of India&rsquo;s company&rsquo;s act 2013 and has a corporate office in Gurgaon. We have overseas support office based out of United Kingdom, United States of America and United Arab Emirates servicing our clients worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2017-04-12 07:48:25', 'about-us', 0),
(6, 'Thank you', 'Thank you for choosing Evisas Online', 'Thank you for choosing Evisas Online', '<p>Thank you for choosing E-Visas Online Services. Your tracking Id and login Id will be generated once the payment is successfull. Click on below link if you are not redirected autmatically....</p>\r\n\r\n<p>&nbsp;</p>\r\n<a href="https://www.paypal.com/in/webapps/mpp/send-payments-online"><img id="previewImage" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" alt="Preview Image"></a>\r\n<p>&nbsp;</p>\r\n', 0, '2017-03-20 10:15:41', 'thank-you', 0),
(8, 'Privacy Policy', 'privacy policy', 'privacy policy', '<p><strong>Privacy &amp; Cookie Statement</strong></p>\r\n\r\n<p>We at evisaonline worldwide respect your data privacy and are committed to complete protection of sensitive data of any visitor on our website.To manitain your trust in us to keep security of your personal information that we receive from this website we have carefully eastablished this privacy statement.By visiting evisasonline, you are accpeting and consenting to the practices described in this Privacy Statement.&nbsp;<br />\r\n<br />\r\n<strong>Application of Policy</strong><br />\r\n<br />\r\nPlease read our privacy statement carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.&nbsp;Third Party Links: Our website may be linked to other websites which are developed by other people over whom we do not exercise no control. This policy does not apply to the practices odopted by such third parties websites.&nbsp;These other third party websites may place their own cookies on your computer, collect data or solict personal information. We are not responsible for privacy practices for such third party websites.&nbsp;</p>\r\n\r\n<p><strong>What personal information do we collect from people that visit our website?</strong></p>\r\n\r\n<p>When ordering or registering on our website, as appropriate, you maybe asked to enter your name, email address, mailing address, phone number, credit card information, passport information or other details to help you with our services.&nbsp;<br />\r\n<br />\r\n<strong>When do we collect the information?</strong></p>\r\n\r\n<p>We collect information from you when you register on our website, place an order, subscribe to a newsletter fill out the form or enter information on our website.&nbsp;<br />\r\n<br />\r\n<strong>How do we use your information?</strong><br />\r\n<br />\r\nWe may use the information we collect from you when you register, book an order, signup for newsletter, respond to a survey/feedback or marketing communications, surf the website, or use certain other site features in the following ways:<br />\r\n<br />\r\n1/ To quickly process your transaction<br />\r\n2/ To ask for ratings and feedback for our services<br />\r\n3/ To followup after correspondence (live chat, email or phone queries)<br />\r\n<br />\r\n<strong>How do we protect your information?</strong><br />\r\n<br />\r\nOur website is scanned on a regular basis for security holes and known vulnerabilities in order to make your visit to our website as safe as possible.&nbsp;We sue regular melware scanning.&nbsp;</p>\r\n\r\n<p><br />\r\nYour personal information is contained behind secured networks &amp; is only accessible by a limited number of persons who have special access rights to such systems, and are required to keep the information confidential.&nbsp;In addition all sensitive/credit information information you supply is encrypted via Secure Socket Layer (SSL) technology.&nbsp;</p>\r\n\r\n<p><br />\r\nWe implement a variety of security measures when a user places an order, enter, access, submits their information to maintain the safety of your personal data.&nbsp;</p>\r\n\r\n<p><br />\r\nFor your convenience we may store your credit card information kept for more than 60 days in order to expedite future orders, and to automate the billing process.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Do we use Cookies?</strong></p>\r\n\r\n<p><br />\r\nYes, Cookies are small files that a website or its service provider transfer to your computer&#39;s hard drive through your web browser (if you allow) that enables the site&#39;s or service provider&#39;s system to recognize&nbsp;your browser and capture and remember certain information. For instance, we use cookies to remember and process your order. They are also use to help us understand your prefrences based on previous or current site activity, which enable us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can improve and offer better&nbsp;site experiences and tools in the future.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>We use Cookies to?</strong></p>\r\n\r\n<p>1. Help remember and process your application<br />\r\n2. Understand and save user&#39;s preferences for future visits<br />\r\n3. Compile aggregate data about site traffic and site interactions in order to offer better site experiences and tools in future. We may also use trusted third-party services that track these information on our behalf.&nbsp;</p>\r\n\r\n<p><br />\r\nYou can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser settings. Since browser is a little different, look at your browser&#39;s HELP MENU to learn the correct way to modify your cookies settings.&nbsp;</p>\r\n\r\n<p>If you turn off cookies, some of the features that makes your site experience more efficient may not function properly. It won&#39;t affect the user&#39;s experience that makes your experience more efficient and may not function properly.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Third Party disclosure</strong></p>\r\n\r\n<p><br />\r\nWe do not sell, trade or otherwise transfer to outside parties your Peronally Identifiable Information unless we provide users with advance notice. This does not include website hosting partners, and other parties who assist us in operating our website, conducting our business, or serving our users, so long as those parties agree to keep this information confidential. We may also release information when apropriate to complywith the law, enforce our siute policies, or protect our&#39;s or others right, property or safety.&nbsp;<br />\r\nHowever, non-personally identifiable visitor information maybe provided to other parties for marketing, advertizing or other uses.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Google</strong></p>\r\n\r\n<p><br />\r\nGoogle advertizing requirements can be summed up by google Advertising Priciples. They are put in place to provide a positive experience for users. We use Google AdSense Advertising on our website.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>We have implemented the following:</strong></p>\r\n\r\n<p><br />\r\n1. Remarketing with Google AdSense<br />\r\n2. Google display network impression reporting<br />\r\n3. Demographies &amp; interest reporting<br />\r\nDouble click platform integration</p>\r\n\r\n<p><br />\r\n<strong>How does our site handles Do not track signals?</strong></p>\r\n\r\n<p><br />\r\nWe honor do not track signals and do not track, plant cookies, or use advertising when a DNT (Do Not Track) browser mechanism is in place.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>CAN SPAM Act</strong></p>\r\n\r\n<p><br />\r\nCAN SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipient the right to have email stopped from being sent to them, and spells out though penalties for violation.</p>\r\n\r\n<p><br />\r\n<strong>We collect your email address in order to:</strong></p>\r\n\r\n<p>1. Send information, respond to inquiries, and/or other requests or questions<br />\r\n2. Process applications and to send information and updates pertaining to your application<br />\r\n3. Send you additional information related to our services<br />\r\n4. Market to our mailing list or continue to send emails to our clients after the original transaction has occurred.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>To be in accordance with CAPSPAM, we agree to the following:</strong></p>\r\n\r\n<p><br />\r\n1. Not use false or misleading subjects or email addresses for communication<br />\r\n2. Identify the message as an advertisement in some reasonable way<br />\r\n3. Include the physical address of our business or site headquaters<br />\r\n4. Honor opt-out/unsubscribe requests quickly<br />\r\n5. Allow users to unsubscribe by using the link at the bottom of each email.</p>\r\n\r\n<p><br />\r\n<strong>If at anytime you would like to unsubcribe from receiving future emails:</strong></p>\r\n\r\n<p><br />\r\nFollow the instructions at the bottom of each email and we will promptly remove you from all future correspondence.&nbsp;</p>\r\n\r\n<p><strong>Summary:</strong></p>\r\n\r\n<p><br />\r\nBy assessing and using it&#39;s services, you unconditionally agree with the terms of this privacy statement. You also agree with the terms that govern the use of this website and its services and that also govern all information provided by you and other users of evisasonline.com. If you do not agree to all or any of the terms of this privacy statement, please do not use this site.&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Contacting us</strong></p>\r\n\r\n<p><br />\r\nIf there is any questions regarding this privacy statement, you may contact us at info@evisasonline.com</p>\r\n\r\n<p><br />\r\nLast Edited on 2017- 04- 09</p>\r\n', 0, '2017-04-12 09:02:13', 'privacy-policy', 0),
(9, 'Terms of Use', 'terms of use', 'terms of use', '<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.Minors or people below 18 years old are not allowed to use this Website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Evisaonline (herein after referred to as &ldquo;The Company&rdquo;) accepts passports and other documents for processing only under these terms &amp; conditions. Any variation of these terms &amp; conditions is only made in writing on the company&rsquo;s letterhead and signed by the Director of the the company. These terms &amp; conditions are strictly governed by the laws of India.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;The company will make every effort to obtain visa valid for the destination, purpose, period of time and number of entries requested by the client. However, The Company is not responsible for any decision by the relevant authority not to issue the required visa or to issue one that is different from the one requested. Furthermore, it is client&rsquo;s express responsibility to ensure that the visa received matches their requirements. In the event that:</p>\r\n\r\n<p>1/ the visa does not match the client&rsquo;s requirements, OR</p>\r\n\r\n<p>2/ the visa is refused, OR</p>\r\n\r\n<p>3/ the visa is delayed</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Should the company has caused any of these scenarios through error of omission, then The Company&rsquo;s liability is strictly limited to the cost of the replacement visa or refund of all fees paid. The Company cannot accept any responsibility for any other loss as such, but not limited to; lost profits, lost income, or lost airfares.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Intellectual Property Rights</strong></p>\r\n\r\n<p>Other than the content you own, under these Terms, The Company and/or its licensors own all the intellectual property rights and materials contained in this Website.You are granted limited license only for purposes of viewing the material contained on this Website.Our site and all its content are protected by the copyright laws of each of the companies in which we do business and by international copyright law. Legal action will be taken against anyone who violates our copyrights without consent in writing from us. This restriction applies to all content and design of the entire site and all individual elements and files. This includes all media files, graphics, text, forms, stored data, page elements and the software associated with it. All the above is the protected property of our company and is protected by international and national copyright laws.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Restrictions</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You are specifically restricted from all of the following</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; publishing any Website material in any other media;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; selling, sublicensing and/or otherwise commercializing any Website material;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; publicly performing and/or showing any Website material;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; using this Website in any way that is or may be damaging to this Website;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; using this Website in any way that impacts user access to this Website;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; using this Website to engage in any advertising or marketing.</p>\r\n\r\n<p>Certain areas of this Website are restricted from being access by you and hibiscustreeconsulting.com may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Limitation of liability</strong></p>\r\n\r\n<p>In no event shall The Company, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.&nbsp; The Company, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Indemnification</strong></p>\r\n\r\n<p>You hereby indemnify to the fullest extent The Company from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Variation of Terms</strong></p>\r\n\r\n<p>When you visit our site, it is solely your responsibility to read and take note of our Terms and Conditions. We reserve the right to change these Terms and Conditions without any prior warning, for any and all reasons that may arise, not limited to law and security issues, or changes to the products and services we offer.</p>\r\n\r\n<p><strong>Terminating Services</strong></p>\r\n\r\n<p>The company reserves the right to terminate our service to you, including any E-Visa application, at any time and for any reason. Events that may lead to the termination of our service may include providing false, misleading or inaccurate information, illegal or improper use of our site or services, and any other violation of our Terms and Conditions. Reasons for termination are not limited to the above.</p>\r\n\r\n<p>If we have to cancel or discontinue our service to you, such termination will include withdrawal of your access to our website or any part of said site, cancelation of any and all services, and termination of your registration.</p>\r\n\r\n<p><strong>Governing Law &amp; Jurisdiction</strong></p>\r\n\r\n<p>These Terms will be governed by and interpreted in accordance with the laws of India, and you submit to the non-exclusive jurisdiction of the state and federal courts located in delhi for the resolution of any disputes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Clients Responsibility</strong></p>\r\n\r\n<p>It is the traveler&rsquo;s responsibility to meet and comply with all regulations, laws and travel requirements when visiting another country. If you provide false or incorrect information on your E-visa application form, you may be denied boarding of the aircraft or ship transporting you to your desired destination, or you may be denied entry at the border. We are not liable for any claims or compensation in such instances.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Site Ownership and Accuracy</strong></p>\r\n\r\n<p>The company do everything in our power to ensure that the information provided on this site is current and accurate. However, it is possible that the content may contain errors or omissions. The Company cannot be held responsible for any financial loss or inconvenience resulting from such oversights. This includes any liability by our company and/or evisaonline.com, whether material or immaterial, direct or indirectly arising from damages as a result of using our site or accessing the information contained therein. We also cannot be held liable for losses arising through technical errors, or any other reason.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Companyprovide information that is publically available, along with our personal knowledge of the services that we provide. Our site, products and materials are all provided on an &ldquo;as-is&rdquo; basis and provide no warranty of any kind, either express or implied. We strongly dispute any and all warranties to the greatest extent allowed by law, whether implied or express. This includes, but is not limited to, implied warranties or fitness for a specific purpose, of merchantability and of non-infringement. As a company, we do not warrant or represent that any of the functions or services provided by this site are error-free, or free of interruption, that any defects will be repaired, or that the site and its servers are free of any harmful components, viruses or malware.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Company makes no warranties or representations of any kind concerning the materials, content and services provided at this site with regard to reliability, usefulness, timeliness, adequacy, accuracy or any other functions or attributes. Where governments do not allow such exclusions or limitations regarding warranties, the above listed limitations may not be applicable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our site and its content are provided strictly for personal non-commercial use. Users may download any information from the site and store it on a personal computer, provided there is no change to any trademarks, copyright notices or other proprietary information. The information cannot be redistributed, either in the original language or as a translation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Some visitors arrive at our site from a link on a third party website. We cannot be held liable for such sites, including their content or use, as they are not under our control. If you wish to use any third party site or provider, it is important that you first read carefully that site&#39;s terms and conditions or privacy policy. When we provide a link to a third party site, we check that the site is not contravening any laws. If we do uncover any violation, we take immediate measures to remedy the situation. Despite our efforts, it is not possible to make an ongoing permanent review of other linked sites and cannot reasonably be expected to do so.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Refund Policy</strong></p>\r\n\r\n<p>Since The Company is into online visa filing, the application is filed with the embassy on a real time basis. Hence, no refund will be given.</p>\r\n', 0, '2017-04-12 09:03:45', 'terms-of-use', 0),
(10, 'Security Policy', 'Security Policy', 'Security Policy', '<p>This text is only for dummy original text comes here, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 0, '2017-03-24 08:58:32', 'security-policy', 0),
(11, 'Disclaimer', 'Disclaimer', 'Disclaimer', '<p><strong>Please Note:</strong><br />\r\n<br />\r\nWe are not an embassy, and are not affiliated with any government department. If you wish to apply directly to the the relevant embassy, please consult their official website for guidelines on how and where to apply, application form and for information on their fees structure. In most cases embassies and government departments charge a fees for issuing a visa, although this may occassionally be waived off&nbsp;due to bilateral government agreements.&nbsp;<br />\r\n<br />\r\nWe are a private company, who assist with visa application on behalf of our clients. If you choose to utilize our services please be advised that, in addition to any embassy or governmental fees, we charge a handling fees&nbsp;for our services. These services include consultation and visa advise, the pre-checking of application before presentation, and ensuring both the delivery and collection of applications to/from the relevant embassy or government department on your behalf as your designated agent or courier.&nbsp;<br />\r\n<br />\r\n<strong>Important Disclaimer:</strong></p>\r\n\r\n<p>All visas are issued under sole descrition of UAE government.&nbsp;<br />\r\n<br />\r\nWe are committed to provide exemplary services to our client in obataining travel visa for UAE. Our services include visa advise, pre-checking of application form before submission, applying visa on your behalf and subsequent delivery of visa. If you wish to use our services we charge a handling fees for our services. We are not an embassy, and are not affiliated with any government department.&nbsp;You may wish to apply for a visa directly with the embassy for which you will not be charged a handling fees.</p>\r\n', 0, '2017-04-12 07:55:37', 'disclaimer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_page_settings`
--

CREATE TABLE `ci_page_settings` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `setting_name` varchar(500) NOT NULL,
  `setting_val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_page_settings`
--

INSERT INTO `ci_page_settings` (`id`, `page_id`, `setting_name`, `setting_val`) VALUES
(151, 1, 'home_top_summary', '<ul class="list1">\r\n	<li>Unmatched worldwide customer support by live chat &amp; emails</li>\r\n	<li>Demonstarted ability to check real time status of visa application</li>\r\n	<li>Error free application submission with embassy to reduce rejection rate</li>\r\n	<li>Secured online payment with 245 bit secured service layer</li>\r\n</ul>'),
(152, 1, 'home_bottom_summary', '<ul class="list1">\r\n	<li>Hassle Free Application Process</li>\r\n	<li>24/7 Support Team</li>\r\n	<li>No Hotel &amp; Flight Reservation Required</li>\r\n	<li>Fast Processing and delivery of visa in timely manner</li>\r\n	<li>Negligible Rejections</li>\r\n</ul>'),
(153, 1, 'home_feature_block', '<ul>\r\n	<li>Unmatched 24/7 customer support by live chat &amp; email</li>\r\n	<li>Demonstrated Ability to check real time status of visa application</li>\r\n	<li>Error free application submission with embassy to reduce rejections</li>\r\n	<li>Secured online payment with 245 bit Secured Service Locket</li>\r\n	<li>Robust online management tool for personal data security</li>\r\n	<li>Cost effective, as our prices are competitive</li>\r\n</ul>'),
(154, 2, 'contact_google_map', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9364336.130557468!2d-12.396291194650347!3d55.03945083595268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited+Kingdom!5e0!3m2!1sen!2sin!4v1489058958480" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `ci_payment_status`
--

CREATE TABLE `ci_payment_status` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reference_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_profiles`
--

CREATE TABLE `ci_profiles` (
  `id` int(11) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `passport` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_profiles`
--

INSERT INTO `ci_profiles` (`id`, `mobile`, `firstname`, `lastname`, `address`, `passport`) VALUES
(2, '5656565656', 'test', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_seo_data`
--

CREATE TABLE `ci_seo_data` (
  `id` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_seo_data`
--

INSERT INTO `ci_seo_data` (`id`, `page_title`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(6, 'contact', 'contact-uis', 'contact-us', 'contact-us'),
(7, 'login', 'login-register', 'login-register', 'login-register'),
(8, 'vapplication', 'visa application', 'visa-application', 'visa-application'),
(9, 'service-select', 'service-select', 'service-select', 'service-select'),
(10, 'myaccount', 'My Account', 'My Account', 'My Account'),
(11, 'track-status', 'Track Status', 'Track Status', 'Track Status'),
(12, 'visa-steps', 'Visa Steps', 'Visa Steps', 'Visa Steps'),
(14, 'testimonials', 'Testimonials', 'Testimonials', 'Testimonials'),
(15, 'home', 'home ecgg', 'home fsdfsdf', 'fdsfdsfdsf dsfsdfdsf'),
(16, 'prestep', 'Fill Application', 'Fill Application', 'Fill Application'),
(17, 'viewapplications', 'View Applications', 'View Applications', 'View Applications'),
(18, 'paymentsuccess', 'Payment Successfull', 'Payment Successfull', 'Payment Successfull'),
(19, 'editmainapplicant', 'Edit Applicant Data', 'Edit Applicant Data', 'Edit Applicant Data');

-- --------------------------------------------------------

--
-- Table structure for table `ci_service_questions`
--

CREATE TABLE `ci_service_questions` (
  `id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `help_text` text NOT NULL,
  `required` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sitesettings`
--

CREATE TABLE `ci_sitesettings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(500) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sitesettings`
--

INSERT INTO `ci_sitesettings` (`id`, `setting_name`, `setting_value`) VALUES
(7, 'site_footer_twitter', ''),
(8, 'site_footer_instagram', ''),
(10, 'site_footer_pinterest', ''),
(22, 'site_logo', '8811e42742dd7f2850b47fe5b4f3fe68.png'),
(40, 'site_email', 'info@evisasonline.com'),
(41, 'site_phone', '9898989898'),
(42, 'site_address', '344, test business park, Gurgaon'),
(43, 'site_footer_facebook', '#'),
(44, 'site_footer_googleplus', 'https://plus.google.com/'),
(45, 'site_footer_linkedin', '#'),
(46, 'site_footer_disclaimer', '<p>This text is only for dummy original text comes here, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.test</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ci_testimonials`
--

CREATE TABLE `ci_testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `order_s` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_testimonials`
--

INSERT INTO `ci_testimonials` (`id`, `title`, `content`, `order_s`, `image`, `company`, `designation`) VALUES
(2, 'AMIT, US', '<p>This is the only place to stay in Gurgaon! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of Cold-Drink while looking out your City view window</p>', 2, '', 'Company', 'Designation'),
(3, 'RAMIT, USA', '<p>This is the only place to stay in Gurgaon! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of Cold-Drink while looking out your City view window</p>', 1, '', 'Company', 'Designation'),
(4, 'Mukesh, Gurgaon', '<p>This is the only place to stay in Gurgaon! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of Cold-Drink while looking out your City view window</p>', 3, '', 'Company', 'Designation');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `password`, `email`, `profile_id`, `last_login`) VALUES
(1, 'admin', '$2y$10$4XT/ZJjgbz4dnOaN8Ohxoe49j8vlPN1TjN058C/./jqSIdj/yPvlW', 'admin@admin.com', 0, '2017-03-27 12:56:50'),
(3, '5656565656', '$2y$10$4XT/ZJjgbz4dnOaN8Ohxoe49j8vlPN1TjN058C/./jqSIdj/yPvlW', 'test@admin.com', 2, '2017-04-19 10:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_applications`
--

CREATE TABLE `ci_user_applications` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(100) NOT NULL,
  `applicant_firstname` varchar(500) NOT NULL,
  `applicant_lastname` varchar(500) NOT NULL,
  `arrival_date` varchar(100) NOT NULL,
  `departure_date` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `emirates` varchar(100) NOT NULL,
  `uae_phone` varchar(100) NOT NULL,
  `uae_hotel_address` text NOT NULL,
  `emergency_name` varchar(200) NOT NULL,
  `emergency_phone` varchar(200) NOT NULL,
  `applicant_gender` varchar(100) NOT NULL,
  `applicant_dob` varchar(100) NOT NULL,
  `applicant_birthplace` varchar(200) NOT NULL,
  `applicant_birthcountry` varchar(100) NOT NULL,
  `applicant_religion` varchar(200) NOT NULL,
  `applicant_profession` varchar(200) NOT NULL,
  `applicant_fathername` varchar(200) NOT NULL,
  `applicant_mothername` varchar(200) NOT NULL,
  `applicant_marital` varchar(100) NOT NULL,
  `applicant_passport_number` varchar(200) NOT NULL,
  `applicant_passport_placeofissue` varchar(100) NOT NULL,
  `applicant_passport_issuingcountry` varchar(100) NOT NULL,
  `applicant_passport_issuedate` varchar(100) NOT NULL,
  `applicant_passport_expiry` varchar(100) NOT NULL,
  `applicant_citizen_of` varchar(100) NOT NULL,
  `applicant_living_in` varchar(100) NOT NULL,
  `applicant_travelling_to` varchar(100) NOT NULL,
  `is_coapplicant` int(11) NOT NULL,
  `selected_service` int(11) NOT NULL,
  `payable_fee` varchar(100) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `application_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_files`
--

CREATE TABLE `ci_user_files` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `coloured_passport` varchar(100) NOT NULL,
  `return_ticket` varchar(100) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `residence_proof` varchar(100) NOT NULL,
  `hotel_reservation` varchar(100) NOT NULL,
  `misc_documents` varchar(100) NOT NULL,
  `coloured_passport_reject` varchar(100) NOT NULL DEFAULT '0',
  `return_ticket_reject` varchar(100) NOT NULL DEFAULT '0',
  `employee_id_reject` varchar(100) NOT NULL DEFAULT '0',
  `residence_proof_reject` varchar(100) NOT NULL DEFAULT '0',
  `hotel_reservation_reject` varchar(100) NOT NULL DEFAULT '0',
  `misc_documents_reject` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_visa_services`
--

CREATE TABLE `ci_visa_services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(200) NOT NULL,
  `for_citizen` varchar(100) NOT NULL,
  `travelling_to` varchar(100) NOT NULL,
  `living_in` varchar(100) NOT NULL,
  `visa_type` int(11) NOT NULL,
  `intro_content` text NOT NULL,
  `embassy_fee` varchar(100) NOT NULL,
  `service_fee` varchar(100) NOT NULL,
  `extended_service_fee` varchar(100) NOT NULL,
  `processing_time` varchar(100) NOT NULL,
  `visa_validity` varchar(100) NOT NULL,
  `visa_max_stay` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_visa_services`
--

INSERT INTO `ci_visa_services` (`id`, `service_title`, `for_citizen`, `travelling_to`, `living_in`, `visa_type`, `intro_content`, `embassy_fee`, `service_fee`, `extended_service_fee`, `processing_time`, `visa_validity`, `visa_max_stay`, `is_active`) VALUES
(24, '14', '1', '221', '1', 4, '<table cellspacing="0" style="width:468.25pt">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2" style="background-color:white; width:166.3pt">\r\n			<p><strong>Overview</strong></p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>14 days single entry visa, entiles the visa holder t stay in UAE for upto 14 days. The visa valid for 60 days from the date of issuance but one can stay only for 14 days from the date of entry in UAE.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="background-color:white; width:166.3pt">\r\n			<p><strong>Evisa Eligibility:</strong></p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>UAE government has introduced an online visa application system known as Evisa. The eVisa is an electronic authorization from the government to enter UAE. Once visa is approved it is sent to</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>the applicant via email and no stamp or label is placed on the physical passport. Applicant need to print the visa and carry the original passport to commence the travel.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="background-color:white; width:333.1pt">\r\n			<p>To be eligible the traveller must:</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>1) Hold a passport valid for 6 months at the time of entry with 2 blank pages</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="background-color:white; width:333.1pt">\r\n			<p>2) Hold proof of sufficient funds</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>3) Hold proof of onwards/return flight tickets</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p>In order to apply for the eVisa please select the visa type from the below and upload all the documents listed below.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background-color:white; width:87.2pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:79.1pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style="background-color:white; width:83.4pt">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="background-color:white; width:468.25pt">\r\n			<p><strong>14 days single entry eVisa processing fees</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|<table cellspacing="0" style="width:612pt">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:15.0pt; width:78pt">Please Note:</td>\r\n			<td style="width:152pt">&nbsp;</td>\r\n			<td style="width:146pt">&nbsp;</td>\r\n			<td style="width:140pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) You have an option to apply the visa visa government website for which you will not be charged the service fees.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">2) All rates are in USD currency and the same will be converted into your local currency basis the real time exchange rate.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3" style="height:15.0pt">3) All rates are inclusive of VAT and other direct taxes, as appliable.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6" style="height:15.0pt">Fill out United Arab Emirates Tourist visa application for online and provide digital copies of the following documents of the visa applicant:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Passport: A clear coloured photocopy of back and/or front biographical information page(s) of applicant passport.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Proof of residence: Applicants proof of residence in the country where applicable.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">3) Photgraph: One digital passport size colour photograph of the applicant. The photograph should have white background, should be taken with no glasses being worn,&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">must be taken within the last 6 months, should be uploaded in jpg file format.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">4) Proof of Travel Arrangements: A copy of hotel booking confirmation and a copy of the flight confirmation showing the onward/return travel. (If travelling by road then&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">air tickets details are not required)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Age restrictions: Additional required documents for Male applicats under age 21 and Female applicant under the age of 23</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">. Applicant must apply at the same time as parent and must travel with that parent</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">. Copy of applicant birth certificate</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Visa Extentions: evisaonline can assit in obtaining an extension for holders of 30 days single entry visa. In order to facilitate&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">this applicats are advised to contact us 3 working days prior to the expiry date of the visa.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|14 days single entry visa, entiles the visa holder t stay in UAE for upto 14 days. The visa valid for 60 days from the date of issuance but one can stay only for 14 days from the date of entry in UAE.', '120|-|158|-|240', '60|-|84|-|120', '', '7 business days|-|3-5 business days|-|2 business days', '60', '14', 1),
(25, '30', '1', '221', '1', 4, '<table border="0" cellpadding="0" cellspacing="0" style="width:387px">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3">30 days Visa (Single Entry)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Overview</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">30 days single entry visa, entiles the visa holder t stay in UAE for upto 30 days. The visa valid for 60 days from the date of issuance but one can stay only for 30 days from the date of entry in UAE.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Evisa Eligibility:</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">UAE government has introduced an online visa application system known as Evisa. The eVisa is an electronic authorization from the government to enter UAE. Once visa is approved it is sent to&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">the applicant via email and no stamp or label is placed on the physical passport. Applicant need to print the visa and carry the original passport to commence the travel.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">To be eligible the traveller must:&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Hold a passport valid for 6 months at the time of entry with 2 blank pages</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Hold proof of sufficient funds</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Hold proof of onwards/return flight tickets</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">In order to apply for the eVisa please select the visa type from the below and upload all the documents listed below.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">30 days single entry eVisa processing fees</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|<table cellspacing="0" style="width:575pt">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:15.0pt; width:98pt">Please Note:</td>\r\n			<td style="width:143pt">&nbsp;</td>\r\n			<td style="width:143pt">&nbsp;</td>\r\n			<td style="width:143pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) You have an option to apply the visa visa government website for which you will not be charged the service fees.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">2) All rates are in USD currency and the same will be converted into your local currency basis the real time exchange rate.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">3) All rates are inclusive of VAT.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="height:15.0pt">Fill out United Arab Emirates Tourist visa application for online and provide digital copies of the following documents of the visa applicant:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Passport: A clear coloured photocopy of back and/or front biographical information page(s) of applicant passport.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Proof of residence: Applicants proof of residence in the country where applicable.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Photgraph: One digital passport size colour photograph of the applicant. The photograph should have white background, should be taken with no glasses being worn,&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">must be taken within the last 6 months, should be uploaded in jpg file format.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">4) Proof of Travel Arrangements: A copy of hotel booking confirmation and a copy of the flight confirmation showing the onward/return travel. (If travelling by road then&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">air tickets details are not required)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Age restrictions: Additional required documents for Male applicats under age 21 and Female applicant under the age of 23</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3" style="height:15.0pt">. Applicant must apply at the same time as parent and must travel with that parent</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">. Copy of applicant birth certificate</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Visa Extentions: evisaonline can assit in obtaining an extension for holders of 30 days single entry visa. In order to facilitate&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">this applicats are advised to contact us 3 working days prior to the expiry date of the visa.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|30 days single entry visa, entiles the visa holder t stay in UAE for upto 30 days. The visa valid for 60 days from the date of issuance but one can stay only for 30 days from the date of entry in UAE.', '120|-|158|-|240', '60|-|84|-|120', '', '7 business days|-|3 business days|-|2 business days', '60', '30', 1),
(26, '30', '1', '221', '1', 5, '<table border="0" cellpadding="0" cellspacing="0" style="width:395px">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3">30 days Visa (Multiple Entry)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Overview</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">30 days Multiple entry visa, entiles the visa holder t stay in UAE for upto 30 days. The visa valid for 60 days from the date of issuance but one can stay only for 30 days from the date of entry in UAE.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Evisa Eligibility:</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">UAE government has introduced an online visa application system known as Evisa. The eVisa is an electronic authorization from the government to enter UAE. Once visa is approved it is sent to&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">the applicant via email and no stamp or label is placed on the physical passport. Applicant need to print the visa and carry the original passport to commence the travel.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">To be eligible the traveller must:&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Hold a passport valid for 6 months at the time of entry with 2 blank pages</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Hold proof of sufficient funds</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Hold proof of onwards/return flight tickets</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">In order to apply for the eVisa please select the visa type from the below and upload all the documents listed below.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">30 days single entry eVisa processing fees</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|<table cellspacing="0" style="width:600pt">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:15.0pt; width:104pt">Please Note:</td>\r\n			<td style="width:148pt">&nbsp;</td>\r\n			<td style="width:143pt">&nbsp;</td>\r\n			<td style="width:157pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) You have an option to apply the visa visa government website for which you will not be charged the service fees.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">2) All rates are in USD currency and the same will be converted into your local currency basis the real time exchange rate.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">3) All rates are inclusive of VAT.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="height:15.0pt">Fill out United Arab Emirates Tourist visa application for online and provide digital copies of the following documents of the visa applicant:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) Passport: A clear coloured photocopy of back and/or front biographical information page(s) of applicant passport.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">2) Proof of residence: Applicants proof of residence in the country where applicable.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Photgraph: One digital passport size colour photograph of the applicant. The photograph should have white background, should be taken with no glasses being worn,&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">must be taken within the last 6 months, should be uploaded in jpg file format.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">4) Proof of Travel Arrangements: A copy of hotel booking confirmation and a copy of the flight confirmation showing the onward/return travel. (If travelling by road then&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">air tickets details are not required)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Age restrictions: Additional required documents for Male applicats under age 21 and Female applicant under the age of 23</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3" style="height:15.0pt">. Applicant must apply at the same time as parent and must travel with that parent</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">. Copy of applicant birth certificate</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Visa Extentions: evisaonline can assit in obtaining an extension for holders of 30 days multiple entry visa. In order to facilitate&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">this applicats are advised to contact us 3 working days prior to the expiry date of the visa.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|30 days Multiple entry visa, entiles the visa holder t stay in UAE for upto 30 days. The visa valid for 60 days from the date of issuance but one can stay only for 30 days from the date of entry in UAE.', '250|-|288|-|300', '60|-|84|-|120', '', '7 business days|-|288|-|300', '60', '30', 1),
(27, '90', '1', '221', '1', 4, '<table border="0" cellpadding="0" cellspacing="0" style="width:761px">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3">90 days Visa (Single Entry)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Overview</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">90 days Single entry visa, entiles the visa holder t stay in UAE for upto 60 days. The visa valid for 60 days from the date of issuance but one can stay only for 60 days from the date of entry in UAE.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Evisa Eligibility:</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">UAE government has introduced an online visa application system known as Evisa. The eVisa is an electronic authorization from the government to enter UAE. Once visa is approved it is sent to&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">the applicant via email and no stamp or label is placed on the physical passport. Applicant need to print the visa and carry the original passport to commence the travel.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">To be eligible the traveller must:&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">1) Hold a passport valid for 6 months at the time of entry with 2 blank pages</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Hold proof of sufficient funds</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Hold proof of onwards/return flight tickets</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">In order to apply for the eVisa please select the visa type from the below and upload all the documents listed below.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">90 days single entry eVisa processing fees</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|<table cellspacing="0" style="width:596pt">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:15.0pt; width:92pt">Please Note:</td>\r\n			<td style="width:138pt">&nbsp;</td>\r\n			<td style="width:149pt">&nbsp;</td>\r\n			<td style="width:139pt">&nbsp;</td>\r\n			<td style="width:78pt">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) You have an option to apply the visa visa government website for which you will not be charged the service fees.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">2) All rates are in USD currency and the same will be converted into your local currency basis the real time exchange rate.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">3) All rates are inclusive of VAT.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5" style="height:15.0pt">Fill out United Arab Emirates Tourist visa application for online and provide digital copies of the following documents of the visa applicant:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Passport: A clear coloured photocopy of back and/or front biographical information page(s) of applicant passport.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Proof of residence: Applicants proof of residence in the country where applicable.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Photgraph: One digital passport size colour photograph of the applicant. The photograph should have white background, should be taken with no glasses being worn,&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">must be taken within the last 6 months, should be uploaded in jpg file format.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">4) Proof of Travel Arrangements: A copy of hotel booking confirmation and a copy of the flight confirmation showing the onward/return travel. (If travelling by road then&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">air tickets details are not required)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Age restrictions: Additional required documents for Male applicats under age 21 and Female applicant under the age of 23</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">. Applicant must apply at the same time as parent and must travel with that parent</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">. Copy of applicant birth certificate</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Visa Extentions: evisaonline can assit in obtaining an extension for holders of 90 days single entry visa. In order to facilitate&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">this applicats are advised to contact us 3 working days prior to the expiry date of the visa.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|90 days Single entry visa, entiles the visa holder t stay in UAE for upto 60 days. The visa valid for 60 days from the date of issuance but one can stay only for 60 days from the date of entry in UAE', '580|-|680|-|780', '240|-|240|-|240', '', '7 business days|-|3 business days|-|2 business days', '60', '60', 1),
(28, '90', '1', '221', '1', 5, '<table border="0" cellpadding="0" cellspacing="0" style="width:758px">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="3">90 days Visa (Multiple Entry)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Overview</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">90 days Multiple entry visa, entiles the visa holder t stay in UAE for upto 60 days. The visa valid for 60 days from the date of issuance but one can stay only for 60 days from the date of entry in UAE.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">Evisa Eligibility:</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">UAE government has introduced an online visa application system known as Evisa. The eVisa is an electronic authorization from the government to enter UAE. Once visa is approved it is sent to&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">the applicant via email and no stamp or label is placed on the physical passport. Applicant need to print the visa and carry the original passport to commence the travel.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">To be eligible the traveller must:&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">1) Hold a passport valid for 6 months at the time of entry with 2 blank pages</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Hold proof of sufficient funds</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">3) Hold proof of onwards/return flight tickets</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="7">In order to apply for the eVisa please select the visa type from the below and upload all the documents listed below.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">90 days Multiple entry eVisa processing fees</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|<table cellspacing="0" style="width:613pt">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:15.0pt; width:91pt">Please Note:</td>\r\n			<td style="width:141pt">&nbsp;</td>\r\n			<td style="width:145pt">&nbsp;</td>\r\n			<td style="width:140pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n			<td style="width:48pt">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">1) You have an option to apply the visa visa government website for which you will not be charged the service fees.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">2) All rates are in USD currency and the same will be converted into your local currency basis the real time exchange rate.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2">3) All rates are inclusive of VAT.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6" style="height:15.0pt">Fill out United Arab Emirates Tourist visa application for online and provide digital copies of the following documents of the visa applicant:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">1) Passport: A clear coloured photocopy of back and/or front biographical information page(s) of applicant passport.</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">2) Proof of residence: Applicants proof of residence in the country where applicable.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">3) Photgraph: One digital passport size colour photograph of the applicant. The photograph should have white background, should be taken with no glasses being worn,&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">must be taken within the last 6 months, should be uploaded in jpg file format.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="6">4) Proof of Travel Arrangements: A copy of hotel booking confirmation and a copy of the flight confirmation showing the onward/return travel. (If travelling by road then&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">air tickets details are not required)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Age restrictions: Additional required documents for Male applicats under age 21 and Female applicant under the age of 23</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" style="height:15.0pt">. Applicant must apply at the same time as parent and must travel with that parent</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="2" style="height:15.0pt">. Copy of applicant birth certificate</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="height:15.0pt">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="5">Visa Extentions: evisaonline can assit in obtaining an extension for holders of 90 days multiple entry visa. In order to facilitate&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">this applicats are advised to contact us 3 working days prior to the expiry date of the visa.&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>|-|90 days Multiple entry visa, entiles the visa holder t stay in UAE for upto 60 days. The visa valid for 60 days from the date of issuance but one can stay only for 60 days from the date of entry in UAE.', '680|-|780|-|880', '240|-|240|-|240', '', '7 business days|-|3 business days|-|2 business days', '60', '60', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_visa_types`
--

CREATE TABLE `ci_visa_types` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_visa_types`
--

INSERT INTO `ci_visa_types` (`id`, `title`) VALUES
(4, 'Single Entry'),
(5, 'Multiple Entry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_application_status`
--
ALTER TABLE `ci_application_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `ci_inquiry`
--
ALTER TABLE `ci_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_localisation`
--
ALTER TABLE `ci_localisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_media`
--
ALTER TABLE `ci_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `ci_pages`
--
ALTER TABLE `ci_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ci_page_settings`
--
ALTER TABLE `ci_page_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `ci_payment_status`
--
ALTER TABLE `ci_payment_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `ci_profiles`
--
ALTER TABLE `ci_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_seo_data`
--
ALTER TABLE `ci_seo_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_service_questions`
--
ALTER TABLE `ci_service_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sitesettings`
--
ALTER TABLE `ci_sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_testimonials`
--
ALTER TABLE `ci_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `ci_user_applications`
--
ALTER TABLE `ci_user_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_birthcountry` (`applicant_birthcountry`),
  ADD KEY `applicant_passport_issuingcountry` (`applicant_passport_issuingcountry`),
  ADD KEY `applicant_citizen_of` (`applicant_citizen_of`,`applicant_living_in`,`applicant_travelling_to`),
  ADD KEY `selected_service` (`selected_service`,`reg_id`);

--
-- Indexes for table `ci_user_files`
--
ALTER TABLE `ci_user_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `ci_visa_services`
--
ALTER TABLE `ci_visa_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_citizen` (`for_citizen`,`travelling_to`,`living_in`,`visa_type`),
  ADD KEY `visa_type` (`visa_type`);

--
-- Indexes for table `ci_visa_types`
--
ALTER TABLE `ci_visa_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_application_status`
--
ALTER TABLE `ci_application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ci_inquiry`
--
ALTER TABLE `ci_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ci_localisation`
--
ALTER TABLE `ci_localisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `ci_media`
--
ALTER TABLE `ci_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ci_pages`
--
ALTER TABLE `ci_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ci_page_settings`
--
ALTER TABLE `ci_page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `ci_payment_status`
--
ALTER TABLE `ci_payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ci_profiles`
--
ALTER TABLE `ci_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ci_seo_data`
--
ALTER TABLE `ci_seo_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ci_service_questions`
--
ALTER TABLE `ci_service_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ci_sitesettings`
--
ALTER TABLE `ci_sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ci_testimonials`
--
ALTER TABLE `ci_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ci_user_applications`
--
ALTER TABLE `ci_user_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ci_user_files`
--
ALTER TABLE `ci_user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ci_visa_services`
--
ALTER TABLE `ci_visa_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ci_visa_types`
--
ALTER TABLE `ci_visa_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ci_application_status`
--
ALTER TABLE `ci_application_status`
  ADD CONSTRAINT `ci_application_status_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `ci_user_applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ci_media`
--
ALTER TABLE `ci_media`
  ADD CONSTRAINT `ci_media_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `ci_pages` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ci_payment_status`
--
ALTER TABLE `ci_payment_status`
  ADD CONSTRAINT `ci_payment_status_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `ci_user_applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ci_user_applications`
--
ALTER TABLE `ci_user_applications`
  ADD CONSTRAINT `ci_user_applications_ibfk_1` FOREIGN KEY (`selected_service`) REFERENCES `ci_visa_services` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ci_user_files`
--
ALTER TABLE `ci_user_files`
  ADD CONSTRAINT `ci_user_files_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `ci_user_applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ci_visa_services`
--
ALTER TABLE `ci_visa_services`
  ADD CONSTRAINT `ci_visa_services_ibfk_1` FOREIGN KEY (`visa_type`) REFERENCES `ci_visa_types` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
