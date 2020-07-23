/*
    Авторизация
 */

$('.check').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        passwordone = $('input[name="passwordone"]').val();

    $.ajax({
        url: 'vender/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            passwordone: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });

});



/*
    Регистрация
 */

$('.check1').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="passwordone"]').val(),
        name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        passwordtwo = $('input[name="passwordtwo"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('passwordtwo', password_two);
    formData.append('name', name);
    formData.append('email', email);


    $.ajax({
        url: 'vender/signup.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/index1.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});
