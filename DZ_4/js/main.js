$(document).ready(function() {
    $('#regform').on ('submit', function (e) {
        e.preventDefault(); //перехват и отключение стандартных действий браузера
        var data_form = $(this).serialize(); // забираем все из формы
        $.ajax({ //  сразу отправка методом пост
            type: 'POST',
            url: 'data.php',
            data: data_form,
            success: function(response){
                var answer = $.parseJSON(response);
                if (answer.error) {
                    alert(answer.errortext);
                } else {
                    alert('Вы зарегистрированы, Авторизуйтесть под своим логином и паролем');
                }
                document.forms['regform'].reset(); //очищаем форму
            }

        });
    });
    $('#usrform').on ('submit', function (e) {
        e.preventDefault(); //перехват и отключение стандартных действий браузера
        var data_form = $(this).serialize(); // забираем все из формы
        $.ajax({ //  сразу отправка методом пост
            type: 'POST',
            url: 'data.php',
            data: data_form,
            success: function(response){
                var answer = $.parseJSON(response);
                if (answer.error) {
                    alert(answer.errortext);
                } else {
                    alert('Данные Добавлены');
                }
                document.forms['usrform'].reset(); //очищаем форму
            }

        });
    });

});