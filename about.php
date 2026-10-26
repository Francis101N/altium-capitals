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
    <title>About Us - Mapleaf Capital</title>
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

    <?php include 'inc/nav.php'; ?>

    <!-- Floating Chat Widgets -->
    <?php include 'inc/floating-whatsapp.php'; ?>

    <!-- About Mapleaf Capital Hero Banner Section -->
    <section class="relative bg-slate-900 text-white min-h-[500px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Dark Blue Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80"
                alt="Office Team Working"
                class="w-full h-full object-cover object-center" />
            <!-- Blue-tinted dark overlay matching image design -->
            <div class="absolute inset-0 bg-slate-900/80 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 via-slate-950/60 to-slate-950/90"></div>
        </div>

        <!-- Banner Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20 flex flex-col items-center">

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                About Mapleaf Capital Holdings
            </h1>

            <!-- Subheading -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Our Expertise. Know more about what we do
            </p>

            <!-- CTA Button Group / Tabs -->
            <div class="flex flex-row items-center justify-center space-x-6 sm:space-x-8">
                <!-- About Us Active Button -->
                <a href="#about"
                    class="bg-[#f8b88b]/90 hover:bg-[#f87171] text-white font-bold text-sm sm:text-base px-8 py-3.5 rounded-md shadow-lg transition duration-300 transform hover:-translate-y-0.5">
                    About us
                </a>

                <!-- Mission and Vision Link -->
                <a href="#mission"
                    class="text-white hover:text-amber-300 font-bold text-sm sm:text-base tracking-wide transition duration-300">
                    Mission and vision
                </a>
            </div>

        </div>
    </section>

    <!-- Mapleaf Capital Capital Investment Summary Section -->
    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <!-- Main Title -->
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1f2937] tracking-tight mb-8">
                Mapleaf Capital Investment
            </h2>

            <!-- Description Paragraphs -->
            <div class="space-y-4 text-base sm:text-lg md:text-xl text-gray-800 font-normal leading-relaxed max-w-3xl mx-auto">
                <p>
                    Mapleaf Capital is an international financial firm that enables individuals worldwide to invest and provides advisory services in mergers and acquisitions, capital raising, and other related corporate finance solutions.
                </p>
                <p>
                    Mapleaf Capital partners with companies and institutions through corporate finance and capital markets advisory, and empowers individuals with direct investment and trading opportunities.
                </p>
            </div>

        </div>
    </section>

    <br><br><br>

    <!-- Fast Facts Section -->
    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <!-- Left Side: Overlapping Image Grid -->
                <div class="relative w-full max-w-lg mx-auto lg:max-w-none">
                    <!-- Top Left Main Image -->
                    <div class="w-4/5 rounded-2xl overflow-hidden shadow-xl border border-gray-100 relative z-10">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80"
                            alt="Team Discussion"
                            class="w-full h-64 sm:h-80 object-cover" />
                    </div>

                    <!-- Bottom Right Overlapping Image -->
                    <div class="w-3/5 rounded-2xl overflow-hidden shadow-2xl border-4 border-white absolute -bottom-10 right-0 z-20">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80"
                            alt="Executive Professional"
                            class="w-full h-56 sm:h-72 object-cover" />
                    </div>
                </div>

                <!-- Right Side: Fast Facts Checklist Content -->
                <div class="lg:pl-8 mt-12 lg:mt-0">

                    <!-- Section Header -->
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1e293b] tracking-wider uppercase mb-2">
                        FAST FACTS
                    </h2>
                    <p class="text-sm font-medium text-gray-500 mb-8">
                        Mapleaf Capital
                    </p>

                    <!-- Bullet Items with Checkmarks -->
                    <ul class="space-y-6 text-sm sm:text-base text-gray-700 font-medium">

                        <!-- Fact 1 -->
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Broker-dealer firm in business since 2010.</span>
                        </li>

                        <!-- Fact 2 -->
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Supervised over 1000 successful transactions in private deals ranging from $1 million to over $100 million.</span>
                        </li>

                        <!-- Fact 3 -->
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Specialize in capital raises, M&A opportunities and secondary sales of private stock.</span>
                        </li>

                        <!-- Fact 4 -->
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Headquartered in United Kingdom, with registered representatives in some countries</span>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </section>

    <!-- Delivering Results Section -->
    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Main Section Header -->
            <div class="mb-14">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1e293b] tracking-tight mb-3">
                    Delivering Results
                </h2>
                <p class="text-base sm:text-lg text-gray-700 font-medium max-w-3xl">
                    We are one of the world's leading private multi-asset alternative investment firms.
                </p>
            </div>

            <!-- 2-Column Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

                <!-- Left Side Column: Key Highlights & Metrics (5 Cols) -->
                <div class="lg:col-span-5 space-y-10">

                    <!-- Metric 1: 99% -->
                    <div>
                        <h3 class="text-4xl sm:text-5xl font-black text-[#f8b88b] tracking-tight mb-1">
                            99%
                        </h3>
                        <p class="text-sm text-gray-600 font-normal">
                            A totally new way to grow your Investment
                        </p>
                    </div>

                    <!-- Metric 2: Improved -->
                    <div>
                        <h3 class="text-4xl sm:text-5xl font-black text-[#f8b88b] tracking-tight mb-1">
                            Improved
                        </h3>
                        <p class="text-sm text-gray-600 font-normal">
                            We are adding extra value for your Investment
                        </p>
                    </div>

                    <!-- Metric 3: Increased -->
                    <div>
                        <h3 class="text-4xl sm:text-5xl font-black text-[#f8b88b] tracking-tight mb-1">
                            Increased
                        </h3>
                        <p class="text-sm text-gray-600 font-normal">
                            Award-winning Capital Investment platform
                        </p>
                    </div>

                </div>

                <!-- Right Side Column: Mission Text & Checklist Details (7 Cols) -->
                <div class="lg:col-span-7 space-y-10">

                    <!-- Introductory Blue Banner Paragraph -->
                    <p class="text-sm sm:text-base text-blue-500 font-bold leading-relaxed">
                        At Mapleaf Capital, we pride ourselves on asking questions, planning and creating something out of nothing. We are entrepreneurs, inventors, scientists, and engineers shaping the future of finance in a collaborative, stimulating environment.
                    </p>

                    <!-- 2-Column Checklist Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-2">

                        <!-- Column 1: The Mapleaf Capital -->
                        <div>
                            <h4 class="text-lg font-bold text-[#f8b88b] mb-4 leading-snug">
                                The Mapleaf Capital Capital<br>Holdings
                            </h4>

                            <ul class="space-y-4 text-xs sm:text-sm text-gray-700 font-normal">
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Built by brokers for brokers</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Independent contractor model</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Proprietary software supports many private placement deal types</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Chaperone service enables foreign placement agents to show mandates to US institutional investors</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Column 2: Transactions Since 2015 -->
                        <div>
                            <h4 class="text-lg font-bold text-[#f8b88b] mb-4 leading-snug">
                                Mapleaf Capital,<br>Transactions Since 2015
                            </h4>

                            <ul class="space-y-4 text-xs sm:text-sm text-gray-700 font-normal">
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Over $1 Billion in transaction value</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>More than 800 domestic private placement transactions</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Over 61,000,000 euros and 39,000,000 pounds in transaction value</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Over $35M commissions generated by reps</span>
                                </li>
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>More than 900 institutional or accredited investors served</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <!-- Main Title -->
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1f2937] tracking-tight mb-8">
                Our Reinvestment Policy
            </h2>

            <!-- Description Paragraphs -->
            <div class="space-y-4 text-base sm:text-lg md:text-xl text-gray-800 font-normal leading-relaxed max-w-3xl mx-auto">
                <p>
                    To maintain steady growth and a healthy investment structure, our company follows a progressive reinvestment model. When investors withdraw their funds, any return to the platform must be made with an amount greater than the amount previously withdrawn.
                </p>
                <p>
                    This policy helps us support long-term portfolio growth, keep our investment system stable, and ensure fairness for all participants. We share this openly so every investor understands how our platform operates and what is expected when reinvesting with us..
                </p>
            </div>

        </div>
    </section>

    <br><br>

    <!-- Global Office Locations Section (Strict 2 Per Row Layout with Heading) -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1e293b] tracking-tight">
                    Global Office Locations
                </h2>
                <div class="w-20 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Introductory Header Paragraph -->
            <p class="text-xs sm:text-sm text-gray-700 font-normal leading-relaxed mb-12 text-center max-w-4xl mx-auto">
                Mapleaf Capital Capital has over 20 office locations globally in major financial and commercial hubs across Europe, North America, Asia and the Middle East. These offices support corporate advisory, capital markets and cross-border financing activities.[cite: 6]
            </p>

            <!-- Global Offices Grid (Strict 2-Column Desktop Grid) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">

                <!-- United Kingdom -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇬🇧</span>
                        <span>United Kingdom</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        9th Floor, No. 1 Spinningfields, 1 Hardman Square, Manchester M3 3EB, United Kingdom[cite: 6]
                    </p>
                </div>

                <!-- Germany -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇩🇪</span>
                        <span>Germany</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        Thurn-und-Taxis-Platz 6, 60313 Frankfurt am Main, Germany[cite: 6]
                    </p>
                </div>

                <!-- Switzerland -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇨🇭</span>
                        <span>Switzerland</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        Klausstrasse 4, 8008 Zurich, Switzerland[cite: 6]
                    </p>
                </div>

                <!-- Italy -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇮🇹</span>
                        <span>Italy</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        Piazza San Fedele 4, 20121 Milan, Italy[cite: 6]
                    </p>
                </div>

                <!-- France -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇫🇷</span>
                        <span>France</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        3 Rue La Boétie, 75008 Paris, France[cite: 6]
                    </p>
                </div>

                <!-- Sweden -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇸🇪</span>
                        <span>Sweden</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        Biblioteksgatan 8, 111 46 Stockholm, Sweden[cite: 6]
                    </p>
                </div>

                <!-- Israel -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇮🇱</span>
                        <span>Israel</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        94 Yigal Alon St., 16th Floor, Tel Aviv 6789140, Israel[cite: 6]
                    </p>
                </div>

                <!-- Japan -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇯🇵</span>
                        <span>Japan</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        11-1 Marunouchi 1-Chome, 30th Floor, Pacific Century Place, Tokyo 100-6230, Japan[cite: 6]
                    </p>
                </div>

                <!-- Vietnam -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇻🇳</span>
                        <span>Vietnam</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        67 Le Loi, Level 21, Saigon Centre Tower 2, Ho Chi Minh City, Vietnam[cite: 6]
                    </p>
                </div>

                <!-- India -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇮🇳</span>
                        <span>India</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        01-109, DLF WeWork Forum, DLF Cybercity, Phase III, Gurugram, Haryana 122002, India[cite: 6]
                    </p>
                </div>

                <!-- China -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇨🇳</span>
                        <span>China</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        B02, 22F, Tower 3, Jing An Kerry Centre, 1228 Yan'an Road Middle, Shanghai 200040, China[cite: 6]
                    </p>
                </div>

                <!-- Singapore -->
                <div class="p-5 rounded-xl border border-gray-100 bg-slate-50/50 hover:bg-white hover:border-gray-200 hover:shadow-md transition duration-200">
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#1e293b] flex items-center space-x-3 mb-2">
                        <span class="text-3xl">🇸🇬</span>
                        <span>Singapore</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed">
                        9 Temasek Boulevard, #41-04 Suntec Tower 2, Singapore 038989[cite: 6]
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- Why Choose Section & Investment CTA Banner -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Header Row -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1e293b] tracking-tight uppercase">
                        WHY CHOOSE Mapleaf Capital Capital<br class="hidden sm:inline" /> Holdings
                    </h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#register" class="inline-flex items-center space-x-2 bg-slate-100 hover:bg-slate-200 text-blue-600 font-bold text-xs px-5 py-2.5 rounded-full transition duration-200 shadow-sm">
                        <span>Let's Get Started</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 3 Feature Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">

                <!-- Card 1: Creating Value for Investors -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80"
                            alt="Creating Value for Investors"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-base font-extrabold text-blue-600 uppercase tracking-wide mb-2.5">
                        CREATING VALUE FOR INVESTORS
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        Value creation for investors that challenges and disrupts the traditional, thereby creating a new way of investing.
                    </p>
                </div>

                <!-- Card 2: Scientific & Data-Driven Approach -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80"
                            alt="Scientific & Data-Driven Approach"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-base font-extrabold text-blue-600 uppercase tracking-wide mb-2.5">
                        SCIENTIFIC & DATA-DRIVEN APPROACH
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        An intelligent, scientific approach where data is optimized to simplify investment decisions.
                    </p>
                </div>

                <!-- Card 3: Complete Transparency -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80"
                            alt="Complete Transparency"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-base font-extrabold text-blue-600 uppercase tracking-wide mb-2.5">
                        COMPLETE TRANSPARENCY
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        Ensuring transparency in investors interests while maintaining high levels of privacy with transaction details.
                    </p>
                </div>

            </div>

            <!-- Blue CTA Callout Banner -->
            <div class="bg-[#3b82f6] text-white rounded-none py-16 px-6 text-center shadow-lg">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight mb-3">
                    Investment doesn't have to be hard
                </h2>
                <p class="text-xs sm:text-sm text-blue-100 font-medium mb-8">
                    The easiest way to invest in the growth of Bitcoin & the Crypto Currency Sector
                </p>
                <div>
                    <a href="#register" class="inline-flex items-center space-x-2 bg-[#F8B88B] hover:bg-[#f87171] text-white font-bold text-xs sm:text-sm px-7 py-3 rounded-full shadow-md transition duration-300 transform hover:-translate-y-0.5">
                        <span>Let's Get Started</span>
                        <span>→</span>
                    </a>
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