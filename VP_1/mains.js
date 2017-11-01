$(document).ready(function() {
    $('#order-form').on ('submit', function (e) {
        e.preventDefault(); //перехват и отключение стандартных действий браузера
        var data_form = $(this).serialize(); // забираем все из формы
        $.ajax({ //  сразу отправка методом пост
            type: 'POST',
            url: 'sendler.php',
            data: data_form,
            success: function(){
                document.forms['order-form'].reset(); //очищаем форму
                alert("Заказ Оформлен, проверьте Вашу почту");
            },
            error: function (){
                alert("Заказ не оформлен, проверьте правильность заполнения формы!");
            }
        });
    });
});