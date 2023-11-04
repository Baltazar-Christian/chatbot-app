<?php
// app/Conversations/ExampleConversation.php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
    public function run()
    {
        $this->ask('What is your name?', function ($answer) {
            $name = $answer->getText();
            $this->say("Nice to meet you, $name!");
        });
    }
}
