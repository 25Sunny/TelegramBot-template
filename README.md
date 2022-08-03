# Telegram bot template

## Prerequisites

What software you need to install and how to install it

### Install Docker (skip this step if you already have Docker)

Install [Docker](https://docs.docker.com/install/)

[How to install Docker on Ubuntu](https://docs.docker.com/engine/install/ubuntu/)

[How to install Docker on Windows](https://docs.docker.com/desktop/install/windows-install/)

[How to install Docker on Mac](https://docs.docker.com/desktop/install/mac-install/)


Reboot system to apply changes

## Install Docker Compose (skip this step if you already have Docker Compose)

Install [Docker Compose](https://docs.docker.com/compose/install/)

## Run project with Docker

run docker compose
```
docker-compose up -d --build
```

install composer libraries
```bash
docker-compose exec --user $(id -u):$(id -g) php composer install
```

## Project resources

Project http://localhost:8080
___


## Create Telegram bot

### create bot

Find bot [BotFather](https://t.me/BotFather) and send 
> /newbot

follow the instructions of the BotFather

### add callback url
set your #TOKEN# and #CALLBACK_URL#
```
 https://api.telegram.org/bot#TOKEN#/setWebhook?url=#CALLBACK_URL#
```
open the resulting link in a browser

# DONE 🎉
