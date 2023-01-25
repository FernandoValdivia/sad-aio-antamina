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
            
            if (strpos(strtolower($message), "resumen") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/resumen" target="_blank">Resumen</a>');
            } elseif (strpos(strtolower($message), "brechas") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/brechas" target="_blank">Brechas</a>');
            } elseif (strpos(strtolower($message), "proyectos") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/proyectos" target="_blank">Proyectos</a>');
            } elseif (strpos(strtolower($message), "recursos") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/recursos" target="_blank">Recursos</a>');
            } elseif (strpos(strtolower($message), "potencialidades") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/potencialidades" target="_blank">Potencialidades</a>');
            } elseif (strpos(strtolower($message), "reportes") !== false || strpos(strtolower($message), "reporte") !== false || strpos(strtolower($message), "trimestral") !== false) {
                $botman->reply('Lo puedes encontrar aquí:</br><a href="/reporte#descarga" target="_blank">Reportes</a>');
            } elseif (strpos(strtolower($message), "gracias") !== false) {
                $botman->reply('Estoy para servirle! 😊');
            } elseif (strpos(strtolower($message), "sad") !== false) {
                $botman->reply('Logo del SAD <img src="/img/logo-icon.png" class="img-fluid">');
            } elseif (strpos(strtolower($message), "hola") !== false) {
                $botman->reply('¿Que tal?,¿Cómo te puedo ayudar? 😊');
            } elseif (strpos(strtolower($message), "cómo estás") !== false || strpos(strtolower($message), "como estas") !== false) {
                $botman->reply('Yo muy bien, tú que tal?');
            } elseif (strpos(strtolower($message), "bien") !== false || strpos(strtolower($message), "muy bien") !== false) {
                $botman->reply('Que bueno saber eso! 😊');
            } else {
                $botman->reply('Lo siento, no entiendo tu mensaje 😢 Vuelva a formular su pregunta, por favor');
            }
        });

        $botman->listen();
    }   
}
