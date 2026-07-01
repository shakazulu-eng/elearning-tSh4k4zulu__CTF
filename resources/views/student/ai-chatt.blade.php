<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&amp;family=Inter:wght@400;500&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                "surface-container-highest": "#e1e2e4",
                "primary": "#003d9b",
                "on-surface": "#191c1e",
                "on-secondary-fixed-variant": "#00419d",
                "on-secondary-container": "#003179",
                "surface-container-low": "#f3f4f6",
                "surface-tint": "#0c56d0",
                "outline-variant": "#c3c6d6",
                "tertiary-container": "#a33500",
                "on-tertiary-fixed": "#380d00",
                "surface-variant": "#e1e2e4",
                "on-secondary-fixed": "#001946",
                "inverse-surface": "#2e3132",
                "surface-container-lowest": "#ffffff",
                "background": "#f8f9fb",
                "on-tertiary-fixed-variant": "#812800",
                "error": "#ba1a1a",
                "surface-bright": "#f8f9fb",
                "surface-container-high": "#e7e8ea",
                "on-tertiary-container": "#ffc6b2",
                "inverse-on-surface": "#f0f1f3",
                "inverse-primary": "#b2c5ff",
                "on-error-container": "#93000a",
                "outline": "#737685",
                "on-primary": "#ffffff",
                "surface-container": "#edeef0",
                "on-primary-fixed": "#001848",
                "surface-dim": "#d9dadc",
                "tertiary": "#7b2600",
                "tertiary-fixed-dim": "#ffb59b",
                "secondary-fixed-dim": "#b1c6ff",
                "on-primary-fixed-variant": "#0040a2",
                "secondary": "#285ab9",
                "on-error": "#ffffff",
                "on-secondary": "#ffffff",
                "on-tertiary": "#ffffff",
                "secondary-container": "#709bfe",
                "primary-container": "#0052cc",
                "surface": "#f8f9fb",
                "on-surface-variant": "#434654",
                "on-primary-container": "#c4d2ff",
                "error-container": "#ffdad6",
                "primary-fixed": "#dae2ff",
                "secondary-fixed": "#d9e2ff",
                "tertiary-fixed": "#ffdbcf",
                "primary-fixed-dim": "#b2c5ff",
                "on-background": "#191c1e"
              },
              "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "8px",
                "xl": "0.75rem",
                "full": "9999px"
              },
              "spacing": {
                "margin-desktop": "48px",
                "stack-md": "16px",
                "stack-lg": "32px",
                "margin-mobile": "16px",
                "gutter": "24px",
                "unit": "8px",
                "container-max": "1200px",
                "stack-sm": "8px"
              },
              "fontFamily": {
                "h1": ["Manrope"],
                "h2": ["Manrope"],
                "body-md": ["Manrope"],
                "body-lg": ["Manrope"],
                "caption": ["Inter"],
                "h3": ["Manrope"],
                "label-md": ["Inter"]
              },
              "fontSize": {
                "h1": ["40px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "h2": ["32px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "caption": ["12px", {"lineHeight": "1.4", "fontWeight": "400"}],
                "h3": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "500"}]
              }
            },
          },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md selection:bg-primary-container selection:text-white">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 flex justify-between items-center px-6 h-16 bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-800 shadow-sm font-manrope antialiased">
<div class="flex items-center gap-8">
<span class="text-xl font-bold tracking-tight text-blue-700 dark:text-blue-400">EduMentor AI</span>
<nav class="hidden md:flex items-center gap-6">
<a class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition-colors text-label-md" href="#">Dashboard</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition-colors text-label-md" href="#">Courses</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition-colors text-label-md" href="#">Resources</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition-colors text-label-md" href="#">Progress</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="p-2 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors rounded-full">
<span class="material-symbols-outlined text-gray-600">notifications</span>
</button>
<button class="p-2 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors rounded-full">
<span class="material-symbols-outlined text-gray-600">settings</span>
</button>
<div class="h-8 w-8 rounded-full overflow-hidden border border-outline-variant">
<img alt="User profile" class="w-full h-full object-cover" data-alt="A professional headshot of a young male professional with a friendly smile, set against a clean, softly blurred office background. The lighting is bright and natural, reflecting a high-key academic and corporate atmosphere. The image maintains a crisp, modern aesthetic consistent with a sophisticated e-learning platform interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXyehYwpYyL7xr7XLhLrfThiA0I_ajKeXBKBbI09n1j7UFzIX7cEbOI5ftGNguD33g8lCimKP8HvjyvJz-KASl-9p4DVet4dDC_qIeK0BqvzN_vbuakmhEGQ2tu5KK0v1gZWVerG7UlqoW8J8usTbyarnXNnSFYapqD63i21yBjIaHCiODzlKJCU0e_9a4f3FOFA6HBl6d24hI-tsc3H-Z8rNC0trCNADJZY21ig02XsO-l-VXpkJtnuAma1T7Bvzr10EYo114a9-S"/>
</div>
</div>
</header>
<!-- SideNavBar -->
<aside class="fixed left-0 top-16 h-[calc(100vh-64px)] w-64 flex flex-col p-4 gap-2 bg-white dark:bg-slate-900 border-r border-gray-200 dark:border-gray-800 font-manrope text-sm font-medium">
<div class="flex items-center gap-3 px-2 mb-6">
<div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
<span class="material-symbols-outlined text-blue-700" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
</div>
<div>
<h2 class="text-lg font-semibold text-gray-900 dark:text-white leading-tight">Learning Assistant</h2>
<p class="text-xs text-green-600 flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-500"></span>Online to help</p>
</div>
</div>
<button class="w-full py-3 px-4 bg-primary-container text-white rounded-lg font-semibold flex items-center justify-center gap-2 mb-4 hover:opacity-90 transition-all active:scale-[0.98]">
<span class="material-symbols-outlined text-sm">add</span>
            New Discussion
        </button>
<nav class="flex-1 space-y-1">
<a class="cursor-pointer flex items-center gap-3 px-4 py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg hover:translate-x-1 transition-transform duration-200" href="#">
<span class="material-symbols-outlined">chat</span>
                Current Chat
            </a>
<a class="cursor-pointer flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 rounded-lg hover:translate-x-1 transition-transform duration-200" href="#">
<span class="material-symbols-outlined">history</span>
                History
            </a>
<a class="cursor-pointer flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 rounded-lg hover:translate-x-1 transition-transform duration-200" href="#">
<span class="material-symbols-outlined">person</span>
                Account Info
            </a>
<a class="cursor-pointer flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 rounded-lg hover:translate-x-1 transition-transform duration-200" href="#">
<span class="material-symbols-outlined">quiz</span>
                Common Issues
            </a>
<a class="cursor-pointer flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 rounded-lg hover:translate-x-1 transition-transform duration-200" href="#">
<span class="material-symbols-outlined">help_center</span>
                Help Center
            </a>
</nav>
</aside>
<!-- Main Content: Chat Interface -->
<main class="ml-64 mt-16 p-8 min-h-[calc(100vh-64px)] flex flex-col items-center bg-background">
<div class="w-full max-w-[800px] flex flex-col h-[calc(100vh-128px)]">
<!-- Chat Thread -->
<div class="flex-1 overflow-y-auto space-y-6 pb-8 scrollbar-hide">
<!-- Welcome/Status Card -->
<div class="bg-white border border-outline-variant p-6 rounded-lg shadow-sm mb-8 text-center">
<h3 class="font-h3 text-h3 text-primary mb-2">How can I accelerate your learning today?</h3>
<p class="text-on-surface-variant font-body-md">I'm your dedicated AI mentor, ready to help with course content, certificates, or platform navigation.</p>
</div>
<!-- AI Message -->
<div class="flex gap-4 max-w-[85%]">
<div class="w-8 h-8 rounded-full bg-blue-100 flex-shrink-0 flex items-center justify-center border border-blue-200">
<span class="material-symbols-outlined text-[18px] text-blue-700" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
</div>
<div class="bg-[#F0F5FF] p-4 rounded-xl rounded-tl-none border border-blue-100 shadow-sm">
<p class="text-on-surface font-body-md">Hello! I'm EduMentor AI. How can I assist you with your studies today? You can ask me things like how to update your profile or where to find your certificates.</p>
<span class="text-caption text-outline mt-2 block">10:24 AM</span>
</div>
</div>
<!-- User Message -->
<div class="flex gap-4 max-w-[85%] ml-auto flex-row-reverse">
<div class="w-8 h-8 rounded-full bg-surface-container-high flex-shrink-0 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">person</span>
</div>
<div class="bg-primary-container p-4 rounded-xl rounded-tr-none shadow-sm">
<p class="text-white font-body-md">How do I update my profile?</p>
<span class="text-caption text-blue-200 mt-2 block text-right">10:25 AM</span>
</div>
</div>
<!-- AI Message -->
<div class="flex gap-4 max-w-[85%]">
<div class="w-8 h-8 rounded-full bg-blue-100 flex-shrink-0 flex items-center justify-center border border-blue-200">
<span class="material-symbols-outlined text-[18px] text-blue-700" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
</div>
<div class="bg-[#F0F5FF] p-4 rounded-xl rounded-tl-none border border-blue-100 shadow-sm">
<p class="text-on-surface font-body-md">Updating your profile is simple! Navigate to the top right corner and click on your profile picture. Select "Settings" from the dropdown. From there, you can edit your name, bio, and educational goals. Don't forget to click "Save Changes" at the bottom of the page!</p>
<span class="text-caption text-outline mt-2 block">10:25 AM</span>
</div>
</div>
<!-- User Message -->
<div class="flex gap-4 max-w-[85%] ml-auto flex-row-reverse">
<div class="w-8 h-8 rounded-full bg-surface-container-high flex-shrink-0 flex items-center justify-center">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">person</span>
</div>
<div class="bg-primary-container p-4 rounded-xl rounded-tr-none shadow-sm">
<p class="text-white font-body-md">Where can I find my course certificates?</p>
<span class="text-caption text-blue-200 mt-2 block text-right">10:26 AM</span>
</div>
</div>
<!-- AI Message -->
<div class="flex gap-4 max-w-[85%]">
<div class="w-8 h-8 rounded-full bg-blue-100 flex-shrink-0 flex items-center justify-center border border-blue-200">
<span class="material-symbols-outlined text-[18px] text-blue-700" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
</div>
<div class="bg-[#F0F5FF] p-4 rounded-xl rounded-tl-none border border-blue-100 shadow-sm">
<p class="text-on-surface font-body-md">You can find all your earned certificates in the "Progress" tab located in the top navigation bar. Once there, scroll down to the "Completed Courses" section where you'll see a download icon next to each course you've finished.</p>
<div class="mt-3 flex gap-2">
<button class="text-caption bg-white px-3 py-1.5 rounded-lg border border-blue-200 text-blue-700 flex items-center gap-1 hover:bg-blue-50 transition-colors">
<span class="material-symbols-outlined text-[14px]">open_in_new</span> Go to Progress
                            </button>
</div>
<span class="text-caption text-outline mt-2 block">10:26 AM</span>
</div>
</div>
</div>
<!-- Suggestion Chips -->
<div class="flex gap-2 mb-4 overflow-x-auto pb-2 scrollbar-hide">
<button class="whitespace-nowrap px-4 py-2 bg-white border border-outline-variant rounded-full text-label-md text-on-surface-variant hover:border-primary hover:text-primary transition-all">Reset my password</button>
<button class="whitespace-nowrap px-4 py-2 bg-white border border-outline-variant rounded-full text-label-md text-on-surface-variant hover:border-primary hover:text-primary transition-all">View learning path</button>
<button class="whitespace-nowrap px-4 py-2 bg-white border border-outline-variant rounded-full text-label-md text-on-surface-variant hover:border-primary hover:text-primary transition-all">Contact instructor</button>
<button class="whitespace-nowrap px-4 py-2 bg-white border border-outline-variant rounded-full text-label-md text-on-surface-variant hover:border-primary hover:text-primary transition-all">Help with quizzes</button>
</div>
<!-- Input Area -->
<div class="bg-white border border-outline-variant rounded-xl p-2 shadow-lg ring-1 ring-black/5">
<div class="flex items-end gap-2 px-2 py-1">
<button class="p-2 text-outline hover:text-primary transition-colors rounded-lg">
<span class="material-symbols-outlined">attach_file</span>
</button>
<textarea class="flex-1 border-none focus:ring-0 bg-transparent py-2 px-2 resize-none min-h-[44px] max-h-[120px] font-body-md" placeholder="Type your question here..." rows="1"></textarea>
<div class="flex items-center gap-1 mb-1">
<button class="p-2 text-outline hover:text-primary transition-colors rounded-lg">
<span class="material-symbols-outlined">mic</span>
</button>
<button class="bg-primary-container text-white p-2 rounded-lg hover:opacity-90 transition-all flex items-center justify-center h-10 w-10">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<p class="text-center text-caption text-outline mt-3">EduMentor AI may occasionally provide inaccurate info. Verify important facts.</p>
</div>
</main>
</body></html>
