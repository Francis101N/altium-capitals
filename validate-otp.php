<?php
ini_set('display_errors', 0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Altium Capitals | OTP Verification</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Secure OTP Verification" name="description" />
    <meta content="Altium Capitals" name="author" />
    <link rel="shortcut icon" href="./img/trust-icon.png" type="image/png">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50/50 text-gray-900 font-sans min-h-screen flex flex-col justify-between relative overflow-x-hidden">

    <!-- Decorative Gradient Background Glows -->
    <div class="absolute top-1/4 -left-20 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-orange-400/15 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <!-- Top Navigation Mini-Bar -->
    <header class="w-full bg-[#3b82f6] text-white py-3.5 px-6 shadow-md flex justify-between items-center z-50">
        <a href="index.php" class="flex items-center space-x-2 font-bold text-lg tracking-wider text-white">
            <svg class="w-7 h-7 text-white flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
            <span>ALTIUM CAPITALS</span>
        </a>
        <a href="index.php" class="text-xs font-extrabold tracking-widest text-blue-100 hover:text-white uppercase transition">
            &larr; Home
        </a>
    </header>

    <!-- Main OTP Card Content Container -->
    <main class="flex-grow flex items-center justify-center px-4 py-16">
        <div class="w-full max-w-md relative z-10">

            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-8 sm:p-10 shadow-2xl shadow-blue-900/10 border border-slate-100/80 transition-all duration-300">

                <!-- Card Header -->
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-50 text-[#3b82f6] mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Security Verification
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                        Enter the one-time password (OTP) sent to your email address.
                    </p>
                </div>

                <!-- OTP Form -->
                <form method="POST" action="auth-otp.php" class="space-y-6">
                    <?php if (!empty($error)) { ?>
                        <div class="p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs font-bold text-center">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <!-- OTP Input Field -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-gray-700 text-center">Enter OTP Code</label>
                        <input type="text"
                            name="otp"
                            maxlength="6"
                            placeholder="••••••"
                            required
                            autocomplete="off"
                            class="w-full bg-[#f8fafc] border border-gray-200/80 rounded-xl px-5 py-4 text-center text-xl font-bold tracking-widest text-gray-900 placeholder-gray-300 focus:ring-2 focus:ring-[#3b82f6] focus:border-transparent focus:bg-white outline-none transition duration-200" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            name="login"
                            class="w-full inline-flex items-center justify-center space-x-2 bg-[#f97316] hover:bg-[#ea580c] text-white font-extrabold text-sm sm:text-base px-8 py-4 rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            <span>Continue to Account</span>
                            <span class="text-lg leading-none">&rarr;</span>
                        </button>
                    </div>

                    <!-- Back Link -->
                    <div class="text-center pt-2">
                        <a href="javascript:history.back()" class="text-xs font-bold text-gray-500 hover:text-[#3b82f6] transition duration-200">
                            &larr; Go Back
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full text-center py-6 text-xs text-gray-500 font-medium border-t border-slate-200/60 bg-white/40">
        &copy; <?php echo date('Y'); ?> Altium Capitals. All Rights Reserved.
    </footer>

</body>

</html>