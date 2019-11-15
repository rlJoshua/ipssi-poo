<?php

require_once('vendor/autoload.php');
use Ipssi\Evaluation\Diviseur;
use Ipssi\Evaluation\Exception\InvalidIndexException;


$climate = new League\CLImate\CLImate;

do{
    try
    {
        $input = $climate->input("Entrez l’indice de l’entier à diviser : ");
        $index = $input->prompt();

        $input = $climate->input("Entrez le diviseur : ");
        $diviseur = $input->prompt();

        $resultat = (new Diviseur())->division($index, $diviseur);
        $climate->output("Le résultat de la division est : $resultat");
    }
    catch (\TypeError $e)
    {
        $climate->output("L'index ou le diviseur saisie n'est pas un nombre.");
    }
    catch (InvalidIndexException $e)
    {
        $climate->output("L'index saisie n'est pas compris entre 0 et 9.");
    }
    catch (DivisionByZeroError $e)
    {
        $climate->output("Le diviseur saisie est un 0.");
    }
    catch (Throwable $e)
    {
        $climate->output("Erreur de saisie");
    }

}while(!isset($resultat));

