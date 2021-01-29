$(document).ready(function(){
	$.ajax({
        url: 'vendor/show_the_note.php',
        type: 'POST',
        dataType: 'json',
        data: {
        },
        success: function(data)
        {
            output_note(data);
        }
    });
});

function output_note(array){
    $('.text-name').append(array['name']);
    $('.text-description').append(array['description']);
    $('.text').append(array['text'].split('\n').join('<br>'));
    create_date(array['create_date']);
}

function time_period(t1, t){
    console.log(t1);
    console.log(t);
    mlsec = t1-t;
    min = parseInt(mlsec/60000);

    hour = parseInt(min/60);
    min = min%60;

    day = parseInt(hour/24);
    hour = (hour%24);

    return [min, hour, day];

}

function create_date(date_note){
    create_date = new Date(Number(date_note));
    month = '';
    day ='';
    if (Number(create_date.getMonth()+1)<10){
        month = '0'+String(Number(create_date.getMonth()+1));
    } else{
        month = String(Number(create_date.getMonth()+1));
    }
    if (Number(create_date.getDate())<10){
        day = '0'+String(create_date.getDate());
    } else{
        day = String(create_date.getDate());
    }
    $('.date').append(String(day+'.'+month+'.'+create_date.getFullYear()));

    console.log(date_note);
    create_date = new Date(Number(date_note));
    create_date1 = new Date();

    array_time_period = time_period(create_date1, create_date);
    str='';

    flag=0;
    if (Number(array_time_period[0]) != Number(0)){
        str =str +'минут: '+array_time_period[0]+'; ';
        flag=1;
    }
    if (Number(array_time_period[1]) != Number(0)){
        str =str +'часов: '+ array_time_period[1]+'; ';
        flag=1
    }
    if (Number(array_time_period[2]) != Number(0)){
        str =str + 'дней: '+array_time_period[2];
        flag =1;
    }
    if (flag==1){
        str='прошло '+str;
    }
    $('.date1').append(str);
}