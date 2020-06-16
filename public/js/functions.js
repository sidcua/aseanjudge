function ajaxPOST(url, data, response_callback, failed_callback){
	$.ajax({
	    url: url,
		type: "POST",
		data: data,
		dataType: "json", 
	    success: function(data){
			if(response_callback){
				response_callback(data);
			}
		},
		error: function(data){
            if(failed_callback != null) {
                failed_callback(data);
            }
        }
	});
}

function ajaxGET(url, data, response_callback, failed_callback){
	$.ajax({
	    url: url,
		type: "GET",
		data: data,
		dataType: "json",
	    success: function(data){
			if(response_callback){
				response_callback(data);
			}
		},
		error: function(data){
            if(failed_callback != null) {
                failed_callback(data);
            }
        }
	});
}

function submitSong(){
	var form = $('#song-form').serialize();
	ajaxPOST('/submit/song', form, function(response){
		console.log(response);
		if(response.status){
			$('#submit-success').hide();
			$('#submit-error').html('<h4>Submission error found!</h4>');
			$.each(response.errors, function(key, value){
				$("#submit-error").append('<li>' + value + '</li><br>');
			})
			$('#submit-error').fadeIn();
			setTimeout(function(){
				$('#submit-error').fadeOut();
			}, 5000)
		} else {
			$('#submit-error').hide();
			$('#submit-error').html('');
			$('.reset').click();
			$('#submit-success').fadeIn();
			setTimeout(function(){
				$('#submit-success').fadeOut();
			}, 5000)
		}
	})
	loadSongs();
}

function submitDance(){
	var form = $('#dance-form').serialize();
	ajaxPOST('/submit/dance', form, function(response){
		if(response.status){
			$('#submit-success').hide();
			$('#submit-error').html('<h4>Submission error found!</h4>');
			$.each(response.errors, function(key, value){
				$("#submit-error").append('<li>' + value + '</li><br>');
			})
			$('#submit-error').fadeIn();
			setTimeout(function(){
				$('#submit-error').fadeOut();
			}, 5000)
		} else {
			$('#submit-error').hide();
			$('#submit-error').html('');
			$('.reset').click();
			$('#submit-success').fadeIn();
			setTimeout(function(){
				$('#submit-success').fadeOut();
			}, 5000);
		}
	})	
}

function submitInfoGraphic(){
	var form = $('#infographic-form').serialize();
	ajaxPOST('/submit/infographic', form, function(response){
		if(response.status){
			$('#submit-success').hide();
			$('#submit-error').html('<h4>Submission error found!</h4>');
			$.each(response.errors, function(key, value){
				$("#submit-error").append('<li>' + value + '</li><br>');
			})
			$('#submit-error').fadeIn();
			setTimeout(function(){
				$('#submit-error').fadeOut();
			}, 5000)
		} else {
			$('#submit-error').hide();
			$('#submit-error').html('');
			$('.reset').click();
			$('#submit-success').fadeIn();
			setTimeout(function(){
				$('#submit-success').fadeOut();
			}, 5000);
		}
	})
}

//GLOBAL VARIABLES FOR HOW MANY JUDGES
var judges = 3;

//a = false
//b = true
var view = 'a';
var songs = [];
var dances = [];
var infographics = [];

function loadSongs(){
	ajaxGET('/admin/songs', '', function(response){
		songs = response;
		renderSongs(response);
	})
	intervalLoadSongs();
}

function loadDances(){
	ajaxGET('/admin/dances', '', function(response){
		dances = response;
		renderDances(response);
	})
	intervalLoadDances();
}

function loadInfoGraphics(){
	ajaxGET('/admin/infographics', '', function(response){
		infographics = response;
		renderInfoGraphics(response);
	})
	intervalLoadInfoGraphics();
}

function intervalLoadSongs(){
	setInterval(function (){
		ajaxGET('/admin/songs', '', function(response){
			if( JSON.stringify(response) !== JSON.stringify(songs) ){
				songs = response;
				$('#song-cards').html('');
				$("#song-rank-1").html('');
				$("#song-rank-2").html('');
				$("#song-rank-3").html('');
				renderSongs(response);
			}
		})
	}, 1000)
}

function intervalLoadDances(){
	setInterval(function (){
		ajaxGET('/admin/dances', '', function(response){
			if( JSON.stringify(response) !== JSON.stringify(dances) ){
				dance = response;
				$('#dance-cards').html('');
				$("#dance-rank-1").html('');
				$("#dance-rank-2").html('');
				$("#dance-rank-3").html('');
				renderDances(response);
			}
		})
	}, 1000)
}

function intervalLoadInfoGraphics(){
	setInterval(function (){
		ajaxGET('/admin/infographics', '', function(response){
			if( JSON.stringify(response) !== JSON.stringify(infographics) ){
				inforgraphics = response;
				$('#infographic-cards').html('');
				$("#infographic-rank-1").html('');
				$("#infographic-rank-2").html('');
				$("#infographic-rank-3").html('');
				renderInfoGraphics(response);
			}
		})
	}, 1000)
}

function renderSongs(response){
	var cntr = 1;
	$.each(response, function(key, value){
		var html;
		html = '<div class="card border-danger" style="width: 18rem;">' +
			'<div class="card-body">' +
				'<h5 class="card-title font-weight-bold">Performer # ' + value.performer + '</h5>' +
				'<p class="card-text text-danger h1 text-center">' + value.score + '</p>';
				for (i = 1; i <= judges; i++){
					if (value.judge[i]) {
						html = html + '<p class="card-text text-danger font-weight-bold">Judge ' + i + ': ' + value.judge[i] + '</p>';
					}
				}
				html = html + '<div class="progress">' +
					'<div class="progress-bar ';
				if (value.judges < 3){
					html = html + 'progress-bar-striped progress-bar-animated" ';
				} else {
					html = html + 'bg-success" ';
				}
				html = html + 'role="progressbar" style="width:' + (value.judges*(100/3)) + '%"></div>' +
				'</div>' +
			'</div>' +
		'</div><br>';
		$("#song-cards").append(html);
		if (cntr != 4) {
			$("#song-rank-" + cntr).html('Performer #<span class="font-weight-bold h4">' + value.performer + '</span>');
		} 
		cntr++;
	});
}

function renderDances(response){
	var cntr = 1;
	$.each(response, function(key, value){
		var html;
		html = '<div class="card border-primary" style="width: 18rem;">' +
			'<div class="card-body">' +
				'<h5 class="card-title font-weight-bold">Performer # ' + value.performer + '</h5>' +
				'<p class="card-text text-primary h1 text-center">' + value.score + '</p>';
				for (i = 1; i <= judges; i++){
					if (value.judge[i]) {
						html = html + '<p class="card-text text-primary font-weight-bold">Judge ' + i + ': ' + value.judge[i] + '</p>';
					}
				}
				html = html + '<div class="progress">' +
					'<div class="progress-bar ';
				if (value.judges < 3){
					html = html + 'progress-bar-striped progress-bar-animated" ';
				} else {
					html = html + 'bg-success" ';
				}
				html = html + 'role="progressbar" style="width:' + (value.judges*(100/3)) + '%"></div>' +
				'</div>' +
			'</div>' +
		'</div><br>';
		$("#dance-cards").append(html);
		if (cntr != 4) {
			$("#dance-rank-" + cntr).html('Performer #<span class="font-weight-bold h4">' + value.performer + '</span>');
		} 
		cntr++;
	});
}

function renderInfoGraphics(response){
	var cntr = 1;
	$.each(response, function(key, value){
		var html;
		html = '<div class="card border-success" style="width: 18rem;">' +
			'<div class="card-body">' +
				'<h5 class="card-title font-weight-bold">Performer # ' + value.performer + '</h5>' +
				'<p class="card-text text-success h1 text-center">' + value.score + '</p>';
				for (i = 1; i <= judges; i++){
					if (value.judge[i]) {
						html = html + '<p class="card-text text-success font-weight-bold">Judge ' + i + ': ' + value.judge[i] + '</p>';
					}
				}
				html = html + '<div class="progress">' +
					'<div class="progress-bar ';
				if (value.judges < 3){
					html = html + 'progress-bar-striped progress-bar-animated" ';
				} else {
					html = html + 'bg-success" ';
				}
				html = html + 'role="progressbar" style="width:' + (value.judges*(100/3)) + '%"></div>' +
				'</div>' +
			'</div>' +
		'</div><br>';
		$("#infographic-cards").append(html);
		if (cntr != 4) {
			$("#infographic-rank-" + cntr).html('Performer #<span class="font-weight-bold h4">' + value.performer + '</span>');
		} 
		cntr++;
	});
}

// function toggleView(){
// 	if(view == 'a') {
// 		view = 'b';
// 	} else {
// 		view = 'a';
// 	}
// 	$("#input-view").val(view);
// 	var form = $("#form-view").serialize();
// 	ajaxPOST('/admin/view/set', form, function(response){
// 		console.log(response)
// 	})
// 	alert();
// }

// function getView(){
// 	ajaxGET('/admin/view', '', function (response){
// 		if (response.view) {
// 			view = 'b';
// 		} else {
// 			view = 'a';
// 		}
// 	})
// 	intervalView();
// }

// function intervalView(){
	
// 	setInterval(function (){
// 		var tmp_view;
// 		console.log('s')
// 		ajaxGET('/admin/view', '', function (response){
// 			if (response.view) {
// 				tmp_view = 'b';
// 			} else {
// 				tmp_view = 'a';
// 			}
// 		})
// 		alert(tmp_view)
// 		alert(view)
// 		if (tmp_view != view) {
// 			if(tmp_view == 'a') {
// 				renderViewJudge();
// 			} else {
// 				renderViewDashboard();
// 			}
// 		}
// 	}, 1000)
// }

// function renderViewDashboard(){
// 	window.location.href = '/admin/dashboard';
// }

// function renderViewJudge(){
// 	window.location.href = '/admin/1';
// }