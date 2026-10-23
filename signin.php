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
    <title>Sign In - Altium Capitals</title>
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
            padding-bottom: 70px !important;
            /* Prevents fixed bottom ticker from overlapping page content */
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

    <!-- Floating WhatsApp Chat Widget (Guaranteed Clickable with Max z-index) -->
    <?php include 'inc/floating-whatsapp.php'; ?>

    <div class="fixed bottom-20 right-4 z-50 flex items-center space-x-2">
        <div class="bg-black/80 text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-lg transform -rotate-6">
            We Are Here!
        </div>
        <div class="bg-emerald-500 hover:bg-emerald-600 text-white p-3 rounded-full shadow-2xl flex items-center justify-center cursor-pointer transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
        </div>
    </div>


    <!-- Premium & Modern Login Card Section -->
    <section class="py-16 bg-slate-50/50 flex items-center justify-center font-sans relative overflow-hidden px-4">

        <!-- Decorative Gradient Background Glows -->
        <div class="absolute top-1/4 -left-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-orange-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-xl relative z-10 my-8">

            <!-- Login Card Container -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-8 sm:p-12 shadow-2xl shadow-blue-900/10 border border-slate-100/80 transition-all duration-300">

                <!-- Header Section -->
                <div class="mb-10 text-left">
                    <span class="inline-block px-3 py-1 bg-blue-50 text-[#3b82f6] text-xs font-bold tracking-widest uppercase rounded-full mb-3">
                        Welcome Back
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        LOG IN
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                        Access your secure investment portal and portfolio
                    </p>
                </div>

                <form action="validate-login.php" method="POST" class="space-y-6">

                    <!-- Username Input -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700">Username or Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text"
                                name="username"
                                placeholder="Enter your username"
                                required
                                class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl pl-11 pr-5 py-3.5 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700">Password</label>
                            <a href="forgot-password.php" class="text-xs font-bold text-red-500 hover:text-red-600 transition duration-200">
                                Forgot Password?
                            </a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password"
                                id="login-password"
                                name="password"
                                placeholder="Enter your password"
                                required
                                class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl pl-11 pr-11 py-3.5 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />

                            <!-- Toggle Password Visibility Icon -->
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                                <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center space-x-2 bg-gradient-to-r from-[#F8B88B] to-[#f97316] hover:from-[#f97316] hover:to-[#ea580c] text-white font-extrabold text-sm sm:text-base px-8 py-4 rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            <span>Login Here</span>
                            <span class="text-lg leading-none">→</span>
                        </button>
                    </div>

                </form>

                <!-- Sign Up CTA Footer Divider -->
                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <p class="text-xs sm:text-sm font-semibold text-gray-600">
                        Don't have an account?
                        <a href="signup" class="text-[#3b82f6] hover:text-blue-700 font-extrabold ml-1 underline decoration-2 underline-offset-4 transition">
                            SIGN UP HERE
                        </a>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Fixed Bottom Crypto Ticker Widget -->
    <div style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 9999; height: 62px; background-color: #1B2030; overflow: hidden; box-sizing: border-box; border-top: 1px solid #56667F; text-align: right; line-height: 14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px;">
        <div style="height: 42px; padding: 0px; margin: 0px; width: 100%;">
            <iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="42px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border: 0; margin: 0; padding: 0;"></iframe>
        </div>
        <div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;">
            <a href="https://coinlib.io" target="_blank" rel="nofollow" style="font-weight: 500; color: #FFFFFF; text-decoration: none; font-size: 11px;">Coinlib</a>
        </div>
    </div>

    <!-- Toggle Password Visibility JS -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('login-password');
            if (passwordInput) {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            }
        }
    </script>

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