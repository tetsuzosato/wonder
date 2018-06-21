if(((navigator.userAgent.indexOf('iPhone') > 0) || (navigator.userAgent.indexOf('Android') > 0) && (navigator.userAgent.indexOf('Mobile') > 0) && (navigator.userAgent.indexOf('SC-01C') == -1))){
document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">');
}                                         
//page-scroller
$(function(){
	$('a[href*=\\#]:not([href=\\#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
            if ($target.length) {
                var targetOffset = $target.offset().top
                $('html,body').animate({scrollTop: targetOffset}, 1000);
                return false;
            }
        }
    });
});

$(function(){
	$('.menu').click(function(){
		$(this).toggleClass('on');
		$('#gNavi').slideToggle();
		return false;
	});
	
	$("#gNavi ul > li:has('ul') .iconImg").click(function(){
		$(this).parent('li').toggleClass("on");
		$(this).next('ul').slideToggle(300);
		return false;
	});
	
	$("#gFooter .fNavi > li:has('ul') .iconImg").click(function(){
		$(this).parent('li').toggleClass("on");
		$(this).next('ul').slideToggle(300);
		return false;
	});


});
