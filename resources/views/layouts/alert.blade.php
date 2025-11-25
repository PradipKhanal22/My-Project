@if(Session::has('success'))
<div class="fixed top-6 right-6 bg-white rounded-xl shadow-2xl border border-gray-100 z-[999] overflow-hidden max-w-md animate-slide-in" id="alertmessage">
    <div class="relative p-5">
        <!-- Content -->
        <div class="flex items-start gap-4">
            <!-- Green Check Icon -->
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-white text-2xl"></i>
                </div>
            </div>

            <!-- Message -->
            <div class="flex-1 pr-8">
                <h4 class="text-gray-900 font-bold text-lg mb-1">Success!</h4>
                <p class="text-gray-600 text-sm">{{ session('success') }}</p>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlert('alertmessage')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
            <div class="h-full bg-gradient-to-r from-red-500 to-red-600 animate-progress"></div>
        </div>
    </div>
</div>

<style>
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes progress {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }

    .animate-slide-in {
        animation: slide-in 0.4s ease-out;
    }

    .animate-progress {
        animation: progress 3s linear forwards;
    }
</style>

<script>
    function closeAlert(id) {
        const element = document.getElementById(id);
        element.style.transform = 'translateX(100%)';
        element.style.opacity = '0';
        element.style.transition = 'all 0.3s ease-out';
        setTimeout(() => {
            element.style.display = 'none';
        }, 300);
    }

    setTimeout(function() {
        closeAlert('alertmessage');
    }, 3000);
</script>
@endif

@if(Session::has('error'))
<div class="fixed top-6 right-6 bg-white rounded-xl shadow-2xl border border-gray-100 z-[999] overflow-hidden max-w-md animate-slide-in" id="alerterror">
    <div class="relative p-5">
        <!-- Content -->
        <div class="flex items-start gap-4">
            <!-- Red Error Icon -->
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                    <i class="ri-error-warning-line text-white text-2xl"></i>
                </div>
            </div>

            <!-- Message -->
            <div class="flex-1 pr-8">
                <h4 class="text-gray-900 font-bold text-lg mb-1">Error!</h4>
                <p class="text-gray-600 text-sm">{{ session('error') }}</p>
            </div>

            <!-- Close Button -->
            <button onclick="closeAlert('alerterror')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
            <div class="h-full bg-gradient-to-r from-red-500 to-red-600 animate-progress"></div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        closeAlert('alerterror');
    }, 3000);
</script>
@endif
