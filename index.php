<?php
// header("Refresh:6; url=home");

// Database connection
$host = 'localhost';
$db   = 'altuimholdings';
$user = 'altuimholdings';
$pass = 'altuimHOLDINGS123456$';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

// Generate AES token
function generateAESToken($data)
{
    $secret_key = "my_secret_key_123456";
    $secret_iv  = "my_secret_iv_123456";

    $key = hash('sha256', $secret_key);
    $iv  = substr(hash('sha256', $secret_iv), 0, 16);

    return base64_encode(openssl_encrypt($data, "AES-256-CBC", $key, 0, $iv));
}

// Get IP address
function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    return $_SERVER['REMOTE_ADDR'];
}

// Get Operating System
function getUserOS()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $osArray = [
        '/windows nt 10/i'     => 'Windows 10',
        '/windows nt 6.3/i'    => 'Windows 8.1',
        '/windows nt 6.2/i'    => 'Windows 8',
        '/windows nt 6.1/i'    => 'Windows 7',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/linux/i'             => 'Linux',
        '/iphone/i'            => 'iPhone',
        '/android/i'           => 'Android',
        '/ipad/i'              => 'iPad'
    ];
    foreach ($osArray as $regex => $value) {
        if (preg_match($regex, $userAgent)) return $value;
    }
    return "Unknown OS";
}

// Get Browser
function getUserBrowser()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browsers = [
        '/msie/i'       => 'Internet Explorer',
        '/firefox/i'    => 'Firefox',
        '/chrome/i'     => 'Chrome',
        '/safari/i'     => 'Safari',
        '/edge/i'       => 'Edge',
        '/opera/i'      => 'Opera',
        '/mobile/i'     => 'Mobile Browser'
    ];
    foreach ($browsers as $regex => $value) {
        if (preg_match($regex, $userAgent)) return $value;
    }
    return "Unknown Browser";
}

// Get Location using ip-api
function getLocationData($ip)
{
    $url = "http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,query";
    $response = @file_get_contents($url);
    if ($response) {
        $data = json_decode($response, true);
        if ($data['status'] === 'success') {
            return [
                'ip'      => $data['query'],
                'country' => $data['country'],
                'region'  => $data['regionName'],
                'city'    => $data['city']
            ];
        }
    }
    return [
        'ip'      => $ip,
        'country' => 'Unknown',
        'region'  => 'Unknown',
        'city'    => 'Unknown'
    ];
}

// Gather all info
$ip = getUserIP();
$os = getUserOS();
$browser = getUserBrowser();
$location = getLocationData($ip);
$country = $location['country'];
$region  = $location['region'];
$city    = $location['city'];

// Check if IP exists
$stmt = $pdo->prepare("SELECT COUNT(*) FROM visitors WHERE ip_address = ?");
$stmt->execute([$ip]);
$count = $stmt->fetchColumn();

if ($count == 0) {
    // Generate unique AES token for this visitor
    $token = generateAESToken($ip . time());

    // Insert new visitor
    $insert = $pdo->prepare("INSERT INTO visitors (ip_address, operating_system, country, `state/region`, city, browser, token) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->execute([$ip, $os, $country, $region, $city, $browser, $token]);

    // Send email notification
    require_once('./PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'mail.techbyfrancis.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'admin@techbyfrancis.com';
        $mail->Password   = 'Francis1972##';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('admin@techbyfrancis.com', 'Mapleaf Capital Notification');
        $mail->addAddress('francisnwankwo1972@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Unique Visitor Alert';
        $mail->Body    = "
            <h3>New Unique Visitor</h3>
            <p><strong>IP Address:</strong> $ip</p>
            <p><strong>Operating System:</strong> $os</p>
            <p><strong>Browser:</strong> $browser</p>
            <p><strong>Country:</strong> $country</p>
            <p><strong>Region:</strong> $region</p>
            <p><strong>City:</strong> $city</p>
            <p><small>Time: " . date('Y-m-d H:i:s') . "</small></p>
        ";

        $mail->send();
    } catch (Exception $e) {
        // Handle email error silently
    }
}
?>
<?php
// Page configuration
$pageTitle = "Mapleaf Capital";
$address = "9th Floor, No. 1 Spinningfields, 1 Hardman Square, Manchester M3 3EB, United Kingdom";
$email = "support@mapleafcapitals.com";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-outline {
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.8);
            color: transparent;
        }

        /* Completely prevent Google Translate from pushing down or obstructing the page/header */
        .goog-te-banner-frame.skiptranslate,
        .goog-te-banner-frame {
            display: none !important;
        }

        body {
            top: 0px !important;
            position: static !important;
        }

        /* Fix Google Translate dropdown positioning and frame overflow */
        .goog-te-gadget {
            font-size: 0px !important;
        }

        .goog-te-gadget span {
            display: none !important;
        }

        .goog-te-combo {
            background-color: white !important;
            color: #1f2937 !important;
            padding: 4px 8px !important;
            border-radius: 0.375rem !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            border: 1px solid #d1d5db !important;
            outline: none !important;
            cursor: pointer !important;
        }

        /* Prevent Google's popup tooltip banner from breaking layout */
        #goog-gt-tt {
            display: none !important;
        }

        .goog-tooltip {
            display: none !important;
        }

        .goog-text-highlight {
            background-color: transparent !important;
            box-shadow: none !important;
        }

        /* Carousel Fade & Zoom Slide Animations */
        .carousel-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: scale(1.03);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
            pointer-events: none;
            z-index: 10;
        }

        .carousel-slide.active {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
            z-index: 20;
        }

        /* Slide Text Entrance Animations */
        .carousel-slide .animate-text-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .carousel-slide.active .animate-text-up {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered animation delays */
        .carousel-slide.active .delay-1 {
            transition-delay: 0.2s;
        }

        .carousel-slide.active .delay-2 {
            transition-delay: 0.4s;
        }

        .carousel-slide.active .delay-3 {
            transition-delay: 0.6s;
        }
    </style>
</head>

<body class="bg-gray-900 text-white font-sans antialiased m-0 p-0">

    <?php include 'inc/nav.php'; ?>

    <!-- 2-Slide Hero Carousel Header with Entrance Animations (Full Viewport Height) -->
    <header class="relative h-[700px] w-full overflow-hidden bg-gray-950">

        <!-- SLIDE 1 -->
        <div class="carousel-slide active absolute inset-0 w-full h-full flex items-center justify-center text-center">
            <!-- Slide 1 Background Image -->
            <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-blue-950/60 z-10"></div>

            <!-- Slide 1 Content with Staggered Entrance Animations -->
            <div class="relative z-20 max-w-4xl px-4">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold uppercase tracking-wide mb-3">
                    <span class="text-outline block text-3xl sm:text-4xl md:text-6xl font-light mb-2 animate-text-up delay-1">Welcome To</span>
                    <span class="block animate-text-up delay-2">Mapleaf Capital </span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-10 font-medium animate-text-up delay-3">A proven way to build a successful portfolio</p>

                <div class="flex justify-center animate-text-up" style="transition-delay: 0.8s;">
                    <a href="account" class="bg-[#3b82f6] hover:bg-blue-600 text-white text-sm md:text-base font-bold px-10 py-4 rounded-full shadow-xl flex items-center space-x-2 transition transform hover:-translate-y-0.5 cursor-pointer">
                        <span>GET STARTED</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="carousel-slide absolute inset-0 w-full h-full flex items-center justify-center text-center">
            <!-- Slide 2 Background Image -->
            <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=2071&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-blue-950/60 z-10"></div>

            <!-- Slide 2 Content with Staggered Entrance Animations -->
            <div class="relative z-20 max-w-4xl px-4">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold tracking-wide mb-4">
                    <span class="text-outline block text-3xl sm:text-4xl md:text-6xl font-light mb-2 animate-text-up delay-1">Earn Profit</span>
                    <span class="block animate-text-up delay-2">Without <br>Compromising</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-10 font-medium animate-text-up delay-3">We support the growth of investment in promising innovations</p>

                <div class="flex justify-center animate-text-up" style="transition-delay: 0.8s;">
                    <a href="about" class="bg-[#3b82f6] hover:bg-blue-600 text-white text-sm md:text-base font-bold px-10 py-4 rounded-full shadow-xl flex items-center space-x-2 transition transform hover:-translate-y-0.5 cursor-pointer">
                        <span>Read More</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Left Arrow -->
        <button id="prevSlideBtn" onclick="prevSlide()" aria-label="Previous Slide" class="absolute left-6 top-1/2 -translate-y-1/2 z-30 bg-amber-800/40 hover:bg-amber-800/70 text-white p-3.5 rounded-full backdrop-blur-sm transition cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <!-- Carousel Right Arrow -->
        <button id="nextSlideBtn" onclick="nextSlide()" aria-label="Next Slide" class="absolute right-6 top-1/2 -translate-y-1/2 z-30 bg-amber-800/40 hover:bg-amber-800/70 text-white p-3.5 rounded-full backdrop-blur-sm transition cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </header>

    <!-- Floating Chat Widgets -->
    <?php include 'inc/floating-whatsapp.php'; ?>


    <!-- Carousel Animation Controller JavaScript -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const totalSlides = slides.length;

        function updateCarousel() {
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }

        // Auto slide every 6 seconds
        setInterval(nextSlide, 6000);
    </script>

    <!-- About Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Row -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between pb-10 border-b border-gray-800 mb-12 gap-6">
                <div class="flex-1">
                    <p class="text-xs uppercase tracking-widest text-blue-400 font-semibold mb-1">About Us</p>
                    <h3 class="text-3xl md:text-5xl font-extrabold text-blue-500 tracking-tight">EARN ACTIVELY</h3>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg md:text-xl font-medium text-gray-200 leading-relaxed">
                        Invest wisely on Real Estate and enjoy massive profit returns.
                    </h2>
                </div>
                <div class="flex flex-wrap gap-3">
                    <!-- View Company Certificate (Opens in New Tab) -->
                    <a href="./assets/images/company-cert.jpeg" target="_blank" rel="noopener noreferrer" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-3 rounded-full shadow-lg hover:shadow-blue-500/25 transition duration-300 transform hover:-translate-y-0.5">
                        <span>COMPANY CERT</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>

                    <!-- View Company PDF (Opens in New Tab) -->
                    <a href="./assets/images/Mapleaf Capitalcapitals.pdf" target="_blank" rel="noopener noreferrer" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-3 rounded-full shadow-lg hover:shadow-blue-500/25 transition duration-300 transform hover:-translate-y-0.5">
                        <span>COMPANY PDF</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Content Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card 1: Capabilities -->
                <div class="bg-gray-800/80 rounded-xl overflow-hidden border border-gray-700/50 hover:border-blue-500 transition duration-300 flex flex-col justify-between shadow-lg">
                    <div>
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover" src="./assets/images/38440ce4961830925b2410f7181eac43.jpg" alt="Capabilities" />
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-3">Capabilities:</h4>
                            <div class="text-xs text-gray-300 space-y-2 leading-relaxed">
                                <p class="font-semibold text-blue-400">Mapleaf Capital executes corporate transactions such as:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Companies selling a portion of the business.</li>
                                    <li>Management buyouts.</li>
                                    <li>Investment rounds with private investors.</li>
                                    <li>Advising companies on mergers & acquisitions (M&A) — helping buyers and sellers negotiate and complete deals.</li>
                                    <li>Advising on capital raising — helping investors and companies to raise money through good investment plans.</li>
                                    <li>Providing strategic financial advice to corporate clients (e.g., how to structure financing for expansion).</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="p-6 pt-0">
                        <a href="#" class="inline-flex items-center text-blue-400 hover:text-blue-300 text-xs font-bold transition">
                            Learn More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div> -->
                </div>

                <!-- Card 2: Sector Focus -->
                <div class="bg-gray-800/80 rounded-xl overflow-hidden border border-gray-700/50 hover:border-blue-500 transition duration-300 flex flex-col justify-between shadow-lg">
                    <div>
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover" src="./assets/images/02.jpg" alt="Sector Focus" />
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-3">SECTOR FOCUS :</h4>
                            <p class="text-xs text-gray-300 leading-relaxed">
                                It worked across various industries like technology, healthcare, consumer, financial services and business services.
                            </p>
                        </div>
                    </div>
                    <!-- <div class="p-6 pt-0">
                        <a href="#" class="inline-flex items-center text-blue-400 hover:text-blue-300 text-xs font-bold transition">
                            Learn More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div> -->
                </div>

                <!-- Card 3: Our Aim -->
                <div class="bg-gray-800/80 rounded-xl overflow-hidden border border-gray-700/50 hover:border-blue-500 transition duration-300 flex flex-col justify-between shadow-lg">
                    <div>
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover" src="./assets/images/03.jpg" alt="Our Aim" />
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-white mb-3">Our aim</h4>
                            <p class="text-xs text-gray-300 leading-relaxed">
                                Our aim is to utilize our expertise to create a platform where Non-miners and Tech novice can participate and benefit from the crypto market investments.
                            </p>
                        </div>
                    </div>
                    <!-- <div class="p-6 pt-0">
                        <a href="#" class="inline-flex items-center text-blue-400 hover:text-blue-300 text-xs font-bold transition">
                            Learn More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div> -->
                </div>

                <!-- Card 4: Programs & Careers -->
                <div class="flex flex-col justify-between space-y-4">
                    <div class="bg-gray-800/80 p-6 rounded-xl border border-gray-700/50 border-t-4 border-t-blue-500 shadow-lg">
                        <h4 class="text-lg font-bold text-blue-400 mb-2">Quality Circle Program</h4>
                        <p class="text-xs text-gray-300 leading-relaxed">
                            A unique of its kind initiative to impart financial awareness among people and to tell them about basic do’s and dont’s of financial management.
                        </p>
                    </div>

                    <div class="bg-blue-950/80 p-6 rounded-xl border border-blue-800/50 shadow-lg">
                        <h4 class="text-lg font-bold text-white mb-2">Careers with us</h4>
                        <p class="text-xs text-blue-200 leading-relaxed">
                            There’s always room for intelligent people who are excited about the Capital world and are continually looking forward to seeing what’s next.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Invest in the future of finance Section -->
    <section class="py-20 bg-gray-50 text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Title & Subtitle -->
            <div class="text-center max-w-3xl mx-auto mb-14">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#3b82f6] tracking-tight mb-3">
                    Invest in the future of finance
                </h2>
                <p class="text-sm md:text-base text-gray-600 font-medium">
                    Invest in the disruption of a multi-trillion dollar industry the smart way.
                </p>
            </div>

            <!-- 6-Box Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Box 1: Global Investor Reach -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m-15.686 0A8.959 8.959 0 003 12c0-.778.099-1.533.284-2.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide leading-tight">
                                GLOBAL INVESTOR<br>REACH
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            We have an active, growing community of over 15,000 investors from more than 150 countries. Blockchain knows no borders.
                        </p>
                    </div>
                </div>

                <!-- Box 2: Invest Securely -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide">
                                INVEST SECURELY
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            We use bank-grade security procedures including secure socket layers, two factor authentication and are registered with our Monetary Authority to run a securities business and transfer funds in secure, dedicated client money accounts.
                        </p>
                    </div>
                </div>

                <!-- Box 3: Invest With Protection -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide leading-tight">
                                INVEST WITH<br>PROTECTION
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            Receive professional grade protections through our unique pooled investment structure so your investments can grow in a tax-efficient way.
                        </p>
                    </div>
                </div>

                <!-- Box 4: Invest With Specialists -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide leading-tight">
                                INVEST WITH<br>SPECIALISTS
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            We are the largest global online investment community of professional investors all investing in financial innovation and technology.
                        </p>
                    </div>
                </div>

                <!-- Box 5: Ongoing Investor Relations -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide leading-tight">
                                ONGOING<br>INVESTOR RELATIONS
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            Investors and businesses can easily keep-in-touch online throughout the investment lifecycle and store all documentation in one place.
                        </p>
                    </div>
                </div>

                <!-- Box 6: Natively Digital -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-300 transition-all duration-300 border border-gray-100 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="text-orange-400 flex-shrink-0 transform group-hover:scale-110 transition duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12H3V5.25"></path>
                                </svg>
                            </div>
                            <h3 class="text-base font-extrabold text-[#3b82f6] tracking-wide">
                                NATIVELY DIGITAL
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-normal">
                            We are the digital alternative to traditional asset management - borderless, hyper-efficient and usable from any smartphone. No paperwork required.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Video, Mapleaf Capital Card & Stats Counter Section -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-4 flex flex-col items-center text-center">

            <!-- Embedded Video Player -->
            <div class="w-full max-w-lg aspect-video bg-black rounded-lg overflow-hidden shadow-lg mb-6">
                <video class="w-full h-full object-cover" controls poster="./assets/videos/Mapleaf Capitalcapitalholdings.mp4">
                    <source src="./assets/videos/altiumcapitalholdings.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <!-- Section Title -->
            <h3 class="text-xl md:text-2xl font-extrabold text-[#3b82f6] tracking-wide mb-6">
                Mapleaf Capital CARD
            </h3>

            <!-- Debit Card Graphic -->
            <div class="w-full max-w-md mb-6 transform hover:scale-105 transition duration-300">
                <div class="relative w-full h-56 rounded-2xl p-6 text-white shadow-2xl flex flex-col justify-between overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-blue-950 border border-slate-700">
                    <!-- Grid background pattern overlay -->
                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>

                    <!-- Card Header -->
                    <div class="relative z-10 flex justify-between items-start">
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                            <span class="text-xs font-bold tracking-widest block">Mapleaf Capital</span>
                        </div>
                        <span class="text-xs font-semibold text-gray-300 tracking-wider">Classic Debit</span>
                    </div>

                    <!-- EMV Chip & Bitcoin watermark -->
                    <div class="relative z-10 flex justify-between items-center my-2">
                        <div class="w-10 h-7 bg-amber-200/80 rounded-md border border-amber-400/50 flex flex-col justify-around p-1">
                            <div class="h-[1px] bg-amber-600/60 w-full"></div>
                            <div class="h-[1px] bg-amber-600/60 w-full"></div>
                        </div>
                        <!-- Bitcoin Logo Background Accent -->
                        <span class="text-6xl font-bold text-white/10 absolute right-2 select-none">₿</span>
                    </div>

                    <!-- Card Number & Holder Details -->
                    <div class="relative z-10">
                        <div class="font-mono text-lg md:text-xl tracking-widest mb-3 font-semibold text-gray-100">
                            0123 0123 0123 0123
                        </div>
                        <div class="flex justify-between items-end text-[10px] uppercase font-mono tracking-wider">
                            <div>
                                <div class="text-[8px] text-gray-400">Cardholder Name</div>
                                <div class="font-bold text-sm text-gray-200">CARDHOLDER NAME</div>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-6 h-6 bg-red-600 rounded-full opacity-90"></div>
                                <div class="w-6 h-6 bg-amber-500 rounded-full -ml-3 opacity-90"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Request Text & Action Link -->
            <p class="text-sm md:text-base font-extrabold text-[#3b82f6] mb-2">
                Email support to request for the card
            </p>
            <a href="mailto:support@Mapleaf Capitalcapitals.com" class="text-sm font-bold text-[#3b82f6] hover:underline hover:text-blue-700 transition">
                Request Now
            </a>

        </div>

        <!-- Blue Stats Banner -->
        <div class="w-full bg-[#3b82f6] py-16 mt-16 text-white">
            <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-around items-center gap-8">

                <!-- Counter Item 1: Happy Clients -->
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full border-2 border-white/80 flex items-center justify-center text-orange-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl md:text-4xl font-extrabold block tracking-tight">3832</span>
                        <span class="text-xs font-semibold tracking-wider uppercase text-blue-100">Happy Clients</span>
                    </div>
                </div>

                <!-- Additional stat counter placeholders (optional) -->
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full border-2 border-white/80 flex items-center justify-center text-orange-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl md:text-4xl font-extrabold block tracking-tight">$15M+</span>
                        <span class="text-xs font-semibold tracking-wider uppercase text-blue-100">Capital Managed</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full border-2 border-white/80 flex items-center justify-center text-orange-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V11a2 2 0 012-2h1.055M12 21a9 9 0 100-18 9 9 0 000 18z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl md:text-4xl font-extrabold block tracking-tight">150+</span>
                        <span class="text-xs font-semibold tracking-wider uppercase text-blue-100">Countries Served</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Deposits & Latest Withdrawals Section (Live 2-Second Stream) -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- LATEST DEPOSIT TABLE -->
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl md:text-2xl font-extrabold text-[#3b82f6] tracking-wider uppercase">
                            LATEST DEPOSIT
                        </h3>
                        <span class="inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>LIVE</span>
                        </span>
                    </div>

                    <div class="overflow-x-auto bg-white rounded-lg border border-gray-100 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <tbody id="depositTableBody">
                                <!-- Populated dynamically via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- LATEST WITHDRAWAL TABLE -->
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl md:text-2xl font-extrabold text-[#3b82f6] tracking-wider uppercase">
                            LATEST WITHDRAWAL
                        </h3>
                        <span class="inline-flex items-center space-x-1.5 text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>LIVE</span>
                        </span>
                    </div>

                    <div class="overflow-x-auto bg-white rounded-lg border border-gray-100 shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <tbody id="withdrawalTableBody">
                                <!-- Populated dynamically via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2-Second Auto-Updating JavaScript Generator -->
    <script>
        const firstNames = ['Elna', 'Misty', 'Risa', 'Maggie', 'Licha', 'Bibbie', 'Mindy', 'Elisa', 'Adrianna', 'Van', 'Ethelin', 'Adelaida', 'Beverley', 'Zulema', 'Diann', 'Nixie', 'Dotti', 'Judy', 'Shena', 'Juliane', 'Marcus', 'Gareth', 'Liam', 'Sophia', 'Chloe'];
        const lastNames = ['Sean', 'Dulcy', 'Enriqueta', 'Aubrey', 'Birgit', 'Rozamond', 'Veronike', 'Rosalynd', 'Valera', 'Mirabel', 'Penni', 'Beulah', 'Debbi', 'Nedda', 'Arlie', 'Grethel', 'Florentia', 'Gilligan', 'Kip', 'Blakeley', 'Vance', 'Wright'];

        const gateways = [{
                name: 'Ethereum',
                symbol: '◆',
                bg: 'bg-slate-100',
                text: 'text-slate-800',
                border: 'border-slate-200'
            },
            {
                name: 'Bitcoin',
                symbol: '₿',
                bg: 'bg-amber-50',
                text: 'text-amber-700',
                border: 'border-amber-200'
            },
            {
                name: 'DASH',
                symbol: 'Đ',
                bg: 'bg-blue-50',
                text: 'text-blue-700',
                border: 'border-blue-200'
            },
            {
                name: 'Crypto',
                symbol: '🪙',
                bg: 'bg-amber-50',
                text: 'text-amber-600',
                border: 'border-amber-200'
            },
            {
                name: 'PerfectMoney',
                symbol: 'PM',
                bg: 'bg-red-50',
                text: 'text-red-600',
                border: 'border-red-200'
            },
            {
                name: 'Doge Coin',
                symbol: '🐕',
                bg: 'bg-yellow-50',
                text: 'text-yellow-700',
                border: 'border-yellow-200'
            }
        ];

        function getRandomItem(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        function getRandomAmount(min, max) {
            return (Math.random() * (max - min) + min).toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2
            });
        }

        function createRowHTML(data) {
            return `
            <td class="py-3 px-4">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold ${data.gw.bg} ${data.gw.text} border ${data.gw.border}">
                    ${data.gw.symbol} ${data.gw.name}
                </span>
            </td>
            <td class="py-3 px-4 text-xs font-bold text-gray-800">${data.amount}</td>
            <td class="py-3 px-4 text-xs font-medium text-gray-600 text-right">${data.name}</td>
        `;
        }

        function generateInitialData(count) {
            const list = [];
            for (let i = 0; i < count; i++) {
                list.push({
                    gw: getRandomItem(gateways),
                    amount: getRandomAmount(100, 9500),
                    name: `${getRandomItem(firstNames)} ${getRandomItem(lastNames)}`
                });
            }
            return list;
        }

        function renderTable(elementId, dataList) {
            const container = document.getElementById(elementId);
            container.innerHTML = '';
            dataList.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.className = `border-b border-gray-100 hover:bg-gray-50/80 transition duration-300 ${index === dataList.length - 1 ? 'border-none' : ''}`;
                tr.innerHTML = createRowHTML(item);
                container.appendChild(tr);
            });
        }

        const deposits = generateInitialData(10);
        const withdrawals = generateInitialData(10);

        renderTable('depositTableBody', deposits);
        renderTable('withdrawalTableBody', withdrawals);

        // Update both tables every 2 seconds continuously
        setInterval(() => {
            // Push new deposit at top
            deposits.unshift({
                gw: getRandomItem(gateways),
                amount: getRandomAmount(150, 9800),
                name: `${getRandomItem(firstNames)} ${getRandomItem(lastNames)}`
            });
            deposits.pop();
            renderTable('depositTableBody', deposits);

            // Highlight top deposit row momentarily
            const firstDepositRow = document.querySelector('#depositTableBody tr');
            if (firstDepositRow) {
                firstDepositRow.classList.add('bg-blue-50/80');
                setTimeout(() => firstDepositRow.classList.remove('bg-blue-50/80'), 600);
            }

            // Push new withdrawal at top
            withdrawals.unshift({
                gw: getRandomItem(gateways),
                amount: getRandomAmount(100, 8500),
                name: `${getRandomItem(firstNames)} ${getRandomItem(lastNames)}`
            });
            withdrawals.pop();
            renderTable('withdrawalTableBody', withdrawals);

            // Highlight top withdrawal row momentarily
            const firstWithdrawalRow = document.querySelector('#withdrawalTableBody tr');
            if (firstWithdrawalRow) {
                firstWithdrawalRow.classList.add('bg-emerald-50/80');
                setTimeout(() => firstWithdrawalRow.classList.remove('bg-emerald-50/80'), 600);
            }
        }, 2000);
    </script>

    <!-- Investment Pricing Plans Section -->
    <section class="py-24 bg-slate-950 text-white font-sans relative isolate z-0 overflow-hidden select-none">

        <!-- Ambient Glowing Background Nodes -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-gradient-to-b from-blue-600/15 via-indigo-500/10 to-transparent blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Title & Subtitle -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="inline-block px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 text-[#3b82f6] text-xs font-extrabold tracking-widest uppercase rounded-full shadow-sm">
                    Investment Strategies
                </span>
                <h3 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white">
                    Choose the plan that works for you
                </h3>
                <p class="text-sm md:text-base text-slate-400 font-medium leading-relaxed max-w-2xl mx-auto">
                    Our team prioritizes the safety and growth of investor capital. Every package includes full principal returns alongside daily earnings.
                </p>
            </div>

            <!-- 3-Column Pricing Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">

                <!-- Plan 1: Starter Plan -->
                <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800/90 rounded-3xl p-8 sm:p-10 flex flex-col justify-between text-left relative overflow-hidden shadow-xl hover:border-blue-500/40 hover:shadow-2xl hover:shadow-blue-900/20 transition-all duration-300 group">

                    <div>
                        <!-- Header Badges & Plan Title -->
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-xs font-bold tracking-wider text-slate-400 uppercase">Tier 01</span>
                            <span class="px-3 py-1 bg-slate-800/80 border border-slate-700/60 text-slate-300 text-[11px] font-semibold rounded-full">
                                Starter
                            </span>
                        </div>

                        <h3 class="text-2xl font-extrabold text-white mb-2 tracking-tight">
                            Starter Plan
                        </h3>

                        <!-- Daily Return Highlight -->
                        <div class="flex items-baseline space-x-2 mb-6">
                            <span class="text-3xl sm:text-4xl font-extrabold text-[#f97316] tracking-tight">2.0%</span>
                            <span class="text-xs text-slate-400 font-medium">Daily for 6 days</span>
                        </div>

                        <!-- Price Limit Box -->
                        <div class="bg-slate-950/80 border border-slate-800/80 rounded-2xl p-4 mb-8">
                            <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">Investment Range</span>
                            <span class="text-lg font-bold text-slate-200 tracking-tight">$200 — $19,999</span>
                        </div>

                        <!-- Feature Checklist -->
                        <ul class="space-y-3.5 text-xs font-semibold text-slate-300 mb-8">
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Daily Capital Earnings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>10% Referral Commission</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Instant Automated Withdrawal</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>24/7 Dedicated Support</span>
                            </li>
                        </ul>
                    </div>

                    <!-- CTA Button -->
                    <a href="signin" class="w-full bg-slate-800/80 hover:bg-[#3b82f6] border border-slate-700/80 hover:border-transparent text-white text-xs font-extrabold py-4 rounded-xl text-center flex items-center justify-center space-x-2 transition duration-300 transform group-hover:scale-[1.02]">
                        <span>Select Plan</span>
                        <span class="text-base leading-none">→</span>
                    </a>

                </div>

                <!-- Plan 2: Growth Plan (Featured Featured Highlight) -->
                <div class="bg-gradient-to-b from-slate-900 via-slate-900/90 to-blue-950/40 border-2 border-[#3b82f6] rounded-3xl p-8 sm:p-10 flex flex-col justify-between text-left relative overflow-hidden shadow-2xl shadow-blue-600/20 transform lg:-translate-y-3 transition-all duration-300 group">

                    <!-- Popular Badge -->
                    <div class="absolute top-0 right-0">
                        <span class="bg-[#3b82f6] text-white text-[10px] font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-bl-2xl shadow-md">
                            Most Popular
                        </span>
                    </div>

                    <div>
                        <!-- Header Badges & Plan Title -->
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-xs font-bold tracking-wider text-blue-400 uppercase">Tier 02</span>
                        </div>

                        <h3 class="text-2xl font-extrabold text-white mb-2 tracking-tight">
                            Growth Plan
                        </h3>

                        <!-- Daily Return Highlight -->
                        <div class="flex items-baseline space-x-2 mb-6">
                            <span class="text-3xl sm:text-4xl font-extrabold text-[#f97316] tracking-tight">3.5%</span>
                            <span class="text-xs text-slate-300 font-medium">Daily for 12 days</span>
                        </div>

                        <!-- Price Limit Box -->
                        <div class="bg-slate-950/90 border border-blue-500/30 rounded-2xl p-4 mb-8">
                            <span class="block text-[11px] font-semibold text-blue-400 uppercase tracking-wider mb-1">Investment Range</span>
                            <span class="text-lg font-bold text-white tracking-tight">$20,000 — $100,000</span>
                        </div>

                        <!-- Feature Checklist -->
                        <ul class="space-y-3.5 text-xs font-semibold text-slate-200 mb-8">
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Daily Capital Earnings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>10% Referral Commission</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Instant Automated Withdrawal</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Priority 24/7 VIP Support</span>
                            </li>
                        </ul>
                    </div>

                    <!-- CTA Button -->
                    <a href="signin" class="w-full bg-gradient-to-r from-[#3b82f6] to-[#2563eb] hover:from-[#2563eb] hover:to-[#1d4ed8] text-white text-xs font-extrabold py-4 rounded-xl text-center flex items-center justify-center space-x-2 shadow-lg shadow-blue-500/25 transition duration-300 transform group-hover:scale-[1.02]">
                        <span>Select Growth Plan</span>
                        <span class="text-base leading-none">→</span>
                    </a>

                </div>

                <!-- Plan 3: Premium Plan -->
                <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800/90 rounded-3xl p-8 sm:p-10 flex flex-col justify-between text-left relative overflow-hidden shadow-xl hover:border-blue-500/40 hover:shadow-2xl hover:shadow-blue-900/20 transition-all duration-300 group">

                    <div>
                        <!-- Header Badges & Plan Title -->
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-xs font-bold tracking-wider text-slate-400 uppercase">Tier 03</span>
                            <span class="px-3 py-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 text-[11px] font-semibold rounded-full">
                                Institutional
                            </span>
                        </div>

                        <h3 class="text-2xl font-extrabold text-white mb-2 tracking-tight">
                            Premium Plan
                        </h3>

                        <!-- Daily Return Highlight -->
                        <div class="flex items-baseline space-x-2 mb-6">
                            <span class="text-3xl sm:text-4xl font-extrabold text-[#f97316] tracking-tight">5.0%</span>
                            <span class="text-xs text-slate-400 font-medium">Daily for 20 days</span>
                        </div>

                        <!-- Price Limit Box -->
                        <div class="bg-slate-950/80 border border-slate-800/80 rounded-2xl p-4 mb-8">
                            <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-1">Investment Range</span>
                            <span class="text-lg font-bold text-slate-200 tracking-tight">$100,000 — Unlimited</span>
                        </div>

                        <!-- Feature Checklist -->
                        <ul class="space-y-3.5 text-xs font-semibold text-slate-300 mb-8">
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Daily Capital Earnings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>10% Referral Commission</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Instant Automated Withdrawal</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <div class="w-5 h-5 rounded-full bg-blue-500/10 text-[#3b82f6] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span>Priority 24/7 VIP Support</span>
                            </li>
                        </ul>
                    </div>

                    <!-- CTA Button -->
                    <a href="signin" class="w-full bg-slate-800/80 hover:bg-[#3b82f6] border border-slate-700/80 hover:border-transparent text-white text-xs font-extrabold py-4 rounded-xl text-center flex items-center justify-center space-x-2 transition duration-300 transform group-hover:scale-[1.02]">
                        <span>Select Plan</span>
                        <span class="text-base leading-none">→</span>
                    </a>

                </div>

            </div>
        </div>
    </section>

    <!-- GCA Mapleaf Capital vs. Investment Services Comparison Card -->
    <section class="py-16 bg-gray-100 text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Main Card Container -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

                <!-- Dark Header -->
                <div class="bg-[#0b192c] text-white p-6 md:p-8">
                    <div class="flex items-center space-x-3 mb-2">
                        <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                            GCA Mapleaf Capital vs. Investment Services
                        </h2>
                    </div>
                    <div class="flex items-center space-x-2 text-xs md:text-sm text-blue-200">
                        <span class="w-1 h-4 bg-amber-500 inline-block rounded-full"></span>
                        <p>Strategic advisory & capital markets expertise vs. traditional retail offerings</p>
                    </div>
                </div>

                <!-- Table Header -->
                <div class="grid grid-cols-12 bg-gray-50/80 border-b border-gray-200 text-xs font-extrabold uppercase tracking-wider text-gray-700 py-4 px-6">
                    <div class="col-span-5 md:col-span-6">Type of Service</div>
                    <div class="col-span-3 md:col-span-3 flex items-center space-x-1.5 text-slate-800">
                        <svg class="w-4 h-4 text-slate-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                        </svg>
                        <span>GCA Mapleaf Capital</span>
                    </div>
                    <div class="col-span-4 md:col-span-3 text-slate-800">
                        Retail / Investment Services
                    </div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-100 text-xs md:text-sm">

                    <!-- Row 1: Corporate M&A Advisory -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-slate-700 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Corporate M&A Advisory</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-red-100 text-red-500 inline-flex items-center justify-center font-bold text-xs">✕</span>
                        </div>
                    </div>

                    <!-- Row 2: Capital Raising for Companies -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-slate-700 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span>Capital Raising for Companies</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-red-100 text-red-500 inline-flex items-center justify-center font-bold text-xs">✕</span>
                        </div>
                    </div>

                    <!-- Row 3: Debt and Capital Markets Advisory -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-slate-700 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            </svg>
                            <span>Debt and Capital Markets Advisory</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-red-100 text-red-500 inline-flex items-center justify-center font-bold text-xs">✕</span>
                        </div>
                    </div>

                    <!-- Row 4: Investment Products for Individuals -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-slate-700 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Investment Products for Individuals</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                    </div>

                    <!-- Row 5: Portfolio Management -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5 pl-6">
                            <span>Portfolio Management</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                    </div>

                    <!-- Row 6: Trading Execution for Investors -->
                    <div class="grid grid-cols-12 items-center py-4 px-6 hover:bg-gray-50/50 transition">
                        <div class="col-span-5 md:col-span-6 font-bold text-gray-800 flex items-center space-x-2.5 pl-6">
                            <span>Trading Execution for Investors</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                        <div class="col-span-4 md:col-span-3">
                            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-xs">✓</span>
                        </div>
                    </div>

                </div>

                <!-- Footer Legend & Callout -->
                <div class="bg-slate-50 p-6 border-t border-gray-100">
                    <div class="inline-block bg-slate-200/60 text-slate-800 font-semibold text-xs px-4 py-2 rounded-full mb-4">
                        GCA Mapleaf Capital: full-service investment banking & strategic advisory
                    </div>
                    <div class="flex flex-wrap items-center gap-6 text-[11px] text-gray-600 font-medium">
                        <div class="flex items-center space-x-1.5">
                            <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-600 inline-flex items-center justify-center font-bold text-[9px]">✓</span>
                            <span>Core competency / offered</span>
                        </div>
                        <div class="flex items-center space-x-1.5">
                            <span class="w-4 h-4 rounded-full bg-red-100 text-red-500 inline-flex items-center justify-center font-bold text-[9px]">✕</span>
                            <span>Typically not part of retail scope</span>
                        </div>
                        <div class="flex items-center space-x-1.5">
                            <span class="w-4 h-4 rounded-full bg-blue-100 text-blue-600 inline-flex items-center justify-center font-bold text-[9px]">i</span>
                            <span>Based on institutional vs. retail segmentation</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- OUR EXPERTS Team Section (4-Member Layout) -->
    <section class="py-20 bg-gray-50 text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Title -->
            <div class="text-center mb-16">
                <h2 class="text-2xl md:text-3xl font-extrabold text-amber-500 uppercase tracking-widest">
                    OUR EXPERTS
                </h2>
            </div>

            <!-- 4-Column Team Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch max-w-7xl mx-auto">

                <!-- Expert 1: William Harrington -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="overflow-hidden aspect-[3/4] bg-gray-100">
                        <img src="./assets/images/founder.jpeg"
                            alt="William Harrington"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="text-base md:text-lg font-extrabold text-amber-500 tracking-wide mb-1">
                            William Harrington
                        </h3>
                        <p class="text-[10px] font-semibold text-gray-400 tracking-wider uppercase">
                            CEO & Founder
                        </p>
                    </div>
                </div>

                <!-- Expert 2: Margaret Sinclair -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="overflow-hidden aspect-[3/4] bg-gray-100">
                        <img src="./assets/images/co-founder.jpeg"
                            alt="Margaret Sinclair"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="text-base md:text-lg font-extrabold text-amber-500 tracking-wide mb-1">
                            Margaret Sinclair
                        </h3>
                        <p class="text-[10px] font-semibold text-gray-400 tracking-wider uppercase">
                            Analysis Director & Co-Founder
                        </p>
                    </div>
                </div>

                <!-- Expert 3: Henry Caldwell -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="overflow-hidden aspect-[3/4] bg-gray-100">
                        <img src="./assets/images/administrator.jpeg"
                            alt="Henry Caldwell"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="text-base md:text-lg font-extrabold text-amber-500 tracking-wide mb-1">
                            Henry Caldwell
                        </h3>
                        <p class="text-[10px] font-semibold text-gray-400 tracking-wider uppercase">
                            Trading Administrator
                        </p>
                    </div>
                </div>

                <!-- Expert 4: Elena Vance -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="overflow-hidden aspect-[3/4] bg-gray-100">
                        <img src="./assets/images/manager.jpeg"
                            alt="Elena Vance"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="text-base md:text-lg font-extrabold text-amber-500 tracking-wide mb-1">
                            Elena Vance
                        </h3>
                        <p class="text-[10px] font-semibold text-gray-400 tracking-wider uppercase">
                            Head of Portfolio Risk
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Our Services / Opportunities to Explore Section (Light Black / Dark Charcoal Background) -->
    <section class="bg-[#12161f] text-white font-sans py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-red-400 font-serif italic text-sm md:text-base block mb-1">
                    Our Services
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                    Opportunities to Explore
                </h2>
            </div>

            <!-- Cards Grid Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card 1: Oil & Gas -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/oil.jpg"
                                alt="Oil & Gas"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Oil & Gas
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                The Oil And Gas Industry Is Vital For Meeting Global Energy Demands, Powering Transportation And Industry.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/oil" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

                <!-- Card 2: Real Estate -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/estate.jpg"
                                alt="Real Estate"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Real Estate
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                Mapleaf Capital is the world's largest commercial real estate services and investment company, with the #1 global market position in leasing, property sales, outsourcing, property management and valuation.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/real-estate" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

                <!-- Card 3: Agro Farming -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/agro.jpg"
                                alt="Agro Farming"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Agro Farming
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                As a leading, fully integrated agriculture investment manager, our experience, size, and scale allow us to access a wider array of markets, reduce operating risk, and provide low-cost, high-quality asset management.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/agro" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

                <!-- Card 4: Gold Mining -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/gold1.png"
                                alt="Gold Mining"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Gold Mining
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                Mapleaf Capital often conducts thorough geological surveys and exploration to identify and secure gold reserves.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/gold" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

                <!-- Card 5: Arbitrage Trading(A.I) -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/bot.png"
                                alt="Arbitrage Trading(A.I)"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Arbitrage Trading(A.I)
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                Mapleaf Capital Arbitrage Trading (A.I) offers numerous benefits to its investors through its sophisticated approach to exploiting market inefficiencies.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/trading" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

                <!-- Card 6: Stock Exchange -->
                <div class="bg-[#1a212e] rounded-xl shadow-xl overflow-hidden border border-gray-800 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div>
                        <div class="h-48 overflow-hidden bg-gray-800">
                            <img src="./assets/images/stock.jpg"
                                alt="Stock Exchange"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-base font-extrabold text-[#3b82f6] mb-3">
                                Stock Exchange
                            </h3>
                            <p class="text-xs text-gray-300 leading-relaxed font-medium">
                                With a team of experienced traders and financial experts, Mapleaf Capital ensures that investors' funds are managed with a high level of expertise.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 text-center">
                        <a href="services/exchange" class="text-xs font-bold text-[#3b82f6] hover:underline hover:text-blue-400 transition">
                            Read More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Real Estate Features Section -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- 3-Column Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 items-start">

                <!-- Feature 1: Street View -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-full h-64 sm:h-72 rounded-2xl overflow-hidden bg-slate-50 border border-gray-100 shadow-sm hover:shadow-md transition duration-300 mb-6 flex items-center justify-center p-2">
                        <img src="./assets/images/snap1.gif"
                            alt="Street View"
                            class="w-full h-full object-cover rounded-xl group-hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-[#3b82f6] tracking-tight">
                        Street View
                    </h3>
                </div>

                <!-- Feature 2: Property -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-full h-64 sm:h-72 rounded-2xl overflow-hidden bg-slate-50 border border-gray-100 shadow-sm hover:shadow-md transition duration-300 mb-6 flex items-center justify-center p-2">
                        <img src="./assets/images/snap2.gif"
                            alt="Property"
                            class="w-full h-full object-cover rounded-xl group-hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-[#3b82f6] tracking-tight">
                        Property
                    </h3>
                </div>

                <!-- Feature 3: Inrix Drive Time -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-full h-64 sm:h-72 rounded-2xl overflow-hidden bg-slate-50 border border-gray-100 shadow-sm hover:shadow-md transition duration-300 mb-6 flex items-center justify-center p-2">
                        <img src="./assets/images/snap3.gif"
                            alt="Inrix Drive Time Analytics"
                            class="w-full h-full object-cover rounded-xl group-hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-[#3b82f6] tracking-tight">
                        Inrix Drive Time
                    </h3>
                </div>

            </div>

        </div>
    </section>

    <!-- Testimonial Videos Section (Equal 2 Videos Per Row) -->
    <section class="py-16 bg-white text-gray-900 font-sans">

        <!-- Section Header Banner -->
        <div class="w-full py-5 mb-10 text-center bg-white border-bottom shadow-sm rounded-4 px-4">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1.5 rounded-pill font-mono fw-bold mb-2" style="font-size: 0.7rem;">
                <i class="bx bx-play-circle me-1"></i> Investor Success Stories
            </span><br><br>
            <h2 class="text-xl md:text-2xl font-extrabold text-dark tracking-wider uppercase m-0">
                TESTIMONIAL VIDEOS
            </h2>
            <p class="text-muted small mt-1 max-w-md mx-auto">
                Hear firsthand experiences from our global partners and investors sharing their portfolio growth journey.
            </p>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- Equal 2-Column Videos Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Video 1 -->
                <div class="bg-black rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 aspect-video relative border border-gray-800 flex items-center justify-center">
                    <video class="h-full max-w-full aspect-[9/16] object-contain" controls playsinline>
                        <source src="./assets/videos/t1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Video 2 -->
                <div class="bg-black rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 aspect-video relative border border-gray-800 flex items-center justify-center">
                    <video class="h-full max-w-full aspect-[9/16] object-contain" controls playsinline>
                        <source src="./assets/videos/glo2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Video 3 -->
                <div class="bg-black rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 aspect-video relative border border-gray-800 flex items-center justify-center">
                    <video class="h-full max-w-full aspect-[9/16] object-contain" controls playsinline>
                        <source src="./assets/videos/glo3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Video 4 -->
                <div class="bg-black rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 aspect-video relative border border-gray-800 flex items-center justify-center">
                    <video class="h-full max-w-full aspect-[9/16] object-contain" controls playsinline>
                        <source src="./assets/videos/glo5.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

            </div>

        </div>
    </section>

    <!-- Add this CSS rule to your stylesheet or <head> tag -->
    <style>
        body {
            padding-bottom: 70px !important;
            /* Prevents fixed bottom ticker from overlapping page content */
        }
    </style>

    <!-- Fixed Bottom Crypto Ticker Widget -->
    <div style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1; height: 62px; background-color: #1B2030; overflow: hidden; box-sizing: border-box; border-top: 1px solid #56667F; text-align: right; line-height: 14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px;">
        <div style="height: 42px; padding: 0px; margin: 0px; width: 100%;">
            <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="42px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border: 0; margin: 0; padding: 0;"></iframe>
        </div>
        <div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;">
            <a href="https://coinlib.io" target="_blank" rel="nofollow" style="font-weight: 500; color: #FFFFFF; text-decoration: none; font-size: 11px;">Coinlib</a>
        </div>
    </div>

    <?php include 'inc/notifications.php'; ?>

    <!-- Main Footer Section -->
    <?php include 'inc/footer.php'; ?>

    <!-- Google Translate Script Initialization -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'af,sq,am,ar,hy,as,ay,az,eu,be,bn,bs,bg,my,ca,ceb,ny,zh-CN,zh-TW,co,hr,cs,da,dv,nl,en,eo,et,ee,fi,fr,fy,gl,ka,de,el,gn,gu,ht,ha,haw,he,hi,hmn,hu,is,ig,id,ga,it,ja,jv,kn,kk,km,rw,ko,ku,ky,lo,la,lv,lt,lb,mk,mg,ms,ml,mt,mi,mr,mn,ne,no,or,ps,fa,pl,pt,pa,ro,ru,sm,gd,sr,st,sn,sd,si,sk,sl,so,es,su,sw,sv,tg,ta,tt,te,th,tr,tk,uk,ur,ug,uz,vi,cy,xh,yi,yo,zu',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>