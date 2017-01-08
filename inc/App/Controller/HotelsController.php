<?php

namespace App\Controller;

use App\Model\Hotel;
use App\Model\Appartment;
use App\Model\AppartmentAttachment;
use App\Model\HotelAttachment;

class HotelsController
{
    public function actionList($page)
    {
        global $twig;
        global $id;

        $model = new Hotel();
        $totalHotel = $model->countBy();
        $limit = 16;
        $offset = ($page - 1) * $limit;
        $orderBy = 'id_hotel asc';
        $hotelsList = $model->findBy(array(), [$orderBy],$limit,$offset);
        $maxPage = ceil($totalHotel / $limit = 16);
        $id = $model->find($id);


        echo $twig->render('hotels.twig', array(
            'hotelList'  => $hotelsList,
            'maxPages'   => $maxPage,
            'thisPage'   => $page,
            'id'         => $id
        ));

        return true;
    }

    public function actionHotel($id)
    {
        global $twig;

        $model = new Hotel();
        $hotelItem = $model->find($id);
        $hotelsFoto =(new HotelAttachment())->findBy(['`id_hotel` = ' . $id]);
        $hotelRooms = (new Appartment())->findBy(['`id_hotel` = ' . $id]);
        $minPrice = Appartment::getMinPrice($id);
        $maxPrice = Appartment::getMaxPrice($id);

        echo $twig->render('hotelID.twig', array(
            'hotelItem'   => $hotelItem,
            'hotelsFoto'  => $hotelsFoto,
            'hotelRooms'  => $hotelRooms,
            'minPrice'    => $minPrice,
            'maxPrice'    => $maxPrice));

        return true;

    }

    public function actionRoom($id)
    {

        global $twig;

        $model = new Appartment();
        $roomId = $model->find($id);
        $roomFoto = (new AppartmentAttachment())->findBy(['`id_apartment` = ' . $id]);

        echo $twig->render('room.twig', array('roomId' => $roomId, 'roomFoto' => $roomFoto));
    }
}