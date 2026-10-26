<!-- Top Utility Bar -->
<div class="relative z-[60] bg-[#3b82f6] text-white border-b border-blue-400/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3">

        <!-- Logo & Language Selector -->
        <div class="flex items-center justify-between gap-3 sm:gap-5 w-full lg:w-auto min-w-0">

            <a href="index.php"
                class="flex items-center flex-shrink-0"
                aria-label="Mapleaf Capital Home">
                <img
                    src="./assets/images/mapleaf-logo-white.png"
                    alt="Mapleaf Capital Logo"
                    class="h-15 sm:h-18 w-auto max-w-[150px] object-contain"
                    fetchpriority="high">
            </a>

            <!-- Google Translate -->
            <div class="flex-shrink-0 bg-white px-2 py-1.5 rounded-md shadow-sm flex items-center gap-2 text-gray-700">
                <span aria-hidden="true">🌐</span>
                <div id="google_translate_element"></div>
            </div>
        </div>

        <!-- Desktop Contact Details -->
        <div class="hidden lg:flex items-center gap-6 xl:gap-8 text-[11px] text-blue-100 min-w-0">

            <div class="flex items-center gap-2 min-w-0 max-w-[360px]">
                <svg class="w-4 h-4 text-white flex-shrink-0"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="break-words">
                    <?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </span>
            </div>

            <div class="text-right min-w-0">
                <a href="mailto:<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    class="block text-white font-medium hover:underline break-all">
                    <?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </a>
                <span class="text-[10px] text-blue-200">UK</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation Bar -->
<nav class="sticky top-0 z-50 bg-[#3b82f6]/[0.97] backdrop-blur-md text-white shadow-lg"
    aria-label="Main navigation">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center justify-center min-h-[64px]">
            <ul class="flex items-center justify-center gap-5 lg:gap-8 xl:gap-10 text-[11px] lg:text-xs font-bold tracking-wide">

                <li>
                    <a href="index"
                        class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                        HOME
                    </a>
                </li>

                <li>
                    <a href="about"
                        class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                        ABOUT US
                    </a>
                </li>

                <li>
                    <a href="partnership"
                        class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                        PARTNERSHIP
                    </a>
                </li>

                <li>
                    <a href="services/real-estate"
                        class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                        REAL ESTATE
                    </a>
                </li>

                <li>
                    <a href="contact"
                        class="inline-block py-3 border-b-2 border-transparent hover:border-white hover:text-blue-100 transition">
                        CONTACT
                    </a>
                </li>

                <li>
                    <a href="signin"
                        class="inline-flex items-center justify-center bg-white text-[#2563eb] px-5 py-2.5 rounded-md font-extrabold hover:bg-blue-50 transition shadow-sm">
                        ACCOUNT
                    </a>
                </li>
            </ul>
        </div>

        <!-- Mobile & Tablet Navigation Toggle -->
        <div class="flex md:hidden items-center justify-between gap-3 min-h-[60px]">

            <span class="text-[11px] sm:text-xs font-extrabold tracking-widest text-blue-100 uppercase">
                Navigation Menu
            </span>

            <button
                id="mobile-menu-toggle"
                type="button"
                aria-label="Open navigation menu"
                aria-controls="mobile-menu"
                aria-expanded="false"
                class="flex-shrink-0 flex items-center justify-center w-11 h-11 text-white bg-blue-600/70 border border-blue-300/40 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 active:scale-95 transition">

                <!-- Hamburger Icon -->
                <svg id="hamburger-icon"
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <!-- Close Icon -->
                <svg id="close-icon"
                    class="hidden w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden pb-4 border-t border-blue-300/30">

            <ul class="flex flex-col gap-1 pt-3 text-xs font-bold tracking-wide">

                <li>
                    <a href="index"
                        class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                        HOME
                    </a>
                </li>

                <li>
                    <a href="about"
                        class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                        ABOUT US
                    </a>
                </li>

                <li>
                    <a href="partnership"
                        class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                        PARTNERSHIP
                    </a>
                </li>

                <li>
                    <a href="services/real-estate"
                        class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                        REAL ESTATE
                    </a>
                </li>

                <li>
                    <a href="contact"
                        class="mobile-menu-link block py-3 px-4 rounded-lg hover:bg-blue-600/70 transition">
                        CONTACT
                    </a>
                </li>

                <li class="pt-2">
                    <a href="signin"
                        class="mobile-menu-link flex items-center justify-center py-3 px-4 rounded-lg bg-white text-[#2563eb] font-extrabold hover:bg-blue-50 transition shadow-sm">
                        ACCOUNT
                    </a>
                </li>
            </ul>

            <!-- Mobile Contact Information -->
            <div class="mt-4 pt-4 px-3 border-t border-blue-300/30 text-[11px] text-blue-100 space-y-3">

                <div class="flex items-start gap-2">
                    <span aria-hidden="true">📍</span>
                    <span class="min-w-0 break-words">
                        <?php echo htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </div>

                <div class="flex items-start gap-2">
                    <span aria-hidden="true">✉️</span>
                    <a href="mailto:<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        class="min-w-0 break-all text-white hover:underline">
                        <?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </div>

                <p class="text-blue-200 pl-6">United Kingdom (UK)</p>
            </div>
        </div>
    </div>
</nav>

<!-- Responsive Mobile Menu Script -->
<script>
    (function() {
        function initMapleafMobileMenu() {
            const toggleButton = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const closeIcon = document.getElementById('close-icon');

            if (!toggleButton || !mobileMenu || !hamburgerIcon || !closeIcon) {
                return;
            }

            // Prevent duplicate event listeners if this script is initialized again.
            if (toggleButton.dataset.menuInitialized === 'true') {
                return;
            }

            toggleButton.dataset.menuInitialized = 'true';

            function setMenuState(isOpen) {
                mobileMenu.classList.toggle('hidden', !isOpen);
                hamburgerIcon.classList.toggle('hidden', isOpen);
                closeIcon.classList.toggle('hidden', !isOpen);

                toggleButton.setAttribute('aria-expanded', String(isOpen));
                toggleButton.setAttribute(
                    'aria-label',
                    isOpen ? 'Close navigation menu' : 'Open navigation menu'
                );
            }

            toggleButton.addEventListener('click', function() {
                const isOpen =
                    toggleButton.getAttribute('aria-expanded') === 'true';

                setMenuState(!isOpen);
            });

            // Close the menu after a navigation link is selected.
            mobileMenu.querySelectorAll('a').forEach(function(link) {
                link.addEventListener('click', function() {
                    setMenuState(false);
                });
            });

            // Close the menu with the Escape key.
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    setMenuState(false);
                }
            });

            // Reset the mobile menu when switching to desktop width.
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    setMenuState(false);
                }
            });

            setMenuState(false);
        }

        if (document.readyState === 'loading') {
            document.addEventListener(
                'DOMContentLoaded',
                initMapleafMobileMenu
            );
        } else {
            initMapleafMobileMenu();
        }
    })();
</script>