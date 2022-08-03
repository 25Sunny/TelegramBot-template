<?php

namespace App\Controller;

use BotMan\BotMan\Cache\RedisCache;
use BotMan\Drivers\Telegram\TelegramAudioDriver;
use BotMan\Drivers\Telegram\TelegramContactDriver;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\Drivers\Telegram\TelegramFileDriver;
use BotMan\Drivers\Telegram\TelegramLocationDriver;
use BotMan\Drivers\Telegram\TelegramPhotoDriver;
use BotMan\Drivers\Telegram\TelegramVideoDriver;
use Symfony\Component\Dotenv\Dotenv;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Attachments\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TelegramController extends AbstractController
{
    #[Route('/telegram', name: 'app_telegram')]
    public function index(): JsonResponse
    {

        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');
        $dotenv->overload(__DIR__ . '/../../.env');

        $config = [
            "telegram" => [
                "token" => $_ENV['TELEGRAM_TOKEN']
            ]
        ];

        DriverManager::loadDriver(TelegramDriver::class);
        DriverManager::loadDriver(TelegramLocationDriver::class);
        DriverManager::loadDriver(TelegramFileDriver::class);
        DriverManager::loadDriver(TelegramPhotoDriver::class);
        DriverManager::loadDriver(TelegramAudioDriver::class);
        DriverManager::loadDriver(TelegramContactDriver::class);
        DriverManager::loadDriver(TelegramVideoDriver::class);
        $botman = BotManFactory::create($config, null);

        // Telegram Bot



        // Start listening
        $botman->listen();

        return $this->json([
            'message' => 'success',
            'path' => 'src/Controller/TelegramController.php',
        ]);
    }
}
