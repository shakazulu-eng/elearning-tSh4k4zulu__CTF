
<h2>AI Assistant (Course Based)</h2>

<div id="chatBox" style="border:1px solid #ccc;height:300px;overflow:auto;padding:10px"></div>

<input type="text" id="msg" placeholder="Ask AI..." style="width:80%">
<button onclick="send()">Send</button>

<script>
async function send() {
    let message = document.getElementById('msg').value;

    let res = await fetch('/ai/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({message})
    });

    let data = await res.json();

    document.getElementById('chatBox').innerHTML +=
        "<p><b>You:</b> " + message + "</p>" +
        "<p><b>AI:</b> " + data.answer + "</p>";

    document.getElementById('msg').value = '';
}
</script>
