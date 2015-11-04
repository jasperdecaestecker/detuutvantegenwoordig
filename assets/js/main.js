$(document).ready(function()
{
	ready();
});


function ready()
{
	$('.partners .where').on('click',function(e){
		e.preventDefault();
		$(this).next('.partners_images').toggle();
	});

	$('.faq ul li a').on('click',function(e){
		e.preventDefault();
		$(this).parent().next('.answer').slideToggle(100);
		toggleChecvron($(this));


	});
}

function toggleChecvron(element){
	if($(element).next('i').hasClass('fa-chevron-down')){
		$(element).next('i').removeClass('fa-chevron-down')
		$(element).next('i').addClass('fa-chevron-up');
	}
	else{
		$(element).next('i').removeClass('fa-chevron-up')
		$(element).next('i').addClass('fa-chevron-down');
	}
}


var count = 0;
function appendLettersTitle()
{

	var $new = $('<span class="skew1">u</span>');
	$('.skew2:last').append($new);
	$new.show('slow');
	/*if(count % 0)
	{
		$('.skew2:last').append('<span class="skew1">u</span>')
	}
	else
	{
		$('.skew1:last').append('<span class="skew2">u</span>')
	}
	count++;*/

}