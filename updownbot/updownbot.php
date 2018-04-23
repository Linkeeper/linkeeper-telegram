<?php

require_once './vendor/autoload.php';

use TelegramBot\Api\BotApi; // carregando a classe BotApi do TelegramBot
use GuzzleHttp\Client; // carregando a classe Client do GuzzleHttp

$client = new Client(); // criando nova instância do GuzzleHttp
$url = 'https://linkeeper.in'; // url do sistema
$botId = getenv("telegram_bot_id"); // id do bot do Telegram
$chatId = getenv("telegram_chat_id"); // id do chat do Telegram
  
try {
    $res = $client->request('GET', $url); // realizando uma requisição GET na URL
    $responseCode = $res->getStatusCode(); // retornando o Status Code da requisição

    exit;
} catch (GuzzleHttp\Exception\ClientException $e){ // capturando o Response Code caso o sistema retorne 404
    $bot = new BotApi($botId); // cria nova instância da classe do BotApi
    $bot->sendMessage($chatId, 'O sistema ' . $url . ' está fora do ar'); // envia a mensagem no Telegram

    exit;
}
