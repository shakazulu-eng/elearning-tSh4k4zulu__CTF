<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="{{ csrf_token() }}" name="csrf-token"/>
<title>AI Assistant Pro</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "inverse-on-surface": "#eef1f9",
                      "tertiary-fixed": "#ffdcc2",
                      "on-error": "#ffffff",
                      "primary-fixed": "#d1e4ff",
                      "primary-container": "#2196f3",
                      "inverse-primary": "#9ecaff",
                      "tertiary-fixed-dim": "#ffb77b",
                      "secondary-fixed-dim": "#c6c6c7",
                      "secondary": "#5d5f5f",
                      "outline": "#707883",
                      "on-secondary-container": "#616363",
                      "surface-dim": "#d7dae2",
                      "tertiary": "#904d00",
                      "surface-container": "#ebeef6",
                      "primary-fixed-dim": "#9ecaff",
                      "surface": "#f8f9ff",
                      "secondary-fixed": "#e2e2e2",
                      "error-container": "#ffdad6",
                      "on-error-container": "#93000a",
                      "on-primary-container": "#002c4f",
                      "error": "#ba1a1a",
                      "surface-container-high": "#e5e8f0",
                      "primary": "#0061a4",
                      "surface-container-low": "#f1f3fc",
                      "surface-variant": "#dfe2ea",
                      "on-primary-fixed-variant": "#00497d",
                      "on-tertiary-fixed-variant": "#6d3900",
                      "on-background": "#181c22",
                      "background": "#f8f9ff",
                      "secondary-container": "#dfe0e0",
                      "surface-container-lowest": "#ffffff",
                      "on-surface-variant": "#404752",
                      "tertiary-container": "#db7900",
                      "surface-container-highest": "#dfe2ea",
                      "on-secondary": "#ffffff",
                      "on-primary": "#ffffff",
                      "on-secondary-fixed-variant": "#454747",
                      "on-tertiary-container": "#452200",
                      "on-secondary-fixed": "#1a1c1c",
                      "on-surface": "#181c22",
                      "inverse-surface": "#2d3137",
                      "surface-bright": "#f8f9ff",
                      "on-tertiary": "#ffffff",
                      "on-tertiary-fixed": "#2e1500",
                      "outline-variant": "#bfc7d4",
                      "on-primary-fixed": "#001d36",
                      "surface-tint": "#0061a4"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "xs": "4px",
                      "xl": "32px",
                      "unit": "4px",
                      "sm": "8px",
                      "md": "16px",
                      "container-max": "800px",
                      "gutter": "20px",
                      "lg": "24px"
              },
              "fontFamily": {
                      "code": ["monospace"],
                      "h2": ["Manrope"],
                      "body-sm": ["Inter"],
                      "body-md": ["Inter"],
                      "h1": ["Manrope"],
                      "label-caps": ["Inter"]
              },
              "fontSize": {
                      "code": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "h2": ["18px", {"lineHeight": "24px", "fontWeight": "600"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "h1": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "label-caps": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
              }
            },
          },
        }
    </script>
<style>
        .custom-shadow { box-shadow: 0px 4px 12px rgba(33, 150, 243, 0.08); }
        .user-bubble { background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #dfe2ea; border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col">
<!-- TopAppBar from Shared Components -->
<header class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-lg py-md max-w-container-max mx-auto bg-surface dark:bg-background">
<div class="flex items-center gap-md">
<span class="text-h2 font-h2 font-bold text-primary dark:text-primary-fixed">AI Assistant 🤖</span>
</div>
<div class="flex items-center gap-md">
<button class="material-symbols-outlined p-sm rounded-full text-secondary hover:bg-surface-variant/50 transition-colors active:scale-95">history</button>
<button class="material-symbols-outlined p-sm rounded-full text-secondary hover:bg-surface-variant/50 transition-colors active:scale-95">settings</button>
<div class="h-8 w-8 rounded-full overflow-hidden bg-surface-container-high border border-outline-variant">
<img alt="User Profile" data-alt="A professional profile avatar of a young creative professional in a clean, minimalist studio setting. The lighting is soft and high-key, emphasizing a light-blue and white color palette that matches the corporate minimalist UI. The background is a soft, blurred gradient of sky blue and ivory, conveying a sense of modern approachable professionalism." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrRR966uFlE2fNFc4VPbV7h_K58LXyyqx64mCoJnzF2I5Pyxsv-gr0_CWkrxSxfKUVFTYHQOJlsuKgyx4CQlND8-xlqSI9aFqntr8qdlKFlOIfpHLlFdMRCc8L74dYCkiUMd55dZrlKyfoovRe-anCDk9dzPBRdt-Faiem2eI0qTdvaBOawBHYwtn_9noS_XRS2rJScIfRgJy6ikMOIOZ-pdyBZ5ay8mNK1emZDLsJZ8tq9Czq-m24L_Ca9TDAxIqXFwmcNUYyi2g"/>
</div>
</div>
</header>
<!-- SideNavBar (Hidden on Mobile) -->
<aside class="hidden lg:flex flex-col h-screen p-md overflow-y-auto bg-surface-container dark:bg-surface-container-high h-full w-64 fixed left-0 top-0 pt-24">
<div class="mb-lg px-md">
<h2 class="font-h1 text-h1 font-bold text-on-surface">Assistant Pro</h2>
<p class="text-body-sm text-on-surface-variant">Enterprise Edition</p>
</div>
<nav class="flex-1 space-y-xs">
<a class="flex items-center gap-md px-md py-sm bg-primary-container text-on-primary-container rounded-lg font-bold transition-transform active:scale-98" href="#">
<span class="material-symbols-outlined">add_comment</span>
<span class="font-body-md">New Chat</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors active:scale-98" href="#">
<span class="material-symbols-outlined">history</span>
<span class="font-body-md">History</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors active:scale-98" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-body-md">Templates</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors active:scale-98" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-body-md">Settings</span>
</a>
</nav>
<div class="mt-auto space-y-xs">
<button class="w-full py-sm px-md mb-md bg-primary text-on-primary rounded-xl font-bold hover:brightness-90 transition-all">Upgrade to Plus</button>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">help</span>
<span>Help</span>
</a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">logout</span>
<span>Logout</span>
</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 flex flex-col pt-20 pb-32 lg:ml-64">
<!-- Chat Stream -->
<div class="flex-1 w-full max-w-container-max mx-auto px-md lg:px-lg flex flex-col gap-lg overflow-y-auto" id="chat-box">
<!-- AI Message -->
<div class="flex flex-col items-start gap-sm group">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container">
<span class="material-symbols-outlined text-[18px]">smart_toy</span>
</div>
<span class="text-label-caps text-secondary uppercase">Assistant</span>
</div>
<div class="max-w-[85%] bg-surface-container-lowest border border-surface-variant px-md py-md rounded-2xl rounded-tl-none text-on-surface">
                    Hello! I'm your AI Assistant. How can I help you today? I can assist with writing, coding, or just having a friendly conversation.
                </div>
<div class="flex items-center gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">thumb_up</button>
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">thumb_down</button>
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">content_copy</button>
</div>
</div>
<!-- User Message -->
<div class="flex flex-col items-end gap-sm group">
<div class="max-w-[85%] user-bubble text-on-primary px-md py-md rounded-2xl rounded-tr-none custom-shadow">
                    Can you help me design a modern UI layout for a chat application?
                </div>
<span class="text-label-caps text-secondary uppercase">You</span>
</div>
<!-- AI Message -->
<div class="flex flex-col items-start gap-sm group">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container">
<span class="material-symbols-outlined text-[18px]">smart_toy</span>
</div>
<span class="text-label-caps text-secondary uppercase">Assistant</span>
</div>
<div class="max-w-[85%] bg-surface-container-lowest border border-surface-variant px-md py-md rounded-2xl rounded-tl-none text-on-surface">
<p class="mb-sm">Certainly! A modern chat UI should focus on:</p>
<ul class="list-disc ml-md space-y-xs text-body-sm">
<li>Spacious bubble-style messages with clear separation</li>
<li>Soft shadows and subtle tonal layering for depth</li>
<li>High-contrast primary actions for better usability</li>
<li>Contextual feedback (like thumbs up/down) that appears on hover</li>
</ul>
</div>
<div class="flex items-center gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">thumb_up</button>
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">thumb_down</button>
<button class="material-symbols-outlined text-secondary text-[16px] p-1 hover:bg-surface-variant rounded-md">content_copy</button>
</div>
</div>
</div>
<!-- Suggestion Chips -->
<div class="w-full max-w-container-max mx-auto px-md lg:px-lg mt-md flex flex-wrap gap-sm">
<button class="px-md py-xs bg-surface-container-lowest border border-primary text-primary rounded-full text-body-sm hover:bg-primary-fixed/30 transition-colors">Show more examples</button>
<button class="px-md py-xs bg-surface-container-lowest border border-primary text-primary rounded-full text-body-sm hover:bg-primary-fixed/30 transition-colors">What colors should I use?</button>
<button class="px-md py-xs bg-surface-container-lowest border border-primary text-primary rounded-full text-body-sm hover:bg-primary-fixed/30 transition-colors">Explain spacing</button>
</div>
</main>
<!-- Bottom Input Bar -->
<div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-background/80 backdrop-blur-md pt-md pb-xl">
<div class="max-w-container-max mx-auto px-md lg:px-lg">
<div class="relative flex items-center bg-surface-container-lowest rounded-full border border-surface-variant custom-shadow focus-within:ring-2 focus-within:ring-primary/15 focus-within:border-primary transition-all">
<button class="material-symbols-outlined p-md text-secondary hover:text-primary transition-colors">add_circle</button>
<input class="w-full bg-transparent border-none focus:ring-0 py-md px-sm text-body-md text-on-surface placeholder:text-on-surface-variant/50" id="message" placeholder="Ask me anything..." type="text"/>
<div class="flex items-center gap-sm pr-sm">
<button class="material-symbols-outlined p-sm text-secondary hover:text-primary transition-colors">mic</button>
<button class="bg-primary text-on-primary h-10 w-10 flex items-center justify-center rounded-full custom-shadow hover:brightness-110 active:scale-95 transition-all" onclick="sendMessage()">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
<p class="text-center text-[10px] text-on-surface-variant/60 mt-xs font-body-sm">AI Assistant may provide inaccurate information. Verify important details.</p>
</div>
</div>
<script>
        function sendMessage() {
            const messageInput = document.getElementById('message');
            const chatBox = document.getElementById('chat-box');
            const messageText = messageInput.value.trim();

            if (messageText === '') return;

            // Append User Message
            const userDiv = document.createElement('div');
            userDiv.className = 'flex flex-col items-end gap-sm group';
            userDiv.innerHTML = `
                <div class="max-w-[85%] user-bubble text-on-primary px-md py-md rounded-2xl rounded-tr-none custom-shadow">
                    ${messageText}
                </div>
                <span class="text-label-caps text-secondary uppercase">You</span>
            `;
            chatBox.appendChild(userDiv);

            // Clear Input
            messageInput.value = '';

            // Scroll to bottom
            chatBox.scrollTop = chatBox.scrollHeight;

            // Simulate AI Typing
            const typingDiv = document.createElement('div');
            typingDiv.className = 'flex flex-col items-start gap-sm';
            typingDiv.innerHTML = `
                <div class="flex items-center gap-sm">
                    <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container">
                        <span class="material-symbols-outlined text-[18px]">smart_toy</span>
                    </div>
                    <span class="text-label-caps text-secondary uppercase">Assistant</span>
                </div>
                <div class="bg-surface-container-lowest border border-surface-variant px-md py-md rounded-2xl rounded-tl-none flex gap-1">
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse delay-75"></div>
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse delay-150"></div>
                </div>
            `;
            chatBox.appendChild(typingDiv);
            chatBox.scrollTop = chatBox.scrollHeight;

            // Send to server (Simplified logic as per instructions)
            fetch('/ai-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: messageText })
            })
            .then(response => response.json())
            .then(data => {
    chatBox.removeChild(typingDiv);

   // let reply = "No response from AI"; nikaweka 
                        let reply = data.reply;
              



   /* if (data.decoded && data.decoded.choices) {
        reply = data.decoded.choices[0].message.content;
    } else if (data.error) {
        reply = "Error: " + data.error;
    }*/
//nikaweka 
      if (!reply) {
    reply = data.error || "No response from AI";
}





    const aiDiv = document.createElement('div');
    aiDiv.className = 'flex flex-col items-start gap-sm group';
    aiDiv.innerHTML = `
        <div class="flex items-center gap-sm">
            <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container">
                <span class="material-symbols-outlined text-[18px]">smart_toy</span>
            </div>
            <span class="text-label-caps text-secondary uppercase">Assistant</span>
        </div>
        <div class="max-w-[85%] bg-surface-container-lowest border border-surface-variant px-md py-md rounded-2xl rounded-tl-none text-on-surface">
            ${reply}
        </div>
    `;

    chatBox.appendChild(aiDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
})
        }

        // Allow Enter key to send
        document.getElementById('message').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body></html>
