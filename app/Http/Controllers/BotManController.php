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
            
            switch ($message) {
                case "Hola":
                    $this->askName($botman);
                    break;
                case "Buenas tardes":
                    $this->askName($botman);
                    break;
                case "Buenos días":
                    $this->askName($botman);
                    break;
                case "Buenas noches":
                    $this->askName($botman);
                    break;
                case "Buenas noches":
                    $this->askName($botman);
                    break;
                default:
                    $this->askQuestion($botman);
                    break;
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Hola, cual es su nombre?", function(Answer $answer){
            $name = $answer->getText();

            $this->say('Un gusto conocerte '.$name);
        });
    }

    public function askQuestion($botman)
    {
        $botman->ask("¿En qué puedo ayudarte?", function(Answer $answer){
            switch ($answer) {
                case "Resumen":
                    $this->say('Enlace <a href=`/resumen` target=`_blank`>Resumen</a>');
                    break;
                case "Brechas":
                    $this->say('Enlace <a href=`/brechas` target=`_blank`>Brechas</a>');
                    break;
                default:
                    $this->say('Lo siento, no entiendo tu mensaje 😢');
                    break;
            }
        });
        $mystring = "This is a PHP program.";

        if (strpos($mystring, "program.") !== false) {
            echo("True");
        }
    }


    

}
