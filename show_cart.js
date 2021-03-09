
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

function load_cart() {
    if (document.cookie.length != 0) {
        show_cart();
    }
}

$(document).ready(function () {
    load_cart();
});