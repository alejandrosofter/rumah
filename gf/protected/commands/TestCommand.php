<?php 

class TestCommand extends CConsoleCommand
{
    public function run($args)
    {
       Mensajes::model()->enviarMail('alejandro@foxis.com.ar', 'holaa!', 'desde cron', 'soporte@foxis.com.ar');
    }
}