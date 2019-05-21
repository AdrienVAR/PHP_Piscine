#!/usr/bin/php
<?php
    while (1)
    {
        echo "Enter a number: ";
        if (!($line = fgets(STDIN)))
            exit ;
        $line = trim($line);
        if (!is_numeric($line))
        {
            echo "$line is not a number\n";
        }
        else
        {
            if ($line % 2)
                echo "The number $line is odd\n";
            else
                echo "The number $line is even\n";
        }
    }
?>