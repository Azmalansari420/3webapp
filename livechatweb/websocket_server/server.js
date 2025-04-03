const express = require("express");
const http = require("http");
const socketIo = require("socket.io");
const cors = require("cors");
const mysql = require("mysql");
const WebSocket = require('ws');

const app = express();
app.use(cors());

const server = http.createServer(app);
const io = socketIo(server, {
    cors: { origin: "*", methods: ["GET", "POST"] }
});

// Database Connection
const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "livechatweb"
});

db.connect((err) => {
    if (err) throw err;
    console.log("✅ MySQL Connected!");
});

let users = {}; // Store user IDs with their socket IDs
let offlineMessages = {}; // Store messages for offline users
let messageStatus = {}; // Track message statuses

io.on("connection", (socket) => {
    console.log("🔗 User connected:", socket.id);

    // Register User
    socket.on("registerUser", (userId) => {
        users[userId] = socket.id;
        console.log(`✅ User ${userId} registered with socket ID: ${socket.id}`);

        io.emit("updateActiveUsers", Object.keys(users));

        // Deliver offline messages if any
        if (offlineMessages[userId]) {
            offlineMessages[userId].forEach((msg) => {
                if (users[msg.sender]) {
                    io.to(users[msg.sender]).emit("messageStatus", { messageId: msg.messageId, status: "delivered" });
                }
                socket.emit("receiveMessage", msg);
            });
            delete offlineMessages[userId];
        }

        socket.emit("registrationSuccess", userId);
    });

    // Handle Private Messages
    socket.on("privateMessage", ({ sender, receiver, message, messageId }) => {
        console.log(`📩 Message from ${sender} to ${receiver}: ${message}`);

        // Save message to database
        let sql = `INSERT INTO messages (sender_id, receiver_id, message, status) VALUES (?, ?, ?, 'sent')`;
        db.query(sql, [sender, receiver, message], (err, result) => {
            if (err) throw err;
            console.log("✅ Message saved!");

            // Initially, mark the message as sent (✔️)
            messageStatus[messageId] = "sent";
            io.to(users[sender]).emit("messageStatus", { messageId, status: "sent" });

            if (users[receiver]) {
                io.to(users[receiver]).emit("receiveMessage", { sender, receiver, message, messageId });

                // Mark as delivered (✔✔) and notify sender
                messageStatus[messageId] = "delivered";
                io.to(users[sender]).emit("messageStatus", { messageId, status: "delivered" });

                // Update status in database
                let updateSql = `UPDATE messages SET status='delivered' WHERE sender_id=? AND receiver_id=? AND status='sent'`;
                db.query(updateSql, [sender, receiver]);
            } else {
                // Store message for offline users
                if (!offlineMessages[receiver]) {
                    offlineMessages[receiver] = [];
                }
                offlineMessages[receiver].push({ sender, receiver, message, messageId });
            }
        });
    });

    // Ensure messageRead updates the correct message
        socket.on("messageRead", ({ messageId, sender }) => {
            if (!messageId || !sender) return;

            let sql = `UPDATE messages SET status='read' WHERE id=?`;
            db.query(sql, [messageId], (err) => {
                if (!err) {
                    if (users[sender]) {
                        io.to(users[sender]).emit("messageStatus", { messageId, status: "read" });
                    }
                }
            });
        });


    // Handle User Disconnect
    socket.on("disconnect", () => {
        let disconnectedUser = null;
        for (let userId in users) {
            if (users[userId] === socket.id) {
                disconnectedUser = userId;
                console.log(`❌ User ${userId} disconnected.`);
                delete users[userId];
                break;
            }
        }

        io.emit("updateActiveUsers", Object.keys(users));
    });
});

server.listen(3000, () => {
    console.log("🚀 WebSocket server running on port 3000");
});
