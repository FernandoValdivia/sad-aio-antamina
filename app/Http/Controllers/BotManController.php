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
                    $this->askQuestion($botman);
                    break;
                case "Buenas tardes":
                    $this->askQuestion($botman);
                    break;
                case "Buenos días":
                    $this->askQuestion($botman);
                    break;
                case "Buenas noches":
                    $this->askQuestion($botman);
                    break;
                case "Buenas noches":
                    $this->askQuestion($botman);
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
            if ($answer == "resumen") {
                $this->say('Lo puedes encontrar aquí: <a href=`/resumen` target=`_blank`>Resumen</a>');
            } else {
                $this->say('Lo siento, no entiendo tu mensaje 😢');
            }
        });

        /* $mystring = "This is a PHP program.";

        if (strpos($mystring, "program.") !== false) {
            echo("True");
        } */
    }


    

}
