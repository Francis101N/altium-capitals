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
    <title>Real Estate - Mapleaf Capital</title>
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
    <div class="relative z-[60] bg-[#3b82f6] text-white border-b border-blue-400/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3">

            <!-- Logo & Language Selector -->
            <div class="flex items-center justify-between gap-3 sm:gap-5 w-full lg:w-auto min-w-0">

                <a href="index.php"
                    class="flex items-center flex-shrink-0"
                    aria-label="Mapleaf Capital Home">
                    <img
                        src="../assets/images/mapleaf-logo-white.png"
                        alt="Mapleaf Capital Logo"
                        class="h-15 sm:h-18 w-auto max-w-[150px] object-contain"
                        fetchpriority="high">
                </a>

                <!-- Google Translate -->
                <div class="flex-shrink-0 bg-white px-2 py-1.5 rounded-md shadow-sm flex items-center gap-2 text-gray-700">
                    <span aria-hidden="true">🌐</span>
                    <div id="google_translate_element"></div>
                </div>
            </div>

            <!-- Desktop Contact Details -->
            <div class="hidden lg:flex items-center gap-6 xl:gap-8 text-[11px] text-blue-100 min-w-0">

                <div class="flex items-center gap-2 min-w-0 max-w-[360px]">
                    <svg class="w-4 h-4 text-white flex-shrink-0"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="break-words">
                        <?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </div>

                <div class="text-right min-w-0">
                    <a href="mailto:<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        class="block text-white font-medium hover:underline break-all">
                        <?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                    <span class="text-[10px] text-blue-200">UK</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-[#3b82f6]/[0.97] backdrop-blur-md text-white shadow-lg"
        aria-label="Main navigation">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center justify-center min-h-[64px]">
                <ul class="flex items-center justify-center gap-5 lg:gap-8 xl:gap-10 text-[11px] lg:text-xs font-bold tracking-wide">

                    <li>
                        <a href="../index"
                            class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                            HOME
                        </a>
                    </li>

                    <li>
                        <a href="../about"
                            class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                            ABOUT US
                        </a>
                    </li>

                    <li>
                        <a href="../partnership"
                            class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                            PARTNERSHIP
                        </a>
                    </li>

                    <li>
                        <a href="../services/real-estate"
                            class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                            REAL ESTATE
                        </a>
                    </li>

                    <li>
                        <a href="../contact"
                            class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                            CONTACT
                        </a>
                    </li>

                    <li>
                        <a href="../signin"
                            class="inline-flex items-center justify-center bg-white text-[#2563eb] px-5 py-2.5 rounded-md font-extrabold hover:bg-blue-50 transition shadow-sm">
                            ACCOUNT
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Mobile & Tablet Navigation Toggle -->
            <div class="flex md:hidden items-center justify-between gap-3 min-h-[60px]">

                <span class="text-[11px] sm:text-xs font-extrabold tracking-widest text-blue-100 uppercase">
                    Navigation Menu
                </span>

                <button
                    id="mobile-menu-toggle"
                    type="button"
                    aria-label="Open navigation menu"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    class="flex-shrink-0 flex items-center justify-center w-11 h-11 text-white bg-blue-600/70 border border-blue-300/40 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 active:scale-95 transition">

                    <!-- Hamburger Icon -->
                    <svg id="hamburger-icon"
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!-- Close Icon -->
                    <svg id="close-icon"
                        class="hidden w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu"
                class="hidden md:hidden pb-4 border-t border-blue-300/30">

                <ul class="flex flex-col gap-1 pt-3 text-xs font-bold tracking-wide">

                    <li>
                        <a href="../index"
                            class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                            HOME
                        </a>
                    </li>

                    <li>
                        <a href="../about"
                            class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                            ABOUT US
                        </a>
                    </li>

                    <li>
                        <a href="../partnership"
                            class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                            PARTNERSHIP
                        </a>
                    </li>

                    <li>
                        <a href="../services/real-estate"
                            class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                            REAL ESTATE
                        </a>
                    </li>

                    <li>
                        <a href="../contact"
                            class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                            CONTACT
                        </a>
                    </li>

                    <li class="pt-2">
                        <a href="../signin"
                            class="mobile-menu-link flex items-center justify-center py-3 px-4 rounded-lg bg-white text-[#2563eb] font-extrabold hover:bg-blue-50 transition shadow-sm">
                            ACCOUNT
                        </a>
                    </li>
                </ul>

                <!-- Mobile Contact Information -->
                <div class="mt-4 pt-4 px-3 border-t border-blue-300/30 text-[11px] text-blue-100 space-y-3">

                    <div class="flex items-start gap-2">
                        <span aria-hidden="true">📍</span>
                        <span class="min-w-0 break-words">
                            <?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>

                    <div class="flex items-start gap-2">
                        <span aria-hidden="true">✉️</span>
                        <a href="mailto:<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            class="min-w-0 break-all text-white hover:underline">
                            <?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </div>

                    <p class="text-blue-200 pl-6">United Kingdom (UK)</p>
                </div>
            </div>
        </div>
    </nav>

    <!-- Responsive Mobile Menu Script -->
    <script>
        (function() {
            function initMapleafMobileMenu() {
                const toggleButton = document.getElementById('mobile-menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerIcon = document.getElementById('hamburger-icon');
                const closeIcon = document.getElementById('close-icon');

                if (!toggleButton || !mobileMenu || !hamburgerIcon || !closeIcon) {
                    return;
                }

                // Prevent duplicate event listeners if this script is initialized again.
                if (toggleButton.dataset.menuInitialized === 'true') {
                    return;
                }

                toggleButton.dataset.menuInitialized = 'true';

                function setMenuState(isOpen) {
                    mobileMenu.classList.toggle('hidden', !isOpen);
                    hamburgerIcon.classList.toggle('hidden', isOpen);
                    closeIcon.classList.toggle('hidden', !isOpen);

                    toggleButton.setAttribute('aria-expanded', String(isOpen));
                    toggleButton.setAttribute(
                        'aria-label',
                        isOpen ? 'Close navigation menu' : 'Open navigation menu'
                    );
                }

                toggleButton.addEventListener('click', function() {
                    const isOpen =
                        toggleButton.getAttribute('aria-expanded') === 'true';

                    setMenuState(!isOpen);
                });

                // Close the menu after a navigation link is selected.
                mobileMenu.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function() {
                        setMenuState(false);
                    });
                });

                // Close the menu with the Escape key.
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        setMenuState(false);
                    }
                });

                // Reset the mobile menu when switching to desktop width.
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) {
                        setMenuState(false);
                    }
                });

                setMenuState(false);
            }

            if (document.readyState === 'loading') {
                document.addEventListener(
                    'DOMContentLoaded',
                    initMapleafMobileMenu
                );
            } else {
                initMapleafMobileMenu();
            }
        })();
    </script>

    <!-- Floating Chat Widgets -->
    <?php include 'inc/floating-whatsapp.php'; ?>

    <!-- Real Estate Banner Section (Matching Hero Typography) -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="../assets/images/estate.jpg"
                alt="Real Estate Team Meeting"
                class="w-full h-full object-cover object-center filter grayscale contrast-125" />

            <!-- Blue-tinted soft overlay -->
            <div class="absolute inset-0 bg-[#1e293b]/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-blue-900/30"></div>

            <!-- Dark bottom gradient shadow -->
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-slate-950/90 to-transparent"></div>
        </div>

        <!-- Banner Content with Matched Font Styles -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20 flex flex-col items-center">

            <!-- Main Heading (Matched to Hero H1) -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                Real Estate
            </h1>

            <!-- Subheading (Matched to Hero Paragraph) -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Success isn't really that difficult. There is a significant portion of the population, that actually want and need success
            </p>

        </div>
    </section>

    <!-- Real Estate Investment Section -->
    <section class="py-16 bg-slate-50 text-gray-900 font-sans">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight mb-6">
                    Real Estate
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 font-normal leading-relaxed max-w-4xl mx-auto">
                    Mapleaf Capital is building the world's leading real estate investment marketplace[cite: 14]. Our mission is to make ownership of investment real estate radically accessible, cost-effective and simple[cite: 14]. Our platform lets everyone from first-time investors to global asset managers evaluate, purchase and own residential investment properties with confidence from anywhere in the world[cite: 14]. Since launch, we've surpassed $4 billion in transactions and continue to disrupt the industry with cutting-edge technology and innovations[cite: 14]. No matter your investing goals, Mapleaf Capital is here to help[cite: 14]. Clunky, opaque, inefficient... the process of buying and selling investment properties was badly in need of a rethink[cite: 14].
                </p>
            </div>

            <!-- 2x2 Real Estate Grid (2 per row) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 mt-12">

                <!-- Property 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 p-4 border border-gray-100">
                    <div class="h-64 sm:h-72 rounded-lg overflow-hidden mb-4 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80"
                            alt="Modern Real Estate Villa"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <div class="text-left">
                        <div class="text-2xl font-extrabold text-[#3b82f6] mb-1">$820,000</div>
                        <p class="text-xs text-gray-500 font-medium">
                            Zaki Hale B | Offered for $820,000 | 4 BR | 4.5 BA | 2,850 sq. ft. Interior
                        </p>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 p-4 border border-gray-100">
                    <div class="h-64 sm:h-72 rounded-lg overflow-hidden mb-4 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80"
                            alt="Luxury Modern Townhome"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <div class="text-left">
                        <div class="text-2xl font-extrabold text-[#3b82f6] mb-1">$1,450,000</div>
                        <p class="text-xs text-gray-500 font-medium leading-relaxed">
                            This stunning modern-styled townhome located within the private golf and ocean club community of Kohanaiki is a 4 BR / 4.5 BA dream with a lounge pool, spa, and detached guest house.
                        </p>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 p-4 border border-gray-100">
                    <div class="h-64 sm:h-72 rounded-lg overflow-hidden mb-4 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80"
                            alt="Resort Pool Property"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <div class="text-left">
                        <div class="text-2xl font-extrabold text-[#3b82f6] mb-1">$350,000</div>
                        <p class="text-xs text-gray-500 font-medium">
                            0/0 | 0/0 | 1,872 sqft | 0.82 sqft lot Location: Aiea Oahu
                        </p>
                    </div>
                </div>

                <!-- Property 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 p-4 border border-gray-100">
                    <div class="h-64 sm:h-72 rounded-lg overflow-hidden mb-4 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80"
                            alt="New York Luxury Apartment"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <div class="text-left">
                        <div class="text-2xl font-extrabold text-[#3b82f6] mb-1">$26,430</div>
                        <p class="text-xs text-gray-500 font-medium">
                            0 Bds | 1 Ba . 350 SQFT Location: 225 East 4th Street, Apt 10, New York.
                        </p>
                    </div>
                </div>

            </div>

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
                        aria-label="Mapleaf Capital Home">

                        <img
                            src="../assets/images/Mapleaf Capital-logo.png"
                            alt="Mapleaf Capital Logo"
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
                    <a href="mailto:support@Mapleaf Capitalhcapitals.com" class="text-xs font-medium text-blue-50 hover:underline">
                        support@Mapleaf Capitalhcapitals.com
                    </a>
                </div>

            </div>

            <!-- Copyright Row -->
            <div class="mt-16 text-center text-xs text-amber-300 font-semibold tracking-wide">
                © Copyright <?php echo date("Y"); ?> <a href="#" class="hover:underline text-amber-300">Mapleaf Capitalcapitals.com</a>
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