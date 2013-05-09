<?php

namespace Siro\Controller;

use Siro\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Landing page controller
 *
 * @author José Nahuel Cuesta Luengo <nahuelcuestaluengo@gmail.com>
 */ 
class Landing
{
    public function index(Request $request, Application $app)
    {
        //$users = $app['orm.em']->getRepository('Siro\Entity\User');
        //$user = $users->find(1);

        return $app['twig']->render('landing/index.html.twig');
    }
}
