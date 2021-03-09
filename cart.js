function clear_cart() {
    var c = document.cookie.split("; ");
    for (i in c)
        document.cookie = /^[^=]+/.exec(c[i])[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    $('.main_cart').html('Корзина очищена!');
    document.getElementById("cart_amount").innerHTML = "Корзина 0";
}

function buy(total) {
    var c = document.cookie.split("; ");
    for (i in c)
        document.cookie = /^[^=]+/.exec(c[i])[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    $('.main_cart').html('Итого к оплате: ' + total +' &#8381</br>Спасибо за заказ!');
    document.getElementById("cart_amount").innerHTML = "Корзина 0";
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
    if (amount == 0)
        $('.main_cart').html('Пусто!');
}

function load_cart() {
    if (document.cookie.length != 0) {
        show_cart();
    }
    else {
        $('.main_cart').html('Пусто!');
    }
}

    $(document).ready(function () {
        load_cart();
    });