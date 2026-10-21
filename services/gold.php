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
    <title>Gold Mining & Investment - Altium Capitals</title>
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
                <li><a href="../index.php" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">HOME</a></li>
                <li><a href="../about.php" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">ABOUT US</a></li>
                <li><a href="../partnership.php" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">PARTNERSHIP</a></li>
                <li><a href="../services/real-estate.php" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">REAL ESTATE</a></li>
                <li><a href="../contact.php" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">CONTACT</a></li>
                <li><a href="../signin.php" class="bg-white text-[#3b82f6] px-5 py-2 rounded-md font-extrabold hover:bg-blue-50 transition shadow-sm">ACCOUNT</a></li>
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
                <li><a href="../index.php" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">HOME</a></li>
                <li><a href="../about.php" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">ABOUT US</a></li>
                <li><a href="../partnership.php" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">PARTNERSHIP</a></li>
                <li><a href="../services/real-estate.php" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">REAL ESTATE</a></li>
                <li><a href="../contact.php" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">CONTACT</a></li>
                <li><a href="../signin.php" class="block py-2.5 px-3 rounded bg-white text-[#3b82f6] text-center font-extrabold shadow-sm hover:bg-blue-50 transition">ACCOUNT</a></li>
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
    <div class="fixed bottom-4 left-4 z-50 flex items-center space-x-2">
        <a href="#" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-2xl flex items-center justify-center transition">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
            </svg>
        </a>
        <div class="bg-white text-gray-800 text-xs font-semibold py-2 px-3 rounded-lg shadow-md">
            Message us
        </div>
    </div>

    <div class="fixed bottom-4 right-4 z-50 flex items-center space-x-2">
        <div class="bg-black/80 text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-lg transform -rotate-6">
            We Are Here!
        </div>
        <div class="bg-emerald-500 hover:bg-emerald-600 text-white p-3 rounded-full shadow-2xl flex items-center justify-center cursor-pointer transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
        </div>
    </div>

    <!-- Gold Investment Banner Section (Matching Hero Typography) -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="../assets/images/gold1.png"
                alt="Gold Investment Team Meeting"
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
                Gold Mining & Investment
            </h1>

            <!-- Subheading (Matched to Hero Paragraph) -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Success isn't really that difficult. There is a significant portion of the population, that actually want and need success
            </p>

        </div>
    </section>


    <!-- Gold Mining & Investment Section -->
    <section class="py-16 bg-slate-50/50 text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-6">

            <!-- Section Title -->
            <div class="text-center mb-10">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight">
                    Gold Mining & Investmentt
                </h2>
            </div>

            <!-- Introductory Paragraph -->
            <p class="text-xs sm:text-sm md:text-base text-gray-600 font-normal leading-relaxed text-justify mb-8">
                Altium Capitals often conducts thorough geological surveys and exploration to identify and secure gold reserves. This commitment to proven reserves provides a solid foundation for potential returns on investment.
            </p>

            <!-- Feature Points List -->
            <div class="space-y-6 text-xs sm:text-sm md:text-base text-gray-600 font-normal leading-relaxed text-justify">

                <div>
                    <strong class="font-bold text-gray-900">Experienced Team:</strong>
                    <p class="mt-1">The company typically employs a team of experienced geologists, engineers, and miners who are well-versed in the intricacies of gold mining. Their expertise ensures efficient and responsible mining operations.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Advanced Technology:</strong>
                    <p class="mt-1">Altium Capitals often leverages advanced mining technologies to maximize productivity, minimize environmental impact, and optimize gold recovery rates, contributing to profitability.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Geographic Diversity:</strong>
                    <p class="mt-1">Their gold mining operations may span multiple geographic locations, reducing exposure to region-specific risks and market fluctuations.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Gold Demand:</strong>
                    <p class="mt-1">Gold has historically been a sought-after asset for investors and a hedge against economic uncertainty. Altium Capitals's involvement in gold mining positions it to benefit from the ongoing demand for this precious metal.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Sustainability:</strong>
                    <p class="mt-1">The company often emphasizes sustainable mining practices, focusing on responsible environmental stewardship and minimizing the ecological footprint associated with mining activities.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Risk Management:</strong>
                    <p class="mt-1">Robust risk management strategies are often in place to mitigate factors like gold price volatility, geopolitical risks, and operational challenges, protecting investor interests.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Transparency:</strong>
                    <p class="mt-1">Altium Capitals typically maintains transparency in its mining operations, providing regular updates on production, financial performance, and adherence to safety and environmental regulations.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Long-Term Potential:</strong>
                    <p class="mt-1">Gold mining is often considered a long-term investment, and the stability of gold prices over time can provide consistent returns for investors seeking wealth preservation.</p>
                </div>

                <div>
                    <strong class="font-bold text-gray-900">Diversification:</strong>
                    <p class="mt-1">Including gold mining in an investment portfolio can offer diversification benefits, as gold's performance often behaves differently from traditional financial assets like stocks and bonds.</p>
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