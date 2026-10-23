<?php
// Page configuration
$pageTitle = "Altium Capitals";
$address = "9th Floor, No. 1 Spinningfields, 1 Hardman Square, Manchester M3 3EB, United Kingdom";
$email = "support@altiumcapitals.com";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oil & Gas - Altium Capitals</title>
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
    </style>
</head>

<body class="text-white font-sans antialiased m-0 p-0">

    <!-- Top Utility Bar -->
    <div class="bg-[#3b82f6] text-white text-xs py-2 px-4 sm:px-6 border-b border-blue-400/30 flex flex-wrap justify-between items-center relative z-50">
        <!-- Company Logo & Universal Language Dropdown -->
        <div class="flex items-center space-x-3 sm:space-x-6">
            <a href="index.php"
                class="flex items-center flex-shrink-0"
                aria-label="Altium Capitals Home">

                <img
                    src="../assets/images/altium-logo.png"
                    alt="Altium Capitals Logo"
                    class="h-10 sm:h-12 w-auto max-w-[180px] object-contain">
            </a>

            <!-- Universal Google Translate Dropdown -->
            <div class="bg-white px-2 py-1 rounded shadow-sm flex items-center space-x-1">
                <span class="text-gray-700 text-xs font-bold" aria-hidden="true">🌐</span>
                <div id="google_translate_element"></div>
            </div>
        </div>

        <!-- Address & Support Email -->
        <div class="hidden lg:flex items-center space-x-8 text-[11px] text-blue-100">
            <div class="flex items-center space-x-2">
                <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span><?php echo $address; ?></span>
            </div>
            <div class="text-right">
                <a href="mailto:<?php echo $email; ?>" class="hover:underline block text-white font-medium"><?php echo $email; ?></a>
                <span class="text-[10px] text-blue-200">UK</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="bg-[#3b82f6]/95 backdrop-blur-md text-white py-3.5 px-4 sm:px-8 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between md:justify-center items-center">

            <!-- Desktop Nav Links -->
            <ul class="hidden md:flex items-center space-x-6 lg:space-x-10 text-xs font-bold tracking-wider">
                <li><a href="../index" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">HOME</a></li>
                <li><a href="../about" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">ABOUT US</a></li>
                <li><a href="../partnership" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">PARTNERSHIP</a></li>
                <li><a href="../services/real-estate" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">REAL ESTATE</a></li>
                <li><a href="../contact" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">CONTACT</a></li>
                <li><a href="../signin" class="bg-white text-[#3b82f6] px-5 py-2 rounded-md font-extrabold hover:bg-blue-50 transition shadow-sm">ACCOUNT</a></li>
            </ul>

            <!-- Mobile Menu Toggle Row -->
            <div class="flex md:hidden items-center justify-between w-full">
                <span class="text-xs font-extrabold tracking-widest text-blue-100 uppercase">Navigation Menu</span>
                <button id="mobile-menu-toggle" type="button" onclick="toggleAltiumMobileMenu()" aria-label="Toggle Navigation" class="text-white hover:text-blue-200 focus:outline-none p-2 rounded-lg bg-blue-600/70 border border-blue-400/30 cursor-pointer active:scale-95 transition">
                    <!-- Hamburger Icon -->
                    <svg id="hamburger-icon" class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Close Icon -->
                    <svg id="close-icon" class="w-6 h-6 hidden pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden pt-4 pb-2 border-t border-blue-400/30 mt-3 transition-all duration-300">
            <ul class="flex flex-col space-y-3 text-xs font-bold tracking-wider px-2">
                <li><a href="../index" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">HOME</a></li>
                <li><a href="../about" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">ABOUT US</a></li>
                <li><a href="../partnership" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">PARTNERSHIP</a></li>
                <li><a href="../services/real-estate" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">REAL ESTATE</a></li>
                <li><a href="../contact" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">CONTACT</a></li>
                <li><a href="../signin" class="block py-2.5 px-3 rounded bg-white text-[#3b82f6] text-center font-extrabold shadow-sm hover:bg-blue-50 transition">ACCOUNT</a></li>
            </ul>

            <!-- Mobile Contact Info Bar -->
            <div class="mt-4 pt-3 border-t border-blue-400/20 text-[11px] text-blue-100 px-3 space-y-1">
                <p class="truncate">📍 <?php echo $address; ?></p>
                <p>✉️ <a href="mailto:<?php echo $email; ?>" class="hover:underline text-white"><?php echo $email; ?></a> (UK)</p>
            </div>
        </div>
    </nav>

    <!-- Global Fail-Safe Mobile Menu Toggle Script -->
    <script>
        function toggleAltiumMobileMenu() {
            var mobileMenu = document.getElementById('mobile-menu');
            var hamburgerIcon = document.getElementById('hamburger-icon');
            var closeIcon = document.getElementById('close-icon');

            if (mobileMenu) {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    if (hamburgerIcon) hamburgerIcon.classList.add('hidden');
                    if (closeIcon) closeIcon.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                    if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
                    if (closeIcon) closeIcon.classList.add('hidden');
                }
            }
        }
    </script>

    <!-- Floating Chat Widgets -->
    <?php include 'inc/floating-whatsapp.php'; ?>


    <!-- Oil & Gas Hero Banner Section -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="../assets/images/oil.jpg"
                alt="Oil and Gas Refinery"
                class="w-full h-full object-cover object-center" />

            <!-- Blue-tinted soft overlay -->
            <div class="absolute inset-0 bg-[#1e293b]/60 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-blue-900/30"></div>

            <!-- Dark bottom gradient shadow -->
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-slate-950/90 to-transparent"></div>
        </div>

        <!-- Banner Content (Matching Standard Hero Typography) -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20 flex flex-col items-center">

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                Oil & Gas
            </h1>

            <!-- Subheading -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Success isn't really that difficult. There is a significant portion of the population, that actually want and need success
            </p>

        </div>
    </section>

    <!-- Petroleum & Energy Investment Summary Section -->
    <section class="py-16 bg-slate-50/50 text-gray-900 font-sans">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <!-- Section Title -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight mb-8">
                Petroleum & Energy Investment
            </h2>

            <!-- Description Paragraph -->
            <p class="text-xs sm:text-sm md:text-base text-gray-600 font-normal leading-relaxed text-justify sm:text-center max-w-4xl mx-auto">
                The growing global demand for energy, led mainly by China and India over the past decade, coupled with the shift in energy transition has driven a strong increase in gas demand, particularly LNG due to its suitability for long-distance transportation. Australia's geographic/geological positioning, ability to attract foreign investors/oil and gas majors and key Asian LNG buyers has enabled Australia to meet the various demands and emerge as one of the world's largest LNG exporters. Altium Capitals is a capital formation entity created specifically for the purpose of aggregating and connecting accredited private investors and institutional investors with quality Oil & Gas Opportunities and Operators. As one of the leading oil & gas investment companies, our team currently evaluates Oil & Gas projects from seasoned operators in the lower Australia and Canada. Each project is selected through a process that focuses on and looks for ROI as well as certain niche plays other firms might overlook while following the herd mentality of the energy business. Altium Capitals relies on its internal team with over decades of Oil & Gas experience to select solid and worthwhile opportunities for capital formation and participation.
            </p>

        </div>
    </section>


    <?php include '../inc/notifications.php'; ?>

    <!-- Main Footer Section -->
    <footer class="bg-[#3b82f6] text-white pt-16 pb-8 font-sans relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Top Horizontal Divider -->
            <div class="border-t border-blue-300/40 mb-12"></div>

            <!-- Footer Grid Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-10 items-start">

                <!-- Column 1: Brand Info -->
                <div class="lg:col-span-1">
                    <!-- Logo -->
                    <a href="index.php"
                        class="flex items-center flex-shrink-0"
                        aria-label="Altium Capitals Home">

                        <img
                            src="../assets/images/altium-logo.png"
                            alt="Altium Capitals Logo"
                            class="h-10 sm:h-12 w-auto max-w-[180px] object-contain">
                    </a>
                    <!-- About Paragraph -->
                    <p class="text-xs text-blue-50 leading-relaxed font-normal">
                        We provide a unique opportunity to make profits online, based on our innovative developments that allow us to conduct risk-free bot trading on the largest cryptocurrency and stock exchanges.
                    </p>
                </div>

                <!-- Column 2: Quick Links Grid -->
                <div class="lg:col-span-2 grid grid-cols-2 gap-6 md:pl-10">
                    <div class="col-span-2">
                        <h4 class="text-xs font-extrabold text-amber-300 uppercase tracking-widest mb-4">
                            QUICK LINKS
                        </h4>
                    </div>

                    <!-- Left Links Column -->
                    <ul class="space-y-3 text-xs font-semibold text-blue-50">
                        <li><a href="#" class="hover:text-blue-200 hover:underline transition">Partnership</a></li>
                        <li><a href="#" class="hover:text-blue-200 hover:underline transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-200 hover:underline transition">Account</a></li>
                    </ul>

                    <!-- Right Links Column -->
                    <ul class="space-y-3 text-xs font-semibold text-blue-50">
                        <li><a href="#" class="hover:text-blue-200 hover:underline transition">About Us</a></li>
                        <li><a href="" class="hover:text-blue-200 hover:underline transition">FAQs</a></li>
                        <li><a href="rules.php" class="hover:text-blue-200 hover:underline transition">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:text-blue-200 hover:underline transition">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Column 3: SSL Badge & Contact Details -->
                <div class="lg:col-span-1 flex flex-col items-start space-y-4">

                    <!-- COMODO SSL CERTIFICATE Badge -->
                    <div class="flex items-center space-x-2 text-white font-extrabold tracking-tight">
                        <div class="w-9 h-9 rounded-full border-2 border-red-500 bg-red-600 flex items-center justify-center font-serif text-lg text-white shadow-sm">
                            C
                        </div>
                        <div>
                            <div class="text-sm tracking-wider text-red-500 leading-none">COMODO</div>
                            <div class="text-[9px] font-bold tracking-widest text-blue-100">SSL CERTIFICATE</div>
                        </div>
                    </div>

                    <!-- Address -->
                    <p class="text-xs text-blue-100 leading-relaxed font-normal">
                        9th Floor, No. 1 Spinningfields, 1 Hardman Square, Manchester M3 3EB, United Kingdom
                    </p>

                    <!-- Support Email -->
                    <a href="mailto:support@altiumhcapitals.com" class="text-xs font-medium text-blue-50 hover:underline">
                        support@altiumhcapitals.com
                    </a>
                </div>

            </div>

            <!-- Copyright Row -->
            <div class="mt-16 text-center text-xs text-amber-300 font-semibold tracking-wide">
                © Copyright <?php echo date("Y"); ?> <a href="#" class="hover:underline text-amber-300">altiumcapitals.com</a>
            </div>

        </div>
    </footer>

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