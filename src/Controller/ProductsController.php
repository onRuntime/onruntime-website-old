<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProductsController extends AbstractController
{
    /**
     * @Route("/{_locale}/products/", name="products")
     * @return Response
     */
    public function products()
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/{_locale}/products/{key}", name="products.show", defaults={"_locale"="en"}, requirements={"_locale"="en|fr"})
     * @param null $key
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function products_show($key, TranslatorInterface $translator)
    {
        $trans = (object) null;
        $trans->products = (object) null;
        $trans->products->title = $translator->trans('products.'.$key.'.title');
        $trans->products->description = $translator->trans('products.'.$key.'.description');

        $link = (object) null;
        switch ($key) {
            case 'berrygames':
                $link->website = 'https://berrygames.net';
                $link->discord = 'https://discord.gg/9vedhPD';
                $link->twitter = 'https://twitter.com/BerryGamesMC';
                $link->img = 'https://cdn.berrygames.net/img/logo/logo.png';
                break;
            case 'instagram-dark':
                $link->website = 'https://github.com/onRuntime/instagram-dark-extension/';
                break;
            case 'netflixaddicts':
                $link->website = 'https://netflixaddicts.fr';
                $link->discord = 'https://discord.gg/Ju28ZBn';
                $link->img = 'https://cdn.onruntime.com/img/logo/logo-netflixaddicts.png';
                break;
            case 'rvby':
                $link->website = 'https://rvby.store';
                $link->twitter = 'https://twitter.com/rvbystore';
                $link->instagram = 'https://instagram.com/rvbystore';
                $link->img = 'https://cdn.onruntime.com/img/logo/logo-rvby.png';
                break;
            case 'orion':
                $link->website = 'https://www.youtube.com/channel/UCN0hmDGaj1RAshd3A-x35pA';
            default:
                break;
        }

        return $this->render('products/products_show.html.twig', [
            'controller_name' => 'ProductsController',
            'key' => $key,
            'link' => $link,
            'trans' => $trans
        ]);
    }
}
