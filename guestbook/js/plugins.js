$(document).ready(function (){
    
    /// nice scroll
    $("html").niceScroll({cursorcolor:"#F0AD4E"});

	// caching the scroll top element 
	var ScrollButoon = $("#scroll-top");
	$(window).scroll(function (){
		console.log($(this).scrollTop());
		if ($(this).scrollTop()>=100) {
			ScrollButoon.show();
		}else
		{
			ScrollButoon.hide();
		}
	


});
		// click on  button to scroll top 
	ScrollButoon.click (function (){
		$("html,body").animate({scrollTop:0},100);

		});
	// end scroll top 



});
// end 
