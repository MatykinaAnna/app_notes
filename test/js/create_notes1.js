

$('.btn-create').click(function(e){
    e.preventDefault();
    console.log('this');
    $("hr").removeClass('errorHr');

    let name = $('input[name="name"]').val();
    let description = $('input[name="description"]').val();
    let text = $('textarea[name="text"]').val();
    let date = Date.now();

    console.log(name, description, text, date);

    let message = 'Проверьте правильность заполнения полей';
    let f = true;

    if(name == ''){
        $('hr.name').addClass('errorHr');
        $('.error').text(message);
        f = false;
    }

    if (description == ''){
        $('hr.description').addClass('errorHr');
        $('.error').text(message);
        f = false;
    }

    if (text == ''){
        $('hr.text').addClass('errorHr');
        $('.error').text(message);
        f = false;
    }

    if (f){
        $.ajax({
            url: 'vendor/create.php',
            type: 'POST',
            dataType: 'json',
            data: {
                name: name,
                description: description,
                text: text,
                date: date,
            },
            success: function(data){
                if (data){
                    console.log('true');
                    window.location.href = "http://test/notes.php"; //перенаправить на notes.php
                }
            }
        });

    }
});