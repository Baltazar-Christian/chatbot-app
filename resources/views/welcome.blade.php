<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chat-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .chat-messages {
            height: 300px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="chat-container">
                    <div class="chat-messages" id="chat-messages">
                        <!-- Chat messages will be displayed here -->
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="user-input" placeholder="Type a message...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="send-button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#send-button").on("click", function() {
                sendMessage();
            });

            $("#user-input").on("keypress", function(e) {
                if (e.keyCode === 13) {
                    sendMessage();
                }
            });

            function sendMessage() {
                const userMessage = $("#user-input").val();
                if (userMessage) {
                    // Display user message
                    $("#chat-messages").append(`<div class="user-message">${userMessage}</div>`);

                    // Send user message to the server (via an AJAX request)
                    $.post("/botman", { message: userMessage }, function(response) {
                        // Display chatbot response
                        $("#chat-messages").append(`<div class="bot-message">${response}</div>`);
                        // Scroll to the latest message
                        $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
                    });

                    // Clear user input
                    $("#user-input").val("");
                }
            }
        });
    </script>
</body>
</html>
