var habilitar=0; /*PARA EL MENU*/

$("#link1").click(function(e){
	e.preventDefault();
});
$("#link2").click(function(e){
	e.preventDefault();
});

$(document).ready(function(){
	$('.nav li:has(ul)').click(function(){

		if($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		}
		else
		{
			$('.nav li ul').slideUp();
			$('.nav li').removeClass('activado');	
			$(this).addClass('activado');

			$(this).children('ul').slideDown();
		}
	});
});
$("#menu").click(function(){
	if(habilitar==0)
	{
		$("header").animate({
			left: "0px"	
		})	
		habilitar=1;
	}
	else
	{
		$("header").animate({
			left: "-250px"
		})	
		habilitar=0;
	}
});