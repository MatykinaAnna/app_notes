/* Авторизация */

$('.button-login').click(function(e){
    e.preventDefault();

    $("hr").removeClass('errorHr');

    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
        },
        success: function(data){
            if (data.status ){
                      document.location.href = 'http://test/notes.php';
            }
            else  {
                if (data.type){
                    data.fields.forEach(function (field){
                        if (field === "login"){
                            $('hr.login').addClass('errorHr')
                        }
                        if (field === "password"){
                            $('hr.password').addClass('errorHr')
                        }

                    })
                }
                $('.error').text(data.message);
            }

        }
    });
});