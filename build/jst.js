this["APP"]["JST"]["-dashboard"] = function(obj) {obj || (obj = {});var __t, __p = '', __j = Array.prototype.join;function print() { __p += __j.call(arguments, '') }with (obj) { if (collection.length == 0) { ;__p += '\r\n<li>Нет записей ' +((__t = ( entity )) == null ? '' : __t) +'</li>\r\n'; } ;__p += '\r\n\r\n'; _.each (collection, function (array, index) { ;__p += '\r\n\r\n<li class="dashboardblock">\r\n    <h5>' +((__t = ( APP.config.entities[index].title )) == null ? '' : __t) +'</h5>\r\n    <ul>\r\n        '; _.each(array, function (category) { ;__p += '\r\n        <li >\r\n            <div>\r\n                <a href="#' +((__t = ( index + '/edit/' + category[APP.config.entities[index].id] )) == null ? '' : __t) +'">\r\n                    ' +((__t = ( category.title )) == null ? '' : __t) +'\r\n                    ' +((__t = ( category.name)) == null ? '' : __t) +'\r\n                    ' +((__t = ( category.email)) == null ? '' : __t) +'\r\n                </a>\r\n            </div>\r\n            <div class="dashboardbtn1">\r\n                    <button class="btn btn-danger delete"\r\n                            type="button"\r\n                            data-entity="' +((__t = ( index )) == null ? '' : __t) +'"\r\n                            data-item="' +((__t = ( category[APP.config.entities[index].id] )) == null ? '' : __t) +'">\r\n                            Удалить\r\n                    </button>\r\n                <a class="btn btn-primary" href="#' +((__t = ( index )) == null ? '' : __t) +'/edit/' +((__t = ( category[APP.config.entities[index].id] )) == null ? '' : __t) +'">Редактировать</a>\r\n\r\n            </div>\r\n        </li>\r\n\r\n        '; }) ;__p += '\r\n    </ul>\r\n\r\n    <div class="dashboardbtn">\r\n        <a class="btn add"   href="admin#' +((__t = ( APP.config.entities[index].ipm)) == null ? '' : __t) +'/add"   data-grid="' +((__t = ( APP.config.entities[index].ipm )) == null ? '' : __t) +'">Добавить</a>\r\n        <a class="btn"       href="admin#' +((__t = ( APP.config.entities[index].ipm)) == null ? '' : __t) +'"       data-grid="' +((__t = ( APP.config.entities[index].ipm )) == null ? '' : __t) +'">Весь список</a>\r\n    </div>\r\n</li>\r\n'; }) ;__p += '\r\n\r\n\r\n';}return __p};
this["APP"]["JST"]["-editor"] = function(obj) {obj || (obj = {});var __t, __p = '', __j = Array.prototype.join;function print() { __p += __j.call(arguments, '') }with (obj) {__p += '<form  id="redactor" name="redactor">\r\n'; _.each (APP.config.entities[entity].editor, function (field, index) { ;__p += '\r\n\r\n<li class="editbox">\r\n    <article>\r\n    <h5>' +((__t = ( field.name )) == null ? '' : __t) +'</h5>\r\n    </article>\r\n\r\n    '; if (field.form == "input") { ;__p += '\r\n\r\n        <input required\r\n               maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'"\r\n               value="' +((__t = ( model[index] )) == null ? '' : __t) +'"\r\n               name="' +((__t = ( index )) == null ? '' : __t) +'"\r\n               type="' +((__t = ( field.type )) == null ? '' : __t) +'">\r\n\r\n    '; } else if (field.form == "selectstars") { ;__p += '\r\n    <div class="StarsBox">\r\n    <label class="labelStars" for="first-star"></label>\r\n    <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" class="inputStars" value=\'★✰✰✰✰\' id=\'first-star\' type="radio" name=\'stars\'/>\r\n    <label class="labelStars" for="second-star"></label>\r\n    <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" class="inputStars" value=\'★★✰✰✰\' id=\'second-star\' type="radio" name=\'stars\'/>\r\n    <label class="labelStars" for="third-star"></label>\r\n    <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" class="inputStars" value=\'★★★✰✰\' id=\'third-star\' type="radio" name=\'stars\'/>\r\n    <label class="labelStars" for="fourth-star"></label>\r\n    <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" class="inputStars" value=\'★★★★✰\' id=\'fourth-star\' type="radio" name=\'stars\'/>\r\n    <label class="labelStars" for="fifth-star"></label>\r\n    <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" class="inputStars" value=\'★★★★★\' id=\'fifth-star\' type="radio" name=\'stars\' checked/>\r\n    </div>\r\n\r\n    '; } else if (field.form == "radio" && model[index] == 1) { ;__p += '\r\n    <div>\r\n        <input required maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="1" checked> Да<Br>\r\n        <input required maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="0"> Нет\r\n    </div>\r\n\r\n    '; } else if (field.form == "radio" && model[index] == 0) { ;__p += '\r\n    <div>\r\n        <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="1"> Да<Br>\r\n        <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="0" checked> Нет\r\n    </div>\r\n\r\n    '; } else if (field.form == "radio") { ;__p += '\r\n    <div>\r\n        <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="1"> Да<Br>\r\n        <input maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" type="radio" name="' +((__t = ( index )) == null ? '' : __t) +'" value="0"> Нет\r\n    </div>\r\n\r\n    '; } else if (field.form == "checkbox" && field.is_approved == "1") { ;__p += '\r\n    <input type="checkbox" name="' +((__t = ( index )) == null ? '' : __t) +'" value="1">\r\n\r\n    '; } else if (field.form == "checkbox" && field.is_approved == "0") { ;__p += '\r\n    <input type="checkbox" name="' +((__t = ( index )) == null ? '' : __t) +'" value="0">\r\n\r\n    '; } else if (field.form == "date") { ;__p += '\r\n    <input required value="' +((__t = ( model[index] )) == null ? '' : __t) +'" type="date" name="' +((__t = ( index )) == null ? '' : __t) +'">\r\n\r\n    '; } else if (field.form == "avatar") { ;__p += '\r\n    <input required accept="image/jpeg,image/png,image/jpg" type="file" name="' +((__t = ( index )) == null ? '' : __t) +'">\r\n\r\n    '; } else if (field.form == "image") { ;__p += '\r\n    <div>\r\n    <img src = "' +((__t = ( model[index] )) == null ? '' : __t) +'">\r\n    <input required accept="image/jpeg,image/png,image/jpg" type="file" name="' +((__t = ( index )) == null ? '' : __t) +'">\r\n    </div>\r\n    '; } else if (field.form == "foto") { ;__p += '\r\n    <input required accept="image/jpeg,image/png,image/jpg" type="file" name="' +((__t = ( index )) == null ? '' : __t) +'">\r\n\r\n    '; } else if (field.form == "textarea") { ;__p += '\r\n          <textarea required maxlength="' +((__t = ( field.max )) == null ? '' : __t) +'" name="' +((__t = ( index)) == null ? '' : __t) +'" id="editTextarea">' +((__t = ( model[index] )) == null ? '' : __t) +'</textarea>\r\n\r\n    '; } else if (field.form == "email") { ;__p += '\r\n    <input required value="' +((__t = ( model[index] )) == null ? '' : __t) +'" type="email">\r\n    '; } ;__p += '\r\n\r\n\r\n\r\n</li>\r\n'; }); ;__p += '\r\n    <div id="results">вывод</div>\r\n\r\n\r\n\r\n<button type="submit"\r\n        class="btn editbtn save"\r\n        data-role="save"\r\n        >save</button>\r\n</form>\r\n\r\n';}return __p};
this["APP"]["JST"]["-grid"] = function(obj) {obj || (obj = {});var __t, __p = '', __j = Array.prototype.join;function print() { __p += __j.call(arguments, '') }with (obj) {__p += '<ol class="GridString">\r\n'; if (entity == 'hotels') { ;__p += '\r\n<a class="btn btn-primary gridbtn" href="admin#' +((__t = (entity)) == null ? '' : __t) +'/add">Добавить ' +((__t = (entity)) == null ? '' : __t) +'</a>\r\n'; _.each (collection, function (object) { ;__p += '\r\n<li>\r\n    <div class="gridtext">\r\n        <a href="admin#' +((__t = ( entity )) == null ? '' : __t) +'/edit/' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">\r\n        <img src="' +((__t = ( object.image )) == null ? '' : __t) +'">\r\n            ' +((__t = ( object.title )) == null ? '' : __t) +',\r\n            ' +((__t = ( object.stars )) == null ? '' : __t) +'\r\n        </a>\r\n    </div>\r\n    <div class="actionbtn">\r\n        <button class="btn btn-danger delete"  data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n                                    data-item="' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">Удалить</button>\r\n\r\n        <a class="btn btn-primary"\r\n           data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n           href="admin#' +((__t = (entity)) == null ? '' : __t) +'/edit/' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">\r\n           Редактировать\r\n        </a>\r\n    </div>\r\n</li>\r\n'; }); ;__p += '\r\n'; } ;__p += '\r\n\r\n'; if (entity == 'users') { ;__p += '\r\n<a class="btn btn-primary gridbtn" href="admin#' +((__t = (entity)) == null ? '' : __t) +'/add">Добавить ' +((__t = (entity)) == null ? '' : __t) +'</a>\r\n'; _.each (collection, function (object) { ;__p += '\r\n<li>\r\n    <div>\r\n        <a href="admin#' +((__t = ( entity )) == null ? '' : __t) +'/edit/' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">\r\n        <img src="' +((__t = ( object.avatar)) == null ? '' : __t) +'">\r\n        ' +((__t = ( object.name)) == null ? '' : __t) +',\r\n        ' +((__t = ( object.email)) == null ? '' : __t) +'\r\n        </a>\r\n    </div>\r\n    <div>\r\n        <div class="actionbtn">\r\n            <button     class="btn btn-danger delete"\r\n                        data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n                        data-item="' +((__t = ( object.id_user )) == null ? '' : __t) +'">Удалить</button>\r\n\r\n            <a class="btn btn-primary"\r\n               data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n               href="admin#' +((__t = (entity)) == null ? '' : __t) +'/edit/' +((__t = ( object.id_user )) == null ? '' : __t) +'">\r\n                Редактировать\r\n            </a>\r\n        </div>\r\n    </div>\r\n</li>\r\n'; }); ;__p += '\r\n'; } ;__p += '\r\n\r\n'; if (entity == 'requests') { ;__p += '\r\n<a class="btn btn-primary gridbtn" href="admin#' +((__t = (entity)) == null ? '' : __t) +'/add">Добавить ' +((__t = (entity)) == null ? '' : __t) +'</a>\r\n'; _.each (collection, function (object) { ;__p += '\r\n<li>\r\n    <div class="gridtext">\r\n        <a href="admin#' +((__t = ( entity )) == null ? '' : __t) +'/edit/' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">\r\n        ' +((__t = ( object.date_arrival)) == null ? '' : __t) +':\r\n        ' +((__t = ( object.date_departure)) == null ? '' : __t) +',\r\n        ' +((__t = ( object.name)) == null ? '' : __t) +',\r\n        ' +((__t = ( object.email)) == null ? '' : __t) +',\r\n        ' +((__t = ( object.phone)) == null ? '' : __t) +'\r\n        ' +((__t = ( object.comment)) == null ? '' : __t) +'\r\n        </a>\r\n    </div>\r\n        <div class="actionbtn">\r\n           <button class="btn btn-danger delete"     data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n                                                     data-item="' +((__t = ( object.id_request )) == null ? '' : __t) +'">Удалить</button>\r\n            <a class="btn btn-primary"\r\n               data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n               href="admin#' +((__t = (entity)) == null ? '' : __t) +'/edit/' +((__t = ( object.id_request)) == null ? '' : __t) +'">\r\n                Редактировать\r\n            </a>\r\n         </div>\r\n</li>\r\n'; }); ;__p += '\r\n'; } ;__p += '\r\n\r\n\r\n'; if (entity == 'apartments') { ;__p += '\r\n<a class="btn btn-primary gridbtn" href="admin#' +((__t = (entity)) == null ? '' : __t) +'/add">Добавить ' +((__t = (entity)) == null ? '' : __t) +'</a>\r\n'; _.each (collection, function (object) { ;__p += '\r\n<li>\r\n    <div>\r\n        <a href="admin#' +((__t = ( entity )) == null ? '' : __t) +'/edit/' +((__t = ( object.id_hotel )) == null ? '' : __t) +'">\r\n        <img src="' +((__t = ( object.foto)) == null ? '' : __t) +'">\r\n        ' +((__t = ( object.title)) == null ? '' : __t) +':\r\n        ' +((__t = ( object.price)) == null ? '' : __t) +'₴,\r\n        ' +((__t = ( object.size)) == null ? '' : __t) +',\r\n        ' +((__t = ( object.type)) == null ? '' : __t) +'\r\n    </a>\r\n\r\n    </div >\r\n    <div class="actionbtn">\r\n        <button class="btn btn-danger delete"    data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n                                                 data-item="' +((__t = ( object.id_apartment )) == null ? '' : __t) +'">Удалить</button>\r\n        <a class="btn btn-primary"\r\n           data-entity="' +((__t = ( entity )) == null ? '' : __t) +'"\r\n           href="admin#' +((__t = (entity)) == null ? '' : __t) +'/edit/' +((__t = ( object.id_apartment)) == null ? '' : __t) +'">\r\n            Редактировать\r\n        </a>\r\n    </div>\r\n\r\n</li>\r\n'; }); ;__p += '\r\n'; } ;__p += '\r\n\r\n'; if (collection.length == 0) { ;__p += '\r\n<li>Нет записей ' +((__t = ( entity )) == null ? '' : __t) +'</li>\r\n'; } ;__p += '\r\n</ol>\r\n<div class="paginator"></div>';}return __p};
this["APP"]["JST"]["-layout"] = function(obj) {obj || (obj = {});var __t, __p = '', __j = Array.prototype.join;function print() { __p += __j.call(arguments, '') }with (obj) {__p += '<ul id="sidebar">\r\n    <a href="#"><img src="http://s1.iconbird.com/ico/2013/9/450/w256h2561380453888Documents256x25632.png">Dashboard</a>\r\n\r\n    '; _.each (APP.config.entities, function (config, name) { ;__p += '\r\n        <a href="#' +((__t = ( name )) == null ? '' : __t) +'">\r\n        <img src=' +((__t = (config.img)) == null ? '' : __t) +'>\r\n            ' +((__t = ( config.title )) == null ? '' : __t) +'\r\n        </a>\r\n    '; }) ;__p += '\r\n</ul>\r\n<div id="content">\r\n    <!--TODO здесь выводится:-->\r\n    <!--TODO dashboard.ejs:-->\r\n    <!--TODO grid.ejs:-->\r\n    <!--TODO editor.ejs:-->\r\n</div>\r\n\r\n<!--\r\nTODO  1. добавить обратку кликов по ли в НавиВью\r\n-->\r\n';}return __p};
this["APP"]["JST"]["Dashboard"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<div class="hotellist dash"><h4>Список отелей</h4>\r\n    <div id="hotels">\r\n        <script id="hotelsTemplate" type="text/template">\r\n\r\n            ' +((__t = ( name )) == null ? '' : __t) +'\r\n            ' +((__t = ( stars )) == null ? '' : __t) +'\r\n            <img src="' +((__t = ( photo )) == null ? '' : __t) +'" alt="' +((__t = ( name )) == null ? '' : __t) +'" />\r\n            <button>Редактировать</button>\r\n            <button>Удалить</button>\r\n\r\n        </script>\r\n    </div>\r\n    <button>Все отели</button>\r\n    <button>Добавить отель</button>\r\n\r\n</div>\r\n<div class="roomlist dash"><h4>Список номеров</h4>\r\n    <ul>\r\n        <li>1</li>\r\n        <li>2</li>\r\n        <li>3</li>\r\n    </ul>\r\n    <button>Все номера</button>\r\n    <button>Добавить номер</button>\r\n</div>\r\n<div class="orderlist dash"><h4>Список заказов</h4>\r\n    <ul>\r\n        <li>1</li>\r\n        <li>2</li>\r\n        <li>3</li>\r\n    </ul>\r\n    <button>Все заказы</button>\r\n    <button>Добавить заказ</button>\r\n</div>\r\n<div class="userlist dash"><h4>Список пользователей</h4>\r\n    <div id="contacts">\r\n        <script id="contactTemplate" type="text/template">\r\n\r\n            ' +((__t = ( name )) == null ? '' : __t) +'\r\n            ' +((__t = ( stars )) == null ? '' : __t) +'\r\n            <img src="' +((__t = ( photo )) == null ? '' : __t) +'" alt="' +((__t = ( name )) == null ? '' : __t) +'" />\r\n            <button>Редактировать</button>\r\n            <button>Удалить</button>\r\n\r\n        </script>\r\n    </div>\r\n    <button>Все пользователи</button>\r\n    <button>Добавить пользователя</button>\r\n</div>\r\n</div>\r\n\r\n<script src="../../src/js/libs/jquery-3.1.1.min.js"></script>\r\n<script src="../../src/js/libs/underscore.js"></script>\r\n<script src="../../src/js/libs/bootstrap.min.js"></script>\r\n<script src="../../src/js/libs/backbone.js"></script>\r\n<script src="../../src/js/main.js"></script>\r\n<script src="../../src/js/Router.js"></script>\r\n<script src="../../src/js/DashboardUsers.js"></script>\r\n<script src="../../src/js/DashboardHotels.js"></script>\r\n';}return __p};
this["APP"]["JST"]["Hotels"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<div class="ejshotellist dash">\r\n    <h4>Список отелей</h4>\r\n</div>\r\n';}return __p};
this["APP"]["JST"]["navy"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<a href="#' +((__t = ( name )) == null ? '' : __t) +'"><img src="' +((__t = ( src )) == null ? '' : __t) +'">' +((__t = ( name )) == null ? '' : __t) +'</a>';}return __p};
this["APP"]["JST"]["Orders"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<div class="dash">\r\n    <h4>Список Заказов</h4>\r\n</div>';}return __p};
this["APP"]["JST"]["Rooms"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<div class="dash">\r\n    <h4>Список Номеров</h4>\r\n</div>';}return __p};
this["APP"]["JST"]["Users"] = function(obj) {obj || (obj = {});var __t, __p = '';with (obj) {__p += '<div class="dash">\r\n    <h4>Список Пользователей</h4>\r\n</div>\r\n';}return __p};