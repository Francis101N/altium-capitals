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
    <title>Sign Up - Altium Capitals</title>
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


    <!-- Premium & Modern Register / Sign Up Section -->
    <section class="min-h-screen py-20 bg-slate-50/50 flex items-center justify-center font-sans relative overflow-hidden px-4">

        <!-- Decorative Gradient Background Glows -->
        <div class="absolute top-1/4 -left-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-orange-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-3xl relative z-10">

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
                        Fill in your details to create a secure Altium Capitals portfolio
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