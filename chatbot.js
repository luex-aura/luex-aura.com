const apiKey = "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"; // Replace with your real API key

async function sendMessage() {
  const inputField = document.getElementById("user-input");
  const userText = inputField.value;
  if (!userText.trim()) return;

  appendMessage("You", userText, "user-message");
  inputField.value = "";

  const response = await fetch("https://api.openai.com/v1/chat/completions", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${apiKey}`,
    },
    body: JSON.stringify({
      model: "gpt-3.5-turbo",
      messages: [{ role: "user", content: userText }]
    })
  });

  const data = await response.json();
  const botReply = data.choices[0].message.content;
  appendMessage("Bot", botReply, "bot-message");
}

function appendMessage(sender, message, className) {
  const chatBox = document.getElementById("chat-box");
  const messageDiv = document.createElement("div");
  messageDiv.classList.add(className);
  messageDiv.textContent = message;
  chatBox.appendChild(messageDiv);
  chatBox.scrollTop = chatBox.scrollHeight;
}async function sendMessage() {
    const inputField = document.getElementById("user-input");
    const userText = inputField.value.trim();
    if (!userText) return;
  
    appendMessage("You", userText, "user-message");
    inputField.value = "";
  
    const response = await fetch("chatbot.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ message: userText })
    });
  
    const data = await response.json();
    const botReply = data.choices[0].message.content;
    appendMessage("Bot", botReply, "bot-message");
  }
  
