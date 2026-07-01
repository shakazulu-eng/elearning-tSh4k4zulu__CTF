<!DOCTYPE html>
<html>
<head>
    <title>Public AI Assistant</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

        body{
            font-family:Arial,Helvetica,sans-serif;
            background:#f5f5f5;
            margin:0;
        }

        .header{
            background:#2563eb;
            color:white;
            padding:18px;
            text-align:center;
            font-size:22px;
            font-weight:bold;
        }

        .chat-box{

            width:90%;
            max-width:900px;

            height:500px;

            margin:20px auto;

            background:white;

            overflow-y:auto;

            border-radius:10px;

            box-shadow:0 0 10px rgba(0,0,0,.2);

            padding:20px;

        }

        .user{

            background:#2563eb;
            color:white;
            padding:10px;
            border-radius:10px;
            margin:10px 0;
            width:fit-content;
            margin-left:auto;

        }

        .bot{

            background:#e5e7eb;
            padding:10px;
            border-radius:10px;
            margin:10px 0;
            width:fit-content;
            max-width:80%;

        }

        .input-area{

            width:90%;
            max-width:900px;

            margin:auto;

            display:flex;

            gap:10px;

        }

        input{

            flex:1;

            padding:15px;

            font-size:16px;

        }

        button{

            background:#2563eb;

            color:white;

            border:none;

            padding:15px 25px;

            cursor:pointer;

        }

    </style>

</head>

<body>

<div class="header">

Public AI Assistant

</div>

<div id="chat" class="chat-box">

<div class="bot">

Hello 👋

Welcome to our E-Learning System.

Ask me about:

✔ Payments

✔ Registration

✔ Courses

</div>

</div>

<div class="input-area">

<input
id="message"
placeholder="Type your question...">

<button onclick="sendMessage()">

Send

</button>

</div>

<script>

function sendMessage(){

let message=document.getElementById("message").value;

if(message=="") return;

let chat=document.getElementById("chat");

chat.innerHTML+=`
<div class="user">${message}</div>
`;

fetch("/assistant/chat",{

method:"POST",

headers:{

'Content-Type':'application/json',

'X-CSRF-TOKEN':'{{ csrf_token() }}'

},

body:JSON.stringify({

message:message

})

})

.then(res=>res.json())

.then(data=>{

chat.innerHTML+=`
<div class="bot">${data.reply}</div>
`;

chat.scrollTop=chat.scrollHeight;

});

document.getElementById("message").value="";

}

</script>

</body>

</html>
