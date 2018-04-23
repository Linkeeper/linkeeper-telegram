# linkeeper-telegram
Useful bots for issuing alerts 

## Usage - Updownbot

1. Export `LINKEEPER_TELEGRAM_BOT_ID`and `LINKEEPER_TELEGRAM_CHAT_ID` to the environment variables. E.g.:

```
/etc/environment

export LINKEEPER_TELEGRAM_BOT_ID=<your_bot_token>
export LINKEEPER_TELEGRAM_CHAT_ID=<your_chat_id>
```

2. Change `$url` on `updownbot/updownbot.php` to the website/system URL which it's desired to check if it's up or down.

3. Add a php call to the script on crontab for continuous monitoring (optional). E.g.:

```
# crontab -e

# Call the script every 5 minutes
*/5 * * * * php /path.to/linkeeper-telegram/updownbot/updownbot.php
```

That's it! The bot will notify if the website/system is down as soon as the script is called and the result is returned. 
