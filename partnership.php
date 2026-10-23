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
    <?php include 'inc/floating-whatsapp.php'; ?>


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