<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{

    /**
     * @Route("/{_locale}", name="home", defaults={"_locale"="en"}, requirements={"_locale"="en|fr"})
     * @param Request $request
     * @return Response
     */
    public function home(Request $request)
    {
        return $this->render('home/home.html.twig');
    }


}
