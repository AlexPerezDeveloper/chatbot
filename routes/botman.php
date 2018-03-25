<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');
/*
$botman->hears('Hola', function ($bot) {
    $bot->reply('Buenas! ¿En qué puedo ayudarte?');
});

$botman->hears('no me funciona el movil', function ($bot) {
    $bot->reply('Oh vaya! ¿Podrías darme más información?');
});*/


$botman->fallback(function($bot) {
    $bot->reply('Ups!. Eso no lo he entendido, soy un robot.');
});

$botman->hears('Buenas', BotManController::class.'@startConversation');
