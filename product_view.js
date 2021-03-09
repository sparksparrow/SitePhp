
function add_to_cart(id) {
    var amount_to_add = Number(document.getElementById("amount_to_add").value);
    var max_amount = Number(document.getElementById("amount").textContent);
    if (amount_to_add > 0)
        if (getCookie(id) == "")
            if (max_amount >= amount_to_add)
                setCookie(id, amount_to_add);
            else {
                alert('Вы указал в сумме больше, чем есть на самом деле!');
                return;
            }
        else
            if (max_amount - (Number(getCookie(id)) + amount_to_add) >= 0) {
                var value = Number(getCookie(id)) + amount_to_add;
                setCookie(id, value);
            }
            else {
                alert('Не забывает про корзину! Вы указал в сумме больше, чем есть на самом деле!');
            }
    else
        alert('Ошибка!');
    show_cart();
}

function show_cart() {
    let amount = 0;
    var reg = /\D/;
    var dont_parsed_data = document.cookie.split(';');
    var data = [];
    for (var i = 0; i < dont_parsed_data.length; i++) {
        if (!reg.test(dont_parsed_data[i].split('=')[0].trim()) && !reg.test(dont_parsed_data[i].split('=')[1].trim()))
            data.push(dont_parsed_data[i]);
    }

    for (var i = 0; i < data.length; i++) {
        var str = data[i].split('=')[1];
            amount += Number(str);
    }
        document.getElementById("cart_amount").innerHTML = "Корзина " + amount;
}

function getCookie(id) {
    var value = id + "=";
    var dont_parsed_data = document.cookie.split(';');
    if (dont_parsed_data == '')
        return "";
    var data= [];

    var reg = /\D/;
    for (var i = 0; i < dont_parsed_data.length; i++) {
        if (!reg.test(dont_parsed_data[i].split('=')[0].trim()) && !reg.test(dont_parsed_data[i].split('=')[1].trim()))
            data.push(dont_parsed_data[i]);
    }

    for (var i = 0; i < data.length; i++) {
        var str = data[i];
        while (str.charAt(0) == ' ')
            str = str.substring(1);
        if (str.indexOf(value) != -1)
            return str.substring(value.length, str.length);
    }
    return "";
}

function setCookie(id, value) {
    document.cookie = id + "=" + value + ";";
}

function load_cart() {
    if (document.cookie.length != 0) {
        show_cart();
    }
}

$(document).ready(function () {
    $(document).ready(function () {
        $('#no_enter').keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
    load_cart();
});