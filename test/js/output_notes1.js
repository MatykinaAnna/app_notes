 window.count_column = 0;
 $(document).ready(function(){
	let array_notes;
	$.ajax({
        url: 'vendor/output_notes.php',
        type: 'POST',
        dataType: 'json',
        data: {
        },
        success: function(data){
        	array_notes = data.note_array;
        	let count_column = $('input[name="number_clmn"]:checked').val();
        	output_note(count_column, array_notes);
        }
    });

	$('.show').click(function(e){
		e.preventDefault();
		delete_notes();
		let count_column = $('input[name="number_clmn"]:checked').val();
		output_note(count_column, array_notes);
	});

});

function delete_notes(){
	let block = $("div.notes")[0];
	while (block.firstChild){
		block.removeChild(block.firstChild);
	}
}

function output_note(colmn, array){
	block_notes = $("div.notes")[0];
	for (i=0; i<colmn; i++){
		var elem = document.createElement('div');
		elem.className = 'notes_column';
		block_notes.append(elem);
	}
	let note_dom = $(".notes").children();
	i=0;
	for (k=0; k<array.length; k++){
		let note = create_note(array[k]);
		note_dom[i].append(note);
		i++;
		if (i==colmn){
			i=0;
		}
	}
	$('.chow_card').click(function(e){
		e.preventDefault();
		console.log(this.id);
		$.ajax({
	        url: 'vendor/jamp_to_note.php',
	        type: 'POST',
	        dataType: 'json',
	        data: {
	        	id_card: this.id,
	        },
	        success: function(data){
	        	if (data){
	        		window.location.replace("the_note.php")
	        	}
	        }
	    });

	});
	$('.del_card').click(function(e){
		e.preventDefault();
		let count_column = $('input[name="number_clmn"]:checked').val();
		console.log(count_column);
		$.ajax({
	        url: 'vendor/delete_note.php',
	        type: 'POST',
	        dataType: 'json',
	        data: {
	        	id_card: this.id,
	        },
	        success: function(data){
	        	if (data){
	        		setTimeout(()=> window.location.replace("notes.php"), 2000);
	        	}
	        }
	    });

	});
}

function time_period(t1, t){
	mlsec = t1-t;
	min = parseInt(mlsec/60000);

	hour = parseInt(min/60);
	min = min%60;

	day = parseInt(hour/24);
	hour = (hour%24);

	return [min, hour, day];

}

function create_note(date_note){
	var card = document.createElement('div');
	card.className = 'card';

	var name = document.createElement('div');
	name.className = 'name';
	name.append(date_note['name']);

	var description = document.createElement('div');
	description.className = 'description';
	description.append(date_note['description']);

	var date = document.createElement('div');
	date.className = 'date';
	// console.log(date_note['create_date'], typeof(date_note['create_date']));
	create_date = new Date(Number(date_note['create_date']));
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
	date.append(String(day+'.'+month+'.'+create_date.getFullYear()));


	var date1 = document.createElement('div');
	date1.className = 'date1';
	create_date = new Date(Number(date_note['create_date']));
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
	console.log(str);
	date1.append(str);



	var button = document.createElement('button');
	button.className = 'chow_card';
	$(button).attr('id', date_note['id']);
	button.append("Смотреть");

	var button1 = document.createElement('button');
	button1.className = 'del_card';
	$(button1).attr('id', date_note['id']);
	button1.append("Удалить");

	var hr = document.createElement('hr');
	var hr1 = document.createElement('hr');

	card.append(name);
	card.append(hr);
	card.append(description);
	card.append(hr1);
	card.append(date);
	card.append(date1);
	card.append(button);
	card.append(button1);

	return card;
}