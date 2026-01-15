<div id="chatbot" class="fixed bottom-5 right-5 w-80 bg-white shadow-xl rounded-xl overflow-hidden z-50">
    <div class="bg-blue-600 text-white px-4 py-2 font-semibold">🤖 Job Assistant</div>

    <div id="chat-messages" class="p-3 h-64 overflow-y-auto text-sm space-y-2">
        <div class="bg-gray-100 p-2 rounded">Hello! How can I help you today?</div>
    </div>

    <div class="flex border-t">
        <input id="chat-input" type="text" class="flex-1 px-3 py-2 outline-none text-sm"
            placeholder="Type your message..." />
        <button onclick="sendMessage()" class="bg-blue-600 text-white px-4">Send</button>
    </div>
</div>

<script>
function sendMessage() {
    let input = document.getElementById('chat-input');
    let message = input.value.trim();
    if (!message) return;

    let chatBox = document.getElementById('chat-messages');

    chatBox.innerHTML += `<div class="text-right"><div class="inline-block bg-blue-500 text-white p-2 rounded">${message}</div></div>`;
    input.value = '';

    fetch("{{ route('ai.chat') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ message })
    })
    .then(res => res.json())
    .then(data => {
        chatBox.innerHTML += `<div class="text-left"><div class="inline-block bg-gray-200 p-2 rounded">${data.reply}</div></div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    });
}
</script>
