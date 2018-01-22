$(window).load(function(){
	$(".main_slider_data").load("data/main-slider.html");
	$(".banner_full .loader").fadeOut(300);
});
/*$.ajaxSetup({
	beforeSend: function(xhr, status) {
		$(".banner_full .loader").fadeIn(300);
	},
	complete: function() {
		$(".banner_full .loader").fadeOut(300);
	}
});*/
// page scroll
var $showWhenScroll = $('.pw_scrollload');
var $window = $(window);
function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);
  $.each($showWhenScroll, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);
    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
        (element_top_position <= window_bottom_position)) {
      $element.addClass('pw_show');		
    } else {
      //$element.removeClass('pw_show');
    }
  });
}
$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');
var winWidth = $(window).width();
var tabMain = $(".main_tab > li > a");	
	tabMain.click(function(e){
		e.preventDefault();
		var tabData = $(this).attr("href");
		tabMain.parent().removeClass("active");
		$(this).parent().addClass("active");
		$(".main_tab_data").hide();
		$(".main_tab_data").load(tabData).fadeIn(300);
	});
var tabMainActive = $(".main_tab > li.active > a");
$(".main_tab_data").load(tabMainActive.attr("href")).fadeIn(300);

var tabLink = $(".tab_nav > li > a");
tabLink.click(function(e){
	e.preventDefault();
	tabLink.parent().removeClass("active");
	$(this).parent().addClass("active");
	$(".tab_data").removeClass("active");
	$(".tab_data" + $(this).attr("href")).addClass("active");
});
function navPostion(){
var primarynavItem = $('[data-dropdown*="multicolumn"]'),
	winWidth = $(window).width(),
	multiColMenu = $('[data-dropdown*="multicolumn"] .pw_dropdown');
	multiColMenu.each(function() {
		var thisParent = $(this).parent();
        $(this).css({"left": thisParent.offset().left, "max-width": winWidth - thisParent.offset().left});
    });
	$('.nav_primary > li.multicolumn').mouseover(function(){
		$(this).find(".pw_dropdown").css("top", $(this).offset().top + $(this).height());
	});
	$('.nav_primary > li.multicolumn').mouseout(function(){
		$(this).find(".pw_dropdown").css("top", "-90000000px");
	});
} 
if(winWidth > 1300){
	navPostion();
	$(window).resize(function(){
		navPostion();
	});
}
$(".dd_parent").mouseover(function(e){
	e.stopPropagation();
	$(".banner_full .overlay").fadeIn(300);
});
$(".banner_full .overlay, .header_full, .facts_section").mouseover(function(){
	$(".banner_full .overlay").fadeOut(300);
});

$('.go_link').click(function(){
	var el = $(this).attr('href');
	var elWrapped = $(el);
	scrollToDiv(elWrapped,0);
	return false;
});
function scrollToDiv(element,navheight){
	var offset = element.offset(),
		offsetTop = offset.top,
		totalScroll = offsetTop-navheight;
	$('body,html').animate({
			scrollTop: totalScroll
	}, 500);
}
$(".nav_toggle").click(function(){
	$(this).parent().find(".pw_dropdown").slideToggle(300);
});
$(".nav_action").click(function(){
	$(this).toggleClass("active");
	$(".main_nav").slideToggle(300);
});
$(".tab_serv > li > a").click(function(e){
	e.preventDefault();
	$(".tab_serv > li").removeClass("active");
	$(this).parent().addClass("active");
	$(".tab_serv_data").removeClass("active");
	$(".tab_serv_data" + $(this).attr("href")).addClass("active");
});
$(".tab_main > li > a").click(function(e){
	e.preventDefault();
	$(".tab_main > li").removeClass("active");
	$(this).parent().addClass("active");
	$(".tab_container").removeClass("active");
	$(".tab_container" + $(this).attr("href")).addClass("active");
});