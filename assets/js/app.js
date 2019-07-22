var $btns = $('.button').click(function() {
	var location = $('.parent > li').find('a').data('link');
	$('.parent > li').find('a').attr("href", location).css({"cursor":"pointer"});
	if (this.id == 'all') {  
		$('.parent > li').css({"opacity":1});
	} else {
		var $el = $('.' + this.id).css({"opacity":1});
		$('.parent > li').not($el).css({"opacity":0.2});
		$('.parent > li').not($el).find('a').removeAttr('href').css({"cursor":"default"});
	}
	$btns.removeClass('active');
	$(this).addClass('active');
})

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-144210783-1');