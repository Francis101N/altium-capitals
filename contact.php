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
    <title>Contact Us - Mapleaf Capital</title>
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


    <!-- Contact Us Banner Section -->
    <section class="relative bg-slate-900 text-white min-h-[380px] sm:min-h-[440px] flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image with Soft Blue Overlay & Bottom Gradient -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1920&q=80"
                alt="Contact Us Support Team"
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
                Contact Us
            </h1>

            <!-- Subheading -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 font-medium mb-10 max-w-2xl">
                We are here to assist you 24/7. Get in touch with our expert advisory team for any inquiries or support
            </p>

        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-white text-gray-900 font-sans relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <!-- Top Subheading -->
            <div class="text-center mb-16">
                <p class="text-base sm:text-lg font-bold text-gray-900">
                    Feel free to drop us a message.
                </p>
            </div>

            <!-- Content Grid: Left Text & Right Form Card -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Left Side Heading & Paragraph -->
                <div class="lg:col-span-5 space-y-6">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#3b82f6] tracking-tight leading-snug">
                        Let’s talk about your investment and how we can make it happen.
                    </h2>

                    <p class="text-base sm:text-lg font-extrabold text-gray-800 leading-relaxed">
                        This is the beginning of creating the life that you want to live.
                    </p>
                </div>

                <!-- Right Side Contact Form Card -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-2xl border border-gray-100 max-w-xl mx-auto lg:ml-auto">

                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#3b82f6] mb-8 leading-snug">
                            Need assistance? please fill the form
                        </h3>

                        <form action="#" method="POST" class="space-y-5">

                            <!-- Name Input -->
                            <div>
                                <input type="text"
                                    name="name"
                                    placeholder="Name"
                                    required
                                    class="w-full bg-[#f4f4f5] border-0 rounded-lg px-4 py-3.5 text-sm font-medium text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#3b82f6] focus:bg-white outline-none transition" />
                            </div>

                            <!-- Email Input -->
                            <div>
                                <input type="email"
                                    name="email"
                                    placeholder="Email"
                                    required
                                    class="w-full bg-[#f4f4f5] border-0 rounded-lg px-4 py-3.5 text-sm font-medium text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#3b82f6] focus:bg-white outline-none transition" />
                            </div>

                            <!-- Enquiry Description Textarea -->
                            <div>
                                <textarea name="message"
                                    rows="5"
                                    placeholder="Enquiry Description"
                                    required
                                    class="w-full bg-[#f4f4f5] border-0 rounded-lg px-4 py-3.5 text-sm font-medium text-gray-800 placeholder-gray-500 focus:ring-2 focus:ring-[#3b82f6] focus:bg-white outline-none transition resize-y"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit"
                                    class="inline-flex items-center justify-center space-x-2 bg-[#F8B88B] hover:bg-[#f87171] text-white font-bold text-sm px-8 py-3.5 rounded-full shadow-md transition duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                                    <span>Send Message</span>
                                    <span>→</span>
                                </button>
                            </div>

                        </form>

                    </div>
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