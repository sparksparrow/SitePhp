function confirm_delete() {
    window.confirm("Подтвердите удаление");
}

function choose_file() {
    var dialog = document.createElement('input');
    dialog.type = 'file';

    dialog.onchange = e => {
        var file = e.target.files[0];

        var text_path = document.getElementById("path_image");
        text_path.value = 'img/catalog_teas/'+file.name;
    }    

    dialog.click();
}