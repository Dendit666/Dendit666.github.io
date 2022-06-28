function getData() {
    var data = {};
    $('.log_form, .reg_form, .pass_form, .upd_form').find('input, button').each(function () {
        data[this.name] = $(this).val();
    });
    return data;
}


// ================ОБРАБОТКА КНОПКИ SUBMIT И ОТПРАВКА ДАННЫХ НА СЕРВЕР================
$(".reg_but, .log_but").on("click", function (e) {
    e.preventDefault();
    var data = getData();
    $.ajax({
        type: "post",
        url: "/php/autf.php",
        data: data,
        cache: false,
        dataType: "json",
        success: function (response) {

            if (response.location) {
                window.location.href = response.location;
                return
            } else if (response.error) {
                alert(response.error);
                return;
            }
        },
        error: function (response) {
            alert('DB error');
            return
        }
    });
});

$(".pass_but").on("click", function (e) {
    e.preventDefault();
    var data = getData();
    $.ajax({
        type: "post",
        url: "/php/update_pass.php",
        data: data,
        cache: false,
        dataType: "json",
        success: function (response) {

            if (response.location) {
                window.location.href = response.location;
                return
            } else if (response.error) {
                alert(response.error);
                return;
            }
        },
        error: function (response) {
            alert('DB error');
            return
        }
    });
});
$(".upd_but").on("click", function (e) {
    e.preventDefault();
    var data = getData();
    $.ajax({
        type: "post",
        url: "/php/update_profile.php",
        data: data,
        cache: false,
        dataType: "json",
        success: function (response) {

            if (response.location) {
                window.location.href = response.location;
                return
            } else if (response.error) {
                alert(response.error);
                return;
            }
        },
        error: function (response) {
            alert('DB error');
            return
        }
    });
});