#!/usr/bin/php
<?php
    while (1)
    {
        echo "Entrez un nombre: ";
        if (!($line = fgets(STDIN)))
            exit ;
        $line = trim($line);
        if (!is_numeric($line))
        {
            echo "'$line' n'est pas un chiffre\n";
        }
        else
        {
            if ($line % 2)
                echo "Le chiffre $line est Impair\n";
            else
                echo "Le chiffre $line est Pair\n";
        }
    }
?>