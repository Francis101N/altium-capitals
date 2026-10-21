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
    <title>Partnership - Altium Capitals</title>
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

    <!-- Affiliate Program Banner Section (Matching Hero Typography) -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80"
                alt="Affiliate Team Meeting"
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
                Affiliate Program
            </h1>

            <!-- Subheading (Matched to Hero Paragraph) -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Success isn't really that difficult. There is a significant portion of the population, that actually want and need success
            </p>

        </div>
    </section>

    <!-- Affiliate Partner & Zonal Representatives Details Section -->
    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- 2-Column Content Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">

                <!-- Left Column: What You'll Get as Affiliate Partner -->
                <div class="space-y-6">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight leading-tight">
                        What You'll Get as Affiliate Partner
                    </h2>

                    <p class="text-sm sm:text-base text-gray-900 font-bold leading-relaxed">
                        Earn Unlimited Commissions with Altium Capitals online Affiliate Program. Our partner program can increase your income by receiving percentage from the purchases made by your referrals into.[cite: 10]
                    </p>
                </div>

                <!-- Right Column: ZONAL/REGIONAL REPRESENTATIVES -->
                <div class="space-y-6">

                    <!-- Section Header -->
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight uppercase leading-tight mb-2">
                            ZONAL/REGIONAL REPRESENTATIVES
                        </h2>
                        <p class="text-xs sm:text-sm font-medium text-gray-500">
                            Altium Capitals Online[cite: 10]
                        </p>
                    </div>

                    <!-- Checklist -->
                    <ul class="space-y-4 text-xs sm:text-sm text-gray-800 font-medium leading-relaxed">

                        <!-- Item 1 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>The zonal representative position is a plan for any investor who wants to represent the company in their country as an agent.[cite: 10]</span>
                        </li>

                        <!-- Item 2 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>The company cannot have two zonal representatives in same location.[cite: 10]</span>
                        </li>

                        <!-- Item 3 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>A zonal representative must have an active deposit of $10,000 and above. A zonal representative gets 7% daily profits on the invested capital.[cite: 10]</span>
                        </li>

                        <!-- Item 4 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>A zonal representative's deposit will be used for a special trade which would last for a full 31 days.[cite: 10]</span>
                        </li>

                        <!-- Item 5 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>A zonal representative must have a target downline of 30 active referrals.[cite: 10]</span>
                        </li>

                        <!-- Item 6 -->
                        <li class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>A zonal representative has full access to engage in company promos[cite: 10]</span>
                        </li>

                        <!-- Item 7 with Nested Bullets -->
                        <li class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>For the zonal representative, the company will provide funds for the following:[cite: 10]</span>
                            </div>

                            <!-- Sub-bullets -->
                            <ul class="pl-10 space-y-2 text-xs sm:text-sm text-gray-700 font-medium list-disc">
                                <li>Office space[cite: 10]</li>
                                <li>Awareness media (Pdfs, Prints, Flyers, etc)[cite: 10]</li>
                            </ul>

                            <!-- Sub-checklists -->
                            <ul class="pl-10 space-y-3 pt-2">
                                <li class="flex items-start space-x-3">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>(Optional)</strong> After the full 31 days, a zonal representative shall be invited to the United State for a full three-weeks training on how to project and manage the affairs of the company in their respective zones.[cite: 10]</span>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Also the zonal representative shall also be entitled to a $700 training allowance for the three weeks training here in the United States.[cite: 10]</span>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </section>

    <!-- Zonal Representative Requirements & Benefits Section -->
    <section class="py-20 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- 2-Column Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start mb-16">

                <!-- Column 1: ZONAL REPRESENTATIVE REQUIREMENTS -->
                <div class="space-y-6">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#f8b88b] tracking-wider uppercase leading-tight">
                        ZONAL REPRESENTATIVE REQUIREMENTS
                    </h2>

                    <ul class="space-y-5 text-sm sm:text-base text-gray-900 font-bold leading-relaxed">
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>$10,000 Active Deposit and above.</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>30 Active Referrals as Downlines</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Minimum deposit of $1,000 for each referral</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Referral Team Management</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 2: ZONAL REPRESENTATIVES BENEFITS. -->
                <div class="space-y-6">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#f8b88b] tracking-wider uppercase leading-tight">
                        ZONAL REPRESENTATIVES BENEFITS.
                    </h2>

                    <ul class="space-y-5 text-sm sm:text-base text-gray-900 font-bold leading-relaxed">
                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>25% Daily profit from active deposit</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>15% Referral Commission</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>$1,000 Monthly Salary</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Business and Skills Promotion</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Three Weeks All expense paid trip to the United State for training purposes.</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>$700 Training allowance</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>100% Eligibility for Company Promo.</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Offical Office Apartment</span>
                        </li>

                        <li class="flex items-start space-x-3.5">
                            <svg class="w-5 h-5 text-[#f8b88b] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Official Car</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Footer Acceptance Paragraph -->
            <p class="text-xs sm:text-sm text-gray-700 font-medium pt-6 border-t border-gray-100">
                If you accept the above requirements, kindly open an investment in the regional representative plan and for more information on this offer kindly send an email to <a href="mailto:support@altiumholdingcapital.com" class="text-gray-900 font-bold hover:underline">support@altiumholdingcapital.com</a>
            </p>

        </div>
    </section>

    <!-- Corporate Team & Advisory Banner Section -->
    <section class="relative bg-white w-full overflow-hidden font-sans py-8 border-y border-gray-100">
        <!-- Image Wrapper with Soft Bright Fade Overlays -->
        <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Wide Team Banner Image -->
            <div class="relative w-full h-[220px] sm:h-[300px] md:h-[380px] lg:h-[420px] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=2000&q=80"
                    alt="Altium Capital Global Advisory & Corporate Team"
                    class="w-full h-full object-cover object-center filter contrast-105 brightness-105" />

                <!-- Soft Top/Bottom/Side Gradient Fades to White -->
                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-white/60"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-white/40 via-transparent to-white/40"></div>
            </div>

        </div>
    </section>

    <!-- Three Reasons Section -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Header Row -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight leading-tight">
                        Three reasons why you should<br class="hidden sm:inline" /> choose our service
                    </h2>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#register" class="inline-flex items-center space-x-2 bg-slate-100/80 hover:bg-slate-200/80 text-[#3b82f6] font-bold text-xs px-5 py-2.5 rounded-full transition duration-200 shadow-sm">
                        <span>Let's Get Started</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- 3 Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Card 1: Invest with Specialists -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80"
                            alt="Invest with Specialists"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-lg font-extrabold text-[#3b82f6] mb-2.5">
                        Invest with Specialists
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        We are the largest global online investment community of professional investors all investing in financial innovation and technology.[cite: 12]
                    </p>
                </div>

                <!-- Card 2: Invest in Top-Deals -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80"
                            alt="Invest in Top-Deals"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-lg font-extrabold text-[#3b82f6] mb-2.5">
                        Invest in Top-Deals
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        Take a look at our previous deals - you invest in the same deals top Altium Capitals Online investors and venture capitalists are investing in without the huge minimum amounts of a traditional venture capital fund.[cite: 12]
                    </p>
                </div>

                <!-- Card 3: Invest Securely -->
                <div class="flex flex-col">
                    <div class="rounded-xl overflow-hidden shadow-md mb-5 h-52 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80"
                            alt="Invest Securely"
                            class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                    </div>
                    <h3 class="text-lg font-extrabold text-[#3b82f6] mb-2.5">
                        Invest Securely
                    </h3>
                    <p class="text-xs text-gray-600 font-normal leading-relaxed">
                        We use bank-grade security procedures including secure socket layers, two factor authentication and are registered with our Monetary Authority to run a securities business and transfer funds in secure, dedicated client money accounts.[cite: 12]
                    </p>
                </div>

            </div>

        </div>
    </section>



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