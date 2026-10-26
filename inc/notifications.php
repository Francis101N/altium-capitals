<!-- Multi-Corner Floating Live Notifications — Always on Top -->
<style>
    .toast-popup {
        position: fixed !important;
        z-index: 2147483647 !important;
        isolation: isolate;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        will-change: transform, opacity;
        transition:
            transform 0.6s cubic-bezier(0.16, 1, 0.3, 1),
            opacity 0.6s ease,
            visibility 0.6s ease;
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, 0.08),
            0 12px 35px rgba(0, 0, 0, 0.65),
            0 4px 12px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        max-width: min(360px, calc(100vw - 32px));
    }

    /* Top Left */
    .toast-tl {
        top: 80px !important;
        left: 16px !important;
        right: auto !important;
        bottom: auto !important;
        transform: translateX(calc(-100% - 32px));
    }

    .toast-tl.show {
        transform: translateX(0);
    }

    /* Top Right */
    .toast-tr {
        top: 80px !important;
        right: 16px !important;
        left: auto !important;
        bottom: auto !important;
        transform: translateX(calc(100% + 32px));
    }

    .toast-tr.show {
        transform: translateX(0);
    }

    /* Bottom Left */
    .toast-bl {
        bottom: 40px !important;
        left: 16px !important;
        right: auto !important;
        top: auto !important;
        transform: translateX(calc(-100% - 32px));
    }

    .toast-bl.show {
        transform: translateX(0);
    }

    /* Bottom Right */
    .toast-br {
        bottom: 40px !important;
        right: 16px !important;
        left: auto !important;
        top: auto !important;
        transform: translateX(calc(100% + 32px));
    }

    .toast-br.show {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .toast-tl.show,
    .toast-tr.show,
    .toast-bl.show {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    /* Keep notifications visible above ordinary page content */
    body>.toast-layer,
    body>div:has(> #toast-tl),
    body>div:has(> #toast-tr),
    body>div:has(> #toast-bl),
    body>div:has(> #toast-br) {
        z-index: 2147483646 !important;
    }

    /* Mobile adjustments */
    @media (max-width: 480px) {
        .toast-popup {
            padding: 12px !important;
            gap: 10px !important;
            max-width: calc(100vw - 24px);
        }

        .toast-tl,
        .toast-tr {
            top: 72px !important;
        }

        .toast-bl,
        .toast-br {
            bottom: 20px !important;
        }

        .toast-tl,
        .toast-bl {
            left: 12px !important;
        }

        .toast-tr,
        .toast-br {
            right: 12px !important;
        }
    }

    /* Respect reduced-motion preferences */
    @media (prefers-reduced-motion: reduce) {
        .toast-popup {
            transition: opacity 0.15s ease !important;
        }
    }
</style>


<!-- 1. TOP-LEFT CONTAINER -->
<div class="fixed top-20 left-4 z-50">
    <div id="toast-tl" class="toast-popup toast-tl bg-slate-900/95 backdrop-blur-md text-white border border-slate-700/60 p-4 rounded-2xl shadow-2xl flex items-center space-x-3.5 max-w-xs sm:max-w-sm">
        <div id="toast-tl-icon" class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-lg border"></div>
        <div class="flex-1 pr-1">
            <div class="flex items-center justify-between space-x-2">
                <span id="toast-tl-type" class="text-[10px] font-bold uppercase tracking-wider"></span>
                <span class="text-[9px] text-gray-400 font-medium">Just now</span>
            </div>
            <p id="toast-tl-text" class="text-xs text-gray-200 font-medium mt-0.5 leading-snug"></p>
        </div>
    </div>
</div>

<!-- 2. TOP-RIGHT CONTAINER -->
<div class="fixed top-20 right-4 z-50">
    <div id="toast-tr" class="toast-popup toast-tr bg-slate-900/95 backdrop-blur-md text-white border border-slate-700/60 p-4 rounded-2xl shadow-2xl flex items-center space-x-3.5 max-w-xs sm:max-w-sm">
        <div id="toast-tr-icon" class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-lg border"></div>
        <div class="flex-1 pr-1">
            <div class="flex items-center justify-between space-x-2">
                <span id="toast-tr-type" class="text-[10px] font-bold uppercase tracking-wider"></span>
                <span class="text-[9px] text-gray-400 font-medium">Just now</span>
            </div>
            <p id="toast-tr-text" class="text-xs text-gray-200 font-medium mt-0.5 leading-snug"></p>
        </div>
    </div>
</div>

<!-- 3. BOTTOM-LEFT CONTAINER -->
<div class="fixed bottom-10 left-4 z-50">
    <div id="toast-bl" class="toast-popup toast-bl bg-slate-900/95 backdrop-blur-md text-white border border-slate-700/60 p-4 rounded-2xl shadow-2xl flex items-center space-x-3.5 max-w-xs sm:max-w-sm">
        <div id="toast-bl-icon" class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-lg border"></div>
        <div class="flex-1 pr-1">
            <div class="flex items-center justify-between space-x-2">
                <span id="toast-bl-type" class="text-[10px] font-bold uppercase tracking-wider"></span>
                <span class="text-[9px] text-gray-400 font-medium">Just now</span>
            </div>
            <p id="toast-bl-text" class="text-xs text-gray-200 font-medium mt-0.5 leading-snug"></p>
        </div>
    </div>
</div>

<!-- 4. BOTTOM-RIGHT CONTAINER -->
<div class="fixed bottom-10 right-4 z-50">
    <div id="toast-br" class="toast-popup toast-br bg-slate-900/95 backdrop-blur-md text-white border border-slate-700/60 p-4 rounded-2xl shadow-2xl flex items-center space-x-3.5 max-w-xs sm:max-w-sm">
        <div id="toast-br-icon" class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-lg border"></div>
        <div class="flex-1 pr-1">
            <div class="flex items-center justify-between space-x-2">
                <span id="toast-br-type" class="text-[10px] font-bold uppercase tracking-wider"></span>
                <span class="text-[9px] text-gray-400 font-medium">Just now</span>
            </div>
            <p id="toast-br-text" class="text-xs text-gray-200 font-medium mt-0.5 leading-snug"></p>
        </div>
    </div>
</div>

<!-- Global Random Live Generator Script -->
<script>
    (function() {
        // Diverse International Names
        const names = [
            'David', 'Annabel', 'Michael', 'Sophia', 'James', 'Emma', 'Robert', 'Olivia',
            'Mateo', 'Aria', 'Kenji', 'Elena', 'Lars', 'Freja', 'Liam', 'Yuki',
            'Carlos', 'Camila', 'Tariq', 'Fatima', 'Sven', 'Amara', 'Dmitry', 'Chloe',
            'Gabriel', 'Zoe', 'Wei', 'Mei', 'Henrik', 'Isabelle'
        ];

        // Global Countries Pool
        const countries = [
            'United States', 'Canada', 'United Kingdom', 'Germany', 'Australia',
            'Japan', 'France', 'Switzerland', 'Singapore', 'Norway', 'Sweden',
            'Netherlands', 'United Arab Emirates', 'Brazil', 'Mexico', 'South Korea',
            'Italy', 'Spain', 'New Zealand', 'South Africa', 'Qatar', 'Saudi Arabia',
            'Ireland', 'Denmark', 'Finland', 'Austria'
        ];

        // Corner Rotation Sequence: Top Left -> Top Right -> Bottom Left -> Bottom Right
        const sequence = ['tl', 'tr', 'bl', 'br'];
        let currentIndex = 0;

        function getRandomItem(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        function getRandomAmount(min, max) {
            // Generate varied realistic numbers with standard thousand separators
            const amount = Math.floor(Math.random() * (max - min + 1) + min);
            return '$' + amount.toLocaleString('en-US');
        }

        function triggerSequentialNotification() {
            // Pick next corner in 4-step sequence
            const corner = sequence[currentIndex];
            currentIndex = (currentIndex + 1) % sequence.length;

            const isDeposit = Math.random() > 0.45; // ~55% deposits, 45% withdrawals
            const name = getRandomItem(names);
            const country = getRandomItem(countries);

            // Random amount generator ranging from smaller amounts up to high-tier investments
            const amount = isDeposit ? getRandomAmount(500, 350000) : getRandomAmount(1000, 750000);

            const toastEl = document.getElementById(`toast-${corner}`);
            const iconEl = document.getElementById(`toast-${corner}-icon`);
            const typeEl = document.getElementById(`toast-${corner}-type`);
            const textEl = document.getElementById(`toast-${corner}-text`);

            if (isDeposit) {
                iconEl.className = 'w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 text-lg border border-emerald-500/30';
                iconEl.innerHTML = '💰';
                typeEl.className = 'text-[10px] font-bold uppercase tracking-wider text-emerald-400';
                typeEl.textContent = 'Recent Deposit';
                textEl.innerHTML = `<span class="font-bold text-white">${name}</span> from <span class="text-gray-300">${country}</span> deposited <span class="font-bold text-emerald-400">${amount}</span>`;
            } else {
                iconEl.className = 'w-10 h-10 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center flex-shrink-0 text-lg border border-blue-500/30';
                iconEl.innerHTML = '⚡';
                typeEl.className = 'text-[10px] font-bold uppercase tracking-wider text-blue-400';
                typeEl.textContent = 'Recent Withdrawal';
                textEl.innerHTML = `<span class="font-bold text-white">${name}</span> from <span class="text-gray-300">${country}</span> withdrew <span class="font-bold text-blue-400">${amount}</span>`;
            }

            // Show Toast
            toastEl.classList.add('show');

            // Hide Toast after 4 seconds
            setTimeout(() => {
                toastEl.classList.remove('show');
            }, 4000);
        }

        function startLiveStream() {
            // Initial notification launch
            setTimeout(triggerSequentialNotification, 1500);

            // Repeat every 6.5 seconds through corners
            setInterval(triggerSequentialNotification, 6500);
        }

        startLiveStream();
    })();
</script>