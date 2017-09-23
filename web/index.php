<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
$logger = new Logger('LineBot');
$logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV["LINEBOT_ACCESS_TOKEN"]);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV["LINEBOT_CHANNEL_SECRET"]]);
$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

$outputText = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("text message");
$bot->replyMessage($event->getReplyToken(), $outputText);
