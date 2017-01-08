<?php

namespace App\Controller;

use App\Model\Appartment;

class HomeController
{

    public function actionTop()
    {

        global $twig;

        $roomList = Appartment::getTop();

        echo $twig->render('home.twig', array('roomList' => $roomList));

        return true;
    }


}

