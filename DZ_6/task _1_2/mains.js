$(document).ready(function() {
    $('#order-form').on ('submit', function (e) {
        e.preventDefault(); //перехват и отключение стандартных действий браузера
        var data_form = $(this).serialize(); // забираем все из формы
        $.ajax({ //  сразу отправка методом пост
            type: 'POST',
            url: 'sendler.php',
            data: data_form,
            success: function(response){
                var answer = $.parseJSON(response);
                if (answer.error) {
                    alert(answer.errortext);
                } else {
                    alert('Заказ Оформлен, проверьте Вашу почту');
                }
                document.forms['order-form'].reset(); //очищаем форму
            }
        });
    });
});