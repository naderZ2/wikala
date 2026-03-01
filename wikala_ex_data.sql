-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2026 at 05:24 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikala_ex_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL DEFAULT '0111111',
  `facebook` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `about_us_en` text DEFAULT NULL,
  `about_us_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `terms_ar` text DEFAULT NULL,
  `terms_en` text DEFAULT NULL,
  `privacy` text DEFAULT NULL,
  `delivery_fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `instance_id` varchar(255) DEFAULT NULL,
  `ads_time_user` int(11) DEFAULT NULL,
  `ads_time_business` int(11) DEFAULT NULL,
  `free_ads_user` int(11) DEFAULT NULL,
  `free_ads_business` int(11) DEFAULT NULL,
  `image_limit` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `whatsapp_number`, `facebook`, `phone`, `email`, `insta`, `youtube`, `about_us_en`, `about_us_ar`, `description_en`, `description_ar`, `description`, `terms_ar`, `terms_en`, `privacy`, `delivery_fee`, `created_at`, `updated_at`, `access_token`, `instance_id`, `ads_time_user`, `ads_time_business`, `free_ads_user`, `free_ads_business`, `image_limit`) VALUES
(1, 'whatsapp', 'face12sas', 1099622928, 'test@example.com', '54', 'youtube', 'Who We Are – Wikala\n\nAt Wikala, we believe the wor...', 'من نحن – وكالة (Wikala)\n\nفي وكالة (Wikala)، نؤمن بأن العالم يتغير بسرعة، وأن الثقة أصبحت عملة العصر الرقمي.\nمن هذا الإيمان وُلدت فكرتنا: إعادة تعريف الطريقة التي يتواصل بها الناس، ويتعاملون، ويثقون ببعضهم البعض.\nمهمتنا هي بناء منصة متكاملة تجمع بين الأمان، والبساطة، والتمكين — منصة تضع المستخدم في قلب التجربة،\nليكون هو المتحكم في اختياراته، وواثقًا في كل خطوة يتخذها.\n\nمن نحن\n\nتأسست وكالة (Wikala) على مبدأ أساسي: أن الثقة هي حجر الأساس لأي تفاعل ناجح.\nنحن لا نقدم مجرد وسيلة للتعامل، بل بيئة رقمية آمنة وشفافة تُلهم التعاون وتبني الجسور بين الأفراد والشركات والمجتمعات.\nسواء كنت تبحث عن خدمة، أو ترغب في عرض مهاراتك، أو تريد إجراء صفقة بثقة —\nفـ وكالة تمنحك الأدوات والتقنيات الحديثة التي تجعل تجربتك أسهل، وأوضح، وأكثر أمانًا.\n\nرؤيتنا\n\nنتطلع إلى عالمٍ تختفي فيه الحواجز بين الناس،\nعالمٍ تُبنى فيه العلاقات على الثقة والشفافية لا على التعقيد أو الخوف.\nرؤيتنا أن نصبح المنصة الأولى في العالم العربي والعالم التي تجمع بين\nالتواصل، والتعامل، والنمو — في منظومة رقمية موثوقة وفعالة.\nنؤمن أن كل تفاعل، مهما كان بسيطًا، يمكن أن يكون بداية لشراكة حقيقية.\n\nما الذي نقدمه\n\n🔒 الأمان والشفافية: نلتزم بمعايير أمان عالية تضمن نزاهة كل معاملة ووضوحها، مدعومة بتقييمات ومراجعات حقيقية.\n\n🧭 تجربة موجهة للمستخدم: واجهة استخدام بديهية وسلسة، مدعومة بخدمة عملاء تستجيب بسرعة واحترافية.\n\n🌍 فرص شاملة ومتنوعة: مساحة تجمع بين الأفراد وأصحاب الأعمال لعرض خدماتهم أو البحث عنها — محليًا أو عن بُعد.\n\n⚡ التمكين والثقة: نمنح المستخدم السيطرة الكاملة على ما يقدمه، وما يختاره، وكيف يبني علاقاته ومعاملاته بثقة.\n\nلماذا وكالة؟\n\nفي زمنٍ تُقاس فيه القيمة بالثقة والوقت،\nنحن هنا لنمنحك منصة تعمل من أجلك، لا ضدك.\nنجمع بين التكنولوجيا الحديثة، والقيم المجتمعية الأصيلة، والعدالة في كل خطوة،\nلنقدّم لك تجربة رقمية تجعلك تتواصل بثقة، وتتعامل بسهولة، وتنمو بثبات.\nمع وكالة (Wikala)، أنت لا تستخدم منصة فحسب —\nبل تنضم إلى مجتمع يؤمن بالثقة، والفرص، والمستقبل.', 'Who We Are – Wikala\n\nAt Wikala, we believe the wor...', 'من نحن – وكالة (Wikala)\n\nفي وكالة (Wikala)، نؤمن بأن العالم يتغير بسرعة، وأن الثقة أصبحت عملة العصر الرقمي.\nمن هذا الإيمان وُلدت فكرتنا: إعادة تعريف الطريقة التي يتواصل بها الناس، ويتعاملون، ويثقون ببعضهم البعض.\nمهمتنا هي بناء منصة متكاملة تجمع بين الأمان، والبساطة، والتمكين — منصة تضع المستخدم في قلب التجربة،\nليكون هو المتحكم في اختياراته، وواثقًا في كل خطوة يتخذها.\n\nمن نحن\n\nتأسست وكالة (Wikala) على مبدأ أساسي: أن الثقة هي حجر الأساس لأي تفاعل ناجح.\nنحن لا نقدم مجرد وسيلة للتعامل، بل بيئة رقمية آمنة وشفافة تُلهم التعاون وتبني الجسور بين الأفراد والشركات والمجتمعات.\nسواء كنت تبحث عن خدمة، أو ترغب في عرض مهاراتك، أو تريد إجراء صفقة بثقة —\nفـ وكالة تمنحك الأدوات والتقنيات الحديثة التي تجعل تجربتك أسهل، وأوضح، وأكثر أمانًا.\n\nرؤيتنا\n\nنتطلع إلى عالمٍ تختفي فيه الحواجز بين الناس،\nعالمٍ تُبنى فيه العلاقات على الثقة والشفافية لا على التعقيد أو الخوف.\nرؤيتنا أن نصبح المنصة الأولى في العالم العربي والعالم التي تجمع بين\nالتواصل، والتعامل، والنمو — في منظومة رقمية موثوقة وفعالة.\nنؤمن أن كل تفاعل، مهما كان بسيطًا، يمكن أن يكون بداية لشراكة حقيقية.\n\nما الذي نقدمه\n\n🔒 الأمان والشفافية: نلتزم بمعايير أمان عالية تضمن نزاهة كل معاملة ووضوحها، مدعومة بتقييمات ومراجعات حقيقية.\n\n🧭 تجربة موجهة للمستخدم: واجهة استخدام بديهية وسلسة، مدعومة بخدمة عملاء تستجيب بسرعة واحترافية.\n\n🌍 فرص شاملة ومتنوعة: مساحة تجمع بين الأفراد وأصحاب الأعمال لعرض خدماتهم أو البحث عنها — محليًا أو عن بُعد.\n\n⚡ التمكين والثقة: نمنح المستخدم السيطرة الكاملة على ما يقدمه، وما يختاره، وكيف يبني علاقاته ومعاملاته بثقة.\n\nلماذا وكالة؟\n\nفي زمنٍ تُقاس فيه القيمة بالثقة والوقت،\nنحن هنا لنمنحك منصة تعمل من أجلك، لا ضدك.\nنجمع بين التكنولوجيا الحديثة، والقيم المجتمعية الأصيلة، والعدالة في كل خطوة،\nلنقدّم لك تجربة رقمية تجعلك تتواصل بثقة، وتتعامل بسهولة، وتنمو بثبات.\nمع وكالة (Wikala)، أنت لا تستخدم منصة فحسب —\nبل تنضم إلى مجتمع يؤمن بالثقة، والفرص، والمستقبل.', 'Who We Are – Wikala\n\nAt Wikala, we believe the world is changing rapidly, and trust has become the currency of the digital age.\nFrom this belief, our idea was born: to redefine how people communicate, interact, and trust one another.\n\nOur mission is to build an integrated platform that combines security, simplicity, and empowerment — a platform that puts the user at the heart of the experience, enabling them to stay in control of their choices and confident in every step they take.\n\nWho We Are\n\nWikala was founded on a core principle: trust is the cornerstone of every successful interaction.\nWe don’t just provide a means of interaction — we create a secure and transparent digital environment that inspires collaboration and builds bridges between individuals, businesses, and communities.\n\nWhether you’re seeking a service, offering your skills, or looking to make a deal with confidence —\nWikala provides you with modern tools and technologies that make your experience easier, clearer, and more secure.\n\nOur Vision\n\nWe aspire to a world where barriers between people disappear —\na world where relationships are built on trust and transparency, not complexity or fear.\n\nOur vision is to become the leading platform in the Arab world and beyond that brings together connection, interaction, and growth within a trustworthy and efficient digital ecosystem.\n\nWe believe that every interaction, no matter how small, can be the start of a meaningful partnership.\n\nWhat We Offer\n\n🔒 Security & Transparency:\nWe uphold high security standards that guarantee the integrity and clarity of every transaction — supported by real reviews and ratings.\n\n🧭 User-Centric Experience:\nA smooth and intuitive interface, backed by fast and professional customer support.\n\n🌍 Inclusive & Diverse Opportunities:\nA space that brings individuals and businesses together to showcase or search for services — locally or remotely.\n\n⚡ Empowerment & Trust:\nWe give users full control over what they offer, what they choose, and how they build trusted connections and transactions.\n\nWhy Wikala?\n\nIn a time where value is measured by trust and time,\nwe are here to offer you a platform that works for you, not against you.\n\nWe bring together modern technology, authentic community values, and fairness in every step —\ndelivering a digital experience that helps you connect with confidence, interact with ease, and grow steadily.\n\nWith Wikala, you are not just using a platform —\nyou’re joining a community that believes in trust, opportunity, and the future.', 'الشروط والأحكام الخاصة بموقع Wakala\n\nنرحب بكم في موقع Wakala وتطبيقاته. هذه الصفحة، بالإضافة إلى أي مستندات أو وثائق مشار إليها، تعتبر صفحة تعريفية وإرشادية بالشروط والأحكام الخاصة باستخدام موقعنا، والتي تنطبق أيضًا على أي من تطبيقاتنا على الهواتف الذكية مثل الآيفون، الآيباد، أو أي جهاز متصل بمتصفح الإنترنت.\nوعليه، يرجى قراءة هذه الشروط والأحكام بعناية قبل استخدام الموقع أو إجراء أي طلب من خلاله.\n\nباستخدامك لموقعنا أو تطبيقاتنا وإجرائك أي طلب، فإنك توافق على الالتزام بهذه الشروط والأحكام. وفي حال عدم موافقتك، فلا يحق لك استخدام موقعنا أو تطبيقاتنا أو الاستفادة من خدماتنا.\n\n1. من نحن\n\nWakala هو موقع إلكتروني ومنصة رقمية مملوكة ومدارة من قبل [شركة Wakala للتقنية / خدمات الوساطة الرقمية]* (\"نحن\" أو \"الشركة\"). تم تأسيس الشركة وتسجيلها وفقًا للأنظمة والقوانين المحلية، وهي متخصصة في توفير بيئة رقمية آمنة تربط بين مقدمي الخدمات أو المنتجات وبين المستخدمين الباحثين عنها.\nنحن نعمل كوسيط تقني يتيح للمستخدمين استعراض الخدمات والمنتجات والتواصل مع شركائنا من شركات، محلات، مزودي خدمات، وغيرهم، دون أن نكون مالكين لهذه الخدمات أو مسؤولين عن تقديمها بشكل مباشر.\n\n2. الشروط والأحكام وعقدك معنا\n\nتُعتبر هذه الشروط والأحكام بمثابة الإطار القانوني لأي طلب أو معاملة تتم من خلال موقعنا أو تطبيقاتنا. وبمجرد إتمام الطلب عبر منصتنا، فإنك تقرّ بأن العقد مبرم بينك وبين مزوّد الخدمة أو المنتج، بينما يقتصر دورنا على الوساطة الرقمية وتسهيل العملية.\n\n3. سياسة استخدام خدماتنا\n\nيحق لك استخدام خدماتنا فقط إذا كان عمرك 18 عامًا أو أكثر، أو تحت إشراف ولي الأمر/الوصي القانوني إذا كنت أصغر من ذلك.\n\nيقتصر استخدام المنصة على الأغراض المشروعة والقانونية.\n\nيُمنع استخدام Wakala لأي أنشطة غير قانونية أو مخالفة للأنظمة أو محاولة الوصول غير المصرح به للموقع أو التطبيق أو أنظمتهما التقنية.\n\n4. تأسيس العقد بين الطرفين\n\nمنصّة Wakala تتيح للمستخدمين البحث عن الخدمات والمنتجات المقدمة من مزودينا وشركائنا. بعد إتمام الطلب، ستتلقى رسالة عبر البريد الإلكتروني لتأكيد استلام الطلب، على أن يتم قبوله أو رفضه لاحقًا من قِبل المزوّد.\nلا يُعتبر العقد قائمًا إلا بعد تأكيد المزود للطلب بشكل رسمي. نحن لسنا مسؤولين عن تنفيذ أو جودة المنتجات أو الخدمات، وإنما يقتصر دورنا على تسهيل عملية الطلب.\n\n5. سياسة الدفع\n\nيتعين عليك دفع القيمة الكاملة للمنتجات أو الخدمات المطلوبة عبر المنصة قبل إصدارها أو تسليمها لك.\n\nجميع المدفوعات تخضع لشروط وأنظمة الدفع الإلكتروني المعمول بها.\n\n6. سياسة التوصيل والقبول\n\nبمجرد إتمام عملية الدفع، تصبح المنتجات/الخدمات مملوكة للمستخدم، وتنتقل إليه كافة المخاطر المتعلقة بها.\n\nيجب التأكد من صحة البيانات والعنوان قبل تأكيد الطلب.\n\nتقع مسؤولية استلام الطلب في العنوان المحدد على المستخدم. لا يتحمل Wakala أو شركاؤه مسؤولية عدم استلام الطلب أو تغييره لمكان آخر.\n\n7. حدود المسؤولية\n\nلا تتحمل Wakala أي مسؤولية عن الخسائر أو الأضرار الناتجة عن تعاملاتك المباشرة مع مزوّدي الخدمات أو المنتجات.\n\nنحن لسنا طرفًا في العقود المبرمة بينك وبين المزودين، وإنما نقدم لك المنصة التقنية فقط.\n\n8. تعديلات الشروط\n\nيحق لـ Wakala تعديل أو تحديث هذه الشروط والأحكام في أي وقت. وتُعتبر التعديلات نافذة فور نشرها على الموقع أو التطبيق. استمرارك في استخدام خدماتنا يُعد موافقة على التعديلات.\n\n9. القانون الحاكم\n\nتخضع هذه الشروط والأحكام وتُفسَّر وفق قوانين [الدولة المسجلة فيها الشركة]، وتكون المحاكم المختصة في هذه الدولة هي المرجع الحصري لحل أي نزاع.', 'Terms and Conditions\n\nWe welcome you to Wakala and its applications. This page, along with any documents or materials it refers to, serves as a guide to the terms and conditions of using our platform. These terms also apply to any related mobile applications on smartphones such as iPhone, iPad, or any device connected to the internet. Please review these terms carefully before using our services or placing an order.\n\nBy accessing our platform and placing an order, you agree to comply with these Terms and Conditions. If you do not agree, you are not entitled to use our site, applications, or place orders through them.\n\n1. Who We Are\n\nWakala is owned and operated by Wakala Technologies, referred to as \"Wakala,\" \"we,\" \"our company,\" or \"our institution.\" The company is duly registered and operates as a digital platform specialized in facilitating connections between users and service providers.\n\nOur role is as an intermediary: we connect users with partners such as service providers, shops, venues, or other businesses. We do not own or directly supply the products or services listed on our platform, nor do we control their quality or delivery.\n\n2. Terms and Conditions and Your Contract\n\nThese Terms and Conditions form the legal framework for any order, request, or transaction placed through our platform. When you place an order, the contract is established between you and the service provider. Wakala’s role is limited to facilitating the process digitally.\n\n3. Policy for Using Our Services\n\nBy using our services, you confirm that you are legally eligible to enter binding contracts. You must be at least 18 years old.\n\nIf you are under 18, you may use the services only under the supervision of a parent or legal guardian, who must read and accept these Terms.\n\nYou must reside in a country where Wakala operates to access and use our services.\n\nYou agree to use our platform only for lawful purposes. Any attempts to breach, disrupt, damage, or misuse the site, its applications, or related systems will lead to termination of your access.\n\n4. Establishing the Contract\n\nWakala provides a platform for users to browse, select, and request services and products from participating suppliers.\n\nAfter placing an order, you will receive an acknowledgment of receipt.\n\nThis does not mean your order has been accepted. Acceptance is subject to review and confirmation by the supplier.\n\nOnce confirmed, the order becomes binding between you and the supplier.\n\nYour contract covers only the confirmed products or services. Wakala is not responsible for fulfilling, guaranteeing, or meeting expectations beyond what is confirmed.\n\n5. Payment Policy\n\nYou are required to pay 100% of the order value for the requested products or services before they are issued or delivered.\n\nPayments must comply with the authorized payment methods available on our platform.\n\n6. Delivery and Acceptance Policy\n\nOnce payment is completed, the products/services become your responsibility, including all related risks.\n\nYou must verify the accuracy of your order details before confirming. Once confirmed, no changes or corrections can be made.\n\nOrders will be processed immediately and shared with the relevant suppliers.\n\nIf your payment is rejected or unauthorized, your order will not be processed.\n\nDelivery responsibility lies with the supplier, and acceptance is tied to the address and details provided at checkout. Wakala does not bear responsibility for failed deliveries outside the specified details.\n\n7. Limitation of Liability\n\nWakala is not liable for any damages, losses, or disputes arising from direct dealings between you and suppliers.\n\nWe act solely as a facilitator and are not party to the contracts or responsible for the quality, timeliness, or outcome of the products/services provided.\n\n8. Amendments to Terms\n\nWakala reserves the right to amend these Terms and Conditions at any time. Updates will be effective immediately upon publication. Continued use of our services after changes constitutes acceptance of the updated Terms.\n\n9. Governing Law\n\nThese Terms and Conditions shall be governed by and construed in accordance with the laws of the jurisdiction where Wakala is registered. Any disputes shall be subject to the exclusive jurisdiction of the competent courts in that jurisdiction.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, ea. Reprehenderit,dita sint? Sed quibusdamates a cumque velit', 9, NULL, '2025-11-20 23:15:40', '67696972332f4', '677B9932B98B8', 5, 1, 0, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `address_user`
--

CREATE TABLE `address_user` (
  `id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `floor_no` varchar(30) DEFAULT NULL,
  `flat_no` varchar(30) DEFAULT NULL,
  `building_no` varchar(30) NOT NULL,
  `block_no` varchar(30) NOT NULL,
  `street` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `address_user`
--

INSERT INTO `address_user` (`id`, `deleted_at`, `user_id`, `region_id`, `floor_no`, `flat_no`, `building_no`, `block_no`, `street`, `notes`, `created_at`, `updated_at`, `latitude`, `longitude`) VALUES
(6, NULL, 7, 91, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2022-08-02 18:25:46', '2024-05-31 19:45:32', NULL, NULL),
(7, NULL, 32, 6, '1', '1', '1', '1', '1', '1', '2022-08-04 06:27:12', '2022-09-09 22:57:26', NULL, NULL),
(8, NULL, 33, 6, '4', '1', '55', '5', '4', NULL, '2022-08-04 07:35:45', '2022-08-04 07:35:45', NULL, NULL),
(9, NULL, 34, 6, '2', '2', '22', '1', '2', '2', '2022-08-16 03:03:46', '2022-09-09 22:57:20', NULL, NULL),
(10, NULL, 41, 6, '1', 'q', '11', '1', 'q', NULL, '2022-08-29 23:44:03', '2022-09-09 22:57:19', NULL, NULL),
(11, NULL, 18, 6, '2', '2', '1', '1', '21', NULL, '2022-08-31 16:57:06', '2024-05-31 19:44:15', NULL, NULL),
(12, NULL, 43, 6, '1', '1', '1', '1', '1', 'e', '2022-09-11 04:34:41', '2022-09-20 16:58:34', NULL, NULL),
(13, NULL, 44, 43, '3', '3', '2', '5', '3', 'y', '2022-11-02 03:29:39', '2022-11-02 03:29:39', NULL, NULL),
(14, NULL, 45, 14, '1', '1', '1', '1', '1', NULL, '2024-04-27 11:59:59', '2024-04-27 11:59:59', NULL, NULL),
(16, NULL, 55, 42, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2024-07-06 12:35:14', '2024-07-06 13:02:18', NULL, NULL),
(17, NULL, 55, 42, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2024-07-06 12:35:39', '2024-07-06 13:03:09', NULL, NULL),
(18, NULL, 55, 42, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2024-07-06 12:35:54', '2024-07-06 13:03:13', NULL, NULL),
(19, NULL, 51, 2, 'floor 2', 'flat 1', 'building 3', 'block 1', 'street 1', 'notes', '2024-07-08 14:54:04', '2024-07-08 14:54:04', NULL, NULL),
(20, NULL, 55, 23, '5', NULL, '4', '3', '4', 'ff', '2024-07-08 16:10:00', '2024-07-08 16:10:00', NULL, NULL),
(21, NULL, 55, 49, '1', NULL, '5', '6', 'q0', 'test', '2024-07-08 20:55:04', '2024-07-08 20:55:04', NULL, NULL),
(22, NULL, 55, 25, '7', NULL, '5', '6', '6', 'test', '2024-07-10 10:13:40', '2024-07-10 10:13:40', NULL, NULL),
(23, NULL, 55, 70, '6', NULL, '5', '6', '5', 't', '2024-07-10 10:16:27', '2024-07-10 10:16:27', NULL, NULL),
(24, NULL, 55, 70, '6', NULL, '5', '6', '5', 't', '2024-07-10 10:16:29', '2024-07-10 10:16:29', NULL, NULL),
(25, NULL, 56, 51, 'h', NULL, 'y', 'r', 'y', NULL, '2024-08-28 18:26:55', '2024-08-28 18:26:55', NULL, NULL),
(26, NULL, 57, 25, 'sdfsdf', NULL, 'sdfsf', '2', 'fhfgh', 'sdfsdf', '2024-10-16 19:09:18', '2024-10-16 19:09:18', NULL, NULL),
(27, NULL, 57, 70, 'bdbd', NULL, 'jdjd', 'hxhd', 'hdhd', 'shsjd', '2024-10-17 05:45:17', '2024-10-17 05:45:17', NULL, NULL),
(28, NULL, 57, 71, 'hdhd', NULL, 'bxnzn', 'hdhdh', 'hdhdh', 'hdhdhs', '2024-10-17 05:46:00', '2024-10-17 05:46:00', NULL, NULL),
(29, NULL, 59, 25, '4564', NULL, '5646', '85', '545', '45646', '2024-12-12 23:31:48', '2024-12-12 23:31:48', NULL, NULL),
(30, NULL, 61, 45, '2', NULL, '5', '5', '5', NULL, '2024-12-18 18:16:26', '2024-12-18 18:16:26', NULL, NULL),
(31, NULL, 61, 26, '٥٥٥٥', NULL, '٨٨٨٨', '٨٥', '٦٩', '٥٩٩', '2024-12-18 21:53:19', '2024-12-18 21:53:19', NULL, NULL),
(32, NULL, 61, 44, '5', NULL, '8', '7', '7', '5', '2024-12-19 07:17:29', '2024-12-19 07:17:29', NULL, NULL),
(33, NULL, 60, 17, '4', NULL, '4', '5', '5', NULL, '2024-12-20 06:28:45', '2024-12-20 06:28:45', NULL, NULL),
(34, NULL, 61, 45, '4', NULL, '2', '5', '6', 'yyyy', '2025-01-13 11:23:07', '2025-01-13 11:23:07', NULL, NULL),
(35, NULL, 58, 17, '4', NULL, '5', '5', '209', NULL, '2025-01-13 16:20:11', '2025-01-13 16:20:11', NULL, NULL),
(36, NULL, 58, 115, '0', NULL, '5', '1', '8', NULL, '2025-01-13 16:21:31', '2025-01-13 16:21:31', NULL, NULL),
(37, NULL, 71, 2, 'floor 2', NULL, 'building 1', 'block 1', 'street 1', 'notes', '2025-05-04 17:26:17', '2025-05-04 17:26:17', NULL, NULL),
(38, NULL, 71, 2, 'floor 2', NULL, 'building 1', 'block 1', 'street 1', 'notes', '2025-05-04 17:26:21', '2025-05-04 17:26:21', NULL, NULL),
(39, '2025-07-04 18:01:09', 76, 2, 'floor 2', NULL, 'building 1', 'block 1', 'street 1', 'notes', '2025-06-25 17:31:26', '2025-07-04 18:01:09', NULL, NULL),
(40, '2025-07-14 15:38:35', 76, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-05 10:16:02', '2025-07-14 15:38:35', NULL, NULL),
(41, '2025-07-08 17:49:56', 76, 57, NULL, NULL, '5', '5', 'groove street', 'this ma nigga location', '2025-07-05 10:17:09', '2025-07-08 17:49:56', NULL, NULL),
(42, '2025-07-08 17:49:42', 76, 2, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-08 17:35:01', '2025-07-08 17:49:42', NULL, NULL),
(43, NULL, 75, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2025-07-08 17:37:07', '2025-07-17 12:23:04', NULL, NULL),
(44, '2025-07-08 17:49:34', 76, 6, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-08 17:39:59', '2025-07-08 17:49:34', NULL, NULL),
(45, '2025-07-08 17:48:03', 76, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-08 17:40:06', '2025-07-08 17:48:03', NULL, NULL),
(46, '2025-07-08 17:42:29', 76, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-08 17:40:15', '2025-07-08 17:42:29', NULL, NULL),
(47, NULL, 75, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-08 17:54:10', '2025-07-08 17:54:10', NULL, NULL),
(48, '2025-07-14 15:38:32', 76, 13, '444', '444', '444', '55', 'groove street', NULL, '2025-07-08 18:03:14', '2025-07-14 15:38:32', NULL, NULL),
(49, '2025-07-14 15:38:27', 76, 42, '2342342', '2342', '234', '334', '3423', NULL, '2025-07-08 18:42:47', '2025-07-14 15:38:27', NULL, NULL),
(50, '2025-07-17 13:10:35', 76, 57, '2', '4', '55', '88', 'groove street', 'nigga', '2025-07-14 15:39:08', '2025-07-17 13:10:35', NULL, NULL),
(51, '2025-07-14 16:36:48', 76, 57, '22', '95', '232', '588', 'ststey', 'ursut', '2025-07-14 15:44:18', '2025-07-14 16:36:48', NULL, NULL),
(52, '2025-07-17 13:10:37', 76, 42, '555', '55', '885', '8968', 'fff', 'gghc', '2025-07-14 16:37:08', '2025-07-17 13:10:37', NULL, NULL),
(53, NULL, 75, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:28:51', '2025-07-17 12:28:51', NULL, NULL),
(54, '2025-07-17 13:10:39', 76, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:28:58', '2025-07-17 13:10:39', NULL, NULL),
(55, NULL, 75, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:29:08', '2025-07-17 12:29:08', NULL, NULL),
(56, NULL, 75, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:29:42', '2025-07-17 12:29:42', NULL, NULL),
(57, NULL, 75, 13, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:30:39', '2025-07-17 12:30:39', NULL, NULL),
(58, NULL, 75, 17, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2025-07-17 12:33:45', '2025-07-17 12:39:11', NULL, NULL),
(59, NULL, 75, 15, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2025-07-17 12:33:51', '2025-07-17 12:37:04', NULL, NULL),
(60, NULL, 75, 16, 'floor 2', 'flat 1', 'building 1', 'block 1', 'test street 3', 'notes', '2025-07-17 12:34:11', '2025-07-17 12:37:20', NULL, NULL),
(61, NULL, 75, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:51:04', '2025-07-17 12:51:04', NULL, NULL),
(62, NULL, 75, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-07-17 12:52:45', '2025-07-17 12:52:45', NULL, NULL),
(63, '2025-07-17 15:39:11', 76, 83, '5555', '555555555', '555', '55', 'omk street', '55555555555555555555', '2025-07-17 13:11:20', '2025-07-17 15:39:11', NULL, NULL),
(64, '2025-07-17 13:34:06', 76, 62, '5555', '555555555', '555', '55', 'omk we 3yalha street', '55555555555555555555', '2025-07-17 13:21:05', '2025-07-17 13:34:06', NULL, NULL),
(65, '2025-07-17 13:34:04', 76, 62, '5555', '555555555', '555', '5555', 'omk we 3yalha street', '55555555555555555555', '2025-07-17 13:24:50', '2025-07-17 13:34:04', NULL, NULL),
(66, '2025-07-17 13:34:01', 76, 62, '5555', '55555555522', '555', '55', 'omk we 3yalha street', '55555555555555555555', '2025-07-17 13:26:39', '2025-07-17 13:34:01', NULL, NULL),
(67, '2025-07-17 13:33:59', 76, 62, '5555', '55555555522', '555', '5522', 'omk we 3yalha street', '55555555555555555555', '2025-07-17 13:30:22', '2025-07-17 13:33:59', NULL, NULL),
(68, '2025-07-17 13:33:56', 76, 62, '5555', '555555555', '555', '552', 'omk street', '55555555555555555555', '2025-07-17 13:31:35', '2025-07-17 13:33:56', NULL, NULL),
(69, '2025-07-17 13:33:54', 76, 62, '5555', '555555555', '555', '55', 'omk street', '55555555555555555555', '2025-07-17 13:32:08', '2025-07-17 13:33:54', NULL, NULL),
(70, '2025-09-30 13:38:19', 76, 101, '80688', '8006', '90686', '55', 'kgxogd', 'nigga', '2025-07-17 14:01:49', '2025-09-30 13:38:19', NULL, NULL),
(71, '2025-07-17 15:39:18', 76, 96, '80688', '8006', '90686', '55', 'kgxogd', 'nigga', '2025-07-17 14:03:15', '2025-07-17 15:39:18', NULL, NULL),
(72, '2025-07-17 15:39:16', 76, 96, '80688', '8006', '90686', '55', 'kgxogd', 'nigga', '2025-07-17 14:03:52', '2025-07-17 15:39:16', NULL, NULL),
(73, '2025-07-17 15:39:14', 76, 100, '80688', '8006', '90686', '55', 'kgxogd', 'nigga', '2025-07-17 14:06:51', '2025-07-17 15:39:14', NULL, NULL),
(74, '2025-11-26 14:44:36', 96, 235, '1', '1', '1', '1', '1', 'الهرم', '2025-09-25 17:54:09', '2025-11-26 14:44:36', NULL, NULL),
(75, '2025-09-25 17:54:58', 96, 17, '1', '1', '1', '1', '1', NULL, '2025-09-25 17:54:10', '2025-09-25 17:54:58', NULL, NULL),
(76, NULL, 98, 45, '01116402644', '01095637220', '01095637229', '7556', 'sdgucy', NULL, '2025-09-25 17:57:36', '2025-09-25 17:57:36', NULL, NULL),
(77, '2025-11-05 18:55:01', 86, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-09-30 10:51:44', '2025-11-05 18:55:01', NULL, NULL),
(78, '2025-11-05 18:55:04', 86, 14, 'floor 2', 'flat 1', 'building 1', 'block 1', 'street 1', 'notes', '2025-09-30 10:52:20', '2025-11-05 18:55:04', 30.41668747, 31.41668747),
(79, '2025-10-23 13:44:04', 76, 237, '2', '2', '10', '128', 'niggas street', NULL, '2025-09-30 13:30:28', '2025-10-23 13:44:04', 30.04020620, 31.11418860),
(80, '2025-10-23 13:53:14', 76, 238, '5588', '55', '58', '55', 'hcvhc', NULL, '2025-10-23 13:49:31', '2025-10-23 13:53:14', 30.04021160, 31.11420970),
(81, NULL, 76, 239, '5', '12', '65', '25', 'vfdrr', NULL, '2025-10-23 13:54:31', '2025-10-23 13:54:31', 30.04020650, 31.11415750),
(82, NULL, 97, 230, '01095637229', '3', '20', '15', 'مستقبل', 'اتنمنخعللوسزظممكدزوةىبلعصهصخخصمسزؤزوزمناةوزؤظمسيصصصححمزؤز', '2025-11-05 17:25:20', '2025-11-05 17:25:20', NULL, NULL),
(83, '2025-11-05 22:13:06', 86, 239, '151', '154', '6464', '15', 'sgs', NULL, '2025-11-05 18:56:16', '2025-11-05 22:13:06', 30.04020470, 31.11418030),
(84, NULL, 86, 235, '1250', '15', '1280', '125', 'ytd', NULL, '2025-11-05 22:13:41', '2025-11-07 20:36:07', 30.04020730, 31.11419200),
(85, '2025-11-06 14:08:37', 86, 253, '55', '25', '54', '45', '44', NULL, '2025-11-06 14:08:30', '2025-11-06 14:08:37', NULL, NULL),
(86, NULL, 86, 236, '7', '8', '4', '1', '2ff', NULL, '2025-11-07 20:17:35', '2025-11-07 20:17:35', NULL, NULL),
(87, NULL, 96, 235, '1', '1', '1', '1', '1', NULL, '2025-11-26 14:44:57', '2025-11-26 14:44:57', NULL, NULL),
(88, NULL, 101, 239, 'fnfnfj', NULL, 'bfbnffj', 'gdbfn', 'rbdnf', NULL, '2026-02-14 06:30:38', '2026-02-14 06:30:38', NULL, NULL),
(89, NULL, 101, 239, 'fnfnfj', NULL, 'bfbnffj', 'gdbfn', 'rbdnf', NULL, '2026-02-14 06:35:13', '2026-02-14 06:35:13', NULL, NULL),
(90, NULL, 101, 239, 'fnfnfj', NULL, 'bfbnffj', 'gdbfn', 'rbdnf', NULL, '2026-02-14 06:35:45', '2026-02-14 06:35:45', NULL, NULL),
(91, NULL, 101, 239, 'fnfnfj', NULL, 'bfbnffj', 'gdbfn', 'rbdnf', NULL, '2026-02-14 06:36:22', '2026-02-14 06:36:22', NULL, NULL),
(92, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:37:31', '2026-02-14 06:37:31', NULL, NULL),
(93, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:37:52', '2026-02-14 06:37:52', NULL, NULL),
(94, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:38:47', '2026-02-14 06:38:47', NULL, NULL),
(95, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:39:15', '2026-02-14 06:39:15', NULL, NULL),
(96, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:39:25', '2026-02-14 06:39:25', NULL, NULL),
(97, NULL, 101, 239, 'fbfnf', NULL, 'fnfn', 'bdbfb', 'gsvdg', NULL, '2026-02-14 06:40:33', '2026-02-14 06:40:33', NULL, NULL),
(98, NULL, 101, 237, 'fbfhf', NULL, 'dgfhf', 'fjfnhf', 'dhxvvx', NULL, '2026-02-14 06:46:45', '2026-02-14 06:46:45', NULL, NULL),
(99, NULL, 101, 237, 'fbfhf', NULL, 'dgfhf', 'fjfnhf', 'dhxvvx', NULL, '2026-02-14 06:48:02', '2026-02-14 06:48:02', NULL, NULL),
(100, NULL, 101, 236, '556', NULL, 'cfvg', 'fff', 'dffff', NULL, '2026-02-15 17:44:10', '2026-02-15 17:44:10', NULL, NULL),
(101, NULL, 101, 247, '555', NULL, '555', '3', 'f', NULL, '2026-02-15 17:54:51', '2026-02-15 17:54:51', NULL, NULL),
(102, NULL, 101, 241, '55', NULL, '85', 'rr', 'dd', NULL, '2026-02-15 17:56:20', '2026-02-15 17:56:20', NULL, NULL),
(103, NULL, 101, 239, '8989', NULL, '988', 'rr', 'nfnf', NULL, '2026-02-15 17:59:08', '2026-02-15 17:59:08', NULL, NULL),
(104, NULL, 101, 239, '8989', NULL, '988', 'rr', 'nfnf', NULL, '2026-02-15 18:01:49', '2026-02-15 18:01:49', NULL, NULL),
(105, NULL, 101, 239, '9797', NULL, '9898', 'ydhd', 'hdbnd', NULL, '2026-02-15 18:03:41', '2026-02-15 18:03:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$0bvevgXqTgALDghe2lBq5uW1sl5sPpotPuABofVYamrByJNS.1tSu', 1, 1, '2022-06-12 10:32:09', '2022-08-02 16:31:37'),
(2, 'semi admin', 'semi@admin.com', '$2y$10$b7613vSTPstqMIPohU03HOOC.oKZbqW/Ux1tgieNFfi3ia79aNnsG', 1, 1, '2022-07-10 13:59:31', '2022-08-04 03:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `rejected_id` int(11) DEFAULT NULL,
  `ad_number` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `is_commercial` tinyint(1) DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contact_method` enum('phone','chat','email') DEFAULT NULL,
  `negotiable` tinyint(1) DEFAULT 1,
  `status` enum('under_review','accepted','rejected') DEFAULT 'under_review',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_sponsored` tinyint(1) DEFAULT 0,
  `sponsored_price` decimal(10,2) DEFAULT 0.00,
  `sponsored_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `category_id`, `user_id`, `type_id`, `city_id`, `region_id`, `rejected_id`, `ad_number`, `price`, `is_commercial`, `title`, `description`, `contact_method`, `negotiable`, `status`, `start_date`, `end_date`, `main_image`, `created_at`, `updated_at`, `is_sponsored`, `sponsored_price`, `sponsored_at`) VALUES
(1, 104, 75, 2, 13, 30, NULL, '629870', 50.00, 1, 'سيارة SUV حديثة – قوية وعائلية – موديل جديد', 'للبيع سيارة SUV حديثة بتصميم عصري وقوة أداء عالية، مناسبة للطرق الطويلة والاستخدام العائلي:\n\nمحرك قوي اقتصادي في استهلاك الوقود\n\nقير أوتوماتيك سلس\n\nدفع رباعي (4x4) لثبات أكبر على الطرق\n\nأنظمة أمان متطورة (وسائد هوائية – فرامل ABS – تحكم إلكتروني بالثبات)\n\nشاشة ترفيهية حديثة مع بلوتوث وUSB\n\nمقاعد مريحة مع مساحة داخلية واسعة\n\nالسيارة جديدة بحالة ممتازة', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/788787878787.jpeg', '2025-05-13 03:24:23', '2025-09-16 12:17:34', 0, 0.00, NULL),
(9, 105, 7, 2, 57, 74, NULL, '852840', 50.00, 0, 'كيا ريو 2009 فضي – حالة ممتازة – اقتصادية وعملية', 'هذه سيارة مستعملة ممتازة رقم 9 مع كافة المواصفات المطلوبة.للبيع سيارة كيا ريو موديل 2009، لون فضي، بحالة جيدة جدًا:\n\nناقل حركة: أوتوماتيك\n\nالمحرك: 1.6 لتر اقتصادي في استهلاك البنزين\n\nالممشى: [اكتب عدد الكيلومترات]\n\nالبودي: نظيف بدون حوادث كبيرة (يوجد خدوش بسيطة طبيعية)\n\nالداخلية: مقاعد مريحة، المكيف شغال ممتاز\n\nالمواصفات: زجاج كهرباء – سنتر لوك – باور ستيرنج – وسائد هوائية – جنوط أصلية\n\nالسيارة عملية واقتصادية جدًا في الصيانة وقطع الغيار متوفرة', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/9898784871.jpg', '2025-05-13 03:24:23', '2025-09-16 12:19:43', 0, 0.00, NULL),
(10, 99, 7, 2, 13, 39, NULL, '332337', 50000.00, 0, 'هيونداي أكسنت 2009 للبيع – سيارة عملية واقتصادية', 'للبيع هيونداي أكسنت موديل 2009، لون فضي، سيارة عملية واقتصادية ومناسبة للاستخدام اليومي.\n\nقير أوتوماتيك\n\nمكينة 1.6 لتر اقتصادية\n\nالممشى: 5000\n\nالبودي نظيف مع بعض الخدوش البسيطة الطبيعية لعمر السيارة\n\nالداخلية مرتبة والمكيف شغال ممتاز\n\nمواصفات: زجاج كهرباء – دركسون هيدروليك – مكيف بارد – صيانة دورية منتظمة\n\nاللوحة: 1505 NDB', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/20139915611635747586.jpg', '2025-05-13 03:24:23', '2025-09-16 12:06:06', 0, 0.00, NULL),
(11, 99, 7, 2, 13, 38, NULL, '954299', 7000000.00, 0, 'دودج تشالنجر حديثة – لون برتقالي مميز – أداء رياضي قوي', 'للبيع سيارة دودج تشالنجر بمواصفات رياضية مميزة، لون برتقالي لافت للنظر، سيارة أمريكية أصيلة تجمع بين القوة والفخامة.\n\nمحرك قوي يعطي أداء عالي وسرعة ممتازة\n\nقير أوتوماتيك سلس\n\nجنوط رياضية أصلية\n\nمقاعد جلد فاخرة\n\nشاشة ترفيهية حديثة مع بلوتوث وأنظمة أمان متطورة\n\nالسيارة شبه جديدة، بحالة ممتازة من الداخل والخارج', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/1797548971216.jpg', '2025-05-13 03:24:23', '2025-09-16 12:10:46', 0, 0.00, NULL),
(17, 101, 7, 2, 90, 103, NULL, '321723', 27000.00, 0, 'iPhone 13 Pro Max أخضر – مساحة 256 جيجا – حالة ممتازة', 'للبيع آيفون 13 برو ماكس – لون أخضر مميز – مساحة تخزين 256GB.\n\nالبطارية: 89%\n\nالكاميرات بحالة ممتازة (ثلاثية بدقة 12MP)\n\nشاشة سوبر ريتينا XDR – 6.7 إنش\n\nالجهاز نظيف جداً بدون خدوش\n\nمعه كرتونة وشاحن أصلي\n\n السعر: 27,500 جنيه\n الموقع: القاهرة – مدينة نصر\n للتواصل: 0111111111', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/54484617986123.jpg', '2025-05-13 03:24:23', '2025-09-16 12:13:10', 0, 0.00, NULL),
(18, 101, 7, 2, 90, 93, NULL, '460661', 22900.00, 0, 'Samsung Galaxy S22 Ultra – ذهبي – 512 جيجا – مع قلم S Pen', 'للبيع موبايل سامسونج جالكسي S22 Ultra بحالة ممتازة:\n\nاللون: ذهبي\n\nالذاكرة: 512GB مع 12GB رام\n\nالكاميرا: رباعية بدقة تصل حتى 108MP للتصوير الاحترافي\n\nالبطارية: 5000mAh تصمد ليوم كامل\n\nيدعم قلم S Pen\n\nالجهاز نظيف جداً بدون خدوش\n\nمعاه العلبة الأصلية + شاحن + سماعة\n\n السعر: 22,900 جنيه\n الموقع: القاهرة – المعادي\n للتواصل: 0111111111', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/0404040404.jpeg', '2025-05-13 03:24:23', '2025-09-16 12:14:50', 0, 0.00, NULL),
(26, 100, 7, 2, 57, 73, NULL, '864810', 50.00, 0, 'كلب روت وايلر أصلي للبيع – عمر مناسب وتدريب ممتاز', 'للبيع كلب روت وايلر أصلي، بصحة ممتازة ونشيط جدًا.\n\nالحالة الصحية: ممتازة – مطعّم بالكامل\n\nالعمر: عام\n\nالتدريب: مطيع، ذكي، وحارس ممتاز\n\nالشكل: جسم قوي، لون أسود مع علامات بنية مميزة\n\nيصلح للحراسة أو كرفيق وفيّ للأسرة', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/55555474757.jpeg', '2025-05-13 03:32:03', '2025-09-16 12:10:30', 0, 0.00, NULL),
(27, 100, 7, 2, 90, 100, NULL, '657154', 50.00, 0, 'قطة شيرازية/منزلية جميلة باللون البرتقالي – أليفة ونشيطة', 'للبيع قطة منزلية جميلة باللون البرتقالي (تايغر)، بصحة ممتازة ونظيفة جدًا:\n\nالحالة الصحية: ممتازة، مطعّمة ونشيطة\n\nالعمر: عام\n\nالشخصية: ودودة، هادئة، وأليفة مع الأطفال\n\nمناسبة للتربية داخل المنزل', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2028-06-01 00:00:00', 'uploads/ads/9798989794916.jpg', '2025-05-13 03:32:03', '2025-09-16 12:10:11', 0, 0.00, NULL),
(136, 99, 96, 3, 13, 17, 2, '10136', 1000000.00, 0, 'سيارة', 'مرسيدس', 'chat', 0, 'rejected', '2025-09-25 22:56:58', '2026-09-25 22:56:58', 'uploads/ads/1758830222895.jpg', '2025-09-25 17:57:02', '2025-11-20 23:11:57', 0, 0.00, NULL),
(137, 106, 86, 1, 203, 232, NULL, '10137', 50.00, 0, 'فرامل سيارات أصلية - جودة عالية وأسعار منافسة', 'نوفر فرامل أصلية ومضمونة لجميع أنواع السيارات.  \n- أداء قوي وعمر افتراضي طويل  \n- مطابقة للمواصفات العالمية  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الحصول على عرض الأسعار، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2025-06-20 00:00:00', 'uploads/ads/1759406086782.jpg', '2025-10-02 09:54:46', '2025-12-26 14:21:44', 1, 1000.00, '2025-12-26 14:21:44'),
(138, 106, 86, 1, 203, 232, NULL, '10138', 50.00, 0, 'فلاتر سيارات أصلية - أفضل جودة بأفضل سعر', 'نوفر جميع أنواع الفلاتر الأصلية للسيارات.  \n- فلاتر زيت، هواء، بنزين  \n- جودة مضمونة وأداء موثوق  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الحصول على عرض الأسعار، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759406311685.jpeg', '2025-10-02 09:58:31', '2025-10-02 10:02:08', 0, 0.00, NULL),
(139, 122, 86, 1, 203, 232, NULL, '10139', 150.00, 0, 'تيشيرت رجالي قطن 100% - تصميم عصري وجودة ممتازة', 'نوفر تيشيرتات رجالي مصنوعة من القطن الخالص بجودة عالية.  \n- مريحة للارتداء اليومي  \n- متوفرة بجميع المقاسات والألوان  \n- لا يتغير شكلها أو لونها بعد الغسيل  \n- شحن سريع لجميع المحافظات  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759406654970.jpeg', '2025-10-02 10:04:14', '2025-12-26 14:22:40', 1, 1001.00, '2025-12-26 14:22:40'),
(140, 122, 86, 1, 203, 232, NULL, '10140', 150.00, 0, 'تيشيرت نسائي أنيق - قطن ناعم ومقاسات متنوعة', 'نوفر تيشيرتات نسائية أنيقة وعملية بجودة عالية.  \n- مصنوعة من خامات قطنية مريحة  \n- متوفرة بتصاميم وألوان متنوعة  \n- مناسبة للارتداء اليومي أو المناسبات  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759406858776.jpeg', '2025-10-02 10:07:38', '2025-10-02 14:59:00', 0, 0.00, NULL),
(141, 123, 86, 1, 203, 232, NULL, '10141', 200.00, 0, 'بنطلون رجالي عصري - خامة ممتازة ومقاسات متعددة', 'نوفر بنطلونات رجالي أنيقة وعملية مناسبة لجميع الأذواق.  \n- خامة مريحة وعالية الجودة  \n- تصميم عصري يناسب الحياة اليومية والمناسبات  \n- متوفرة بجميع المقاسات والألوان  \n- شحن سريع لجميع المحافظات  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759416155900.jpeg', '2025-10-02 12:42:35', '2025-10-02 14:58:52', 0, 0.00, NULL),
(142, 123, 86, 1, 203, 232, NULL, '10142', 200.00, 0, 'بنطلون نسائي أنيق - تصميم مميز من Elegant Line', 'نوفر بنطلونات نسائية أنيقة من براند Elegant Line.  \n- خامات مريحة وعالية الجودة  \n- قصّات عصرية ومقاسات متنوعة  \n- متوفرة بألوان متعددة  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759416476965.jpg', '2025-10-02 12:47:56', '2025-10-02 14:58:43', 0, 0.00, NULL),
(143, 121, 86, 1, 203, 232, NULL, '10143', 200.00, 0, 'ملابس أطفال أولاد - خامات مريحة وتصميمات عصرية من Little Star', 'نوفر تشكيلة مميزة من ملابس الأطفال الأولاد من براند Little Star.  \n- خامات قطنية مريحة وآمنة على بشرة الطفل  \n- تصميمات عصرية مناسبة لجميع الأعمار  \n- متوفرة بمقاسات وألوان متنوعة  \n- شحن سريع لجميع المحافظات  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759416824837.jpeg', '2025-10-02 12:53:44', '2025-10-02 14:58:37', 0, 0.00, NULL),
(144, 121, 86, 1, 203, 232, NULL, '10144', 200.00, 0, 'ملابس أطفال بنات - تصاميم أنيقة وجودة ممتازة من Sweet Kids', 'نوفر ملابس أطفال بنات من براند Sweet Kids بجودة عالية وتصاميم مميزة.  \n- خامات ناعمة ومريحة للبشرة  \n- قصات عصرية تناسب جميع المناسبات  \n- متوفرة بمقاسات وألوان متعددة  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759417024372.jpeg', '2025-10-02 12:57:04', '2025-10-02 14:58:30', 0, 0.00, NULL),
(145, 121, 86, 1, 203, 232, NULL, '10145', 200.00, 0, 'ملابس أطفال بنات - تصاميم أنيقة وجودة ممتازة من Sweet Kids', 'نوفر ملابس أطفال بنات من براند Sweet Kids بجودة عالية وتصاميم مميزة.  \n- خامات ناعمة ومريحة للبشرة  \n- قصات عصرية تناسب جميع المناسبات  \n- متوفرة بمقاسات وألوان متعددة  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759417047492.jpeg', '2025-10-02 12:57:27', '2025-10-02 14:58:20', 0, 0.00, NULL),
(146, 107, 86, 1, 203, 232, NULL, '10146', 7500.00, 0, 'شاشة ذكية 55 بوصة - VisionTech', 'نوفر شاشة ذكية 55 بوصة من براند VisionTech بجودة عرض مذهلة.  \n- دقة 4K فائقة الوضوح  \n- نظام تشغيل ذكي يدعم التطبيقات والبث المباشر  \n- تصميم أنيق وحواف نحيفة  \n- ضمان لمدة عام  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759420900725.jpeg', '2025-10-02 14:01:40', '2025-10-02 16:09:39', 0, 0.00, NULL),
(147, 107, 86, 1, 203, 232, NULL, '10147', 6200.00, 0, 'غسالة أوتوماتيك 8 كجم - CleanMax', 'نوفر غسالة أوتوماتيك 8 كجم من براند CleanMax بأداء قوي وموفر للطاقة.  \n- برامج متعددة للغسيل  \n- تصميم عصري وسهل الاستخدام  \n- استهلاك منخفض للمياه والكهرباء  \n- ضمان لمدة عام  \n- شحن لجميع المحافظات خلال 24 إلى 48 ساعة  \nللاستفسار أو الطلب، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759421246406.jpeg', '2025-10-02 14:07:26', '2025-10-02 16:09:32', 0, 0.00, NULL),
(148, 109, 86, 1, 203, 232, NULL, '10148', 4500.00, 0, 'كلب جيرمن شيبرد للبيع - عمر 6 شهور', 'كلب جيرمن شيبرد أصلي للبيع، عمره 6 شهور، مدرب على الأوامر الأساسية ونشيط جداً.  \n- حالة صحية ممتازة  \n- تم إعطاؤه جميع التطعيمات اللازمة  \n- مناسب للحراسة أو الرفقة  \nللتفاصيل أو الحجز، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759421983987.jpeg', '2025-10-02 14:19:43', '2025-10-02 16:32:20', 0, 0.00, NULL),
(150, 109, 86, 1, 203, 232, NULL, '10150', 0.00, 0, 'كلب جولدن ريتريفر للتبني - ودود ولطيف', 'كلب جولدن ريتريفر متوفر للتبني، عمره سنة واحدة، مطعّم، اجتماعي ويحب الأطفال.  \n- حالته الصحية ممتازة  \n- تم تدريبه على الطاعة والنظافة  \n- مناسب للعائلات  \nللتبني أو الاستفسار، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759422197271.jpeg', '2025-10-02 14:23:17', '2025-10-02 16:32:15', 0, 0.00, NULL),
(151, 110, 86, 1, 203, 232, NULL, '10151', 1000.00, 0, 'قطة شيرازي للبيع - عمر 4 شهور', 'قطة شيرازي أصلية للبيع، عمرها 4 شهور، نظيفة جداً ولطيفة مع الأطفال.  \n- مطعّمة بالكامل  \n- معتادة على الليتر بوكس  \n- فرو ناعم وطبيعة هادئة  \nللاستفسار أو الحجز، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759422588577.jpeg', '2025-10-02 14:29:48', '2025-10-02 16:32:09', 0, 0.00, NULL),
(152, 110, 86, 1, 203, 232, NULL, '10152', 0.00, 0, 'قطة بلدي للتبني - أليفة ونظيفة', 'قطة بلدي للتبني، عمرها حوالي 6 شهور، نشيطة وأليفة جداً.  \n- مطعّمة ونظيفة  \n- معتادة على الحياة داخل المنزل  \n- تحب اللعب والتعامل مع الأطفال  \nللتبني أو الاستفسار، يرجى التواصل عبر البريد الإلكتروني.', 'email', 1, 'accepted', '2025-05-01 00:00:00', '2026-06-20 00:00:00', 'uploads/ads/1759422703876.jpeg', '2025-10-02 14:31:43', '2025-10-02 16:32:03', 0, 0.00, NULL),
(153, 99, 1, 1, NULL, NULL, NULL, '10153', 0.00, 0, 'title', 'kjkh', 'email', 1, 'under_review', '2025-10-05 00:00:00', '2025-11-01 00:00:00', NULL, '2025-10-05 11:47:41', '2025-10-05 11:47:41', 0, 0.00, NULL),
(154, 99, 1, 1, NULL, NULL, 2, '10154', 0.00, 0, 'title', 'kjkh', 'email', 1, 'rejected', '2025-10-05 00:00:00', '2025-11-01 00:00:00', NULL, '2025-10-05 11:49:16', '2025-11-05 22:29:47', 0, 0.00, NULL),
(155, 99, 1, 1, NULL, NULL, NULL, '10155', 0.00, 0, 'title', 'kjkh', 'email', 1, 'under_review', '2025-10-05 00:00:00', '2025-11-01 00:00:00', NULL, '2025-10-05 11:51:39', '2025-10-05 11:51:39', 0, 0.00, NULL),
(156, 99, 7, 1, NULL, NULL, NULL, '10156', 0.00, 1, 'title2', 'deck', 'email', 1, 'under_review', '2025-10-05 00:00:00', '2025-10-31 00:00:00', 'uploads/ads/1759677264368.png', '2025-10-05 13:14:24', '2025-10-05 13:14:24', 0, 0.00, NULL),
(157, 99, 7, 2, 203, 231, NULL, '10157', 0.00, 1, 'فهفمثص2', '10000000000000', 'email', 0, 'under_review', '2025-10-04 00:00:00', '2025-10-25 00:00:00', 'uploads/ads/1759677717579.png', '2025-10-05 13:21:57', '2025-10-05 13:21:57', 0, 0.00, NULL),
(158, 99, 7, 1, 203, 231, NULL, '10158', 0.00, 1, '00', 'sss', 'email', 0, 'under_review', '2025-10-04 00:00:00', '2025-10-25 00:00:00', 'uploads/ads/1759679230578.png', '2025-10-05 13:47:10', '2025-10-05 13:47:10', 0, 0.00, NULL),
(159, 99, 97, 3, 203, 230, NULL, '10159', 15000.00, 0, 'عملات نادرة', 'نويوزينعثايىوؤظمرنمثعايو يزي', 'phone', 1, 'accepted', '2025-11-05 20:25:29', '2026-11-05 20:25:29', 'uploads/ads/1762367133767.jpg', '2025-11-05 17:25:33', '2025-11-23 18:51:56', 0, 0.00, NULL),
(160, 110, 86, 2, 205, 239, NULL, '10160', 0.00, 0, 'title1', 'desc1', 'phone', 1, 'under_review', '2025-11-05 21:56:29', '2026-11-05 21:56:29', 'uploads/ads/1762372591624.jpg', '2025-11-05 18:56:31', '2025-11-05 18:56:31', 0, 0.00, NULL),
(161, 105, 86, 3, 205, 239, NULL, '10161', 123.00, 0, 'title', 'desc', 'phone', 1, 'under_review', '2025-11-06 01:12:31', '2026-11-06 01:12:31', 'uploads/ads/1762384353116.jpg', '2025-11-05 22:12:33', '2025-11-05 22:12:33', 0, 0.00, NULL),
(162, 110, 86, 3, 204, 235, NULL, '10162', 130.00, 0, 'title', 'desc', 'chat', 1, 'under_review', '2025-11-07 23:16:39', '2026-11-07 23:16:39', 'uploads/ads/1762550202300.jpg', '2025-11-07 20:16:42', '2025-11-07 20:16:42', 0, 0.00, NULL),
(163, 110, 86, 3, 204, 235, NULL, '10163', 15.00, 0, 'title', 'des', 'chat', 1, 'under_review', '2025-11-07 23:45:04', '2026-11-07 23:45:04', 'uploads/ads/1762551906502.jpg', '2025-11-07 20:45:06', '2025-11-07 20:45:06', 0, 0.00, NULL),
(164, 99, 96, 3, 204, 235, NULL, '10164', 2500000.00, 0, 'سيارة زيكر', 'سيارة كهربائية', 'phone', 0, 'under_review', '2025-11-10 16:29:24', '2026-11-10 16:29:24', 'uploads/ads/1762784967128.jpg', '2025-11-10 13:29:27', '2025-11-10 13:29:27', 0, 0.00, NULL),
(165, 101, 96, 3, 204, 235, NULL, '10165', 100000.00, 0, 'الهرم', 'سيارة', 'phone', 0, 'accepted', '2025-11-26 17:46:10', '2026-11-26 17:46:10', 'uploads/ads/1764171972107.jpg', '2025-11-26 14:46:12', '2025-11-26 19:16:59', 0, 0.00, NULL),
(166, 189, 97, 3, 203, 230, NULL, '10166', 50000.00, 0, '...', '.......', 'phone', 1, 'under_review', '2025-12-03 02:31:29', '2026-12-03 02:31:29', 'uploads/ads/1764721892492.jpg', '2025-12-02 23:31:32', '2025-12-02 23:31:32', 0, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads_attributes`
--

CREATE TABLE `ads_attributes` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ads_attributes`
--

INSERT INTO `ads_attributes` (`id`, `ad_id`, `attribute_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'bhjbhjbhj', '2025-04-06 20:03:12', '2025-04-06 20:03:12'),
(2, 2, 1, 'bhjbhjbhj', '2025-04-06 20:03:16', '2025-04-06 20:03:16'),
(3, 2, 1, 'bhjbhjbhj', '2025-04-06 20:03:26', '2025-04-06 20:03:26'),
(4, 24, 2, '5', '2025-05-05 10:11:11', '2025-05-05 10:11:11'),
(5, 25, 2, '5', '2025-05-05 10:15:53', '2025-05-05 10:15:53'),
(6, 26, 2, '5', '2025-05-05 10:17:09', '2025-05-05 10:17:09'),
(7, 27, 2, '5', '2025-05-05 10:18:13', '2025-05-05 10:18:13'),
(8, 28, 2, '5', '2025-05-05 10:21:39', '2025-05-05 10:21:39'),
(9, 29, 2, '5', '2025-05-05 10:23:54', '2025-05-05 10:23:54'),
(10, 30, 2, '5', '2025-05-05 10:24:46', '2025-05-05 10:24:46'),
(11, 31, 2, '5', '2025-05-05 10:26:36', '2025-05-05 10:26:36'),
(12, 32, 2, '5', '2025-05-12 01:19:40', '2025-05-12 01:19:40'),
(13, 33, 2, '5', '2025-05-12 01:27:19', '2025-05-12 01:27:19'),
(14, 34, 2, '5', '2025-05-12 01:36:20', '2025-05-12 01:36:20'),
(15, 35, 2, '5', '2025-05-12 01:36:22', '2025-05-12 01:36:22'),
(17, 36, 2, 'test', '2025-05-12 22:36:14', '2025-05-12 22:36:14'),
(18, 37, 2, 'sdsd', '2025-05-12 22:37:01', '2025-05-12 22:37:01'),
(20, 38, 2, 'test', '2025-05-12 22:38:40', '2025-05-12 22:38:40'),
(21, 39, 2, 'sdsd', '2025-05-12 22:39:15', '2025-05-12 22:39:15'),
(24, 40, 2, 'test', '2025-05-12 22:43:15', '2025-05-12 22:43:15'),
(25, 1, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(26, 1, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(27, 1, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(28, 2, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(29, 2, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(30, 2, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(31, 3, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(32, 3, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(33, 3, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(34, 4, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(35, 4, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(36, 4, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(37, 5, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(38, 5, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(39, 5, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(40, 6, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(41, 6, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(42, 6, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(43, 7, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(44, 7, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(45, 7, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(46, 8, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(47, 8, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(48, 8, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(49, 9, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(50, 9, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(51, 9, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(52, 10, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(53, 10, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(54, 10, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(55, 11, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(56, 11, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(57, 11, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(58, 12, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(59, 12, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(60, 12, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(61, 13, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(62, 13, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(63, 13, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(64, 14, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(65, 14, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(66, 14, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(67, 15, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(68, 15, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(69, 15, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(70, 16, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(71, 16, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(72, 16, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(73, 17, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(74, 17, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(75, 17, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(76, 18, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(77, 18, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(78, 18, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(79, 19, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(80, 19, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(81, 19, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(82, 20, 9, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(83, 20, 10, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(84, 20, 11, 'قيمة تجريبية', '2025-05-13 03:29:17', '2025-05-13 03:29:17'),
(85, 21, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(86, 21, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(87, 21, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(88, 22, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(89, 22, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(90, 22, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(91, 23, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(92, 23, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(93, 23, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(94, 24, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(95, 24, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(96, 24, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(97, 25, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(98, 25, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(99, 25, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(100, 26, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(101, 26, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(102, 26, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(103, 27, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(104, 27, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(105, 27, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(106, 28, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(107, 28, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(108, 28, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(109, 29, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(110, 29, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(111, 29, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(112, 30, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(113, 30, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(114, 30, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(115, 31, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(116, 31, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(117, 31, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(118, 32, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(119, 32, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(120, 32, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(121, 33, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(122, 33, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(123, 33, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(124, 34, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(125, 34, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(126, 34, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(127, 35, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(128, 35, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(129, 35, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(130, 36, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(131, 36, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(132, 36, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(133, 37, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(134, 37, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(135, 37, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(136, 38, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(137, 38, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(138, 38, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(139, 39, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(140, 39, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(141, 39, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(142, 40, 9, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(143, 40, 10, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(144, 40, 11, 'قيمة ثانية', '2025-05-13 03:35:27', '2025-05-13 03:35:27'),
(145, 101, 9, 'sdsd', '2025-06-07 07:35:46', '2025-06-07 07:35:46'),
(146, 102, 9, 'sdsd', '2025-06-23 08:28:34', '2025-06-23 08:28:34'),
(147, 103, 9, 'sdsd', '2025-06-23 08:30:13', '2025-06-23 08:30:13'),
(148, 104, 9, 'sdsd', '2025-06-23 08:30:53', '2025-06-23 08:30:53'),
(149, 105, 9, 'sdsd', '2025-06-23 08:32:07', '2025-06-23 08:32:07'),
(150, 106, 9, 'sdsd', '2025-06-23 08:32:13', '2025-06-23 08:32:13'),
(151, 107, 9, 'sdsd', '2025-06-23 08:36:10', '2025-06-23 08:36:10'),
(152, 108, 9, 'sdsd', '2025-06-23 08:36:31', '2025-06-23 08:36:31'),
(153, 109, 9, 'sdsd', '2025-06-23 08:36:36', '2025-06-23 08:36:36'),
(154, 110, 9, 'sdsd', '2025-06-23 08:36:39', '2025-06-23 08:36:39'),
(155, 111, 9, 'sdsd', '2025-06-27 01:58:16', '2025-06-27 01:58:16'),
(156, 113, 9, 'sdsd', '2025-06-27 12:28:42', '2025-06-27 12:28:42'),
(157, 114, 9, 'sdsd', '2025-06-27 12:30:51', '2025-06-27 12:30:51'),
(158, 115, 9, 'sdsd', '2025-06-27 12:38:25', '2025-06-27 12:38:25'),
(159, 116, 9, 'sdsd', '2025-06-27 12:39:37', '2025-06-27 12:39:37'),
(160, 117, 9, 'sdsd', '2025-07-16 15:51:40', '2025-07-16 15:51:40'),
(161, 118, 9, 'sdsd', '2025-07-16 15:53:32', '2025-07-16 15:53:32'),
(162, 119, 9, 'sdsd', '2025-07-16 15:53:53', '2025-07-16 15:53:53'),
(163, 120, 9, 'sdsd', '2025-07-16 15:56:40', '2025-07-16 15:56:40'),
(166, 123, 10, 'test', '2025-07-22 12:13:31', '2025-07-22 12:13:31'),
(167, 125, 9, 'sdsd', '2025-07-22 12:21:08', '2025-07-22 12:21:08'),
(168, 126, 9, 'sdsd', '2025-07-22 12:21:47', '2025-07-22 12:21:47'),
(169, 127, 9, 'sdsd', '2025-07-22 12:27:06', '2025-07-22 12:27:06'),
(170, 128, 9, 'sdsd', '2025-07-22 12:39:45', '2025-07-22 12:39:45'),
(171, 137, 9, 'فرامل أصلية', '2025-10-02 09:54:46', '2025-10-02 09:54:46'),
(172, 138, 9, 'فرامل أصلية', '2025-10-02 09:58:31', '2025-10-02 09:58:31'),
(173, 139, 9, 'تيشيرت رجالي', '2025-10-02 10:04:14', '2025-10-02 10:04:14'),
(174, 140, 9, 'تيشيرت نسائي', '2025-10-02 10:07:38', '2025-10-02 10:07:38'),
(175, 141, 9, 'Classic Wear', '2025-10-02 12:42:35', '2025-10-02 12:42:35'),
(176, 142, 9, 'Elegant Line', '2025-10-02 12:47:56', '2025-10-02 12:47:56'),
(177, 143, 9, 'Little Star', '2025-10-02 12:53:44', '2025-10-02 12:53:44'),
(178, 144, 9, 'Sweet Kids', '2025-10-02 12:57:04', '2025-10-02 12:57:04'),
(179, 145, 9, 'Sweet Kids', '2025-10-02 12:57:27', '2025-10-02 12:57:27'),
(180, 146, 9, 'VisionTech', '2025-10-02 14:01:40', '2025-10-02 14:01:40'),
(181, 147, 9, 'CleanMax', '2025-10-02 14:07:26', '2025-10-02 14:07:26'),
(182, 148, 9, 'German Shepherd', '2025-10-02 14:19:43', '2025-10-02 14:19:43'),
(183, 149, 9, 'Golden Retriever', '2025-10-02 14:20:47', '2025-10-02 14:20:47'),
(184, 150, 9, 'Golden Retriever', '2025-10-02 14:23:17', '2025-10-02 14:23:17'),
(185, 151, 9, 'Shirazi', '2025-10-02 14:29:48', '2025-10-02 14:29:48'),
(186, 152, 9, 'Baladi', '2025-10-02 14:31:43', '2025-10-02 14:31:43'),
(187, 156, 9, 'test brand', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(188, 156, 10, '2001', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(189, 156, 35, '24', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(190, 157, 11, '201', '2025-10-05 13:21:57', '2025-10-05 13:21:57'),
(191, 158, 10, 'test brand', '2025-10-05 13:47:10', '2025-10-05 13:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `ads_images`
--

CREATE TABLE `ads_images` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ads_images`
--

INSERT INTO `ads_images` (`id`, `ad_id`, `image_path`, `created_at`, `updated_at`) VALUES
(10, 11, 'uploads/attributes/0241844841.jpeg\n', '2025-04-07 17:17:49', '2025-09-16 12:37:19'),
(47, 1, 'uploads/attributes/JEEP-AVENGER-ICE-MY25-768x360-SKID-PLATES.jpg\n', '2025-05-13 03:25:47', '2025-09-16 12:31:32'),
(146, 1, 'uploads/attributes/8882a4f5-4fab-450c-ae2c-3fc914726690.png\n', '2025-05-13 03:26:29', '2025-09-16 12:32:22'),
(188, 9, 'uploads/attributes/44447151791.jpeg', '2025-05-13 03:26:29', '2025-09-16 12:34:32'),
(193, 10, 'uploads/attributes/7878484515.jpeg', '2025-05-13 03:26:29', '2025-09-16 12:35:54'),
(197, 11, 'uploads/attributes/548485148151209.jpeg\n', '2025-05-13 03:26:29', '2025-09-16 12:37:28'),
(231, 18, 'uploads/attributes/202020218.jpeg\n', '2025-05-13 03:26:29', '2025-09-16 12:40:12'),
(388, 9, 'uploads/attributes/784519492179.jpeg', '2025-05-13 03:29:17', '2025-09-16 12:34:02'),
(424, 17, 'uploads/attributes/01478256.jpeg\n', '2025-05-13 03:29:17', '2025-09-16 12:38:54'),
(428, 17, 'uploads/attributes/021878423297.jpeg\n', '2025-05-13 03:29:17', '2025-09-16 12:39:05'),
(433, 18, 'uploads/attributes/78789785487.jpeg\n', '2025-05-13 03:29:17', '2025-09-16 12:40:21'),
(476, 27, 'uploads/attributes/87897878794.jpeg\n', '2025-05-13 03:32:03', '2025-09-16 12:41:54'),
(570, 26, 'uploads/attributes/4444474.jpeg', '2025-05-13 03:35:27', '2025-09-16 12:26:09'),
(571, 26, 'uploads/attributes/44444740.jpeg', '2025-05-13 03:35:27', '2025-09-16 12:27:44'),
(577, 27, 'uploads/attributes/02124848478.jpeg\n', '2025-05-13 03:35:27', '2025-09-16 12:42:01'),
(668, 136, 'uploads/ads/1758830222134.jpg', '2025-09-25 17:57:02', '2025-09-25 17:57:02'),
(669, 137, 'uploads/ads/1759406086351.jpeg', '2025-10-02 09:54:46', '2025-10-02 09:54:46'),
(670, 137, 'uploads/ads/1759406086249.jpg', '2025-10-02 09:54:46', '2025-10-02 09:54:46'),
(671, 138, 'uploads/ads/1759406311865.jpeg', '2025-10-02 09:58:31', '2025-10-02 09:58:31'),
(672, 138, 'uploads/ads/1759406311332.jpeg', '2025-10-02 09:58:31', '2025-10-02 09:58:31'),
(673, 139, 'uploads/ads/1759406654729.jpeg', '2025-10-02 10:04:14', '2025-10-02 10:04:14'),
(674, 139, 'uploads/ads/1759406654556.jpeg', '2025-10-02 10:04:14', '2025-10-02 10:04:14'),
(675, 140, 'uploads/ads/1759406858593.jpeg', '2025-10-02 10:07:38', '2025-10-02 10:07:38'),
(676, 141, 'uploads/ads/1759416155603.jpeg', '2025-10-02 12:42:35', '2025-10-02 12:42:35'),
(677, 142, 'uploads/ads/1759416476234.jpeg', '2025-10-02 12:47:56', '2025-10-02 12:47:56'),
(678, 143, 'uploads/ads/1759416824902.jpeg', '2025-10-02 12:53:44', '2025-10-02 12:53:44'),
(679, 143, 'uploads/ads/1759416824712.jpeg', '2025-10-02 12:53:44', '2025-10-02 12:53:44'),
(680, 144, 'uploads/ads/1759417024654.jpeg', '2025-10-02 12:57:04', '2025-10-02 12:57:04'),
(681, 145, 'uploads/ads/1759417047679.jpeg', '2025-10-02 12:57:27', '2025-10-02 12:57:27'),
(682, 146, 'uploads/ads/1759420900414.jpeg', '2025-10-02 14:01:40', '2025-10-02 14:01:40'),
(683, 147, 'uploads/ads/1759421246905.jpeg', '2025-10-02 14:07:26', '2025-10-02 14:07:26'),
(684, 148, 'uploads/ads/1759421983701.jpeg', '2025-10-02 14:19:43', '2025-10-02 14:19:43'),
(685, 149, 'uploads/ads/1759422047828.jpeg', '2025-10-02 14:20:47', '2025-10-02 14:20:47'),
(686, 150, 'uploads/ads/1759422197642.jpeg', '2025-10-02 14:23:17', '2025-10-02 14:23:17'),
(687, 151, 'uploads/ads/1759422588675.jpeg', '2025-10-02 14:29:48', '2025-10-02 14:29:48'),
(688, 152, 'uploads/ads/1759422703207.jpeg', '2025-10-02 14:31:43', '2025-10-02 14:31:43'),
(689, 152, 'uploads/ads/1759422703159.jpeg', '2025-10-02 14:31:43', '2025-10-02 14:31:43'),
(690, 156, 'uploads/ads/1759677264624.png', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(691, 156, 'uploads/ads/1759677264118.png', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(692, 156, 'uploads/ads/1759677264682.png', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(693, 156, 'uploads/ads/1759677264378.png', '2025-10-05 13:14:24', '2025-10-05 13:14:24'),
(694, 157, 'uploads/ads/1759677717888.png', '2025-10-05 13:21:57', '2025-10-05 13:21:57'),
(695, 157, 'uploads/ads/1759677717103.png', '2025-10-05 13:21:57', '2025-10-05 13:21:57'),
(696, 158, 'uploads/ads/1759679230354.png', '2025-10-05 13:47:10', '2025-10-05 13:47:10'),
(697, 159, 'uploads/ads/1762367133168.jpg', '2025-11-05 17:25:33', '2025-11-05 17:25:33'),
(698, 160, 'uploads/ads/1762372591993.jpg', '2025-11-05 18:56:31', '2025-11-05 18:56:31'),
(699, 161, 'uploads/ads/1762384353675.jpg', '2025-11-05 22:12:33', '2025-11-05 22:12:33'),
(700, 162, 'uploads/ads/1762550202713.jpg', '2025-11-07 20:16:42', '2025-11-07 20:16:42'),
(701, 163, 'uploads/ads/1762551906767.jpg', '2025-11-07 20:45:06', '2025-11-07 20:45:06'),
(702, 164, 'uploads/ads/1762784967894.jpg', '2025-11-10 13:29:27', '2025-11-10 13:29:27'),
(703, 164, 'uploads/ads/1762784967140.jpg', '2025-11-10 13:29:27', '2025-11-10 13:29:27'),
(704, 165, 'uploads/ads/1764171972989.jpg', '2025-11-26 14:46:12', '2025-11-26 14:46:12'),
(705, 166, 'uploads/ads/1764721892226.jpg', '2025-12-02 23:31:32', '2025-12-02 23:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `ads_type`
--

CREATE TABLE `ads_type` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ads_type`
--

INSERT INTO `ads_type` (`id`, `name_ar`, `name_en`, `enable`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Exchange', 'Exchange', 1, 'Exchange', '2025-03-28 12:40:07', '2025-06-27 03:06:12'),
(2, 'Auction', 'Auction', 1, 'Auction', '2025-03-28 12:40:42', '2025-06-27 03:03:56'),
(3, 'Sale', 'Sale', 1, 'Sale', '2025-03-28 12:41:29', '2025-06-27 03:03:50'),
(4, 'Sale', 'Sale', 0, '854', '2025-03-28 12:41:37', '2025-06-27 03:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name_ar`, `name_en`, `type`, `image`, `enable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'red', 'red', 'select', 'uploads/attributes/1771256085150.jpg', 1, NULL, '2026-02-16 14:34:45', '2026-02-16 14:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `user_id`, `ad_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 7, 101, 5.00, '2025-06-07 08:25:00', '2025-06-27 14:13:41'),
(2, 32, 101, 5.50, '2025-06-07 08:25:29', '2025-06-27 14:14:18'),
(3, 34, 101, 5000.00, '2025-06-10 09:11:10', '2025-06-27 14:14:25'),
(4, 75, 113, 5.50, '2025-06-27 12:29:15', '2025-06-27 12:29:15'),
(5, 75, 114, 5.50, '2025-06-27 12:31:11', '2025-06-27 12:31:11'),
(6, 75, 115, 5.50, '2025-06-27 12:38:37', '2025-06-27 12:38:37'),
(7, 76, 1, 100.00, '2025-06-27 12:39:56', '2025-06-27 12:39:56'),
(8, 76, 1, 150.00, '2025-06-27 12:42:19', '2025-06-27 12:42:19'),
(9, 76, 1, 160.00, '2025-06-27 12:43:20', '2025-06-27 12:43:20'),
(10, 76, 1, 170.00, '2025-06-27 12:43:43', '2025-06-27 12:43:43'),
(11, 76, 1, 180.00, '2025-07-17 19:35:39', '2025-07-17 19:35:39'),
(12, 76, 1, 190.00, '2025-09-30 06:36:47', '2025-09-30 06:36:47'),
(13, 76, 1, 200.00, '2025-09-30 06:38:51', '2025-09-30 06:38:51'),
(14, 86, 1, 210.00, '2025-10-23 17:17:21', '2025-10-23 17:17:21'),
(15, 97, 1, 250.00, '2025-11-05 17:59:32', '2025-11-05 17:59:32'),
(16, 97, 10, 56000.00, '2025-11-09 21:35:01', '2025-11-09 21:35:01'),
(17, 97, 10, 560000.00, '2025-11-09 21:35:03', '2025-11-09 21:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/categories/1661202560540.png', NULL, '2022-08-23 04:09:20', '2022-08-23 04:09:20'),
(2, 'uploads/categories/1661202733133.png', 52, '2022-08-23 04:12:13', '2022-08-23 04:12:13'),
(3, 'uploads/categories/1661202757890.png', NULL, '2022-08-23 04:12:37', '2022-08-23 04:12:37'),
(4, 'uploads/categories/1661202787737.png', 52, '2022-08-23 04:13:07', '2022-08-23 04:13:07'),
(5, 'uploads/categories/1664387422750.jpeg', NULL, '2022-09-29 00:50:22', '2022-09-29 00:50:22'),
(6, 'uploads/categories/1664387433270.jpeg', NULL, '2022-09-29 00:50:33', '2022-09-29 00:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 100,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `end_point` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_free` tinyint(1) DEFAULT 1,
  `free_ads_limit` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `rank`, `parent_id`, `name_ar`, `name_en`, `image`, `end_point`, `created_at`, `updated_at`, `order`, `is_free`, `free_ads_limit`) VALUES
(1, 100, 0, 'مركبات جديد', 'New Vehicles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(2, 100, 1, 'كهرباء', 'Electric', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(3, 100, 1, 'بنزين', 'Petrol', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(4, 100, 1, 'غاز', 'Gas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(5, 100, 0, 'مركبات مستعمل', 'Used Vehicles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(6, 100, 5, 'كهرباء', 'Electric', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(7, 100, 5, 'بنزين', 'Petrol', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(8, 100, 5, 'غاز', 'Gas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(9, 100, 0, 'مركبات كلاسيك', 'Classic Vehicles', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(10, 100, 0, 'مركبات مستوردة', 'Imported Vehicles', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(11, 100, 0, 'دراجات نارية', 'Motorcycles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 5, 1, 0),
(12, 100, 11, 'تأجير', 'Rental', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(13, 100, 11, 'بيع', 'Sale', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(14, 100, 11, 'سكوتر كهربائي', 'Electric Scooter', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(15, 100, 0, 'قطع غيار', 'Spare Parts', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(16, 100, 0, 'تأجير مركبات', 'Vehicle Rental', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 7, 1, 0),
(17, 100, 16, 'مع كابتن', 'With Driver', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(18, 100, 16, 'بدون كابتن', 'Without Driver', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(19, 100, 0, 'مراكز الصيانة', 'Service Centers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(20, 100, 0, 'سمكرة', 'Bodywork', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(21, 100, NULL, 'عقارات', 'Real Estate', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(22, 100, 21, 'للبيع', 'For Sale', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(23, 100, 22, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(24, 100, 22, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(25, 100, 22, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(26, 100, 22, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(27, 100, 22, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(28, 100, 22, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(29, 100, 22, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(30, 100, 21, 'تأجير', 'For Rent', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(31, 100, 30, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(32, 100, 30, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(33, 100, 30, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(34, 100, 30, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(35, 100, 30, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(36, 100, 30, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(37, 100, 30, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(38, 100, 21, 'مطلوب شراء', 'Wanted to Buy', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(39, 100, 38, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(40, 100, 38, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(41, 100, 38, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(42, 100, 38, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(43, 100, 38, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(44, 100, 38, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(45, 100, 38, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(46, 100, 21, 'مدن حديثة', 'New Cities', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(47, 100, 21, 'مشاركة عقار', 'Property Share', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(48, 100, NULL, 'إلكترونيات والأجهزة الكهربائية', 'Electronics & Appliances', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(49, 100, 48, 'اجهزة منزلية', 'Home Appliances', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(50, 100, 49, 'غسالات ملابس', 'Washing Machines', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(51, 100, 49, 'غسالات أطباق', 'Dishwashers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(52, 100, 49, 'شاشات تلفزيون', 'TVs', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(53, 100, 49, 'ثلاجات', 'Refrigerators', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(54, 100, 49, 'ديب فريزر', 'Deep Freezer', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(55, 100, 49, 'ميكرويف', 'Microwave', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(56, 100, 49, 'شفاطات', 'Hoods', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(57, 100, 49, 'تكييف', 'AC', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(58, 100, 49, 'مراوح', 'Fans', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(59, 100, 48, 'اجهزة مكتبيه', 'Office Equipment', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(60, 100, 48, 'هواتف', 'Phones', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(61, 100, 60, 'اكسسوارات', 'Accessories', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(62, 100, 60, 'مطلوب', 'Wanted', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(63, 100, 60, 'بيع', 'Sale', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(64, 100, 60, 'استبدال', 'Exchange', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(65, 100, 48, 'كمبيوترات', 'Desktops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(66, 100, 48, 'لابتوبات', 'Laptops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(67, 100, 48, 'اجهزة ذكية', 'Smart Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(68, 100, 48, 'اجهزة مستعملة', 'Used Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(69, 100, 48, 'العاب فيديو', 'Video Games', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(70, 100, 48, 'اجهزة أخرى', 'Other Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(71, 100, NULL, 'مقاولات وصيانة', 'Contracting & Maintenance', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 4, 1, 0),
(72, 100, 71, 'مقاولات تشطيبات كاملة', 'Full Finishing Contracting', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(73, 100, 71, 'صحي', 'Plumbing', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(74, 100, 71, 'كهرباء', 'Electricity', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(75, 100, 71, 'المنيوم', 'Aluminium', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(76, 100, 71, 'حداد', 'Steel Works', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(77, 100, 71, 'ديكور', 'Decoration', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(78, 100, 71, 'دهانات', 'Painting', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(79, 100, 71, 'نجار', 'Carpentry', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(80, 100, 71, 'تكييف', 'AC Works', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(81, 100, 71, 'أشجار زراعية', 'Landscaping', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 10, 1, 0),
(82, 100, 71, 'صيانة اجهزة منزلية', 'Home Appliances Repair', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 11, 1, 0),
(83, 100, NULL, 'حيوانات', 'Pets & Animals', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 5, 1, 0),
(84, 100, 83, 'قطط', 'Cats', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(85, 100, 83, 'كلاب', 'Dogs', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(86, 100, 83, 'طيور', 'Birds', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(87, 100, 83, 'معدات حيوانات', 'Pet Equipment', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(88, 100, 83, 'اكل الحيوانات', 'Pet Food', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(89, 100, 83, 'حيوانات أخرى', 'Other Animals', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(90, 100, NULL, 'وظائف', 'Jobs', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 6, 1, 0),
(91, 100, 90, 'مطلوب وظائف', 'Job Wanted', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(92, 100, 90, 'وظائف شاغرة', 'Job Vacancies', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(93, 100, NULL, 'الخدمات اللوجستية', 'Logistics & Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 7, 1, 0),
(94, 100, NULL, 'محركات', 'Motors', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(95, 100, 94, 'مركبات جديد', 'New Vehicles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(96, 100, 95, 'كهرباء', 'Electric', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(97, 100, 95, 'بنزين', 'Petrol', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(98, 100, 95, 'غاز', 'Gas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(99, 100, 94, 'مركبات مستعمل', 'Used Vehicles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(100, 100, 99, 'كهرباء', 'Electric', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(101, 100, 99, 'بنزين', 'Petrol', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(102, 100, 99, 'غاز', 'Gas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(103, 100, 94, 'مركبات كلاسيك', 'Classic Vehicles', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(104, 100, 94, 'مركبات مستوردة', 'Imported Vehicles', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(105, 100, 94, 'دراجات نارية', 'Motorcycles', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 5, 1, 0),
(106, 100, 105, 'تأجير', 'Rental', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(107, 100, 105, 'بيع', 'Sale', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(108, 100, 105, 'سكوتر كهربائي', 'Electric Scooter', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(109, 100, 94, 'قطع غيار', 'Spare Parts', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(110, 100, 94, 'تأجير مركبات', 'Vehicle Rental', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 7, 1, 0),
(111, 100, 110, 'مع كابتن', 'With Driver', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(112, 100, 110, 'بدون كابتن', 'Without Driver', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(113, 100, 94, 'مراكز الصيانة', 'Service Centers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(114, 100, 94, 'سمكرة', 'Bodywork', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(115, 100, NULL, 'عقارات', 'Real Estate', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(116, 100, 115, 'للبيع', 'For Sale', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(117, 100, 116, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(118, 100, 116, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(119, 100, 116, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(120, 100, 116, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(121, 100, 116, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(122, 100, 116, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(123, 100, 116, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(124, 100, 115, 'تأجير', 'For Rent', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(125, 100, 124, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(126, 100, 124, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(127, 100, 124, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(128, 100, 124, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(129, 100, 124, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(130, 100, 124, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(131, 100, 124, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(132, 100, 115, 'مطلوب شراء', 'Wanted to Buy', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(133, 100, 132, 'شقق', 'Apartments', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(134, 100, 132, 'فلل', 'Villas', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(135, 100, 132, 'مكاتب', 'Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(136, 100, 132, 'محلات', 'Shops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(137, 100, 132, 'اراضي', 'Lands', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(138, 100, 132, 'مزارع', 'Farms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(139, 100, 132, 'عمارة', 'Buildings', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(140, 100, 115, 'مدن حديثة', 'New Cities', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(141, 100, 115, 'مشاركة عقار', 'Property Share', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(142, 100, NULL, 'إلكترونيات والأجهزة الكهربائية', 'Electronics & Appliances', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(143, 100, 142, 'اجهزة منزلية', 'Home Appliances', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(144, 100, 143, 'غسالات ملابس', 'Washing Machines', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(145, 100, 143, 'غسالات أطباق', 'Dishwashers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(146, 100, 143, 'شاشات تلفزيون', 'TVs', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(147, 100, 143, 'ثلاجات', 'Refrigerators', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(148, 100, 143, 'ديب فريزر', 'Deep Freezer', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(149, 100, 143, 'ميكرويف', 'Microwave', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(150, 100, 143, 'شفاطات', 'Hoods', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(151, 100, 143, 'تكييف', 'AC', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(152, 100, 143, 'مراوح', 'Fans', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(153, 100, 142, 'اجهزة مكتبيه', 'Office Equipment', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(154, 100, 142, 'هواتف', 'Phones', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(155, 100, 154, 'اكسسوارات', 'Accessories', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(156, 100, 154, 'مطلوب', 'Wanted', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(157, 100, 154, 'بيع', 'Sale', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(158, 100, 154, 'استبدال', 'Exchange', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(159, 100, 142, 'كمبيوترات', 'Desktops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(160, 100, 142, 'لابتوبات', 'Laptops', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(161, 100, 142, 'اجهزة ذكية', 'Smart Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(162, 100, 142, 'اجهزة مستعملة', 'Used Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(163, 100, 142, 'العاب فيديو', 'Video Games', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(164, 100, 142, 'اجهزة أخرى', 'Other Devices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(165, 100, NULL, 'مقاولات وصيانة', 'Contracting & Maintenance', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 4, 1, 0),
(166, 100, 165, 'مقاولات تشطيبات كاملة', 'Full Finishing Contracting', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(167, 100, 165, 'صحي', 'Plumbing', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(168, 100, 165, 'كهرباء', 'Electricity', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(169, 100, 165, 'المنيوم', 'Aluminium', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(170, 100, 165, 'حداد', 'Steel Works', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(171, 100, 165, 'ديكور', 'Decoration', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(172, 100, 165, 'دهانات', 'Painting', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 7, 1, 0),
(173, 100, 165, 'نجار', 'Carpentry', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 8, 1, 0),
(174, 100, 165, 'تكييف', 'AC Works', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 9, 1, 0),
(175, 100, 165, 'أشجار زراعية', 'Landscaping', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 10, 1, 0),
(176, 100, 165, 'صيانة اجهزة منزلية', 'Home Appliances Repair', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 11, 1, 0),
(177, 100, NULL, 'حيوانات', 'Pets & Animals', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 5, 1, 0),
(178, 100, 177, 'قطط', 'Cats', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(179, 100, 177, 'كلاب', 'Dogs', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(180, 100, 177, 'طيور', 'Birds', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(181, 100, 177, 'معدات حيوانات', 'Pet Equipment', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(182, 100, 177, 'اكل الحيوانات', 'Pet Food', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(183, 100, 177, 'حيوانات أخرى', 'Other Animals', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(184, 100, NULL, 'وظائف', 'Jobs', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 6, 1, 0),
(185, 100, 184, 'مطلوب وظائف', 'Job Wanted', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(186, 100, 184, 'وظائف شاغرة', 'Job Vacancies', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(187, 100, NULL, 'الخدمات اللوجستية', 'Logistics & Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 7, 1, 0),
(188, 100, 187, 'خدمات سياحية', 'Tourism Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(189, 100, 188, 'شركات سياحية', 'Travel Agencies', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(190, 100, 188, 'فنادق سياحية', 'Hotels', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(191, 100, 188, 'مكاتب طيران', 'Airline Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(192, 100, 187, 'خدمات قانونية', 'Legal Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(193, 100, 192, 'مكاتب محاماة', 'Law Firms', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(194, 100, 187, 'خدمات مالية', 'Financial Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(195, 100, 194, 'محاسبون قانوني', 'Certified Accountants', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(196, 100, 194, 'محاسب مالي', 'Financial Accountant', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(197, 100, 187, 'خدمات إدارية', 'Administrative Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 4, 1, 0),
(198, 100, 197, 'مكاتب استشارية', 'Consulting Offices', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(199, 100, 197, 'تخليص جمركي', 'Customs Clearance', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(200, 100, NULL, 'أثاث', 'Furniture', 'uploads/categories/1766767291686.png', 0, NULL, '2025-12-26 19:20:50', 8, 1, 150),
(201, 100, 200, 'أثاث منزلي جديد', 'New Home Furniture', 'uploads/categories/1766767291686.png', 1, NULL, '2025-12-26 18:53:48', 1, 0, 0),
(202, 100, 201, 'نوم', 'Bedroom', 'uploads/categories/1766767291686.png', 1, NULL, '2025-12-26 19:07:35', 1, 0, 0),
(203, 100, 201, 'سفرة', 'Dining', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(204, 100, 201, 'صالون', 'Salon', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(205, 100, 201, 'أنتريه', 'Living Set', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(206, 100, 201, 'أطفال', 'Kids', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(207, 100, 201, 'ركن', 'Corner', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(208, 100, 200, 'تجهيزات حدائق', 'Garden Furniture', 'uploads/categories/1766767291686.png', 1, NULL, '2025-12-26 18:42:36', 2, 1, 10),
(209, 100, 200, 'مطبخ', 'Kitchen', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(210, 100, 200, 'أثاث مكتبي', 'Office Furniture', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(211, 100, 200, 'مفروشات', 'Textiles', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(212, 100, 200, 'أثاث مستعمل', 'Used Furniture', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 6, 1, 0),
(213, 100, 212, 'نوم', 'Bedroom', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(214, 100, 212, 'سفرة', 'Dining', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(215, 100, 212, 'صالون', 'Salon', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(216, 100, 212, 'أنتريه', 'Living Set', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(217, 100, 212, 'أطفال', 'Kids', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(218, 100, 212, 'ركن', 'Corner', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(219, 100, NULL, 'أزياء', 'Fashion', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 9, 1, 0),
(220, 100, 219, 'عالم الطفل', 'Kids World', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 1, 1, 0),
(221, 100, 220, 'العاب', 'Toys', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(222, 100, 220, 'ملابس', 'Clothes', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(223, 100, 220, 'مستلزمات أطفال', 'Baby Supplies', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(224, 100, 219, 'عالم المرأة', 'Women World', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(225, 100, 224, 'ملابس', 'Clothes', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(226, 100, 224, 'شنط واحذية', 'Bags & Shoes', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(227, 100, 224, 'اكسسوارات', 'Accessories', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(228, 100, 224, 'هدايا', 'Gifts', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(229, 100, 224, 'العناية بالمرأة', 'Women Care', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(230, 100, 224, 'مستحضرات تجميل', 'Cosmetics', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 6, 1, 0),
(231, 100, 219, 'فساتين زفاف', 'Wedding Dresses', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 3, 1, 0),
(232, 100, 231, 'جديد', 'New', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(233, 100, 231, 'مستعمل', 'Used', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(234, 100, 231, 'تأجير', 'Rental', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(235, 100, 219, 'عالم الرجل', 'Men World', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 4, 1, 0),
(236, 100, 235, 'ملابس', 'Clothes', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(237, 100, 235, 'أحذية رجالية', 'Men Shoes', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(238, 100, 235, 'العناية بالرجال', 'Men Care', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(239, 100, 219, 'ملابس مستعمل', 'Used Clothes', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 5, 1, 0),
(240, 100, 239, 'أطفال', 'Kids', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(241, 100, 239, 'ولادي', 'Boys', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(242, 100, 239, 'رجال', 'Men', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(243, 100, 239, 'امرأة', 'Women', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(244, 100, NULL, 'خدمات تعليمية', 'Educational Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 10, 1, 0),
(245, 100, 244, 'مناهج تعليمية', 'Curricula', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(246, 100, 244, 'دورات تدريبية', 'Training Courses', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(247, 100, 244, 'خدمات جامعية', 'University Services', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(248, 100, 244, 'خدمات تعليمية أخرى', 'Other Educational Services', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 4, 1, 0),
(249, 100, 248, 'كتب', 'Books', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(250, 100, 248, 'أساتذة ومدرسين', 'Teachers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(251, 100, 248, 'مناهج', 'Curricula', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(252, 100, 248, 'مراكز تعليم', 'Learning Centers', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 4, 1, 0),
(253, 100, 248, 'جامعات وكليات', 'Universities', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 5, 1, 0),
(254, 100, NULL, 'شركات', 'Companies', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 11, 1, 0),
(255, 100, 254, 'رخص تجارية', 'Commercial Licenses', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(256, 100, 254, 'تخليص معاملات', 'Process Clearance', 'uploads/categories/1766767291686.png', 0, NULL, NULL, 2, 1, 0),
(257, 100, 256, 'البنكية', 'Banking', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 1, 1, 0),
(258, 100, 256, 'التجارية', 'Commercial', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 2, 1, 0),
(259, 100, 256, 'الضريبية', 'Tax', 'uploads/categories/1766767291686.png', 1, NULL, NULL, 3, 1, 0),
(260, 100, 5, '01', '01', 'uploads/categories/1766767291686.png', 0, '2025-12-26 15:35:47', '2025-12-26 15:35:47', 0, 1, 10),
(261, 100, 21, '001', '001', 'uploads/categories/1766767291686.png', 1, '2025-12-26 15:37:23', '2025-12-26 15:37:23', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_attributes`
--

CREATE TABLE `categories_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `mandatory` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `enable` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `categories_attributes`
--

INSERT INTO `categories_attributes` (`id`, `category_id`, `attribute_id`, `mandatory`, `created_at`, `updated_at`, `enable`) VALUES
(14, 105, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(15, 105, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(16, 105, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(17, 105, 12, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(18, 105, 13, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(19, 106, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(20, 106, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(21, 106, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(22, 107, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(23, 107, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(24, 107, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(25, 108, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(26, 108, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(27, 108, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(28, 108, 12, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(29, 110, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(30, 110, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(31, 111, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(32, 111, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(33, 111, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(34, 112, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(35, 112, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(36, 112, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(37, 113, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(38, 113, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(39, 113, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(40, 115, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(41, 115, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(42, 115, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(43, 116, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(44, 116, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(45, 116, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(46, 117, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(47, 117, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(48, 117, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(49, 118, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(50, 118, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(51, 118, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(52, 120, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(53, 120, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(54, 120, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(55, 121, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(56, 121, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(57, 121, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(58, 122, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(59, 122, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(60, 122, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(61, 123, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(62, 123, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(63, 123, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(64, 125, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(65, 125, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(66, 125, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(67, 126, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(68, 126, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(69, 126, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(70, 127, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(71, 127, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(72, 127, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(73, 128, 9, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(74, 128, 10, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1),
(75, 128, 11, 0, '2025-05-13 03:00:25', '2025-05-13 03:00:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_seller`
--

CREATE TABLE `category_seller` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_seller`
--

INSERT INTO `category_seller` (`id`, `seller_id`, `category_id`, `created_at`, `updated_at`) VALUES
(41, 6, 261, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_type` enum('text','file','audio') NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `message_type`, `created_at`, `updated_at`) VALUES
(1, 68, 69, '5541254', 'text', '2025-04-12 15:05:05', '2025-04-12 15:05:05'),
(2, 68, 69, '5541254', 'text', '2025-04-12 15:05:16', '2025-04-12 15:05:16'),
(3, 68, 69, '5541254', 'text', '2025-04-12 15:05:18', '2025-04-12 15:05:18'),
(4, 68, 69, '5541254', 'text', '2025-04-12 15:05:20', '2025-04-12 15:05:20'),
(7, 69, 31, 'uploads/chats/1744480123638.jpg', 'file', '2025-04-12 15:48:43', '2025-04-12 15:48:43'),
(8, 69, 31, 'uploads/chats/1744481291664.jpg', 'file', '2025-04-12 16:08:11', '2025-04-12 16:08:11'),
(9, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:08:36', '2025-04-12 16:08:36'),
(10, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:08:48', '2025-04-12 16:08:48'),
(11, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:08:58', '2025-04-12 16:08:58'),
(12, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:10:05', '2025-04-12 16:10:05'),
(13, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:12:20', '2025-04-12 16:12:20'),
(14, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:13:07', '2025-04-12 16:13:07'),
(15, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:18:21', '2025-04-12 16:18:21'),
(16, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:18:40', '2025-04-12 16:18:40'),
(17, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:19:05', '2025-04-12 16:19:05'),
(18, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:19:51', '2025-04-12 16:19:51'),
(19, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:19:57', '2025-04-12 16:19:57'),
(20, 69, 31, 'tfgyhujik', 'text', '2025-04-12 16:24:43', '2025-04-12 16:24:43'),
(24, 75, 74, 'testmessage', 'text', '2025-07-01 08:16:45', '2025-07-01 08:16:45'),
(34, 75, 74, 'testmessage', 'text', '2025-07-17 21:01:11', '2025-07-17 21:01:11'),
(35, 75, 74, 'uploads/chats/1752793293734.jpg', 'file', '2025-07-17 21:01:33', '2025-07-17 21:01:33'),
(36, 75, 76, 'uploads/chats/1752794056567.jpg', 'file', '2025-07-17 21:14:16', '2025-07-17 21:14:16'),
(37, 75, 76, 'uploads/chats/1752794099180.jpg', 'file', '2025-07-17 21:14:59', '2025-07-17 21:14:59'),
(38, 75, 76, 'uploads/chats/1752794543136.jpg', 'file', '2025-07-17 21:22:23', '2025-07-17 21:22:23'),
(41, 94, 7, 'السلام عليكم ورحمة الله وبركاته', 'text', '2025-10-24 23:22:35', '2025-10-24 23:22:35'),
(42, 94, 7, 'بسأل عن تفاصيل أكثر عن السيارة', 'text', '2025-10-24 23:23:05', '2025-10-24 23:23:05'),
(43, 97, 97, 'السلام عليكم', 'text', '2025-11-05 17:42:08', '2025-11-05 17:42:08'),
(44, 97, 97, 'وعليكم السلام', 'text', '2025-11-05 19:36:26', '2025-11-05 19:36:26'),
(45, 97, 97, 'اخبارك', 'text', '2025-11-10 22:26:10', '2025-11-10 22:26:10'),
(46, 97, 97, 'uploads/chats/1762817202626.jpg', 'file', '2025-11-10 22:26:42', '2025-11-10 22:26:42'),
(47, 97, 97, 'uploads/chats/1762817309266.jpg', 'file', '2025-11-10 22:28:29', '2025-11-10 22:28:29'),
(48, 97, 97, 'uploads/chats/1763682980497.jpg', 'file', '2025-11-20 22:56:20', '2025-11-20 22:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `parent_id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(203, NULL, 'القاهرة', 'Cairo', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(204, NULL, 'الجيزة', 'Giza', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(205, NULL, 'الإسكندرية', 'Alexandria', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(206, NULL, 'الدقهلية', 'Dakahlia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(207, NULL, 'البحر الأحمر', 'Red Sea', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(208, NULL, 'البحيرة', 'Beheira', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(209, NULL, 'الفيوم', 'Faiyum', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(210, NULL, 'الغربية', 'Gharbia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(211, NULL, 'الإسماعيلية', 'Ismailia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(212, NULL, 'المنوفية', 'Monufia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(213, NULL, 'المنيا', 'Minya', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(214, NULL, 'القليوبية', 'Qalyubia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(215, NULL, 'الوادي الجديد', 'New Valley', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(216, NULL, 'السويس', 'Suez', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(217, NULL, 'أسوان', 'Aswan', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(218, NULL, 'أسيوط', 'Asyut', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(219, NULL, 'بني سويف', 'Beni Suef', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(220, NULL, 'بورسعيد', 'Port Said', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(221, NULL, 'دمياط', 'Damietta', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(222, NULL, 'الشرقية', 'Sharqia', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(223, NULL, 'جنوب سيناء', 'South Sinai', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(224, NULL, 'كفر الشيخ', 'Kafr El-Sheikh', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(225, NULL, 'مطروح', 'Matrouh', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(226, NULL, 'الأقصر', 'Luxor', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(227, NULL, 'قنا', 'Qena', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(228, NULL, 'شمال سيناء', 'North Sinai', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(229, NULL, 'سوهاج', 'Sohag', '2025-09-30 13:52:01', '2025-09-30 13:52:01'),
(230, 203, 'مدينة نصر', 'Nasr City', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(231, 203, 'مصر الجديدة', 'Heliopolis', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(232, 203, 'المعادي', 'Maadi', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(233, 203, 'العباسية', 'Abbaseya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(234, 203, 'حلوان', 'Helwan', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(235, 204, '٦ أكتوبر', '6th of October City', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(236, 204, 'الشيخ زايد', 'Sheikh Zayed', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(237, 204, 'البدرشين', 'Badrashein', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(238, 204, 'العياط', 'Al Ayyat', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(239, 205, 'برج العرب', 'Borg El Arab', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(240, 206, 'طلخا', 'Talkha', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(241, 206, 'ميت غمر', 'Mit Ghamr', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(242, 206, 'أجا', 'Aga', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(243, 206, 'السنبلاوين', 'Sinbillawin', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(244, 206, 'بلقاس', 'Belqas', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(245, 206, 'المنزلة', 'Manzala', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(246, 207, 'رأس غارب', 'Ras Gharib', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(247, 207, 'سفاجا', 'Safaga', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(248, 207, 'القصير', 'Quseir', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(249, 207, 'مرسى علم', 'Marsa Alam', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(250, 207, 'الشلاتين', 'Shalateen', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(251, 207, 'حلايب', 'Halaib', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(252, 208, 'كفر الدوار', 'Kafr El-Dawwar', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(253, 208, 'رشيد', 'Rashid', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(254, 208, 'إدكو', 'Edku', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(255, 208, 'إيتاي البارود', 'Itay El-Baroud', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(256, 208, 'أبو حمص', 'Abu Hummus', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(257, 208, 'حوش عيسى', 'Housh Eissa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(258, 208, 'وادي النطرون', 'Wadi El-Natrun', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(259, 209, 'سنورس', 'Sinnuris', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(260, 209, 'إطسا', 'Itsa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(261, 209, 'إبشواي', 'Ibsheway', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(262, 209, 'طامية', 'Tamiya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(263, 209, 'يوسف الصديق', 'Yusuf El-Seddik', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(264, 210, 'المحلة الكبرى', 'Mahalla El-Kubra', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(265, 210, 'كفر الزيات', 'Kafr El-Zayat', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(266, 210, 'زفتى', 'Zefta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(267, 210, 'سمنود', 'Samanoud', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(268, 210, 'قطور', 'Qutur', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(269, 210, 'بسيون', 'Basyoun', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(270, 210, 'السنطة', 'Santa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(271, 211, 'فايد', 'Fayed', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(272, 211, 'القنطرة شرق', 'Qantara Sharq', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(273, 211, 'القنطرة غرب', 'Qantara Gharb', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(274, 211, 'أبو صوير', 'Abu Suwir', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(275, 211, 'التل الكبير', 'Tal El-Kebir', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(276, 212, 'منوف', 'Menouf', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(277, 212, 'السادات', 'Sadat City', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(278, 212, 'قويسنا', 'Quesna', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(279, 212, 'أشمون', 'Ashmoun', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(280, 212, 'بركة السبع', 'Berket El-Saba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(281, 212, 'تلا', 'Tala', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(282, 212, 'الباجور', 'Bagour', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(283, 212, 'سرس الليان', 'Sers El-Lyan', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(284, 213, 'المنيا الجديدة', 'New Minya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(285, 213, 'مغاغة', 'Maghagha', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(286, 213, 'بني مزار', 'Beni Mazar', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(287, 213, 'مطاي', 'Matay', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(288, 213, 'سمالوط', 'Samalut', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(289, 213, 'أبو قرقاص', 'Abu Qurqas', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(290, 213, 'ملوي', 'Mallawi', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(291, 213, 'دير مواس', 'Deir Mawas', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(292, 214, 'شبرا الخيمة', 'Shubra El-Kheima', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(293, 214, 'العبور', 'Obour', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(294, 214, 'الخصوص', 'Khosous', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(295, 214, 'قليوب', 'Qalyub', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(296, 214, 'شبين القناطر', 'Shibin Al-Qanatir', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(297, 214, 'القناطر الخيرية', 'Qanater El-Khairia', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(298, 214, 'طوخ', 'Toukh', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(299, 214, 'قها', 'Qaha', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(300, 214, 'كفر شكر', 'Kafr Shukr', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(301, 215, 'الداخلة', 'Dakhla', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(302, 215, 'الفرافرة', 'Farafra', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(303, 215, 'بلاط', 'Balat', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(304, 215, 'باريس', 'Paris', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(305, 216, 'الجناين', 'Ganayen', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(306, 216, 'الأربعين', 'Arbaeen', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(307, 216, 'عتاقة', 'Ataqah', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(308, 217, 'إدفو', 'Edfu', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(309, 217, 'كوم أمبو', 'Kom Ombo', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(310, 217, 'دراو', 'Daraw', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(311, 217, 'أبو سمبل', 'Abu Simbel', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(312, 217, 'نصر النوبة', 'Nasr El-Nuba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(313, 218, 'ديروط', 'Dairut', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(314, 218, 'منفلوط', 'Manfalut', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(315, 218, 'القوصية', 'Qusiya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(316, 218, 'أبو تيج', 'Abu Tij', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(317, 218, 'صدفا', 'Sodfa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(318, 218, 'ساحل سليم', 'Sahel Selim', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(319, 218, 'الفتح', 'Fateh', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(320, 218, 'البداري', 'Al Badari', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(321, 218, 'أسيوط الجديدة', 'New Assiut', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(322, 219, 'الواسطى', 'Al Wasta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(323, 219, 'ناصر', 'Nasser', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(324, 219, 'إهناسيا', 'Ihnasiya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(325, 219, 'ببا', 'Beba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(326, 219, 'الفشن', 'Fashn', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(327, 219, 'سمسطا', 'Somasta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(328, 220, 'بورفؤاد', 'Port Fuad', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(329, 221, 'دمياط الجديدة', 'New Damietta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(330, 221, 'فارسكور', 'Faraskur', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(331, 221, 'الزرقا', 'Zarqa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(332, 221, 'كفر سعد', 'Kafr Saad', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(333, 221, 'رأس البر', 'Ras El Bar', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(334, 221, 'عزبة البرج', 'Ezbet El-Borg', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(335, 222, 'العاشر من رمضان', '10th of Ramadan City', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(336, 222, 'بلبيس', 'Belbeis', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(337, 222, 'أبو حماد', 'Abu Hammad', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(338, 222, 'فاقوس', 'Faqous', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(339, 222, 'الحسينية', 'Husseiniya', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(340, 222, 'منيا القمح', 'Minya Al-Qamh', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(341, 222, 'ههيا', 'Hehia', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(342, 222, 'ديرب نجم', 'Diyarb Negm', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(343, 222, 'مشتول السوق', 'Mashtoul El-Souq', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(344, 222, 'أولاد صقر', 'Awlad Saqr', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(345, 222, 'صان الحجر', 'San El-Hagar', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(346, 222, 'القنايات', 'Al Qanayat', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(347, 222, 'القرين', 'El Qareen', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(348, 223, 'دهب', 'Dahab', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(349, 223, 'نويبع', 'Nuweiba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(350, 223, 'طابا', 'Taba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(351, 223, 'أبو زنيمة', 'Abu Zenima', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(352, 223, 'أبو رديس', 'Abu Rudeis', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(353, 223, 'سانت كاترين', 'Saint Catherine', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(354, 224, 'دسوق', 'Desouk', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(355, 224, 'فوه', 'Fuwwah', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(356, 224, 'بلطيم', 'Baltim', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(357, 224, 'قلين', 'Qallin', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(358, 224, 'سيدي سالم', 'Sidi Salem', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(359, 224, 'مطوبس', 'Metoubes', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(360, 224, 'الحامول', 'Hamoul', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(361, 225, 'الحمام', 'El Hamam', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(362, 225, 'الضبعة', 'Dabaa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(363, 225, 'النجيلة', 'El Negaila', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(364, 225, 'سيدي براني', 'Sidi Barrani', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(365, 225, 'السلوم', 'Sallum', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(366, 225, 'العلمين', 'El Alamein', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(367, 225, 'سيوة', 'Siwa', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(368, 226, 'إسنا', 'Esna', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(369, 226, 'أرمنت', 'Armant', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(370, 226, 'طيبة الجديدة', 'New Tiba', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(371, 227, 'نجع حمادي', 'Nag Hammadi', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(372, 227, 'قفط', 'Qift', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(373, 227, 'قوص', 'Qus', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(374, 227, 'دشنا', 'Deshna', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(375, 227, 'فرشوط', 'Farshut', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(376, 227, 'أبو تشت', 'Abu Tesht', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(377, 227, 'نقادة', 'Naqada', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(378, 228, 'بئر العبد', 'Bir al-Abd', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(379, 228, 'رفح', 'Rafah', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(380, 228, 'الشيخ زويد', 'Sheikh Zuweid', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(381, 228, 'نخل', 'Nakhl', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(382, 228, 'الحسنة', 'Hasana', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(383, 229, 'أخميم', 'Akhmim', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(384, 229, 'طهطا', 'Tahta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(385, 229, 'جرجا', 'Girga', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(386, 229, 'المراغة', 'El Maragha', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(387, 229, 'البلينا', 'Balyana', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(388, 229, 'دار السلام', 'Dar El-Salam', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(389, 229, 'ساقلتة', 'Saqalta', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(390, 229, 'جهينة', 'Juhayna', '2025-09-30 13:59:58', '2025-09-30 13:59:58'),
(391, 203, 'القاهرة الجديدة', 'New Cairo', '2025-11-05 22:44:37', '2025-11-05 22:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `city_driver`
--

CREATE TABLE `city_driver` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `city_driver`
--

INSERT INTO `city_driver` (`id`, `city_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(5, 6, 1, '2022-09-09 22:58:37', '2022-09-09 22:58:37'),
(6, 6, 3, '2022-09-09 22:58:44', '2022-09-09 22:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `city_seller`
--

CREATE TABLE `city_seller` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `city_seller`
--

INSERT INTO `city_seller` (`id`, `city_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(10, 6, 5, '2022-09-09 22:58:24', '2022-09-09 22:58:24'),
(11, 6, 8, '2024-07-03 20:27:43', '2024-07-03 20:27:43'),
(12, 14, 8, '2024-07-03 20:27:43', '2024-07-03 20:27:43'),
(14, 6, 6, '2024-12-02 16:30:26', '2024-12-02 16:30:26'),
(15, 6, 3, '2024-12-10 16:33:07', '2024-12-10 16:33:07'),
(16, 14, 3, '2024-12-10 16:33:07', '2024-12-10 16:33:07'),
(18, 14, 5, '2024-12-10 16:43:38', '2024-12-10 16:43:38'),
(21, 14, 4, '2025-01-15 15:20:01', '2025-01-15 15:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_codes`
--

CREATE TABLE `confirmation_codes` (
  `id` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmation_codes`
--

INSERT INTO `confirmation_codes` (`id`, `phone`, `code`, `active`, `created_at`, `updated_at`) VALUES
(1, '123456777', '8863', 1, '2024-05-22 16:57:34', '2024-05-22 20:07:32'),
(2, '123456777', '7762', 1, '2024-05-22 17:10:52', '2024-05-22 17:10:52'),
(3, '123456777', '6779', 0, '2024-05-22 17:10:59', '2024-05-22 17:14:46'),
(4, '11111', '3422', 1, '2024-05-29 14:13:31', '2024-05-29 14:13:31'),
(5, '11111', '7675', 1, '2024-05-29 14:15:28', '2024-05-29 14:15:28'),
(6, '11111', '4379', 1, '2024-05-29 14:15:59', '2024-05-29 14:15:59'),
(7, '11111', '7517', 1, '2024-05-29 14:16:28', '2024-05-29 14:16:28'),
(8, '11111', '1998', 1, '2024-05-29 14:16:48', '2024-05-29 14:16:48'),
(9, '11111', '7713', 1, '2024-05-29 14:17:39', '2024-05-29 14:17:39'),
(10, '11111', '9571', 1, '2024-05-29 14:18:46', '2024-05-29 14:18:46'),
(11, '1234567777', '6706', 0, '2024-06-02 12:27:06', '2024-06-02 12:27:16'),
(12, '0111', '2904', 1, '2024-06-02 12:44:44', '2024-06-02 12:44:44'),
(13, '0111', '2326', 1, '2024-06-02 12:48:33', '2024-06-02 12:48:33'),
(14, '0111', '4421', 0, '2024-06-02 12:49:16', '2024-06-02 12:50:34'),
(15, '01115', '1697', 1, '2024-06-03 16:13:39', '2024-06-03 16:13:39'),
(16, '011153', '5565', 1, '2024-06-03 16:13:45', '2024-06-03 16:13:45'),
(17, '0111535', '2210', 1, '2024-06-03 16:13:50', '2024-06-03 16:13:50'),
(18, '01115', '8738', 1, '2024-06-03 16:13:58', '2024-06-03 16:13:58'),
(19, '01115', '9357', 1, '2024-06-03 16:14:28', '2024-06-03 16:14:28'),
(20, '1234567776', '1230', 0, '2024-06-08 17:48:40', '2024-06-08 17:48:54'),
(21, '011', '9250', 0, '2024-07-01 16:48:01', '2024-07-01 16:48:36'),
(22, '01111', '9658', 1, '2024-07-01 16:51:08', '2024-07-01 16:51:08'),
(23, '01', '9015', 1, '2024-07-01 16:58:04', '2024-07-01 16:58:04'),
(24, '01', '7804', 1, '2024-07-01 17:00:11', '2024-07-01 17:00:11'),
(25, '01', '4346', 1, '2024-07-01 17:01:31', '2024-07-01 17:01:31'),
(26, '01032039889', '7645', 0, '2024-07-01 19:34:44', '2024-07-01 19:35:42'),
(27, '01099622928', '3971', 1, '2024-07-03 08:07:22', '2024-07-03 08:07:22'),
(28, '666', '7980', 1, '2024-07-03 17:06:02', '2024-07-03 17:06:02'),
(29, '666', '5243', 1, '2024-07-03 17:07:41', '2024-07-03 17:07:41'),
(30, '666', '8602', 1, '2024-07-03 17:12:54', '2024-07-03 17:12:54'),
(31, '1', '9605', 1, '2024-07-03 17:14:28', '2024-07-03 17:14:28'),
(32, '+965123', '9005', 0, '2024-07-03 17:29:38', '2024-07-03 17:29:45'),
(33, '123456777677', '4112', 1, '2024-07-03 17:55:10', '2024-07-03 17:55:10'),
(34, '123456777677', '6985', 1, '2024-07-03 17:57:36', '2024-07-03 17:57:36'),
(35, '123456777677', '8879', 1, '2024-07-03 18:00:08', '2024-07-03 18:00:08'),
(36, '+965123', '8687', 0, '2024-07-08 21:39:48', '2024-07-08 21:40:26'),
(37, '+96597266997', '1703', 1, '2024-07-09 10:01:46', '2024-07-09 10:01:46'),
(38, '+96597266997', '9822', 1, '2024-07-09 23:08:41', '2024-07-09 23:08:41'),
(39, '+965h', '8008', 1, '2024-07-10 07:37:01', '2024-07-10 07:37:01'),
(40, '01142611070', '8589', 1, '2024-07-13 11:02:05', '2024-07-13 11:02:05'),
(41, '+96597266997', '9995', 1, '2024-07-13 11:03:03', '2024-07-13 11:03:03'),
(42, '+965123', '5202', 0, '2024-08-28 18:25:28', '2024-08-28 18:25:39'),
(43, '+96597266997', '3859', 1, '2024-09-11 06:41:45', '2024-09-11 06:41:45'),
(44, '+965123', '6490', 0, '2024-09-11 16:53:33', '2024-09-11 16:53:46'),
(45, '+965asdasd', '6190', 1, '2024-09-17 18:39:12', '2024-09-17 18:39:12'),
(46, '+96566673339', '1889', 1, '2024-10-15 18:15:02', '2024-10-15 18:15:02'),
(47, '+96512345', '2464', 1, '2024-10-16 19:16:17', '2024-10-16 19:16:17'),
(48, '+96512345', '4139', 1, '2024-10-16 19:17:06', '2024-10-16 19:17:06'),
(49, '201142611070', '2132', 1, '2024-11-25 16:19:05', '2024-11-25 16:19:05'),
(50, '+201142611070', '9725', 1, '2024-11-25 16:19:21', '2024-11-25 16:19:21'),
(51, '+96597266997', '1815', 1, '2024-11-25 16:24:23', '2024-11-25 16:24:23'),
(52, '+96597266997', '4555', 1, '2024-11-25 16:31:43', '2024-11-25 16:31:43'),
(53, '+96597266997', '2016', 1, '2024-11-25 16:34:05', '2024-11-25 16:34:05'),
(54, '+96597266997', '6472', 1, '2024-11-25 16:34:30', '2024-11-25 16:34:30'),
(55, '+96597266997', '9178', 1, '2024-11-25 16:36:36', '2024-11-25 16:36:36'),
(56, '123456777', '4527', 1, '2024-11-25 16:59:23', '2024-11-25 16:59:23'),
(57, '123456777', '6872', 0, '2024-11-25 17:03:15', '2024-11-25 17:04:02'),
(58, '+965123', '7286', 1, '2024-11-25 17:14:14', '2024-11-25 17:14:14'),
(59, '+965123', '6338', 1, '2024-11-25 17:42:03', '2024-11-25 17:42:03'),
(60, '+96566673339', '1608', 1, '2024-12-11 04:52:13', '2024-12-11 04:52:13'),
(61, '+96566673339', '2388', 1, '2024-12-11 04:53:14', '2024-12-11 04:53:14'),
(62, '+96597266997', '6672', 1, '2024-12-11 06:16:07', '2024-12-11 06:16:07'),
(63, '+96597266997', '4995', 1, '2024-12-11 06:17:15', '2024-12-11 06:17:15'),
(64, '+96597266997', '9691', 1, '2024-12-11 06:19:08', '2024-12-11 06:19:08'),
(65, '+96597266997', '5158', 1, '2024-12-11 06:20:28', '2024-12-11 06:20:28'),
(66, '+96597266997', '6932', 1, '2024-12-11 07:43:14', '2024-12-11 07:43:14'),
(67, '+96597266997', '1426', 1, '2024-12-11 08:01:10', '2024-12-11 08:01:10'),
(68, '+96597266997', '8754', 1, '2024-12-11 08:02:19', '2024-12-11 08:02:19'),
(69, '+96566673339', '3427', 0, '2024-12-11 09:28:45', '2024-12-11 09:28:56'),
(70, '+965123456', '4906', 0, '2024-12-12 23:30:17', '2024-12-12 23:30:26'),
(71, '+96597266997', '4034', 0, '2024-12-13 04:52:57', '2024-12-13 04:53:06'),
(72, '+96550158572', '2523', 1, '2024-12-18 12:57:52', '2024-12-18 12:57:52'),
(73, '+96550158572', '4143', 1, '2024-12-18 13:00:09', '2024-12-18 13:00:09'),
(74, '+9651234567776', '2168', 0, '2024-12-18 14:42:34', '2024-12-18 14:42:42'),
(75, '+96597266997', '5490', 1, '2024-12-19 06:44:17', '2024-12-19 06:44:17'),
(76, '+9651234567776', '1619', 1, '2024-12-19 07:08:17', '2024-12-19 07:08:17'),
(77, '1234567776', '4593', 1, '2024-12-19 13:25:49', '2024-12-19 13:25:49'),
(78, '1234567776', '5892', 1, '2024-12-19 13:25:50', '2024-12-19 13:25:50'),
(79, '1234567776', '4667', 1, '2024-12-19 13:30:29', '2024-12-19 13:30:29'),
(80, '1234567776', '1158', 1, '2024-12-19 13:35:25', '2024-12-19 13:35:25'),
(81, '+9651234567776', '9715', 0, '2024-12-19 13:37:34', '2024-12-19 13:38:15'),
(82, '66673339', '4203', 1, '2025-01-12 10:13:24', '2025-01-12 10:13:24'),
(83, '+96566673339', '9567', 1, '2025-01-12 10:13:39', '2025-01-12 10:13:39'),
(84, '+96566673339', '6442', 1, '2025-01-12 10:13:40', '2025-01-12 10:13:40'),
(85, '66673339', '5130', 1, '2025-01-12 10:15:00', '2025-01-12 10:15:00'),
(86, '+96566673339', '1970', 1, '2025-01-12 10:15:15', '2025-01-12 10:15:15'),
(87, '66673339', '2437', 1, '2025-01-12 11:21:32', '2025-01-12 11:21:32'),
(88, '66673339', '8152', 1, '2025-01-12 11:21:33', '2025-01-12 11:21:33'),
(89, '+96566673339', '5809', 0, '2025-01-12 11:22:10', '2025-01-12 11:22:38'),
(90, '66673339', '4714', 1, '2025-01-12 11:50:52', '2025-01-12 11:50:52'),
(91, '66673339', '5215', 1, '2025-01-12 11:51:15', '2025-01-12 11:51:15'),
(92, '+96566673339', '1801', 0, '2025-01-12 11:51:26', '2025-01-12 11:52:01'),
(93, '+965123', '8822', 1, '2025-01-12 20:27:04', '2025-01-12 20:27:04'),
(94, '+965123', '4414', 1, '2025-01-12 20:27:04', '2025-01-12 20:27:04'),
(95, '+965123456', '4500', 1, '2025-01-12 20:27:06', '2025-01-12 20:27:06'),
(96, '+965123456', '3352', 1, '2025-01-12 20:27:16', '2025-01-12 20:27:16'),
(97, '+9651234567776', '6569', 1, '2025-01-12 20:36:49', '2025-01-12 20:36:49'),
(98, '+9651234567776', '9337', 1, '2025-01-12 20:38:06', '2025-01-12 20:38:06'),
(99, '+9651234567776', '8392', 1, '2025-01-12 20:41:20', '2025-01-12 20:41:20'),
(100, '+9651234567776', '9030', 0, '2025-01-12 20:42:47', '2025-01-12 20:44:21'),
(101, '+201142611070', '5845', 1, '2025-01-12 22:06:35', '2025-01-12 22:06:35'),
(102, '123456777', '8599', 1, '2025-01-12 22:07:02', '2025-01-12 22:07:02'),
(103, '+201142611070', '8268', 1, '2025-01-12 22:11:10', '2025-01-12 22:11:10'),
(104, '+201142611070', '6695', 1, '2025-01-12 22:13:00', '2025-01-12 22:13:00'),
(105, '+965 66673339', '1753', 1, '2025-01-12 22:13:07', '2025-01-12 22:13:07'),
(106, '+965 66673339', '2187', 1, '2025-01-12 22:14:08', '2025-01-12 22:14:08'),
(107, '9651234567776', '1680', 1, '2025-01-12 22:15:54', '2025-01-12 22:15:54'),
(108, '+9651234567776', '5721', 1, '2025-01-12 22:17:26', '2025-01-12 22:17:26'),
(109, '+9651234567776', '8756', 1, '2025-01-12 22:17:40', '2025-01-12 22:17:40'),
(110, '9651234567776', '2343', 1, '2025-01-12 22:18:03', '2025-01-12 22:18:03'),
(111, '97266997', '8757', 1, '2025-01-13 16:08:54', '2025-01-13 16:08:54'),
(112, '97266997', '9250', 1, '2025-01-13 16:08:54', '2025-01-13 16:08:54'),
(113, '97266997', '7935', 1, '2025-01-13 16:08:54', '2025-01-13 16:08:54'),
(114, '97266997', '9957', 1, '2025-01-13 16:08:56', '2025-01-13 16:08:56'),
(115, '97266997', '1621', 1, '2025-01-13 16:08:56', '2025-01-13 16:08:56'),
(116, '97266997', '6351', 1, '2025-01-13 16:08:56', '2025-01-13 16:08:56'),
(117, '97266997', '2541', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(118, '97266997', '3696', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(119, '97266997', '8724', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(120, '97266997', '5882', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(121, '97266997', '7197', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(122, '97266997', '6823', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(123, '97266997', '6999', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(124, '97266997', '3889', 1, '2025-01-13 16:08:57', '2025-01-13 16:08:57'),
(125, '97266997', '1509', 1, '2025-01-13 16:09:01', '2025-01-13 16:09:01'),
(126, '97266997', '3982', 1, '2025-01-13 16:09:01', '2025-01-13 16:09:01'),
(127, '66673339', '6382', 1, '2025-01-13 16:43:07', '2025-01-13 16:43:07'),
(128, '97266997', '9482', 1, '2025-01-13 16:47:05', '2025-01-13 16:47:05'),
(129, '97266997', '3666', 1, '2025-01-13 16:47:56', '2025-01-13 16:47:56'),
(130, '66673339', '4607', 1, '2025-01-13 16:48:52', '2025-01-13 16:48:52'),
(131, '+96566673339', '8296', 1, '2025-01-13 16:48:59', '2025-01-13 16:48:59'),
(132, '97266997', '4242', 1, '2025-01-13 16:50:24', '2025-01-13 16:50:24'),
(133, '+96597266997', '1815', 0, '2025-01-13 16:50:31', '2025-01-13 16:51:24'),
(134, '468513604', '8222', 1, '2025-01-21 19:03:38', '2025-01-21 19:03:38'),
(135, '97455878055', '7545', 1, '2025-03-18 18:58:34', '2025-03-18 18:58:34'),
(136, '97455878055', '9629', 1, '2025-03-18 19:04:26', '2025-03-18 19:04:26'),
(137, '97455878055', '3341', 1, '2025-03-18 19:09:09', '2025-03-18 19:09:09'),
(138, '97455878055', '4592', 1, '2025-03-18 19:10:20', '2025-03-18 19:10:20'),
(139, '97455878055', '2138', 1, '2025-03-18 19:19:24', '2025-03-18 19:19:24'),
(140, '97455878055', '6279', 1, '2025-03-18 19:19:50', '2025-03-18 19:19:50'),
(141, '0114264505400', '6801', 0, '2025-03-23 23:04:12', '2025-03-23 23:04:28'),
(142, '0114264505400', '8109', 0, '2025-03-23 23:05:20', '2025-03-23 23:07:55'),
(143, '011426450547', '6145', 1, '2025-04-06 12:13:56', '2025-04-06 12:13:56'),
(144, '01142644525054', '8256', 0, '2025-04-06 12:15:01', '2025-04-06 12:15:20'),
(145, '011426445250549', '4995', 0, '2025-04-12 15:04:20', '2025-04-12 15:04:30'),
(146, '201142645054', '2715', 1, '2025-05-04 16:20:06', '2025-05-04 16:20:06'),
(147, '201142645054', '6856', 1, '2025-05-04 16:20:14', '2025-05-04 16:20:14'),
(148, '201142645054', '3691', 1, '2025-05-04 16:22:35', '2025-05-04 16:22:35'),
(149, '201142645054', '7123', 1, '2025-05-04 16:24:48', '2025-05-04 16:24:48'),
(150, '201142645054', '2935', 1, '2025-05-04 16:27:07', '2025-05-04 16:27:07'),
(151, '201142645054', '2533', 1, '2025-05-04 16:27:29', '2025-05-04 16:27:29'),
(152, '201142645054', '3049', 1, '2025-05-04 16:28:30', '2025-05-04 16:28:30'),
(153, '01142645054', '2327', 0, '2025-05-04 16:30:44', '2025-05-04 16:30:59'),
(154, '123456777', '5505', 1, '2025-05-04 16:34:17', '2025-05-04 16:34:17'),
(155, '01142645054', '2029', 0, '2025-05-04 16:34:31', '2025-05-04 16:34:49'),
(156, '01142645054', '2681', 1, '2025-05-04 16:35:53', '2025-05-04 16:35:53'),
(157, '01142645054', '5923', 1, '2025-05-04 16:36:54', '2025-05-04 16:36:54'),
(158, '01142645054', '8163', 1, '2025-05-04 16:39:13', '2025-05-04 16:39:13'),
(159, '201142645054', '6132', 1, '2025-05-04 16:40:14', '2025-05-04 16:40:14'),
(160, '201142645054', '5982', 1, '2025-05-04 16:40:26', '2025-05-04 16:40:26'),
(161, '01142645054', '9126', 1, '2025-05-04 16:41:08', '2025-05-04 16:41:08'),
(162, '01142645054', '2560', 1, '2025-05-04 16:42:09', '2025-05-04 16:42:09'),
(163, '201142645054', '4461', 1, '2025-05-04 16:43:14', '2025-05-04 16:43:14'),
(164, '201142645054', '7297', 1, '2025-05-04 16:48:28', '2025-05-04 16:48:28'),
(165, '201142645054', '8570', 0, '2025-05-04 16:50:28', '2025-05-04 16:50:41'),
(166, '01142645054', '3582', 0, '2025-05-04 16:51:01', '2025-05-04 16:51:14'),
(167, '201142645054564', '5702', 0, '2025-05-12 01:26:07', '2025-05-12 01:26:41'),
(168, '201096762764', '4244', 0, '2025-06-07 11:21:50', '2025-06-07 11:25:13'),
(169, '21556069321', '4425', 1, '2025-06-07 12:35:56', '2025-06-07 12:35:56'),
(170, '223423423423', '7226', 1, '2025-06-08 09:26:11', '2025-06-08 09:26:11'),
(171, '12341234123', '5184', 1, '2025-06-08 09:31:25', '2025-06-08 09:31:25'),
(172, '123412341', '8924', 1, '2025-06-08 09:31:38', '2025-06-08 09:31:38'),
(173, '23452345234', '3547', 1, '2025-06-08 09:34:25', '2025-06-08 09:34:25'),
(174, '23452345234', '8127', 1, '2025-06-08 09:34:39', '2025-06-08 09:34:39'),
(175, '23423423423', '7169', 1, '2025-06-08 09:36:09', '2025-06-08 09:36:09'),
(176, '23423423423', '2603', 1, '2025-06-08 09:37:31', '2025-06-08 09:37:31'),
(177, '223423423423', '2406', 1, '2025-06-08 09:37:33', '2025-06-08 09:37:33'),
(178, '223423423423', '5676', 1, '2025-06-08 09:37:35', '2025-06-08 09:37:35'),
(179, '223423423423', '5478', 1, '2025-06-08 09:37:37', '2025-06-08 09:37:37'),
(180, '223423423423', '9975', 1, '2025-06-08 09:37:39', '2025-06-08 09:37:39'),
(181, '223423423423', '7979', 1, '2025-06-08 09:37:42', '2025-06-08 09:37:42'),
(182, '223423423423', '6915', 1, '2025-06-08 09:37:44', '2025-06-08 09:37:44'),
(183, '223423423423', '7565', 1, '2025-06-08 09:37:46', '2025-06-08 09:37:46'),
(184, '223423423423', '4154', 1, '2025-06-08 09:37:48', '2025-06-08 09:37:48'),
(185, '223423423423', '7743', 1, '2025-06-08 09:37:51', '2025-06-08 09:37:51'),
(186, '223423423423', '4926', 1, '2025-06-08 09:37:53', '2025-06-08 09:37:53'),
(187, '223423423423', '6675', 1, '2025-06-08 09:37:55', '2025-06-08 09:37:55'),
(188, '223423423423', '6937', 1, '2025-06-08 09:37:58', '2025-06-08 09:37:58'),
(189, '223423423423', '2507', 1, '2025-06-08 09:38:00', '2025-06-08 09:38:00'),
(190, '223423423423', '5360', 1, '2025-06-08 09:38:03', '2025-06-08 09:38:03'),
(191, '223423423423', '8947', 1, '2025-06-08 09:38:05', '2025-06-08 09:38:05'),
(192, '223423423423', '9255', 1, '2025-06-08 09:38:08', '2025-06-08 09:38:08'),
(193, '223423423423', '1640', 1, '2025-06-08 09:38:10', '2025-06-08 09:38:10'),
(194, '223423423423', '4496', 1, '2025-06-08 09:38:12', '2025-06-08 09:38:12'),
(195, '223423423423', '3742', 1, '2025-06-08 09:38:15', '2025-06-08 09:38:15'),
(196, '223423423423', '9283', 1, '2025-06-08 09:38:18', '2025-06-08 09:38:18'),
(197, '223423423423', '2716', 1, '2025-06-08 09:38:20', '2025-06-08 09:38:20'),
(198, '223423423423', '6067', 1, '2025-06-08 09:38:22', '2025-06-08 09:38:22'),
(199, '223423423423', '2391', 1, '2025-06-08 09:38:25', '2025-06-08 09:38:25'),
(200, '223423423423', '4427', 1, '2025-06-08 09:38:27', '2025-06-08 09:38:27'),
(201, '223423423423', '8654', 1, '2025-06-08 09:38:30', '2025-06-08 09:38:30'),
(202, '223423423423', '5583', 1, '2025-06-08 09:38:32', '2025-06-08 09:38:32'),
(203, '223423423423', '4341', 1, '2025-06-08 09:38:35', '2025-06-08 09:38:35'),
(204, '223423423423', '9643', 1, '2025-06-08 09:38:37', '2025-06-08 09:38:37'),
(205, '223423423423', '3658', 1, '2025-06-08 09:38:40', '2025-06-08 09:38:40'),
(206, '223423423423', '9898', 1, '2025-06-08 09:38:42', '2025-06-08 09:38:42'),
(207, '223423423423', '5411', 1, '2025-06-08 09:38:45', '2025-06-08 09:38:45'),
(208, '223423423423', '3875', 1, '2025-06-08 09:38:48', '2025-06-08 09:38:48'),
(209, '223423423423', '9418', 1, '2025-06-08 09:38:50', '2025-06-08 09:38:50'),
(210, '223423423423', '3261', 1, '2025-06-08 09:38:53', '2025-06-08 09:38:53'),
(211, '223423423423', '7051', 1, '2025-06-08 09:38:55', '2025-06-08 09:38:55'),
(212, '223423423423', '8769', 1, '2025-06-08 09:38:57', '2025-06-08 09:38:57'),
(213, '223423423423', '9745', 1, '2025-06-08 09:39:00', '2025-06-08 09:39:00'),
(214, '223423423423', '3935', 1, '2025-06-08 09:39:04', '2025-06-08 09:39:04'),
(215, '223423423423', '4013', 1, '2025-06-08 09:39:07', '2025-06-08 09:39:07'),
(216, '223423423423', '8067', 1, '2025-06-08 09:39:09', '2025-06-08 09:39:09'),
(217, '223423423423', '7567', 1, '2025-06-08 09:39:12', '2025-06-08 09:39:12'),
(218, '223423423423', '6776', 1, '2025-06-08 09:39:14', '2025-06-08 09:39:14'),
(219, '223423423423', '3584', 1, '2025-06-08 09:39:17', '2025-06-08 09:39:17'),
(220, '223423423423', '8129', 1, '2025-06-08 09:39:19', '2025-06-08 09:39:19'),
(221, '223423423423', '7772', 1, '2025-06-08 09:39:22', '2025-06-08 09:39:22'),
(222, '223423423423', '6362', 1, '2025-06-08 09:39:25', '2025-06-08 09:39:25'),
(223, '223423423423', '9133', 1, '2025-06-08 09:39:27', '2025-06-08 09:39:27'),
(224, '223423423423', '7853', 1, '2025-06-08 09:39:30', '2025-06-08 09:39:30'),
(225, '223423423423', '5308', 1, '2025-06-08 09:39:33', '2025-06-08 09:39:33'),
(226, '223423423423', '2891', 1, '2025-06-08 09:39:35', '2025-06-08 09:39:35'),
(227, '223423423423', '9114', 1, '2025-06-08 09:39:38', '2025-06-08 09:39:38'),
(228, '223423423423', '8217', 1, '2025-06-08 09:39:41', '2025-06-08 09:39:41'),
(229, '223423423423', '5198', 1, '2025-06-08 09:39:43', '2025-06-08 09:39:43'),
(230, '223423423423', '4409', 1, '2025-06-08 09:39:46', '2025-06-08 09:39:46'),
(231, '223423423423', '2104', 1, '2025-06-08 09:39:48', '2025-06-08 09:39:48'),
(232, '223423423423', '8820', 1, '2025-06-08 09:39:51', '2025-06-08 09:39:51'),
(233, '223423423423', '9629', 1, '2025-06-08 09:39:54', '2025-06-08 09:39:54'),
(234, '223423423423', '6738', 1, '2025-06-08 09:39:57', '2025-06-08 09:39:57'),
(235, '223423423423', '4316', 1, '2025-06-08 09:39:59', '2025-06-08 09:39:59'),
(236, '223423423423', '4247', 1, '2025-06-08 09:40:02', '2025-06-08 09:40:02'),
(237, '223423423423', '9412', 1, '2025-06-08 09:40:05', '2025-06-08 09:40:05'),
(238, '223423423423', '6962', 1, '2025-06-08 09:40:08', '2025-06-08 09:40:08'),
(239, '223423423423', '1813', 1, '2025-06-08 09:40:11', '2025-06-08 09:40:11'),
(240, '223423423423', '3484', 1, '2025-06-08 09:40:13', '2025-06-08 09:40:13'),
(241, '223423423423', '1955', 1, '2025-06-08 09:40:16', '2025-06-08 09:40:16'),
(242, '223423423423', '7218', 1, '2025-06-08 09:40:19', '2025-06-08 09:40:19'),
(243, '223423423423', '7224', 1, '2025-06-08 09:40:21', '2025-06-08 09:40:21'),
(244, '223423423423', '6414', 1, '2025-06-08 09:40:24', '2025-06-08 09:40:24'),
(245, '223423423423', '4081', 1, '2025-06-08 09:40:27', '2025-06-08 09:40:27'),
(246, '223423423423', '4554', 1, '2025-06-08 09:40:29', '2025-06-08 09:40:29'),
(247, '223423423423', '6927', 1, '2025-06-08 09:40:32', '2025-06-08 09:40:32'),
(248, '223423423423', '6616', 1, '2025-06-08 09:40:35', '2025-06-08 09:40:35'),
(249, '223423423423', '2449', 1, '2025-06-08 09:40:38', '2025-06-08 09:40:38'),
(250, '223423423423', '1216', 1, '2025-06-08 09:40:40', '2025-06-08 09:40:40'),
(251, '223423423423', '4198', 1, '2025-06-08 09:40:43', '2025-06-08 09:40:43'),
(252, '223423423423', '4445', 1, '2025-06-08 09:40:46', '2025-06-08 09:40:46'),
(253, '223423423423', '8582', 1, '2025-06-08 09:40:49', '2025-06-08 09:40:49'),
(254, '223423423423', '9326', 1, '2025-06-08 09:40:51', '2025-06-08 09:40:51'),
(255, '223423423423', '5497', 1, '2025-06-08 09:40:54', '2025-06-08 09:40:54'),
(256, '223423423423', '1703', 1, '2025-06-08 09:40:57', '2025-06-08 09:40:57'),
(257, '223423423423', '4550', 1, '2025-06-08 09:41:00', '2025-06-08 09:41:00'),
(258, '23423423423', '4886', 1, '2025-06-08 12:43:18', '2025-06-08 12:43:18'),
(259, '23423423423', '8805', 1, '2025-06-08 12:44:19', '2025-06-08 12:44:19'),
(260, '32542345234', '4351', 1, '2025-06-08 12:49:05', '2025-06-08 12:49:05'),
(261, '32542345234', '5617', 1, '2025-06-08 12:50:11', '2025-06-08 12:50:11'),
(262, '32542345234', '3016', 1, '2025-06-08 12:52:05', '2025-06-08 12:52:05'),
(263, '34523452345', '5458', 1, '2025-06-08 12:52:39', '2025-06-08 12:52:39'),
(264, '34523452345', '4332', 1, '2025-06-08 12:53:51', '2025-06-08 12:53:51'),
(265, '2011426', '9912', 0, '2025-06-10 09:32:28', '2025-06-10 09:32:50'),
(266, '201142645054564', '3669', 1, '2025-06-12 06:35:25', '2025-06-12 06:35:25'),
(267, '201142645054564', '6845', 0, '2025-06-12 06:41:08', '2025-06-12 06:41:24'),
(268, '01142645054', '5329', 1, '2025-06-12 21:06:04', '2025-06-12 21:06:04'),
(269, '211111111111', '3864', 0, '2025-06-22 16:14:11', '2025-06-22 16:14:38'),
(270, '2011420', '4360', 0, '2025-06-23 06:54:35', '2025-06-23 06:54:54'),
(271, '20101420', '3905', 0, '2025-06-23 06:59:45', '2025-06-23 07:00:08'),
(272, '201014200', '7504', 0, '2025-06-23 07:03:00', '2025-06-23 07:03:36'),
(273, '2010142000', '9565', 0, '2025-06-23 07:05:34', '2025-06-23 07:06:01'),
(274, '20101420000', '1484', 0, '2025-06-23 07:10:21', '2025-06-23 07:10:46'),
(275, '201014200000000', '5536', 0, '2025-06-23 08:05:39', '2025-06-23 08:05:58'),
(276, '2010142000000', '2533', 0, '2025-06-23 08:23:41', '2025-06-23 08:23:57'),
(277, '2010142005', '7760', 0, '2025-06-23 08:26:52', '2025-06-23 08:27:13'),
(278, '222222222222', '6286', 1, '2025-07-05 02:32:54', '2025-07-05 02:32:54'),
(279, '222222222222', '1221', 1, '2025-07-05 02:35:10', '2025-07-05 02:35:10'),
(280, '11111111111', '9482', 1, '2025-07-05 02:39:25', '2025-07-05 02:39:25'),
(281, '11111111111', '6659', 1, '2025-07-05 02:40:28', '2025-07-05 02:40:28'),
(282, '11111111111', '1429', 1, '2025-07-05 02:44:14', '2025-07-05 02:44:14'),
(283, '11111111111', '8087', 1, '2025-07-05 02:45:38', '2025-07-05 02:45:38'),
(284, '11111111111', '4317', 1, '2025-07-05 02:46:05', '2025-07-05 02:46:05'),
(285, '212345678900', '8030', 1, '2025-07-05 02:49:02', '2025-07-05 02:49:02'),
(286, '222222222222', '5546', 1, '2025-07-05 09:04:01', '2025-07-05 09:04:01'),
(287, '222222222222', '3434', 1, '2025-07-05 15:16:50', '2025-07-05 15:16:50'),
(288, '20101420055', '8683', 1, '2025-07-05 15:36:59', '2025-07-05 15:36:59'),
(289, '212345678910', '4450', 0, '2025-08-17 19:05:33', '2025-08-17 19:06:16'),
(290, '12313454676', '3128', 1, '2025-08-30 13:35:40', '2025-08-30 13:35:40'),
(291, '201115154545', '2673', 1, '2025-09-15 14:17:46', '2025-09-15 14:17:46'),
(292, '201142645054', '6068', 0, '2025-09-23 13:18:30', '2025-09-23 13:21:39'),
(293, '201556069321', '8076', 1, '2025-09-23 14:21:13', '2025-09-23 14:21:13'),
(294, '201096762764', '2269', 0, '2025-09-23 14:43:22', '2025-09-23 14:43:32'),
(295, '212345612345', '7618', 0, '2025-09-23 14:44:36', '2025-09-23 14:45:01'),
(296, '212341234123', '2482', 0, '2025-09-23 15:04:02', '2025-09-23 15:04:23'),
(297, '212345123451', '2776', 0, '2025-09-23 15:05:51', '2025-09-23 15:06:10'),
(298, '212345612349', '1873', 0, '2025-09-23 15:11:03', '2025-09-23 15:11:18'),
(299, '201099622928', '6881', 1, '2025-09-23 15:23:22', '2025-09-23 15:23:22'),
(300, '201099622928', '7449', 1, '2025-09-23 15:26:41', '2025-09-23 15:26:41'),
(301, '201017859595', '4309', 0, '2025-09-23 17:11:12', '2025-09-23 17:11:45'),
(302, '212369078458', '5846', 0, '2025-09-23 17:23:55', '2025-09-23 17:24:12'),
(303, '201090005394', '3345', 0, '2025-09-23 19:23:13', '2025-09-23 19:23:31'),
(304, '201021310020', '8391', 0, '2025-09-23 19:27:48', '2025-09-23 19:28:00'),
(305, '201009199166', '5355', 0, '2025-09-23 19:54:52', '2025-09-23 19:55:07'),
(306, '201095637229', '9877', 0, '2025-09-23 20:20:56', '2025-09-23 20:21:07'),
(307, '201500450451', '8682', 1, '2025-09-23 22:11:03', '2025-09-23 22:11:03'),
(308, '201500450451', '6644', 1, '2025-09-23 22:12:07', '2025-09-23 22:12:07'),
(309, '201500450451', '8448', 1, '2025-09-23 22:12:44', '2025-09-23 22:12:44'),
(310, '01500450451', '4070', 1, '2025-09-23 22:13:47', '2025-09-23 22:13:47'),
(311, '01500450451', '2095', 1, '2025-09-23 22:13:49', '2025-09-23 22:13:49'),
(312, '01095637229', '2452', 1, '2025-09-25 17:33:46', '2025-09-25 17:33:46'),
(313, '01095637229', '3915', 1, '2025-09-25 17:33:48', '2025-09-25 17:33:48'),
(314, '01095637229', '6185', 1, '2025-09-25 17:35:21', '2025-09-25 17:35:21'),
(315, '201116402644', '2997', 1, '2025-09-25 17:41:26', '2025-09-25 17:41:26'),
(316, '201116402644', '4078', 1, '2025-09-25 17:42:30', '2025-09-25 17:42:30'),
(317, '201116402644', '7286', 1, '2025-09-25 17:44:00', '2025-09-25 17:44:00'),
(318, '201116402644', '2242', 0, '2025-09-25 17:54:30', '2025-09-25 17:54:46'),
(319, '201500450451', '9393', 0, '2025-09-25 22:46:30', '2025-09-25 22:46:47'),
(320, '01095637229', '4207', 1, '2025-10-04 08:39:19', '2025-10-04 08:39:19'),
(321, '01095637229', '2739', 1, '2025-10-04 08:39:21', '2025-10-04 08:39:21'),
(322, '01095637229', '3764', 1, '2025-10-08 03:26:25', '2025-10-08 03:26:25'),
(323, '01095637229', '7250', 1, '2025-10-08 03:26:27', '2025-10-08 03:26:27'),
(324, '01095637229', '5740', 1, '2025-10-08 03:28:05', '2025-10-08 03:28:05'),
(325, '01095637229', '5060', 1, '2025-10-22 06:04:14', '2025-10-22 06:04:14'),
(326, '01095637229', '6301', 1, '2025-10-22 06:04:15', '2025-10-22 06:04:15'),
(327, '01095637229', '7557', 1, '2025-10-22 06:06:36', '2025-10-22 06:06:36'),
(328, '01116402644', '8928', 1, '2025-10-22 06:09:18', '2025-10-22 06:09:18'),
(329, '01095637229', '3228', 1, '2025-10-22 06:11:40', '2025-10-22 06:11:40'),
(330, '01500450451', '2991', 1, '2025-10-22 11:58:26', '2025-10-22 11:58:26'),
(331, '01500450451', '6506', 1, '2025-10-22 11:59:56', '2025-10-22 11:59:56'),
(332, '01032039889', '4261', 1, '2025-11-05 16:35:02', '2025-11-05 16:35:02'),
(333, '01032039889', '9442', 1, '2025-11-05 16:35:03', '2025-11-05 16:35:03'),
(334, '01032039889', '3610', 1, '2025-11-05 16:35:04', '2025-11-05 16:35:04'),
(335, '01032039889', '3554', 1, '2025-11-05 16:35:04', '2025-11-05 16:35:04'),
(336, '01032039889', '4384', 1, '2025-11-05 16:35:04', '2025-11-05 16:35:04'),
(337, '01032039889', '3169', 1, '2025-11-05 16:35:05', '2025-11-05 16:35:05'),
(338, '01032039889', '4095', 1, '2025-11-05 16:35:05', '2025-11-05 16:35:05'),
(339, '01032039889', '4942', 1, '2025-11-05 16:35:05', '2025-11-05 16:35:05'),
(340, '01032039889', '3274', 1, '2025-11-05 16:35:07', '2025-11-05 16:35:07'),
(341, '201012922006', '9675', 1, '2025-11-05 16:35:46', '2025-11-05 16:35:46'),
(342, '01032039889', '4487', 1, '2025-11-05 16:42:50', '2025-11-05 16:42:50'),
(343, '201154660116', '9386', 1, '2025-11-08 11:22:08', '2025-11-08 11:22:08'),
(344, '201007779158', '1627', 1, '2025-11-08 11:22:11', '2025-11-08 11:22:11'),
(345, '201007779158', '4933', 1, '2025-11-08 11:23:42', '2025-11-08 11:23:42'),
(346, '01142645054', '2453', 1, '2025-11-08 15:26:10', '2025-11-08 15:26:10'),
(347, '01142645054', '5798', 1, '2025-11-08 15:26:11', '2025-11-08 15:26:11'),
(348, '01142645054', '7853', 1, '2025-11-08 15:26:12', '2025-11-08 15:26:12'),
(349, '01142645054', '9288', 1, '2025-11-08 15:26:13', '2025-11-08 15:26:13'),
(350, '01142645054', '6411', 1, '2025-11-08 15:26:13', '2025-11-08 15:26:13'),
(351, '01142645054', '6329', 1, '2025-11-08 15:26:13', '2025-11-08 15:26:13'),
(352, '01142645054', '4690', 1, '2025-11-08 15:26:14', '2025-11-08 15:26:14'),
(353, '01142645054', '3327', 1, '2025-11-08 15:26:15', '2025-11-08 15:26:15'),
(354, '01007779158', '9334', 1, '2025-11-13 11:43:44', '2025-11-13 11:43:44'),
(355, '01007779158', '9818', 1, '2025-11-13 11:43:46', '2025-11-13 11:43:46'),
(356, '01007779158', '3547', 1, '2025-11-13 11:43:51', '2025-11-13 11:43:51'),
(357, '01007779158', '2072', 1, '2025-11-13 11:43:52', '2025-11-13 11:43:52'),
(358, '11111111111', '4467', 1, '2025-11-23 10:58:22', '2025-11-23 10:58:22'),
(359, '11111111111', '8759', 1, '2025-11-23 10:58:25', '2025-11-23 10:58:25'),
(360, '11111111111', '8660', 1, '2025-11-25 15:29:20', '2025-11-25 15:29:20'),
(361, '11111111111', '1260', 1, '2025-11-25 15:29:23', '2025-11-25 15:29:23'),
(362, '11111111111', '3839', 1, '2025-11-25 15:29:51', '2025-11-25 15:29:51'),
(363, '11111111111', '8006', 1, '2025-11-25 15:29:55', '2025-11-25 15:29:55'),
(364, '01142645054', '4918', 1, '2025-11-25 22:10:28', '2025-11-25 22:10:28'),
(365, '01142645054', '8628', 1, '2025-11-25 22:10:31', '2025-11-25 22:10:31'),
(366, '01142645054', '7498', 1, '2025-11-25 22:10:33', '2025-11-25 22:10:33'),
(367, '01142645054', '7167', 1, '2025-11-25 22:10:33', '2025-11-25 22:10:33'),
(368, '01142645054', '6511', 1, '2025-11-25 22:10:33', '2025-11-25 22:10:33'),
(369, '11111111111', '4112', 1, '2025-12-02 11:08:50', '2025-12-02 11:08:50'),
(370, '11111111111', '2967', 1, '2025-12-02 11:08:53', '2025-12-02 11:08:53'),
(371, '11111111111', '4974', 1, '2025-12-31 01:58:09', '2025-12-31 01:58:09'),
(372, '201115', '8771', 1, '2026-02-13 07:58:47', '2026-02-13 07:58:47'),
(373, '200000000', '5928', 1, '2026-02-13 08:12:25', '2026-02-13 08:12:25'),
(374, '200000000', '7318', 1, '2026-02-13 08:34:58', '2026-02-13 08:34:58'),
(375, '200000000', '1340', 1, '2026-02-13 08:36:07', '2026-02-13 08:36:07'),
(376, '200000000', '3425', 1, '2026-02-13 08:40:09', '2026-02-13 08:40:09'),
(377, '200000000', '3502', 1, '2026-02-13 09:07:59', '2026-02-13 09:07:59'),
(378, '200000000', '5649', 1, '2026-02-13 09:12:25', '2026-02-13 09:12:25'),
(379, '200000000', '2788', 1, '2026-02-14 03:17:30', '2026-02-14 03:17:30'),
(380, '212345677760', '4059', 1, '2026-02-14 03:27:21', '2026-02-14 03:27:21'),
(381, '00000000', '1142', 1, '2026-02-14 03:31:04', '2026-02-14 03:31:04'),
(382, '200000000', '8470', 0, '2026-02-14 03:35:00', '2026-02-14 03:35:13'),
(383, '200000000', '3995', 0, '2026-02-14 03:53:55', '2026-02-14 03:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `description`, `phone`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test', '0175757', 'test', '2024-05-13 16:19:26', '2024-05-13 16:19:26'),
(2, NULL, 'test', '0175757', 'test', '2024-10-17 14:35:48', '2024-10-17 14:35:48'),
(3, NULL, 'test', '0175757', 'test', '2024-10-17 15:04:48', '2024-10-17 15:04:48'),
(4, NULL, 'dsadsad', '011', '0111', '2024-10-17 15:05:29', '2024-10-17 15:05:29'),
(5, NULL, 'hello', '50158572', 'miso', '2024-10-18 20:10:36', '2024-10-18 20:10:36'),
(6, NULL, 'كيفكم', '٩٧٢٦٦٩٩٧', 'محمد', '2024-12-19 07:04:14', '2024-12-19 07:04:14'),
(7, NULL, 'fsdfsf', 'sdfsdf', 'sdfsdf', '2024-12-19 15:31:02', '2024-12-19 15:31:02'),
(8, NULL, 'اهلا', '50158572', 'محمد', '2024-12-20 06:25:59', '2024-12-20 06:25:59'),
(9, NULL, 'hhhh', '5555', 'hhh', '2024-12-20 06:42:37', '2024-12-20 06:42:37'),
(10, NULL, 'hghg', 'ghhghg', 'gg', '2025-02-17 18:59:20', '2025-02-17 18:59:20'),
(11, NULL, 'hghg', 'ghhghg', 'gg', '2025-02-17 18:59:36', '2025-02-17 18:59:36'),
(12, NULL, 'jj', 'jjjj', 'jjj', '2025-02-17 19:02:54', '2025-02-17 19:02:54'),
(13, NULL, 'jj', 'jjjj', 'jjj', '2025-02-17 19:17:37', '2025-02-17 19:17:37'),
(14, NULL, 'hhhh', 'hhhhh', 'hhh', '2025-02-17 19:19:06', '2025-02-17 19:19:06'),
(15, NULL, 'hhhh', 'hhhhh', 'hhh', '2025-02-17 19:20:47', '2025-02-17 19:20:47'),
(16, NULL, '44', '444', '7', '2025-02-17 19:22:54', '2025-02-17 19:22:54'),
(17, NULL, 'hh', 'hhhh', 'hhhh', '2025-02-17 19:23:34', '2025-02-17 19:23:34'),
(18, NULL, 'hhh', 'hhh', 'hh', '2025-02-17 19:24:26', '2025-02-17 19:24:26'),
(19, NULL, 'hhhh', 'h', 'hh', '2025-02-17 19:24:42', '2025-02-17 19:24:42'),
(20, NULL, 'hhhh', 'jhhh', 'ddd', '2025-02-17 19:26:44', '2025-02-17 19:26:44'),
(21, NULL, 'hhhhhh', 'hhhh', 'hhh', '2025-02-17 19:26:59', '2025-02-17 19:26:59'),
(22, NULL, 'hhhh', 'hhhh', 'hhhh', '2025-02-17 19:27:18', '2025-02-17 19:27:18'),
(23, NULL, 'hhhh', 'hhhh', 'hhhh', '2025-02-17 19:28:03', '2025-02-17 19:28:03'),
(24, NULL, 'ghjkl', 'ghjkl', 'ghjk', '2025-02-17 19:41:35', '2025-02-17 19:41:35'),
(25, NULL, 'test', '0175757', 'test', '2026-02-11 00:21:56', '2026-02-11 00:21:56'),
(26, NULL, 'test', '0175757', 'test', '2026-02-11 00:22:39', '2026-02-11 00:22:39'),
(27, NULL, 'bdndjdjdjdjeike', '95959565', 'hell9', '2026-02-11 00:34:51', '2026-02-11 00:34:51'),
(28, NULL, 'dgdgdhdhdnd', '85858606', 'jrjjrjr', '2026-02-11 00:38:34', '2026-02-11 00:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `name_en` varchar(191) DEFAULT NULL,
  `flag` varchar(191) DEFAULT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `currency_en` varchar(191) DEFAULT NULL,
  `country_code` varchar(191) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `special` enum('0','1') NOT NULL DEFAULT '0',
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `name_en`, `flag`, `currency`, `currency_en`, `country_code`, `picture`, `special`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'البانيا', 'Albania', NULL, NULL, NULL, '355', NULL, '0', '1', NULL, NULL, '2021-11-05 00:45:55'),
(3, 'الجزائر', 'Algeria', NULL, NULL, NULL, '213', NULL, '0', '1', NULL, NULL, '2021-11-05 00:52:07'),
(4, 'ساموا الأمريكية', 'American Samoa', NULL, NULL, NULL, '1684', NULL, '0', '1', NULL, NULL, '2021-11-05 00:52:45'),
(5, 'اندورا', 'Andorra', NULL, NULL, NULL, '376', NULL, '0', '1', NULL, NULL, '2021-11-05 00:53:03'),
(6, 'انجولا', 'Angola', NULL, NULL, NULL, '244', NULL, '0', '1', NULL, NULL, '2021-11-05 00:53:15'),
(7, 'أنغيلا', 'Anguilla', NULL, NULL, NULL, '1264', NULL, '0', '1', NULL, NULL, '2021-11-05 00:53:43'),
(8, 'أنتاركتيكا', 'Antarctica', NULL, NULL, NULL, '0', NULL, '0', '1', NULL, NULL, '2021-11-05 00:54:01'),
(9, 'انتيجوا وباربودا', 'Antigua And Barbuda', NULL, NULL, NULL, '1268', NULL, '0', '1', NULL, NULL, '2021-11-05 00:54:14'),
(10, 'الارجنتين', 'Argentina', NULL, NULL, NULL, '54', NULL, '0', '1', NULL, NULL, '2021-11-05 00:54:22'),
(11, 'ارمينيا', 'Armenia', NULL, NULL, NULL, '374', NULL, '0', '1', NULL, NULL, '2021-11-05 00:54:35'),
(12, 'أروبا', 'Aruba', NULL, NULL, NULL, '297', NULL, '0', '1', NULL, NULL, '2021-11-05 00:55:03'),
(13, 'استراليا', 'Australia', NULL, NULL, NULL, '61', NULL, '0', '1', NULL, NULL, '2021-11-05 00:55:49'),
(14, 'النمسا', 'Austria', NULL, NULL, NULL, '43', NULL, '0', '1', NULL, NULL, '2021-11-05 00:56:06'),
(15, 'اذربيجان', 'Azerbaijan', NULL, NULL, NULL, '994', NULL, '0', '1', NULL, NULL, '2021-11-05 00:56:19'),
(16, 'جزر البهاما', 'The Bahamas', NULL, NULL, NULL, '1242', NULL, '0', '1', NULL, NULL, '2021-11-05 00:58:03'),
(17, 'البحرين', 'Bahrain', NULL, NULL, NULL, '973', NULL, '0', '1', NULL, NULL, '2021-11-05 00:56:57'),
(18, 'بنجلاديش', 'Bangladesh', NULL, NULL, NULL, '880', NULL, '0', '1', NULL, NULL, '2021-11-05 00:57:10'),
(19, 'بربادوس', 'Barbados', NULL, NULL, NULL, '1246', NULL, '0', '1', NULL, NULL, '2021-11-05 00:57:27'),
(20, 'بيلا روسيا', 'Belarus', NULL, NULL, NULL, '375', NULL, '0', '1', NULL, NULL, '2021-11-05 00:57:47'),
(21, 'بلجيكا', 'Belgium', NULL, NULL, NULL, '32', NULL, '0', '1', NULL, NULL, '2021-11-05 00:58:17'),
(22, 'بليز', 'Belize', NULL, NULL, NULL, '501', NULL, '0', '1', NULL, NULL, '2021-11-05 01:02:27'),
(23, 'بنين', 'Benin', NULL, NULL, NULL, '229', NULL, '0', '1', NULL, NULL, '2021-11-05 01:02:36'),
(24, 'برمودا', 'Bermuda', NULL, NULL, NULL, '1441', NULL, '0', '1', NULL, NULL, '2021-11-05 01:02:56'),
(25, 'بوتان', 'Bhutan', NULL, NULL, NULL, '975', NULL, '0', '1', NULL, NULL, '2021-11-05 01:03:19'),
(26, 'بوليفيا', 'Bolivia', NULL, NULL, NULL, '591', NULL, '0', '1', NULL, NULL, '2021-11-05 01:03:36'),
(27, 'البوسنة والهرسك', 'Bosnia and Herzegovina', NULL, NULL, NULL, '387', NULL, '0', '1', NULL, NULL, '2021-11-05 01:03:50'),
(28, 'بوتسوانا', 'Botswana', NULL, NULL, NULL, '267', NULL, '0', '1', NULL, NULL, '2021-11-05 01:04:06'),
(29, 'جزيرة بوفيت', 'Bouvet Island', NULL, NULL, NULL, '0', NULL, '0', '1', NULL, NULL, '2021-11-05 01:04:25'),
(30, 'البرازيل', 'Brazil', NULL, NULL, NULL, '55', NULL, '0', '1', NULL, NULL, '2021-11-05 01:04:38'),
(31, 'إقليم المحيط البريطاني الهندي', 'British Indian Ocean Territory', NULL, NULL, NULL, '246', NULL, '0', '1', NULL, NULL, '2021-11-05 01:05:07'),
(32, 'بروناي', 'Brunei', NULL, NULL, NULL, '673', NULL, '0', '1', NULL, NULL, '2021-11-05 01:05:55'),
(33, 'بلغاريا', 'Bulgaria', NULL, NULL, NULL, '359', NULL, '0', '1', NULL, NULL, '2021-11-05 01:06:11'),
(34, 'بوركينا فاسو', 'Burkina Faso', NULL, NULL, NULL, '226', NULL, '0', '1', NULL, NULL, '2021-11-05 03:27:19'),
(35, 'بوروندي', 'Burundi', NULL, NULL, NULL, '257', NULL, '0', '1', NULL, NULL, '2021-11-05 03:27:33'),
(36, 'كمبوديا', 'Cambodia', NULL, NULL, NULL, '855', NULL, '0', '1', NULL, NULL, '2021-11-05 03:27:52'),
(37, 'كاميرون', 'Cameroon', NULL, NULL, NULL, '237', NULL, '0', '1', NULL, NULL, '2021-11-05 03:28:07'),
(38, 'كندا', 'Canada', NULL, NULL, NULL, '1', NULL, '0', '1', NULL, NULL, '2021-11-05 03:28:17'),
(39, 'الرأس الأخضر', 'Cape Verde', NULL, NULL, NULL, '238', NULL, '0', '1', NULL, NULL, '2021-11-05 03:28:55'),
(40, 'جزر كايمان', 'Cayman Islands', NULL, NULL, NULL, '1345', NULL, '0', '1', NULL, NULL, '2021-11-05 03:29:09'),
(41, 'جمهورية افريقيا الوسطي', 'Central African Republic', NULL, NULL, NULL, '236', NULL, '0', '1', NULL, NULL, '2021-11-05 03:29:57'),
(42, 'تشاد', 'Chad', NULL, NULL, NULL, '235', NULL, '0', '1', NULL, NULL, '2021-11-05 03:30:06'),
(43, 'شيلى', 'Chile', NULL, NULL, NULL, '56', NULL, '0', '1', NULL, NULL, '2021-11-05 03:30:22'),
(44, 'الصين', 'China', NULL, NULL, NULL, '86', NULL, '0', '1', NULL, NULL, '2021-11-05 03:30:35'),
(45, 'جزيرة الكريسماس', 'Christmas Island', NULL, NULL, NULL, '61', NULL, '0', '1', '2021-11-05 03:33:23', NULL, '2021-11-05 03:33:23'),
(46, 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', NULL, NULL, NULL, '672', NULL, '0', '1', NULL, NULL, '2021-11-05 03:31:26'),
(47, 'كولومبيا', 'Colombia', NULL, NULL, NULL, '57', NULL, '0', '1', NULL, NULL, '2021-11-05 03:31:37'),
(48, 'جزر القمر', 'Comoros', NULL, NULL, NULL, '269', NULL, '0', '1', NULL, NULL, '2021-11-05 03:31:58'),
(49, 'الكونغو', 'Congo', NULL, NULL, NULL, '242', NULL, '0', '1', NULL, NULL, '2021-11-05 03:32:28'),
(50, NULL, 'Congo The Democratic Republic Of The', NULL, NULL, NULL, '242', NULL, '0', '1', '2021-11-05 03:32:16', NULL, '2021-11-05 03:32:16'),
(51, NULL, 'Cook Islands', NULL, NULL, NULL, '682', NULL, '0', '1', '2021-11-05 03:33:15', NULL, '2021-11-05 03:33:15'),
(52, 'كوستاريكا', 'Costa Rica', NULL, NULL, NULL, '506', NULL, '0', '1', NULL, NULL, '2021-11-05 03:33:38'),
(53, 'كوت ديفوار', 'Cote D Ivoire (Ivory Coast)', NULL, NULL, NULL, '225', NULL, '0', '1', NULL, NULL, '2021-11-05 03:34:00'),
(54, 'كرواتيا', 'Croatia (Hrvatska)', NULL, NULL, NULL, '385', NULL, '0', '1', NULL, NULL, '2021-11-05 03:34:16'),
(55, 'كوبا', 'Cuba', NULL, NULL, NULL, '53', NULL, '0', '1', NULL, NULL, '2021-11-05 03:34:25'),
(56, 'قبرص', 'Cyprus', NULL, NULL, NULL, '357', NULL, '0', '1', NULL, NULL, '2021-11-05 03:34:36'),
(57, 'جمهورية التشيك', 'Czech Republic', NULL, NULL, NULL, '420', NULL, '0', '1', NULL, NULL, '2021-11-05 03:34:53'),
(58, 'الدنمارك', 'Denmark', NULL, NULL, NULL, '45', NULL, '0', '1', NULL, NULL, '2021-11-05 03:35:05'),
(59, 'جيبوتي', 'Djibouti', NULL, NULL, NULL, '253', NULL, '0', '1', NULL, NULL, '2021-11-05 03:35:24'),
(60, 'دومينيكا', 'Dominica', NULL, NULL, NULL, '1767', NULL, '0', '1', NULL, NULL, '2021-11-05 03:35:41'),
(61, 'الدومينيكان', 'Dominican Republic', NULL, NULL, NULL, '1809', NULL, '0', '1', NULL, NULL, '2021-11-05 03:35:58'),
(62, 'تيمور الشرقية', 'East Timor', NULL, NULL, NULL, '670', NULL, '0', '1', NULL, NULL, '2021-11-05 03:36:16'),
(63, 'الاكوادور', 'Ecuador', NULL, NULL, NULL, '593', NULL, '0', '1', NULL, NULL, '2021-11-05 03:36:28'),
(64, 'جمهورية مصر العربية', 'Egypt', 'Egypt-Flag.png', 'EGP', 'EGP', '2', NULL, '0', '1', NULL, NULL, '2021-11-05 03:36:49'),
(65, 'السلفادور', 'El Salvador', NULL, NULL, NULL, '503', NULL, '0', '1', NULL, NULL, '2021-11-05 03:37:10'),
(66, 'غينيا الاستوائية', 'Equatorial Guinea', NULL, NULL, NULL, '240', NULL, '0', '1', NULL, NULL, '2021-11-05 03:37:33'),
(67, 'اريتريا', 'Eritrea', NULL, NULL, NULL, '291', NULL, '0', '1', NULL, NULL, '2021-11-05 03:37:52'),
(68, 'استونيا', 'Estonia', NULL, NULL, NULL, '372', NULL, '0', '1', NULL, NULL, '2021-11-05 03:38:05'),
(69, 'اثيوبيا', 'Ethiopia', NULL, NULL, NULL, '251', NULL, '0', '1', NULL, NULL, '2021-11-05 03:38:18'),
(70, NULL, 'External Territories of Australia', NULL, NULL, NULL, '61', NULL, '0', '1', '2021-11-05 03:38:44', NULL, '2021-11-05 03:38:44'),
(71, NULL, 'Falkland Islands', NULL, NULL, NULL, '500', NULL, '0', '1', '2021-11-05 03:39:03', NULL, '2021-11-05 03:39:03'),
(72, NULL, 'Faroe Islands', NULL, NULL, NULL, '298', NULL, '0', '1', '2021-11-05 03:39:10', NULL, '2021-11-05 03:39:10'),
(73, 'جزر فيجى', 'Fiji Islands', NULL, NULL, NULL, '679', NULL, '0', '1', NULL, NULL, '2021-11-05 03:39:27'),
(74, 'فنلندا', 'Finland', NULL, NULL, NULL, '358', NULL, '0', '1', NULL, NULL, '2021-11-05 03:39:41'),
(75, 'فرنسا', 'France', NULL, NULL, NULL, '33', NULL, '0', '1', NULL, NULL, '2021-11-05 03:39:53'),
(76, NULL, 'French Guiana', NULL, NULL, NULL, '594', NULL, '0', '1', '2021-11-05 03:40:19', NULL, '2021-11-05 03:40:19'),
(77, NULL, 'French Polynesia', NULL, NULL, NULL, '689', NULL, '0', '1', '2021-11-05 03:40:33', NULL, '2021-11-05 03:40:33'),
(78, NULL, 'French Southern Territories', NULL, NULL, NULL, '0', NULL, '0', '1', '2021-11-05 03:40:42', NULL, '2021-11-05 03:40:42'),
(79, 'الجابون', 'Gabon', NULL, NULL, NULL, '241', NULL, '0', '1', NULL, NULL, '2021-11-05 03:40:55'),
(80, 'جامبيا', 'The Gambia', NULL, NULL, NULL, '220', NULL, '0', '1', NULL, NULL, '2021-11-05 03:41:22'),
(81, 'جورجيا', 'Georgia', NULL, NULL, NULL, '995', NULL, '0', '1', NULL, NULL, '2021-11-05 03:41:39'),
(82, 'المانيا', 'Germany', NULL, NULL, NULL, '49', NULL, '0', '1', NULL, NULL, '2021-11-05 03:41:50'),
(83, 'غانا', 'Ghana', NULL, NULL, NULL, '233', NULL, '0', '1', NULL, NULL, '2021-11-05 03:42:00'),
(84, NULL, 'Gibraltar', NULL, NULL, NULL, '350', NULL, '0', '1', '2021-11-05 03:42:13', NULL, '2021-11-05 03:42:13'),
(85, 'اليونان', 'Greece', NULL, NULL, NULL, '30', NULL, '0', '1', NULL, NULL, '2021-11-05 03:42:24'),
(86, NULL, 'Greenland', NULL, NULL, NULL, '299', NULL, '0', '1', '2021-11-05 03:43:00', NULL, '2021-11-05 03:43:00'),
(87, 'جرانادا', 'Grenada', NULL, NULL, NULL, '1473', NULL, '0', '1', NULL, NULL, '2021-11-05 03:42:50'),
(88, NULL, 'Guadeloupe', NULL, NULL, NULL, '590', NULL, '0', '1', '2021-11-05 03:43:19', NULL, '2021-11-05 03:43:19'),
(89, NULL, 'Guam', NULL, NULL, NULL, '1671', NULL, '0', '1', '2021-11-05 03:43:27', NULL, '2021-11-05 03:43:27'),
(90, 'جواتيمالا', 'Guatemala', NULL, NULL, NULL, '502', NULL, '0', '1', NULL, NULL, '2021-11-05 03:43:37'),
(91, NULL, 'Guernsey and Alderney', NULL, NULL, NULL, '44', NULL, '0', '1', '2021-11-05 03:44:00', NULL, '2021-11-05 03:44:00'),
(92, 'غينيا', 'Guinea', NULL, NULL, NULL, '224', NULL, '0', '1', NULL, NULL, '2021-11-05 03:44:10'),
(93, 'غينيا بيساو', 'Guinea-Bissau', NULL, NULL, NULL, '245', NULL, '0', '1', NULL, NULL, '2021-11-05 03:44:28'),
(94, 'جويانا', 'Guyana', NULL, NULL, NULL, '592', NULL, '0', '1', NULL, NULL, '2021-11-05 03:44:41'),
(95, 'هايتى', 'Haiti', NULL, NULL, NULL, '509', NULL, '0', '1', NULL, NULL, '2021-11-05 03:45:00'),
(96, NULL, 'Heard and McDonald Islands', NULL, NULL, NULL, '0', NULL, '0', '1', '2021-11-05 03:45:15', NULL, '2021-11-05 03:45:15'),
(97, 'هندوراس', 'Honduras', NULL, NULL, NULL, '504', NULL, '0', '1', NULL, NULL, '2021-11-05 03:45:30'),
(98, 'هونج كونج', 'Hong Kong S.A.R.', NULL, NULL, NULL, '852', NULL, '0', '1', NULL, NULL, '2021-11-05 03:45:54'),
(99, 'المجر', 'Hungary', NULL, NULL, NULL, '36', NULL, '0', '1', NULL, NULL, '2021-11-05 03:46:12'),
(100, 'ايسلندا', 'Iceland', NULL, NULL, NULL, '354', NULL, '0', '1', NULL, NULL, '2021-11-05 03:46:25'),
(101, 'الهند', 'India', NULL, NULL, NULL, '91', NULL, '0', '1', NULL, NULL, '2021-11-05 03:46:35'),
(102, 'اندونيسيا', 'Indonesia', NULL, NULL, NULL, '62', NULL, '0', '1', NULL, NULL, '2021-11-05 03:47:00'),
(103, 'ايران', 'Iran', NULL, NULL, NULL, '98', NULL, '0', '1', NULL, NULL, '2021-11-05 03:47:11'),
(104, 'العراق', 'Iraq', NULL, NULL, NULL, '964', NULL, '0', '1', NULL, NULL, '2021-11-05 03:47:23'),
(105, 'ايرلندا', 'Ireland', NULL, NULL, NULL, '353', NULL, '0', '1', NULL, NULL, '2021-11-05 03:47:46'),
(107, 'ايطاليا', 'Italy', NULL, NULL, NULL, '39', NULL, '0', '1', NULL, NULL, '2021-11-05 03:47:57'),
(108, 'جاميكا', 'Jamaica', NULL, NULL, NULL, '1876', NULL, '0', '1', NULL, NULL, '2021-11-05 03:48:13'),
(109, 'اليابان', 'Japan', NULL, NULL, NULL, '81', NULL, '0', '1', NULL, NULL, '2021-11-05 03:48:29'),
(110, NULL, 'Jersey', NULL, NULL, NULL, '44', NULL, '0', '1', '2021-11-05 03:48:45', NULL, '2021-11-05 03:48:45'),
(111, 'الاردن', 'Jordan', NULL, NULL, NULL, '962', NULL, '0', '1', NULL, NULL, '2021-11-05 03:48:55'),
(112, 'كازاخستان', 'Kazakhstan', NULL, NULL, NULL, '7', NULL, '0', '1', NULL, NULL, '2021-11-05 03:49:09'),
(113, 'كينيا', 'Kenya', NULL, NULL, NULL, '254', NULL, '0', '1', NULL, NULL, '2021-11-05 03:49:19'),
(114, 'كيريباتى', 'Kiribati', NULL, NULL, NULL, '686', NULL, '0', '1', NULL, NULL, '2021-11-05 03:49:33'),
(115, 'كوريا الشمالية', 'Korea North', NULL, NULL, NULL, '850', NULL, '0', '1', NULL, NULL, '2021-11-05 03:49:46'),
(116, 'كوريا الجنوبية', 'Korea South', NULL, NULL, NULL, '82', NULL, '0', '1', NULL, NULL, '2021-11-05 03:49:59'),
(117, 'الكويت', 'Kuwait', 'Kuwait-Flag.png', 'KWD', 'KWD', '965', NULL, '0', '1', NULL, NULL, '2021-11-05 03:50:13'),
(118, 'قرغيزستان', 'Kyrgyzstan', NULL, NULL, NULL, '996', NULL, '0', '1', NULL, NULL, '2021-11-05 03:50:32'),
(119, 'لاوس', 'Laos', NULL, NULL, NULL, '856', NULL, '0', '1', NULL, NULL, '2021-11-05 03:50:48'),
(120, 'لاتفيا', 'Latvia', NULL, NULL, NULL, '371', NULL, '0', '1', NULL, NULL, '2021-11-05 03:51:01'),
(121, 'لبنان', 'Lebanon', NULL, NULL, NULL, '961', NULL, '0', '1', NULL, NULL, '2021-11-05 03:51:11'),
(122, 'ليسوتو', 'Lesotho', NULL, NULL, NULL, '266', NULL, '0', '1', NULL, NULL, '2021-11-05 03:51:28'),
(123, 'ليبيريا', 'Liberia', NULL, NULL, NULL, '231', NULL, '0', '1', NULL, NULL, '2021-11-05 03:51:41'),
(124, 'ليبيا', 'Libya', NULL, NULL, NULL, '218', NULL, '0', '1', NULL, NULL, '2021-11-05 03:51:53'),
(125, 'ليختنشتاين', 'Liechtenstein', NULL, NULL, NULL, '423', NULL, '0', '1', NULL, NULL, '2021-11-05 03:52:10'),
(126, 'ليتوانيا', 'Lithuania', NULL, NULL, NULL, '370', NULL, '0', '1', NULL, NULL, '2021-11-05 03:52:26'),
(127, 'لوكسمبورج', 'Luxembourg', NULL, NULL, NULL, '352', NULL, '0', '1', NULL, NULL, '2021-11-05 03:52:40'),
(128, NULL, 'Macau S.A.R.', NULL, NULL, NULL, '853', NULL, '0', '1', '2021-11-05 03:53:03', NULL, '2021-11-05 03:53:03'),
(129, 'مقدونيا', 'Macedonia', NULL, NULL, NULL, '389', NULL, '0', '1', NULL, NULL, '2021-11-06 01:41:14'),
(130, 'مدغشقر', 'Madagascar', NULL, NULL, NULL, '261', NULL, '0', '1', NULL, NULL, '2021-11-06 01:41:29'),
(131, 'مالوي', 'Malawi', NULL, NULL, NULL, '265', NULL, '0', '1', NULL, NULL, '2021-11-06 01:41:44'),
(132, 'ماليزيا', 'Malaysia', NULL, NULL, NULL, '60', NULL, '0', '1', NULL, NULL, '2021-11-06 01:41:56'),
(133, 'مالديف', 'Maldives', NULL, NULL, NULL, '960', NULL, '0', '1', NULL, NULL, '2021-11-06 01:42:07'),
(134, 'مالي', 'Mali', NULL, NULL, NULL, '223', NULL, '0', '1', NULL, NULL, '2021-11-06 01:42:22'),
(135, 'مالطا', 'Malta', NULL, NULL, NULL, '356', NULL, '0', '1', NULL, NULL, '2021-11-06 01:42:35'),
(136, NULL, 'Man (Isle of)', NULL, NULL, NULL, '44', NULL, '0', '1', '2021-11-06 01:42:50', NULL, '2021-11-06 01:42:50'),
(137, 'جزر مارشال', 'Marshall Islands', NULL, NULL, NULL, '692', NULL, '0', '1', NULL, NULL, '2021-11-06 01:43:01'),
(138, NULL, 'Martinique', NULL, NULL, NULL, '596', NULL, '0', '1', '2021-11-06 01:43:15', NULL, '2021-11-06 01:43:15'),
(139, 'موريتانيا', 'Mauritania', NULL, NULL, NULL, '222', NULL, '0', '1', NULL, NULL, '2021-11-06 01:43:27'),
(140, 'موريشيوس', 'Mauritius', NULL, NULL, NULL, '230', NULL, '0', '1', NULL, NULL, '2021-11-06 01:43:43'),
(141, NULL, 'Mayotte', NULL, NULL, NULL, '269', NULL, '0', '1', '2021-11-06 01:44:01', NULL, '2021-11-06 01:44:01'),
(142, 'المكسيك', 'Mexico', NULL, NULL, NULL, '52', NULL, '0', '1', NULL, NULL, '2021-11-06 01:44:14'),
(143, 'جزر مايكرونيزيا', 'Micronesia', NULL, NULL, NULL, '691', NULL, '0', '1', NULL, NULL, '2021-11-06 01:45:03'),
(144, 'مولدوفيا', 'Moldova', NULL, NULL, NULL, '373', NULL, '0', '1', NULL, NULL, '2021-11-06 01:45:19'),
(145, 'امارة موناكو', 'Monaco', NULL, NULL, NULL, '377', NULL, '0', '1', NULL, NULL, '2021-11-06 01:45:36'),
(146, 'منغوليا', 'Mongolia', NULL, NULL, NULL, '976', NULL, '0', '1', NULL, NULL, '2021-11-06 01:45:52'),
(147, 'مونتنيجرو', 'Montenegro', NULL, NULL, NULL, '1664', NULL, '0', '1', NULL, NULL, '2021-11-06 01:46:40'),
(148, 'المغرب', 'Morocco', NULL, NULL, NULL, '212', NULL, '0', '1', NULL, NULL, '2021-11-06 01:46:58'),
(149, 'موزمبيق', 'Mozambique', NULL, NULL, NULL, '258', NULL, '0', '1', NULL, NULL, '2021-11-06 01:47:11'),
(150, 'ميانمار (بورما)', 'Myanmar', NULL, NULL, NULL, '95', NULL, '0', '1', NULL, NULL, '2021-11-06 01:47:28'),
(151, 'نامبيا', 'Namibia', NULL, NULL, NULL, '264', NULL, '0', '1', NULL, NULL, '2021-11-06 01:48:10'),
(152, 'ناورو', 'Nauru', NULL, NULL, NULL, '674', NULL, '0', '1', NULL, NULL, '2021-11-06 01:48:35'),
(153, 'نيبال', 'Nepal', NULL, NULL, NULL, '977', NULL, '0', '1', NULL, NULL, '2021-11-06 01:48:49'),
(154, 'هولندا', 'Netherlands', NULL, NULL, NULL, '599', NULL, '0', '1', NULL, NULL, '2021-11-06 01:49:18'),
(155, NULL, 'Netherlands The', NULL, NULL, NULL, '31', NULL, '0', '1', '2021-11-06 01:49:29', NULL, '2021-11-06 01:49:29'),
(156, NULL, 'New Caledonia', NULL, NULL, NULL, '687', NULL, '0', '1', '2021-11-06 01:49:42', NULL, '2021-11-06 01:49:42'),
(157, 'نيوزيلندا', 'New Zealand', NULL, NULL, NULL, '64', NULL, '0', '1', NULL, NULL, '2021-11-06 01:49:54'),
(158, 'نيكاراجوا', 'Nicaragua', NULL, NULL, NULL, '505', NULL, '0', '1', NULL, NULL, '2021-11-06 01:51:13'),
(159, 'النيجر', 'Niger', NULL, NULL, NULL, '227', NULL, '0', '1', NULL, NULL, '2021-11-06 01:51:26'),
(160, 'نيجريا', 'Nigeria', NULL, NULL, NULL, '234', NULL, '0', '1', NULL, NULL, '2021-11-06 01:51:39'),
(161, NULL, 'Niue', NULL, NULL, NULL, '683', NULL, '0', '1', '2021-11-06 01:52:05', NULL, '2021-11-06 01:52:05'),
(162, NULL, 'Norfolk Island', NULL, NULL, NULL, '672', NULL, '0', '1', '2021-11-06 01:52:16', NULL, '2021-11-06 01:52:16'),
(163, NULL, 'Northern Mariana Islands', NULL, NULL, NULL, '1670', NULL, '0', '1', '2021-11-06 01:52:26', NULL, '2021-11-06 01:52:26'),
(164, 'النرويج', 'Norway', NULL, NULL, NULL, '47', NULL, '0', '1', NULL, NULL, '2021-11-06 01:52:39'),
(165, 'عمان', 'Oman', NULL, NULL, NULL, '968', NULL, '0', '1', NULL, NULL, '2021-11-06 01:52:52'),
(166, 'باكستان', 'Pakistan', NULL, NULL, NULL, '92', NULL, '0', '1', NULL, NULL, '2021-11-06 01:53:04'),
(167, 'بالو', 'Palau', NULL, NULL, NULL, '680', NULL, '0', '1', NULL, NULL, '2021-11-06 01:53:21'),
(168, 'فلسطين', 'Palestinian', NULL, NULL, NULL, '970', NULL, '0', '1', NULL, NULL, '2021-11-06 01:53:34'),
(169, 'بنما', 'Panama', NULL, NULL, NULL, '507', NULL, '0', '1', NULL, NULL, '2021-11-06 01:54:15'),
(170, 'بابوا غينيا الجديدة', 'Papua new Guinea', NULL, NULL, NULL, '675', NULL, '0', '1', NULL, NULL, '2021-11-06 01:54:37'),
(171, 'باراجواي', 'Paraguay', NULL, NULL, NULL, '595', NULL, '0', '1', NULL, NULL, '2021-11-06 01:55:12'),
(172, 'بيرو', 'Peru', NULL, NULL, NULL, '51', NULL, '0', '1', NULL, NULL, '2021-11-06 01:55:31'),
(173, 'الفلبين', 'Philippines', NULL, NULL, NULL, '63', NULL, '0', '1', NULL, NULL, '2021-11-06 01:56:11'),
(174, NULL, 'Pitcairn Island', NULL, NULL, NULL, '0', NULL, '0', '1', '2021-11-06 01:56:33', NULL, '2021-11-06 01:56:33'),
(175, 'بولندا', 'Poland', NULL, NULL, NULL, '48', NULL, '0', '1', NULL, NULL, '2021-11-06 01:56:50'),
(176, 'البرتغال', 'Portugal', NULL, NULL, NULL, '351', NULL, '0', '1', NULL, NULL, '2021-11-06 01:57:10'),
(177, NULL, 'Puerto Rico', NULL, NULL, NULL, '1787', NULL, '0', '1', '2021-11-06 01:57:28', NULL, '2021-11-06 01:57:28'),
(178, 'قطر', 'Qatar', NULL, NULL, NULL, '+974', NULL, '1', '1', NULL, NULL, NULL),
(179, NULL, 'Reunion', NULL, NULL, NULL, '262', NULL, '0', '1', '2021-11-06 01:57:38', NULL, '2021-11-06 01:57:38'),
(180, 'رومانيا', 'Romania', NULL, NULL, NULL, '40', NULL, '0', '1', NULL, NULL, '2021-11-06 01:57:52'),
(181, 'روسيا', 'Russia', NULL, NULL, NULL, '70', NULL, '0', '1', NULL, NULL, '2021-11-06 01:58:45'),
(182, 'رواندا', 'Rwanda', NULL, NULL, NULL, '250', NULL, '0', '1', NULL, NULL, '2021-11-06 01:58:58'),
(183, 'قطر', 'َQatar', NULL, NULL, NULL, '974', NULL, '0', '1', NULL, NULL, '2021-11-06 01:59:36'),
(184, 'سان كيتس اند نيفز', 'Saint Kitts And Nevis', NULL, NULL, NULL, '1869', NULL, '0', '1', NULL, NULL, '2021-11-06 01:59:49'),
(185, 'سان لوتشيا', 'Saint Lucia', NULL, NULL, NULL, '1758', NULL, '0', '1', NULL, NULL, '2021-11-06 02:00:09'),
(186, NULL, 'Saint Pierre and Miquelon', NULL, NULL, NULL, '508', NULL, '0', '1', '2021-11-06 02:00:38', NULL, '2021-11-06 02:00:38'),
(187, 'Saint Vincent and the Grenadines', 'Saint Vincent And The Grenadines', NULL, NULL, NULL, '1784', NULL, '0', '1', NULL, NULL, '2021-11-06 02:00:30'),
(188, 'ساموا', 'Samoa', NULL, NULL, NULL, '684', NULL, '0', '1', NULL, NULL, '2021-11-06 02:00:56'),
(189, 'سان مارينو', 'San Marino', NULL, NULL, NULL, '378', NULL, '0', '1', NULL, NULL, '2021-11-06 02:01:11'),
(190, 'ساوتومى اند برنسيب', 'Sao Tome and Principe', NULL, NULL, NULL, '239', NULL, '0', '1', NULL, NULL, '2021-11-06 02:01:31'),
(191, 'المملكة العربية السعودية', 'Saudi Arabia', NULL, NULL, NULL, '966', NULL, '0', '1', NULL, NULL, '2021-11-06 02:01:54'),
(192, 'السنغال', 'Senegal', NULL, NULL, NULL, '221', NULL, '0', '1', NULL, NULL, '2021-11-06 02:02:06'),
(193, 'صربيا', 'Serbia', NULL, NULL, NULL, '381', NULL, '0', '1', NULL, NULL, '2021-11-06 02:02:20'),
(194, 'جزر سيشل', 'Seychelles', NULL, NULL, NULL, '248', NULL, '0', '1', NULL, NULL, '2021-11-06 02:02:40'),
(195, 'سيراليون', 'Sierra Leone', NULL, NULL, NULL, '232', NULL, '0', '1', NULL, NULL, '2021-11-06 02:02:57'),
(196, 'سنغافورة', 'Singapore', NULL, NULL, NULL, '65', NULL, '0', '1', NULL, NULL, '2021-11-06 02:03:16'),
(197, 'سلوفاكيا', 'Slovakia', NULL, NULL, NULL, '421', NULL, '0', '1', NULL, NULL, '2021-11-06 02:03:32'),
(198, 'سلوفينيا', 'Slovenia', NULL, NULL, NULL, '386', NULL, '0', '1', NULL, NULL, '2021-11-06 02:03:46'),
(199, NULL, 'Smaller Territories of the UK', NULL, NULL, NULL, '44', NULL, '0', '1', '2021-11-06 02:04:00', NULL, '2021-11-06 02:04:00'),
(200, 'جزر سولومون', 'Solomon Islands', NULL, NULL, NULL, '677', NULL, '0', '1', NULL, NULL, '2021-11-06 02:04:24'),
(201, 'الصومال', 'Somalia', NULL, NULL, NULL, '252', NULL, '0', '1', NULL, NULL, '2021-11-06 02:04:13'),
(202, 'جنوب افريقيا', 'South Africa', NULL, NULL, NULL, '27', NULL, '0', '1', NULL, NULL, '2021-11-06 02:04:39'),
(203, NULL, 'South Georgia', NULL, NULL, NULL, '0', NULL, '0', '1', '2021-11-06 02:05:02', NULL, '2021-11-06 02:05:02'),
(204, 'جنوب السودان', 'South Sudan', NULL, NULL, NULL, '211', NULL, '0', '1', NULL, NULL, '2021-11-06 02:05:18'),
(205, 'اسبانيا', 'Spain', NULL, NULL, NULL, '34', NULL, '0', '1', NULL, NULL, '2021-11-06 02:05:31'),
(206, 'سريلانكا', 'Sri Lanka', NULL, NULL, NULL, '94', NULL, '0', '1', NULL, NULL, '2021-11-06 02:05:45'),
(207, 'السودان', 'Sudan', NULL, NULL, NULL, '249', NULL, '0', '1', NULL, NULL, '2021-11-06 02:05:57'),
(208, 'سورينام', 'Suriname', NULL, NULL, NULL, '597', NULL, '0', '1', NULL, NULL, '2021-11-06 02:06:11'),
(209, NULL, 'Svalbard And Jan Mayen Islands', NULL, NULL, NULL, '47', NULL, '0', '1', '2021-11-06 02:06:29', NULL, '2021-11-06 02:06:29'),
(210, 'سوازيلاند', 'Swaziland', NULL, NULL, NULL, '268', NULL, '0', '1', NULL, NULL, '2021-11-06 02:06:57'),
(211, 'السويد', 'Sweden', NULL, NULL, NULL, '46', NULL, '0', '1', NULL, NULL, '2021-11-06 02:07:16'),
(212, 'سويسرا', 'Switzerland', NULL, NULL, NULL, '41', NULL, '0', '1', NULL, NULL, '2021-11-06 02:07:31'),
(213, 'سوريا', 'Syria', NULL, NULL, NULL, '963', NULL, '0', '1', NULL, NULL, '2021-11-06 02:07:43'),
(214, 'تايوان', 'Taiwan', NULL, NULL, NULL, '886', NULL, '0', '1', NULL, NULL, '2021-11-06 02:07:56'),
(215, 'طاجكستان', 'Tajikistan', NULL, NULL, NULL, '992', NULL, '0', '1', NULL, NULL, '2021-11-06 02:08:08'),
(216, 'تنزانيا', 'Tanzania', NULL, NULL, NULL, '255', NULL, '0', '1', NULL, NULL, '2021-11-06 02:08:19'),
(217, 'تايلاند', 'Thailand', NULL, NULL, NULL, '66', NULL, '0', '1', NULL, NULL, '2021-11-06 02:08:29'),
(218, 'توجو', 'Togo', NULL, NULL, NULL, '228', NULL, '0', '1', NULL, NULL, '2021-11-06 02:08:40'),
(219, NULL, 'Tokelau', NULL, NULL, NULL, '690', NULL, '0', '1', '2021-11-06 02:09:13', NULL, '2021-11-06 02:09:13'),
(220, 'تونجا', 'Tonga', NULL, NULL, NULL, '676', NULL, '0', '1', NULL, NULL, '2021-11-06 02:09:22'),
(221, 'ترينداد وتوباغو', 'Trinidad And Tobago', NULL, NULL, NULL, '1868', NULL, '0', '1', NULL, NULL, '2021-11-06 02:09:47'),
(222, 'تونس', 'Tunisia', NULL, NULL, NULL, '216', NULL, '0', '1', NULL, NULL, '2021-11-06 02:09:57'),
(223, 'تركيا', 'Turkey', NULL, NULL, NULL, '90', NULL, '0', '1', NULL, NULL, '2021-11-06 02:10:10'),
(224, 'تركمانستان', 'Turkmenistan', NULL, NULL, NULL, '7370', NULL, '0', '1', NULL, NULL, '2021-11-06 02:10:26'),
(225, NULL, 'Turks And Caicos Islands', NULL, NULL, NULL, '1649', NULL, '0', '1', '2021-11-06 02:10:40', NULL, '2021-11-06 02:10:40'),
(226, 'توفالو', 'Tuvalu', NULL, NULL, NULL, '688', NULL, '0', '1', NULL, NULL, '2021-11-06 02:10:50'),
(227, 'اوغندا', 'Uganda', NULL, NULL, NULL, '256', NULL, '0', '1', NULL, NULL, '2021-11-06 02:11:04'),
(228, 'اوكرانيا', 'Ukraine', NULL, NULL, NULL, '380', NULL, '0', '1', NULL, NULL, '2021-11-06 02:11:16'),
(229, 'الامارات العربية المتحدة', 'United Arab Emirates', NULL, NULL, NULL, '971', NULL, '0', '1', NULL, NULL, '2021-11-06 02:11:30'),
(230, 'المملكة المتحدة', 'United Kingdom', NULL, NULL, NULL, '44', NULL, '0', '1', NULL, NULL, '2021-11-06 02:11:47'),
(231, 'الولايات المتحدة الامريكية', 'United States', NULL, NULL, NULL, '1', NULL, '0', '1', NULL, NULL, '2021-11-06 02:12:06'),
(232, NULL, 'United States Minor Outlying Islands', NULL, NULL, NULL, '1', NULL, '0', '1', '2021-11-06 02:12:26', NULL, '2021-11-06 02:12:26'),
(233, 'اورجواى', 'Uruguay', NULL, NULL, NULL, '598', NULL, '0', '1', NULL, NULL, '2021-11-06 02:12:36'),
(234, 'اوزباكستان', 'Uzbekistan', NULL, NULL, NULL, '998', NULL, '0', '1', NULL, NULL, '2021-11-06 02:12:48'),
(235, 'فانواتو', 'Vanuatu', NULL, NULL, NULL, '678', NULL, '0', '1', NULL, NULL, '2021-11-06 02:13:06'),
(236, 'الفاتيكان', 'Vatican City State (Holy See)', NULL, NULL, NULL, '39', NULL, '0', '1', NULL, NULL, '2021-11-06 02:13:20'),
(237, 'فنزويلا', 'Venezuela', NULL, NULL, NULL, '58', NULL, '0', '1', NULL, NULL, '2021-11-06 02:13:30'),
(238, 'فيتنام', 'Vietnam', NULL, NULL, NULL, '84', NULL, '0', '1', NULL, NULL, '2021-11-06 02:13:42'),
(239, NULL, 'Virgin Islands (British)', NULL, NULL, NULL, '1284', NULL, '0', '1', '2021-11-06 02:14:39', NULL, '2021-11-06 02:14:39'),
(240, NULL, 'Virgin Islands (US)', NULL, NULL, NULL, '1340', NULL, '0', '1', '2021-11-06 02:14:45', NULL, '2021-11-06 02:14:45'),
(241, NULL, 'Wallis And Futuna Islands', NULL, NULL, NULL, '681', NULL, '0', '1', '2021-11-06 02:14:53', NULL, '2021-11-06 02:14:53'),
(242, NULL, 'Western Sahara', NULL, NULL, NULL, '212', NULL, '0', '1', '2021-11-06 02:14:59', NULL, '2021-11-06 02:14:59'),
(243, 'اليمن', 'Yemen', NULL, NULL, NULL, '967', NULL, '0', '1', NULL, NULL, '2021-11-06 02:13:59'),
(244, 'يوغوسلافيا', 'Yugoslavia', NULL, NULL, NULL, '38', NULL, '0', '1', NULL, NULL, '2021-11-06 02:14:09'),
(245, 'زامبيا', 'Zambia', NULL, NULL, NULL, '260', NULL, '0', '1', NULL, NULL, '2021-11-06 02:14:18'),
(246, 'زيمبابواي', 'Zimbabwe', NULL, NULL, NULL, '263', NULL, '0', '1', NULL, NULL, '2021-11-06 02:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `daliy_events`
--

CREATE TABLE `daliy_events` (
  `id` int(11) NOT NULL,
  `event_category_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` enum('male','female','both') NOT NULL DEFAULT 'male',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `f_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_whatsApp_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `whatsApp_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT '00:00:00',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `family_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `longitude` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rejection_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daliy_events`
--

INSERT INTO `daliy_events` (`id`, `event_category_id`, `city_id`, `user_id`, `type`, `active`, `f_phone`, `f_whatsApp_number`, `f_address`, `f_latitude`, `f_longitude`, `phone`, `whatsApp_number`, `date`, `time`, `address`, `family_name`, `description_ar`, `description_en`, `longitude`, `latitude`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`, `rejection_reason`) VALUES
(7, 3, 82, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '01111', '2024-10-20', '22:04:00', 'omar', 'omar', 'test', 'test', '31.3349414', '29.9835037', 'test', 'test', 'uploads/categories/1727291321954.jpg', '2024-09-25 17:08:41', '2025-01-15 11:17:25', NULL),
(8, 3, 82, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '01111', '2024-09-25', '22:04:00', 'omar', 'omar', 'test', 'test', '31.3349414', '29.9835037', 'test', 'test', 'uploads/categories/1727291364286.jpg', '2024-09-25 17:09:24', '2024-11-19 17:13:34', 'hfggfgf'),
(9, 3, 82, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '012', '011', '2024-09-25', '22:04:00', 'gg', 'omar', 'test', 'test', '31.3354161', '29.9833752', 'test', 'test', 'uploads/categories/1727291398970.jpg', '2024-09-25 17:09:58', '2024-11-19 18:23:07', 'ssds'),
(10, 3, 82, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '012', '011', '2024-09-25', '22:04:00', 'gg', 'omar', 'test', 'test', '31.3354161', '29.9833752', 'test', 'test', 'uploads/categories/1727291413312.jpg', '2024-09-25 17:10:13', '2024-10-13 15:08:45', NULL),
(11, 2, 85, 57, 'female', 0, '011', '0111', 'test address', '29.9835024', '31.3349431', NULL, NULL, '2024-09-30', '17:25:00', NULL, 'omama', 'ghhhh', 'ghhhh', NULL, NULL, 'testtry', 'testtry', 'uploads/categories/1727293912109.jpg', '2024-09-25 17:51:52', '2024-10-13 15:08:45', NULL),
(12, 2, 85, 57, 'female', 0, '011', '0111', 'test address', '29.9835024', '31.3349431', NULL, NULL, '2024-09-30', '17:25:00', NULL, 'omama', 'ghhhh', 'ghhhh', NULL, NULL, 'testtry', 'testtry', 'uploads/categories/1727294019952.jpg', '2024-09-25 17:53:39', '2024-10-13 15:08:45', NULL),
(13, 3, 52, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '0111', '2024-09-24', '17:44:00', 'test', 'omar', 'test', 'test', '31.335007372289365', '29.983292576320416', 'test', 'test', 'uploads/categories/1727297137553.jpg', '2024-09-25 18:45:37', '2024-10-13 15:08:45', NULL),
(14, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-09-30', '20:39:00', 'العيون ق ١ ش ٦ م ١١', 'القويماني', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', '47.649513', '29.32646200000001', 'افراح الفضلي', 'افراح الفضلي', 'uploads/categories/1727343208816.jpg', '2024-09-26 07:33:28', '2024-10-13 15:08:45', NULL),
(15, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-09-30', '20:39:00', 'العيون ق ١ ش ٦ م ١١', 'القويماني', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', '47.649513', '29.32646200000001', 'افراح الفضلي', 'افراح الفضلي', 'uploads/categories/1727343209286.jpg', '2024-09-26 07:33:29', '2024-10-13 15:08:45', NULL),
(16, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-09-30', '20:39:00', 'العيون ق ١ ش ٦ م ١١', 'القويماني', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', 'يتشرف ابو مزيد\nبحضوركم لحفل زفاف تطبيق ازهلها وهو الاول من نوعه في الخدمة المجمعية في دولة الكويت والخليج العربي', '47.649513', '29.32646200000001', 'افراح الفضلي', 'افراح الفضلي', 'uploads/categories/1727343209815.jpg', '2024-09-26 07:33:29', '2024-10-13 15:08:45', NULL),
(17, 1, 85, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '0111', '2024-09-30', '19:55:00', 'test', 'test', 'test', 'test', '-122.406417', '37.785834', 'test', 'test', 'uploads/categories/1727715391136.jpg', '2024-09-30 14:56:31', '2024-10-13 15:08:45', NULL),
(18, 2, 66, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '0111', '2024-09-30', '19:33:00', 'test', 'vdh', 'gets', 'gets', '31.33502392556667', '29.983514237560055', 'test', 'test', 'uploads/categories/1727715430359.jpg', '2024-09-30 14:57:10', '2024-10-13 15:08:45', NULL),
(19, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-09-30', '19:40:00', 'hhahahaah', 'gg', 'gh', 'gh', '47.73872802497304', '29.34759601524724', 't', 't', 'uploads/categories/1727715925480.jpg', '2024-09-30 15:05:25', '2024-10-13 15:08:45', NULL),
(20, 1, 115, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '66673339', '66673339', '2024-10-04', '19:00:00', 'النعيم قطعة ١ شارع ٨ منزل ٥', 'القحيصان', 'يتشرف حمد القحيصان بدعوتكم لحفل تخرج ابنه عمر', 'يتشرف حمد القحيصان بدعوتكم لحفل تخرج ابنه عمر', '47.699815171328886', '29.331516575926894', 'دعوة عشاء', 'دعوة عشاء', 'uploads/categories/1727896123835.jpg', '2024-10-02 17:08:43', '2024-10-13 15:08:45', NULL),
(21, 2, 116, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '0096597444494', '0096597444494', '2024-10-02', '18:59:00', 'بيتنا', 'الايوب', 'يتشرف الايوب', 'يتشرف الايوب', '47.6751716', '29.336821', 'طلبتك', 'طلبتك', 'uploads/categories/1727896281369.png', '2024-10-02 17:11:21', '2024-10-13 15:08:45', NULL),
(22, 2, 116, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '0096597444494', '0096597444494', '2024-10-02', '18:59:00', 'بيتنا', 'الايوب', 'يتشرف الايوب', 'يتشرف الايوب', '47.6751716', '29.336821', 'طلبتك', 'طلبتك', 'uploads/categories/1727896330512.png', '2024-10-02 17:12:10', '2024-10-13 15:08:45', NULL),
(23, 4, 116, 57, 'both', 0, '1234567890', '1122334467654', 'guvigigigogo', '29.331211061640282', '47.69938588142395', '87654321', '12345678', '2020-09-21', '12:30:00', 'ghf', 'الظفيري', 'نتشرف بدعوتكم', 'نتشرف بدعوتكم', '47.699815171328886', '29.331516575926894', 'حفل تخرج د عمر', 'حفل تخرج د عمر', 'uploads/categories/1727903861673.png', '2024-10-02 19:17:41', '2024-10-13 15:08:45', NULL),
(24, 4, 116, 57, 'both', 0, '1234567890', '1122334467654', 'guvigigigogo', '29.331211061640282', '47.69938588142395', '87654321', '12345678', '2020-09-21', '12:30:00', 'ghf', 'الظفيري', 'نتشرف بدعوتكم', 'نتشرف بدعوتكم', '47.699815171328886', '29.331516575926894', 'حفل تخرج د عمر', 'حفل تخرج د عمر', 'uploads/categories/1727903990120.png', '2024-10-02 19:19:50', '2024-10-13 15:08:45', NULL),
(25, 4, 116, 57, 'both', 0, '1234567890', '1122334467654', 'guvigigigogo', '29.331211061640282', '47.69938588142395', '87654321', '12345678', '2020-09-21', '12:30:00', 'ghf', 'الظفيري', 'نتشرف بدعوتكم', 'نتشرف بدعوتكم', '47.699815171328886', '29.331516575926894', 'حفل تخرج د عمر', 'حفل تخرج د عمر', 'uploads/categories/1727904225936.png', '2024-10-02 19:23:45', '2024-10-13 15:08:45', NULL),
(26, 3, 70, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '011', '0111', '2024-10-07', '20:23:00', 'test', 'gege', 'test', 'test', '31.3349482', '29.9835057', 'tete', 'tete', 'uploads/categories/1728321859184.jpg', '2024-10-07 15:24:19', '2024-10-13 15:08:45', NULL),
(27, 3, 52, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '12345678', '2024-10-07', '20:26:00', 'test', 'twys', 'hehsh', 'hehsh', '31.3351222', '29.9837186', 'teat', 'teat', 'uploads/categories/1728322249225.jpg', '2024-10-07 15:30:49', '2024-10-13 15:08:45', NULL),
(28, 1, 68, 57, 'both', 0, '01142611', '01142611', '4th ring road - block 7', '33.33', '33.33', '01142611', '01142611', '2024-10-10', '19:42:00', '4th ring road - block 8', 'test family', 'test description_en', 'test description_en', '33.33', '33.33', 'test3131 name_en', 'test3131 name_en', 'uploads/categories/1728832244163.png', '2024-10-13 13:10:44', '2024-10-13 18:17:54', NULL),
(29, 1, 42, 57, 'both', 0, '01142611', '01142611', '4th ring road - block 7', '33.33', '33.33', '01142611', '01142611', '2024-10-16', '19:42:12', '4th ring road - block 8', 'test family', 'test description_ar', 'test description_en', '33.33', '33.33', 'test name_ar', 'test name_en', 'uploads/categories/1728833042945.jpg', '2024-10-13 13:24:02', '2025-01-15 11:18:22', NULL),
(30, 1, 42, 57, 'both', 0, '01142611', '01142611', '4th ring road - block 7', '33.33', '33.33', '01142611', '01142611', '2024-10-16', '19:42:12', '4th ring road - block 8', 'test family', 'test description_ar', 'test description_en', '33.33', '33.33', 'test name_ar', 'test name_en', '/tmp/phpzzOz2E', '2024-10-13 13:24:24', '2025-01-15 11:18:31', NULL),
(31, 3, 52, 57, 'both', 0, '011', '01111', 'udud', '29.9833252', '31.3354183', '01qq', '0111', '2024-10-14', '20:01:00', 'tete', 'ggghgg', 'ybhyhyhyh', 'ybhyhyhyh', '31.3354036', '29.9833438', 'hyh', 'hyh', 'uploads/categories/1728839230913.jpg', '2024-10-13 15:07:10', '2024-10-13 15:07:10', NULL),
(32, 3, 52, 57, 'both', 0, '011', '01111', 'udud', '29.9833252', '31.3354183', '01qq', '0111', '2024-10-14', '20:01:00', 'tete', 'ggghgg', 'ybhyhyhyh', 'ybhyhyhyh', '31.3354036', '29.9833438', 'hyh', 'hyh', 'uploads/categories/1728839238281.jpg', '2024-10-13 15:07:18', '2025-01-15 11:17:36', NULL),
(34, 1, 19, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '21:26:00', 'jhahaahaha', 'bzbzn', 'bsjahah', 'bsjahah', '47.98709304094338', '29.385110173413956', 'hahaha', 'hahaha', 'uploads/categories/1728888336519.jpg', '2024-10-14 04:45:36', '2024-10-14 04:45:36', NULL),
(35, 1, 19, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '21:26:00', 'jhahaahaha', 'bzbzn', 'bsjahah', 'bsjahah', '47.98709304094338', '29.385110173413956', 'hahaha', 'hahaha', 'uploads/categories/1728888337468.jpg', '2024-10-14 04:45:37', '2024-10-14 04:45:37', NULL),
(36, 1, 18, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266698', '98273737', '2024-10-15', '09:51:00', 'hahahahahaahsh', 'وين', 'وطنيتين', 'وطنيتين', '47.9871910400645', '29.385220746517973', 'تقنيين', 'تقنيين', 'uploads/categories/1728888817141.jpg', '2024-10-14 04:53:37', '2024-10-14 04:53:37', NULL),
(37, 3, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '01111111', '2024-10-15', '14:44:00', 'hdhd', 'gsgd', 'vsgd', 'vsgd', '31.201979806675762', '30.035489788306908', 'teat', 'teat', 'uploads/categories/1728906351647.jpg', '2024-10-14 09:45:51', '2024-10-14 09:45:51', NULL),
(38, 3, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '01111111', '2024-10-15', '15:30:00', 'test', 'vshdh', 'getst', 'getst', '31.20254205634651', '30.03610939753817', 'gshdh', 'gshdh', 'uploads/categories/1728909106263.jpg', '2024-10-14 10:31:46', '2024-10-14 10:31:46', NULL),
(40, 2, 84, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '12112222', '01111111', '2024-10-15', '15:54:00', 'ttyy', 'fghj', 'ff', 'ff', '31.20237486337885', '30.035426542894115', 'ggg', 'ggg', 'uploads/categories/1728910495262.jpg', '2024-10-14 10:54:55', '2024-10-14 10:54:55', NULL),
(41, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916142316.jpg', '2024-10-14 12:29:02', '2024-10-14 12:29:02', NULL),
(42, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916142912.jpg', '2024-10-14 12:29:02', '2024-10-14 12:29:02', NULL),
(43, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916142213.jpg', '2024-10-14 12:29:02', '2024-10-14 12:29:02', NULL),
(44, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916142368.jpg', '2024-10-14 12:29:02', '2024-10-14 12:29:02', NULL),
(45, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916142422.jpg', '2024-10-14 12:29:02', '2024-10-14 12:29:02', NULL),
(46, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916161488.jpg', '2024-10-14 12:29:21', '2024-10-14 12:29:21', NULL),
(47, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916172533.jpg', '2024-10-14 12:29:32', '2024-10-14 12:29:32', NULL),
(48, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916220457.jpg', '2024-10-14 12:30:20', '2024-10-14 12:30:20', NULL),
(49, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916232846.jpg', '2024-10-14 12:30:32', '2024-10-14 12:30:32', NULL),
(50, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916233529.jpg', '2024-10-14 12:30:33', '2024-10-14 12:30:33', NULL),
(51, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916335719.jpg', '2024-10-14 12:32:15', '2024-10-14 12:32:15', NULL),
(52, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916339826.jpg', '2024-10-14 12:32:19', '2024-10-14 12:32:19', NULL),
(53, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916339698.jpg', '2024-10-14 12:32:19', '2024-10-14 12:32:19', NULL),
(54, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916341947.jpg', '2024-10-14 12:32:21', '2024-10-14 12:32:21', NULL),
(55, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916341749.jpg', '2024-10-14 12:32:21', '2024-10-14 12:32:21', NULL),
(56, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916343265.jpg', '2024-10-14 12:32:23', '2024-10-14 12:32:23', NULL),
(57, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916345168.jpg', '2024-10-14 12:32:25', '2024-10-14 12:32:25', NULL),
(58, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-16', '17:25:00', 'الجهراء', 'الجهراوي', 'نتشرف بحضوركم', 'نتشرف بحضوركم', '47.7434944', '29.3464806', 'عرس الربع', 'عرس الربع', 'uploads/categories/1728916347849.jpg', '2024-10-14 12:32:27', '2024-10-14 12:32:27', NULL),
(59, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916358210.jpg', '2024-10-14 12:32:38', '2024-10-14 12:32:38', NULL),
(60, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01111111', '00111111', '2024-10-15', '17:31:00', 'test', 'tests', 'twtsts', 'twtsts', '31.201879280497952', '30.03548002969169', 'test', 'test', 'uploads/categories/1728916371406.jpg', '2024-10-14 12:32:51', '2024-10-14 12:32:51', NULL),
(61, 3, 49, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '11111111', '01111111', '2024-10-15', '18:33:00', 'test', 'vsgzhz', 'hdhdhd', 'hdhdhd', '31.201921582978315', '30.035484520387612', 'gdhdhd', 'gdhdhd', 'uploads/categories/1728920052893.jpg', '2024-10-14 13:34:12', '2025-01-15 11:17:49', NULL),
(62, 3, 49, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '11111111', '01111111', '2024-10-15', '18:33:00', 'test', 'vsgzhz', 'hdhdhd', 'hdhdhd', '31.201921582978315', '30.035484520387612', 'gdhdhd', 'gdhdhd', 'uploads/categories/1728920059473.jpg', '2024-10-14 13:34:19', '2024-10-14 13:34:19', NULL),
(63, 3, 72, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '14151', '01111', '2024-10-15', '18:45:00', 'teat', 'vdgdh', 'gsgsgd', 'gsgsgd', '31.20196679129411', '30.035416943539992', 'gdhdhd', 'gdhdhd', 'uploads/categories/1728920749575.jpg', '2024-10-14 13:45:49', '2024-10-14 13:45:49', NULL),
(64, 3, 72, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '14151', '01111', '2024-10-15', '18:45:00', 'teat', 'vdgdh', 'gsgsgd', 'gsgsgd', '31.20196679129411', '30.035416943539992', 'gdhdhd', 'gdhdhd', 'uploads/categories/1728920765580.jpg', '2024-10-14 13:46:05', '2024-10-14 13:46:05', NULL),
(65, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-17', '21:18:00', 'alqaser', 'الفضلي', 'مرحبا', 'مرحبا', '47.72618792480467', '29.309787361667045', 'عرس', 'عرس', 'uploads/categories/1728929954658.jpg', '2024-10-14 16:19:14', '2024-10-14 16:19:14', NULL),
(66, 2, 68, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01010', '0111', '2024-10-15', '21:20:00', 'bshsh', 'vzvsvz', 'gsgsgs', 'gsgsgs', '31.33515853443622', '29.983189789659765', 'gshsg', 'gshsg', 'uploads/categories/1728930080819.jpg', '2024-10-14 16:21:20', '2024-10-14 16:21:20', NULL),
(67, 2, 54, 57, 'both', 0, '010101', '010101', 'hdhdhd', '29.98328004632919', '31.335271809690973', 'hdhdhd', '010101', '2024-10-15', '21:21:00', 'hdhdhs', 'bzhsh', 'hshshshs', 'hshshshs', '31.335277829840905', '29.983230553078908', 'vdhdjd', 'vdhdjd', 'uploads/categories/1728930126201.jpg', '2024-10-14 16:22:06', '2024-10-14 16:22:06', NULL),
(68, 2, 71, 57, 'female', 0, '010101', '010101', 'bdhdhd', '29.98317573861117', '31.335045264759355', NULL, NULL, '2024-10-15', '21:54:00', NULL, 'bdbsbz', 'bzbzb', 'bzbzb', NULL, NULL, 'bzbsbz', 'bzbsbz', 'uploads/categories/1728932105687.jpg', '2024-10-14 16:55:05', '2024-10-14 16:55:05', NULL),
(69, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-17', '20:21:00', 'الكويت', 'الفضلي', 'الله حيهم', 'الله حيهم', '47.73787189595972', '29.339731924929527', 'عرس', 'عرس', 'uploads/categories/1728941000301.jpg', '2024-10-14 19:23:20', '2024-10-14 19:23:20', NULL),
(70, 3, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '01010101', '00101010', '2024-10-16', '01:39:00', 'hdhdh', 'gzhshs', 'hdhdhd', 'hdhdhd', '31.334974798471578', '29.983652561875026', 'vshdhd', 'vshdhd', 'uploads/categories/1728945612148.jpg', '2024-10-14 20:40:12', '2024-10-14 20:40:12', NULL),
(71, 2, 71, 57, 'female', 0, '010101', '010101', 'hdhdh', '29.983652561875054', '31.33497479847153', NULL, NULL, '2024-10-16', '01:40:00', NULL, 'bxbzbdh', 'hdhdh', 'hdhdh', NULL, NULL, 'bxbzbdh', 'bxbzbdh', 'uploads/categories/1728945647776.jpg', '2024-10-14 20:40:47', '2024-10-14 20:40:47', NULL),
(72, 2, 70, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '020202', '0101010', '2024-10-16', '01:40:00', 'gshsh', 'bxbzbx', 'bxbzbd', 'bxbzbd', '31.33497480080095', '29.98365255990178', 'bxbzhdh', 'bxbzhdh', 'uploads/categories/1728945681658.jpg', '2024-10-14 20:41:21', '2024-10-14 20:41:21', NULL),
(73, 3, 70, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '020202', '010101', '2024-10-16', '01:59:00', 'jsjsj', 'nznznxn', 'nsnznx', 'nsnznx', '31.334974953568487', '29.983652430489844', 'hdjdjdh', 'hdjdjdh', 'uploads/categories/1728946809303.jpg', '2024-10-14 21:00:09', '2024-10-14 21:00:09', NULL),
(74, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-18', '14:48:00', 'العيون', 'الفضلي', 'هلا', 'هلا', '47.988317019128566', '29.384073951821485', 'عرس', 'عرس', 'uploads/categories/1728992985991.jpg', '2024-10-15 09:49:45', '2024-10-15 09:49:45', NULL),
(75, 1, 115, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '66673339', '66673339', '2024-10-17', '22:56:00', 'النعيم ق ١ شارع ٨ منزل ٥', 'القحيصان', 'حياكم العشاء بمناسبة التطبيق', 'حياكم العشاء بمناسبة التطبيق', '47.70057048760317', '29.33172784476731', 'حفل عشاء القحيصان', 'حفل عشاء القحيصان', 'uploads/categories/1729022385378.png', '2024-10-15 17:59:45', '2024-10-15 17:59:45', NULL),
(76, 1, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '35688900', '12356788', '2024-12-12', '07:31:00', 'العمرية', 'العدواني', 'يسترف', 'يسترف', '48.06732479999999', '29.2765468', 'حفل عشاء الجحيدب', 'حفل عشاء الجحيدب', 'uploads/categories/1729068212849.png', '2024-10-16 06:43:32', '2024-10-16 06:43:32', NULL),
(77, 3, 23, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '00111111', '01111111', '2024-10-17', '16:36:00', 'kfkfhksfhkfhds', 'mohamed', 'Omar', 'Omar', '-122.406417', '37.785834', 'Omar wedding', 'Omar wedding', 'uploads/categories/1729111218186.jpg', '2024-10-16 18:40:18', '2024-10-16 18:40:18', NULL),
(78, 1, 18, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-26', '08:41:00', 'شرق', 'السلام', 'هلا', 'هلا', '47.98649594774237', '29.384597793457186', 'السلام', 'السلام', 'uploads/categories/1729146218657.jpg', '2024-10-17 04:23:38', '2024-10-17 04:23:38', NULL),
(79, 1, 114, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '66673339', '66673339', '2024-10-20', '19:30:00', 'النعيم ق١', 'العنزي', 'حياكم على العشاء', 'حياكم على العشاء', '47.70084611654464', '29.33322291814627', 'حفل عشاء', 'حفل عشاء', 'uploads/categories/1729248781428.png', '2024-10-18 08:53:01', '2024-10-18 08:53:01', NULL),
(80, 2, 22, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '50158572', '50158572', '2024-10-20', '21:48:00', 'hhelo', 'hello', 'hello', 'hello', '31.7224338', '30.2481177', 'hello', 'hello', 'uploads/categories/1729277395205.jpg', '2024-10-18 16:49:55', '2024-10-18 16:49:55', NULL),
(81, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-23', '21:50:00', 'الجهراء', 'الجهراء', 'اي شي', 'اي شي', '47.738637648037894', '29.34785231115934', 'عرس', 'عرس', 'uploads/categories/1729536740811.jpg', '2024-10-21 16:52:20', '2024-10-21 16:52:20', NULL),
(82, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-23', '21:50:00', 'الجهراء', 'الجهراء', 'اي شي', 'اي شي', '47.738637648037894', '29.34785231115934', 'عرس', 'عرس', 'uploads/categories/1729536743949.jpg', '2024-10-21 16:52:23', '2024-10-21 16:52:23', NULL),
(83, 1, 113, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-10-25', '21:56:00', 'العيون', 'الجهراء', 'عرس', 'عرس', '47.73895722544644', '29.347249485165097', 'عرس', 'عرس', 'uploads/categories/1729537010841.jpg', '2024-10-21 16:56:50', '2024-10-21 16:56:50', NULL),
(84, 2, 71, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '81111111', '01111111', '2024-10-23', '19:56:00', 'bshdh', 'bxxbbx', 'bdhd', 'bdhd', '31.335293144824952', '29.983220981406692', 'bxbzb', 'bxbzb', 'uploads/categories/1729616208186.jpg', '2024-10-22 14:56:48', '2024-10-22 14:56:48', NULL),
(85, 1, 66, 57, 'male', 0, NULL, NULL, NULL, NULL, NULL, '50158572', '50158572', '2024-10-24', '20:29:00', 'hshshdbdh', 'hello', 'test', 'test', '31.7421563', '30.2815297', 'test1', 'test1', 'uploads/categories/1729618205547.jpg', '2024-10-22 15:30:05', '2024-10-22 15:30:05', NULL),
(86, 1, 13, NULL, 'both', 0, '34343', '343', '343', '343', '343', '34', '343', '2024-11-22', '14:29:00', '3443', 'e2', '343', '343', '434', '343', 'dsd', 'sds', 'uploads/categories/1732048220647.png', '2024-11-19 19:30:20', '2025-01-15 11:18:41', NULL),
(89, 1, 28, 59, 'male', 0, NULL, NULL, NULL, NULL, NULL, '0111', '0111', '2024-12-18', '23:18:00', 'ghjj', 'test', 'bdhd', 'bdhd', '31.335018621830184', '29.983449606374634', 'tetst', 'tetst', 'uploads/categories/1734470372113.jpg', '2024-12-17 20:19:32', '2024-12-17 20:19:32', NULL),
(91, 1, 92, 60, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2024-12-20', '13:06:00', 'العقيلة ق ٧ ش ٦٧ م ١١', 'الفضلي', 'حفل عشاء', 'حفل عشاء', '73.8827201', '10.5381264', 'حفل عشاء', 'حفل عشاء', 'uploads/categories/1734595824703.jpg', '2024-12-19 07:10:24', '2024-12-19 07:10:24', NULL),
(93, 1, 117, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '66673339', '66673339', '2025-01-14', '10:08:00', 'النعيم', 'الات', 'حياكم', 'حياكم', '47.99328034464153', '29.267219206670436', 'حفل زفاف', 'حفل زفاف', 'uploads/categories/1736752413187.jpg', '2025-01-13 06:13:33', '2025-01-13 06:13:33', NULL),
(94, 1, 24, 61, 'male', 0, NULL, NULL, NULL, NULL, NULL, '50158572', '50157582', '2025-01-14', '13:27:00', 'ghgh', 'المسيني', 'تجربة', 'تجربة', '31.74199441382371', '30.281301260188766', 'تجربة', 'تجربة', 'uploads/categories/1736767811909.jpg', '2025-01-13 10:30:11', '2025-01-13 10:30:11', NULL),
(95, 1, 115, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '66673339', '66673339', '2025-01-15', '21:28:00', 'النعيم', 'القحيصان', 'حياكم', 'حياكم', '47.64879887266687', '29.363193347139298', 'عشاء القحيصان', 'عشاء القحيصان', 'uploads/categories/1736793361217.png', '2025-01-13 17:36:01', '2025-01-13 17:51:50', NULL),
(96, 1, 18, 60, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2025-01-15', '21:36:00', 'الجهراء', 'القويماني', 'العشاء حياكم الله', 'العشاء حياكم الله', '47.648793357212995', '29.36304144952742', 'عشاء', 'عشاء', 'uploads/categories/1736793527572.jpg', '2025-01-13 17:38:47', '2025-01-15 11:18:50', NULL),
(97, 1, 18, 60, 'male', 0, NULL, NULL, NULL, NULL, NULL, '97266997', '97266997', '2025-01-15', '21:36:00', 'الجهراء', 'القويماني', 'العشاء حياكم الله', 'العشاء حياكم الله', '47.648793357212995', '29.36304144952742', 'عشاء', 'عشاء', 'uploads/categories/1736793651855.jpg', '2025-01-13 17:40:51', '2025-01-15 11:18:10', NULL),
(100, 3, 115, 58, 'male', 1, NULL, NULL, NULL, NULL, NULL, '50909094', '50909094', '2025-01-16', '18:00:00', 'قاعة الجهراء - سليل الجهراء', 'الخثعاوي', 'يتشرف د. فهد مشاري السعيدي وإخوانه بدعوتكم لحضور حفل زفاف ابنه عبدالرحمن وذلك مساء الخميس ١٦ يناير ٢٠٢٥.', 'يتشرف د. فهد مشاري السعيدي وإخوانه بدعوتكم لحضور حفل زفاف ابنه عبدالرحمن وذلك مساء الخميس ١٦ يناير ٢٠٢٥.', '47.6476722', '29.3636763', 'أفراح الخثعاوي', 'أفراح الخثعاوي', 'uploads/categories/1736953253576.jpg', '2025-01-15 14:00:53', '2025-01-15 14:02:54', NULL),
(101, 3, 113, 58, 'male', 1, NULL, NULL, NULL, NULL, NULL, '55551232', '55885853', '2025-01-16', '18:30:00', 'قاعة الخزامى خلف مرور الجهراء', 'السيحان', 'يتشرف حمود العريفي بدعوتكم لحضور حفل زفاف ابنه محمد في قاعة الخزامى', 'يتشرف حمود العريفي بدعوتكم لحضور حفل زفاف ابنه محمد في قاعة الخزامى', '47.726869471371174', '29.33307763777771', 'حفل زفاف السيحان', 'حفل زفاف السيحان', 'uploads/categories/1736953715491.jpg', '2025-01-15 14:08:35', '2025-01-15 14:12:40', NULL),
(102, 3, 115, 58, 'male', 1, NULL, NULL, NULL, NULL, NULL, '60449044', '65546683', '2025-01-16', '18:08:00', 'قاعة الامتياز في الجهراء', 'الذراعي', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', '47.72620327770709', '29.330845985049656', 'حفل زفاف الذراعي', 'حفل زفاف الذراعي', 'uploads/categories/1736953893512.jpg', '2025-01-15 14:11:33', '2025-01-15 14:12:50', NULL),
(103, 3, 115, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '60449044', '65546683', '2025-01-16', '18:08:00', 'قاعة الامتياز في الجهراء', 'الذراعي', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', '47.72620327770709', '29.330845985049656', 'حفل زفاف الذراعي', 'حفل زفاف الذراعي', 'uploads/categories/1736953900170.jpg', '2025-01-15 14:11:40', '2025-01-15 14:11:40', NULL),
(104, 3, 115, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '60449044', '65546683', '2025-01-16', '18:08:00', 'قاعة الامتياز في الجهراء', 'الذراعي', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', '47.72620327770709', '29.330845985049656', 'حفل زفاف الذراعي', 'حفل زفاف الذراعي', 'uploads/categories/1736953906835.jpg', '2025-01-15 14:11:46', '2025-01-15 14:11:46', NULL),
(105, 3, 115, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '60449044', '65546683', '2025-01-16', '18:08:00', 'قاعة الامتياز في الجهراء', 'الذراعي', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', '47.72620327770709', '29.330845985049656', 'حفل زفاف الذراعي', 'حفل زفاف الذراعي', 'uploads/categories/1736953920547.jpg', '2025-01-15 14:12:00', '2025-01-15 14:12:00', NULL),
(106, 3, 115, 58, 'male', 0, NULL, NULL, NULL, NULL, NULL, '60449044', '65546683', '2025-01-16', '18:08:00', 'قاعة الامتياز في الجهراء', 'الذراعي', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', 'تذكير الليلة حفل زفاف جراح مطلق الذراعي في قاعة الامتياز', '47.72620327770709', '29.330845985049656', 'حفل زفاف الذراعي', 'حفل زفاف الذراعي', 'uploads/categories/1736953924909.jpg', '2025-01-15 14:12:04', '2025-01-15 14:12:04', NULL),
(107, 1, 6, NULL, 'both', 0, '121', '11', '1lo', '5', '5', '5', '5', '2025-03-20', '01:29:00', 'kk', 'jj', 'kkk', 'kkkkk', '5', '5', 'jjjj', 'jjjj', 'uploads/categories/1741908448816.png', '2025-03-13 21:27:28', '2025-03-13 21:27:28', NULL),
(108, 1, 6, NULL, 'both', 0, '121', '11', '1lo', '5', '5', '5', '5', '2025-03-20', '01:29:00', 'kk', 'jj', 'kkk', 'kkkkk', '5', '5', 'jjjj', 'jjjj', 'uploads/categories/1741908485431.png', '2025-03-13 21:28:05', '2025-03-13 21:28:05', NULL),
(109, 1, 6, NULL, 'both', 0, '121', '11', '1lo', '5', '5', '5', '5', '2025-03-20', '01:29:00', 'kk', 'jj', 'kkk', 'kkkkk', '5', '5', 'jjjj', 'jjjj', 'uploads/categories/1741908524544.png', '2025-03-13 21:28:44', '2025-03-13 21:28:44', NULL),
(110, 1, 6, NULL, 'both', 0, '111', '11', '11', '11', '11', '1', '11', '2025-03-20', '01:32:00', '1', 'kk', '111', '11', '1', '1', 'kkk', 'k', 'uploads/categories/1741908582300.jpg', '2025-03-13 21:29:42', '2025-03-13 21:29:42', NULL),
(111, 1, 6, NULL, 'both', 0, '1', '1', '1', '1', '1', '1', '1', '2025-03-18', '01:35:00', '1', 'dwd', '22', '2', '11', '1', 'jj', 'jj', 'uploads/categories/1741908822283.png', '2025-03-13 21:33:42', '2025-03-13 21:33:42', NULL),
(112, 2, 13, NULL, 'both', 0, '11', '11', '1', '1', '1', '1', '1', '2025-03-28', '03:24:00', '1', '1', 'lll', 'lll', '1', '1', '11', '1111', 'uploads/categories/1741915238957.jpg', '2025-03-13 23:20:38', '2025-03-13 23:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `provider_name` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `followers_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`id`, `deleted_date`, `name`, `email`, `bio`, `date_of_birth`, `phone`, `password`, `image`, `device_id`, `provider_id`, `provider_name`, `lang`, `created_at`, `updated_at`, `followers_count`) VALUES
(71, NULL, 'nader', 'nader@sasas.com', NULL, '2003-05-08', '01142645054', '5', 'uploads/profiles/1746389272835.jpg', NULL, NULL, NULL, 'en', '2025-05-04 17:40:07', '2025-05-04 17:40:07', 0),
(72, NULL, 'test', NULL, NULL, NULL, '01142645054564', NULL, NULL, NULL, NULL, NULL, 'ar', '2025-06-10 09:22:41', '2025-06-10 09:22:41', 0),
(101, NULL, 'unknown', NULL, NULL, NULL, '00000000', NULL, NULL, NULL, NULL, NULL, 'ar', '2026-02-17 15:53:14', '2026-02-17 15:53:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `code` varchar(255) NOT NULL,
  `coupons_number` int(11) NOT NULL,
  `used_coupons` int(11) NOT NULL DEFAULT 0,
  `coupons_user_number` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` enum('cash','percentage') NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paymet_type` enum('cash','visa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `active`, `code`, `coupons_number`, `used_coupons`, `coupons_user_number`, `start_date`, `end_date`, `type`, `value`, `created_at`, `updated_at`, `paymet_type`) VALUES
(1, 1, 'omar1', 100, 0, 1, '2024-08-05', '2024-08-30', 'percentage', '30', '2024-08-05 15:50:45', '2025-03-25 23:24:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount_seller`
--

CREATE TABLE `discount_seller` (
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `phone`, `password`, `image`, `device_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Driver 1', 'driver@driver.com', '01234', '$2y$10$VrqyliwjKQbqk28xhW8hPOe9kRah8Z71vnFlLHvfTtY4mxWxFE2Oq', NULL, NULL, 1, '2022-06-12 10:49:19', '2022-08-04 03:37:08'),
(3, 'Driver2', 'driver2@driver.com', '01123', '$2y$10$gD5kw.Kraf3D5tIEEbnYCu6F3Ges6FwP.rmEPaZNlsl7OoNZ8GW3y', NULL, NULL, 1, '2022-07-19 20:40:00', '2022-08-04 03:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`, `order`) VALUES
(2, 'حفل عشاء', 'Dinner', 'uploads/categories/1726474323427.jpg', '2024-07-07 16:15:54', '2025-02-03 18:10:30', 20000),
(3, 'حفل زفاف', 'Marriege', 'uploads/categories/1733901667844.jpg', '2024-07-07 15:41:05', '2025-02-03 18:10:23', 5),
(5, 'jjj', 'jjjj', 'uploads/categories/1738613563537.gif', '2025-02-03 18:12:43', '2025-02-03 18:12:52', 550);

-- --------------------------------------------------------

--
-- Table structure for table `event_cities`
--

CREATE TABLE `event_cities` (
  `event_category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_cities`
--

INSERT INTO `event_cities` (`event_category_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 13, '2024-07-07 16:50:59', '2024-07-07 16:50:59'),
(2, 42, '2024-07-07 16:50:59', '2024-07-07 16:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_ads`
--

CREATE TABLE `favorite_ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `favorite_ads`
--

INSERT INTO `favorite_ads` (`id`, `user_id`, `ad_id`, `created_at`, `updated_at`) VALUES
(4, 68, 1, '2025-04-06 12:45:15', '2025-04-06 12:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_products`
--

CREATE TABLE `favourite_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `favourite_products`
--

INSERT INTO `favourite_products` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 54, 23, '2024-08-05 15:27:48', '2024-08-05 15:27:48'),
(24, 55, 23, '2024-08-05 15:51:28', '2024-08-05 15:51:28'),
(25, 55, 24, '2024-08-05 15:51:32', '2024-08-05 15:51:32'),
(26, 55, 25, '2024-08-05 15:51:36', '2024-08-05 15:51:36'),
(27, 57, 25, '2024-09-11 17:13:25', '2024-09-11 17:13:25'),
(47, 57, 23, '2024-12-11 04:58:21', '2024-12-11 04:58:21'),
(48, 59, 23, '2024-12-17 20:15:19', '2024-12-17 20:15:19'),
(57, 60, 23, '2024-12-20 06:29:21', '2024-12-20 06:29:21'),
(59, 58, 23, '2025-01-15 14:49:37', '2025-01-15 14:49:37'),
(60, 101, 76, '2026-02-16 14:00:53', '2026-02-16 14:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_sellers`
--

CREATE TABLE `favourite_sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `favourite_sellers`
--

INSERT INTO `favourite_sellers` (`id`, `user_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(58, 55, 1, '2024-08-05 15:51:05', '2024-08-05 15:51:05'),
(59, 55, 2, '2024-08-05 15:51:09', '2024-08-05 15:51:09'),
(60, 55, 4, '2024-08-05 15:54:40', '2024-08-05 15:54:40'),
(61, 55, 5, '2024-08-05 15:54:50', '2024-08-05 15:54:50'),
(126, 57, 5, '2024-12-11 05:06:07', '2024-12-11 05:06:07'),
(136, 61, 3, '2024-12-18 21:31:58', '2024-12-18 21:31:58'),
(144, 58, 5, '2025-01-15 14:48:04', '2025-01-15 14:48:04'),
(147, 101, 4, '2026-02-17 06:48:15', '2026-02-17 06:48:15'),
(149, 101, 3, '2026-02-17 11:20:42', '2026-02-17 11:20:42'),
(150, 101, 6, '2026-02-17 15:27:50', '2026-02-17 15:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(1, 67, 68, '2025-04-30 14:20:48', '2025-04-30 14:20:48'),
(9, 7, 76, '2025-07-05 11:29:18', '2025-07-05 11:29:18'),
(13, 75, 76, '2025-09-30 06:44:58', '2025-09-30 06:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `hidden_ads`
--

CREATE TABLE `hidden_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `hidden_ads`
--

INSERT INTO `hidden_ads` (`id`, `user_id`, `ad_id`, `created_at`, `updated_at`) VALUES
(1, 68, 1, '2025-05-12 00:47:37', '2025-05-12 00:47:37'),
(2, 68, 1, '2025-05-12 00:55:20', '2025-05-12 00:55:20'),
(3, 68, 1, '2025-05-12 00:55:58', '2025-05-12 00:55:58'),
(4, 68, 2, '2025-05-12 00:56:51', '2025-05-12 00:56:51'),
(5, 76, 2, '2025-07-05 11:25:06', '2025-07-05 11:25:06'),
(6, 76, 3, '2025-07-14 08:32:58', '2025-07-14 08:32:58'),
(7, 76, 17, '2025-07-14 11:18:57', '2025-07-14 11:18:57'),
(8, 98, 11, '2025-09-25 18:19:27', '2025-09-25 18:19:27'),
(9, 98, 11, '2025-09-25 18:19:28', '2025-09-25 18:19:28'),
(10, 97, 159, '2025-11-05 17:49:18', '2025-11-05 17:49:18'),
(11, 97, 159, '2025-11-05 17:49:20', '2025-11-05 17:49:20'),
(12, 97, 18, '2025-11-09 21:31:38', '2025-11-09 21:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_category`
--

CREATE TABLE `home_page_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_03_19_111223_create_countries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_03_19_132610_create_sections_table', 1),
(12, '2022_03_23_104109_create_consultations_table', 1),
(13, '2022_03_23_111604_create_consultation_details_table', 1),
(14, '2022_03_30_124643_create_about_us_table', 1),
(15, '2022_04_03_112501_create_discounts_table', 1),
(16, '2022_04_04_203647_create_admins_table', 1),
(17, '2022_04_05_145141_create_consultant_sections_table', 1),
(18, '2022_04_13_141021_create_notifications_table', 1),
(19, '2022_05_09_151658_create_packages_table', 1),
(20, '2022_05_10_132149_create_user_discounts_table', 1),
(21, '2022_05_10_141620_create_subscriptions_table', 1),
(22, '2022_06_01_152934_create_categories_table', 1),
(23, '2022_06_01_204518_create_drivers_table', 1),
(24, '2022_06_01_204532_create_sellers_table', 1),
(25, '2022_06_02_001912_create_products_table', 1),
(26, '2022_06_07_102033_create_category_seller_table', 1),
(27, '2022_06_10_134609_create_clients_table', 1),
(28, '2022_06_12_171715_create_product_images_table', 2),
(29, '2022_06_16_123816_create_orders_table', 3),
(30, '2022_06_16_124335_create_order_details_table', 3),
(31, '2022_07_10_112714_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 3),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('1','2','3','4','5') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `user_id`, `seller_id`, `product_id`, `region_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'test', 'ta', 'xcx', 'cxc', NULL, NULL, NULL, NULL, '1', '2024-08-10 10:10:52', '2024-08-10 10:10:52'),
(2, 'test', 'ta', 'xcx', 'cxc', NULL, NULL, NULL, NULL, '1', '2024-08-10 10:11:31', '2024-08-10 10:11:31'),
(3, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:06:53', '2024-10-19 11:06:53'),
(4, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:06:53', '2024-10-19 11:06:53'),
(5, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:06:54', '2024-10-19 11:06:54'),
(6, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:37', '2024-10-19 11:24:37'),
(7, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:37', '2024-10-19 11:24:37'),
(8, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:37', '2024-10-19 11:24:37'),
(9, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:41', '2024-10-19 11:24:41'),
(10, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:41', '2024-10-19 11:24:41'),
(11, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:41', '2024-10-19 11:24:41'),
(12, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:51', '2024-10-19 11:24:51'),
(13, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:51', '2024-10-19 11:24:51'),
(14, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '1', '2024-10-19 11:24:51', '2024-10-19 11:24:51'),
(15, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '2', '2024-10-19 23:00:03', '2024-10-19 23:00:03'),
(16, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '2', '2024-10-19 23:00:13', '2024-10-19 23:00:13'),
(17, 'test', 'test', 'test', 'test', 57, NULL, NULL, NULL, '2', '2024-10-19 23:00:18', '2024-10-19 23:00:18'),
(18, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:10:03', '2024-12-05 14:10:03'),
(19, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:11:16', '2024-12-05 14:11:16'),
(20, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:12:10', '2024-12-05 14:12:10'),
(21, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:12:35', '2024-12-05 14:12:35'),
(22, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:13:13', '2024-12-05 14:13:13'),
(23, 'test', 'test', 'test', 'testtest', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:13:58', '2024-12-05 14:13:58'),
(24, 'test', 'test', 'test', 'testtest', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:14:51', '2024-12-05 14:14:51'),
(25, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:15:08', '2024-12-05 14:15:08'),
(26, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:15:35', '2024-12-05 14:15:35'),
(27, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:16:27', '2024-12-05 14:16:27'),
(28, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:16:46', '2024-12-05 14:16:46'),
(29, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:17:08', '2024-12-05 14:17:08'),
(30, 'sss', 'ss', 'sss', 'sss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:18:05', '2024-12-05 14:18:05'),
(31, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:19:09', '2024-12-05 14:19:09'),
(32, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:19:22', '2024-12-05 14:19:22'),
(33, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:20:01', '2024-12-05 14:20:01'),
(34, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:20:34', '2024-12-05 14:20:34'),
(35, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:21:03', '2024-12-05 14:21:03'),
(36, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:22:45', '2024-12-05 14:22:45'),
(37, 'ss', 'ss', 's', 'ss', NULL, NULL, NULL, NULL, '1', '2024-12-05 14:23:32', '2024-12-05 14:23:32'),
(38, 'fhfhgfdgf', 'ngfhgfgf', 'jljl', 'mjgkjgjhghf', NULL, 6, NULL, 230, '1', '2025-11-06 21:25:59', '2025-11-06 21:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0036c4a841033740864678321340412a587e8158ec5520a47e114529f04c3f370151dbf883a7c95c', 76, 3, 'API Token', '[]', 1, '2025-08-30 13:53:51', '2025-08-30 13:53:55', '2026-08-30 15:53:51'),
('01200cc3b723be04da6d53e4f80d2723721d87888db64593025c93ef97b52109c4861a2efffe979c', 55, 3, 'API Token', '[]', 1, '2024-08-05 14:00:20', '2024-08-05 14:00:20', '2025-08-05 16:00:20'),
('015b4d8f2d1294410669e8977df1a4be05823379488cbbe79f75e4110726d62a73227be07d04aea7', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:00:04', '2025-08-30 14:00:53', '2026-08-30 16:00:04'),
('016aaa6c9621dc3e23a4391d292971b42eb687809b5522f51d224e6298bb8740e2fd0dd98e10a3d0', 7, 3, 'API Token', '[]', 0, '2024-05-12 16:07:25', '2024-05-12 16:07:25', '2025-05-12 19:07:25'),
('033952ace770ef4bea9f4d37c0a76773efac0bd54ef57f28c70126dfaf920327bd0e318b3d1237f8', 59, 3, 'API Token', '[]', 1, '2024-12-12 23:30:26', '2024-12-12 23:30:26', '2025-12-13 00:30:26'),
('034f23e3cdd9f4473f5947e8b96e910d69b3a3fbfd3782c7ceb12142aa6071a1dfbaf8275f9fe410', 33, 3, 'API Token', '[]', 1, '2022-08-29 02:19:12', '2022-08-29 02:19:12', '2023-08-28 19:19:12'),
('03b7094fba533729fc024d18bfeea87536ddcb5090a3379b6ed58a361812dbdf9e2d9bbbddd67b26', 57, 3, 'API Token', '[]', 0, '2024-10-17 04:17:27', '2024-10-17 04:17:27', '2025-10-17 06:17:27'),
('0404353a239ab257e50aa07e5ea4e7bed43a1833f28d41652bc44a39c97958f33661f6c0a80f040e', 1, 3, 'API Token', '[]', 0, '2022-06-12 11:15:58', '2022-06-12 11:15:58', '2023-06-12 13:15:58'),
('042d92490fe82f0c74e087f5afd4e69f1276473096718be68d824e5677c7f2fb5cf5b08bade50b66', 33, 3, 'API Token', '[]', 1, '2022-09-11 03:14:19', '2022-09-11 03:14:19', '2023-09-10 20:14:19'),
('0481f8ec8e55442c329bdee807512128794db18478d49d60b016c3c2d858735d2564e9c6fffa3181', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:45', '2023-12-07 01:42:45', '2024-12-06 18:42:45'),
('04a386b509e0355293aab868d7d213b9af3ea2a1816a3009f3192c1a62e6bbe60a1bcbf305896ea3', 7, 3, 'API Token', '[]', 0, '2024-05-31 17:21:37', '2024-05-31 17:21:37', '2025-05-31 19:21:37'),
('04b698bec17cad190fa1a8a3bd4a673f59d0d1f9422a8fafd7fe9edfe271db265e71ff4f8bdd765e', 43, 3, 'API Token', '[]', 1, '2022-09-11 22:23:54', '2022-09-11 22:23:54', '2023-09-11 15:23:54'),
('04e12d090a3a825f5934cda4c74113200ce8ab568d3275054dc24cc934b1b6c4648415e7921c2808', 33, 3, 'API Token', '[]', 0, '2022-08-04 08:32:55', '2022-08-04 08:32:55', '2023-08-04 01:32:55'),
('050990b2ff9cce7928a78a94255adf98226befa320d55fd8b2474ae0ccac321de1a464ea002181e5', 44, 3, 'API Token', '[]', 1, '2022-11-02 03:29:52', '2022-11-02 03:29:52', '2023-11-01 20:29:52'),
('0537a4bd245c12be7ae88a3603719f12fd6332cf0cdb4a5b0abbb888ef3095482cdb0b8112013859', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:13:00', '2022-08-25 04:13:00', '2023-08-24 21:13:00'),
('0572817295e86287aba72eacd84b96cb3b682eda4f551d5790d730ef5b20d262a608d2e0b1267bbd', 75, 3, 'API Token', '[]', 0, '2025-06-12 06:41:47', '2025-06-12 06:41:47', '2026-06-12 08:41:47'),
('05977f2d2f1d335c454dae73f1f4f5ff62556b835af650a96ec17a9ec06c5ffae1b1bb685bc16b2e', 5, 3, 'API Token', '[]', 0, '2022-06-12 11:26:53', '2022-06-12 11:26:53', '2023-06-12 13:26:53'),
('0603187cb6f91e5c86977e6593b45693a7d6f8416aeda706e84988818c0a39a38382c47e26a41567', 57, 3, 'API Token', '[]', 0, '2024-11-25 15:23:07', '2024-11-25 15:23:07', '2025-11-25 16:23:07'),
('06d4c0221fde030aeea7ef233295423892cb4806f6186ddd6bab786b7e7c4c567f98e9bda5010e3d', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:46:44', '2025-09-23 17:48:15', '2026-09-23 19:46:44'),
('0779ff6b9a1a1cd7e691c77a00cee3693afaa316a5c4f3b64cdb486f0e96675d314f3a2d844c8e4d', 1, 3, 'API Token', '[]', 0, '2022-08-23 00:54:26', '2022-08-23 00:54:26', '2023-08-22 17:54:26'),
('07bfc0868c2b9c5f04e977d1d5345ab47e2b3a08cff7bc3f363f550221f0541b9f69ac0a9b0ca38e', 51, 3, 'API Token', '[]', 1, '2024-07-01 16:38:17', '2024-07-01 16:38:17', '2025-07-01 18:38:17'),
('07c3fb759a9da7bff01c9b06e40e7d4b267bcc1524f998f755c3c6701a4a40a272225132ce657f9d', 60, 3, 'API Token', '[]', 0, '2025-01-13 17:33:29', '2025-01-13 17:33:29', '2026-01-13 18:33:29'),
('080842c156c2f029a28e0850c2f63901e8034e76139441bcba668b94030c5a61ff84431f1905b4b7', 23, 3, 'API Token', '[]', 0, '2022-08-04 05:56:39', '2022-08-04 05:56:39', '2023-08-03 22:56:39'),
('0878e85440cc0f85317f14c96046332e6f39ac60b69a8f2f339406d69aac979f45c0d65d2920af56', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:13:23', '2022-08-25 04:13:23', '2023-08-24 21:13:23'),
('08c801dc906a1a9c09ba8b304af235a5cf1354477d48992047f67cde98368d72ac4edb09065edef2', 55, 3, 'API Token', '[]', 1, '2024-08-01 12:38:16', '2024-08-01 12:38:16', '2025-08-01 14:38:16'),
('08ca9bc5e91639e30622b43050cdd5d15680b1db5188a56dd2ace74f34f2d6bd417e5c86a4ef597e', 57, 3, 'API Token', '[]', 0, '2024-09-18 04:46:17', '2024-09-18 04:46:17', '2025-09-18 06:46:17'),
('0901ce62a704a2e5a19abf87357c4d56501e64216550104700dcb460646c7f4570b9893ee31cd1e6', 33, 3, 'API Token', '[]', 0, '2022-09-11 16:23:37', '2022-09-11 16:23:37', '2023-09-11 09:23:37'),
('095682f39aef88615fbcdff3df23b48017edeedcbd86a1054a8744ba9f1f4cf397d1d09905055516', 63, 3, 'API Token', '[]', 0, '2025-03-23 22:53:46', '2025-03-23 22:53:46', '2026-03-24 00:53:46'),
('0982f3d6e85f3131ecf59ec16d7fcef6cfc61255e2dfbc05da9df161fc62683499d5e9fb59693762', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:13:35', '2025-06-09 09:13:35', '2026-06-09 11:13:35'),
('09f08c604e3197f5b1e1922844f856f8690dd89de50165a37937589ee0a1a6bdda954c10e296dcc7', 7, 3, 'API Token', '[]', 0, '2024-05-19 15:10:03', '2024-05-19 15:10:03', '2025-05-19 18:10:03'),
('0b1f1bc2c6c8579501e46ad8bb729193e2f406abf50ac5e756cd2775bb33d9e05398fa44c7c09420', 97, 3, 'API Token', '[]', 1, '2025-10-23 07:19:49', '2025-10-23 07:27:14', '2026-10-23 09:19:49'),
('0b238d6c41f010586222a2d4f75314f048e233ea5c7761845be58ce4060163c2c95bb654716253ff', 16, 3, 'API Token', '[]', 0, '2022-08-04 05:31:53', '2022-08-04 05:31:53', '2023-08-03 22:31:53'),
('0b257f06e31a9199bfae0987b59a1ea834e2cac1f9418e4c38af866fdd8721f12695e8033b84d031', 74, 3, 'API Token', '[]', 1, '2025-06-10 10:27:20', '2025-06-22 16:14:59', '2026-06-10 12:27:20'),
('0b44725aec7a18e0eedd8e6f9bf402b7b507ac29ddfacf3e13673338095d293031d69ec0ccea858e', 57, 3, 'API Token', '[]', 0, '2024-10-14 12:24:55', '2024-10-14 12:24:55', '2025-10-14 14:24:55'),
('0b87871d71197744bb4d2f4abf9799dead41fc9fae0aa91cf461e76765c59fd6afc58d495bfb9b72', 7, 3, 'API Token', '[]', 0, '2024-05-12 16:09:20', '2024-05-12 16:09:20', '2025-05-12 19:09:20'),
('0c86b672bd156abe0bb1e48b68a6bea9eb870cfbe07f892388b040b4ef56e9acb3e267d064595a99', 55, 3, 'API Token', '[]', 0, '2024-07-16 16:55:27', '2024-07-16 16:55:27', '2025-07-16 18:55:27'),
('0d40fd42d9ac3e4ef9fc35b5b51ae4f96c3111af22ffaa1bfd6cba1fe239385ab5a3965c1f4693b3', 55, 3, 'API Token', '[]', 1, '2024-07-03 17:29:45', '2024-07-03 17:29:45', '2025-07-03 19:29:45'),
('0e2e10cd4bbe33f7159864dbdbc866b157e274913f30c483e7ac0055d314516531fbb6919d890846', 97, 3, 'API Token', '[]', 0, '2025-10-04 08:41:05', '2025-10-04 08:41:05', '2026-10-04 10:41:05'),
('0ea6a3002a59d000b17881abbe7637490d4d90d23146bea71a64da0de846f84b01c8f827f864511b', 20, 3, 'API Token', '[]', 0, '2022-08-04 05:42:24', '2022-08-04 05:42:24', '2023-08-03 22:42:24'),
('0ee71b96a49f4e74c119833f434dfab1aea638e4e0cfb8c5c10f3e194342374b057a5d16a72e6894', 7, 3, 'API Token', '[]', 0, '2024-05-13 16:34:34', '2024-05-13 16:34:34', '2025-05-13 19:34:34'),
('0f4f8dc7e0076a5e1648176d10928faab0928e8a13f81f7507c10cd3b64ec86d8ba7efbe1a7e6097', 76, 3, 'API Token', '[]', 0, '2025-09-22 20:06:57', '2025-09-22 20:06:57', '2026-09-22 22:06:57'),
('0f848dfacb981a70ac9437a08bc97dad86d61da8f2dd44dce906b5c5d25e437b8d27a0de7796f8c7', 60, 3, 'API Token', '[]', 0, '2024-12-20 06:39:44', '2024-12-20 06:39:44', '2025-12-20 07:39:44'),
('0f8955268d28927e5c440f7c87422518a8f564a644adcc6f6d32e9b4489b1a3be75882d5fd7d3cd9', 7, 3, 'API Token', '[]', 0, '2024-05-31 17:39:40', '2024-05-31 17:39:40', '2025-05-31 19:39:40'),
('0f8af674c82bef0b4d82b8f458edff80754fbfd5c65633d836a67f688adfc27626a4087d2ffd0a55', 55, 3, 'API Token', '[]', 0, '2024-07-30 16:48:49', '2024-07-30 16:48:49', '2025-07-30 18:48:49'),
('1068910006aa8d15795937d0e5dec3d71630c17c1cbb6b87a04904e06d8b3a5f78dba007f439ebe8', 55, 3, 'API Token', '[]', 0, '2024-07-30 20:49:16', '2024-07-30 20:49:16', '2025-07-30 22:49:16'),
('1120073edad64814f69972079b216bdc7ce52f163081390cf53082f6334332faecfefdba7eeea41d', 90, 3, 'API Token', '[]', 0, '2025-09-23 15:06:10', '2025-09-23 15:06:10', '2026-09-23 17:06:10'),
('1143f33a46d91ba4740ab159e99b47b97a93135faf693ece099e14b78b16a6dc11f37537159e5e32', 73, 3, 'API Token', '[]', 0, '2025-06-10 09:22:10', '2025-06-10 09:22:10', '2026-06-10 11:22:10'),
('11d17a8bb8fd3b56feb35cc826ed0bff0d1ab099cd497196a7ecc385b1b3303d1b7dd0c4d78eff08', 61, 3, 'API Token', '[]', 1, '2024-12-18 20:13:44', '2024-12-18 20:13:44', '2025-12-18 21:13:44'),
('11f9eda28efbca8e8a95636380dd3ef405d51973b3937910fbcfb1a1d561faedea3c7ac10083def6', 76, 3, 'API Token', '[]', 1, '2025-07-17 10:52:04', '2025-07-17 10:58:30', '2026-07-17 12:52:04'),
('125d1f216e017a40bdb7645080351c15a187011f571babc0950a979cd2e02aad795561dc3d3f7c1f', 33, 3, 'API Token', '[]', 0, '2022-11-16 17:26:13', '2022-11-16 17:26:13', '2023-11-16 10:26:13'),
('12673fc3beba651f7da5997c5f22c6363e8bf5847dcd2d254498c10ebfa31825c853695b0faf9618', 67, 3, 'API Token', '[]', 0, '2025-03-24 01:02:18', '2025-03-24 01:02:19', '2026-03-24 03:02:18'),
('12f2206eac7437532ce683ed51371b5d190d2fa761c193105b660fa24d484e701e3d964eec5736c6', 1, 3, 'API Token', '[]', 0, '2022-08-23 00:57:36', '2022-08-23 00:57:36', '2023-08-22 17:57:36'),
('1320a7ddb2c434a34a93849f578c0f33dee8344e78879df71a69c35f7ef5c26d20328a77acbfe5ec', 58, 3, 'API Token', '[]', 0, '2025-01-13 16:50:58', '2025-01-13 16:50:58', '2026-01-13 17:50:58'),
('1350f6a5bb24e9847616bf1e40d48f40149e0b323f7c283700ff98ee4b95ec7dc6099d341adecfde', 57, 3, 'API Token', '[]', 0, '2024-10-13 17:47:53', '2024-10-13 17:47:53', '2025-10-13 19:47:53'),
('13689fa77a4cfe6d9aa3e3dfb4a9c160c8cfa7123660779cbb567ee3a8076a8579b741f1358125b2', 7, 3, 'API Token', '[]', 0, '2024-06-02 12:14:25', '2024-06-02 12:14:25', '2025-06-02 14:14:25'),
('136c6962a3a4860a4b8836a37f61f1fdf5d3615a56fdb9f1619ac3b83945920357c86317685a81bd', 71, 3, 'API Token', '[]', 0, '2025-05-04 16:50:41', '2025-05-04 16:50:41', '2026-05-04 19:50:41'),
('140f50d184496bc86d281a801248307cbe1daaebadc1ad3836127bcc24c80dc84f4dbdffaaf2081d', 61, 3, 'API Token', '[]', 0, '2024-12-18 14:42:51', '2024-12-18 14:42:51', '2025-12-18 15:42:51'),
('142b22067d0d926272fdcef29a605dc8247ff9dc9eebbe564a6d397a049bdcc6a4292a3a46b3462c', 7, 3, 'API Token', '[]', 0, '2022-07-25 18:14:49', '2022-07-25 18:14:49', '2023-07-25 20:14:49'),
('14eb604788bea23b247bbf2cda707e101c0426978f95eb2d159cde10aae3d8b58b810b415db4810c', 7, 3, 'API Token', '[]', 0, '2024-05-29 12:38:49', '2024-05-29 12:38:49', '2025-05-29 14:38:49'),
('15c6d5f723f1d231acdbaf0c49c779d13854b997ef50f93f77b28e0b4a8aeb4c2da44c0c98897a3d', 57, 3, 'API Token', '[]', 1, '2024-10-02 16:04:06', '2024-10-02 16:04:06', '2025-10-02 18:04:06'),
('15cac4a75d3193d48c02f30d4f4ae9198bb391a65a748262f16ed0e71ec28f8fda2d2b335301e857', 75, 3, 'API Token', '[]', 0, '2025-07-17 12:01:58', '2025-07-17 12:01:58', '2026-07-17 14:01:58'),
('1618ec29cd0c671dfad41cbb0ea9fe42b63a8d6d6eb1b746d6080b4a3f31bbd0afca3feb0a0465d1', 57, 3, 'API Token', '[]', 1, '2024-10-02 16:08:49', '2024-10-02 16:08:49', '2025-10-02 18:08:49'),
('1637e700a1cee8e40f72ddae6f6194d3ddf728c3513390ac573626d94b19c045f948058b1189eeb2', 59, 3, 'API Token', '[]', 0, '2024-12-18 13:09:12', '2024-12-18 13:09:12', '2025-12-18 14:09:12'),
('166d1fdbe553b802187ae3f11086e23ff58d5f8b99385e3378176c9684b9c56c8514a4e8cfa57fae', 33, 3, 'API Token', '[]', 0, '2022-08-17 04:38:49', '2022-08-17 04:38:49', '2023-08-16 21:38:49'),
('16be41a86b87a2486c14cfccb0e3aa3868a9f5f821bd00c1fdc43ba05a5791a0a5c9caae7f39f9b1', 76, 3, 'API Token', '[]', 1, '2025-08-30 13:43:22', '2025-08-30 13:45:51', '2026-08-30 15:43:22'),
('16fba26be54b91f6ee49608f15fc2ddd097774dadd64511c82b142c1a9adaa530d02a1a198b8ca25', 51, 3, 'API Token', '[]', 0, '2024-06-25 19:48:15', '2024-06-25 19:48:15', '2025-06-25 21:48:15'),
('170193509679c4e1084ebaa856d4b20284f631cd06412b93ba7c3b859df4773821f47d443cdba772', 99, 3, 'API Token', '[]', 0, '2025-09-25 22:51:31', '2025-09-25 22:51:31', '2026-09-26 00:51:31'),
('1721204c36a9a03a04c8281d409c2aaf6afb49a1d49606ff35751b36a3f9d2328ed19727bbd820d8', 46, 3, 'API Token', '[]', 0, '2024-05-12 16:19:01', '2024-05-12 16:19:01', '2025-05-12 19:19:01'),
('17810a7092b18e0cb763d54e771a75892a3fce15877cabf89a8e343aaacff94021afb80a34e4be19', 7, 3, 'API Token', '[]', 0, '2022-08-15 00:59:02', '2022-08-15 00:59:02', '2023-08-14 17:59:02'),
('17af945af1ee5b928540a0c574b0469ce3eb4df9c48e583e0e3c5dfb80879e5eb1aa15961d4c1fc1', 57, 3, 'API Token', '[]', 0, '2024-09-17 16:33:00', '2024-09-17 16:33:00', '2025-09-17 18:33:00'),
('182c434462bf2f2040bb74d38772511a956f755fd969ee165116300197054262e332844c98aef7d1', 96, 3, 'API Token', '[]', 0, '2025-09-23 19:55:07', '2025-09-23 19:55:07', '2026-09-23 21:55:07'),
('188101599a8a8e39f363ee05d4fafe1bd21d00a7596de4fb8c84d70ad67206656caf6fa6d563d557', 61, 3, 'API Token', '[]', 0, '2025-01-13 11:31:58', '2025-01-13 11:31:58', '2026-01-13 12:31:58'),
('18c295faf62e1cf9a773a9f319c10f945d722069bfaf1b32ebbaec405ce36aff7b58a2ce07cba49d', 7, 3, 'API Token', '[]', 0, '2022-08-25 03:15:53', '2022-08-25 03:15:53', '2023-08-24 20:15:53'),
('1a4803337cf1e4898537ae2a59bc7f366fbf4552aae3aa85937e47733cafa49cd639416ed37a0340', 55, 3, 'API Token', '[]', 1, '2024-07-30 15:00:17', '2024-07-30 15:00:17', '2025-07-30 17:00:17'),
('1a7a57950148973bd0db55495ea526e9e79e511b147f70a0a43f935c6c6a8e3d01954de46da5acc2', 55, 3, 'API Token', '[]', 1, '2024-08-07 10:21:47', '2024-08-07 10:21:47', '2025-08-07 12:21:47'),
('1aa04fa34b481d3823b58673ebb0dba7a41cbef0929da19dee087feb6076d5992a3363b8250feaac', 76, 3, 'API Token', '[]', 0, '2025-09-10 04:45:17', '2025-09-10 04:45:17', '2026-09-10 06:45:17'),
('1b377df469a95e4ee4036fcd4215ac6a0dc2658ec6aeee138364bf387363f397789764c0dc5097b1', 76, 3, 'API Token', '[]', 1, '2025-09-14 17:10:56', '2025-09-15 14:17:18', '2026-09-14 19:10:56'),
('1be6f39cbd61d42f6fa8939790a1a3b1c5cb3e59f61a029513039882148a187ad07ce31ae70402e5', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:48:45', '2025-09-23 17:49:21', '2026-09-23 19:48:45'),
('1bf4223b4089e4fa547c44f5d2a802859b0c3662d032fff4f9529d4e348c39e7dc58f0c4fc7405ab', 93, 3, 'API Token', '[]', 1, '2025-09-23 17:24:12', '2025-09-23 17:27:36', '2026-09-23 19:24:12'),
('1cbab7129bf81af3a1293e1cf5ebca870590ec2d4e55f6383f9085299f6336473770612ca39a0e69', 5, 3, 'API Token', '[]', 0, '2022-06-12 12:33:27', '2022-06-12 12:33:27', '2023-06-12 14:33:27'),
('1ddf53edb7fcd7dcd958a2845d1b124748c1a42247072d83434e4fa585c64d3445783ce9c1cd1ad3', 55, 3, 'API Token', '[]', 0, '2024-07-15 10:20:37', '2024-07-15 10:20:37', '2025-07-15 12:20:37'),
('1ef62388c4f169bc6d7c883be72ea2f33a372486e2db962a78b16e25a852bd92ae94779d9ff7615e', 33, 3, 'API Token', '[]', 0, '2022-08-24 00:51:26', '2022-08-24 00:51:26', '2023-08-23 17:51:26'),
('1f94db3c09317e58f09ce90a395ae68146bbff5d58de66f58c2204a34e9404bdd58a5723ad5d9aa0', 55, 3, 'API Token', '[]', 0, '2024-07-03 18:45:36', '2024-07-03 18:45:36', '2025-07-03 20:45:36'),
('2042829fb9adae7530c89c1a66d15c81966f6a2bb752f5af15d8e3916d32c302c16e4177925cd739', 7, 3, 'API Token', '[]', 0, '2022-08-17 00:38:44', '2022-08-17 00:38:44', '2023-08-16 17:38:44'),
('20a2f3c640e9e634050cb544161a08476ac0cd6a4d8c26c683494fb2ccfd215ec4514d26a15b849e', 55, 3, 'API Token', '[]', 0, '2024-07-10 07:40:04', '2024-07-10 07:40:04', '2025-07-10 09:40:04'),
('20f96389a03455084ec77201101be59a131ddb054625ec4b7a6a225b1ecbb692d4966c3ef6a245b0', 63, 3, 'API Token', '[]', 0, '2025-03-24 18:10:50', '2025-03-24 18:10:50', '2026-03-24 20:10:50'),
('2204b1be42affc7d6cc3690fad2e10da547e8711c9c5e007d0b0128297549ac88f8411621fea0498', 32, 3, 'API Token', '[]', 1, '2022-08-21 03:04:52', '2022-08-21 03:04:52', '2023-08-20 20:04:52'),
('226973eb52ba29ecd0eae7979e6e06b52726ae98e1ea422ff21a4cd12758782e72bd1ea6e3cff40d', 57, 3, 'API Token', '[]', 0, '2024-09-30 14:40:12', '2024-09-30 14:40:12', '2025-09-30 16:40:12'),
('229b72fc8a49829df5b81d0302ae002c08c1c9b9fe82bf70f82349df68f549596b006aef8c0f020f', 57, 3, 'API Token', '[]', 0, '2024-11-25 15:17:54', '2024-11-25 15:17:54', '2025-11-25 16:17:54'),
('22d5f1514a2a239abaa2a847457b458ec1fb8920a47c450e473e009753ec6b5d7462110268d46482', 75, 3, 'API Token', '[]', 0, '2025-06-23 08:00:33', '2025-06-23 08:00:33', '2026-06-23 10:00:33'),
('231534f216a68a1b9b92e46f4f2b5940af0d317b3ccc86c4df87aeb799511d2809de32c54c88401b', 33, 3, 'API Token', '[]', 1, '2022-08-25 05:07:59', '2022-08-25 05:07:59', '2023-08-24 22:07:59'),
('233fa7abcddd2e4e5c9643c4e9530b4e088c98761319f5267128629d8015f2fd2ce1aaefc5402b39', 57, 3, 'API Token', '[]', 0, '2024-09-17 17:27:39', '2024-09-17 17:27:39', '2025-09-17 19:27:39'),
('238e8289a4684bd4b4e91793a00b34d04ac398082409102855bc59b226de5851e67889d1eb5f299a', 61, 3, 'API Token', '[]', 0, '2024-12-18 22:38:27', '2024-12-18 22:38:27', '2025-12-18 23:38:27'),
('23c0043f5f751dd251fcdce5610bca61fe0ddff3f249f244bd20a5e3de47d121563de434ba41b944', 7, 3, 'API Token', '[]', 1, '2024-05-12 16:47:54', '2024-05-12 16:47:54', '2025-05-12 19:47:54'),
('23d861dc40eb9f3ad311b6f456d896758ed7f5b7db4ce6d33cad233d8a03a67fadfae9fb888836fc', 55, 3, 'API Token', '[]', 0, '2024-08-05 15:15:42', '2024-08-05 15:15:42', '2025-08-05 17:15:42'),
('23ec93f294fc529f78e94217608453aa8b7f7c709d1cc80528a93c9ab0b1e2a280d6c2b3bc83ee18', 5, 3, 'API Token', '[]', 0, '2022-06-12 11:26:03', '2022-06-12 11:26:03', '2023-06-12 13:26:03'),
('247eb5d4c232a125a5c2c06cf005316281e5a7ef9c573160d7bc001fb05d1434aa9da37166b75ee7', 57, 3, 'API Token', '[]', 0, '2024-10-13 13:05:59', '2024-10-13 13:05:59', '2025-10-13 15:05:59'),
('250275adcca64a65bca3860081a4d94eb438a3e942da3071e0e4f78f2382ace7776ba839a49ce7b7', 55, 3, 'API Token', '[]', 0, '2024-07-06 12:22:28', '2024-07-06 12:22:28', '2025-07-06 14:22:28'),
('25c683062a1072c005eb53a90da0ee78882a31eb3fb46f24abc28957f1b6cd262e92e7f22c50359b', 58, 3, 'API Token', '[]', 0, '2025-01-13 17:52:27', '2025-01-13 17:52:27', '2026-01-13 18:52:27'),
('264c5841eba973489e08f25ca17853dc481126c77a2d832d2f6e21af438179d06531bd1572aad8c7', 76, 3, 'API Token', '[]', 0, '2025-08-14 11:44:04', '2025-08-14 11:44:04', '2026-08-14 13:44:04'),
('27007885f5f7e78bb157610a13a0d22d13d57dfadd522589a03e79e7009bf1ce6709b5640ffcc400', 57, 3, 'API Token', '[]', 0, '2024-10-17 05:44:38', '2024-10-17 05:44:38', '2025-10-17 07:44:38'),
('273cd379da04ecc49009f7ed0362704f586493590d33b42b0bd19dc54b913b27bd280a70787e7375', 21, 3, 'API Token', '[]', 0, '2022-08-04 05:49:08', '2022-08-04 05:49:08', '2023-08-03 22:49:08'),
('27a746931ae05a73bfef6493c5e5a94c9f29821a33d509ddce47398716cad9e2b315a09ce4d21ba4', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:52:02', '2023-12-07 01:52:02', '2024-12-06 18:52:02'),
('27d05184fbaa0c20097826f9a35712a155c006e787a40b17ff239fc7bd169b190baab40f6f0d748e', 33, 3, 'API Token', '[]', 1, '2022-09-09 05:18:46', '2022-09-09 05:18:46', '2023-09-08 22:18:46'),
('28934ed7a3a8307a7bf41ac1e26e97966eb742b43fe12d157d5480456f23220912600aa668cf6ca5', 81, 3, 'API Token', '[]', 0, '2025-06-23 07:10:46', '2025-06-23 07:10:46', '2026-06-23 09:10:46'),
('28dd7d0b7f7879e1482565dbffaea412fbb40e5bf96c4c31e00786f4e29f0668fe49940762582e57', 7, 3, 'API Token', '[]', 0, '2022-08-25 03:57:36', '2022-08-25 03:57:36', '2023-08-24 20:57:36'),
('28e9b84af220d87e0cbd158831294e31cff82f33e92666667749e29e5aaf76a34e6f679c030a8c09', 1, 3, 'API Token', '[]', 1, '2022-07-03 17:41:50', '2022-07-03 17:41:50', '2023-07-03 19:41:50'),
('29b294fbac46647252ef4a2785ac9863702e7e824724c80add0a8543c0347ccae1776adc38177cfc', 33, 3, 'API Token', '[]', 0, '2022-11-02 03:32:58', '2022-11-02 03:32:58', '2023-11-01 20:32:58'),
('29db3c6d4fe8fd4d18d08eabee162faf3e1f481414c9d47fce4a461bfd8bf8c76fada3b1870fdff6', 7, 3, 'API Token', '[]', 0, '2024-05-29 13:21:37', '2024-05-29 13:21:37', '2025-05-29 15:21:37'),
('29fd55b189f46258a9183529175d2a947495ef3fb9ff1ccb8c6f87024018f4b95ce505b8eded6a35', 76, 3, 'API Token', '[]', 0, '2025-09-23 15:32:44', '2025-09-23 15:32:44', '2026-09-23 17:32:44'),
('2a342091f1dea40cf49bfa9fcbb43531d38aa188925fb423b8af4ec58b68b100b08ccb6e58743499', 32, 3, 'API Token', '[]', 1, '2022-08-16 22:47:15', '2022-08-16 22:47:15', '2023-08-16 15:47:15'),
('2a7d544d1a7a7385a5996ffa9d0c0809154af9d1937c5b261758dae1fca196b743af6d817411ce2a', 60, 3, 'API Token', '[]', 0, '2024-12-13 04:53:07', '2024-12-13 04:53:07', '2025-12-13 05:53:07'),
('2a973f40ef1fe38a9c699a7098ba5af56b3bd3893af7ae681b75c0b78f4f69c44c6d0758f41f79fa', 76, 3, 'API Token', '[]', 0, '2025-09-07 08:23:32', '2025-09-07 08:23:32', '2026-09-07 10:23:32'),
('2aa0157c549febe0a5e8d8a863b4ef9363015747439809599ee01b3926d3ebbf54c6bbf3f96b5c24', 57, 3, 'API Token', '[]', 0, '2024-10-18 20:10:04', '2024-10-18 20:10:04', '2025-10-18 22:10:04'),
('2b10454576376243af6a96f681a04a22090f0466a206b12de8f3a5e0d5b5b797ab13c88169d2d68c', 76, 3, 'API Token', '[]', 1, '2025-08-17 18:32:40', '2025-08-17 19:09:22', '2026-08-17 20:32:40'),
('2b9617725e820619cfe3beef80c43efee8e7c2202703227dc8895803dd504a0b55876471348f043a', 51, 3, 'API Token', '[]', 0, '2024-07-06 11:40:19', '2024-07-06 11:40:19', '2025-07-06 13:40:19'),
('2d24056ff32d6e8ec6bbb799fed350815e972f32f3f4deb9a27d44c724c721978d8b63ce72174151', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:24:59', '2022-08-25 04:24:59', '2023-08-24 21:24:59'),
('2dade9642b6d122cf4796d605b5b761f5365bf87dbb97211ed70c87321af16eded284171757826a8', 57, 3, 'API Token', '[]', 0, '2024-09-14 19:33:09', '2024-09-14 19:33:09', '2025-09-14 21:33:09'),
('2de6fa122045d671f9f2d3434146019b5c4f74e6f67bb029f52a9c59065bed011aea7723a5a532fc', 43, 3, 'API Token', '[]', 1, '2022-09-13 17:37:02', '2022-09-13 17:37:02', '2023-09-13 10:37:02'),
('2e02d12b83a1bb72a4f48aaebf03f1e5e9c44bcbeb5e75a55297e16dccb216754e7027178e01c6fe', 57, 3, 'API Token', '[]', 0, '2024-12-09 08:49:46', '2024-12-09 08:49:46', '2025-12-09 09:49:46'),
('2eb02bbb7a961cafb6667bf61f4b2f4caea115896120e2912b6b757d5deff0fed0d3ffb3eac5eb27', 77, 3, 'API Token', '[]', 0, '2025-06-23 06:54:54', '2025-06-23 06:54:54', '2026-06-23 08:54:54'),
('2eb8a687c453771a4816ffb2bd12c8f580ad6879cb241a1fc9337939c1e57f9bde04dab7d5a9a87f', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:43:02', '2023-12-07 01:43:02', '2024-12-06 18:43:02'),
('2eeb342098f4bb6ca6cce28336979eba3db8ff3784e4484dd4f65017dd77ad0d94386a787bde6048', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:55:11', '2025-09-23 17:55:46', '2026-09-23 19:55:11'),
('2f1c2e77e65e66f88fa65625ec7d6611dfebab52de19d08e7d014d6fa25e8f3723bb695b573c69d3', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:38:42', '2022-08-04 06:38:42', '2023-08-03 23:38:42'),
('2f265e826729da523070dcd4ba5445b48e9282f7ec915bcff9e71ac2a1ab2ae5faec932646b6cb74', 86, 3, 'API Token', '[]', 0, '2025-11-05 16:45:05', '2025-11-05 16:45:05', '2026-11-05 17:45:05'),
('2f684822fc814c626b127ace047964c6f8782e73f08ed3e0f128ceff2145a8fbe92ed777ec85d4d0', 57, 3, 'API Token', '[]', 0, '2024-12-09 19:25:51', '2024-12-09 19:25:51', '2025-12-09 20:25:51'),
('2f6e3e1286ffbfa41eb21341f1d024b0270ba702cd77c75bf26b90ca2c24a06f685461a626cf0cae', 43, 3, 'API Token', '[]', 0, '2022-09-11 21:56:12', '2022-09-11 21:56:12', '2023-09-11 14:56:12'),
('2f83b0894562f1b93dc273a347e0d0e4293608a22bdbc0ed53bc07f59419876810f57a337b22a78a', 73, 3, 'API Token', '[]', 0, '2025-06-08 09:05:28', '2025-06-08 09:05:29', '2026-06-08 11:05:28'),
('30143cd06757df9f1298f06b6c1ec18959bae845bb7c5704613dc5d9efe243854fa0ca8cddfc6121', 17, 3, 'API Token', '[]', 0, '2022-08-04 05:33:45', '2022-08-04 05:33:45', '2023-08-03 22:33:45'),
('3062632c764ec7f18b35824d0d74533b7b37dba5852169662c890fb654d267c29627ea2d95daf55b', 45, 3, 'API Token', '[]', 0, '2024-04-27 11:59:58', '2024-04-27 11:59:58', '2025-04-27 13:59:58'),
('3066d4b3abaf56f9aa376ee2f53bffee2a4bddcf091db19dc7ea7e76d05b7c6e4b4d710b2891c880', 33, 3, 'API Token', '[]', 0, '2022-09-15 18:27:45', '2022-09-15 18:27:45', '2023-09-15 11:27:45'),
('307ae91efc6bba41ea53630548b6e7fbd938a53c0506247242d37e2b3c701cc111d2f4631c490811', 59, 3, 'API Token', '[]', 0, '2024-12-16 20:32:19', '2024-12-16 20:32:19', '2025-12-16 21:32:19'),
('30d88638a747e7e964a627234a7da67bdd19a58be15c94edb755b759e85ef029f195a4e2b53939a0', 95, 3, 'API Token', '[]', 0, '2025-09-23 19:28:00', '2025-09-23 19:28:00', '2026-09-23 21:28:00'),
('30eb989ca727f714a61d6f1a13429c788e30776542aeda894a2ff8a9cb3f0e92db6a37d982a6cbb3', 62, 3, 'API Token', '[]', 0, '2025-03-23 23:39:08', '2025-03-23 23:39:08', '2026-03-24 01:39:08'),
('30fa9542c1e2c522ad0c4dedf4f33d4dc7a9f809ac9e30c9ba8721913d70c34eaaa0f734d3595286', 57, 3, 'API Token', '[]', 0, '2024-10-14 16:54:22', '2024-10-14 16:54:22', '2025-10-14 18:54:22'),
('314af65b94dd6ab4fb7146eb7e073b2c1ee9953ea7de61eb2511ff911ee0105c8efd24e3c9fd8d44', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:33:41', '2022-08-04 06:33:41', '2023-08-03 23:33:41'),
('32a61b49d4225e939bd7d873b5b0015ba0d5d12f58684a5431b5ed3ca28a9480dfa763895d008ba5', 67, 3, 'API Token', '[]', 0, '2025-03-24 00:51:28', '2025-03-24 00:51:28', '2026-03-24 02:51:28'),
('331b4405f266fb0a7987374d5556ea168738de60479916280f65bac64dfd6d3960fce778b5348fd8', 33, 3, 'API Token', '[]', 0, '2022-08-05 23:38:50', '2022-08-05 23:38:50', '2023-08-05 16:38:50'),
('33ad2b3948cfba57af694092d7800680776693acb2414e2acbf4d3537f46c89d87c53ded97e59d68', 12, 3, 'API Token', '[]', 0, '2022-08-04 05:26:22', '2022-08-04 05:26:22', '2023-08-03 22:26:22'),
('33e7ffbc5243622272c439acdbdaa26a2e5c11f3ea84ac07e5ae942bde414298d7b7f49e4e03bdda', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:30:49', '2025-06-08 18:30:49', '2026-06-08 20:30:49'),
('3409aa179d37cb3daa18328ac8e1804b6123023232392fd7bd356f994f79666805f1f453eaa31604', 75, 3, 'API Token', '[]', 0, '2025-06-27 02:10:54', '2025-06-27 02:10:54', '2026-06-27 04:10:54'),
('343f2d298da01b8e71596ac05897a182b2e22c43c918c428e9e793f9519061f789b289e934d27978', 57, 3, 'API Token', '[]', 0, '2024-09-11 17:16:37', '2024-09-11 17:16:37', '2025-09-11 19:16:37'),
('34419a78c11be14130b81c172f0f62a4fc9e70e96aa25b8f0ecc45125bb34a6cc32c1c9cf4a53186', 7, 3, 'API Token', '[]', 0, '2024-05-12 16:47:21', '2024-05-12 16:47:21', '2025-05-12 19:47:21'),
('3457dd236cc21e839bae04cb3077215e9457248fce268ef818edac0dddc634c6f1f2fc18d3776723', 57, 3, 'API Token', '[]', 0, '2024-10-13 18:17:06', '2024-10-13 18:17:06', '2025-10-13 20:17:06'),
('34bedcf7420f3282f80d43f95884acde2e993740756328eae10d903ece50a72d12bfc8a8e747d1d3', 97, 3, 'API Token', '[]', 0, '2025-11-09 19:36:15', '2025-11-09 19:36:15', '2026-11-09 20:36:15'),
('34d33d3d845eba447f6c9cc6f1f687e07e2ef5269afd206afcfd8df41e60ad8e17f68f635aeac021', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:02:21', '2025-08-30 14:02:25', '2026-08-30 16:02:21'),
('35322428263b30f10bd292407f361a8a9d4060167c65cd07b5e2159c6cbebab6d918c6dd6b90349c', 40, 3, 'API Token', '[]', 0, '2022-08-31 16:23:30', '2022-08-31 16:23:30', '2023-08-31 09:23:30'),
('3613848aeefc5a975dac70c0bb6a219ddc4d20e16434b5d1ed670d095d334fb75d6590878d811569', 24, 3, 'API Token', '[]', 0, '2022-08-04 05:58:42', '2022-08-04 05:58:42', '2023-08-03 22:58:42'),
('362cfb0c44789c9d4176380b0fefe24bbdce7cf12866f46d59d3e7bbf26800e0f77bfcd0f6ef575e', 73, 3, 'API Token', '[]', 0, '2025-06-08 17:22:02', '2025-06-08 17:22:02', '2026-06-08 19:22:02'),
('3644033c982682204e6af0c48ef9f49c9a259302168382d25f39b9e35112157bfb965a0101047020', 43, 3, 'API Token', '[]', 0, '2022-09-11 21:55:48', '2022-09-11 21:55:48', '2023-09-11 14:55:48'),
('36970f997859df1fe2d521c306cb604e4b3a686105b67876e95c2ad161c76044163a467200b9ecd7', 84, 3, 'API Token', '[]', 0, '2025-06-23 08:27:14', '2025-06-23 08:27:14', '2026-06-23 10:27:14'),
('3771a544e4a9fc4c8c920685791f92ab8ce69a1ce03bd50a5f18ad0c2ceeb68ccb19e913139c3954', 33, 3, 'API Token', '[]', 0, '2023-12-07 19:48:35', '2023-12-07 19:48:35', '2024-12-07 12:48:35'),
('3777bd6baf25f37d5f56c8364d2ba5948247a2c362665243a9756cc2ecdf3c09490929ae2e7edb3f', 57, 3, 'API Token', '[]', 0, '2024-12-02 04:10:45', '2024-12-02 04:10:45', '2025-12-02 05:10:45'),
('381aee8e971a7967a3703cf4400e02d865aff7bda3fd52b0cf0e8f3ebe876d34b1cb73f10b2a2659', 29, 3, 'API Token', '[]', 0, '2022-08-04 06:11:23', '2022-08-04 06:11:23', '2023-08-03 23:11:23'),
('381c6e0c35c946b692c0d92e7dbc7d2c78d37edcb56a2ae54fd891e4171c5c126c1b711a39d43790', 57, 3, 'API Token', '[]', 0, '2024-10-15 09:48:41', '2024-10-15 09:48:41', '2025-10-15 11:48:41'),
('38301a0eeacdd1dc6731b564fae49aeaede066d40ff9cde714550b0d5aad88e70d15824fe6dad539', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:03:41', '2025-06-09 10:03:41', '2026-06-09 12:03:41'),
('38d390bcf8954bbefb85c19bf3a5722d59643cbf91d2dca61abe85508dca5bedbfdd024e8299136d', 57, 3, 'API Token', '[]', 1, '2024-09-17 17:26:18', '2024-09-17 17:26:18', '2025-09-17 19:26:18'),
('39585435b677ebf90473e3977b4708a65a94cadae9d8a431439c3014500333a147b759da24c7d7eb', 59, 3, 'API Token', '[]', 1, '2024-12-18 13:15:28', '2024-12-18 13:15:28', '2025-12-18 14:15:28'),
('399bbcbc7f2c614cbcf97f2319156d788397b6b8da9a6f68dd22f547590fa5b68d79c08b19fabd95', 7, 3, 'API Token', '[]', 0, '2024-05-12 16:09:31', '2024-05-12 16:09:31', '2025-05-12 19:09:31'),
('39aa6d2e1639b0fe17c7c648ef3f91aaf9c5e2892c3f22c6517e9c423ca920495e38a247542de326', 40, 3, 'API Token', '[]', 0, '2022-08-29 03:02:18', '2022-08-29 03:02:18', '2023-08-28 20:02:18'),
('3af6539095b56cd78bbcfa1d446055f3da55834ac0c7216a21f2b8340d23eea7b7c00396abf1fefd', 76, 3, 'API Token', '[]', 0, '2025-07-22 11:53:00', '2025-07-22 11:53:00', '2026-07-22 13:53:00'),
('3b41c28e3466c2db530bfd5eff9ea8dd2ca20edc6428526c98db7154f4c4cc5256ee68f070cdb634', 33, 3, 'API Token', '[]', 0, '2022-11-23 23:00:01', '2022-11-23 23:00:01', '2023-11-23 16:00:01'),
('3b5644a5c5bdad39269ef0a725b500a93884b90f83add1bba19f326cb44d0e7b7d7469ef98a9dbd5', 70, 3, 'API Token', '[]', 0, '2025-05-04 16:30:59', '2025-05-04 16:30:59', '2026-05-04 19:30:59'),
('3babb004cc52dd347afaa720b867569f4149f796466ade1ea22fad044899a4cd6c45561f82545373', 73, 3, 'API Token', '[]', 0, '2025-06-08 17:34:30', '2025-06-08 17:34:30', '2026-06-08 19:34:30'),
('3bd62db2f2654d8a02c2b04b90c9a07a564cdf94d76695f1df8e46a3e2a3514d08138ddf8d873309', 51, 3, 'API Token', '[]', 0, '2024-07-08 14:53:47', '2024-07-08 14:53:47', '2025-07-08 16:53:47'),
('3ca12fee66792c0252f443715fec57f60575b5d39ff8bb38af06660a0bf14c41c94c281edfce1496', 32, 3, 'API Token', '[]', 0, '2022-08-04 23:53:49', '2022-08-04 23:53:49', '2023-08-04 16:53:49'),
('3d3dc8baf7e0111f231a5f2badf9a2b657a331a91ab173255647fe24690c385ca1ef069916553b1b', 57, 3, 'API Token', '[]', 1, '2024-10-13 18:15:23', '2024-10-13 18:15:23', '2025-10-13 20:15:23'),
('3d6e31205347fc370c0323d1c962642bdc857c590ffae39ddd6ec250996cbe28952a6b32e64f8a61', 33, 3, 'API Token', '[]', 0, '2022-09-23 00:27:38', '2022-09-23 00:27:38', '2023-09-22 17:27:38'),
('3d87128d6e6da60616bc516e683851c1f505e818318cf6223a1942f3a04c20d433c918e1a5cd8c89', 57, 3, 'API Token', '[]', 0, '2024-12-10 23:20:33', '2024-12-10 23:20:33', '2025-12-11 00:20:33'),
('3da112546efe354d274e2747440c74f22b465a64a90e19020bb82a4b17b66d8c3a03645acc9670a8', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:19:08', '2022-08-25 04:19:08', '2023-08-24 21:19:08'),
('3f46a4caf65474bbaa1f844486cc05fd72e3ecee09db7a57d9180c3762ccc9bb7a9f6ee6321e9748', 33, 3, 'API Token', '[]', 1, '2022-08-17 05:48:01', '2022-08-17 05:48:01', '2023-08-16 22:48:01'),
('410cbde40692133cc0695664bd39764f26b79d2d2bb4a19848e24686295a90505df0ce7b2cf77e74', 76, 3, 'API Token', '[]', 1, '2025-07-05 09:02:55', '2025-07-17 10:48:16', '2026-07-05 11:02:55'),
('417cb37d15ec9704d7197cbf717695983ff62dbaa5240412b34b052cc60f38ec4662921b21bad904', 7, 3, 'API Token', '[]', 1, '2024-06-02 13:33:37', '2024-06-02 13:33:37', '2025-06-02 15:33:37'),
('41d42cf6c18679e9b4092b416b1939535deee3f9a4481d52e4faf3b8988c10c199287ef09cbee075', 57, 3, 'API Token', '[]', 0, '2024-10-02 19:03:32', '2024-10-02 19:03:32', '2025-10-02 21:03:32'),
('41eadb501a04d840d7a917a9e3f5a171ae2d407c581328b03377ce32bab53d879b50176a550e3879', 33, 3, 'API Token', '[]', 0, '2022-09-29 17:56:11', '2022-09-29 17:56:11', '2023-09-29 10:56:11'),
('4228e3cf04a83d1173b9bda54d7192458b9a421a35211bdb198f18b4b8da9ecfe71e0bd78b341517', 97, 3, 'API Token', '[]', 1, '2025-10-22 19:16:39', '2025-10-22 19:54:22', '2026-10-22 21:16:39'),
('42609f5cf59d40958fbc4ca1cc5534a53a8f785611d39938c8cb2890687f75308787b5edeeff4362', 32, 3, 'API Token', '[]', 0, '2022-08-05 22:28:01', '2022-08-05 22:28:01', '2023-08-05 15:28:01'),
('428bf8b026c1db23d3eb931b3f18cff1aadc0490a26748e1e200b14f52f6c737988790cbb362b4ac', 76, 3, 'API Token', '[]', 0, '2025-08-14 11:43:53', '2025-08-14 11:43:53', '2026-08-14 13:43:53'),
('4290dc91e9c6237608ce82f2cd856ead3eb03ec5c6dc05dfb385cbd057e59645d175c9cc8d3a232c', 7, 3, 'API Token', '[]', 0, '2022-07-27 16:58:24', '2022-07-27 16:58:24', '2023-07-27 18:58:24'),
('42cdc0c2ac52a88faf78df179a03311d680845b49c78f9903150362a6b5ff49031fc7b109a73c2c5', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:06:07', '2022-06-12 11:06:07', '2023-06-12 13:06:07'),
('433325154e1f4c6b636ad1d8802c1ed72e3867e746f38b89a9f185d3b686a2cf6f29fe2b28e1d486', 7, 3, 'API Token', '[]', 0, '2022-08-25 02:46:16', '2022-08-25 02:46:16', '2023-08-24 19:46:16'),
('4357e5ced4e654db1613fc9aa79bb8570ebac40d9bd4ac8b345df32c5157e186752373174c61f87d', 57, 3, 'API Token', '[]', 0, '2024-09-30 14:08:32', '2024-09-30 14:08:32', '2025-09-30 16:08:32'),
('440cf84ce5c815be7390fa67fa57da5a39fddfbeea59449ec9b3a742afb1a9c2da5226d0b247c78a', 72, 3, 'API Token', '[]', 0, '2025-05-12 01:26:41', '2025-05-12 01:26:41', '2026-05-12 04:26:41'),
('44a584089b010cb63e0f3b60746d578d0d2247d09d3b49389e5d7dae2fb439476c74136edaed85eb', 73, 3, 'API Token', '[]', 0, '2025-06-10 09:22:50', '2025-06-10 09:22:50', '2026-06-10 11:22:50'),
('44ac1eb7bff3ac216a992464a01b6697f2c175ab1237ea713fdc8e14366c1dec348df80bde67635c', 32, 3, 'API Token', '[]', 0, '2022-08-05 00:24:51', '2022-08-05 00:24:51', '2023-08-04 17:24:51'),
('44e16c34624b22986d8164e31722d2bd46ff28d04b1369fef3ade00fbc22de198c7ce6378a2c41f5', 7, 3, 'API Token', '[]', 0, '2022-08-01 19:01:48', '2022-08-01 19:01:48', '2023-08-01 21:01:48'),
('455c806d529767483c748fe3483b937181db4276561715f93c5ba48f83e113d20effe7779fb27c09', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:33:14', '2025-06-08 18:33:14', '2026-06-08 20:33:14'),
('45d88481831f4cfc901ec2e562690b5b0bef9c0b078dca7da91685dfce3e0220747c487b432b85d6', 7, 3, 'API Token', '[]', 0, '2022-07-27 16:59:54', '2022-07-27 16:59:54', '2023-07-27 18:59:54'),
('45e1ac8458e81224fd93dc1f0643f0118575510a2991551586de60e79b297f2cabafbd95cf632f1c', 32, 3, 'API Token', '[]', 0, '2022-08-04 15:14:00', '2022-08-04 15:14:00', '2023-08-04 08:14:00'),
('45f20ea87ed6133dda0120b022c20a9e842718cbebfd82e3f7363001d2420b206d44358de4d48cc1', 61, 3, 'API Token', '[]', 0, '2024-12-18 14:42:42', '2024-12-18 14:42:42', '2025-12-18 15:42:42'),
('45f700c983b92dfa2b3155a10cbfac8c82c3c004cfdaca30059608f68883c78fdaf8fe5d5d06ab38', 57, 3, 'API Token', '[]', 0, '2024-09-30 04:32:02', '2024-09-30 04:32:02', '2025-09-30 06:32:02'),
('464aff289f11d259f11f99c91650a8a16c2c526ae6343a5be6b0453a63e2e93d0cd6aece65f51192', 33, 3, 'API Token', '[]', 0, '2022-09-11 03:31:43', '2022-09-11 03:31:43', '2023-09-10 20:31:43'),
('4654cb4c7eb1d18b8795eb2d8797734b99dbfa05ba078b837c75b482cdc410d6badce9cd5fd57463', 1, 3, 'API Token', '[]', 0, '2022-06-22 16:59:22', '2022-06-22 16:59:22', '2023-06-22 18:59:22'),
('46882bf63183c2583138b4f04316a599c97f3ccab6a47b1438237cd8c7a9b2070845b22e25e65f44', 7, 3, 'API Token', '[]', 0, '2022-07-25 18:46:42', '2022-07-25 18:46:42', '2023-07-25 20:46:42'),
('46eb40ee9f34616b743e34808ec0a1714d87be0e22b4b9691941ee3094b10d3a5601c972dc19baaf', 28, 3, 'API Token', '[]', 0, '2022-08-04 06:09:20', '2022-08-04 06:09:20', '2023-08-03 23:09:20'),
('477352ddbb213bfa940759f26a3260bce0ea4603e70d4d1f9d2736349d113bc4a71191f3cea69084', 57, 3, 'API Token', '[]', 1, '2024-09-14 19:31:14', '2024-09-14 19:31:14', '2025-09-14 21:31:14'),
('47a1c36f9fd59b7cc4ae3f3b81a2367759a728984944f2bf8b14c9f3297b577139ab01ed64425951', 55, 3, 'API Token', '[]', 0, '2024-08-07 10:57:00', '2024-08-07 10:57:00', '2025-08-07 12:57:00'),
('4876026093cd7e68f90a9d1e5adc35ca46d8a174041fb6866279329ac8421fdaf75e2ba21d07aef8', 33, 3, 'API Token', '[]', 0, '2022-09-18 16:34:49', '2022-09-18 16:34:49', '2023-09-18 09:34:49'),
('4a10b5300d0449d91b33ac01ac96c3197feaa9c9d11dd52826c93a2e7bd3c55bb2dbabdf7745f6c1', 26, 3, 'API Token', '[]', 0, '2022-08-04 06:04:55', '2022-08-04 06:04:55', '2023-08-03 23:04:55'),
('4aac3b0b128cc2bfa40a734177e2474ead37e7933124f4af725fcb945c400ce2816ab98494d15277', 33, 3, 'API Token', '[]', 0, '2022-09-18 16:34:49', '2022-09-18 16:34:49', '2023-09-18 09:34:49'),
('4b017dfe49556d4c8a3e2c9749a6043e275e1f0903708f38d7240384d90bde615e422d7b704331f0', 32, 3, 'API Token', '[]', 0, '2022-08-25 03:22:53', '2022-08-25 03:22:53', '2023-08-24 20:22:53'),
('4b025f689b2c77027eec4ab11391dcfef17d08215e067442c9af3ab6f4fa6702c6d560e68128d5f2', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:06:56', '2022-06-12 11:06:56', '2023-06-12 13:06:56'),
('4b441ddda3ea659b15e75df23ea82faa0fd4d5cb55d1b95cb482c8e966ea40e952bffa0edf57cb7b', 33, 3, 'API Token', '[]', 0, '2022-08-17 04:32:35', '2022-08-17 04:32:35', '2023-08-16 21:32:35'),
('4b52d244e0eb2a7e0f46b2b3c5f47bfc0b46748fb1c564ad31ae52b602a339c15e4c6e2b7f1eaaa0', 34, 3, 'API Token', '[]', 0, '2022-08-16 03:03:43', '2022-08-16 03:03:43', '2023-08-15 20:03:43'),
('4b7456d5c895bcd1589081582b5069d60e5ffc7aa47f3029d43d9a28310619572e5375c0d0e2b10b', 43, 3, 'API Token', '[]', 1, '2022-09-13 19:41:06', '2022-09-13 19:41:06', '2023-09-13 12:41:06'),
('4c5377bc29699764222f4ab3b8c6dd60555c76b5ca8b291ae6cb856eb2bc39a9a290f1f524fec6f1', 43, 3, 'API Token', '[]', 0, '2022-09-11 04:34:40', '2022-09-11 04:34:40', '2023-09-10 21:34:40'),
('4cb983c0746cb547ceb1196bddb447827cfe4c8c6d5ab459fadbff514fdbe1968de0fd0603b3b6b3', 76, 3, 'API Token', '[]', 0, '2025-09-12 10:49:37', '2025-09-12 10:49:37', '2026-09-12 12:49:37'),
('4cbc73c92767f4b5f151087a6cdd6a2f6000ff9524f06b16d9b15bfc2ee753c42b672cfb9ad95049', 86, 3, 'API Token', '[]', 0, '2025-11-25 22:13:53', '2025-11-25 22:13:53', '2026-11-25 23:13:53'),
('4d0d74a3e231b2913f6f77dda5c46aa9b93ee942d6574f94ad58703b19b89e77deaa3ead4f8a2200', 98, 3, 'API Token', '[]', 1, '2025-09-25 18:25:57', '2025-09-25 18:26:26', '2026-09-25 20:25:57'),
('4d1433950b7b67f01441daa1d75054ea6d23b8bba98e9adea262b36c44f6b15340e25cf5b8d42d96', 86, 3, 'API Token', '[]', 0, '2025-09-30 10:51:16', '2025-09-30 10:51:16', '2026-09-30 12:51:16'),
('4d197bcc215735fbd0012eaa18c8216b203519c2da7ae740021f2f25fc71c5c3a1041f868a5954f2', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:31:07', '2022-08-04 06:31:07', '2023-08-03 23:31:07'),
('4d4d49d90ae4c7fa650ce5bb2e7ce85f99485da456787227305aad7da18b8bf19f008828e8dfba17', 73, 3, 'API Token', '[]', 0, '2025-06-07 11:25:13', '2025-06-07 11:25:13', '2026-06-07 13:25:13'),
('4d7693aecc9d5c7eaaadca8a7c5ef3cf75d8473a2c7f35e57f9e9c496066c9a6e9a269b6a3cac8c5', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:22:15', '2023-12-07 01:22:15', '2024-12-06 18:22:15'),
('4d96a5dc5b5fd49f9e9929273c500647d211a4fe2302e9d43dcdaf9870ce55aba7303dd42e413ddd', 57, 3, 'API Token', '[]', 1, '2024-09-24 21:35:02', '2024-09-24 21:35:02', '2025-09-24 23:35:02'),
('4da7e881160f8c60bc35da06aeda5105dcbbd0b9dacfda5a767406587ec1634ecaafef6aa9c783ed', 76, 3, 'API Token', '[]', 1, '2025-07-22 11:48:23', '2025-07-22 11:52:32', '2026-07-22 13:48:23'),
('4e1a48d41c17614105a966014f7d57ddec0c15ea47b4698e8cf3e2b7bf2bc5fca1ffdab64516dec9', 7, 3, 'API Token', '[]', 0, '2022-07-25 18:46:17', '2022-07-25 18:46:17', '2023-07-25 20:46:17'),
('4eae29ed8245d78ccde371ff5b49a6c2bda21d51e5d1d13e3b2722f57c1ee1f12421c5cff1b897f1', 55, 3, 'API Token', '[]', 1, '2024-08-01 12:26:54', '2024-08-01 12:26:54', '2025-08-01 14:26:54'),
('4ebd3b08898950d06131ec002ff262ecd0b150b97c082b443f3610e07eb19cc3d55911ccd6fa4bdc', 57, 3, 'API Token', '[]', 0, '2024-10-18 19:07:17', '2024-10-18 19:07:17', '2025-10-18 21:07:17'),
('4ee83438498c5f3d684679ab120d165432ffc1064d889b4ff689e59277583c24bba0b864a9ec59c7', 76, 3, 'API Token', '[]', 0, '2025-08-26 20:56:04', '2025-08-26 20:56:04', '2026-08-26 22:56:04'),
('4f06d769dbf3532a6cbb69e78f3ba8f0afc5e6d0014135885d33d0e8331174a4a92f0efa34278bd6', 53, 3, 'API Token', '[]', 1, '2024-07-01 16:48:36', '2024-07-01 16:48:36', '2025-07-01 18:48:36'),
('4f3312d3d0e636e4a0fb9f1628c3bd97603f46ed5056408adbe1c6dd6f57ced01261635ab17fadce', 57, 3, 'API Token', '[]', 1, '2024-09-17 20:05:06', '2024-09-17 20:05:06', '2025-09-17 22:05:06'),
('50ae83e711ae79fbd7633056d1837db85fba7cf89a88b9abb266ecbd035c3b72a2d3694820670d39', 57, 3, 'API Token', '[]', 0, '2024-10-14 20:59:31', '2024-10-14 20:59:31', '2025-10-14 22:59:31'),
('50fc3037e5480fae185a12129125517f37cf3265abed52838be75e711412dadde4283525c1bf29b3', 60, 3, 'API Token', '[]', 1, '2024-12-20 06:25:29', '2024-12-20 06:25:29', '2025-12-20 07:25:29'),
('5119b7e89b2b3673723be99f746907884fe78e12b1e5d1af20a96b8b42fe5c75d8a5b10a763533f8', 33, 3, 'API Token', '[]', 0, '2023-12-07 19:48:35', '2023-12-07 19:48:35', '2024-12-07 12:48:35'),
('51b9ad782d97815c2ccccf294192a15c1b2fa89d78bff9770a65dfa0a8c6f59907339f8b28afbe4d', 62, 3, 'API Token', '[]', 0, '2025-03-23 23:08:37', '2025-03-23 23:08:37', '2026-03-24 01:08:37'),
('51d3c98630fc0e042dee27313ab916cae6422adf958543cc7127dad59756aa8ce4f768a1357f40c4', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:15:57', '2025-09-23 10:16:39', '2026-08-30 16:15:57'),
('52d31aa4af2830e1ce6c96f38006a16beb70279a5f66993dece2a32ec8e633f161233efdcd27e0c6', 54, 3, 'API Token', '[]', 1, '2024-07-01 19:35:42', '2024-07-01 19:35:42', '2025-07-01 21:35:42'),
('52e2fe8ecebf95ed0c856d01b145de2710e37f110d47535b5d5607c8fc64b1a4d2e3aad64ac6e5df', 33, 3, 'API Token', '[]', 0, '2022-11-30 03:41:53', '2022-11-30 03:41:53', '2023-11-29 20:41:53'),
('53e530e062ab4da1ceb3074b89e7495354fa989208960631df43d87fe172b555245702303edce9e0', 56, 3, 'API Token', '[]', 1, '2024-09-11 06:05:53', '2024-09-11 06:05:53', '2025-09-11 08:05:53'),
('54809d037a60948714a433bf216bde6b5d13ec070b0005e45089123f9c510b7ad83b35136531de8a', 57, 3, 'API Token', '[]', 0, '2024-10-14 16:18:04', '2024-10-14 16:18:04', '2025-10-14 18:18:04'),
('54f38df62a0c32b1485fc3d5548d32d75a92d612a13bf53bccc1b94d3dbd76e3ffb75aa3c4cf42c0', 56, 3, 'API Token', '[]', 0, '2024-08-28 18:25:39', '2024-08-28 18:25:39', '2025-08-28 20:25:39'),
('550bf77a3863e93a71afd69275217b7fc24d295f0b45c48fa554a535c170af9df921a799fc31e51d', 86, 3, 'API Token', '[]', 1, '2025-11-06 12:37:14', '2025-11-06 17:28:31', '2026-11-06 13:37:14'),
('556e19408f9e106ac23899883d0eb1d3216fba4cc0fe18a80bbb0ff72288e93a578195548bb8726b', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:29:14', '2025-06-09 09:29:14', '2026-06-09 11:29:14'),
('55ea01236d46a8e036307ba254149aa480a25cb0f1696750405493ab2f5cdb3b4ddcbfcbd3d37e35', 7, 3, 'API Token', '[]', 0, '2022-08-25 03:56:15', '2022-08-25 03:56:15', '2023-08-24 20:56:15'),
('5620d9dcfcd204d3d31d894dd5d4f723334d9a5f7b06e2a26476c122373b64c76d1eeaf8da8c6193', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:04:16', '2025-08-30 14:06:56', '2026-08-30 16:04:16'),
('56930ec4e3e6e6da047fbe3eec765db22e049ba02e5230c69fbd9fc22988680f185267fff61a86ad', 51, 3, 'API Token', '[]', 0, '2024-06-02 12:50:34', '2024-06-02 12:50:34', '2025-06-02 14:50:34'),
('56aae4500ce5d26444c639143a8fe8ea290dc9c5f8735a8ce2f8260fa04a89c8d1eef57678b40149', 76, 3, 'API Token', '[]', 0, '2025-07-06 07:49:30', '2025-07-06 07:49:30', '2026-07-06 09:49:30'),
('57ba4ad28b6612c77ec630ee5485b745cc7b33b229f54f86f28b01072f3ae72f3c2d280d5f72baa8', 55, 3, 'API Token', '[]', 1, '2024-07-03 18:05:57', '2024-07-03 18:05:57', '2025-07-03 20:05:57'),
('57ccccbc8f6e7dbeb550cebd1be5c5331fd9bb0bb774fbc3603eb7565e8e17f72dc967d318ea00bd', 52, 3, 'API Token', '[]', 0, '2024-06-08 17:48:54', '2024-06-08 17:48:54', '2025-06-08 19:48:54'),
('582d0507e6ce9321ffa113420a8e2c5e4f7c4613cb67163d26d7abd22ecb5b086d959ff0ff09a922', 55, 3, 'API Token', '[]', 1, '2024-07-29 21:01:11', '2024-07-29 21:01:11', '2025-07-29 23:01:11'),
('58621edb7c7c2b666917520b664529d524a80b119f1f630a67b4270b4f9d50e28213c3336f761cb9', 60, 3, 'API Token', '[]', 1, '2025-01-13 16:10:18', '2025-01-13 16:10:18', '2026-01-13 17:10:18'),
('588eb18e8646d80ab40c86e100bd956e3cb16b65854f43d157bf1623d95155ba5a0494bd5759ea8a', 57, 3, 'API Token', '[]', 0, '2024-10-21 16:37:49', '2024-10-21 16:37:49', '2025-10-21 18:37:49'),
('58d98878bdd71c9b8b3a93eb09ec80c651e872ff2f061d658681b17144f0c82ca98d63a2e168ff70', 55, 3, 'API Token', '[]', 0, '2024-07-07 13:30:22', '2024-07-07 13:30:22', '2025-07-07 15:30:22'),
('59c88906772ec5c200aa655411b672a85954c79265f429b2ccae21f18670a94e94e793126f32c714', 33, 3, 'API Token', '[]', 0, '2022-11-09 19:34:55', '2022-11-09 19:34:55', '2023-11-09 12:34:55'),
('59d2583bee38c5fa4e834d173a0fd6f52c1dfed80b57bbbb1e65f63198ffeba5af01a28e5e26679f', 7, 3, 'API Token', '[]', 0, '2022-08-16 22:56:18', '2022-08-16 22:56:18', '2023-08-16 15:56:18'),
('59f019630a9428d0faa7a153a9207a61543203465b8b0b0c8b772e4ba4f6a52a73740f08bb9df790', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:45', '2023-12-07 01:42:45', '2024-12-06 18:42:45'),
('5a85ba4f2f137d0be2e4f85489908788b3bd11233f1f863308a973955101019a0a4a10dd2c519c68', 79, 3, 'API Token', '[]', 0, '2025-06-23 07:03:36', '2025-06-23 07:03:36', '2026-06-23 09:03:36'),
('5ab52f95783aea81c5256ebef88fb5ac4791123c41f6a9c71d0ac93cd7122211175ecc4f5546f517', 43, 3, 'API Token', '[]', 0, '2022-09-29 02:31:39', '2022-09-29 02:31:39', '2023-09-28 19:31:39'),
('5ab9d7f1d400719a93fdae01cb312c9e63a5fc21a996b01fde3f1143883e373b8cec53e89cb1b86b', 52, 3, 'API Token', '[]', 0, '2024-08-28 18:32:03', '2024-08-28 18:32:03', '2025-08-28 20:32:03'),
('5aeaed870282b1777d707704324cfcb6daa4e78ae789b178d6b7a6acc16f22cac4adaa63708fa3bd', 41, 3, 'API Token', '[]', 0, '2022-08-29 23:44:03', '2022-08-29 23:44:03', '2023-08-29 16:44:03'),
('5b19b59c2284480c87117721cb3b3b8f6c2944cc2d2a4495552c244755c090fd5cea1c7e0837c774', 57, 3, 'API Token', '[]', 0, '2024-12-04 21:53:48', '2024-12-04 21:53:48', '2025-12-04 22:53:48'),
('5b93459ade10d9e76d3aa742c35acc995343ba43b5067637b7c3fe2f28de8f44faccd4be7d9e7d38', 72, 3, 'API Token', '[]', 0, '2025-06-07 11:25:32', '2025-06-07 11:25:32', '2026-06-07 13:25:32'),
('5c1c4a8e5a768f8cad732cbb007595fc6a08cb2aa77c6f6cb507efae591053f89aac9ddd91efde61', 97, 3, 'API Token', '[]', 0, '2025-11-09 21:04:47', '2025-11-09 21:04:47', '2026-11-09 22:04:47'),
('5c2f16405dddeec469464e05c20c814ca6f01153e03f2dbaf13693bcccd2386dfea85ef438001c21', 57, 3, 'API Token', '[]', 0, '2024-11-25 15:20:19', '2024-11-25 15:20:19', '2025-11-25 16:20:19'),
('5cda70f26c50227a1bacf3f1b8466766056788557ac44ce8229e2f489fc70845c475337790b82c78', 33, 3, 'API Token', '[]', 0, '2022-09-08 20:37:09', '2022-09-08 20:37:09', '2023-09-08 13:37:09'),
('5d690f73087862008259921f4e5125a5b75852a7896886b0e11e643934a4427438929eaca5e87922', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:27:23', '2022-08-04 06:27:23', '2023-08-03 23:27:23'),
('5df6815be4434ff9e804836e462ecdd4c7fbe14dc1ca8a39e05a4074b62e17d770b306cedd355f9a', 76, 3, 'API Token', '[]', 0, '2025-09-13 11:43:23', '2025-09-13 11:43:23', '2026-09-13 13:43:23'),
('5e2be57580082422afa8adfb35c91e9ff6b5a4d1c9ca651bdb34d2128df73d27feae534953509600', 86, 3, 'API Token', '[]', 0, '2025-10-23 15:56:09', '2025-10-23 15:56:09', '2026-10-23 17:56:09'),
('5f93037d6e1eca31982455bac8169b5ba83438461f38c7c7463b4cc2396dd89e7e6e0f2b020d5491', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:43:01', '2022-08-25 04:43:01', '2023-08-24 21:43:01'),
('5fa140455ac9dd542fe60ad1e2ea9d6f1389c1554432914a81605553ab8d323be4345e2f3b214653', 86, 3, 'API Token', '[]', 1, '2025-11-06 17:34:16', '2025-11-07 20:45:12', '2026-11-06 18:34:16'),
('5fa6b8f25cd320f041f1dba219feaf151947fde12de035315bea329b0d622f22318a370e0b5350ac', 32, 3, 'API Token', '[]', 0, '2022-08-04 07:08:55', '2022-08-04 07:08:55', '2023-08-04 00:08:55'),
('5fcb13e933692e1a6d8d08e509e22bd01936b30e9039240d2f240836f694b0b8e52f314ef5ca519f', 59, 3, 'API Token', '[]', 0, '2024-12-13 01:09:47', '2024-12-13 01:09:47', '2025-12-13 02:09:47'),
('5ff2b0f6815f3d61187ab09e89874c957a42232058a3b253049ee59072832937c94e7cda2349b500', 73, 3, 'API Token', '[]', 0, '2025-06-07 12:49:07', '2025-06-07 12:49:07', '2026-06-07 14:49:07'),
('60b54c65a73eb3c82cf757b3e8898dea7dec16f53aaee24aabf0c04fdf4361ff8c34d6a7cad28ba6', 57, 3, 'API Token', '[]', 0, '2024-09-12 13:08:29', '2024-09-12 13:08:29', '2025-09-12 15:08:29'),
('60db2ece5e731639fc866afb27bd63a48ae6df7d67d29e22de98dc31fed62b0760eaf595cbfbe49b', 57, 3, 'API Token', '[]', 1, '2024-10-21 10:17:30', '2024-10-21 10:17:30', '2025-10-21 12:17:30'),
('60f95151072581dc264d495af9204afe1bb8b39ab8ec48b5d79a2fd7663c831de8c11bdc6709eb69', 43, 3, 'API Token', '[]', 1, '2022-09-23 00:24:20', '2022-09-23 00:24:20', '2023-09-22 17:24:20'),
('61fee12c85b18331e00563744d7357c22ec3f614cd32aed1c5aff8be25d00fe0ec7a8ea113bded30', 33, 3, 'API Token', '[]', 0, '2022-09-29 18:15:41', '2022-09-29 18:15:41', '2023-09-29 11:15:41'),
('62148d848b812a18fc935fc8439b4f74318a303e93eba0ca5613f198e3dcfdf69647e5e2193fb0eb', 33, 3, 'API Token', '[]', 0, '2022-09-29 18:15:41', '2022-09-29 18:15:41', '2023-09-29 11:15:41'),
('62173efb7e2702c40615095a44850b6208e84e04f4aaa0ce35ca607a5da9c68f6971787b6614d303', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:48', '2023-12-07 01:42:48', '2024-12-06 18:42:48'),
('6234753990d7b619b33c89fd733d3f6cc2432c7b1ef6e231e69c9c442ea8d3dfbc98897ad5a2e5f6', 61, 3, 'API Token', '[]', 0, '2024-12-18 15:29:01', '2024-12-18 15:29:01', '2025-12-18 16:29:01'),
('624c715a881c730ce76574f1fb3b79983157e54ba9aea5f0b4977f04c666040fc101b6764dead896', 7, 3, 'API Token', '[]', 0, '2024-05-29 13:16:55', '2024-05-29 13:16:55', '2025-05-29 15:16:55'),
('6269b4b75a3f53c53b3432694abc907c6fc2780267e1890f89dc19e9c51b20427af56530e32ef817', 7, 3, 'API Token', '[]', 0, '2022-08-20 17:25:05', '2022-08-20 17:25:05', '2023-08-20 10:25:05'),
('634b2ce817bbbc1faf800d86b192de74e8760045dd277031f81f84a40aded24410d79957b6c67e09', 101, 3, 'API Token', '[]', 0, '2026-02-14 03:54:14', '2026-02-14 03:54:14', '2027-02-14 04:54:14'),
('63999567d7886565d98c2b301d66faba9c7b2b32c129df47c1b44a9d0c5c9d931a1a4657c2ed1615', 57, 3, 'API Token', '[]', 1, '2024-09-24 21:47:14', '2024-09-24 21:47:14', '2025-09-24 23:47:14');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('63f4102e8239e0dd6c3b9ca3db7ef6b8e3d663d2b784b42c07b20a9fa2c8bdd4c97fd1ad5ecbaf83', 40, 3, 'API Token', '[]', 0, '2022-08-29 23:39:51', '2022-08-29 23:39:51', '2023-08-29 16:39:51'),
('641ec0f4fa481e4ed561a48b51d688abd3b88a1f18109270d788fd9d18d07c98a3dd6967625696f2', 57, 3, 'API Token', '[]', 0, '2024-10-14 12:12:05', '2024-10-14 12:12:05', '2025-10-14 14:12:05'),
('646d8616c50e42c71bdda7c7a97e51ca4278b36f7e77f98ca2a273732fca5727d2f63f73532e747d', 10, 3, 'API Token', '[]', 0, '2022-08-04 05:24:30', '2022-08-04 05:24:30', '2023-08-03 22:24:30'),
('64abf91f4dded8b568147036a94a45b53ee6654354e902c745afe3d33cb15a387b7988435e789fb8', 96, 3, 'API Token', '[]', 1, '2025-09-23 19:56:57', '2025-10-09 00:29:29', '2026-09-23 21:56:57'),
('64bfffaabb8d5312c7c6bb1410f1444057fb3999c3105a78d43954567f90855186a346bedc1b0da8', 57, 3, 'API Token', '[]', 1, '2024-10-16 19:17:32', '2024-10-16 19:17:32', '2025-10-16 21:17:32'),
('651d72da4189fb2f208625c474b74f2bb4a0ddf6e087911cac3d219d0d436da2ca6c125081c5b403', 33, 3, 'API Token', '[]', 0, '2022-11-24 17:15:48', '2022-11-24 17:15:48', '2023-11-24 10:15:48'),
('6531158d0ce72bdf6099cdcf9c4430baa440136f5320f09fa192bd3ba182b6b08e20131e031be40e', 7, 3, 'API Token', '[]', 0, '2024-05-31 17:42:28', '2024-05-31 17:42:28', '2025-05-31 19:42:28'),
('65fd1f79b8bf9b6d461d743940195e0b477148225bafa260dc48f60aa73aaaecd50ae10cd5d1c670', 31, 3, 'API Token', '[]', 0, '2022-08-04 06:14:40', '2022-08-04 06:14:40', '2023-08-03 23:14:40'),
('66a27e1c3dc3ad85aeaea590566938667d340efdcc28ad283f4947b46ba977f99c43853430cc2c01', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:57:02', '2022-08-04 06:57:02', '2023-08-03 23:57:02'),
('66ab810801784a4ad25367f69a274e12862e55dd18c85c49e706111b5b67035b144ef4d79b2bdda2', 55, 3, 'API Token', '[]', 1, '2024-07-08 15:21:38', '2024-07-08 15:21:38', '2025-07-08 17:21:38'),
('66ac7f3b375ea2faefe2d4bdcae7e458d54e4c34c890720f72e267dcc253ab62f9a7beea3674fb65', 101, 3, 'API Token', '[]', 0, '2026-02-14 04:36:27', '2026-02-14 04:36:27', '2027-02-14 05:36:27'),
('66f9b97e03b71a94f2b61137785434b90a7834d45c42b08532c363e2d845871ec0fc4f5941046ed1', 97, 3, 'API Token', '[]', 0, '2025-11-05 15:40:04', '2025-11-05 15:40:04', '2026-11-05 16:40:04'),
('6736fc6549d1d8b9f766908063d0bf41b738d61ebd4432a635e6d29d4e2192f30a64f8c102ae42c5', 59, 3, 'API Token', '[]', 0, '2024-12-18 13:03:39', '2024-12-18 13:03:39', '2025-12-18 14:03:39'),
('6773457b0cc522f91d02afc7a5178b67128f29db6da34258bf3b1b7c7fe28aada7873cec072d0754', 33, 3, 'API Token', '[]', 0, '2022-09-15 18:29:50', '2022-09-15 18:29:50', '2023-09-15 11:29:50'),
('6820fbe888a4939eb5e0c2d41ea6e42d490b39ab73da33bdc2c523231016491563112705f3245798', 97, 3, 'API Token', '[]', 0, '2025-10-08 03:29:24', '2025-10-08 03:29:24', '2026-10-08 05:29:24'),
('683ae42e35ebe0127721236fc401b5b9e79bb902b095e857e8ea2331184720ec22a4b062666d6879', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:42:04', '2022-08-04 06:42:04', '2023-08-03 23:42:04'),
('6856026d91c3931562688cfa984db85c0166a60683f7344ca131e23505351237e6f9934b74659f81', 7, 3, 'API Token', '[]', 0, '2025-02-09 18:28:41', '2025-02-09 18:28:41', '2026-02-09 20:28:41'),
('6856e206fed192a17888d2bbf6df571f5efdd400064820e0f842e62eaf1e351ac27843c8475f9102', 57, 3, 'API Token', '[]', 0, '2024-12-01 22:21:57', '2024-12-01 22:21:57', '2025-12-01 23:21:57'),
('68718103ffedf7ca010cc574e5e85df54a381b57091a17c8ed3da913a8fdc354bcbc17f2e5a58c6b', 59, 3, 'API Token', '[]', 0, '2024-12-12 23:53:22', '2024-12-12 23:53:22', '2025-12-13 00:53:22'),
('68940d7a03a42c83b4350a80bb2f2070a88d61bf9ed46939a7efa17840373beab63d261e99e1bb2d', 62, 3, 'API Token', '[]', 0, '2025-03-23 23:01:53', '2025-03-23 23:01:53', '2026-03-24 01:01:53'),
('68ed3187017985836e7b9b8900ac67b83918e5c9fa53828f9704da2954cab491db4724916f0bb5c1', 55, 3, 'API Token', '[]', 0, '2024-07-09 10:41:37', '2024-07-09 10:41:37', '2025-07-09 12:41:37'),
('694ff79dcdafa8eeff2876d31d00ba9bf83e009f4a2c6428c09a2f8f4f3bc653b3ab7e2ce85c7f57', 74, 3, 'API Token', '[]', 0, '2025-06-10 09:35:28', '2025-06-10 09:35:28', '2026-06-10 11:35:28'),
('6a6922cd55980045469ebeea306d537335972ce0bffb110dfa86a27834f799927c5e37888ebc66fe', 61, 3, 'API Token', '[]', 1, '2024-12-18 19:54:37', '2024-12-18 19:54:37', '2025-12-18 20:54:37'),
('6ac8319f48617f2e37e0dacbb6d9059655d635f412bf9f42632610b220efef7c3af9e200c117dc81', 57, 3, 'API Token', '[]', 0, '2024-09-11 16:53:46', '2024-09-11 16:53:46', '2025-09-11 18:53:46'),
('6b389705a530d444b3e8e38c7f7af1eabdb810d3f1d1ffdaeb8f241c6a674ee1c23c71d09b36710b', 76, 3, 'API Token', '[]', 0, '2025-09-15 23:29:04', '2025-09-15 23:29:04', '2026-09-16 01:29:04'),
('6c27db8e361ec9ef786f372f75e7528eadf95b5c8cd3ef520bead1e80c2cd39d09f3c3459e196e01', 7, 3, 'API Token', '[]', 0, '2022-07-24 19:20:37', '2022-07-24 19:20:37', '2023-07-24 21:20:37'),
('6c848500a5f36297f87929630b07f3133325cff2a3fcf2d55920789af6938abd3289c22194d67a00', 32, 3, 'API Token', '[]', 0, '2022-08-04 23:51:43', '2022-08-04 23:51:43', '2023-08-04 16:51:43'),
('6ccfc6c539b8162b596b88f1412d822b7a940ef52a900df0d6818ef55cbbf5ab5d2c422c792bbd45', 1, 3, 'API Token', '[]', 0, '2022-06-12 11:23:47', '2022-06-12 11:23:47', '2023-06-12 13:23:47'),
('6d274dd43c7ce747ca3ae27047a36cf8b146bc0a15b5dacbbd4428f57a00806f197287916af78c18', 33, 3, 'API Token', '[]', 0, '2022-08-17 04:25:05', '2022-08-17 04:25:05', '2023-08-16 21:25:05'),
('6d278f8025d2725b4432d8edd64ec0b80d0420ff65bf516694bc72c4d24bb12af429ab2e87fec9b9', 32, 3, 'API Token', '[]', 0, '2022-08-04 15:12:56', '2022-08-04 15:12:56', '2023-08-04 08:12:56'),
('6d6c1c235dc5d0436aa18c1bf14c0be4bbf2109a6c80c875f13eb4eb35cb32ac22bc6409755a6c59', 1, 3, 'API Token', '[]', 1, '2022-06-12 11:22:55', '2022-06-12 11:22:55', '2023-06-12 13:22:55'),
('6dcb097f1d64d62b1f580f532cfeafeb02acb82d4aae00dd00a19322db047f44ecc34c81da151296', 14, 3, 'API Token', '[]', 0, '2022-08-04 05:28:58', '2022-08-04 05:28:58', '2023-08-03 22:28:58'),
('6e000e6cb85f5042674be18e18cf2735c1c5cbec88ee89e8c910de5ebff6892131430f0559ab4cf7', 51, 3, 'API Token', '[]', 0, '2024-06-08 17:11:52', '2024-06-08 17:11:52', '2025-06-08 19:11:52'),
('6e093e9c5609951328cc74ddeeec742d130d264b51ab697d4ef816cce38df328cce9d1c391d35731', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:24:08', '2023-12-07 01:24:08', '2024-12-06 18:24:08'),
('6e316763cb51e44d68f51e134eb10fdab09678453ee9419389fe8d5bf02dfd5513a1c6ffec6ce73a', 33, 3, 'API Token', '[]', 0, '2022-09-15 18:29:50', '2022-09-15 18:29:50', '2023-09-15 11:29:50'),
('6e407d0f3b68384cca3b53bdfd57922d0aed75d726fb2099a5fad99aa99a93e2975edd6bb966d2c3', 76, 3, 'API Token', '[]', 0, '2025-08-14 11:43:21', '2025-08-14 11:43:21', '2026-08-14 13:43:21'),
('6ef1357e25d8af40def5253598ac036fca6950f38c11ada51850cea964b3eff6d003943db18d92bf', 57, 3, 'API Token', '[]', 0, '2024-10-14 19:21:47', '2024-10-14 19:21:47', '2025-10-14 21:21:47'),
('6f876fda434d5bfff2ffe507983407ef244398b7a84c2ff7ea20343e226c2cde9c6d31634d4e97c7', 43, 3, 'API Token', '[]', 1, '2022-09-13 19:08:02', '2022-09-13 19:08:02', '2023-09-13 12:08:02'),
('6faddfc96a4b25f3488f4122a1a027769238f0f4f1c5b2effb19b68c0691db9c2876f516058c7387', 55, 3, 'API Token', '[]', 0, '2024-07-29 18:26:05', '2024-07-29 18:26:05', '2025-07-29 20:26:05'),
('703b40b55d78730804489f8146bddfe0ebad95d41bedf6b50a4b5805e5f2eee519611f37dc0cefa9', 33, 3, 'API Token', '[]', 0, '2022-12-01 05:14:43', '2022-12-01 05:14:43', '2023-11-30 22:14:43'),
('7042d26f1dffd7e4f87d75d10ea6de6a8d3f381bcf365d7b2f9aa7746e97cced715e3ee90f0b9441', 57, 3, 'API Token', '[]', 0, '2024-09-29 18:51:03', '2024-09-29 18:51:03', '2025-09-29 20:51:03'),
('704c5d6641a22e0817c6cdee969d1dda4f6a89ce223699b296f555f39b51b7392bdb0d39552a5490', 57, 3, 'API Token', '[]', 0, '2024-12-01 23:47:48', '2024-12-01 23:47:48', '2025-12-02 00:47:48'),
('708a819cadf2ff42edf3cafe6b3f648ec16d804198b394ecf1718ad041d1324f786d8d68f0339263', 7, 3, 'API Token', '[]', 0, '2025-02-09 19:11:52', '2025-02-09 19:11:52', '2026-02-09 21:11:52'),
('70c153152c1b3ee1ad6d690205a8258e003c7edac383ad75edf30347174e022afa2eb2244f8d763a', 57, 3, 'API Token', '[]', 0, '2024-10-17 13:52:12', '2024-10-17 13:52:12', '2025-10-17 15:52:12'),
('70cfb4ceec6012d836439b7d2ac224af8380cb87f1665b586a88604d6fa05b91da00f8fab9e46763', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:34:33', '2025-06-08 18:34:33', '2026-06-08 20:34:33'),
('70f079ad615c08a39ace6a3872d94a35dbc386f23cf2031c8f60f8b20dcacb0a95364a966b057403', 32, 3, 'API Token', '[]', 0, '2022-08-04 07:04:50', '2022-08-04 07:04:50', '2023-08-04 00:04:50'),
('714e86f8cc9bdd0a04a55f1dc81210f4531a51f4f34f1d7d89ee5bf311b6872da6f3fb7676ccfbff', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:37:27', '2025-06-08 18:37:27', '2026-06-08 20:37:27'),
('71835a8a4fa4af3cf1c41be2e95d17d2a9e68e01a487337e499e5d2a9aaa2a56f1f1ef11428c09e2', 1, 3, 'API Token', '[]', 0, '2022-06-12 11:24:28', '2022-06-12 11:24:28', '2023-06-12 13:24:28'),
('71bd2644fcafedd47c5e3e6a4c2012049fae7d893254246ddbf24a7178f48b897533962193755afc', 7, 3, 'API Token', '[]', 0, '2024-05-22 17:15:18', '2024-05-22 17:15:18', '2025-05-22 20:15:18'),
('72151c7736700e9b11550cfd580847d52232b5bb7654644b7b3366d2258c194c2ccd8d20102a424b', 51, 3, 'API Token', '[]', 0, '2024-07-03 08:21:27', '2024-07-03 08:21:27', '2025-07-03 10:21:27'),
('729b858a890b074b52d78ad048270f6335b6f78089fa1f33a56e6d05a2a12919ff321ea3870affc6', 82, 3, 'API Token', '[]', 0, '2025-06-23 08:05:58', '2025-06-23 08:05:58', '2026-06-23 10:05:58'),
('72b2cbbc3761478ee04f84c774a9b81607000234a5a4fd80dd91fadaaf218f3f96167199517026c6', 61, 3, 'API Token', '[]', 1, '2024-12-19 15:01:52', '2024-12-19 15:01:52', '2025-12-19 16:01:52'),
('72fea21b4238c2649f0813bc3e61e8aa9e47fcf1a522c5942b47c4f5b677dfa851ad91739e11c2b8', 97, 3, 'API Token', '[]', 0, '2025-11-26 09:36:27', '2025-11-26 09:36:27', '2026-11-26 10:36:27'),
('732a0b0faea895e734f56346ac76d7b986021597fcd8ab54bec5190d479eed7cef8193159855b42f', 1, 3, 'API Token', '[]', 0, '2022-08-20 17:22:44', '2022-08-20 17:22:44', '2023-08-20 10:22:44'),
('7361bc63b270dddf306f705758bd43f66ef722cbfe49e8a79b5d0059c0df56fcefc5e0721e37959a', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:17:12', '2022-08-04 06:17:12', '2023-08-03 23:17:12'),
('7363104cb71dde0a3352538159f913c708e8f6659137718457f833588def6ca47bcb7cc34ae8ea9f', 42, 3, 'API Token', '[]', 0, '2022-09-03 03:08:21', '2022-09-03 03:08:21', '2023-09-02 20:08:21'),
('7373fde279accc2c75cfbd0d3c8adb626b9c96ca0c4cc534226b8cac4172a8a0670aa7dfeb3384ae', 60, 3, 'API Token', '[]', 1, '2024-12-19 06:47:08', '2024-12-19 06:47:08', '2025-12-19 07:47:08'),
('73bbc562a71090e4206f5eec4d898cf8db984e3edab9eb35af17ae4ecb4be6d88d013ae65934c806', 57, 3, 'API Token', '[]', 0, '2024-09-17 19:19:46', '2024-09-17 19:19:46', '2025-09-17 21:19:46'),
('74535c611ea4666769f1be5ce5b1f6eea5a4e435c91a617e4333d50bba3e3b3d203462086051944c', 57, 3, 'API Token', '[]', 0, '2024-09-18 05:03:52', '2024-09-18 05:03:52', '2025-09-18 07:03:52'),
('745dd69ec2a6c88097baea4703a690c75a29a68d012974597c197a1904e6753fe7efa713914885c0', 1, 3, 'API Token', '[]', 0, '2022-06-12 12:28:55', '2022-06-12 12:28:55', '2023-06-12 14:28:55'),
('74a0cec416eb895f3e99c065f7de37431cb2461f850b309d49f5dcd571ddd145a5f2bc3b95787e2a', 68, 3, 'API Token', '[]', 0, '2025-04-06 12:15:20', '2025-04-06 12:15:20', '2026-04-06 14:15:20'),
('752b79d9792d47280c592a3bf428ea713395ad68d507ea70131dc62122b5fc96171ceb4b6bdeeb50', 55, 3, 'API Token', '[]', 1, '2024-07-03 18:12:09', '2024-07-03 18:12:09', '2025-07-03 20:12:09'),
('75709d4614e0a68f427600b61be22528314043d68558c6892f60fc31aa715d05a901976cab24db61', 57, 3, 'API Token', '[]', 1, '2024-09-17 19:41:15', '2024-09-17 19:41:15', '2025-09-17 21:41:15'),
('7663a34a4aeea0de48a0dc44b2a9facc2006cd3029e80ffb2af74db213beb8990e3dc9582e5b874d', 7, 3, 'API Token', '[]', 0, '2024-05-12 16:19:23', '2024-05-12 16:19:23', '2025-05-12 19:19:23'),
('76698f62eaa86c5cbe7fcfc188d2ee28b5a8ee76ab4835e87465f94c41a3b70b45a89f8575a70f0c', 59, 3, 'API Token', '[]', 0, '2024-12-18 13:27:21', '2024-12-18 13:27:21', '2025-12-18 14:27:21'),
('774e34fa32869988d1412ef1ece4d98f0ae0d70e5dedefa1940f51501856d8c9a5f78669dcdc7b32', 7, 3, 'API Token', '[]', 0, '2022-07-27 17:37:02', '2022-07-27 17:37:02', '2023-07-27 19:37:02'),
('77a17aa068a23ec89473256e3003e6fab136f1d2bc2567d36a6c83c64a95616a5770bb1dd94a3a6a', 7, 3, 'API Token', '[]', 0, '2022-07-27 17:36:34', '2022-07-27 17:36:34', '2023-07-27 19:36:34'),
('77b7809aa5ed95aa3fdff4696a2239af6d3aa32a18188ecf2b2d63a1b30f4758f6703b3fb39986d6', 57, 3, 'API Token', '[]', 0, '2024-09-11 16:53:51', '2024-09-11 16:53:51', '2025-09-11 18:53:51'),
('78163729ca4d70b32706598c68dec1e28b44c0c6e1e63c8ef19a327ec1aaedb146e674fa2d650c89', 64, 3, 'API Token', '[]', 0, '2025-03-23 23:08:26', '2025-03-23 23:08:26', '2026-03-24 01:08:26'),
('7865f1c390746b24319c3541977f4c90656c6c4495c1e2af48ded100320dd575d119534f72a88bdd', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:08:59', '2022-06-12 11:08:59', '2023-06-12 13:08:59'),
('792b59b03d3671aefbb9b6f4efad618cb98576c7959ddcfc20b1b393dd95e5195ba1a1344c6ae951', 33, 3, 'API Token', '[]', 0, '2022-11-24 17:05:23', '2022-11-24 17:05:23', '2023-11-24 10:05:23'),
('7951d64baab007f02dd8da64f9fed44dacc72c6e98e36a02edcc2a8cd9c6987f10b63bc11a9a55b0', 7, 3, 'API Token', '[]', 0, '2022-07-18 17:58:10', '2022-07-18 17:58:10', '2023-07-18 19:58:10'),
('796243079591f8f1c7fd54be091f6ff9275742f83384e3b48197505ccf7d21a6cf20c57298077718', 86, 3, 'API Token', '[]', 0, '2025-11-09 19:35:04', '2025-11-09 19:35:04', '2026-11-09 20:35:04'),
('79c0cc2b314ff5adb63ffdbb2063f326cd41acbcc1ae59e23d91d15cc0c451429896e05f4e752203', 61, 3, 'API Token', '[]', 1, '2025-01-13 11:21:50', '2025-01-13 11:21:50', '2026-01-13 12:21:50'),
('7b6904c5c6acf8d8b69a35d67e570b779ee7cb1ddac6f9279a28b05b88b80f7f84f3750b541879f1', 51, 3, 'API Token', '[]', 0, '2024-07-02 11:48:13', '2024-07-02 11:48:13', '2025-07-02 13:48:13'),
('7c1e6496e60758cc849696a666fdf14cfde664085cb5cdfd69db1dfa91a751d14c202e6ff2bcbd21', 57, 3, 'API Token', '[]', 0, '2024-10-13 13:05:41', '2024-10-13 13:05:41', '2025-10-13 15:05:41'),
('7c96873b8c018deb22151b6ad56622d01a0ed9f3f05e7c5511da1482d2d8d655a81d25ee762bed45', 32, 3, 'API Token', '[]', 0, '2022-08-05 22:40:39', '2022-08-05 22:40:39', '2023-08-05 15:40:39'),
('7c9a5bb8150c7b2ee9f47d2c47d14a36fe1879052e1811835a78ad380ae647e7db92f70bdcbe7219', 57, 3, 'API Token', '[]', 0, '2024-09-11 20:03:38', '2024-09-11 20:03:38', '2025-09-11 22:03:38'),
('7c9e99dae21efc6a11a8a03c4098306a74e1819a299f6caab2c9da24633733794a629960dec1202f', 57, 3, 'API Token', '[]', 0, '2024-09-17 20:02:54', '2024-09-17 20:02:54', '2025-09-17 22:02:54'),
('7cc24726f580ed833b73b0ebdbf32e3cc10ce71ee223a3dddba0cfd77322a4b70eb635bdf1dc5df1', 33, 3, 'API Token', '[]', 0, '2022-09-12 18:32:18', '2022-09-12 18:32:18', '2023-09-12 11:32:18'),
('7cfcdfd2557e7c6b7aa4448200b53a981e0f8d5157efabf3e9d83bb3b2a3c275653b5aeaf97bf3eb', 51, 3, 'API Token', '[]', 1, '2024-07-01 16:34:24', '2024-07-01 16:34:24', '2025-07-01 18:34:24'),
('7d202c7de620b5204cd4e18781c4d053ca9fbb48063d18e5a75f75601f10d73eb63fec89a6feebb1', 40, 3, 'API Token', '[]', 0, '2022-08-31 16:21:07', '2022-08-31 16:21:07', '2023-08-31 09:21:07'),
('7dc1a41e98cab3f3ad951d18633693d0a6309d35c4b200ab7136b0121d70a3bd5ce8fb9c331a5ef1', 57, 3, 'API Token', '[]', 0, '2024-10-18 19:32:08', '2024-10-18 19:32:08', '2025-10-18 21:32:08'),
('7e906d815529feb55e2ee9531f1a43e5c33085424b6cdfb143f07159ec4ac56f519fd26c4be33931', 57, 3, 'API Token', '[]', 0, '2024-10-22 14:54:52', '2024-10-22 14:54:52', '2025-10-22 16:54:52'),
('7f0deecf06a2d694bbe402d885a2b183a8483923961c0fb8873ea52b53ec708fcda4686597e4e859', 43, 3, 'API Token', '[]', 0, '2022-09-22 23:12:58', '2022-09-22 23:12:58', '2023-09-22 16:12:58'),
('7f2cbeaf0969fd89f4c5993e34e40bc239632e3d4a456a7972a7089fcf02fc6eded632a18c1a23a0', 75, 3, 'API Token', '[]', 0, '2025-06-23 06:01:39', '2025-06-23 06:01:39', '2026-06-23 08:01:39'),
('7f6a3405a3c9dcb9f784b5232c12287e8c1593e66b486abdf8f6c52cd63d5e1d1fb30e066e558f0b', 33, 3, 'API Token', '[]', 0, '2022-11-11 04:14:57', '2022-11-11 04:14:57', '2023-11-10 21:14:57'),
('7fa14f29ad967ac2ef50c140105563e5fdc3900240b4acc7071ff5f7ba36bc79daf2ebcf77efee64', 7, 3, 'API Token', '[]', 0, '2022-07-27 16:47:55', '2022-07-27 16:47:55', '2023-07-27 18:47:55'),
('809bd1d815c0358c7fbcbf69853264b7f05389698aa07b960c16a990bae99e162b686ba9455a9098', 94, 3, 'API Token', '[]', 0, '2025-10-24 23:29:10', '2025-10-24 23:29:10', '2026-10-25 01:29:10'),
('809c62d0812ad5e364d396d804896935e541467fc151cf6cc5356e91b3a3151e8d475ca344c7da15', 55, 3, 'API Token', '[]', 1, '2024-07-03 17:31:07', '2024-07-03 17:31:07', '2025-07-03 19:31:07'),
('80a3c9b88f1f9eb3c4999ab3d8f501f68fef06012887f5a533f9c9c0b78b98cd4f4e2ea9befa3c84', 33, 3, 'API Token', '[]', 0, '2022-08-04 07:37:35', '2022-08-04 07:37:35', '2023-08-04 00:37:35'),
('80abc15fa76a91f887c0f00ff19b70e8aef1facb27bab4498a953cdc82f48ed8304a2e56b7ad343b', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:47', '2023-12-07 01:42:47', '2024-12-06 18:42:47'),
('80d12b6d4c56b437473beab176a71ffa3556fddae127eb5680d4ea7b2267910bcc03dee578308c81', 55, 3, 'API Token', '[]', 0, '2024-08-21 12:51:27', '2024-08-21 12:51:27', '2025-08-21 14:51:27'),
('80e848247e4283cbd816d49df60323a822c5d058c01a4f67cbcb46226775c92e4e502d5fecc8fbe6', 76, 3, 'API Token', '[]', 1, '2025-09-22 06:35:34', '2025-09-22 06:36:14', '2026-09-22 08:35:34'),
('8114a6220f4fbc86675f42af7fc4fd7c19a7c4546d385f2caa74634cde04252b7c028f48377efc6a', 33, 3, 'API Token', '[]', 0, '2022-08-04 07:39:13', '2022-08-04 07:39:13', '2023-08-04 00:39:13'),
('817d0ddcdd82206a87e6091d9fb741aa34931a8bf7350bdc6fea4d8dd5ac48fdd9b4d0c29d12ceaa', 1, 3, 'API Token', '[]', 1, '2022-06-12 11:20:38', '2022-06-12 11:20:38', '2023-06-12 13:20:38'),
('81f22125b37add329a241910b73a05b3107530327af94e3994e9483c042d6d6c1bf4f44ccb862b50', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:44', '2023-12-07 01:42:44', '2024-12-06 18:42:44'),
('820d7d07d977094564fc86347f09b96955ba7fa8819a7d5de0890a7280bfe4ad0d1702eb1f874d72', 86, 3, 'API Token', '[]', 0, '2025-11-08 15:27:20', '2025-11-08 15:27:20', '2026-11-08 16:27:20'),
('82648b74735c9b461ae4cf4887e8c45c99a191394bee9f089ad511a7ed7d7d9891e5e9c7c5c4ae6b', 57, 3, 'API Token', '[]', 0, '2024-10-17 10:18:30', '2024-10-17 10:18:30', '2025-10-17 12:18:30'),
('82ef5e265e5f3ce8e9d54de81490e5b0921f402d6156d7990bbd1b5af84e97c1a1432f4cca6a2c1f', 33, 3, 'API Token', '[]', 0, '2022-09-12 18:04:41', '2022-09-12 18:04:41', '2023-09-12 11:04:41'),
('839069ce9f4c6d50b6501bcc0fd836827a1b0b53f61706ac4e3263140ce4ec8f4bdf5260572b10f1', 57, 3, 'API Token', '[]', 0, '2024-10-14 10:53:53', '2024-10-14 10:53:53', '2025-10-14 12:53:53'),
('8397da311b58327ddeb8beb785fd72e3414909883f8bd84c4f0343a249e9cc195a2eeb7bcb21c6d5', 88, 3, 'API Token', '[]', 0, '2025-09-23 14:45:01', '2025-09-23 14:45:01', '2026-09-23 16:45:01'),
('83a3fd418de9302ad4071daa0711543d589aa635f9c3506d3e4f56d33447fa45bd78b35fcaccdf9e', 33, 3, 'API Token', '[]', 0, '2022-11-24 17:04:43', '2022-11-24 17:04:43', '2023-11-24 10:04:43'),
('83acbb8e0f787905ace2c866cdb794397b4808368191f5e22f48808150d24cde52e8a1221cbc9e1b', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:20:31', '2022-08-25 04:20:31', '2023-08-24 21:20:31'),
('84174cfe014728f0c5002a237ca089d457ab6d07ffc7a8c4f4d3880b87ac092bb940f0700fde6023', 57, 3, 'API Token', '[]', 1, '2024-10-02 15:53:10', '2024-10-02 15:53:10', '2025-10-02 17:53:10'),
('8431dee6f9627f96ea24b3ea5f46e825a54b4342f3546dc2659cbad9052a593a415a1c4b43b44ba1', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:32:28', '2025-06-09 09:32:28', '2026-06-09 11:32:28'),
('8474929adcc635cb60885095817223b744320f39da1e35c1e12beea00c13bea5f58263057914552a', 7, 3, 'API Token', '[]', 0, '2022-06-21 18:51:33', '2022-06-21 18:51:33', '2023-06-21 20:51:33'),
('856fe5d50154268fc1b4d6c86b0e7c148b8f675f95f67bfa1313a1185a70c95a5dcc5859c46b0956', 33, 3, 'API Token', '[]', 0, '2022-08-24 00:51:26', '2022-08-24 00:51:26', '2023-08-23 17:51:26'),
('8633ba4f08c7835851bb7bbc817d351a184a8c1b135d58b201f4eaa936f53d53533a110f3f155f20', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:01:08', '2025-06-09 10:01:08', '2026-06-09 12:01:08'),
('86a351309f63ed8c054dff1fa1d58c3357f1c4a631e79b26ba992968ddab622be138027c337c01a1', 86, 3, 'API Token', '[]', 1, '2025-11-06 17:33:04', '2025-11-06 17:33:36', '2026-11-06 18:33:04'),
('86a7634f64f34aecaa8b86b4f53714489e49967a4e7e082da0fa8b85be2ab036e5df225eaaddb134', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:01:49', '2025-06-09 10:01:50', '2026-06-09 12:01:49'),
('86ad7282dd3c18921125ec7453f86b985a08cc6e146876783fd4e0de504faa53dce0272946ca33c0', 9, 3, 'API Token', '[]', 0, '2022-08-04 05:22:30', '2022-08-04 05:22:30', '2023-08-03 22:22:30'),
('86dc45a2d9ab47608b40ef72e6c19a8d8cd3ec9a482203e3617622db3a7f032b5d2d2da905a2752c', 97, 3, 'API Token', '[]', 0, '2025-11-05 17:12:59', '2025-11-05 17:12:59', '2026-11-05 18:12:59'),
('8702c833c32e74f32cc51839a76b76d43765a0a3643cff4a996662dc94c48f1029f0e369c5f431d9', 76, 3, 'API Token', '[]', 1, '2025-07-22 11:28:48', '2025-07-22 11:28:56', '2026-07-22 13:28:48'),
('878818485170033ef1175cf1d72227b2754de0418cd547128d21dd1a833a9a0fd7fa5b47c38fb6c5', 57, 3, 'API Token', '[]', 0, '2024-09-26 07:29:53', '2024-09-26 07:29:53', '2025-09-26 09:29:53'),
('87928eeaed2f456e7809d1cd0836e0758ef40ca3057f9a2429fa8ee3392353611e6654be2bb29526', 76, 3, 'API Token', '[]', 1, '2025-08-30 13:56:48', '2025-08-30 13:57:10', '2026-08-30 15:56:48'),
('87abbe6a5782aef270da27cd8fa0fa5e65124120f03d6c903772dc4117f99c6badda6238e2a2c5ea', 61, 3, 'API Token', '[]', 0, '2024-12-19 07:09:37', '2024-12-19 07:09:37', '2025-12-19 08:09:37'),
('87c168bb55a696e6953b8a2f9b5a0e9029425de78075e9a848eeaa3ac635cdf80569d5f2e126f345', 72, 3, 'API Token', '[]', 0, '2025-06-07 07:35:21', '2025-06-07 07:35:21', '2026-06-07 09:35:21'),
('88219c280ac0055dd68e87a02bc76be8874793502a730a5061839ad5c2f2ca486ba60c1352f65299', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:53:18', '2025-09-23 17:54:42', '2026-09-23 19:53:18'),
('886d2e802a4424b5c37725080a862b02133a12245d048c1eccc516fb1d0d4346661f9a6be2f627b7', 76, 3, 'API Token', '[]', 0, '2025-09-14 13:01:31', '2025-09-14 13:01:31', '2026-09-14 15:01:31'),
('88b239df6ac80eefa509dff5af1d19d46226aba67aab01ae17cc51bad6536733b6b620c3c11b6005', 57, 3, 'API Token', '[]', 0, '2024-11-27 18:28:37', '2024-11-27 18:28:37', '2025-11-27 19:28:37'),
('89187e8826f8ccd562ed4f7832bcfb45fd26569b1cce17ef86ff55a9279f7349af1cc4d39feaf49c', 33, 3, 'API Token', '[]', 0, '2022-11-30 03:27:48', '2022-11-30 03:27:48', '2023-11-29 20:27:48'),
('892a0e4781b339effdf4a124420667ae65bd1e9bbc34ef392cf540877b5454b7ca169d4bd595e1e5', 7, 3, 'API Token', '[]', 0, '2024-05-15 17:16:11', '2024-05-15 17:16:11', '2025-05-15 20:16:11'),
('8938fdc214d3caef4344714798e2a33856e4273ce14f232a044d665bb7dd56974b065634669c5c95', 57, 3, 'API Token', '[]', 0, '2024-10-12 13:43:27', '2024-10-12 13:43:27', '2025-10-12 15:43:27'),
('896b937862a4aaf5ffcfdd730197496d1a95ebb0fd7569a355a4b3d1c693be8db3e7b3efbdd6cb1f', 33, 3, 'API Token', '[]', 1, '2022-08-17 04:45:56', '2022-08-17 04:45:56', '2023-08-16 21:45:56'),
('89c6afea09995de063154adbec50262e36509c2ccc3b4d7291134153dd831f8acdbc6fb0f00804d8', 7, 3, 'API Token', '[]', 0, '2022-07-24 19:20:38', '2022-07-24 19:20:38', '2023-07-24 21:20:38'),
('8ad8be26a0f4536b9a500bdd63899cc5c2dc7231502499a7b7f31512382fbd36cee0f8beec1649c5', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:21:21', '2025-06-08 18:21:21', '2026-06-08 20:21:21'),
('8af15679342526d3363ab5a3e85df70ae4dd42b29d9d6c1ce66a4b851aa8577b6b8d449ef3887fd2', 57, 3, 'API Token', '[]', 1, '2024-10-15 17:54:03', '2024-10-15 17:54:03', '2025-10-15 19:54:03'),
('8b4e15d8c8748782748a257b85705fc5b516b10b879071cfee575d122b3d2824cfcd08f589b7e59c', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:07:09', '2025-06-09 10:07:09', '2026-06-09 12:07:09'),
('8bdc541db6522f587e70513bd505f1ebb813b192fa47bfb1c4f13390354c1e28e2985f3983bcc719', 1, 3, 'API Token', '[]', 0, '2022-06-22 17:04:43', '2022-06-22 17:04:43', '2023-06-22 19:04:43'),
('8c191b291de16d308bc3d944794ad53b7223514ffe8c7e89a105bd236fcf9376be4727899e93a65c', 38, 3, 'API Token', '[]', 0, '2022-08-25 03:29:46', '2022-08-25 03:29:46', '2023-08-24 20:29:46'),
('8c23b0d3a7233a16ff23edf4fef608a594ea288c8b40b03ed5da99329b5ea65081dbd2ad39650436', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:06:05', '2022-06-12 11:06:05', '2023-06-12 13:06:05'),
('8c6d930f40e154a8f3f3023ac33bb95d14480d7468e659eeca360e6ff2a3fe37a74a7e8af78c3630', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:04:10', '2025-06-09 10:04:10', '2026-06-09 12:04:10'),
('8c787e234fb41d3e8cade0691490057dfed8c7d692122d8d8837b0bb622246ab39f9b51ffc169548', 97, 3, 'API Token', '[]', 1, '2025-10-22 06:13:48', '2025-10-22 13:25:04', '2026-10-22 08:13:48'),
('8c80eb8e54954430b55611161539446cd3d5977ef484674c83f472f8f1150d9e0c322b0e0b5f006b', 40, 3, 'API Token', '[]', 0, '2022-09-03 03:03:53', '2022-09-03 03:03:53', '2023-09-02 20:03:53'),
('8ca08fed2478ca824ef8dde6576ccc652d701ea48bc6dd7520adefbf9f965798a17ae43c8e4c3690', 57, 3, 'API Token', '[]', 0, '2024-10-18 16:48:03', '2024-10-18 16:48:03', '2025-10-18 18:48:03'),
('8cb302a3df3c76820c8a28433311916d7cce831b5d6051874533f2b8efed9f4c01df20790c976bc9', 78, 3, 'API Token', '[]', 0, '2025-06-23 07:00:09', '2025-06-23 07:00:09', '2026-06-23 09:00:09'),
('8ceadf6a44acf41432ffcece7214345ea8b47b485b9307305b35c3f8b2301bd7e91f0037c59c1603', 57, 3, 'API Token', '[]', 1, '2024-10-02 15:50:36', '2024-10-02 15:50:36', '2025-10-02 17:50:36'),
('8d547d003082ced137a31ff6d2bb4b7a52224734a25e990367ddce593c2e823117871452f525f2c9', 76, 3, 'API Token', '[]', 1, '2025-07-22 11:24:56', '2025-07-22 11:28:04', '2026-07-22 13:24:56'),
('8d903edce369af59f7995520bab2f548aa93f7e9d5ffe15d73178d62260156983f32f6e0fec81c0b', 76, 3, 'API Token', '[]', 1, '2025-08-30 13:52:46', '2025-08-30 13:52:54', '2026-08-30 15:52:46'),
('8ef2613a22b358803d948f727857dc4b252f2a151d1636d87f825127e47ee64ec53857a1cd92a6af', 7, 3, 'API Token', '[]', 0, '2022-08-15 00:59:07', '2022-08-15 00:59:07', '2023-08-14 17:59:07'),
('8f01113bf17c826210607a5834a5076be614c08c2d61c05c335644f2c54729bde44fa62d10bfc1d7', 32, 3, 'API Token', '[]', 0, '2022-08-05 00:23:23', '2022-08-05 00:23:23', '2023-08-04 17:23:23'),
('8f63e18ecd5f0be3fd67c1565ad35a841bfafbbe6c56734ce3a35898e9914e27e2ec19e1323f8dcc', 7, 3, 'API Token', '[]', 0, '2022-08-17 01:16:09', '2022-08-17 01:16:09', '2023-08-16 18:16:09'),
('8f7fbe0a3eb3b4dd9ebed3dabe05cd7a8ecd343bcb25a10f276771431241f973486c02e6e3a44dbc', 59, 3, 'API Token', '[]', 0, '2024-12-13 00:49:43', '2024-12-13 00:49:43', '2025-12-13 01:49:43'),
('8fb1ac8ae3cde6c3e0d706a6c22db1194aa7889435fadbfc9cd8722a460df983bd90cc2420fa3d0f', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:15:18', '2022-08-25 04:15:18', '2023-08-24 21:15:18'),
('8fff342dba9fd98af33720ccebf0c7709f5d219bc6da7927c1cf2c4e51dedff08d797c2b54a1df69', 76, 3, 'API Token', '[]', 0, '2025-09-30 04:55:42', '2025-09-30 04:55:42', '2026-09-30 06:55:42'),
('90058c820e0f9c7b9db31701ff32b362ca3d1a3f9f45ec45ad8548f7a7fbef4ed665c653a4cb027e', 57, 3, 'API Token', '[]', 0, '2024-09-18 04:38:50', '2024-09-18 04:38:50', '2025-09-18 06:38:50'),
('900f7fddcfd5d8a3e684558af660db7619a2487e8a67e54e397b578f48e6cf1f96d1f4dc3e663d98', 55, 3, 'API Token', '[]', 0, '2024-08-05 15:31:04', '2024-08-05 15:31:04', '2025-08-05 17:31:04'),
('902301491df96713e794e85f547c70f882b1e6dc1454e3cf6dd0fa993550012fca64f2f4d47843c8', 7, 3, 'API Token', '[]', 0, '2024-05-29 13:16:44', '2024-05-29 13:16:44', '2025-05-29 15:16:44'),
('90693095e38ea920d24b37d27ababf749e500a28b6c0537d06518d1ade1cc1a655dbe873d008b463', 57, 3, 'API Token', '[]', 0, '2024-09-30 11:40:26', '2024-09-30 11:40:26', '2025-09-30 13:40:26'),
('90dac6b36401bdc5c11f43abc982976c15561ed7bab4bcdc9f12a6a6486e960d3c14e204e7ecbfd6', 57, 3, 'API Token', '[]', 1, '2024-09-11 17:49:45', '2024-09-11 17:49:45', '2025-09-11 19:49:45'),
('910da4b7c300f9d55ebe4a3616cdec7715a21b59147d094702e91c568798e33d5aeb86fc6c7edada', 73, 3, 'API Token', '[]', 0, '2025-06-08 17:44:32', '2025-06-08 17:44:32', '2026-06-08 19:44:32'),
('919c2ffbfd92ea4484019fba539fbfe2b380e7ca8efaa0d36e666a45b66f837f5586e535105b1df6', 96, 3, 'API Token', '[]', 0, '2025-10-09 01:07:28', '2025-10-09 01:07:28', '2026-10-09 03:07:28'),
('91cc8e598d34d56e018fc692adefe3f83a7f22805c581c5f3ee18572073219f050c7d6c155130edc', 1, 3, 'API Token', '[]', 0, '2022-08-20 17:12:30', '2022-08-20 17:12:30', '2023-08-20 10:12:30'),
('9203280b8608d81bbf1da13c992d8bc92dcfd4c60293704f4601128adcbd49ec70abc7c9cb6b5a04', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:14:53', '2022-08-25 04:14:53', '2023-08-24 21:14:53'),
('923430a6e38fb449894f55ffcdc3bec8ce4296c4af5eb4f1c573cceb17412a1ec40e0e115f0354cb', 57, 3, 'API Token', '[]', 0, '2024-10-13 17:36:33', '2024-10-13 17:36:33', '2025-10-13 19:36:33'),
('92d51daf9907817c4426011a860d42a3bbfe3ab41a82ea79644d120c842febc768a54c261c4c3135', 43, 3, 'API Token', '[]', 0, '2022-09-22 23:34:58', '2022-09-22 23:34:58', '2023-09-22 16:34:58'),
('92e58f16a530804d80306ff35dfc3f0c5ecb501d8f8366cd9808432799c339af30d8b05956b9f85b', 76, 3, 'API Token', '[]', 0, '2025-09-19 17:03:35', '2025-09-19 17:03:35', '2026-09-19 19:03:35'),
('9373fa88b382c1029c429e41b6e62c5b4d8098d69849bc7b8f92f69655f05fcb0ee81aae6e8df179', 51, 3, 'API Token', '[]', 0, '2024-06-25 19:47:16', '2024-06-25 19:47:16', '2025-06-25 21:47:16'),
('937590d33e66ac2dfc561a6f607d0441f697724019d6b873eeec74de995e1984ef2456117d8bb908', 57, 3, 'API Token', '[]', 1, '2024-10-15 18:12:36', '2024-10-15 18:12:36', '2025-10-15 20:12:36'),
('938933b1678ae0126fcbf49500281d8ab074bf3432eb6dcecd7acef702b92ce6b290876451ca762d', 49, 3, 'API Token', '[]', 0, '2024-05-22 17:15:08', '2024-05-22 17:15:08', '2025-05-22 20:15:08'),
('93a335a00b39b27070f5a927d84638a3e9c42473cc0106490d37c171914edfa7b62c19e0d12e1e98', 57, 3, 'API Token', '[]', 0, '2024-10-21 04:27:33', '2024-10-21 04:27:33', '2025-10-21 06:27:33'),
('93b1b0727223f674a516422493a91c53f44b3717a2202e5bed84848b296e7f2575d564d7206bfe91', 57, 3, 'API Token', '[]', 0, '2024-12-01 20:25:39', '2024-12-01 20:25:39', '2025-12-01 21:25:39'),
('942beb6b67ee69d6b50c2a8aeb4e12bbc71f2315dc1de2ff956499038a260aae3a65cdcbd2a5a5d5', 33, 3, 'API Token', '[]', 0, '2022-08-04 07:36:02', '2022-08-04 07:36:02', '2023-08-04 00:36:02'),
('949331eb3fcc7cf0891e7250952a0f3e71ff3185cc3b7a2a433cf7ca077bcd00e4effa6710035da4', 57, 3, 'API Token', '[]', 0, '2024-09-24 21:49:28', '2024-09-24 21:49:28', '2025-09-24 23:49:28'),
('950543c13896f4e167282259fca46e99b3be32333a9aef723bcabb455b4a96e17e68890aa7481acf', 55, 3, 'API Token', '[]', 1, '2024-07-29 20:38:57', '2024-07-29 20:38:57', '2025-07-29 22:38:57'),
('952e8a319f43308ce0cfab75a9dbaa7edfb8c841c23d7067a9b8bbe8ed2466de70974d59c63e204d', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:49:14', '2022-08-04 06:49:14', '2023-08-03 23:49:14'),
('9640946223416b01f2e4ae8dca33a3bab3bfa21ef35b2f6d67cfd4b1ad9b4727090eaa88a597a20f', 32, 3, 'API Token', '[]', 0, '2022-08-04 15:10:06', '2022-08-04 15:10:06', '2023-08-04 08:10:06'),
('9662bf00de6d2054cc459f6c24b74e9139aaee0d5528b745838c496651edfe297d28758bcf0ff490', 86, 3, 'API Token', '[]', 1, '2025-11-05 18:28:32', '2025-11-05 18:49:44', '2026-11-05 19:28:32'),
('975d29acd535c3afe265e875855e3627bd445442ff174be68adc427df94ca2e3ba002883ff0e3d56', 40, 3, 'API Token', '[]', 0, '2022-08-31 16:20:22', '2022-08-31 16:20:22', '2023-08-31 09:20:22'),
('975efffb9c1efe596c29d90f0eb8788e82f581b5f0d97bcac6120290127e6da9d574c0d92a635cd9', 33, 3, 'API Token', '[]', 0, '2022-11-24 17:19:49', '2022-11-24 17:19:49', '2023-11-24 10:19:49'),
('975fbd7ae8665710fcd868a411b51ec3282d69e089a4befb08ef044c35c17e1393c03e7717f641b8', 33, 3, 'API Token', '[]', 0, '2022-08-04 08:34:05', '2022-08-04 08:34:05', '2023-08-04 01:34:05'),
('978392fb625b731eadd39a4f349e429a5d648e3326278518c40a566abf391b0df5bddb65674e7fdc', 63, 3, 'API Token', '[]', 0, '2025-03-23 22:55:31', '2025-03-23 22:55:32', '2026-03-24 00:55:31'),
('981db6d976fb8773fa2093ace7cad831f77ef16b719a048ff5959343d3fe4fea47afa42600af3a6f', 76, 3, 'API Token', '[]', 0, '2025-08-18 19:08:48', '2025-08-18 19:08:48', '2026-08-18 21:08:48'),
('984dd39e49a60bc2c815ad6ca3187f475a9c66a49a669289e3b98209d3b2215825a4a971c25541f8', 33, 3, 'API Token', '[]', 0, '2022-09-15 18:08:10', '2022-09-15 18:08:10', '2023-09-15 11:08:10'),
('98ac6a31291b8d6bfb14c036822dfdb47192a72aae42df8d576b6d27984a802a51623a0405cb865f', 61, 3, 'API Token', '[]', 1, '2025-01-13 10:23:49', '2025-01-13 10:23:49', '2026-01-13 11:23:49'),
('98af9e88e23ec9af5d6b3caf5d8b86d84f0220f14058067b5535b0a2de1a925574556265daebd926', 32, 3, 'API Token', '[]', 0, '2022-08-23 05:36:45', '2022-08-23 05:36:45', '2023-08-22 22:36:45'),
('9900e9740ba4f4b5210912191a2934945ccc3c6712f67474a65927ccca209b4e1b0963098080a04e', 76, 3, 'API Token', '[]', 1, '2025-07-04 14:07:26', '2025-07-05 02:27:31', '2026-07-04 16:07:26'),
('99067ae5c2967eb583a919e4522eee88f6b14ea2b5c650e2083f9f7bddbeefcbaf2f0f0e62d3e7a1', 7, 3, 'API Token', '[]', 0, '2022-07-24 19:20:39', '2022-07-24 19:20:39', '2023-07-24 21:20:39'),
('993d9b1809a314c5ce4b9245b842fd4217f953257bcd7d9544e6745eacd91a650b3075976f38d25b', 57, 3, 'API Token', '[]', 0, '2024-10-14 09:09:34', '2024-10-14 09:09:34', '2025-10-14 11:09:34'),
('9966b5efc65eb933b78899eef179ef448b54a6587c7f0dbc01ca8e89b472af80bf96b9b8424274eb', 40, 3, 'API Token', '[]', 0, '2022-09-13 22:16:00', '2022-09-13 22:16:00', '2023-09-13 15:16:00'),
('997db72c09976961fa384a6981837ddbab94243fd073fde2c13e4df11ca41500211471339db9cee4', 57, 3, 'API Token', '[]', 0, '2024-10-16 08:14:33', '2024-10-16 08:14:33', '2025-10-16 10:14:33'),
('99a193c467b64a604299e83b66097d8ec60574e496585f9ad0ffc76490944f04add06bec20604b17', 64, 3, 'API Token', '[]', 0, '2025-03-23 23:04:28', '2025-03-23 23:04:28', '2026-03-24 01:04:28'),
('99eed1a12f2401c80a0758ad8a7723194565446e8384d9da0b3022eccbadd46cd94bbe88a7765141', 44, 3, 'API Token', '[]', 0, '2022-11-02 03:29:38', '2022-11-02 03:29:38', '2023-11-01 20:29:38'),
('9ad8552aa623e92aa43b0d66b3af2dc41d3a9035682eab14fb8c55f17434c1ab0210649d9ee1963e', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:11:46', '2025-09-23 17:11:54', '2026-09-23 19:11:46'),
('9b4acb89671d5638a55733c2e0cb2cf5d4f287ba91d9e2128d919e22679ca32fa46e711fba7a474b', 43, 3, 'API Token', '[]', 0, '2022-09-13 19:08:22', '2022-09-13 19:08:22', '2023-09-13 12:08:22'),
('9b7a88351cbeb4a6e9f1523efc8b0540afa4ea0de3d365a375067feee5d842bd2356b3e92d577f46', 7, 3, 'API Token', '[]', 0, '2022-08-02 18:17:38', '2022-08-02 18:17:38', '2023-08-02 20:17:38'),
('9b7f0e1ccefd850466c1b12b5b85efd16337f1e67e6e3fe8252b2845ae11adb518a54d10140107f8', 91, 3, 'API Token', '[]', 0, '2025-09-23 15:11:18', '2025-09-23 15:11:18', '2026-09-23 17:11:18'),
('9c0a3ef1abc8069934fde7f820c25b799b288eaf69d878b12f6a7bf69aa444b278422c793f81132e', 57, 3, 'API Token', '[]', 1, '2024-10-13 15:01:18', '2024-10-13 15:01:18', '2025-10-13 17:01:18'),
('9c2d9582bc58fd4f67aa1b756132715b225ec97f09d711a64c30eef9fde85b89c7f72fcdd092ffa7', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:06:08', '2022-06-12 11:06:08', '2023-06-12 13:06:08'),
('9d3cd9ec631e786f71ddbe88a282033325ff67d4e57d1a40d4d55479994607e6bb07daa7a83255d5', 57, 3, 'API Token', '[]', 0, '2024-09-11 17:06:09', '2024-09-11 17:06:09', '2025-09-11 19:06:09'),
('9d42d4633a58af8e3723951920f62b30acaa049d74c086bc7f8ceabd1ed7c2ecb97360aa0cf84686', 33, 3, 'API Token', '[]', 0, '2022-09-11 01:38:59', '2022-09-11 01:38:59', '2023-09-10 18:38:59'),
('9d8328467d75a18b453eb5a712093421d11336c5dee24d479bc5b9194612af44c9e1c889c85691ee', 55, 3, 'API Token', '[]', 1, '2024-07-03 17:34:02', '2024-07-03 17:34:02', '2025-07-03 19:34:02'),
('9dc839ba317fb217f025d4cc1a57b1f014e29e61111d9a4e6be73dd7b05f38a22dec3706abba26f2', 32, 3, 'API Token', '[]', 1, '2022-08-05 22:57:07', '2022-08-05 22:57:07', '2023-08-05 15:57:07'),
('9dcc8c718e4fb11d23977c618f03bf49c0ee816b13edf23d0c85f7d5d0ef2e1e52cb77226e1a6124', 75, 3, 'API Token', '[]', 0, '2025-07-16 15:51:13', '2025-07-16 15:51:13', '2026-07-16 17:51:13'),
('9e0ae0f57fd2cd19e3c58baba150b808f0fea66c3eac9ae2b80b0af3c50d6b90f71e5e2a933a1478', 33, 3, 'API Token', '[]', 1, '2022-11-25 18:37:19', '2022-11-25 18:37:19', '2023-11-25 11:37:19'),
('9e7da308055a4cd7c4fd9c797edf0d3922d2c2ce62c7d6d9d35ac9b5a4b2244e597aaa8074f9c222', 32, 3, 'API Token', '[]', 0, '2022-08-24 02:08:20', '2022-08-24 02:08:20', '2023-08-23 19:08:20'),
('9e8c646d88b503a538f8aa962803f12cbd5d987937a00729ecf121f18445996eb3188a1f155b9c14', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:17:30', '2025-06-09 09:17:30', '2026-06-09 11:17:30'),
('9e9283ea62e4a4f4d097a89d59c610097ef302d26d221fd0506c6bf240018cc4a10c23f9ad813ed5', 61, 3, 'API Token', '[]', 0, '2025-01-12 20:44:54', '2025-01-12 20:44:54', '2026-01-12 21:44:54'),
('9e9ec37de377ffde1cd2ed8328cffa9c894ac6509016ad8aec25b3aac00ffdfbc2e858dc9bd51327', 48, 3, 'API Token', '[]', 0, '2024-05-12 16:21:20', '2024-05-12 16:21:20', '2025-05-12 19:21:20'),
('9f1408fa5c20b8b131b9b1440cd63d542733a7a74cf6ecf007d571ecc70a032c830268d1f3efff9a', 55, 3, 'API Token', '[]', 1, '2024-07-29 20:32:57', '2024-07-29 20:32:57', '2025-07-29 22:32:57'),
('9fb5926f141759c5ecf7712d5abaa80e8917820bc47656c04e912d0c900dc685657a8b4472ea6534', 1, 3, 'Admin', '[]', 0, '2022-06-12 11:05:49', '2022-06-12 11:05:49', '2023-06-12 13:05:49'),
('9ffc0616856ea39d4a241a87f8e0db746f73348273095740843512f7a32da72216168606fc9102fd', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:25:00', '2025-06-09 09:25:00', '2026-06-09 11:25:00'),
('a08adb87a19386aee8f14e47b01b3eaf64ddad400f5df48381dc2498d3a0fab9ac683ae0952c8dfc', 40, 3, 'API Token', '[]', 0, '2022-08-29 03:02:45', '2022-08-29 03:02:45', '2023-08-28 20:02:45'),
('a0efeea5a5a6c9fa634bafb06001f6b2d7058ab073342715824bcad9bfc7714d99abd8e5edaa4c77', 74, 3, 'API Token', '[]', 0, '2025-06-10 09:32:50', '2025-06-10 09:32:50', '2026-06-10 11:32:50'),
('a1ae94794b2f1a1b9e76de2a7895b46fa846d8e211e41194a4ba4b04afda90561c88e6164f306ace', 55, 3, 'API Token', '[]', 0, '2024-07-14 17:12:08', '2024-07-14 17:12:08', '2025-07-14 19:12:08'),
('a1b232fca548784c6e764cf1199bd4dcd82dcdcac4263ea7274694009042481417dad9d4a3dbfced', 55, 3, 'API Token', '[]', 1, '2024-07-03 19:11:18', '2024-07-03 19:11:18', '2025-07-03 21:11:18'),
('a26e2e860139293ad415cb73c4f6666dadf605a27e7a6956839f5bbb0f373fd1406b8f1e0444cd5e', 11, 3, 'API Token', '[]', 0, '2022-08-04 05:25:48', '2022-08-04 05:25:48', '2023-08-03 22:25:48'),
('a2fd42e9939a0313f8d06c510ca1c348d4d0663c3e0cfe9397b4959f12c27bc2108a8ab34cb85844', 33, 3, 'API Token', '[]', 0, '2022-09-22 22:58:00', '2022-09-22 22:58:00', '2023-09-22 15:58:00'),
('a30e877e0cf72b92ed53332f7ea5a25d28b7ec258d6bc2dcd272cdcabc0f5187c3c5c6b3e176d51f', 36, 3, 'API Token', '[]', 0, '2022-08-25 03:12:51', '2022-08-25 03:12:51', '2023-08-24 20:12:51'),
('a34ca89a3c928eac10890e763829ed566cb023710b1c6747328071d6698ef63530b8447b4dfc6c93', 7, 3, 'API Token', '[]', 0, '2024-05-15 17:16:23', '2024-05-15 17:16:23', '2025-05-15 20:16:23'),
('a38270b9236bb3e6da4e757afa9353309dc3b39ad43896c3aa5e12ac0c4395119687572aa073c089', 57, 3, 'API Token', '[]', 0, '2024-10-14 12:14:31', '2024-10-14 12:14:31', '2025-10-14 14:14:31'),
('a3dcd9cbd587504eff5d3625d619500f0b321ee891aecbc636da5368567229df9864b544e19bb7c1', 86, 3, 'API Token', '[]', 0, '2025-10-23 16:26:27', '2025-10-23 16:26:28', '2026-10-23 18:26:27'),
('a3e5eac142f53b40942396e6e3c4c4a17649cef70381137dba1a0094d7019b295ca43b316ca6bd2c', 98, 3, 'API Token', '[]', 0, '2025-09-25 17:54:46', '2025-09-25 17:54:46', '2026-09-25 19:54:46'),
('a4252e10283e43401f2d1c59e943dc65e95ae5481dcdebba5666742c2f41d0884ea4183ddcc8a254', 58, 3, 'API Token', '[]', 0, '2024-12-11 09:28:56', '2024-12-11 09:28:56', '2025-12-11 10:28:56'),
('a436a1c7f2774cf4d450884ca5f3e5bb313f95c5d28622a782ac03876ad3f7c1a8bbec0b2302838b', 33, 3, 'API Token', '[]', 0, '2022-08-17 17:17:22', '2022-08-17 17:17:22', '2023-08-17 10:17:22'),
('a43cec1d50d249770a5c5e687d4082c4408aef3efb0ee343f2521257b2713110ea9a4ece2ea512d8', 33, 3, 'API Token', '[]', 0, '2022-09-23 01:32:06', '2022-09-23 01:32:06', '2023-09-22 18:32:06'),
('a5869469ceb76121b6ba557be370a98d6e02cfeb1d6e284ba8f624b900a32aa884803aa92bd35c48', 57, 3, 'API Token', '[]', 0, '2024-11-25 15:20:43', '2024-11-25 15:20:43', '2025-11-25 16:20:43'),
('a629f0646dfc2b468a69090a9d0b191dee4de39709900b2d157e0747068dba2f63d922009fdaf45b', 1, 3, 'API Token', '[]', 1, '2022-06-12 11:19:51', '2022-06-12 11:19:51', '2023-06-12 13:19:51'),
('a654fcada42b00da526999a7cddcb6e988f00da6d2ef3df42d1e5873316ea4593280c095de95603e', 57, 3, 'API Token', '[]', 0, '2024-12-01 21:03:53', '2024-12-01 21:03:53', '2025-12-01 22:03:53'),
('a6b749d32bbcaab5f049f1d9106882870a11854ffabd8844161ecdb936978c07a6b1a67a8345f6c7', 1, 3, 'API Token', '[]', 0, '2022-08-23 00:34:28', '2022-08-23 00:34:28', '2023-08-22 17:34:28'),
('a6ea116ba365d6a07cb52c9fb9a1037689a5c0bde014f21dd6891289f354ec03171f1da47a3c7292', 45, 3, 'API Token', '[]', 1, '2024-04-27 12:00:10', '2024-04-27 12:00:10', '2025-04-27 14:00:10'),
('a726c0ae3b4d315a4837a5dc9a6fcf3664dd907b757f6e9739997ff3e2c20dd2656a9fb5431a6636', 83, 3, 'API Token', '[]', 0, '2025-06-23 08:23:58', '2025-06-23 08:23:58', '2026-06-23 10:23:58'),
('a72fc4e435c13fb68407cbfeb8a0e8689a660ce0370e811462a64ac8a70e2ffc24dad19362e2b29a', 75, 3, 'API Token', '[]', 0, '2025-06-23 08:02:53', '2025-06-23 08:02:53', '2026-06-23 10:02:53'),
('a8305ebc74bb71b9e7b0a23b5cc0ed5b7a18812aecced5b02c9759efc80f8464adb0b24a72c090b5', 7, 3, 'API Token', '[]', 0, '2024-05-29 13:22:41', '2024-05-29 13:22:41', '2025-05-29 15:22:41'),
('a8832b9553c9275c18c89dd35dbe06489ff574bc9ff57d96b6dbbd5a0710e7e87cc307300be9cc47', 60, 3, 'API Token', '[]', 0, '2024-12-19 07:05:21', '2024-12-19 07:05:21', '2025-12-19 08:05:21'),
('a9a784fe963a249ae8a60b4309b89ac0e87b0f0efcc70d19fd2f54bec8ada76f3e87a059a68e9068', 36, 3, 'API Token', '[]', 0, '2022-08-25 03:29:24', '2022-08-25 03:29:24', '2023-08-24 20:29:24'),
('a9d8f98035ad54d656d5ddd438bd51f76e8307e32f0920f9519d92903f66e43413990897033d0279', 97, 3, 'API Token', '[]', 0, '2025-11-25 21:29:34', '2025-11-25 21:29:34', '2026-11-25 22:29:34'),
('a9e2c8e8507293961aedb4f68ed1881c0153ac7512a06a7135f07caf77fea94073fcd1fa7d091036', 43, 3, 'API Token', '[]', 0, '2022-09-11 21:56:33', '2022-09-11 21:56:33', '2023-09-11 14:56:33'),
('aa52d36eddbfd6af27353e6f56a5247ffda88af5bd179256c4c72913b49b34bcbe6b67484de39cf3', 57, 3, 'API Token', '[]', 1, '2024-10-18 19:14:28', '2024-10-18 19:14:28', '2025-10-18 21:14:28'),
('aa575d1dd3fdd8c8d6ea900100521ff9d45c454c26cff408674392b582a1f3cd2a8039dc5c72c4a4', 57, 3, 'API Token', '[]', 0, '2024-10-13 12:50:27', '2024-10-13 12:50:27', '2025-10-13 14:50:27'),
('aac5caadaa26612ee2f22bb90b6497cb6833146327396e1d850e6294d2d3b157b20486ae11a37019', 69, 3, 'API Token', '[]', 0, '2025-04-12 15:04:30', '2025-04-12 15:04:30', '2026-04-12 17:04:30'),
('aaf7bf0039d721df0d83b100aec589cdc4b0d8c123081203f47e236cf0cf1e501247622e4433cf4e', 33, 3, 'API Token', '[]', 0, '2023-12-07 01:42:51', '2023-12-07 01:42:51', '2024-12-06 18:42:51'),
('ab1a5d6ef62e94a94b665b544c7a7f9024531c5600301807968182107973d7d032929ee833874681', 32, 3, 'API Token', '[]', 1, '2022-08-05 22:07:42', '2022-08-05 22:07:42', '2023-08-05 15:07:42'),
('ab5fb26d7779667860631b9fbfecbe44e6dfe68ccb4ec570caaf9e0b47bfb37f8789f15bee3e587a', 57, 3, 'API Token', '[]', 0, '2024-09-25 17:27:08', '2024-09-25 17:27:08', '2025-09-25 19:27:08'),
('ac1982d8a9f4f6045be358c36caf8455bd29c9fb938b4784da9d54148d551f1b5d066333b51943c5', 87, 3, 'API Token', '[]', 0, '2025-09-23 14:43:32', '2025-09-23 14:43:32', '2026-09-23 16:43:32'),
('ac8e6c6cd95c1cfd59cdc56e76cd01fbb0792c28c08b5ed890a01698aa4d2db554eee7837df589e6', 32, 3, 'API Token', '[]', 0, '2022-08-05 19:23:04', '2022-08-05 19:23:04', '2023-08-05 12:23:04'),
('ada17fe48468669ac8125d296de392d14e64167368f6857d7942c2ab5e09ed1afe0b61ffe9d03473', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:32:20', '2025-06-08 18:32:20', '2026-06-08 20:32:20'),
('adb2656e4a0055d8afd027e9ace53f88f25a2628965658c6e18cb5a3f122f858c9324a13e253edfb', 57, 3, 'API Token', '[]', 0, '2024-09-11 17:14:41', '2024-09-11 17:14:41', '2025-09-11 19:14:41'),
('ae09811140a4286ec17d3b218876bd4cf3a50cb45916a8ee006a3e8b24302102c667233acb3c959a', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:08:32', '2025-08-30 14:15:03', '2026-08-30 16:08:32'),
('ae8d4bffa994277459a18559b7645e790d1c247414e53bd3aefd0026aa0d7542011e97b5bf9ab138', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:53:46', '2022-08-04 06:53:46', '2023-08-03 23:53:46'),
('af606a9cfc4fa0d362ba67e3d782b23f726c2be6a9ba63e121a5e02a3ee249e9cb45236e47167360', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:02:19', '2025-06-09 10:02:19', '2026-06-09 12:02:19'),
('afbbdc86ace52583e400392a97266c023a09b2d3b844308e7c3281ead7c7ed1c770933a479e6f940', 57, 3, 'API Token', '[]', 0, '2024-12-11 06:21:49', '2024-12-11 06:21:49', '2025-12-11 07:21:49'),
('afdb11d579a421242eb3cc7fb829195f6ca91991681ccb938155e927b27d82ada6f4be3615c93270', 33, 3, 'API Token', '[]', 0, '2022-09-29 03:33:15', '2022-09-29 03:33:15', '2023-09-28 20:33:15'),
('afe03d27687705f324ef502e97d7dcc9e8d3a0f387e2002397297e6e1b2676d662c06a7ecdfb45f5', 59, 3, 'API Token', '[]', 0, '2024-12-18 13:11:42', '2024-12-18 13:11:42', '2025-12-18 14:11:42'),
('b068a914e2f8e9cd3872c83c95c6b41d8432948055f2b020f6d9813ac19af92eb86da4c581ac0445', 55, 3, 'API Token', '[]', 0, '2024-08-04 12:01:49', '2024-08-04 12:01:49', '2025-08-04 14:01:49'),
('b0716357b58aeb08c19021d2091441ed59b001972c77c9c229789bc256f37b6c36114c0aba407a75', 96, 3, 'API Token', '[]', 0, '2025-11-10 01:52:05', '2025-11-10 01:52:05', '2026-11-10 02:52:05'),
('b10b1ed3a80ed9a7133f1131317fb61b4574ad12686532d20772e3832fa0303b5343c7587d769fdb', 1, 3, 'API Token', '[]', 0, '2022-08-20 17:12:42', '2022-08-20 17:12:42', '2023-08-20 10:12:42'),
('b16484f4143bf37f2b24623e6878a5c9fe12aba953d697787d48d33ea1d8f08754ddc65cc7b38f15', 57, 3, 'API Token', '[]', 0, '2024-10-22 15:23:50', '2024-10-22 15:23:50', '2025-10-22 17:23:50'),
('b1916375f2d877c7fc3a5723ff54e226bb14274f29b15b83f22becb9eff31e52a7f424f266921ee4', 57, 3, 'API Token', '[]', 0, '2024-10-19 10:42:26', '2024-10-19 10:42:26', '2025-10-19 12:42:26'),
('b1da0239da78ccb6393b88d922ebca3f3d2aafa54b2562cb62f718146cb0de7dc298c53144f049fb', 57, 3, 'API Token', '[]', 0, '2024-09-23 15:28:27', '2024-09-23 15:28:27', '2025-09-23 17:28:27'),
('b1dfcf12856e4d6eee74a69594dbc82e1d687ec9fa1e4442b6aebef6caac78327d4ba161ac5acc4c', 57, 3, 'API Token', '[]', 0, '2024-09-25 18:25:46', '2024-09-25 18:25:46', '2025-09-25 20:25:46'),
('b27615992777aa1deca0e6b837b789b361ef172716633ac33b5654de4a7551a6b272f8fec9a4cda5', 55, 3, 'API Token', '[]', 1, '2024-07-29 20:55:23', '2024-07-29 20:55:23', '2025-07-29 22:55:23'),
('b35f1f7f22d40bd9ea21dd558160ef8d48ea3ddf36d527578940bea62d45b14e992fa94a0a728984', 57, 3, 'API Token', '[]', 1, '2024-09-12 14:09:35', '2024-09-12 14:09:35', '2025-09-12 16:09:35'),
('b374bd084d1d6ed9e5e204eca843e9af6c4ef7a5ef3faa33a7e737b2ce5476b4f0f1f554404d0212', 57, 3, 'API Token', '[]', 1, '2024-10-14 09:34:34', '2024-10-14 09:34:34', '2025-10-14 11:34:34'),
('b50d4c39d866b3ae4b45ab8f71debf3e81ae63ad0d37cbf17ac04dfa87e96a4f126cb654e37d72b5', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:23:15', '2022-08-25 04:23:15', '2023-08-24 21:23:15'),
('b608a44e75d2b781e0788d5fe9883ac9b965c44e7d5e1ca205f8ffce62cfb776dc7207c8720bd793', 57, 3, 'API Token', '[]', 0, '2024-10-14 13:33:19', '2024-10-14 13:33:19', '2025-10-14 15:33:19'),
('b62509480342f809dcbdeec07a34308d5ea4f13ac0e634474ec8359665b0f31f0814f932fa875800', 33, 3, 'API Token', '[]', 0, '2022-09-29 18:15:42', '2022-09-29 18:15:42', '2023-09-29 11:15:42'),
('b6477f38c89b0666a3725fe34b540b165306627cb91377115e51f125ba5341257f4c3546653d638b', 97, 3, 'API Token', '[]', 1, '2025-11-09 19:27:17', '2025-11-09 19:35:46', '2026-11-09 20:27:17'),
('b6525a2ffbbab9e2d7bd56a34416da74528a070320af84ceac154b14343666f91cd2cd6d079e5d72', 33, 3, 'API Token', '[]', 1, '2023-12-07 01:22:55', '2023-12-07 01:22:55', '2024-12-06 18:22:55'),
('b863fc7e56b176068755b8d5865e3b80e7b9485674b564f7fa9e487394ff11c6827c218e55e31302', 73, 3, 'API Token', '[]', 0, '2025-06-08 18:37:02', '2025-06-08 18:37:02', '2026-06-08 20:37:02'),
('b867b42150645d466ce9b618172a9b3f0b155711561e71986cd7ece47c0bdf39c40f2088a799a7b9', 7, 3, 'API Token', '[]', 0, '2022-07-24 19:25:49', '2022-07-24 19:25:49', '2023-07-24 21:25:49'),
('b9127b9d09a309bcbabc814aee182a7042a6b009235882029672472f9fd2278ee9c10297f9a446e7', 7, 3, 'API Token', '[]', 0, '2022-07-19 20:26:13', '2022-07-19 20:26:13', '2023-07-19 22:26:13'),
('b985b41b0fe78268de909f9040cd727c4eda93cbab755b31365c87d2f6218c45fa1d8f0499f9ef04', 92, 3, 'API Token', '[]', 1, '2025-09-23 17:12:25', '2025-09-23 17:29:11', '2026-09-23 19:12:25'),
('ba3b15de4e910c39f3ead6b33dd6df941e53d0f1203637515ab606075739ad2e0c6385ad4a5f649d', 1, 3, 'API Token', '[]', 0, '2022-06-12 11:16:50', '2022-06-12 11:16:50', '2023-06-12 13:16:50'),
('ba5872e5f3d367e3dab3023e93490293726a709311b324fb3406eb21c7c3d9b86141aa5718722fc0', 33, 3, 'API Token', '[]', 0, '2022-08-04 08:49:18', '2022-08-04 08:49:18', '2023-08-04 01:49:18'),
('bae46a2daaf7f9f84cf96e7a5989084f01306fc643b9f1abe2caa83ed28a74e41649b4b813cc5579', 76, 3, 'API Token', '[]', 0, '2025-08-14 11:44:44', '2025-08-14 11:44:44', '2026-08-14 13:44:44'),
('baf4041047cb516edcb6ae19aae5c9449634bbf2e42b06b14b932e8995adf2ef078887b8bf672e25', 15, 3, 'API Token', '[]', 0, '2022-08-04 05:30:37', '2022-08-04 05:30:37', '2023-08-03 22:30:37'),
('bb795429eae17669f22bf5b49193e02ab1a3d3bb0435bf3add39f109799b51d4f81ef8b34dafa0a9', 85, 3, 'API Token', '[]', 1, '2025-08-17 19:09:38', '2025-08-23 14:32:03', '2026-08-17 21:09:38'),
('bc2db50d709d3373d643d16d3633c1841800e91097b245ba4feaed9204fbf528a85212bbdccc522c', 47, 3, 'API Token', '[]', 0, '2024-05-12 16:19:05', '2024-05-12 16:19:05', '2025-05-12 19:19:05'),
('bc33016ff65c9bcbe0d33cef05aab1aed27d925d9ae1c1b45b448143086ce5d1e12470f58c4756af', 34, 3, 'API Token', '[]', 1, '2022-08-16 03:04:00', '2022-08-16 03:04:00', '2023-08-15 20:04:00'),
('bcb4e573079bb51c432a5238d258024c699eb793bb242e6575c8e72a567e4604f61c42228e68e4d3', 57, 3, 'API Token', '[]', 1, '2024-10-14 02:31:01', '2024-10-14 02:31:01', '2025-10-14 04:31:01'),
('bcb74988f3242b9acda9a289b5cabe58dd843502ea60a610d44e81028b93da84dfb4b72ba99fb425', 73, 3, 'API Token', '[]', 0, '2025-06-09 09:18:16', '2025-06-09 09:18:16', '2026-06-09 11:18:16'),
('bd46b453e89203c847b1e8bbb6b5c42900ad83fcd7d6ed4c2df2274f9b794537d471045b4236bfb7', 55, 3, 'API Token', '[]', 0, '2024-07-05 09:08:32', '2024-07-05 09:08:32', '2025-07-05 11:08:32');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('bdac306c1b77f1394e8c48ec08583db1a755fc29d953af96848a870a0e0a5eab97ce3b94cd6ae268', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:50:04', '2022-08-04 06:50:04', '2023-08-03 23:50:04'),
('be3e980e263547ec832512152c0dd2804761620c7065463c13371f5b97685312be2856b195a97a60', 42, 3, 'API Token', '[]', 1, '2022-08-31 16:57:17', '2022-08-31 16:57:17', '2023-08-31 09:57:17'),
('be80ed1c94567916a8b848ed4e8397e39af3fe475786c745ae1010d7916218f3f405e3b182a59ef5', 76, 3, 'API Token', '[]', 0, '2025-09-07 14:03:12', '2025-09-07 14:03:12', '2026-09-07 16:03:12'),
('c0376ce1fdcaac643e479f3b09212f880cd043382a6a58fc601377af9e1f6af335bc0c060c7deaff', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:04:47', '2025-06-09 10:04:47', '2026-06-09 12:04:47'),
('c038e37b261901d20540199c5b521e659516e3d5bd55a67f6b9e4c2a2a7396f868b5820c5f875419', 94, 3, 'API Token', '[]', 0, '2025-09-23 19:23:31', '2025-09-23 19:23:31', '2026-09-23 21:23:31'),
('c05a832cc3696da2c36b64e7137f2283c22b548f01b7f27d639e20db7d7025ec633c8aaec99329a2', 42, 3, 'API Token', '[]', 0, '2022-08-31 16:57:05', '2022-08-31 16:57:05', '2023-08-31 09:57:05'),
('c0a65114ac77ca371bccff4622df1081e27036613d309f48d2a55119aa218cfd30c8bbbf4e2db687', 55, 3, 'API Token', '[]', 0, '2024-08-04 12:07:33', '2024-08-04 12:07:33', '2025-08-04 14:07:33'),
('c0aa15b7aa1b34fbe0810f0f3f69d8f2d25a6f457d97fc85c896320ee3a8086063910aa8dd8ff1af', 76, 3, 'API Token', '[]', 0, '2025-09-16 09:46:55', '2025-09-16 09:46:55', '2026-09-16 11:46:55'),
('c0d03e1c09beee17c75ede0c55091b93daac84791379f03834b95c18d337f141d0cec876a22dec81', 58, 3, 'API Token', '[]', 1, '2025-01-13 16:45:14', '2025-01-13 16:45:14', '2026-01-13 17:45:14'),
('c163fe59987d9bf86669aa38218f828833d86e2d1ffaa06846eefbf1b7ba40e2505c36b84859db91', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:21:37', '2022-08-25 04:21:37', '2023-08-24 21:21:37'),
('c24987ab954e6d87da88dbc2a7a925de21a1ff2c715cdbbdeb6b53fe1f433d1f29ffef46c203716f', 57, 3, 'API Token', '[]', 0, '2024-09-18 04:44:41', '2024-09-18 04:44:41', '2025-09-18 06:44:41'),
('c26829ec0caeb7e9864eb33d076f0fa2eafc564dd26bc32ae46a7e0581760738bffed1b32583d6fd', 18, 3, 'API Token', '[]', 0, '2022-08-04 05:34:42', '2022-08-04 05:34:42', '2023-08-03 22:34:42'),
('c29bd29afe4a2c9249d0f2375340827eefa2c4774180b3cab41b7b1311d175e025e419e0454d3ed6', 61, 3, 'API Token', '[]', 1, '2024-12-18 19:55:11', '2024-12-18 19:55:11', '2025-12-18 20:55:11'),
('c2d72ee79772248b756b6e9f173c7df8a1989794b1fdda9510ad694db722cde6367969e3bb0458f8', 43, 3, 'API Token', '[]', 0, '2022-09-11 22:51:26', '2022-09-11 22:51:26', '2023-09-11 15:51:26'),
('c3d32a4512719e3c529e8c65941057938f5d06255d63f3562b1f6c34572b4fc4e5b92a09d7144d2e', 55, 3, 'API Token', '[]', 0, '2024-08-01 18:28:08', '2024-08-01 18:28:08', '2025-08-01 20:28:08'),
('c405c20014daf8a7ab22da8ed3246ea90cc95b8e08d923e52ebe6ebcb70480dacde9d4576a4fea4a', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:12:12', '2022-06-12 11:12:12', '2023-06-12 13:12:12'),
('c4a68d4101c96448e0f4376aa96033908e111d16fa9d911c90b339f1dd7cc28c0b0021daa67ec162', 58, 3, 'API Token', '[]', 1, '2025-01-13 16:46:28', '2025-01-13 16:46:28', '2026-01-13 17:46:28'),
('c4bd42b210a1c37c7090d8d609609f758cb728b0865635d25a823ce41b6c64891f877f52df9ee66d', 57, 3, 'API Token', '[]', 1, '2024-09-12 12:25:07', '2024-09-12 12:25:07', '2025-09-12 14:25:07'),
('c4c20aa130ccc5ef0f1fdb3c88e369058fe2a3869ca6b83851ad6027b7a5d3a49389ff2e89c29381', 76, 3, 'API Token', '[]', 0, '2025-07-22 11:23:33', '2025-07-22 11:23:33', '2026-07-22 13:23:33'),
('c4d94f02098c06fa51aa89dc784d6a89fa634a774a5bfffd74713773c0d2294aeea5af4160fbec2f', 57, 3, 'API Token', '[]', 0, '2024-09-12 15:46:15', '2024-09-12 15:46:15', '2025-09-12 17:46:15'),
('c52d48cd7aaa1e8d919d90d846cb8959f760c799e10f9c40e9165e3ab89d1da6407a0581d7e7b8af', 76, 3, 'API Token', '[]', 0, '2025-09-23 03:58:03', '2025-09-23 03:58:03', '2026-09-23 05:58:03'),
('c53833f82d23b7aa5d1f3b133e6129c621e18d0e38e2ac7c5c71c7f911e79105d8915f4d245e8615', 61, 3, 'API Token', '[]', 1, '2024-12-18 19:50:22', '2024-12-18 19:50:22', '2025-12-18 20:50:22'),
('c563fbc868f4cdaefb30a4a14875f8340dbf957ccf1b4e95f355c29959a925efd477b40ba538cb3d', 43, 3, 'API Token', '[]', 1, '2022-09-11 22:46:46', '2022-09-11 22:46:46', '2023-09-11 15:46:46'),
('c6d4a0e8cf89d195e4eff9df9a3b153d69c101cdce2456ccd21402601d37ebfd0054e3f755103bf9', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:37:02', '2022-08-04 06:37:02', '2023-08-03 23:37:02'),
('c6fa5c46de66f0e304b69ee0119311c5abb1ec41ecbd9833092650f9da1e19ecbdeab9f8f0878427', 57, 3, 'API Token', '[]', 1, '2024-12-01 20:26:20', '2024-12-01 20:26:20', '2025-12-01 21:26:20'),
('c7848373745fc0127c169c72b29d2944dd2fbb370664d0c37eb1efa3289e65808637e0ccd5d7ec92', 43, 3, 'API Token', '[]', 0, '2022-09-11 05:17:15', '2022-09-11 05:17:15', '2023-09-10 22:17:15'),
('c822dd99e6343daf51fd3ec110a9b8d98e8c4ab5fac9ef2b85f87c96c52fc1a288b9cab83236ff37', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:20:52', '2022-08-25 04:20:52', '2023-08-24 21:20:52'),
('c851f39d47fa2481e9703ca31da293510c0e2898fecdc4c29a8953df496a1cea6073ec8969a79ed7', 57, 3, 'API Token', '[]', 0, '2024-10-13 18:43:06', '2024-10-13 18:43:06', '2025-10-13 20:43:06'),
('c8533215ddb5f4b09d83867f6288cb7a6f33424fb77699c7c5a4a7862dd88ca0e1cc4b748649b5a1', 57, 3, 'API Token', '[]', 0, '2024-10-19 10:47:28', '2024-10-19 10:47:28', '2025-10-19 12:47:28'),
('c8acb41de38b8b50ad6bf273b0169a74bc3fe762d3a5d18e349f3043ae75453401ef874609e5572e', 56, 3, 'API Token', '[]', 0, '2024-08-29 07:46:01', '2024-08-29 07:46:01', '2025-08-29 09:46:01'),
('c951480fc09cc4b5030758d30b99b419b93449890e88ad39af5e159d10a58bf2cda77399669b264f', 57, 3, 'API Token', '[]', 0, '2024-09-18 05:02:32', '2024-09-18 05:02:32', '2025-09-18 07:02:32'),
('c977a94305cbf28985db3f84aea7574e226aed61bce1bfc5e0a1cb3660e18f55c15508a122d54c32', 86, 3, 'API Token', '[]', 1, '2025-09-23 17:21:23', '2025-11-08 13:38:57', '2026-09-23 19:21:23'),
('ca9f299350d7f79e685caa65c70eeb8bda91fa7b17586700928a915fde630dad1c6c68744ce50ff5', 40, 3, 'API Token', '[]', 0, '2022-08-29 23:37:58', '2022-08-29 23:37:58', '2023-08-29 16:37:58'),
('cae39d0c2a962ea926748d9bd8cd79cd5851e6e4d9082667a373f9b5b82c74c719c85cdf77619a3f', 100, 3, 'API Token', '[]', 0, '2026-02-14 03:35:13', '2026-02-14 03:35:13', '2027-02-14 04:35:13'),
('cb28e5ff4236fbf7b2fe1c4a7ae934b9216bf999ab064bfcac3fe1289df90bbb79b4ba9b8bc42b38', 33, 3, 'API Token', '[]', 0, '2022-08-04 08:41:24', '2022-08-04 08:41:24', '2023-08-04 01:41:24'),
('cb8a6d0a4cc6c6a391db4fe7a49a87ad96d9ec261087db881ff21ccb217a668e7a95c7496d3c99b7', 57, 3, 'API Token', '[]', 0, '2024-10-13 12:53:57', '2024-10-13 12:53:57', '2025-10-13 14:53:57'),
('cc074117fd9f95efe615204457569e44e55095b0a742efe846b3a95f77c9e8c54b95ed746bcecddb', 61, 3, 'API Token', '[]', 1, '2024-12-18 19:48:33', '2024-12-18 19:48:33', '2025-12-18 20:48:33'),
('cc08dd21ebc6b20b29f0b512c2518d4e799de41d4acc3388013795d0ae490a636817c68d6c01a52c', 99, 3, 'API Token', '[]', 1, '2025-09-25 22:46:47', '2025-09-25 22:51:12', '2026-09-26 00:46:47'),
('cc099b2a73b99107792922b976c13cdc762ffb0cea682933c0f2c58151d50e1e011f13650f2e18d2', 68, 3, 'API Token', '[]', 0, '2025-04-12 15:00:18', '2025-04-12 15:00:18', '2026-04-12 17:00:18'),
('cc37eeec964da7fcc2e440a5cda6f3addd84538cf8abccd9acfc12c69c30fac543bd76dddb82324a', 101, 3, 'API Token', '[]', 0, '2026-02-14 04:35:43', '2026-02-14 04:35:43', '2027-02-14 05:35:43'),
('ccc2d85f5888967bd9653c79bbccf995e1eb04102728b666bb33918aa5a03c3a626833a8060999fd', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:35:46', '2022-08-04 06:35:46', '2023-08-03 23:35:46'),
('ccc4791bc988d919e7d2e78c5c35a24d5643bc28b8ed29684e2b73e3bad5063a67ea5e30e0378a4c', 55, 3, 'API Token', '[]', 1, '2024-08-01 12:29:10', '2024-08-01 12:29:10', '2025-08-01 14:29:10'),
('cccd6daf78a98a8a8b6571d09db038f6b0f54d4d3b78b295eccc8f7cddce65f7261190a362a313a0', 57, 3, 'API Token', '[]', 1, '2024-10-13 17:18:40', '2024-10-13 17:18:40', '2025-10-13 19:18:40'),
('cd68b550a958c39374a85d916af3e49b3fbcae8817a3b30a9cc1e75dbdd600a7d43f9e5a25b3f255', 62, 3, 'API Token', '[]', 0, '2025-03-16 20:21:38', '2025-03-16 20:21:38', '2026-03-16 22:21:38'),
('cd9b8c8d5c9ee0671cecd4450d20db04302f5869ecb9f3735717005911f82d94ce9d5bd31de8d4ba', 57, 3, 'API Token', '[]', 0, '2024-10-14 09:44:53', '2024-10-14 09:44:53', '2025-10-14 11:44:53'),
('cdd186c7396d1da921fe0c674d5e5b64d99803bcb5c886ae3317a9eda8cc801bcbc2efda1ebe4828', 55, 3, 'API Token', '[]', 0, '2024-07-29 21:08:14', '2024-07-29 21:08:14', '2025-07-29 23:08:14'),
('ce1308d41ed60dc6002b26f1a29678b75a46e390393d8906a03a3596de79cd37ecf4b832c1d5c41d', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:47:00', '2022-08-04 06:47:00', '2023-08-03 23:47:00'),
('ce1e53b80a6d9f95cdbf0cdaf43873a55c18631d80d777a881912a80c873cc10cbe43f0232693466', 57, 3, 'API Token', '[]', 0, '2024-10-14 13:45:07', '2024-10-14 13:45:07', '2025-10-14 15:45:07'),
('cea9984391750a246cc3361d829ac7351d3d1029ce1e21dd17ee219ef94e55d3f94197226075207c', 33, 3, 'API Token', '[]', 1, '2022-09-07 02:44:05', '2022-09-07 02:44:05', '2023-09-06 19:44:05'),
('cea9d9d15816e5ada6bf551f8d348a83d7a8806b30854865eec124096dcb095366ff756bf242d323', 57, 3, 'API Token', '[]', 0, '2024-12-10 23:19:32', '2024-12-10 23:19:32', '2025-12-11 00:19:32'),
('cecf22cd24bb5834411fa36eec14432bdf7d1cbbb36d8ab72cc633047c0699c43dd940daa612223b', 86, 3, 'API Token', '[]', 1, '2025-11-09 21:29:33', '2025-12-04 12:52:15', '2026-11-09 22:29:33'),
('d01cd3a390fef04ea9ee7b3f91adcca8abdfc9a24ba54c583a7a69b99be4b8e50889288f2ba0e242', 7, 3, 'API Token', '[]', 0, '2022-08-01 19:33:30', '2022-08-01 19:33:30', '2023-08-01 21:33:30'),
('d04c79a1a6143ed479fc071cb2d3184ffd7e36aeb3016d3aec80f4a3c3a5df3b7d192530b1272a1d', 33, 3, 'API Token', '[]', 0, '2022-08-04 08:46:07', '2022-08-04 08:46:07', '2023-08-04 01:46:07'),
('d092ce834b993a10f1a01c338cda20a732610c065f5bb531fd28e8fb7697f39a635e46ef22922f48', 57, 3, 'API Token', '[]', 1, '2024-10-22 16:34:55', '2024-10-22 16:34:55', '2025-10-22 18:34:55'),
('d0e06a96cdb27149e7a82ad5ce225ce7aa6ac591e6aec76552a9a134f1e4cd713c775d1d0e5a7637', 7, 3, 'API Token', '[]', 0, '2024-05-31 17:23:06', '2024-05-31 17:23:06', '2025-05-31 19:23:06'),
('d0feb6b586535dac149e61e0b8abd64593a8fd2093e9ed3e2630fb0cd5a246996e9e6e843e82d8f6', 57, 3, 'API Token', '[]', 0, '2024-10-13 18:31:48', '2024-10-13 18:31:48', '2025-10-13 20:31:48'),
('d10032eac69d3dec5cef4fc3c3a390d7408682b3731e8a72e4a56f2709569b1f9cb458cdc40a7a38', 55, 3, 'API Token', '[]', 0, '2024-07-11 07:03:26', '2024-07-11 07:03:26', '2025-07-11 09:03:26'),
('d20d1b6a2eca7a502f09c04cbd0762f16961069c4809809aa43d48148350fde967486ee0577bfdf3', 58, 3, 'API Token', '[]', 0, '2025-01-12 11:52:16', '2025-01-12 11:52:16', '2026-01-12 12:52:16'),
('d23cff8bed49ea53b492aba37fbd6a84fb6b01bca4413438608b1b12f18bbf04863f9ac22eab6f8b', 76, 3, 'API Token', '[]', 1, '2025-07-17 11:00:10', '2025-07-22 11:16:56', '2026-07-17 13:00:10'),
('d30ca8b80f459faa0d5b97aec4aa1101be6316ec9a648ebeaa2fb1c7e5d2081469aebb35744626a9', 43, 3, 'API Token', '[]', 1, '2022-09-11 22:44:21', '2022-09-11 22:44:21', '2023-09-11 15:44:21'),
('d383dfabff8c53ee893ca4148ee7e92a8f5abeec0cb69adc74d94f68d9270023703084e1547b2fc7', 33, 3, 'API Token', '[]', 0, '2022-09-14 16:12:09', '2022-09-14 16:12:09', '2023-09-14 09:12:09'),
('d43bacec1a86c3f31b2003cf793d423bec025d68213c19d227043d1780e377341591cdd151280049', 57, 3, 'API Token', '[]', 1, '2024-10-14 04:25:24', '2024-10-14 04:25:24', '2025-10-14 06:25:24'),
('d46f481a51b6f7827d3582784ee65d755dd30ae58321f8409eb41482c94dc45b69ad3423c9faa64c', 55, 3, 'API Token', '[]', 1, '2024-07-28 14:07:29', '2024-07-28 14:07:29', '2025-07-28 16:07:29'),
('d4b69c478f7db273b2b78ca24a9fb2cde679a9ca2bba5a708dcce2c78dbc3b0a837ab2eb78fe012c', 57, 3, 'API Token', '[]', 0, '2024-09-30 14:33:26', '2024-09-30 14:33:26', '2025-09-30 16:33:26'),
('d6a64a861fc56ce8983c64f703a11b5a339e199580319cecd13cfb77cfac5065af7cfaabc12fd45d', 7, 3, 'API Token', '[]', 0, '2022-08-08 22:35:38', '2022-08-08 22:35:38', '2023-08-08 15:35:38'),
('d6e0753b005319f7958687ee6f8ee29dcdbf61415b86abf6616b7a70e6cba7d4693bfc17d9ce5a61', 57, 3, 'API Token', '[]', 0, '2024-10-14 10:30:48', '2024-10-14 10:30:48', '2025-10-14 12:30:48'),
('d6febcb6824611176b1713ae4e380a1b7cb28a694f03ca147eda279894b87b41556398c2c98de38c', 75, 3, 'API Token', '[]', 0, '2025-06-23 07:12:42', '2025-06-23 07:12:42', '2026-06-23 09:12:42'),
('d72ba8726dce9f3565d002944c7338998265bbfb64c14af4cebc1f92824296782489b746cbbc8578', 33, 3, 'API Token', '[]', 0, '2022-11-28 21:14:11', '2022-11-28 21:14:11', '2023-11-28 14:14:11'),
('d77f15cc046fa7681004888214003eb8cd63428536e9de770e5a4911aa79953dce10a03fc2d60c31', 32, 3, 'API Token', '[]', 0, '2022-08-04 07:01:06', '2022-08-04 07:01:06', '2023-08-04 00:01:06'),
('d801da4987df71c0e783e4f3a0e2accec4441e9ae0507f02ba18df78d926881390ff891104970162', 33, 3, 'API Token', '[]', 0, '2022-08-23 18:10:53', '2022-08-23 18:10:53', '2023-08-23 11:10:53'),
('d8085e110363e7ec19657e875592cca45b939caaf7064633d61e6627a27db1de8c8ac3508030ed68', 43, 3, 'API Token', '[]', 1, '2022-09-22 22:33:40', '2022-09-22 22:33:40', '2023-09-22 15:33:40'),
('d823a5b8189878610ae7a26405b1a5fb50da47dea8048c609133d60ec13051941f851b7caf2c6346', 80, 3, 'API Token', '[]', 0, '2025-06-23 07:06:01', '2025-06-23 07:06:01', '2026-06-23 09:06:01'),
('d8977dcb04670f8f5a4ba76031282fb65515e59ad62cb217d5a6cf28aacec45c415faf7af592f89a', 61, 3, 'API Token', '[]', 0, '2024-12-18 14:44:23', '2024-12-18 14:44:23', '2025-12-18 15:44:23'),
('d8a97b35ccfc6ad726534589250d019f9c69e8322dd7d3f07b248d1f3442c7b44b81cd2ab168621e', 63, 3, 'API Token', '[]', 0, '2025-03-24 17:58:31', '2025-03-24 17:58:31', '2026-03-24 19:58:31'),
('d8c40cb458e05517ec8ad18d17246a7ecac0f26f0d0c46e7ae97385984a1099f0b77b6aaa727e021', 59, 3, 'API Token', '[]', 0, '2024-12-13 00:56:12', '2024-12-13 00:56:12', '2025-12-13 01:56:12'),
('d91e11820d421f4099c9736374448bebf4553c14062ab40fb3022448fb4513ac3b0629a91b2c2ff8', 86, 3, 'API Token', '[]', 0, '2025-09-23 13:21:39', '2025-09-23 13:21:39', '2026-09-23 15:21:39'),
('d93067842ebfbc271dff770027151a93ee2a2620b0ae771b1171543140403eac48864edd6ae0dd2f', 57, 3, 'API Token', '[]', 0, '2024-10-17 13:17:18', '2024-10-17 13:17:18', '2025-10-17 15:17:18'),
('d970f6d352c4ff3232337eb04bc3c2c5f54fd735f60b2ae8b5ea4a01af1c04038be8668f438d871b', 98, 3, 'API Token', '[]', 0, '2025-09-25 18:26:47', '2025-09-25 18:26:47', '2026-09-25 20:26:47'),
('d999af068dfc5dec19fe818e0c87ada340d99109207d12f1963eb53460e936dbe0e4799732642aac', 32, 3, 'API Token', '[]', 1, '2022-08-05 19:24:27', '2022-08-05 19:24:27', '2023-08-05 12:24:27'),
('da230422e5d1a5200d6d720e65893364f46d1feabf250c68646f3308b0047fe533a7e4683e4223bc', 1, 3, 'API Token', '[]', 0, '2022-08-23 01:01:45', '2022-08-23 01:01:45', '2023-08-22 18:01:45'),
('da5b505f0332d6c652ab3f224d249f9421999bea0a3722284d8045055f8e7dc430d5d74994cc22df', 57, 3, 'API Token', '[]', 1, '2024-12-11 04:58:02', '2024-12-11 04:58:02', '2025-12-11 05:58:02'),
('da6678288c9e67e1e0a7f4fa1a208b830e0738b5806961d039d98d5c5c2d72dcf6ea80b504adfd06', 76, 3, 'API Token', '[]', 1, '2025-06-22 16:16:15', '2025-09-15 15:56:45', '2026-06-22 18:16:15'),
('dafd742bafcf7480904ee39ff1c60fc01ff39a6307db5e6b7a4161a9b7fa9af00b2a449e9800f5f3', 32, 3, 'API Token', '[]', 1, '2022-08-17 04:28:30', '2022-08-17 04:28:30', '2023-08-16 21:28:30'),
('db573d25e2b99c682a4eb612a6c86ce909b875e65f7fdab647c53dd054cdbbe02ce885752495abcd', 97, 3, 'API Token', '[]', 0, '2025-11-05 16:25:41', '2025-11-05 16:25:41', '2026-11-05 17:25:41'),
('db91f82f195a7caf39d898c22df908ca563a6dd3c855e49a4a995acdfb182f75a0dcbc64eaa0cfb8', 55, 3, 'API Token', '[]', 0, '2024-07-29 18:27:23', '2024-07-29 18:27:23', '2025-07-29 20:27:23'),
('dbe37537785ac7b511db8e954ab6d7514ec30c3488569fa4d7d47bae41988d19a3d027ec241fe1ae', 7, 3, 'API Token', '[]', 0, '2024-06-02 13:16:00', '2024-06-02 13:16:00', '2025-06-02 15:16:00'),
('dc689fc90f0fc56258230ec9d354843ad646f824d0e493b9f8f1b2ba71f0dbb3023934390b4b769c', 86, 3, 'API Token', '[]', 0, '2025-09-23 14:26:17', '2025-09-23 14:26:17', '2026-09-23 16:26:17'),
('dc7ea5fd7934f9045366a02ec3e0ff9c1bd8e774913997e1886edf01f18dbf844c868683ce89389d', 33, 3, 'API Token', '[]', 1, '2022-08-25 04:40:35', '2022-08-25 04:40:35', '2023-08-24 21:40:35'),
('dcccf52468f1947e0b90f45d736038591279e181311750d19f2ae02a16a6c1b345f7c7b880c8ba9e', 89, 3, 'API Token', '[]', 1, '2025-09-23 15:04:23', '2025-09-23 15:05:26', '2026-09-23 17:04:23'),
('dcfa78bc670cef883204d82327ca1241e0db4b21803fe0da33c00a1fe1e2dbf8a7d7efa6690bd5fc', 58, 3, 'API Token', '[]', 0, '2025-01-13 17:50:40', '2025-01-13 17:50:40', '2026-01-13 18:50:40'),
('dd1e2e9d8f9048a7568a29163c5a0043ae68659733e161a52ad5a7cf77dc1b4cb8b688a073a7b22d', 75, 3, 'API Token', '[]', 0, '2025-06-12 06:41:24', '2025-06-12 06:41:24', '2026-06-12 08:41:24'),
('dd6b93c16a31bfa61a540923c8ca191ec37fd96f17fcaf32e69d10706ea3ce10204aa7598764cecb', 57, 3, 'API Token', '[]', 1, '2024-09-11 18:56:36', '2024-09-11 18:56:36', '2025-09-11 20:56:36'),
('de3955ba88840455fc7332c08fd3bbef0ebe59c1a8f21dd4a9edceeb99a111bdd985b559cab91465', 75, 3, 'API Token', '[]', 0, '2025-06-23 06:40:06', '2025-06-23 06:40:06', '2026-06-23 08:40:06'),
('dedf924e3db2e553bbb2a60a24f4e45a1bd87098d7ba743aef8d38cd6f8b9d15206cf3393186d3c1', 1, 3, 'Driver', '[]', 0, '2022-06-12 11:06:57', '2022-06-12 11:06:57', '2023-06-12 13:06:57'),
('df0be5397a6eadac86d6be9927fde4c68fe0fff65ab6c0b58f1a38019f1aaf45566d7f6a0145785d', 33, 3, 'API Token', '[]', 0, '2022-08-04 07:34:59', '2022-08-04 07:34:59', '2023-08-04 00:34:59'),
('df2391aa2fa1a60883b3e0be20a50fbdfbfe4a3bffb7cbbfa04b4aa8fcee3bd1ac842272e3491b48', 76, 3, 'API Token', '[]', 0, '2025-07-05 09:10:47', '2025-07-05 09:10:47', '2026-07-05 11:10:47'),
('df633810d1033dc5bb5ff6651d7933b857ebff55acd043ecad8219d3db52b2fdbc6073faa409a7cb', 30, 3, 'API Token', '[]', 0, '2022-08-04 06:12:22', '2022-08-04 06:12:22', '2023-08-03 23:12:22'),
('df9fbd7e472dadb54e56f7d5d91183c3a85c29fd6585907bb91a50368dc5c4123d325b36dae73d4d', 86, 3, 'API Token', '[]', 1, '2025-11-07 20:46:02', '2025-11-07 20:46:09', '2026-11-07 21:46:02'),
('e002f012551e7dc43e28f28528fb04f7319e15d2a092a9075438c51fdae8686af632009d06fdae95', 73, 3, 'API Token', '[]', 0, '2025-06-07 11:31:29', '2025-06-07 11:31:29', '2026-06-07 13:31:29'),
('e0c370ea10feb39fd74951b46cb4d971303cd45c903826b54066b678c96639c9cf02b915bc220a81', 76, 3, 'API Token', '[]', 0, '2025-09-23 17:19:27', '2025-09-23 17:19:27', '2026-09-23 19:19:27'),
('e0dae5006ede66bfd5d3a06bf5edaaf62dc9243b742ad961645ebaf1624dfa01c5439c88865b8b92', 86, 3, 'API Token', '[]', 1, '2025-11-09 21:09:35', '2025-11-09 21:20:30', '2026-11-09 22:09:35'),
('e0e70bc272d72b4bb9ef63438994b821767020400d418135dbcaa42e5efda3423fd8332501e500b1', 59, 3, 'API Token', '[]', 0, '2024-12-15 17:18:26', '2024-12-15 17:18:26', '2025-12-15 18:18:26'),
('e0e7f905db3fe84b34eff58e610e447e52b40acd4b6eca23cdab9735c7930e3a91c82a2efd787ad1', 59, 3, 'API Token', '[]', 1, '2024-12-17 20:14:08', '2024-12-17 20:14:08', '2025-12-17 21:14:08'),
('e10a2e0e2e374bb78348b979d4d6803216fa203f64b32ca01b63efad443ecbf0cb623a79c33c707b', 57, 3, 'API Token', '[]', 0, '2024-09-25 18:44:35', '2024-09-25 18:44:35', '2025-09-25 20:44:35'),
('e18f72ed27481d68310fc8cf5c19603d29662f401d2a1938d3bd75ba83a8a1627a6421234ac5c1ff', 33, 3, 'API Token', '[]', 0, '2022-09-18 00:50:30', '2022-09-18 00:50:30', '2023-09-17 17:50:30'),
('e221fc14a745324265c70034eff44281af138e3eaf7d0fbcd3c307943f4a8805e40321ac922dc1e4', 40, 3, 'API Token', '[]', 0, '2022-08-31 16:20:22', '2022-08-31 16:20:22', '2023-08-31 09:20:22'),
('e2679e35b8b94bd4116fa23b0d4b1bd58bd9de9ee46eb951bae4282312addf1e694862bc89e3e849', 58, 3, 'API Token', '[]', 0, '2024-12-16 20:06:30', '2024-12-16 20:06:30', '2025-12-16 21:06:30'),
('e2bcd10f2916cc53a33a9dc03bc6b0786f2f05b61df017ee4ebf103e72e9f7c7cfa2671196d546d1', 76, 3, 'API Token', '[]', 1, '2025-09-23 14:41:40', '2025-09-23 14:42:43', '2026-09-23 16:41:40'),
('e381f13019be484cf5ccfddd14e531014d139559eb884965c62d5286ba9d6f316dddeae4553f8346', 97, 3, 'API Token', '[]', 0, '2025-10-22 13:25:52', '2025-10-22 13:25:52', '2026-10-22 15:25:52'),
('e412d2837404e22122c1fa53a3c879b11b643ee5ecc570fca09d26ee5d1d4e02ad9dc0adfe34beb3', 50, 3, 'API Token', '[]', 0, '2024-06-02 12:27:16', '2024-06-02 12:27:16', '2025-06-02 14:27:16'),
('e4324c2d9715de7ab4c86ee32d5526f5ad4a288e8e7adbe365b86364263d4d2ec7d3dbb9b321d752', 86, 3, 'API Token', '[]', 1, '2025-11-05 18:50:30', '2025-11-06 12:26:42', '2026-11-05 19:50:30'),
('e4984055dfef048902915e4fcc6a36aea1667941c2fb65444d912224c12c8ecc88bc75efbafd34a1', 49, 3, 'API Token', '[]', 0, '2024-05-22 17:07:54', '2024-05-22 17:07:54', '2025-05-22 20:07:54'),
('e5046c1677d3fd21cf6a20b76627b15d531cff1181aef0c7a8e0a24aee6efc15bb3ee1670bf23532', 57, 3, 'API Token', '[]', 0, '2024-10-23 09:11:51', '2024-10-23 09:11:51', '2025-10-23 11:11:51'),
('e606a99a700d51185027ffacd6b1ca48f7b992974e2fc1cb888c9a0000e3514995ee5ff13ef03ae1', 57, 3, 'API Token', '[]', 0, '2024-10-20 18:09:28', '2024-10-20 18:09:28', '2025-10-20 20:09:28'),
('e65204af4158e13d6e8b03dbc2464555471b078d1465246b43f65ce2a12760570a91c382f941043e', 57, 3, 'API Token', '[]', 0, '2024-10-13 17:03:23', '2024-10-13 17:03:23', '2025-10-13 19:03:23'),
('e7de6ee484f35c71d5908c96fc47020b7e22de3d922e7aab86392970c0be4b3d4d584dc974ba6d5a', 1, 3, 'API Token', '[]', 0, '2022-08-23 00:29:14', '2022-08-23 00:29:14', '2023-08-22 17:29:14'),
('e7f2b79058109102d92c9f358b47d632027a20463840d7dd6a54d1a4c722eb32d4d971636d384a1a', 33, 3, 'API Token', '[]', 0, '2023-12-07 00:04:24', '2023-12-07 00:04:24', '2024-12-06 17:04:24'),
('e81326830c8f7607071b9fbcfa7025db0699c7bfa9790202398a6c033d81ea055863f6eb2edca7a1', 57, 3, 'API Token', '[]', 0, '2024-09-17 19:10:34', '2024-09-17 19:10:34', '2025-09-17 21:10:34'),
('e81a4149c7104dcbb3d9e8037cb3fc523812190c10f4d2c2dccc7a4bb9f47b04eb9f6a2aeed4ee7f', 86, 3, 'API Token', '[]', 1, '2025-10-23 15:57:27', '2025-10-23 17:21:26', '2026-10-23 17:57:27'),
('e9217979dac4e306c56538fb1981936915ec97499ef638f3bf4ac0a04fe52fb484479dcee5c4f4db', 61, 3, 'API Token', '[]', 0, '2024-12-18 22:59:51', '2024-12-18 22:59:51', '2025-12-18 23:59:51'),
('e9d3044e1a396b0dc04d10e0af48b79128ecdd7275fa2f310ac378a7145fe15d99339ca2f2031e3f', 55, 3, 'API Token', '[]', 0, '2024-07-11 08:38:43', '2024-07-11 08:38:43', '2025-07-11 10:38:43'),
('e9d75913e14fff57fc2aaa2c2e788216edbd5a3e67fad2441fb980ff81d53d6fb27d8fd03e26a187', 43, 3, 'API Token', '[]', 0, '2022-09-11 04:34:54', '2022-09-11 04:34:54', '2023-09-10 21:34:54'),
('e9fc3bb3484e5ff0b443d8ffc15163d243e2c3c376b07cc53c5264516e2678109d696e3bc1a18ccd', 57, 3, 'API Token', '[]', 0, '2024-10-19 10:46:04', '2024-10-19 10:46:04', '2025-10-19 12:46:04'),
('ea0436a2c432a070da769d1c302d8cd132dafd179ca6ebb4755f97d15d685b69c4bc7c9032462cde', 76, 3, 'API Token', '[]', 1, '2025-07-22 11:44:26', '2025-07-22 11:45:33', '2026-07-22 13:44:26'),
('ea273e3c54ec975d604ce99e632b0b698b33495ef045b37913853e289290bfd687664b5503b2775d', 94, 3, 'API Token', '[]', 0, '2025-11-06 09:42:30', '2025-11-06 09:42:30', '2026-11-06 10:42:30'),
('eb26ce70dc938db9640370b3323e5fcd8a8bca30ca1a024889cd0788a9fd93ee7ceca11fa3398857', 85, 3, 'API Token', '[]', 0, '2025-08-17 19:06:16', '2025-08-17 19:06:16', '2026-08-17 21:06:16'),
('eb2d6387c554509cc8caf3de4f9332177d24fd477fd2e7b6428f0adad47692acfea2b0224acd84dd', 57, 3, 'API Token', '[]', 0, '2024-12-08 19:56:15', '2024-12-08 19:56:15', '2025-12-08 20:56:15'),
('eb9bfb7f9caad9f5ba49e3d321e5dd2e1d61a52358b90e22fa9a7b84882d372ce3fc6c5486d9f2e8', 86, 3, 'API Token', '[]', 0, '2025-11-26 00:00:39', '2025-11-26 00:00:39', '2026-11-26 01:00:39'),
('ec2bd99001395db8884d324deac94bbe815722be8520f53218620bfd904608a7112ef62433f78035', 73, 3, 'API Token', '[]', 0, '2025-06-08 17:32:24', '2025-06-08 17:32:24', '2026-06-08 19:32:24'),
('ec84c14801fbfc45421448c7754f76fb5b4ec86e62aef8802ae53fbfcfa65be2d68365afccddd6c4', 97, 3, 'API Token', '[]', 0, '2025-10-23 07:27:34', '2025-10-23 07:27:34', '2026-10-23 09:27:34'),
('ecacc6bd904c666f905039278aa65847e1227a4454985a4c36c6d4e85c8610ce95e90fa7689d883b', 7, 3, 'API Token', '[]', 0, '2022-08-20 16:39:50', '2022-08-20 16:39:50', '2023-08-20 09:39:50'),
('ecd421cbef810460f24d28648939e651228c3cb861d7d9959d66524fac491b2e59f718f6fa6e5ace', 41, 3, 'API Token', '[]', 1, '2022-08-29 23:44:27', '2022-08-29 23:44:27', '2023-08-29 16:44:27'),
('ed2cf173dcee023e7e72137fd08ad65226e13063a0d3c89af898de88b41871e4ce1abbf69882cd20', 33, 3, 'API Token', '[]', 1, '2022-08-24 03:02:50', '2022-08-24 03:02:50', '2023-08-23 20:02:50'),
('ede6533f01e2e7888f0913e9d052a05679718935ba8be3cb89277bd11ca9c70c0ccdacc61668c18e', 19, 3, 'API Token', '[]', 0, '2022-08-04 05:41:25', '2022-08-04 05:41:25', '2023-08-03 22:41:25'),
('ee0c16691c6b9b35113ac288bec21fb27892cae3aaa0d166e3662c8ff28a75e32c3a07bc74828bb5', 7, 3, 'API Token', '[]', 0, '2024-05-31 17:20:36', '2024-05-31 17:20:36', '2025-05-31 19:20:36'),
('ee2abecd13b2b43a9790766fce82fe53889d35e0f4b2b770fc185751679591600812ddfd19fb178b', 57, 3, 'API Token', '[]', 0, '2024-10-12 13:57:27', '2024-10-12 13:57:27', '2025-10-12 15:57:27'),
('ee51e712ec4a303ef7c65f34ac4991051ccbdff81ba3779b6ca6b1bc7f81f50d6f431a110b0f526f', 55, 3, 'API Token', '[]', 0, '2024-07-09 10:08:19', '2024-07-09 10:08:19', '2025-07-09 12:08:19'),
('ee9deba82fd77a047dae54b2975dcf6da28cb67ebd20606e54c2470fbdb8d8d85f6a52f1d6e27141', 33, 3, 'API Token', '[]', 0, '2022-09-09 05:20:15', '2022-09-09 05:20:15', '2023-09-08 22:20:15'),
('eed54c5eb8b0626064b9693cd3d8d2accc3ae11a93359dcc327b51f1eb06e460d8d6cb3e26d66b14', 59, 3, 'API Token', '[]', 0, '2024-12-18 13:14:03', '2024-12-18 13:14:03', '2025-12-18 14:14:03'),
('f0c9eb364f9e29945541f237b0990a876ae2e60dfe4b6cf38445a6e752fd6eb70360a1d5504d57d7', 39, 3, 'API Token', '[]', 0, '2022-08-25 03:56:51', '2022-08-25 03:56:51', '2023-08-24 20:56:51'),
('f0f89ee597881f5aeef3ac18570b397b654f43755b9120e3f3a8e0d02b418bd84b8bbe3d8288b99d', 7, 3, 'API Token', '[]', 0, '2022-08-25 03:57:46', '2022-08-25 03:57:46', '2023-08-24 20:57:46'),
('f1b84deec52282efbdacf084e2edfff11615cb91a6120479c85313b03fc59f8c34816c1658adaba9', 76, 3, 'API Token', '[]', 1, '2025-07-22 11:46:32', '2025-07-22 11:46:39', '2026-07-22 13:46:32'),
('f27358510334f762f1d1c825bd36514016e84bc1ea00a42f17b38cc9783a13fd89675414bb262c4b', 86, 3, 'API Token', '[]', 0, '2025-10-27 17:28:30', '2025-10-27 17:28:30', '2026-10-27 18:28:30'),
('f301480f69fd624983fac671a4b8b05597161915509184d12b3decd54173743c5b0ad9ff21145282', 57, 3, 'API Token', '[]', 0, '2024-10-07 15:23:25', '2024-10-07 15:23:25', '2025-10-07 17:23:25'),
('f3e79a7d05f321abc1bda5f9c9f8216538505638215525b2426eaab65a2c73c816729d0c4cd7ac22', 57, 3, 'API Token', '[]', 0, '2024-12-09 19:14:00', '2024-12-09 19:14:00', '2025-12-09 20:14:00'),
('f41e2d26f063284aa33d6686296be841c570e7bba47445162c98271f1fcbdc70ac496c73e5da3585', 57, 3, 'API Token', '[]', 0, '2024-10-16 06:40:25', '2024-10-16 06:40:25', '2025-10-16 08:40:25'),
('f456968a7df8107150ccbceb3feacf9cad7dfcfb28aee6ca5c211b118d02d16c6435d3c819770966', 27, 3, 'API Token', '[]', 0, '2022-08-04 06:06:58', '2022-08-04 06:06:58', '2023-08-03 23:06:58'),
('f4662436f7083ef246e056caf6e1c36956ed43c6a76bd7bfe0c720cd00e963ce8a03d8c4c79d586d', 22, 3, 'API Token', '[]', 0, '2022-08-04 05:55:24', '2022-08-04 05:55:24', '2023-08-03 22:55:24'),
('f4be8d53fb714fe729e6969a6a7ba479502bc0fd78a879709d59c3dfd58ca8e3c4ef2376e7dd611f', 61, 3, 'API Token', '[]', 1, '2024-12-20 19:36:57', '2024-12-20 19:36:57', '2025-12-20 20:36:57'),
('f4e6f65344f94f0f3f597d44ab9064e1ae3eb1cc519730c8c9702bc60acbbd18e16ace1688a4970a', 56, 3, 'API Token', '[]', 0, '2024-08-28 18:25:57', '2024-08-28 18:25:57', '2025-08-28 20:25:57'),
('f4fb43b7b703a076264d426c10e0c4e04d02446976f51bb6b786916afbaa2ee9865af31fadee18c6', 55, 3, 'API Token', '[]', 1, '2024-07-09 10:19:14', '2024-07-09 10:19:14', '2025-07-09 12:19:14'),
('f4fe3d828c567faf2e2adb748f0a6c7e4efdb44e4cef235d06cd0fcc3be38c8e1f68d4bda67f568d', 57, 3, 'API Token', '[]', 0, '2024-10-21 17:03:36', '2024-10-21 17:03:36', '2025-10-21 19:03:36'),
('f524607d2cc1cccf92411d83ea0f028e18deffbdcfe4e63782a20f19086379556ebce239cc4ccb8f', 57, 3, 'API Token', '[]', 1, '2024-09-11 18:01:20', '2024-09-11 18:01:20', '2025-09-11 20:01:20'),
('f5a37dcc73a9b009351a6d7ec21749aab1dd88b2dc0dd6938a3d2f6e5cc49a4325af165b42300aa7', 97, 3, 'API Token', '[]', 1, '2025-10-12 20:42:23', '2025-10-12 20:43:39', '2026-10-12 22:42:23'),
('f5d9c1cbcd3616507b636070b6e65811c58f7be680de6e444de3c9c83775399968611aa061cb4433', 7, 3, 'API Token', '[]', 0, '2024-05-29 13:23:12', '2024-05-29 13:23:12', '2025-05-29 15:23:12'),
('f5dce77ef4019a151c313925cb863a2d1b0300b94ad6a23ae5ff9e27c89b4b1ad21ef864bd88bda1', 57, 3, 'API Token', '[]', 0, '2024-11-25 18:01:12', '2024-11-25 18:01:12', '2025-11-25 19:01:12'),
('f699d804992da9bdaed41f9933530d0f9ee09a7ef2ec61aef41e5c225faa5a375a84f451b05fc23b', 7, 3, 'API Token', '[]', 0, '2022-07-24 19:19:28', '2022-07-24 19:19:28', '2023-07-24 21:19:28'),
('f6fca6964855633806db1f2959f25fc15bef4454cbd67efeb9bc11bdd2f37678fe33ccd769828f1d', 42, 3, 'API Token', '[]', 0, '2022-09-03 03:04:36', '2022-09-03 03:04:36', '2023-09-02 20:04:36'),
('f7475db4458bbb3cdead5b2acdd3213ce33670799f8480b9fba249a600546f02fa13ec8efaba2b9c', 76, 3, 'API Token', '[]', 1, '2025-08-30 14:03:00', '2025-08-30 14:03:52', '2026-08-30 16:03:00'),
('f7743a7052797b83526bc2aaab7fb5c92f5aa80e1e7b0ab2d481e83a85908250210db7ee71d5ae91', 7, 3, 'API Token', '[]', 0, '2022-08-21 03:11:06', '2022-08-21 03:11:06', '2023-08-20 20:11:06'),
('f7f7b636436938c9fc6f2ea919e7a585d17f9aa6ee85009e3d0d2b1001c2a77bdeab7222fd5a242d', 55, 3, 'API Token', '[]', 1, '2024-07-08 21:40:33', '2024-07-08 21:40:33', '2025-07-08 23:40:33'),
('f8067782b9b2dd0ebf39765870de1e418f6458fb7f24febce90b00a88ee382b64bb5bb8251fa4340', 72, 3, 'API Token', '[]', 0, '2025-06-07 11:16:29', '2025-06-07 11:16:29', '2026-06-07 13:16:29'),
('f838d82ecdc28c3deffd113019e6f1ba65e9b600ec5b250f1b1257d4d00a28b4eccb339e65def7a5', 57, 3, 'API Token', '[]', 0, '2024-12-09 13:55:20', '2024-12-09 13:55:20', '2025-12-09 14:55:20'),
('f9394554c004f6091dab54a36def82d2ff65e89cbdd14c1e74dba6fe2c74416fd93b06c011e43428', 55, 3, 'API Token', '[]', 0, '2024-08-05 15:20:15', '2024-08-05 15:20:15', '2025-08-05 17:20:15'),
('f990ae0c4f3e66122cd20cfebe827815cdc85753bbd7650796a1b3444b04173e8909f33d064448d0', 58, 3, 'API Token', '[]', 0, '2024-12-11 17:26:45', '2024-12-11 17:26:45', '2025-12-11 18:26:45'),
('f9c1565a40727af5a60a48e6704dc336862689429f68f65234c2f29f0abb3c107ba8560e287dd447', 55, 3, 'API Token', '[]', 0, '2024-08-21 12:45:43', '2024-08-21 12:45:43', '2025-08-21 14:45:43'),
('f9c3ec51881f385fd803610a37d4edef349a2c814546b57fcaac8b7795c137de3f561bd91ec41d0b', 96, 3, 'API Token', '[]', 1, '2025-10-09 00:29:51', '2025-10-09 01:07:08', '2026-10-09 02:29:51'),
('faa7200855d4daab849e55028458fce443e2b518a249ee4e8e262c039e21df1c97894545996beecf', 13, 3, 'API Token', '[]', 0, '2022-08-04 05:27:56', '2022-08-04 05:27:56', '2023-08-03 22:27:56'),
('fab2901a5bd310fedbe9880e452bd4e8fbb4152732db16f4f9352395631260c09cf5008985faf4a3', 32, 3, 'API Token', '[]', 0, '2022-08-04 06:52:03', '2022-08-04 06:52:03', '2023-08-03 23:52:03'),
('fc50e25b183d6d2170275f43ad227260cf28e2641f48ca1a842896c60a03f1ea2b2c1f5d8d8147ed', 51, 3, 'API Token', '[]', 0, '2024-06-08 17:12:06', '2024-06-08 17:12:06', '2025-06-08 19:12:06'),
('fc636dad61bad84f5b3574279bdde13ca0b61b674ee482b32274548865689360e8df4a8ebb60aa9f', 43, 3, 'API Token', '[]', 0, '2022-09-11 21:56:02', '2022-09-11 21:56:02', '2023-09-11 14:56:02'),
('fcafa6a06e04112466a6dbc30a27ac063195c0c637207a3bfd464101e14c38d62396367628614b76', 25, 3, 'API Token', '[]', 0, '2022-08-04 05:59:58', '2022-08-04 05:59:58', '2023-08-03 22:59:58'),
('fcf59d008054a0da2cf68d72742d6f8174015d3e9f243e7812e8094e6c7fd38c86b141f5454fe5be', 73, 3, 'API Token', '[]', 0, '2025-06-09 10:05:50', '2025-06-09 10:05:50', '2026-06-09 12:05:50'),
('fd25d296555244ea98e17b343abcc5028682d7e89a1be6ee267da0e7d56bd9f28743ae7d0e7b4a1d', 55, 3, 'API Token', '[]', 0, '2024-07-11 08:32:46', '2024-07-11 08:32:46', '2025-07-11 10:32:46'),
('fdfdd198ef29a3e5e23bd65ea5e273ef17e8e7d00afa3da4ef053c204680b46f54cd290fa116ee99', 57, 3, 'API Token', '[]', 0, '2024-10-21 14:38:45', '2024-10-21 14:38:45', '2025-10-21 16:38:45'),
('fe397f7e077aff10b177278655dc07af46db515e61de96f9ef5fae6e75884e68b896e9f18b65ba44', 33, 3, 'API Token', '[]', 0, '2022-09-18 00:51:22', '2022-09-18 00:51:22', '2023-09-17 17:51:22'),
('feb1d4b523040b38f4e9e2aa4b032f55215e7c5b03d72143b17ac78190a173e3ede7e484ab79fca3', 76, 3, 'API Token', '[]', 0, '2025-09-23 09:01:54', '2025-09-23 09:01:54', '2026-09-23 11:01:54'),
('fee76e8eda5d0c0992cc1aee10da55dfe2801534623a73302965607dbd640c4b7734a1fb1c8480b9', 63, 3, 'API Token', '[]', 0, '2025-03-24 18:02:26', '2025-03-24 18:02:26', '2026-03-24 20:02:26'),
('ff259c83f28f956790bc3d31216e8e5e8ddead425c2602a4e42cd097c4a4a2700fdd95872422bc5b', 55, 3, 'API Token', '[]', 1, '2024-07-30 15:59:11', '2024-07-30 15:59:11', '2025-07-30 17:59:11'),
('ffe8fbc9edb3e2c24ae374258f8dc21d1fbc74e2e8f237d55be199896d0b06fcf8ff2ca36bee69bb', 97, 3, 'API Token', '[]', 1, '2025-09-23 20:21:07', '2025-09-24 16:29:45', '2026-09-23 22:21:07'),
('fff3df3eed5df791671874c7b9df6f41e9b2a811f7fe97c2d7bb49f21eb68a9bbfc9b1aa84625b98', 76, 3, 'API Token', '[]', 0, '2025-06-22 16:14:38', '2025-06-22 16:14:38', '2026-06-22 18:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dreams Personal Access Client', '0QX9gGvzfGr4Ty2dCMgcqSfAoV2gpAtEd4vPZ9Yx', NULL, 'http://localhost', 1, 0, 0, '2022-06-12 10:25:14', '2022-06-12 10:25:14'),
(2, NULL, 'Dreams Password Grant Client', 'oT6wUk4juGFPMWsoM2qDn7GPWiS66S17x3Vtk0Xw', 'users', 'http://localhost', 0, 1, 0, '2022-06-12 10:25:14', '2022-06-12 10:25:14'),
(3, NULL, 'Dreams Personal Access Client', '7cDUzoBfMT3X4u8UrxhKEPAi4PiajNSdDY5xrOcj', NULL, 'http://localhost', 1, 0, 0, '2022-06-12 10:58:33', '2022-06-12 10:58:33'),
(4, NULL, 'Dreams Password Grant Client', 'VRwbjpCjDkUFsmqpKkgWycXmNR1eiuGkASnxlG2y', 'users', 'http://localhost', 0, 1, 0, '2022-06-12 10:58:33', '2022-06-12 10:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-12 10:25:14', '2022-06-12 10:25:14'),
(2, 3, '2022-06-12 10:58:33', '2022-06-12 10:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('order','basket') NOT NULL,
  `order_number` char(20) NOT NULL DEFAULT '0',
  `status` enum('confirmed','order_placed','out_for_delivery','cancel','delivered','shipped') NOT NULL DEFAULT 'order_placed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL DEFAULT '0',
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'PENDING',
  `delivery_time` timestamp NULL DEFAULT NULL,
  `actual_delivery_time` timestamp NULL DEFAULT NULL,
  `out_for_delivery_time` timestamp NULL DEFAULT NULL,
  `shipped_time` timestamp NULL DEFAULT NULL,
  `confirmed_time` timestamp NULL DEFAULT NULL,
  `cancel_time` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bill_url` varchar(255) DEFAULT NULL,
  `delivery_fee` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `order_number`, `status`, `user_id`, `seller_id`, `driver_id`, `address_id`, `total_price`, `payment_type`, `payment_status`, `delivery_time`, `actual_delivery_time`, `out_for_delivery_time`, `shipped_time`, `confirmed_time`, `cancel_time`, `file`, `reason`, `created_at`, `updated_at`, `bill_url`, `delivery_fee`) VALUES
(34, 'order', '10034', 'delivered', 7, 4, 1, 6, '120', 'cash', 'PENDING', '2022-07-20 07:40:00', '2024-10-29 11:07:57', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-04 04:43:02', '2025-03-02 15:26:08', NULL, 100),
(35, 'order', '10035', 'delivered', 7, 3, 1, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', '2024-12-02 16:52:04', NULL, NULL, NULL, NULL, 'uploads/products/1659561270838.jpg', NULL, '2022-08-04 04:45:43', '2025-03-02 15:26:08', NULL, 100),
(36, 'order', '10036', 'cancel', 7, 3, NULL, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, '2024-12-02 16:24:05', '2025-03-25 21:05:43', NULL, NULL, '2022-08-15 00:59:22', '2025-03-25 21:05:43', NULL, 100),
(37, 'order', '10037', 'cancel', 7, 3, NULL, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, NULL, '2024-12-02 16:25:02', NULL, NULL, '2022-08-15 01:24:04', '2025-03-02 15:26:08', NULL, 100),
(44, 'order', '10044', 'cancel', 7, 3, NULL, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, NULL, '2024-12-02 16:25:07', NULL, NULL, '2022-08-16 22:57:11', '2025-03-02 15:26:08', NULL, 100),
(54, 'order', '10054', 'order_placed', 7, 3, NULL, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16 23:06:13', '2025-03-02 15:26:08', NULL, 100),
(57, 'order', '10057', 'order_placed', 7, 3, NULL, 6, '150', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-17 00:36:37', '2025-03-02 15:26:08', NULL, 100),
(62, 'order', '10062', 'confirmed', 7, 3, NULL, 6, '90', 'cash', 'PENDING', '2022-07-20 07:40:00', NULL, NULL, NULL, '2024-12-02 16:24:14', NULL, NULL, NULL, '2022-08-17 00:39:52', '2025-03-02 15:26:08', NULL, 100),
(63, 'order', '10063', 'order_placed', 7, 3, NULL, 6, '50', 'cash', 'PENDING', '2022-08-16 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-17 01:17:09', '2025-03-02 15:26:08', NULL, 100),
(66, 'order', '10066', 'cancel', 33, 4, NULL, 1, '80', 'cash', 'PENDING', '2022-08-23 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-23 18:12:28', '2025-03-02 15:26:08', NULL, 100),
(67, 'order', '10067', 'cancel', 33, 3, NULL, 1, '130', 'cash', 'PENDING', '2022-08-24 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-23 18:18:03', '2025-03-02 15:26:08', NULL, 100),
(68, 'order', '10068', 'order_placed', 33, 4, NULL, 1, '80', 'cash', 'PENDING', '2022-08-23 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 03:03:48', '2025-03-02 15:26:08', NULL, 100),
(69, 'order', '10069', 'order_placed', 33, 4, NULL, 1, '60', 'cash', 'PENDING', '2022-08-25 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24 03:05:56', '2025-03-02 15:26:08', NULL, 100),
(70, 'order', '10070', 'order_placed', 33, 3, NULL, 1, '50', 'cash', 'PENDING', '2022-11-02 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 05:56:34', '2025-03-02 15:26:08', NULL, 100),
(110, 'order', '10110', 'order_placed', 33, 3, NULL, 1, '105', 'cash', 'PENDING', '2022-11-02 07:00:00', NULL, NULL, NULL, NULL, NULL, 'uploads/sections/1667349830174.jpg', NULL, '2022-11-02 07:43:50', '2025-03-02 15:26:08', NULL, 100),
(114, 'order', '10114', 'cancel', 52, 3, NULL, NULL, '550', 'cash', 'PENDING', '2022-07-19 22:40:00', NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2024-06-08 17:52:09', '2025-03-02 15:26:08', NULL, 100),
(115, 'order', '10115', 'order_placed', 51, 3, NULL, NULL, '3410', 'cash', 'PENDING', '2022-07-19 22:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-25 19:48:38', '2025-03-02 13:29:43', 'invoices/invoice_115_1740929383.pdf', 100),
(117, 'order', '10117', 'order_placed', 51, 3, NULL, NULL, '110', 'cash', 'PENDING', '2022-07-19 22:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-01 16:40:28', '2025-03-02 15:26:08', NULL, 100),
(118, 'order', '10118', 'cancel', 55, 3, NULL, NULL, '330', 'cash', 'PENDING', '2022-07-19 22:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-03 18:42:00', '2025-03-02 15:26:08', NULL, 100),
(119, 'order', '10119', 'cancel', 55, 3, NULL, NULL, '220', 'cash', 'PENDING', '2024-07-06 16:57:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 09:09:17', '2025-03-02 15:26:08', NULL, 100),
(120, 'order', '10120', 'order_placed', 55, 3, NULL, NULL, '11', 'cash', 'PENDING', '2024-07-07 16:31:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-07 13:30:52', '2025-03-02 15:26:08', NULL, 100),
(121, 'order', '10121', 'order_placed', 55, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-07-08 23:54:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 20:37:36', '2025-03-02 15:26:08', NULL, 100),
(122, 'order', '10122', 'order_placed', 55, 3, NULL, NULL, '330', 'cash', 'PENDING', '2024-07-11 11:35:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-09 10:40:15', '2025-03-02 15:26:08', NULL, 100),
(123, 'order', '10123', 'order_placed', 55, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-07-14 18:32:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-14 15:32:19', '2025-03-02 15:26:08', NULL, 100),
(124, 'order', '10124', 'order_placed', 55, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-07-15 13:16:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-14 17:16:37', '2025-03-02 15:26:08', NULL, 100),
(125, 'order', '10125', 'order_placed', 55, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-07-17 13:24:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15 10:22:13', '2025-03-02 15:26:08', NULL, 100),
(126, 'order', '10126', 'order_placed', 55, 3, NULL, NULL, '242', 'cash', 'PENDING', '2024-07-17 10:56:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:52:22', '2025-03-02 15:26:08', NULL, 100),
(127, 'order', '10127', 'cancel', 55, 3, NULL, NULL, '0', 'cash', 'PENDING', '2024-08-05 16:03:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-28 16:19:28', '2025-03-02 15:26:08', NULL, 100),
(128, 'basket', '10128', 'order_placed', 55, 3, NULL, NULL, '781', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-04 12:08:22', '2025-03-02 15:26:08', NULL, 100),
(129, 'basket', '10129', 'order_placed', 52, 3, NULL, NULL, '110', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-05 14:15:08', '2025-03-02 15:26:08', NULL, 100),
(130, 'order', '10130', 'cancel', 56, 3, NULL, NULL, '220', 'cash', 'PENDING', '2022-07-19 22:40:00', NULL, NULL, NULL, NULL, NULL, NULL, 'احراج', '2024-08-28 18:26:16', '2025-03-02 15:26:08', NULL, 100),
(131, 'basket', '10131', 'order_placed', 56, 3, NULL, NULL, '110', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-11 06:06:36', '2025-03-02 15:26:08', NULL, 100),
(132, 'order', '10132', 'cancel', 57, 3, NULL, NULL, '253', 'cash', 'PENDING', '2024-10-18 16:47:58', NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2024-09-11 18:02:07', '2025-03-02 15:26:08', NULL, 100),
(133, 'order', '10133', 'cancel', 57, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-10-20 21:03:51', NULL, NULL, NULL, NULL, NULL, NULL, 'كيفي', '2024-10-20 18:03:41', '2025-03-02 15:26:08', NULL, 100),
(134, 'order', '10134', 'cancel', 57, 3, NULL, NULL, '0', 'cash', 'PENDING', '2024-10-25 17:11:20', NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2024-10-22 14:05:29', '2025-03-02 15:26:08', NULL, 100),
(135, 'order', '10135', 'order_placed', 57, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-10-22 18:55:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-22 15:55:37', '2025-03-02 15:26:08', NULL, 100),
(136, 'order', '10136', 'order_placed', 57, 3, NULL, NULL, '550', 'cash', 'success', '2024-12-02 01:02:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-23 08:25:47', '2025-03-02 15:26:08', NULL, 100),
(137, 'order', '10137', 'order_placed', 57, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-12-02 01:16:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 23:16:42', '2025-03-02 15:26:08', NULL, 100),
(138, 'order', '10138', 'order_placed', 57, 3, NULL, NULL, '110', 'cash', 'PENDING', '2024-12-02 01:48:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 23:48:05', '2025-03-02 15:26:08', NULL, 100),
(139, 'basket', '10139', 'order_placed', 57, 3, NULL, NULL, '110', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-02 04:10:59', '2025-03-02 15:26:08', NULL, 100),
(140, 'basket', '10140', 'order_placed', 58, 3, NULL, NULL, '110', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 09:31:55', '2025-03-02 15:26:08', NULL, 100),
(141, 'basket', '10141', 'order_placed', 59, 3, NULL, NULL, '1100', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 23:30:45', '2025-03-02 15:26:08', NULL, 100),
(142, 'basket', '10142', 'order_placed', 61, 3, NULL, NULL, '550', NULL, 'failed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-18 17:56:47', '2025-03-02 15:26:08', NULL, 100),
(143, 'basket', '10143', 'order_placed', 60, 3, NULL, NULL, '440', NULL, 'PENDING', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-19 06:50:28', '2025-03-02 15:26:08', NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_variation_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details_extra_services`
--

CREATE TABLE `order_details_extra_services` (
  `id` int(11) NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `extra_service_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details_extra_services`
--

INSERT INTO `order_details_extra_services` (`id`, `order_details_id`, `extra_service_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 80, 1, '10', '2024-06-11 19:21:13', '2024-06-11 19:21:13'),
(2, 81, 1, '10', '2024-06-11 19:21:24', '2024-06-11 19:21:24'),
(3, 82, 1, '10', '2024-06-25 19:48:38', '2024-06-25 19:48:38'),
(4, 83, 1, '10', '2024-06-25 19:55:08', '2024-06-25 19:55:08'),
(5, 84, 1, '10', '2024-06-25 20:09:19', '2024-06-25 20:09:19'),
(6, 85, 1, '10', '2024-06-29 09:20:35', '2024-06-29 09:20:35'),
(7, 90, 1, '10', '2024-06-30 13:20:37', '2024-06-30 13:20:37'),
(8, 96, 1, '10', '2024-06-30 13:32:49', '2024-06-30 13:32:49'),
(9, 96, 1, '10', '2024-06-30 13:32:49', '2024-06-30 13:32:49'),
(10, 99, 1, '10', '2024-06-30 13:35:35', '2024-06-30 13:35:35'),
(11, 99, 1, '10', '2024-06-30 13:35:35', '2024-06-30 13:35:35'),
(12, 101, 1, '10', '2024-06-30 13:36:36', '2024-06-30 13:36:36'),
(13, 101, 1, '10', '2024-06-30 13:36:36', '2024-06-30 13:36:36'),
(14, 107, 1, '10', '2024-06-30 13:44:40', '2024-06-30 13:44:40'),
(15, 107, 1, '10', '2024-06-30 13:44:40', '2024-06-30 13:44:40'),
(16, 118, 1, '10', '2024-06-30 14:08:47', '2024-06-30 14:08:47'),
(17, 124, 1, '10', '2024-06-30 14:17:13', '2024-06-30 14:17:13'),
(18, 125, 1, '10', '2024-06-30 14:17:48', '2024-06-30 14:17:48'),
(19, 129, 1, '10', '2024-07-02 11:48:37', '2024-07-02 11:48:37'),
(20, 137, 1, '10', '2024-07-06 12:22:45', '2024-07-06 12:22:45'),
(21, 142, 1, '10', '2024-07-11 07:12:46', '2024-07-11 07:12:46'),
(22, 143, 1, '10', '2024-07-11 08:39:14', '2024-07-11 08:39:14'),
(23, 145, 1, '10', '2024-07-14 17:16:37', '2024-07-14 17:16:37'),
(24, 147, 1, '10', '2024-07-16 16:52:22', '2024-07-16 16:52:22'),
(25, 152, 1, '10', '2024-08-01 18:29:02', '2024-08-01 18:29:02'),
(26, 153, 1, '10', '2024-08-01 18:29:55', '2024-08-01 18:29:55'),
(27, 154, 1, '10', '2024-08-02 15:41:49', '2024-08-02 15:41:49'),
(28, 155, 1, '10', '2024-08-02 15:41:50', '2024-08-02 15:41:50'),
(29, 163, 1, '10', '2024-08-05 14:15:08', '2024-08-05 14:15:08'),
(30, 177, 1, '10', '2024-09-11 15:48:34', '2024-09-11 15:48:34'),
(31, 178, 1, '10', '2024-09-11 15:51:30', '2024-09-11 15:51:30'),
(32, 179, 1, '10', '2024-09-11 15:51:35', '2024-09-11 15:51:35'),
(33, 185, 1, '10', '2024-10-02 15:56:44', '2024-10-02 15:56:44'),
(34, 186, 1, '10', '2024-10-02 15:57:40', '2024-10-02 15:57:40'),
(35, 192, 1, '10', '2024-10-22 14:05:29', '2024-10-22 14:05:29'),
(36, 194, 1, '10', '2024-10-23 08:25:47', '2024-10-23 08:25:47'),
(37, 198, 1, '10', '2024-11-25 18:02:13', '2024-11-25 18:02:13'),
(38, 255, 1, '10', '2026-02-17 08:42:41', '2026-02-17 08:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `payment_order_id` varchar(36) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_method` varchar(11) NOT NULL,
  `payment_option` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `payment_order_id`, `user_id`, `order_id`, `amount`, `status`, `payment_method`, `payment_option`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 57, 136, '550', 'PENDING', 'knet', 1, '2024-12-01 20:53:54', '2024-12-06 18:00:12'),
(2, NULL, NULL, 57, 136, '550', 'PENDING', 'knet', 1, '2024-12-01 21:05:10', '2024-12-06 18:00:12'),
(3, NULL, NULL, 57, 136, '550', 'PENDING', 'knet', 1, '2024-12-01 21:05:41', '2024-12-06 18:00:12'),
(4, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:06:00', '2024-12-06 18:00:12'),
(5, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:07:53', '2024-12-06 18:00:12'),
(6, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:08:17', '2024-12-06 18:00:12'),
(7, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:11:01', '2024-12-06 18:00:12'),
(8, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:17:30', '2024-12-06 18:00:12'),
(9, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:22:14', '2024-12-06 18:00:12'),
(10, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:25:00', '2024-12-06 18:00:12'),
(11, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:26:53', '2024-12-06 18:00:12'),
(12, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:35:40', '2024-12-06 18:00:12'),
(13, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:39:20', '2024-12-06 18:00:12'),
(14, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:39:57', '2024-12-06 18:00:12'),
(15, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:46:11', '2024-12-06 18:00:12'),
(16, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:51:36', '2024-12-06 18:00:12'),
(17, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:52:53', '2024-12-06 18:00:12'),
(18, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:54:25', '2024-12-06 18:00:12'),
(19, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:55:19', '2024-12-06 18:00:12'),
(20, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:56:56', '2024-12-06 18:00:12'),
(21, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:57:47', '2024-12-06 18:00:12'),
(22, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 21:59:49', '2024-12-06 18:00:12'),
(23, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:02:48', '2024-12-06 18:00:12'),
(24, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:06:54', '2024-12-06 18:00:12'),
(25, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:10:11', '2024-12-06 18:00:12'),
(26, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:11:03', '2024-12-06 18:00:12'),
(27, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:22:06', '2024-12-06 18:00:12'),
(28, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:32:33', '2024-12-06 18:00:12'),
(29, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:44:02', '2024-12-06 18:00:12'),
(30, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 1, '2024-12-01 22:45:53', '2024-12-06 18:00:12'),
(31, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 0, '2024-12-01 23:03:08', '2024-12-06 18:00:12'),
(32, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 0, '2024-12-01 23:05:18', '2024-12-06 18:00:12'),
(33, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 0, '2024-12-01 23:06:07', '2024-12-06 18:00:12'),
(34, NULL, NULL, 57, 136, '550', 'PENDING', 'credit', 0, '2024-12-01 23:07:04', '2024-12-06 18:00:12'),
(35, NULL, NULL, 57, 136, '550', 'PENDING', 'knet', 0, '2024-12-01 23:15:01', '2024-12-06 18:00:12'),
(36, NULL, NULL, 57, 137, '110', 'PENDING', 'credit', 0, '2024-12-01 23:35:20', '2024-12-06 18:00:12'),
(37, NULL, NULL, 57, 138, '110', 'PENDING', 'credit', 0, '2024-12-01 23:48:23', '2024-12-06 18:00:12'),
(38, NULL, NULL, 57, 139, '110', 'PENDING', 'knet', 0, '2024-12-02 04:11:58', '2024-12-06 18:00:12'),
(39, NULL, NULL, 57, 136, '550', 'PENDING', 'knet', 1, '2024-12-06 17:01:20', '2024-12-06 17:01:20'),
(40, '100434210000004549', '202210101202210136', 57, 136, '550', 'success', 'knet', 1, '2024-12-06 17:11:17', '2024-12-07 14:21:35'),
(41, NULL, '202210101202210136', 57, 136, '550', 'PENDING', 'knet', 1, '2024-12-07 14:18:27', '2024-12-07 14:18:27'),
(42, NULL, '202210101202210140', 58, 140, '1540', 'PENDING', 'knet', 0, '2024-12-16 20:09:28', '2024-12-16 20:09:28'),
(43, '100435410000005693', '202210101202210142', 61, 142, '220', 'failed', 'knet', 1, '2024-12-18 18:19:46', '2024-12-19 07:20:23'),
(44, NULL, '202210101202210142', 61, 142, '220', 'PENDING', 'knet', 0, '2024-12-18 18:23:21', '2024-12-18 18:23:21'),
(45, NULL, '202210101202210142', 61, 142, '110', 'PENDING', 'credit', 0, '2024-12-18 22:02:51', '2024-12-18 22:02:51'),
(46, NULL, '202210101202210142', 61, 142, '110', 'PENDING', 'credit', 0, '2024-12-18 22:08:30', '2024-12-18 22:08:30'),
(47, NULL, '202210101202210142', 61, 142, '110', 'PENDING', 'credit', 0, '2024-12-18 22:10:45', '2024-12-18 22:10:45'),
(48, NULL, '202210101202210143', 60, 143, '220', 'PENDING', 'knet', 0, '2024-12-19 06:52:34', '2024-12-19 06:52:34'),
(49, NULL, '202210101202210142', 61, 142, '220', 'PENDING', 'knet', 0, '2024-12-19 07:19:50', '2024-12-19 07:19:50'),
(50, NULL, '202210101202210143', 60, 143, '110', 'PENDING', 'credit', 0, '2024-12-20 06:46:48', '2024-12-20 06:46:48'),
(51, NULL, '202210101202210140', 58, 140, '990', 'PENDING', 'knet', 0, '2025-01-12 11:57:42', '2025-01-12 11:57:42'),
(52, NULL, '202210101202210140', 58, 140, '990', 'PENDING', 'knet', 0, '2025-01-12 11:57:43', '2025-01-12 11:57:43'),
(53, NULL, '202210101202210140', 58, 140, '990', 'PENDING', 'knet', 0, '2025-01-12 11:57:43', '2025-01-12 11:57:43'),
(54, NULL, '202210101202210140', 58, 140, '110', 'PENDING', 'knet', 0, '2025-01-13 16:30:44', '2025-01-13 16:30:44'),
(55, NULL, '202210101202210140', 58, 140, '110', 'PENDING', 'knet', 0, '2025-01-13 16:31:25', '2025-01-13 16:31:25'),
(56, NULL, '202210101202210142', 61, 142, '550', 'PENDING', 'credit', 0, '2025-01-14 22:25:21', '2025-01-14 22:25:21'),
(57, NULL, '202210101202210140', 58, 140, '110', 'PENDING', 'knet', 0, '2025-01-15 14:49:59', '2025-01-15 14:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'roles', 'admin', NULL, NULL),
(3, 'edit permissions', 'admin', NULL, NULL),
(4, 'add role', 'admin', NULL, NULL),
(6, 'edit category', 'admin', NULL, NULL),
(9, 'add discount', 'admin', NULL, NULL),
(10, 'disable discount', 'admin', NULL, NULL),
(11, 'edit admin', 'admin', NULL, NULL),
(12, 'add admin', 'admin', NULL, NULL),
(13, 'add seller', 'admin', NULL, NULL),
(14, 'edit seller status', 'admin', NULL, NULL),
(15, 'edit seller', 'admin', NULL, NULL),
(16, 'edit driver', 'admin', NULL, NULL),
(17, 'add driver', 'admin', NULL, NULL),
(18, 'edit driver status', 'admin', NULL, NULL),
(19, 'add notification', 'admin', NULL, NULL),
(20, 'delete notification', 'admin', NULL, NULL),
(21, 'cancel order', 'admin', NULL, NULL),
(22, 'edit order status', 'admin', NULL, NULL),
(23, 'assign order driver', 'admin', NULL, NULL),
(24, 'change product status', 'admin', NULL, NULL),
(25, 'add category', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `serving` int(11) DEFAULT NULL,
  `picture` tinyint(4) DEFAULT 0,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `old_price` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_ar`, `title_en`, `is_available`, `serving`, `picture`, `seller_id`, `category_id`, `name_ar`, `name_en`, `description_en`, `description_ar`, `main_image`, `quantity`, `price`, `old_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(76, 'product 1', 'product 1', 1, 10, 0, 3, 8, 'product 1', 'product 1', 'product 1', 'product 1', 'uploads/products/1771252728872.jpg', NULL, '10', '10', '2026-02-16 13:38:48', '2026-02-16 14:35:09', NULL),
(77, 'وقوف السيارات', 'وقوف السيارات', 1, 10, 0, 3, 2, 'وقوف السيارات', 'Parking', '10', '10', 'uploads/products/1771256059211.jpg', NULL, '10', '10', '2026-02-16 14:34:19', '2026-02-16 14:34:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_extra_services`
--

CREATE TABLE `product_extra_services` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_extra_services`
--

INSERT INTO `product_extra_services` (`id`, `product_id`, `price`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 23, '10', 'test ar', 'test en', '2024-05-31 19:58:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(39, 76, 'uploads/products/1771252728309.jpg', '2026-02-16 13:38:48', '2026-02-16 13:38:48'),
(40, 77, 'uploads/products/1771256059513.jpg', '2026-02-16 14:34:19', '2026-02-16 14:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `sku` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `price`, `quantity`, `sku`, `created_at`, `updated_at`) VALUES
(1, 77, 10.00, 5, '10', NULL, NULL),
(2, 77, 10.00, 20, 'color', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variation_attributes`
--

CREATE TABLE `product_variation_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variation_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variation_attributes`
--

INSERT INTO `product_variation_attributes` (`id`, `product_variation_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10', NULL, NULL),
(2, 2, 1, '30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_products`
--

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recently_view_ads`
--

CREATE TABLE `recently_view_ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `recently_view_ads`
--

INSERT INTO `recently_view_ads` (`id`, `user_id`, `ad_id`, `created_at`, `updated_at`) VALUES
(1, 74, 1, '2025-06-12 14:34:05', '2025-06-12 14:34:05'),
(2, 74, 2, '2025-06-12 14:34:11', '2025-06-12 14:34:11'),
(3, 74, 10, '2025-06-12 14:55:55', '2025-06-12 14:55:55'),
(4, 74, 11, '2025-06-12 20:47:26', '2025-06-12 20:47:26'),
(5, 74, 12, '2025-06-12 20:53:19', '2025-06-12 20:53:19'),
(6, 74, 83, '2025-06-12 20:53:30', '2025-06-12 20:53:30'),
(7, 74, 84, '2025-06-12 20:53:40', '2025-06-12 20:53:40'),
(8, 74, 98, '2025-06-21 14:15:19', '2025-06-21 14:15:19'),
(9, 76, 6, '2025-06-22 17:49:01', '2025-06-22 17:49:01'),
(10, 76, 1, '2025-06-22 17:49:28', '2025-06-22 17:49:28'),
(11, 84, 2, '2025-06-27 00:47:42', '2025-06-27 00:47:42'),
(12, 76, 10, '2025-06-27 00:53:40', '2025-06-27 00:53:40'),
(13, 76, 2, '2025-06-27 00:55:13', '2025-06-27 00:55:13'),
(14, 76, 21, '2025-06-27 00:56:08', '2025-06-27 00:56:08'),
(15, 75, 2, '2025-06-27 11:57:56', '2025-06-27 11:57:56'),
(16, 76, 101, '2025-06-28 14:06:32', '2025-06-28 14:06:32'),
(17, 76, 9, '2025-07-05 10:44:17', '2025-07-05 10:44:17'),
(18, 76, 17, '2025-07-06 07:50:08', '2025-07-06 07:50:08'),
(19, 76, 25, '2025-07-12 18:11:30', '2025-07-12 18:11:30'),
(20, 76, 3, '2025-07-14 08:32:55', '2025-07-14 08:32:55'),
(21, 76, 20, '2025-07-14 11:19:53', '2025-07-14 11:19:53'),
(22, 76, 18, '2025-07-14 11:19:59', '2025-07-14 11:19:59'),
(23, 76, 16, '2025-07-14 11:20:03', '2025-07-14 11:20:03'),
(24, 76, 15, '2025-07-14 11:20:15', '2025-07-14 11:20:15'),
(25, 76, 19, '2025-07-14 11:20:21', '2025-07-14 11:20:21'),
(26, 76, 4, '2025-07-14 11:30:12', '2025-07-14 11:30:12'),
(27, 76, 11, '2025-07-15 13:48:04', '2025-07-15 13:48:04'),
(28, 76, 13, '2025-07-16 17:11:45', '2025-07-16 17:11:45'),
(29, 76, 119, '2025-07-16 23:04:11', '2025-07-16 23:04:11'),
(30, 75, 120, '2025-07-17 11:01:36', '2025-07-17 11:01:36'),
(31, 75, 119, '2025-07-17 11:01:50', '2025-07-17 11:01:50'),
(32, 75, 121, '2025-07-17 11:01:56', '2025-07-17 11:01:56'),
(33, 75, 122, '2025-07-17 11:28:31', '2025-07-17 11:28:31'),
(34, 76, 122, '2025-07-17 15:52:59', '2025-07-17 15:52:59'),
(35, 76, 120, '2025-07-17 15:57:01', '2025-07-17 15:57:01'),
(36, 85, 17, '2025-08-22 16:31:42', '2025-08-22 16:31:42'),
(37, 85, 1, '2025-08-23 12:32:32', '2025-08-23 12:32:32'),
(38, 76, 12, '2025-09-07 14:04:37', '2025-09-07 14:04:37'),
(39, 76, 7, '2025-09-11 17:43:26', '2025-09-11 17:43:26'),
(40, 76, 28, '2025-09-14 13:02:38', '2025-09-14 13:02:38'),
(41, 76, 31, '2025-09-14 13:02:45', '2025-09-14 13:02:45'),
(42, 76, 26, '2025-09-16 10:18:53', '2025-09-16 10:18:53'),
(43, 76, 27, '2025-09-16 10:18:57', '2025-09-16 10:18:57'),
(44, 92, 9, '2025-09-23 17:12:38', '2025-09-23 17:12:38'),
(45, 94, 1, '2025-09-23 19:40:03', '2025-09-23 19:40:03'),
(46, 97, 18, '2025-09-23 20:21:49', '2025-09-23 20:21:49'),
(47, 96, 17, '2025-09-24 01:08:05', '2025-09-24 01:08:05'),
(48, 96, 18, '2025-09-24 11:16:45', '2025-09-24 11:16:45'),
(49, 96, 9, '2025-09-24 11:20:43', '2025-09-24 11:20:43'),
(50, 96, 26, '2025-09-24 11:20:48', '2025-09-24 11:20:48'),
(51, 96, 27, '2025-09-24 11:20:53', '2025-09-24 11:20:53'),
(52, 96, 1, '2025-09-24 11:22:37', '2025-09-24 11:22:37'),
(53, 98, 11, '2025-09-25 18:18:34', '2025-09-25 18:18:34'),
(54, 98, 10, '2025-09-25 18:19:30', '2025-09-25 18:19:30'),
(55, 98, 26, '2025-09-25 18:19:53', '2025-09-25 18:19:53'),
(56, 98, 27, '2025-09-25 18:20:24', '2025-09-25 18:20:24'),
(57, 98, 17, '2025-09-25 18:24:23', '2025-09-25 18:24:23'),
(58, 98, 18, '2025-09-25 18:24:43', '2025-09-25 18:24:43'),
(59, 97, 1, '2025-10-04 08:46:57', '2025-10-04 08:46:57'),
(60, 97, 9, '2025-10-04 08:47:19', '2025-10-04 08:47:19'),
(61, 97, 26, '2025-10-04 08:47:36', '2025-10-04 08:47:36'),
(62, 97, 141, '2025-10-08 03:39:52', '2025-10-08 03:39:52'),
(63, 97, 142, '2025-10-08 03:40:31', '2025-10-08 03:40:31'),
(64, 96, 136, '2025-10-09 01:06:39', '2025-10-09 01:06:39'),
(65, 96, 10, '2025-10-09 01:07:54', '2025-10-09 01:07:54'),
(66, 86, 138, '2025-10-23 16:00:57', '2025-10-23 16:00:57'),
(67, 86, 1, '2025-10-23 17:16:33', '2025-10-23 17:16:33'),
(68, 86, 9, '2025-10-23 17:18:41', '2025-10-23 17:18:41'),
(69, 86, 10, '2025-10-23 17:19:40', '2025-10-23 17:19:40'),
(70, 86, 26, '2025-10-23 17:20:00', '2025-10-23 17:20:00'),
(71, 86, 27, '2025-10-23 17:20:10', '2025-10-23 17:20:10'),
(72, 94, 9, '2025-10-24 16:31:35', '2025-10-24 16:31:35'),
(73, 94, 26, '2025-10-24 23:23:32', '2025-10-24 23:23:32'),
(74, 86, 11, '2025-10-27 17:37:00', '2025-10-27 17:37:00'),
(75, 97, 17, '2025-11-05 16:23:09', '2025-11-05 16:23:09'),
(76, 97, 159, '2025-11-05 17:41:38', '2025-11-05 17:41:38'),
(77, 97, 10, '2025-11-05 18:27:13', '2025-11-05 18:27:13'),
(78, 97, 27, '2025-11-06 12:18:42', '2025-11-06 12:18:42'),
(79, 97, 161, '2025-11-09 21:31:57', '2025-11-09 21:31:57'),
(80, 97, 136, '2025-11-09 21:35:09', '2025-11-09 21:35:09'),
(81, 97, 137, '2025-11-10 12:33:17', '2025-11-10 12:33:17'),
(82, 97, 143, '2025-11-10 12:33:31', '2025-11-10 12:33:31'),
(83, 97, 144, '2025-11-10 12:33:38', '2025-11-10 12:33:38'),
(84, 97, 164, '2025-11-10 14:35:55', '2025-11-10 14:35:55'),
(85, 86, 17, '2025-11-10 19:34:45', '2025-11-10 19:34:45'),
(86, 94, 138, '2025-11-20 23:13:38', '2025-11-20 23:13:38'),
(87, 97, 147, '2025-11-26 14:23:50', '2025-11-26 14:23:50'),
(88, 97, 165, '2025-11-26 14:51:33', '2025-11-26 14:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_reason`
--

CREATE TABLE `rejected_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `enable` tinyint(1) DEFAULT 1,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rejected_reason`
--

INSERT INTO `rejected_reason` (`id`, `name`, `enable`, `description`, `created_at`, `updated_at`) VALUES
(1, '0000', 0, '00000\\', '2025-03-28 12:08:53', '2025-04-30 07:09:02'),
(2, 'llll', 1, 'kkkk', '2025-04-30 06:32:41', '2025-04-30 06:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reporter_id` bigint(20) UNSIGNED NOT NULL,
  `reportable_id` bigint(20) UNSIGNED NOT NULL,
  `reportable_type` enum('ad','user') NOT NULL,
  `report_option_id` bigint(20) UNSIGNED NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reporter_id`, `reportable_id`, `reportable_type`, `report_option_id`, `additional_notes`, `created_at`, `updated_at`) VALUES
(1, 41, 1, 'ad', 4, NULL, '2025-04-30 10:43:32', NULL),
(2, 68, 3, 'ad', 2, NULL, '2025-04-30 14:04:54', '2025-04-30 14:04:54'),
(3, 68, 3, 'ad', 2, NULL, '2025-04-30 14:05:01', '2025-04-30 14:05:01'),
(4, 68, 3, 'ad', 2, '654dftyguhijko', '2025-04-30 14:05:30', '2025-04-30 14:05:30'),
(5, 74, 101, 'ad', 2, NULL, '2025-06-10 09:37:57', '2025-06-10 09:37:57'),
(6, 76, 11, 'ad', 2, 'nigga', '2025-07-15 13:48:43', '2025-07-15 13:48:43'),
(7, 97, 159, 'ad', 2, 'غير لائق', '2025-11-05 17:49:42', '2025-11-05 17:49:42'),
(8, 86, 101, 'ad', 2, 'test101', '2025-11-25 22:14:25', '2025-11-25 22:14:25'),
(9, 86, 101, 'ad', 2, 'test101', '2025-11-25 22:15:12', '2025-11-25 22:15:12'),
(10, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:34:21', '2025-11-25 23:34:21'),
(11, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:35:53', '2025-11-25 23:35:53'),
(12, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:43:09', '2025-11-25 23:43:09'),
(13, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:44:19', '2025-11-25 23:44:19'),
(14, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:45:01', '2025-11-25 23:45:01'),
(15, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:47:05', '2025-11-25 23:47:05'),
(16, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:48:48', '2025-11-25 23:48:48'),
(17, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:50:00', '2025-11-25 23:50:00'),
(18, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:51:01', '2025-11-25 23:51:01'),
(19, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:52:02', '2025-11-25 23:52:02'),
(20, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:52:18', '2025-11-25 23:52:18'),
(21, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:54:11', '2025-11-25 23:54:11'),
(22, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:54:27', '2025-11-25 23:54:27'),
(23, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:54:43', '2025-11-25 23:54:43'),
(24, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:56:12', '2025-11-25 23:56:12'),
(25, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:56:29', '2025-11-25 23:56:29'),
(26, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:57:05', '2025-11-25 23:57:05'),
(27, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:57:17', '2025-11-25 23:57:17'),
(28, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:58:09', '2025-11-25 23:58:09'),
(29, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:58:17', '2025-11-25 23:58:17'),
(30, 86, 101, 'ad', 2, 'test101', '2025-11-25 23:58:23', '2025-11-25 23:58:23'),
(31, 86, 17, 'ad', 2, 'test', '2025-11-26 00:05:43', '2025-11-26 00:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `report_options`
--

CREATE TABLE `report_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `report_options`
--

INSERT INTO `report_options` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`, `enable`) VALUES
(1, '5577577', 'نم', '2025-04-30 06:57:20', '2025-04-30 07:15:40', 0),
(2, 'ygggygy', 'gygygygygy', '2025-04-30 06:57:45', '2025-04-30 07:12:37', 1),
(3, 'ygggygy', 'gygygygygy', '2025-04-30 06:58:12', '2025-04-30 07:12:52', 0),
(4, 'ggg', 'de', '2025-04-30 06:59:31', '2025-04-30 07:12:58', 1),
(5, '2323', 'dff', '2025-04-30 07:00:05', '2025-04-30 07:00:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'semi admin', 'admin', '2022-07-10 10:29:28', '2022-08-04 03:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(6, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_ads`
--

CREATE TABLE `saved_ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `saved_ads`
--

INSERT INTO `saved_ads` (`id`, `user_id`, `ad_id`, `created_at`, `updated_at`) VALUES
(4, 68, 1, '2025-04-07 15:36:01', '2025-04-07 15:36:01'),
(7, 75, 1, '2025-06-27 02:15:01', '2025-06-27 02:15:01'),
(8, 75, 2, '2025-06-27 02:15:56', '2025-06-27 02:15:56'),
(21, 76, 1, '2025-07-16 18:45:16', '2025-07-16 18:45:16'),
(32, 86, 9, '2025-10-23 17:19:07', '2025-10-23 17:19:07'),
(33, 86, 27, '2025-10-23 17:20:24', '2025-10-23 17:20:24'),
(34, 94, 9, '2025-10-24 23:23:25', '2025-10-24 23:23:25'),
(35, 86, 10, '2025-10-27 17:29:32', '2025-10-27 17:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `active`, `email`, `password`, `img_path`, `longitude`, `latitude`, `details`, `created_at`, `updated_at`, `about`) VALUES
(3, 'الشركة الكويتية', 1, 'seller@seller.com', '$2y$10$YOZmPVBuupFPDOsWEjnR4O/Q1l2uDLBlIsJQrqvt1tWqd963u8Rdu', 'uploads/profiles/1720037726799.png', 33.33, 33.66, '4th ring road - block 6', '2022-06-20 20:17:46', '2025-01-15 14:30:59', 'About this seller'),
(4, 'شركة اللحوم الكويتية', 1, 'seller2@seller.com', '$2y$10$OGObCqKYzxhpfmjyscX0MuuC9Qp8CiM5oFhqxn/wim18SA6gYL5UW', 'uploads/profiles/1720037826899.png', 33.33, 33.33, '4th ring road - block 8', '2022-07-19 19:51:49', '2025-01-15 14:20:28', 'About this seller'),
(5, 'ٍSeller 3', 1, 'seller3@seller.com', '$2y$10$OjvD5cIIeAt8Q6NnBsADmOda/IaKiIjTW6U8UTPjmJLCl8fc3e9dC', 'uploads/profiles/1736954513667.jpg', 33.33, 33.33, '4th ring road - block 10', '2022-08-04 04:30:23', '2025-01-15 14:21:53', 'About this seller'),
(6, 'شركة MOI', 1, 'dfds@vcd.com', '$2y$10$4.MZ0d2FzKzJS354kKqDGOkcDP89DG9SkkvZcjTHf6KjfwDQCjPz6', 'uploads/profiles/1733157026174.png', NULL, NULL, '4th ring road - block 5', '2024-06-29 10:57:16', '2025-01-15 14:31:05', 'About this seller'),
(7, 'gdfgdf', 1, 'fdgdf@fdgfdg.com', '$2y$10$arboSY.3FfVCmuuXS1kz9.xGmT0z9EJ1wXuSWRdEIvA3mfCLedk.m', 'uploads/profiles/1719665999566.png', NULL, NULL, '4th ring road - block 7', '2024-06-29 10:59:59', '2025-03-25 23:36:37', 'About this seller'),
(8, 'seller44', 0, 'seller4@44.com', '$2y$10$lZCMnIakd4DjRgoFBbVL6eDP87ixA5BQYn8NAIJbccQuEtLgEdGeW', 'uploads/profiles/1720038463567.png', NULL, NULL, NULL, '2024-07-03 18:27:43', '2024-07-03 18:27:43', 'About this seller');

-- --------------------------------------------------------

--
-- Table structure for table `seller_services_availabilities`
--

CREATE TABLE `seller_services_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seller_services_availabilities`
--

INSERT INTO `seller_services_availabilities` (`id`, `seller_id`, `product_id`, `category_id`, `availability`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL, 0, NULL, '2024-12-09 08:30:58', '2024-12-09 08:34:42'),
(2, 3, NULL, NULL, 0, '2024-12-12', '2024-12-09 09:26:12', '2024-12-11 06:36:02'),
(3, 3, NULL, NULL, 0, '2025-01-09', '2024-12-09 19:09:03', '2024-12-11 06:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(3, 'uploads/categories/1749755877882.jpg', 'https://www.youtube.com/', '2024-09-17 16:45:30', '2025-06-12 17:17:57'),
(6, 'uploads/categories/1762387401836.jpg', NULL, '2025-11-05 18:38:10', '2025-11-05 23:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `special_requests`
--

CREATE TABLE `special_requests` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `family_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('under_processing','pending','completed','cancelled') DEFAULT 'pending',
  `request_number` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `special_requests`
--

INSERT INTO `special_requests` (`id`, `user_id`, `category_id`, `family_name`, `area_id`, `budget`, `date`, `time`, `description`, `created_at`, `updated_at`, `status`, `request_number`) VALUES
(1, 0, 65, 'ssss', 55, 5454, '2024-12-10', '05:50:00', 'sssssssssssss', '2024-12-09 19:18:55', '2025-02-04 16:39:36', 'completed', NULL),
(2, 7, 65, 'ssss', 55, 5454, '2024-12-10', '05:50:00', 'sssssssssssss', '2024-12-09 19:21:12', '2025-02-09 19:46:56', 'cancelled', NULL),
(3, 0, 65, 'ssss', 55, 5454, '2024-12-10', '05:50:00', 'sssssssssssss', '2024-12-09 19:22:47', '2025-02-09 19:30:42', 'under_processing', NULL),
(4, 7, 65, 'ssssssssss', NULL, NULL, NULL, NULL, 'sssssssssss', '2025-02-04 18:44:34', '2025-02-09 20:58:51', 'under_processing', NULL),
(5, 7, 65, 'ssss', 55, 5454, '2025-02-10', '05:50:00', 'sssssssssssss', '2025-02-09 19:12:49', '2025-02-09 19:12:49', 'pending', 1005),
(6, 7, 65, 'ssss', 55, 5454, '2025-02-10', '05:50:00', 'sssssssssssss', '2025-02-09 19:12:56', '2025-02-09 21:17:40', 'cancelled', 1006),
(7, 7, 65, 'sssskjaskjaja', 55, 5454, '2025-02-10', '05:50:00', 'sssssssssssss', '2025-02-09 19:29:37', '2025-02-09 19:30:00', 'under_processing', 1007),
(8, 7, 65, 'jjh', 55, 5454, '2025-02-10', '05:50:00', 'sssssssssssss', '2025-02-09 19:51:23', '2025-02-09 19:51:50', 'under_processing', 1008),
(9, 7, 65, NULL, 55, 5454, '2025-08-28', '05:50:00', 'sssssssssssss', '2025-03-16 20:33:03', '2025-03-16 20:33:03', 'pending', 1009);

-- --------------------------------------------------------

--
-- Table structure for table `special_request_details`
--

CREATE TABLE `special_request_details` (
  `id` int(11) NOT NULL,
  `special_requests_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('file','text') NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `special_request_details`
--

INSERT INTO `special_request_details` (`id`, `special_requests_id`, `user_id`, `type`, `content`, `role`, `created_at`, `updated_at`) VALUES
(1, 3, 57, 'text', 'ssssssssssssss', 'client', '2024-12-09 19:29:58', '2024-12-09 19:29:58'),
(2, 3, 57, 'text', 'ssssssssssssss', 'client', '2024-12-09 19:30:47', '2024-12-09 19:30:47'),
(3, 3, 57, 'text', 'ssssssssssssss', 'client', '2024-12-09 19:31:34', '2024-12-09 19:31:34'),
(4, 3, 57, 'text', 'ssssssssssssss', 'client', '2024-12-09 19:31:47', '2024-12-09 19:31:47'),
(5, 3, 1, 'text', 'dvvdssddsvdvs', 'admin', '2025-01-21 18:55:37', '2025-01-21 18:55:37'),
(6, 3, 1, 'file', 'SpecialRequestFiles/679009d6c8c75.jpeg', 'admin', '2025-01-21 18:55:50', '2025-01-21 18:55:50'),
(7, 4, 1, 'text', 'ssssssssss', 'admin', '2025-02-04 16:47:25', '2025-02-04 16:47:25'),
(8, 4, 1, 'file', 'SpecialRequestFiles/67a260da6f447.gif', 'admin', '2025-02-04 16:47:54', '2025-02-04 16:47:54'),
(9, 1, 1, 'text', 'll', 'admin', '2025-02-09 19:25:16', '2025-02-09 19:25:16'),
(10, 1, 1, 'text', 'aaaaa', 'admin', '2025-02-09 19:25:40', '2025-02-09 19:25:40'),
(11, 1, 1, 'text', 'sss', 'admin', '2025-02-09 19:26:28', '2025-02-09 19:26:28'),
(12, 1, 1, 'text', 'eeeee', 'admin', '2025-02-09 19:29:06', '2025-02-09 19:29:06'),
(13, 7, 1, 'text', 'ssss', 'admin', '2025-02-09 19:30:00', '2025-02-09 19:30:00'),
(14, 3, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:30:42', '2025-02-09 19:30:42'),
(15, 7, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:31:32', '2025-02-09 19:31:32'),
(16, 7, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:34:37', '2025-02-09 19:34:37'),
(17, 7, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:49:17', '2025-02-09 19:49:17'),
(18, 8, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:51:50', '2025-02-09 19:51:50'),
(19, 8, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar', '2025-02-09 19:52:13', '2025-02-09 19:52:13'),
(20, 8, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omarclient', '2025-02-09 19:53:50', '2025-02-09 19:53:50'),
(21, 8, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar client', '2025-02-09 19:54:09', '2025-02-09 19:54:09'),
(22, 8, 1, 'text', 'a', 'admin admin', '2025-02-09 19:54:31', '2025-02-09 19:54:31'),
(23, 8, 1, 'text', 'aaa', 'admin admin', '2025-02-09 19:54:57', '2025-02-09 19:54:57'),
(24, 8, 1, 'text', 'aaa', 'adminadmin', '2025-02-09 19:55:19', '2025-02-09 19:55:19'),
(25, 8, 7, 'text', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user omar client', '2025-02-09 19:55:34', '2025-02-09 19:55:34'),
(26, 1, 1, 'text', 'aaaaaaaaaaaaaaa', ' admin', '2025-03-16 19:44:12', '2025-03-16 19:44:12'),
(27, 1, 1, 'file', 'SpecialRequestFiles/67d7463a0f7ab.png', ' admin', '2025-03-16 19:44:26', '2025-03-16 19:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `provider_name` enum('facebook','google') DEFAULT NULL,
  `lang` enum('ar','en') NOT NULL DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `followers_count` int(10) UNSIGNED DEFAULT 0,
  `type` enum('user','business') NOT NULL DEFAULT 'user',
  `limit_ad` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `deleted_at`, `name`, `email`, `bio`, `date_of_birth`, `phone`, `password`, `image`, `device_id`, `provider_id`, `provider_name`, `lang`, `created_at`, `updated_at`, `followers_count`, `type`, `limit_ad`) VALUES
(7, NULL, 'user omar', 'test2@test.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '01142611070', '$2y$10$W.eZtileSLSH52yR8odxKOv57Bd691RanI3YJo/HlFJqs4JJmZsfK', 'uploads/profiles/1655923550977.png', NULL, NULL, NULL, 'ar', '2022-06-21 18:51:13', '2025-10-05 13:47:10', 0, 'business', 14),
(32, NULL, 'dddwdw', 'cv@cv.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '45155555555', '$2y$10$lUbWBRNf7mPDeffJyNK8bu0kMeSPSpc5lzYolcabGHfIvzFeM49Ya', NULL, NULL, NULL, NULL, 'ar', '2022-08-04 06:17:12', '2022-08-25 04:09:14', 0, 'user', 15),
(33, NULL, 'Mohammad', 'alfadly@ipointkw.com', '00000000000000000 \n000000000000000 0000000000 0000000000 00000 \n 00000000 0000000000000 00000000000000000000000000000000000000000000000000000 0000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '97266997', '$2y$10$PUFu5eYMsGN.SllM7yz.5.0Y5GG3zDpsEWMD6BZBKtCQzKRlQ.VaG$2y$10$c75mEvSWDr4iZRWTa2mIRuJl7ccM1RC4VS7IbBT7P6IUDIqwsARg6', 'uploads/profiles/1667346999172.jpg', NULL, NULL, NULL, 'ar', '2022-08-04 07:34:59', '2024-12-11 07:57:30', 0, 'user', 15),
(34, NULL, 'ww', 'zx@zx.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '123456', '$2y$10$btPDDAwGwfOkfC7i5tudvusyU3fUk//1UnB/gld3lNrPZmXparHLu', NULL, NULL, NULL, NULL, 'ar', '2022-08-16 03:03:43', '2022-08-17 03:53:29', 0, 'user', 15),
(40, NULL, 'fahad', 'aljenfawi7@gmail.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '99779981', '$2y$10$VwXu81N6i7SscFezFmUJiekoC552nJ12/jBv/K2c1BuTJw17bGN9e', NULL, NULL, NULL, NULL, 'ar', '2022-08-29 03:02:18', '2022-08-29 03:02:19', 0, 'user', 15),
(41, NULL, 'ttt', 't@tt.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '1234565555', '$2y$10$c2zPohjvZBlDlHRosZUX6eN0Isad/TYM64u1eF6xKgUNmJLwuYzY2', NULL, NULL, NULL, NULL, 'ar', '2022-08-29 23:44:03', '2022-08-29 23:44:03', 0, 'user', 15),
(42, NULL, 'kalid', 'fahad_4307@hotmail.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '97419111', '$2y$10$3ChxVH9hut0LLNSmFea9X.ap9Zek429pONJlNBRKQrqUyVtam87va', NULL, NULL, NULL, NULL, 'ar', '2022-08-31 16:57:05', '2022-08-31 16:57:06', 0, 'user', 15),
(43, NULL, 'ooo', 'o@o.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '123456789', '$2y$10$00/AQjCKZ1F.bqDY6AypsuWsqVZK4k/uS/nEe05Ra69sMNiBiVP9a', NULL, NULL, NULL, NULL, 'ar', '2022-09-11 04:34:40', '2022-09-11 04:34:41', 0, 'user', 15),
(44, NULL, 'omar', 'om@om.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '566541', '$2y$10$wl1vapXshx6z.8UtQqvcJuCdfODKKBBr8YRmbK1XfddPCcnV.J33O', NULL, NULL, NULL, NULL, 'ar', '2022-11-02 03:29:38', '2022-11-02 03:29:39', 0, 'user', 15),
(45, NULL, 'omar', 'omar.mohamed4986@gmail.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '01111276595', '$2y$10$SvFPmpWLFKs9pQRP9qrS5OOTCCTzv1YhHNMSOIxXMT5fScglDz5wW', NULL, NULL, NULL, NULL, 'ar', '2024-04-27 11:59:58', '2024-04-27 11:59:58', 0, 'user', 15),
(46, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '01225', '$2y$10$MNgL7Oert1r1sZth0SjtRe1NzGfzEd5VfGtak0lcFKyzWJUH3rHkW', NULL, NULL, NULL, NULL, 'ar', '2024-05-12 16:19:01', '2024-05-12 16:19:01', 0, 'user', 15),
(47, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '012255', '$2y$10$XMCxVQyoGAmL0NFNMs9PA.ECewWIboRXTDe.r6gJqLFjM4Tykuf0m', NULL, NULL, NULL, NULL, 'ar', '2024-05-12 16:19:05', '2024-05-12 16:19:05', 0, 'user', 15),
(48, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '0122551', '$2y$10$LpLR13Nch2fks3YZnwlZMO6yhsMsk5BBMxKV/JkBYNLET1FIm3dvS', NULL, '1111', NULL, NULL, 'ar', '2024-05-12 16:21:20', '2024-05-12 16:21:20', 0, 'user', 15),
(49, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '123456777', '$2y$10$CcHsMQQ.LaJhoezANYbnGufBkx7qqV78HsZD2JA0NOdov/Q/XPyre', NULL, '1111', NULL, NULL, 'ar', '2024-05-22 17:07:53', '2024-11-25 17:04:02', 0, 'user', 15),
(50, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '1234567777', '$2y$10$cm1WPvGIRWaCZgJYQWpVAOphflbCh6LqZwqmzQJp59f0NdvcW/.Ii', NULL, '1111', NULL, NULL, 'ar', '2024-06-02 12:27:16', '2024-06-02 12:27:16', 0, 'user', 15),
(51, NULL, 'omar', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '0111', '$2y$10$gbzy9A5k/617AX1mMtFeC.I6O4OIIK/O07XmT/LyocSvF2Ef9OOia', NULL, NULL, NULL, NULL, 'ar', '2024-06-02 12:50:34', '2024-07-01 16:35:19', 0, 'user', 15),
(52, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '1234567776', '$2y$10$ECtilOpFj6U8qnTnr3Q8r.Wa5yQN6EOxxAcP2QixnW7/mHwbIHCvC', NULL, '1111', NULL, NULL, 'ar', '2024-06-08 17:48:54', '2024-06-08 17:48:54', 0, 'user', 15),
(53, NULL, 'o', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '011', '$2y$10$TnSMJeV.J.cLv2ZOdj93XuyjLMckFGWFo0GxZsgDeHb9c6lUS9T3a', NULL, NULL, NULL, NULL, 'ar', '2024-07-01 16:48:36', '2024-12-11 08:00:16', 0, 'user', 15),
(54, NULL, '0', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '01032039889', '$2y$10$BYhZtiL5TktpiVUHjX0OReVfjCyNxg6KqVG9JS8S6Q3JDe2vY6p42', NULL, NULL, NULL, NULL, 'ar', '2024-07-01 19:35:42', '2024-07-03 16:57:07', 0, 'user', 15),
(55, NULL, 'Mohammad', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '66673339', '$2y$10$TioyNLkP3OBnQMk6iTlfmuHjrLgRT16keYeLCuvo6/RYd4yiLG5xi', 'uploads/profiles/1722362370526.jpg', NULL, NULL, NULL, 'ar', '2024-07-03 17:29:45', '2024-08-22 07:34:25', 0, 'user', 15),
(56, NULL, 'بوعمر', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+965 66673339', '$2y$10$7gouksGcE8LBxT4GVVgjP.Ye4Fu8Pv.QpMnf0pSpJNCScoom9DIrq', 'uploads/profiles/1726043205673.png', NULL, NULL, NULL, 'ar', '2024-08-28 18:25:39', '2024-09-11 06:29:39', 0, 'user', 15),
(57, NULL, 'ازهلها', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+965123', '$2y$10$dt2QqwGw.oOqoWySKdUrweqq7M59XGrhOs7IpQ6QjNlVznK3waKPC', 'uploads/profiles/1733897108350.jpg', NULL, NULL, NULL, 'ar', '2024-09-11 16:53:46', '2024-12-11 07:42:46', 0, 'user', 15),
(58, NULL, 'حمد الضفيري', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+96566673339', '$2y$10$ZHytDVLqXIdcKqFXQyUb3uBwn2pQEtgNvjwPa3FsE8Sk8pTEwiYUW', NULL, 'uffhjlggyut76765765ittfytf', NULL, NULL, 'ar', '2024-12-11 09:28:56', '2025-01-13 16:50:58', 0, 'user', 15),
(59, NULL, 'omar', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+965123456', '$2y$10$/wBm0ojnh/GBG6nO0GZa4OKfBpjD.gJoHXL.sh6UOFKTurBDBVxte', 'uploads/profiles/1734532301934.jpg', 'uffhjlggyut76765765ittfytf', NULL, NULL, 'ar', '2024-12-12 23:30:26', '2024-12-18 13:32:19', 0, 'user', 15),
(60, NULL, 'محمد', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+96597266997', '$2y$10$llmfC5ZbviHU8W9oAwUyJOPDszJ0NFAjX0z.NA7IJzjKn4sn/lTRq', 'uploads/profiles/1734595391883.jpg', 'uffhjlggyut76765765ittfytf', NULL, NULL, 'ar', '2024-12-13 04:53:06', '2025-01-13 17:33:29', 0, 'user', 15),
(61, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '+9651234567776', '$2y$10$AASQauXXAmNMR2B03QB5P.L5QycyXQsnne4bYb6gMCwcf4WNQivqS', NULL, 'uffhjlggyut76765765ittfytf', NULL, NULL, 'ar', '2024-12-18 14:42:42', '2025-01-13 11:31:58', 0, 'user', 15),
(62, NULL, 'user', 'asaasas@fghjsa.com', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '2024-07-07', '97497455884', '$2y$10$Ia4aiE.zdPDWHMASNoB3He4bZbXPJYN02qVKIAQb5rfH2HAGz/KXG', 'uploads/profiles/1742781164767.jpg', NULL, NULL, NULL, 'ar', NULL, '2025-03-23 23:52:44', 0, 'user', 15),
(63, NULL, 'Nader Z', 'naderzakari20@gmail.com', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '01', '$2y$10$wfT5kqmyA.zpucOAVbLUMO6T51ZhkrY0sqijMzy9faniaEFttcEhC', NULL, NULL, '100902518263614665931', 'google', 'ar', '2025-03-23 22:53:46', '2025-03-23 22:53:46', 0, 'user', 15),
(64, NULL, 'test', NULL, '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2024-07-01', '0114264505400', '$2y$10$/WrTA08L1iMgct6o6zbir.bmveN9cou/kUrgv9BogTG6D0tgGrIsu', NULL, NULL, NULL, NULL, 'ar', '2025-03-23 23:04:28', '2025-03-23 23:08:26', 0, 'user', 15),
(67, NULL, 'Nader Zakaria', 'naderzakari2@gmail.com', NULL, NULL, '021', '$2y$10$haAw9gkU7.aoi1mpQBPE7.HxxL3um7ae2w/amelXYF0JSE2J.BNE2', NULL, NULL, '2177445089387241', 'facebook', 'ar', '2025-03-24 00:51:28', '2025-03-24 00:51:28', 0, 'user', 15),
(68, NULL, 'test', NULL, NULL, NULL, '01142644525054', '$2y$10$CrPopb687KlpGch.Lx.EX.bUtzRlGDl1odhp5H92ySX.CuXVf1D9y', NULL, NULL, NULL, NULL, 'ar', '2025-04-06 12:15:20', '2025-04-12 15:00:18', 0, 'user', 15),
(69, NULL, 'test', NULL, NULL, NULL, '011426445250549', '$2y$10$WwuuYKpk5NwjO1jMVGZK6OzRb4mxaxWHa/YHHsRn8OxUrpIgn3aDW', NULL, '1111', NULL, NULL, 'ar', '2025-04-12 15:04:30', '2025-04-12 15:04:30', 0, 'user', 15),
(74, NULL, 'test', NULL, NULL, NULL, '011426', '$2y$10$vmsafxmiBx9AkxYVlYsuY.XnvM3xwoVSvHXFspfolx1Cf0m4va.1W', NULL, NULL, NULL, NULL, 'en', '2025-06-10 09:32:50', '2025-06-12 20:55:46', 0, 'user', 15),
(75, NULL, 'test', NULL, NULL, NULL, '01142645054564', '$2y$10$oNlOH/QaUqCfNbcKfIhJN.LqZallwPzWtRySZPN8gwSp0Dp9RoY7O', NULL, NULL, NULL, NULL, 'ar', '2025-06-12 06:41:24', '2025-07-22 12:39:45', 0, 'business', 2),
(76, NULL, 'unknown2', 'email@example.com', 'my new bio2', '2005-03-01', '11111111111', '$2y$10$l250GJqYZ5eAzBKzp4rtG..BE9CGMNx3Azyopejl76.FMxV7rVVSW', 'uploads/profiles/1761234014476.jpg', NULL, NULL, NULL, 'en', '2025-06-22 16:14:38', '2025-11-05 16:37:22', 0, 'user', 4),
(77, NULL, 'test', NULL, NULL, NULL, '011420', '$2y$10$dXd/VUQbKvYCEKKPbrlvfeCGHoBFUYxUHtJxk.V/viUdQw80MCyhi', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 06:54:54', '2025-06-23 06:54:54', 0, 'user', 15),
(78, NULL, 'test', NULL, NULL, NULL, '0101420', '$2y$10$cfYUR/CYW2YI1JFaNItnj.U6L7W6MgEDwJjaesIqtCeKQxzuS2YwO', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 07:00:08', '2025-06-23 07:00:08', 0, 'user', 15),
(79, NULL, 'test', NULL, NULL, NULL, '01014200', '$2y$10$wcDtESS2xIfx3Jd2nDALG.46rGqPMPvTvgzxuSoeOHKOviOFFn/mC', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 07:03:36', '2025-06-23 07:03:36', 0, 'user', 15),
(80, NULL, 'test', NULL, NULL, NULL, '010142000', '$2y$10$fsC9OFAgQIhPtsLGUoY4puvJfG1YrpMnCUYgNd4D6oBrcBD.WAsUy', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 07:06:01', '2025-06-23 07:06:01', 0, 'user', 15),
(81, NULL, 'test', NULL, NULL, NULL, '0101420000', '$2y$10$O2djwVTSLP/Uk/RNPDFAa.2b/pTE/7uZauHvHzxVd6qowvVLhUQTy', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 07:10:46', '2025-06-23 07:10:46', 0, 'business', 15),
(82, NULL, 'test', NULL, NULL, NULL, '01014200000000', '$2y$10$tMB1VKesghts0OVvEz/v5OwNAyTACHxK15XeMBiDH8ErhNB2ZgCem', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 08:05:58', '2025-06-23 08:05:58', 0, 'business', 15),
(83, NULL, 'test', NULL, NULL, NULL, '010142000000', '$2y$10$rePseWO1bss0FoTsEl.breaJCQp5G0s9ltJDPbwyGWgV2YZdVEMZ.', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 08:23:57', '2025-06-23 08:23:57', 0, 'business', 15),
(84, NULL, 'test', NULL, NULL, NULL, '010142005', '$2y$10$6WdCj79h.ImOkvCk1H/cWOv2fLQseawsB6fpyOwlviI6ggzfEQERa', NULL, NULL, NULL, NULL, 'ar', '2025-06-23 08:27:13', '2025-06-23 08:36:39', 0, 'business', 15),
(85, NULL, 'Test User', NULL, NULL, NULL, '12345678910', '$2y$10$OkFK.d78wxk8AtY.Cky8suHHiXXgBp0l6dTdp0fu4.3wWGwcfdQ92', NULL, NULL, NULL, NULL, 'ar', '2025-08-17 19:06:16', '2025-08-17 19:06:16', 0, 'user', 10),
(86, NULL, 'test', 'example@email.com', NULL, '2025-10-23', '01142645054', '$2y$10$BDwkvqRP9xK1BHklXidFEueflsDMgKBUHbkgSH.X6MKx6S8EUx0rK', 'uploads/profiles/1761244201884.jpg', NULL, NULL, NULL, 'ar', '2025-09-23 13:21:39', '2025-11-12 10:15:58', 0, 'user', 90),
(87, NULL, 'Omar Nasr', NULL, NULL, NULL, '01096762764', '$2y$10$H1q73.Zt8B5sM5mexprVCuQ0WgK4WW6pFBL1ldKOhDQwfMEwAx25G', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 14:43:32', '2025-09-23 14:43:32', 0, 'user', 10),
(88, NULL, 'Omar Nasr', NULL, NULL, NULL, '12345612345', '$2y$10$T5tcLjTkPyaAIaQh5mkqwurhoQb7MMnj5pSAZ5VXiczrA5DFpIw2m', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 14:45:01', '2025-09-23 14:45:01', 0, 'user', 10),
(89, NULL, 'name1', NULL, NULL, NULL, '12341234123', '$2y$10$iggP2TEhPU2DlkxGkmKPTOvY8gdRnrQxkS3xDgIGMVFCTEG8XlClS', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 15:04:23', '2025-09-23 15:04:23', 0, 'user', 10),
(90, NULL, 'name2', NULL, NULL, NULL, '12345123451', '$2y$10$c4t2RAlLwwnKR2z3IBS0KO1QJwhbpfEfovQgsgGpBFqjGRvcDlFEe', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 15:06:10', '2025-09-23 15:06:10', 0, 'user', 10),
(91, NULL, 'User1', NULL, NULL, NULL, '12345612349', '$2y$10$DTJjBozJPKSu6D6oJ9s6TuetAm.9Da1hw/pdSWhkChuH9fM2Bfutm', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 15:11:18', '2025-09-23 15:11:18', 0, 'user', 10),
(92, NULL, 'omar', NULL, NULL, NULL, '01017859595', '$2y$10$uXl6DS5Y492FSMX9J5KKqeDMAFhc0HzQh8NbOHUXXHcCu0eaZfgKG', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 17:11:45', '2025-09-23 17:11:45', 0, 'user', 10),
(93, NULL, 'Omar', NULL, NULL, NULL, '12369078458', '$2y$10$Mc5FBilyfgidOTYdzNwzyu7L65RJFYKNv7ateBiDFIbXCF4IUvJi6', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 17:24:12', '2025-09-23 17:24:12', 0, 'user', 10),
(94, NULL, 'Hany Abd Eldayem', NULL, NULL, NULL, '01090005394', '$2y$10$8PtRZs88dQoo716rTvIhzOgHYSoOlS8RqZYBj2dpI3bsScI6x4Sly', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 19:23:31', '2025-10-24 23:13:19', 0, 'user', 10),
(95, NULL, 'Nashwa Emam', NULL, NULL, NULL, '01021310020', '$2y$10$LMMfD08GdcJhtjdTAghkIOWrlUBfxmgJ6RIRQT7GQGAXkLuVB01hG', NULL, NULL, NULL, NULL, 'ar', '2025-09-23 19:28:00', '2025-09-23 19:28:00', 0, 'user', 10),
(96, NULL, 'Mowafak', 'moafak@hotmail.com', NULL, '1978-10-18', '01009199166', '$2y$10$30TVk5btuR7PVnnruVxW5.ychgveuq1wAGcdMqwAYlw4kmWeTyE4y', 'uploads/profiles/1762750693820.jpg', NULL, NULL, NULL, 'ar', '2025-09-23 19:55:07', '2025-11-26 14:46:12', 0, 'user', 7),
(97, NULL, 'Amr Elsayed', 'amrelsayed.abdelwahab@gmail.com', NULL, '1987-07-26', '01095637229', '$2y$10$G9VoRf4q8R/0xEHsfakvlOPovjKzuxdl5v.EdGUx.njEFn89ZWQNy', 'uploads/profiles/1762366900365.jpg', NULL, NULL, NULL, 'ar', '2025-09-23 20:21:07', '2025-12-02 23:31:32', 0, 'user', 8),
(98, NULL, 'Amr Elsayed', NULL, NULL, NULL, '01116402644', '$2y$10$eXsHYLtww/W56nF3jzbrs.ULTc38p1fnCjXAb8Q5oRtj0J/k3YsGm', NULL, NULL, NULL, NULL, 'ar', '2025-09-25 17:54:46', '2025-11-05 18:48:27', 0, 'user', 10),
(99, NULL, 'fahad', NULL, NULL, NULL, '01500450451', '$2y$10$21ULr9i5TNVDecw9ppzAhOKV.qtOaeccvQlpvkabZXnX0V4yIqHXG', NULL, NULL, NULL, NULL, 'ar', '2025-09-25 22:46:47', '2025-10-07 22:32:55', 0, 'user', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_category_limits`
--

CREATE TABLE `user_category_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `free_ads_limit` int(11) DEFAULT 0,
  `used_ads_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_category_limits`
--

INSERT INTO `user_category_limits` (`id`, `user_id`, `category_id`, `free_ads_limit`, `used_ads_count`, `created_at`, `updated_at`) VALUES
(1, 54, 202, 105, 0, '2025-12-26 19:19:35', '2025-12-26 19:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_daily_event`
--

CREATE TABLE `user_daily_event` (
  `id` int(11) NOT NULL,
  `daily_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_daily_event`
--

INSERT INTO `user_daily_event` (`id`, `daily_event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 55, '2024-09-11 03:17:38', '2024-09-11 03:17:38'),
(8, 1, 56, '2024-09-11 06:14:55', '2024-09-11 06:14:55'),
(9, 2, 56, '2024-09-11 06:15:04', '2024-09-11 06:15:04'),
(31, 1, 55, '2024-09-25 14:47:09', '2024-09-25 14:47:09'),
(41, 1, 57, '2024-09-25 18:44:53', '2024-09-25 18:44:53'),
(42, 14, 57, '2024-09-26 07:35:01', '2024-09-26 07:35:01'),
(48, 3, 57, '2024-10-13 17:04:20', '2024-10-13 17:04:20'),
(65, 29, 57, '2024-10-26 18:58:02', '2024-10-26 18:58:02'),
(66, 6, 57, '2024-10-30 14:21:31', '2024-10-30 14:21:31'),
(69, 99, 58, '2025-01-15 11:30:03', '2025-01-15 11:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_discounts`
--

CREATE TABLE `user_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `longitude`, `latitude`, `details`, `created_at`, `updated_at`) VALUES
(1, 7, 33, 33, 'hf', '2024-05-29 20:13:03', '2024-05-15 20:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_seen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_user`
--
ALTER TABLE `address_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `deleted_at` (`deleted_at`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_number` (`ad_number`),
  ADD KEY `index_ads_user_id` (`user_id`),
  ADD KEY `index_ads_status` (`status`),
  ADD KEY `index_ads_created_at` (`created_at`),
  ADD KEY `index_ads_updated_at` (`updated_at`);

--
-- Indexes for table `ads_attributes`
--
ALTER TABLE `ads_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_ads_attributes_ad_id` (`ad_id`);

--
-- Indexes for table `ads_images`
--
ALTER TABLE `ads_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_ads_images_ad_id` (`ad_id`),
  ADD KEY `index_ads_images_created_at` (`created_at`);

--
-- Indexes for table `ads_type`
--
ALTER TABLE `ads_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_ads_type_name` (`name`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`);

--
-- Indexes for table `categories_attributes`
--
ALTER TABLE `categories_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category_seller`
--
ALTER TABLE `category_seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_seller_seller_id_foreign` (`seller_id`),
  ADD KEY `category_seller_category_id_foreign` (`category_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sender` (`sender_id`),
  ADD KEY `idx_receiver` (`receiver_id`),
  ADD KEY `idx_sender_receiver` (`sender_id`,`receiver_id`),
  ADD KEY `idx_receiver_sender` (`receiver_id`,`sender_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `city_driver`
--
ALTER TABLE `city_driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `city_seller`
--
ALTER TABLE `city_seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `confirmation_codes`
--
ALTER TABLE `confirmation_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daliy_events`
--
ALTER TABLE `daliy_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_seller`
--
ALTER TABLE `discount_seller`
  ADD PRIMARY KEY (`discount_id`,`seller_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_email_unique` (`email`),
  ADD UNIQUE KEY `drivers_phone_unique` (`phone`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_cities`
--
ALTER TABLE `event_cities`
  ADD KEY `event_category_id` (`event_category_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_ads`
--
ALTER TABLE `favorite_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_saved_ads_user_id` (`user_id`),
  ADD KEY `index_saved_ads_ad_id` (`ad_id`),
  ADD KEY `index_saved_ads_created_at` (`created_at`);

--
-- Indexes for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`seller_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`follower_id`),
  ADD UNIQUE KEY `idx_user_follower` (`user_id`,`follower_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_follower_id` (`follower_id`);

--
-- Indexes for table `hidden_ads`
--
ALTER TABLE `hidden_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `home_page_category`
--
ALTER TABLE `home_page_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_seller_id_index` (`seller_id`),
  ADD KEY `notifications_product_id_index` (`product_id`),
  ADD KEY `notifications_region_id_index` (`region_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_product_variation_id_foreign` (`product_variation_id`);

--
-- Indexes for table `order_details_extra_services`
--
ALTER TABLE `order_details_extra_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id` (`order_details_id`),
  ADD KEY `extra_service_id` (`extra_service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `payment_order_id` (`payment_order_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_seller_id_foreign` (`seller_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`),
  ADD KEY `product_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_extra_services`
--
ALTER TABLE `product_extra_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variation_attributes`
--
ALTER TABLE `product_variation_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variation_attributes_product_variation_id_foreign` (`product_variation_id`),
  ADD KEY `product_variation_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recently_viewed_products_user_id_foreign` (`user_id`),
  ADD KEY `recently_viewed_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `recently_view_ads`
--
ALTER TABLE `recently_view_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_recently_view_ads_user_id` (`user_id`),
  ADD KEY `index_recently_view_ads_ad_id` (`ad_id`);

--
-- Indexes for table `rejected_reason`
--
ALTER TABLE `rejected_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reports_reporter_id` (`reporter_id`),
  ADD KEY `fk_reports_option_id` (`report_option_id`);

--
-- Indexes for table `report_options`
--
ALTER TABLE `report_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `saved_ads`
--
ALTER TABLE `saved_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_saved_ads_user_id` (`user_id`),
  ADD KEY `index_saved_ads_ad_id` (`ad_id`),
  ADD KEY `index_saved_ads_created_at` (`created_at`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `seller_services_availabilities`
--
ALTER TABLE `seller_services_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_requests`
--
ALTER TABLE `special_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `special_request_details`
--
ALTER TABLE `special_request_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_requests_id` (`special_requests_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `deleted_at` (`deleted_at`);

--
-- Indexes for table `user_category_limits`
--
ALTER TABLE `user_category_limits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_category` (`user_id`,`category_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_category_id` (`category_id`);

--
-- Indexes for table `user_daily_event`
--
ALTER TABLE `user_daily_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_event_id` (`daily_event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_discounts_user_id_foreign` (`user_id`),
  ADD KEY `user_discounts_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`user_id`),
  ADD KEY `index_user_locations_user_id` (`user_id`),
  ADD KEY `index_user_locations_coordinates` (`longitude`,`latitude`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_notification_id_foreign` (`notification_id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_websockets_statistics_entries_app_id` (`app_id`),
  ADD KEY `index_websockets_statistics_entries_created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address_user`
--
ALTER TABLE `address_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `ads_attributes`
--
ALTER TABLE `ads_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `ads_images`
--
ALTER TABLE `ads_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `ads_type`
--
ALTER TABLE `ads_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `categories_attributes`
--
ALTER TABLE `categories_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category_seller`
--
ALTER TABLE `category_seller`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `city_driver`
--
ALTER TABLE `city_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city_seller`
--
ALTER TABLE `city_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `confirmation_codes`
--
ALTER TABLE `confirmation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `daliy_events`
--
ALTER TABLE `daliy_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_ads`
--
ALTER TABLE `favorite_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favourite_products`
--
ALTER TABLE `favourite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hidden_ads`
--
ALTER TABLE `hidden_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `home_page_category`
--
ALTER TABLE `home_page_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `order_details_extra_services`
--
ALTER TABLE `order_details_extra_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_extra_services`
--
ALTER TABLE `product_extra_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_variation_attributes`
--
ALTER TABLE `product_variation_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recently_view_ads`
--
ALTER TABLE `recently_view_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `rejected_reason`
--
ALTER TABLE `rejected_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `report_options`
--
ALTER TABLE `report_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saved_ads`
--
ALTER TABLE `saved_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller_services_availabilities`
--
ALTER TABLE `seller_services_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `special_requests`
--
ALTER TABLE `special_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `special_request_details`
--
ALTER TABLE `special_request_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user_category_limits`
--
ALTER TABLE `user_category_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_daily_event`
--
ALTER TABLE `user_daily_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_discounts`
--
ALTER TABLE `user_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_seller`
--
ALTER TABLE `category_seller`
  ADD CONSTRAINT `category_seller_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_seller_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount_seller`
--
ALTER TABLE `discount_seller`
  ADD CONSTRAINT `discount_seller_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`),
  ADD CONSTRAINT `discount_seller_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_page_category`
--
ALTER TABLE `home_page_category`
  ADD CONSTRAINT `home_page_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifications_sellers` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_variation_id_foreign` FOREIGN KEY (`product_variation_id`) REFERENCES `product_variations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variation_attributes`
--
ALTER TABLE `product_variation_attributes`
  ADD CONSTRAINT `product_variation_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variation_attributes_product_variation_id_foreign` FOREIGN KEY (`product_variation_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD CONSTRAINT `recently_viewed_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recently_viewed_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_reports_option_id` FOREIGN KEY (`report_option_id`) REFERENCES `report_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reports_reporter_id` FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_services_availabilities`
--
ALTER TABLE `seller_services_availabilities`
  ADD CONSTRAINT `seller_services_availabilities_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seller_services_availabilities_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seller_services_availabilities_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `special_request_details`
--
ALTER TABLE `special_request_details`
  ADD CONSTRAINT `special_request_details_ibfk_1` FOREIGN KEY (`special_requests_id`) REFERENCES `special_requests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `user_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_notification_ibfk_2` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
