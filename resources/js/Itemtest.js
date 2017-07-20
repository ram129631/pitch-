var showAlert;

var showGuessAlert;

function fnSaveUserAnswer(questionid, selectedoption)
{
	$.ajax({
		'type'		: 'POST',
		'url'		: strBaseURL+'tonaltest/saveuseranswer', 
		'ajax' 		: true,
		'data' 		: { questionid : questionid, selectedoption : selectedoption },
		'success' 	: function(){},
		'failure' 	: function(){}
	});
}

function fnShowAlert()
{
	clearInterval(showAlert);

	clearTimeout(showGuessAlert);

	$('.alert-danger').fadeIn().delay(3000).fadeOut(100);
			
	showGuessAlert = setTimeout(function(){
		$('.alert-warning').fadeIn().delay(9000).fadeOut(100);
	}, 12000);
}

$('document').ready(function(){
	
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).on("keydown", disableF5);
	
   // More Info Audio
   setTimeout(function(){
		$(function () {
		 //Find the audio control on the page
		   var audioPlay = document.getElementById('TestAudioData');
		  // Attaches an event ended and it gets fired when current playing song get ended
		   audioPlay.addEventListener('ended', function() {

		   		clearInterval(showAlert);

				clearTimeout(showGuessAlert);

				$('.tonal-test-wrapper .tonal-test-view .option-view label').css('pointer-events','inherit');

				showAlert = setInterval(function(){
					fnShowAlert();
				},8000);
		   });

	   });
   },200);

   $("input.custom-radio-button").bind('click', function()
	{	

		if(!$("input.custom-radio-button:checked").val()) {
			fnShowAlert();			
		}else
		{
			clearInterval(showAlert);

			clearTimeout(showGuessAlert);

			fnSaveUserAnswer($("input.custom-radio-button:checked").attr("data-role-id"), $("input.custom-radio-button:checked").attr("data-role-option"));
			
			setTimeout(function(){

				if((parseInt($("#hdnQuestionNo").val())+1) == arrQuestions.length)
				{
					//$('.NextButtonWrapper').show();
					setTimeout(function(){
						window.location.href = $("#aNextButtonWrapper").attr('href');
					},2000);
				}

				var intNextQuestion = parseInt($("#hdnQuestionNo").val())+1;

				if(arrQuestions.length > intNextQuestion)
				{
					$("#hdnQuestionNo").val(intNextQuestion);

					$("#TestAudioData").attr('src', strBaseURL+arrQuestions[intNextQuestion].audiopath);

					$("input.custom-radio-button").attr("checked",false);

					for(var intCtr = 1; intCtr<= arrQuestions[intNextQuestion].optionscount; intCtr++)
					{
						$("#id_"+intCtr).attr('data-role-id', arrQuestions[intNextQuestion].id);

						$strOldClass = $("#id_"+intCtr).attr('class');

						$("#id_"+intCtr).removeClass($strOldClass);

						$("#id_"+intCtr).addClass('radiobtn-custom-'+arrQuestions[intNextQuestion].optioncolor);

						$("#id_"+intCtr).addClass('custom-radio-button');

						$strLblClass = $("#lbl_"+intCtr).attr("class");

						$("#lbl_"+intCtr).removeClass($strLblClass);

						$("#lbl_"+intCtr).addClass('btn-'+arrQuestions[intNextQuestion].optioncolor);

					}
					
					$('.tonal-test-wrapper .tonal-test-view .option-view label').css('pointer-events','none');

					audioPlay1 = document.getElementById('TestAudioData');

					audioPlay1.play();

					$("#h1QuestionCode").html(arrQuestions[intNextQuestion].questioncode);
				}
		
			}, 1000);
		}
	});

});