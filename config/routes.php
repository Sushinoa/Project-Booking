<?php
return array (

//    Топ-8 номеров
    '^$'                             => 'App\Controller\HomeController::actionTop',

//  Отели, Отель, Номер
    '^hotels/page([0-9]+)'              => 'App\Controller\HotelsController::actionList::$1',
    '^hotels/id([0-9]+)'                => 'App\Controller\HotelsController::actionHotel::$1',
    '^hotels/room/id([0-9]+)'           => 'App\Controller\HotelsController::actionRoom::$1',


//   Регистрация пользователя, Авторизация пользователя,
// Выйти из сессии, Личный кабинет, Редактировать данные о пользователе
    '^user/join'                        => 'App\Controller\UserController::actionJoin',
    '^user/login'                       => 'App\Controller\UserController::actionLogin',
    '^user/logout'                      => 'App\Controller\UserController::actionLogout',
    '^cabinet/edit'                     => 'App\Controller\CabinetController::actionEdit',
    '^cabinet'                          => 'App\Controller\CabinetController::actionIndex',


//  Форма бронирования номера
    '^order/add/id([0-9]+)'             => 'App\Controller\OrderController::actionAdd::$1',

// Адмиин панель
    '^admin'                            => 'App\Controller\AdminController::actionIndex',

// REST API
    '^api\/([a-z]+)(?:\/([0-9]+)){0,1}' => 'App\Controller\ApiController::actionMethod::$1::$2'
);


