<?php
    mail("localhost",
         "Confirmation d'inscription",
         "Bienvenue sur Jarditou ! Tu peux y acheter des tomates cerises pour l'apéro et une brouette pour les transporter. Sors vite ton American Express !",
         array('From' => 'contact@jarditou.com',
                'Reply-To' => 'commercial@jarditou.com',
                'X-Mailer' => 'PHP/' . phpversion() 
                )
        );

        var_dump("mail");
        ?>