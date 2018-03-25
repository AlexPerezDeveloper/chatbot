<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Bienvenido a soporteChat!, soy Botteman. ¿En qué te puedo ayudar?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Incidencia')->value('incidencia'),
                Button::create('Consulta')->value('consulta'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'incidencia') {
                    $inci = "Mmm...Podrías describirme tu incidencia? Recuerda aportar todos los datos posibles";
                    //$joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($inci);


                } else {
                    $this->askReason2();
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }


    public function askReason2()
    {
        $consulta = Question::create("Bien, elige una de estas opciones.")
        ->fallback('Unable to ask question')
        ->callbackId('ask_reason_2')
        ->addButtons([
            Button::create('Otra consulta1')->value('consulta1'),
            Button::create('Otra consulta2')->value('consulta2'),
        ]);
            /*********** SUB PREGUNTA *************/
            
            return $this->ask($consulta, function (Answer $answer1) {
                if ($consulta->isInteractiveMessageReply()) {
                    if ($answer1->getValue() === 'consulta1') {
                        $c1 = "Has pulsado la consulta 1";
                        $this->say($c1);


                    } else if ($answer1->getValue() === 'consulta2') {
                        $c2 = "Has pulsado la consulta 2";
                        $this->say($c2);

                    }
                }
            });
    }
        /************END SUB PREGUNTA ***********/




}
