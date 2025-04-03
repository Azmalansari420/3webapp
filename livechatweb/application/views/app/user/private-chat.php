<?php
$userid = $this->input->get('user_id');
$users = $this->db->get_where('users', array('id' => $userid))->result_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('include/allcss.php'); ?>
</head>

<style type="text/css">
    #chat-messages {
        list-style: none;
        padding: 10px;
        overflow-y: auto;
        max-height: 564px;
    }

    #chat-messages li {
        margin-bottom: 10px;
        display: flex;
        width: 100%;
    }

    .sent {
        justify-content: flex-end;
    }

    .received {
        justify-content: flex-start;
    }

    .message-box {
        max-width: 60%;
        padding: 10px;
        border-radius: 10px;
        word-wrap: break-word;
        font-size: 14px;
    }

    .sent .message-box {
        background-color: #dcf8c6;
        color: black;
        text-align: right;
    }

    .received .message-box {
        background-color: #b9b3b3;
        color: black;
        text-align: left;
        border: 1px solid #ddd;
    }
</style>

<body class="position-relative">
    <!-- header starts -->
    <header id="header" class="section-t-spacee main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel contact-panel">
                <div class="d-flex align-items-center gap-2">
                    <a href="javascript:void(0);">
                        <i class="iconsax icon-btn" data-icon="chevron-left"></i>
                    </a>
                    <a href="personal-info.html" class="profile-head">
                        <div class="profile-img">
                            <img class="img-fluid img" src="<?= base_url() ?>media/uploads/users/<?= $users[0]->profile_image ?>" alt="p1" onerror="this.src='<?= base_url() ?>assets/images/profile/p9.png'">
                        </div>
                        <div>
                            <h4 class="fw-semibold"><?= $users[0]->name ?></h4>
                            <h6 class="fw-normal text-white-75">Online</h6>
                        </div>
                    </a>
                </div>

                <div class="d-flex align-items-center gap-sm-3 gap-2">
                    <a href="tel:<?= $users[0]->mobile ?>">
                        <i class="iconsax icon-btn" data-icon="phone-add"></i>
                    </a>

                    <div class="dropdown more-options dropdown-menu-end">
                        <a class="btn dropdown-toggle mt-0 p-0" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="iconsax icon-btn" data-icon="menu-meatballs"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="personal-info.html" class="dropdown-item"><i class="iconsax icon" data-icon="group"></i> View Info</a></li>
                            <li><a href="#" class="dropdown-item"><i class="iconsax icon" data-icon="star"></i> Mute Notification</a></li>
                            <li><a href="#clear" data-bs-toggle="modal" class="dropdown-item"><i class="iconsax icon" data-icon="brush-2"></i> Clear Chat</a></li>
                            <li><a href="#block" data-bs-toggle="modal" class="dropdown-item error-color"><i class="iconsax icon error-icon" data-icon="shield-slash"></i> Block</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- private chat section starts -->
    <section class="section-lg-b-space position-relative pt-0">
        <img class="img-fluid chat-bg" src="<?= base_url() ?>assets/images/wallpaper/wallpaper0.png" alt="wallpaper">
        <div class="custom-container">
            <ul id="chat-messages" class="message-box-list"></ul>
        </div>
    </section>

    <!-- Message Input Section -->
    <div class="messages-panel">
        <form class="message-inputarea" onsubmit="sendMessage(); return false;">
            <input type="text" id="message-input" class="message-input" placeholder="Type here...">
            <a href="javascript:void(0);" class="message-send-btn" onclick="sendMessage()">
                <i class="iconsax icon-btn" data-icon="send-2"></i>
            </a>
        </form>
    </div>

    <?php include('include/allscript.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js"></script>
    <script>
        var socket = io("http://localhost:3000"); 
        var currentUserId = "<?= $full_detail->id ?>"; 

        socket.emit("registerUser", currentUserId);

        function sendMessage() {
            var message = document.getElementById("message-input").value.trim();
            var receiver = "<?= $userid ?>"; 
            var messageId = Date.now(); 

            if (message !== "") {
                socket.emit("privateMessage", { sender: currentUserId, receiver, message, messageId });
                displayMessage("You", message, true, "sent", messageId);
                document.getElementById("message-input").value = "";
            }
        }

        function displayMessage(sender, message, isSender, status, messageId) {
            var chatBox = document.getElementById("chat-messages");
            var alignmentClass = isSender ? "sent" : "received"; 
            var tickIcon = isSender ? getTickIcon(status) : ""; 

            var messageHTML = `
                <li class="${alignmentClass}" id="msg-${messageId}">
                    <div class="message-box">
                        <h5>${sender}</h5>
                        <p>${message}</p>
                        <span class="tick-icon">${tickIcon}</span>
                    </div>
                </li>
            `;

            chatBox.innerHTML += messageHTML;
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function getTickIcon(status) {
            switch (status) {
                case "sent":
                    return `<span style="color: gray;">✔️</span>`;
                case "delivered":
                    return `<span style="color: gray;">✔✔</span>`;
                case "read":
                    return `<span style="color: lightblue;">✔✔</span>`;
                default:
                    return "";
            }
        }

        socket.on("receiveMessage", function (data) {
            displayMessage(data.sender, data.message, false, "delivered", data.messageId);
            socket.emit("messageRead", { messageId: data.messageId, sender: data.sender });
        });

        socket.on("messageStatus", function ({ messageId, status }) {
            console.log(`🔄 Updating message ${messageId} status to: ${status}`);
            var tickElement = document.querySelector(`#msg-${messageId} .tick-icon`);
            if (tickElement) {
                tickElement.innerHTML = getTickIcon(status);
            }
        });

        function loadChatHistory() {
            var receiverId = "<?= $userid ?>"; 

            fetch(`<?= base_url() ?>chat/loadChatHistory?user_id=${receiverId}`)
                .then(response => response.json())
                .then(messages => {
                    document.getElementById("chat-messages").innerHTML = ""; 
                    messages.forEach(msg => {
                        var isSender = msg.sender_id == "<?= $full_detail->id ?>";
                        displayMessage(msg.sender_id, msg.message, isSender, msg.status, msg.id);
                    });
                });
        }

        window.onload = loadChatHistory;
    </script>
</body>
</html>
