$(document).ready(function(){
    $('input[type=submit]').on('click', function() {
        var name = $('input[name=name]').val();
        var phone = $('input[name=phone]').val();
        var email = $('input[name=email]').val();
        var street = $('input[name=street]').val();
        var home = $('input[name=home]').val();
        var part = $('input[name=part]').val();
        var appt = $('input[name=appt]').val();
        var floor = $('input[name=floor]').val();
        var comment = $('textarea[name=comment]').val();
        var payment = $('input[type=radio]').val();
        var callback = $('input[name=callback]').val();
        // console.log(name, phone, email, street, home, part, appt, floor, comment, payment, callback);
        $.post({
            url: 'sendler.php',
            data: {
                name: name,
                email: email,
                phone: phone,
                street: street,
                home: home,
                part: part,
                appt: appt,
                floor: floor,
                comment: comment,
                payment: payment,
                callback: callback
            }
        })

    })
});
// .done(function(data) {
//     // var jsoned = JSON.parse(data);
//     console.log(data);
//     $('.result').html(data.login);
//     $('.result2').html(data.password);
// });