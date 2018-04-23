<?php

require_once './vendor/autoload.php';

use TelegramBot\Api\BotApi; // carregando a classe BotApi do TelegramBot
use GuzzleHttp\Client; // carregando a classe Client do GuzzleHttp

$client = new Client(); // criando nova instância do GuzzleHttp
$url = 'https://linkeeper.in'; // url do sistema
$botId = getenv("LINKEEPER_TELEGRAM_BOT_ID"); // id do bot do Telegram
$chatId = getenv("LINKEEPER_TELEGRAM_CHAT_ID"); // id do chat do Telegram
  
try {
    $res = $client->request('GET', $url); // realizando uma requisição GET na URL
    $responseCode = $res->getStatusCode(); // retornando o Status Code da requisição

    exit;
} catch (GuzzleHttp\Exception\ClientException | GuzzleHttp\Exception\ConnectException  $e){ // capturando o Response Code caso o sistema retorne 404
    $bot = new BotApi($botId); // cria nova instância da classe do BotApi
    $bot->sendMessage($chatId, 'O sistema ' . $url . ' está fora do ar'); // envia a mensagem no Telegram

    exit;
}
