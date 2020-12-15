<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function myAction(Request $request)
    {
        // Nous avons accès à la requête courante dans la variable $request.
    }

    public function myResponseAction()
    {
        return new Response('Contenu de ma réponse');
    }
}