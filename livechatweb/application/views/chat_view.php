<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live Chat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js"></script>
    <script>
        var socket = io("http://localhost:3000"); 
        var currentUserId = "";

        // Register user
        function registerUser() {
            var userId = document.getElementById("userId").value.trim();
            if (userId !== "") {
                currentUserId = userId;
                socket.emit("registerUser", userId);
            } else {
                alert("Enter a valid User ID.");
            }
        }

        // Listen for registration confirmation
        socket.on("registrationSuccess", function(userId) {
            document.getElementById("status").innerText = "Registered as: " + userId;
        });

        // Send a message
        function sendMessage() {
            if (!currentUserId) {
                alert("Please register first!");
                return;
            }
            
            var receiver = document.getElementById("receiverId").value.trim();
            var message = document.getElementById("message").value.trim();

            if (receiver && message !== "") {
                socket.emit("privateMessage", { sender: currentUserId, receiver, message });
                displayMessage("You", message);
                document.getElementById("message").value = "";
            } else {
                alert("Please fill all fields!");
            }
        }

        // Display messages in the chat box
        function displayMessage(sender, message) {
            var chatBox = document.getElementById("chatBox");
            chatBox.innerHTML += `<p><strong>${sender}:</strong> ${message}</p>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Receive messages
        socket.on("receiveMessage", function(data) {
            if (data.receiver === currentUserId) {
                displayMessage(data.sender, data.message);
            }
        });

        // Handle error messages
        socket.on("errorMessage", function(message) {
            alert(message);
        });

    </script>
    <style>
        #chatBox {
            width: 300px;
            height: 200px;
            overflow-y: auto;
            border: 1px solid #000;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h3>Live Chat</h3>
    <p id="status">Not registered</p>
    <input type="text" id="userId" placeholder="Your User ID">
    <button onclick="registerUser()">Register</button>
    <br><br>
    
    <input type="text" id="receiverId" placeholder="Receiver User ID">
    <input type="text" id="message" placeholder="Type a message">
    <button onclick="sendMessage()">Send</button>

    <div id="chatBox"></div>
</body>
</html>
