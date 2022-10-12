<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Botman\Botman\Botman;
use Botman\Botman\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}',function($botman,$message){
            
            if (strpos($message, "resumen") !== false || strpos($message, "Resumen") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/resumen" target="_blank">Resumen</a>');
            } elseif (strpos($message, "brechas") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/brechas" target="_blank">Brechas</a>');
            } elseif (strpos($message, "proyectos") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/proyectos" target="_blank">Proyectos</a>');
            } elseif (strpos($message, "recursos") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/recursos" target="_blank">Recursos</a>');
            } elseif (strpos($message, "potencialidades") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/potencialidades" target="_blank">Potencialidades</a>');
            } elseif (strpos($message, "reportes") !== false || strpos($message, "reporte") !== false || strpos($message, "trimestral") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/trimestral#descarga" target="_blank">Reportes</a>');
            } elseif (strpos($message, "gracias") !== false) {
                $botman->reply('Estoy para servirle! 😊');
            } elseif (strpos($message, "ccd") !== false) {
                $botman->reply('<img src="/img/logo-icon.png" class="img-fluid">');
            } else {
                $botman->reply('Lo siento, no entiendo tu mensaje 😢 Vuelva a formular su pregunta');
            }
        });
        $botman->listen();
    }   
}
