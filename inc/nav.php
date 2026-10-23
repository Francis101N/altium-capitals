<!-- Top Utility Bar -->
<div class="bg-[#3b82f6] text-white text-xs py-2 px-4 sm:px-6 border-b border-blue-400/30 flex flex-wrap justify-between items-center relative z-50">
    <!-- Company Logo & Universal Language Dropdown -->
    <div class="flex items-center space-x-3 sm:space-x-6">
        <a href="index.php"
            class="flex items-center flex-shrink-0"
            aria-label="Altium Capitals Home">

            <img
                src="./assets/images/altium-logo.png"
                alt="Altium Capitals Logo"
                class="h-10 sm:h-12 w-auto max-w-[180px] object-contain">
        </a>

        <!-- Universal Google Translate Dropdown -->
        <div class="bg-white px-2 py-1 rounded shadow-sm flex items-center space-x-1">
            <span class="text-gray-700 text-xs font-bold" aria-hidden="true">🌐</span>
            <div id="google_translate_element"></div>
        </div>
    </div>

    <!-- Address & Support Email -->
    <div class="hidden lg:flex items-center space-x-8 text-[11px] text-blue-100">
        <div class="flex items-center space-x-2">
            <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span><?php echo $address; ?></span>
        </div>
        <div class="text-right">
            <a href="mailto:<?php echo $email; ?>" class="hover:underline block text-white font-medium"><?php echo $email; ?></a>
            <span class="text-[10px] text-blue-200">UK</span>
        </div>
    </div>
</div>

<!-- Main Navigation Bar -->
<nav class="bg-[#3b82f6]/95 backdrop-blur-md text-white py-3.5 px-4 sm:px-8 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between md:justify-center items-center">

        <!-- Desktop Nav Links -->
        <ul class="hidden md:flex items-center space-x-6 lg:space-x-10 text-xs font-bold tracking-wider">
            <li><a href="index" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">HOME</a></li>
            <li><a href="about" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">ABOUT US</a></li>
            <li><a href="partnership" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">PARTNERSHIP</a></li>
            <li><a href="services/real-estate" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">REAL ESTATE</a></li>
            <li><a href="contact" class="hover:text-blue-200 transition py-1 border-b-2 border-transparent hover:border-white">CONTACT</a></li>
            <li><a href="signin" class="bg-white text-[#3b82f6] px-5 py-2 rounded-md font-extrabold hover:bg-blue-50 transition shadow-sm">ACCOUNT</a></li>
        </ul>

        <!-- Mobile Menu Toggle Row -->
        <div class="flex md:hidden items-center justify-between w-full">
            <span class="text-xs font-extrabold tracking-widest text-blue-100 uppercase">Navigation Menu</span>
            <button id="mobile-menu-toggle" type="button" onclick="toggleAltiumMobileMenu()" aria-label="Toggle Navigation" class="text-white hover:text-blue-200 focus:outline-none p-2 rounded-lg bg-blue-600/70 border border-blue-400/30 cursor-pointer active:scale-95 transition">
                <!-- Hamburger Icon -->
                <svg id="hamburger-icon" class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <!-- Close Icon -->
                <svg id="close-icon" class="w-6 h-6 hidden pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="hidden md:hidden pt-4 pb-2 border-t border-blue-400/30 mt-3 transition-all duration-300">
        <ul class="flex flex-col space-y-3 text-xs font-bold tracking-wider px-2">
            <li><a href="index" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">HOME</a></li>
            <li><a href="about" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">ABOUT US</a></li>
            <li><a href="partnership" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">PARTNERSHIP</a></li>
            <li><a href="services/real-estate" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">REAL ESTATE</a></li>
            <li><a href="contact" class="block py-2 px-3 rounded hover:bg-blue-600/60 transition">CONTACT</a></li>
            <li><a href="signin" class="block py-2.5 px-3 rounded bg-white text-[#3b82f6] text-center font-extrabold shadow-sm hover:bg-blue-50 transition">ACCOUNT</a></li>
        </ul>

        <!-- Mobile Contact Info Bar -->
        <div class="mt-4 pt-3 border-t border-blue-400/20 text-[11px] text-blue-100 px-3 space-y-1">
            <p class="truncate">📍 <?php echo $address; ?></p>
            <p>✉️ <a href="mailto:<?php echo $email; ?>" class="hover:underline text-white"><?php echo $email; ?></a> (UK)</p>
        </div>
    </div>
</nav>

<!-- Global Fail-Safe Mobile Menu Toggle Script -->
<script>
    function toggleAltiumMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        var hamburgerIcon = document.getElementById('hamburger-icon');
        var closeIcon = document.getElementById('close-icon');

        if (mobileMenu) {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                if (hamburgerIcon) hamburgerIcon.classList.add('hidden');
                if (closeIcon) closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                if (hamburgerIcon) hamburgerIcon.classList.remove('hidden');
                if (closeIcon) closeIcon.classList.add('hidden');
            }
        }
    }
</script>