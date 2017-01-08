function(obj) {
obj || (obj = {});
var __t, __p = '', __e = _.escape;
with (obj) {
__p += '<div class="hotellist dash"><h4>Список отелей</h4>\r\n    <div id="hotels">\r\n        <script id="hotelsTemplate" type="text/template">\r\n\r\n            ' +
((__t = ( name )) == null ? '' : __t) +
'\r\n            ' +
((__t = ( stars )) == null ? '' : __t) +
'\r\n            <img src="' +
((__t = ( photo )) == null ? '' : __t) +
'" alt="' +
((__t = ( name )) == null ? '' : __t) +
'" />\r\n            <button>Редактировать</button>\r\n            <button>Удалить</button>\r\n\r\n        </script>\r\n    </div>\r\n    <button>Все отели</button>\r\n    <button>Добавить отель</button>\r\n\r\n</div>\r\n<div class="roomlist dash"><h4>Список номеров</h4>\r\n    <ul>\r\n        <li>1</li>\r\n        <li>2</li>\r\n        <li>3</li>\r\n    </ul>\r\n    <button>Все номера</button>\r\n    <button>Добавить номер</button>\r\n</div>\r\n<div class="orderlist dash"><h4>Список заказов</h4>\r\n    <ul>\r\n        <li>1</li>\r\n        <li>2</li>\r\n        <li>3</li>\r\n    </ul>\r\n    <button>Все заказы</button>\r\n    <button>Добавить заказ</button>\r\n</div>\r\n<div class="userlist dash"><h4>Список пользователей</h4>\r\n    <div id="contacts">\r\n        <script id="contactTemplate" type="text/template">\r\n\r\n            ' +
((__t = ( name )) == null ? '' : __t) +
'\r\n            ' +
((__t = ( stars )) == null ? '' : __t) +
'\r\n            <img src="' +
((__t = ( photo )) == null ? '' : __t) +
'" alt="' +
((__t = ( name )) == null ? '' : __t) +
'" />\r\n            <button>Редактировать</button>\r\n            <button>Удалить</button>\r\n\r\n        </script>\r\n    </div>\r\n    <button>Все пользователи</button>\r\n    <button>Добавить пользователя</button>\r\n</div>\r\n</div>\r\n\r\n<script src="../../src/js/libs/jquery-3.1.1.min.js"></script>\r\n<script src="../../src/js/libs/underscore.js"></script>\r\n<script src="../../src/js/libs/bootstrap.min.js"></script>\r\n<script src="../../src/js/libs/backbone.js"></script>\r\n<script src="../../src/js/main.js"></script>\r\n<script src="../../src/js/Router.js"></script>\r\n<script src="../../src/js/DashboardUsers.js"></script>\r\n<script src="../../src/js/DashboardHotels.js"></script>\r\n';

}
return __p
}