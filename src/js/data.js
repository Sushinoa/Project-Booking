document.addEventListener('DOMContentLoaded', function () {
    var d = new Date();
    var dd = d.getDate();
    if (dd < 10) dd = '0' + dd;
    var mm = d.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;
    var year = d.getFullYear();
    var name_input = document.getElementById('your_name');
    name_input.value = year + "-" + mm + "-" + dd;
});