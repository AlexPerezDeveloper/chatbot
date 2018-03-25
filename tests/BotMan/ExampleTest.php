<?php

namespace Tests\BotMan;

use Illuminate\Foundation\Inspiring;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->bot
            ->receives('Hi')
            ->assertReply('Hello!');
    }

    /**
     * A conversation test example.
     *
     * @return void
     */
    public function testConversationBasicTest()
    {
        $quotes = [
            'When there is no desire, all things are at peace. - Laozi',
           
        ];

        $this->bot
            ->receives('Buenas')
            ->assertQuestion('Bienvenido a SupoortChat. ¿En qué te puedo ayudar?')
            ->receivesInteractiveMessage('quote')
            ->assertReplyIn($quotes);
    }
}
