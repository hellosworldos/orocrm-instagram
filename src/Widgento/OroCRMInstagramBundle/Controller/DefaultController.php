<?php

namespace Widgento\OroCRMInstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WidgentoOroCRMInstagramBundle:Default:index.html.twig');
    }
}
