<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Successful | Altium Capitals</title>
    <link rel="shortcut icon" href="./img/trust-icon.png" type="image/png">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        // Auto redirect after 4 seconds to Login Page
        setTimeout(function() {
            window.location.href = "signin.php";
        }, 6000);
    </script>
</head>

<body class="bg-slate-950 text-white font-sans min-h-screen flex flex-col justify-between items-center relative overflow-hidden select-none">

    <!-- Ambient Background Glows -->
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/15 rounded-full blur-[120px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-1/3 left-1/2 -translate-x-1/2 w-80 h-80 bg-orange-500/10 rounded-full blur-[100px] pointer-events-none -z-10"></div>

    <!-- Top Brand Tag -->
    <header class="pt-10 z-10">
        <div class="flex items-center space-x-2.5 font-bold tracking-widest text-slate-200 text-sm uppercase">
            <div class="w-8 h-8 rounded-lg bg-[#3b82f6] flex items-center justify-center text-white shadow-md shadow-blue-500/20">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>
            <span>ALTIUM CAPITALS</span>
        </div>
    </header>

    <!-- Main Preloader Card -->
    <main class="w-full max-w-sm px-6 my-auto z-10">
        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-8 sm:p-10 text-center shadow-2xl shadow-black/40">

            <!-- Premium Dual-Orbital Preloader -->
            <div class="relative w-20 h-20 mx-auto mb-8 flex items-center justify-center">
                <!-- Outer Glow Ring -->
                <div class="absolute inset-0 rounded-full border-2 border-slate-800"></div>

                <!-- Primary Spinner Ring -->
                <div class="absolute inset-0 rounded-full border-2 border-transparent border-t-[#3b82f6] border-r-[#3b82f6] animate-spin"></div>

                <!-- Reverse Secondary Spinner Ring -->
                <div class="absolute inset-2 rounded-full border-2 border-transparent border-b-[#f97316] border-l-[#f97316] animate-[spin_1.5s_linear_infinite_reverse]"></div>

                <!-- Center Pulse Core -->
                <div class="w-3 h-3 bg-emerald-400 rounded-full animate-ping opacity-75"></div>
            </div>

            <!-- Headline -->
            <h2 class="text-xl font-bold text-white tracking-tight mb-1">
                Registration Successful!
            </h2>

            <!-- Welcome Message -->
            <p class="text-sm font-medium text-slate-400 mb-6">
                Welcome to Altium Capitals — your account has been created successfully. You will be redirected to the login page shortly.
            </p>

            <!-- Status Bar & Dots -->
            <div class="inline-flex items-center space-x-2 bg-slate-950/80 border border-slate-800/80 px-4 py-2 rounded-full text-xs text-slate-300 font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Redirecting to Login</span>
                <span class="inline-flex space-x-0.5 text-slate-500">
                    <span class="animate-bounce">.</span>
                    <span class="animate-bounce [animation-delay:0.2s]">.</span>
                    <span class="animate-bounce [animation-delay:0.4s]">.</span>
                </span>
            </div>

            <!-- Direct Link -->
            <div class="mt-8">
                <a href="signin.php" class="text-[11px] text-slate-500 hover:text-slate-300 transition duration-200">
                    Click here if you are not redirected automatically
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="pb-8 text-[11px] text-slate-600 font-medium z-10">
        &copy; <?php echo date('Y'); ?> Altium Capitals
    </footer>

</body>

</html>