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
    <title>Sign Up - Mapleaf Capital</title>
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


    <!-- Premium & Modern Register / Sign Up Section -->
    <section class="py-16 bg-slate-50/50 flex items-center justify-center font-sans relative overflow-hidden px-4">

        <!-- Decorative Gradient Background Glows -->
        <div class="absolute top-1/4 -left-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-orange-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-3xl relative z-10 my-6">

            <!-- Register Card Container -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-8 sm:p-12 shadow-2xl shadow-blue-900/10 border border-slate-100/80 transition-all duration-300">

                <!-- Header Section -->
                <div class="mb-10 text-left">
                    <span class="inline-block px-3 py-1 bg-blue-50 text-[#3b82f6] text-xs font-bold tracking-widest uppercase rounded-full mb-3">
                        Start Your Journey
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        Open an Account
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                        Fill in your details to create a secure Mapleaf Capital portfolio
                    </p>
                </div>

                <form class="space-y-6" method="post" action="process-application.php" enctype="multipart/form-data">

                    <input type="hidden" name="ref" value="">

                    <!-- Section: Personal Info -->
                    <div class="space-y-4">
                        <p class="text-xs font-extrabold uppercase tracking-wider text-[#3b82f6]">1. Personal Information</p>

                        <!-- Name Fields (3 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Surname</label>
                                <input type="text" name="lname" placeholder="Surname" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">First Name</label>
                                <input type="text" name="fname" placeholder="First Name" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Middle Name</label>
                                <input type="text" name="mname" placeholder="Middle Name" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                        </div>

                        <!-- Sex & DOB Fields (2 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Sex</label>
                                <select name="sex" required class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200">
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Date of Birth</label>
                                <input type="date" name="dob" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Home Address</label>
                            <input type="text" name="address" placeholder="Full Home Address, City, State & Country" required
                                class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                        </div>
                    </div>

                    <!-- Section: Contact & Account Details -->
                    <div class="space-y-4 pt-2">
                        <p class="text-xs font-extrabold uppercase tracking-wider text-[#3b82f6]">2. Contact & Credentials</p>

                        <!-- Email & Phone (2 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Email Address</label>
                                <input type="email" name="email" placeholder="Email Address" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Phone Number</label>
                                <input type="text" name="phone" placeholder="Phone Number" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                        </div>

                        <!-- Username Field -->
                        <div>
                            <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Choose Username</label>
                            <input type="text" name="username" placeholder="Username" required
                                class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                        </div>

                        <!-- Password & Confirm Password (2 Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Password</label>
                                <input type="password" name="password" placeholder="Password" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-1">Confirm Password</label>
                                <input type="password" name="confirm" placeholder="Confirm Password" required
                                    class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                            </div>
                        </div>
                    </div>

                    <!-- Passport Photograph Upload Field -->
                    <div class="pt-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 mb-2">Upload Passport Photograph</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-200 rounded-2xl cursor-pointer bg-[#f8fafc] hover:bg-white hover:border-[#3b82f6] transition duration-200">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-xs text-gray-500 font-semibold"><span class="font-bold text-[#3b82f6]">Click to upload</span> passport image</p>
                                    <p class="text-[10px] text-gray-400 mt-1">PNG, JPG or JPEG (Max 5MB)</p>
                                </div>
                                <input type="file" name="userfile" class="hidden" accept="image/*" required />
                            </label>
                        </div>
                    </div>

                    <!-- Terms and Conditions Checkbox -->
                    <div class="flex items-center space-x-3 pt-2">
                        <input type="checkbox" id="termsCheck" name="iAgree" required
                            class="w-4 h-4 text-[#3b82f6] border-gray-300 rounded focus:ring-[#3b82f6] cursor-pointer" />
                        <label for="termsCheck" class="text-xs font-semibold text-gray-600 cursor-pointer">
                            I agree to the <a href="terms.php" class="text-[#3b82f6] hover:underline font-bold">Terms and Conditions</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center space-x-2 bg-gradient-to-r from-[#F8B88B] to-[#f97316] hover:from-[#f97316] hover:to-[#ea580c] text-white font-extrabold text-sm sm:text-base px-8 py-4 rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            <span>Open Account</span>
                            <span class="text-lg leading-none">→</span>
                        </button>
                    </div>

                </form>

                <!-- Already have an account CTA Footer -->
                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <p class="text-xs sm:text-sm font-semibold text-gray-600">
                        Already have an account?
                        <a href="signin.php" class="text-[#3b82f6] hover:text-blue-700 font-extrabold ml-1 underline decoration-2 underline-offset-4 transition">
                            LOG IN HERE
                        </a>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Fixed Bottom Crypto Ticker Widget (z-index 9999) -->
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