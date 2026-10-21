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
    <title>Terms & Conditions - Altium Capitals</title>
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

    <!-- T& C Banner Section -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1920&q=80"
                alt="Terms & Conditions"
                class="w-full h-full object-cover object-center filter grayscale contrast-125" />

            <!-- Blue-tinted soft overlay -->
            <div class="absolute inset-0 bg-[#1e293b]/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-blue-900/30"></div>

            <!-- Dark bottom gradient shadow -->
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-slate-950/90 to-transparent"></div>
        </div>

        <!-- Banner Content with Matched Font Styles -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20 flex flex-col items-center">

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                Terms & Conditions
            </h1>

            <!-- Subheading -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                Please read these terms and conditions carefully before using our services.
            </p>

        </div>
    </section>

    <!-- Terms of Use / User Agreement Section -->
    <section class="py-16 bg-white text-gray-900 font-sans">
        <div class="max-w-4xl mx-auto px-6">

            <!-- Opening Statement Paragraph -->
            <p class="text-xs sm:text-sm text-gray-600 font-normal leading-relaxed text-justify mb-10">
                For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do, some discipline around planning and execution of those plans and belief that you can achieve your desires.
            </p>

            <!-- Terms Content Modules -->
            <div class="space-y-8 text-xs sm:text-sm text-gray-600 font-normal leading-relaxed text-justify">

                <!-- User Agreement -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        User Agreement
                    </h3>
                    <p>
                        Welcome to the Altium Capitals Official website. By accessing this website, you agree to comply with this binding user agreement between you and Altium Capitals, which governs your access and use of the website. If you do not accept these terms and conditions, do not use this website. Your use of this website indicates your full acceptance of this user agreement in its then-current form each time you use the website. Altium Capitals reserves the right to change the terms and conditions at any time, without notice.
                    </p>
                </div>

                <!-- Ownership and Restrictions on Use -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        Ownership and Restrictions on Use
                    </h3>
                    <p>
                        All content included on this website is the property of Altium Capitals or others and is protected by copyright with all rights reserved. You may download or print out a hard copy of individual pages and/or sections of the Altium Capitals website, provided that you do not remove any copyright or other proprietary notices. Any downloading or otherwise copying from the Altium Capitals website will not transfer title to any software or material to you. You may not reproduce (in whole or in part), transmit (by electronic means or otherwise), modify, link into or use for any public or commercial purpose the Altium Capitals website without the prior written permission of Altium Capitals. You may not disassemble, deconstruct or otherwise violate the security of all or any portion of this website. At any time and for any reason we may revoke your right to use all or any portion of the website.
                   </p>
                </div>
                <!-- Risks You Assume by Using This Website -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        Risks You Assume by Using This Website
                    </h3>
                    <div class="space-y-3">
                        <p>
                            Information on this website speaks only as of the date indicated. We make reasonable efforts to provide accurate information, but at times we may not promptly update or correct this website even if we are aware that it is inaccurate, outdated or otherwise inappropriate. You agree that we are not liable for any actions you take or decisions you make in reliance on any information on this website.
                        </p>
                        <p>
                            We make reasonable efforts to avoid technological problems, but at any time this website may have, and/or may cause, technological problems including viruses. We are not liable for any defects, delays or errors in or resulting from your use of this website.
                        </p>
                        <p>
                            We may, but have no obligation to, monitor and record activity on this website for any reason or for no reason.
                        </p>
                    </div>
                </div>

                <!-- International Use -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        International Use
                    </h3>
                    <p>
                        The information provided on this website is not intended for distribution to, or use in, any jurisdiction where such distribution or use would be contrary to law. You are responsible for compliance with applicable local laws and regulations.
                    </p>
                </div>

                <!-- No Warranty -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        No Warranty
                    </h3>
                    <p>
                        The information and opinions contained on the Altium Capitals website are provided without any warranty of any kind, either express or implied.
                    </p>
                </div>

                <!-- Limitation of Liability -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        Limitation of Liability
                    </h3>
                    <p>
                        Neither we nor any of our affiliates, agents or employees is responsible for any damages, liabilities or injury, including but not limited to indirect, incidental, special, punitive or consequential damages, however caused, arising out of your use of or inability to use this website or this user agreement. Our liability is limited to the maximum extent permitted by law and is limited even if we have been advised of the possibility of the damages, liability or injury that you suffer or if any remedy you have fails of its essential purpose, including any damages, liabilities or injuries caused by any failure of performance, error, omission, theft, interruption, deletion, defect, delay in operation, communication line failure, or other computer malfunction.
                    </p>
                </div>

                <!-- Governing Law -->
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#f97316] mb-2">
                        Governing Law
                    </h3>
                    <p>
                        You agree that your use of this website and any disputes relating to the website or this user agreement shall be governed in all respects by the laws of the state of Maryland. Any dispute relating to the above shall be brought solely in the state or federal district courts located in Maryland and it is agreed that such courts shall have jurisdiction over the parties to this user agreement and any dispute arising hereunder.
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