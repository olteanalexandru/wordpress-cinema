(function($){
 
    jQuery(document).ready(function($) {
		// apply category colors
		custom_cat_colors();

		$(".ect-accordion-view").each(function () {
			var thisElement = $(this);
			thisElement.find(".ect-accordion-footer:first").addClass('show-event');
			thisElement.find('.ect-accordion-header:first').addClass('active-event');
			thisElement.find('.ect-accordion-event:first').addClass('active-event');
			ectAccordion(thisElement);
		});
	
		$(".ectt-list-wrapper").each(function(){
			const wrapper=$(this);
			wrapper.find(".ect-load-more-btn").on("click",function(){
				const type="list";
				const thisEle=$(this);
				const thisParent=thisEle.parents("#ect-events-list-content").find("div.ect-list-wrapper");
				ectLoadMoreContent($(thisParent),thisEle,type);
				return false;
			});
		});

		$(".ect-accordion-view").each(function(){
			const wrapper=$(this);
			wrapper.find(".ect-load-more-btn").on("click",function(){
				const type="accordion";
				const thisEle=$(this);
				const thisParent=wrapper.find(".ect-accordion-container");
				ectLoadMoreContent($(thisParent),thisEle,type);
				return false;
			});
		});

		$(".tect-grid-wrapper").each(function(){
		const wrapper=$(this);
			wrapper.find(".ect-load-more-btn").on("click",function(){
			const type="grid";
			const thisEle=$(this);
			const thisParent=wrapper.find("div.row");
			ectLoadMoreContent($(thisParent),thisEle,type);
			return false;
			});
		});

		
	});


    function ectLoadMoreContent(contentWrapper,thisEle,type){    
        var settingContainer= thisEle.parents('.ect-load-more').find('#ect-lm-settings');
  
		// var settingContainer=thisEle.parents('.ect-masonry-template-cont').find('#ect-lm-settings');
		var ajaxUrl= settingContainer.data('ajax-url');
		var settings=settingContainer.data('settings');
		var excludeEventsJson=settingContainer.attr('data-exclude-events');

		var loadMore=settingContainer.data('load-more');
		var loading=settingContainer.data('loading');
		var noEvent=settingContainer.data('loaded');
		var json_query=settingContainer.siblings('#ect-query-arg').html();
		var query=JSON.parse(json_query);
		var paged=thisEle.attr('data-paged');
		thisEle.find('.ect-preloader').show();
		thisEle.find('span').text(loading);

		var data = {
			'action': 'ect_common_load_more',
			'query':query,
		//  'paged':paged,
			'exclude_events':excludeEventsJson,
			'settings':settings,
		};
		jQuery.post(ajaxUrl, data, function(response) {
			var rs=JSON.parse(response);
			if(rs.events=="yes"){
				setTimeout(function() {
					var content=rs.content;
					$.each(content, function (key, val) {
						var html=$(val);
						contentWrapper.append(html);
					});
			
					paged=parseInt(paged)+1;
					if(rs.exclude_events){
					var oldlist=JSON.parse(excludeEventsJson);
					newExcludeList = oldlist.concat(JSON.parse(rs.exclude_events));
					settingContainer.attr('data-exclude-events','['+newExcludeList+']');
					}
					custom_cat_colors();
					thisEle.find('span').text(loadMore);
					thisEle.find('.ect-preloader').hide();
				},200);
			}
			else{
				thisEle.find('.ect-preloader').hide();
				thisEle.find('span').text(noEvent);  
				setTimeout(function() {
				thisEle.hide().find('span').text(loadMore);
				settingContainer.find('#ect-cat-load-more').hide();
				},1500);
			}
		}); 
	}


	/*---Accordion open function - START---*/
	function ectAccordion(thisElement) { 
	var parentEle=thisElement;
	parentEle.on("click",'.ect-accordion-header',function (){
		var accordionHeader=$(this);
		if(accordionHeader.hasClass("active-event")){
		accordionHeader.parent(".ect-accordion-event").find(".ect-accordion-footer").removeClass('show-event');
		accordionHeader.removeClass('active-event');
		accordionHeader.parent(".ect-accordion-event").removeClass('active-event');
		return;
		}
		parentEle.find(".ect-accordion-footer").removeClass('show-event');
		parentEle.find(".ect-accordion-header").removeClass('active-event');
		parentEle.find(".ect-accordion-event").removeClass('active-event');
		accordionHeader.parent(".ect-accordion-event").find(".ect-accordion-footer").addClass('show-event');
		accordionHeader.addClass('active-event');
		accordionHeader.parent(".ect-accordion-event").addClass('active-event');
		var offset = accordionHeader.offset();
		offset.top -= 90;
		$('html, body').stop().animate({
		scrollTop: offset.top,
		}, 1000);  
	});
	}
	/*---Accordion open function - END---*/




	function custom_cat_colors() {
		$("body").find(".ect-list-post,.ect-timeline-post,.ect-slider-event,.ect-carousel-event,.ect-grid-event,.ect-accordion-event").each(function() {
		var thisElement = jQuery(this);
		var bgcolor = thisElement.data("cat-bgcolor");
		var txtcolor = thisElement.data("cat-txtcolor");

		if (bgcolor != null) {
			thisElement.find(".ect-list-date, .timeline-dots").css({ 
				"background": "#" + bgcolor,
				"box-shadow": "none"
			});
			thisElement.find(".ect-event-category ul.tribe_events_cat li a").css({
				"color": "#" + txtcolor,
				"background": convertHex("#" + bgcolor, 0.9),
				"border-color":"#" + bgcolor
			});
			thisElement.find(".ect-list-date .ect-date-area, .ect-grid-date .ect-date-area, .ect-carousel-date .ect-date-area, .ect-slider-date .ect-date-area").css({
				"color": "#" + txtcolor
			});
			
			if (thisElement.hasClass("style-1")) {
				thisElement.find(".ect-list-date, .ect-grid-date, .ect-carousel-date").css({ 
					"background": convertHex("#" + bgcolor, 0.95),
					"box-shadow": "none"
				});
				thisElement.find(".ect-list-venue, .ect-slider-event-area").css({ 
					"background": "#" + bgcolor,
					"box-shadow": "none"
				});
				thisElement.find(".ect-list-venue .ect-icon, .ect-list-venue .ect-venue-details, .ect-list-venue .ect-venue-details a").css({
					"color": "#" + txtcolor
				});
				thisElement.find(".ect-carousel-date").css({
					"border-color": "#" + bgcolor
				});
				thisElement.find(".ect-carousel-date").addClass("custom-arrow");
				thisElement.find(".timeline-meta").css({ 
					"background": "#" + bgcolor,
					"background-image": "none"
				});
				thisElement.find(".timeline-meta").addClass("no-arrow");
				thisElement.find(".timeline-meta.no-arrow .ect-date-area").css({ 
					"border-color": "#" + bgcolor
				});
				thisElement.find(".timeline-meta .ect-date-area, .timeline-meta .ect-venue-details, .timeline-meta a, .timeline-meta .ect-icon, .timeline-meta .ect-rate").css({ 
					"color": "#" + txtcolor
				});
				thisElement.find(".ect-slider-image, .tribe_events_cat a").css({
					"border-color": "#" + txtcolor
				});
				thisElement.find(".ect-slider-event-area .ect-slider-title h4, .ect-slider-event-area a, .ect-slider-event-area .ect-venue-details, .ect-slider-event-area .ect-icon, .ect-slider-event-area .ect-rate, .ect-slider-event-area .ect-event-content p").css({
					"color": "#" + txtcolor
				});
				if(thisElement.hasClass("ect-accordion-event")){
					thisElement.css({
						"border-left": "5px solid #" + bgcolor
					});
				}
			}

			if (thisElement.hasClass("style-2")) {
				thisElement.find(".ect-grid-date, .timeline-content, .ect-slider-date, .ect-accordion-date").css({
					"background": "#" + bgcolor,
					"box-shadow": "none"
				});
				thisElement.find(".ect-carousel-date").css({ 
					"background": convertHex("#" + bgcolor, 0.95),
					"box-shadow": "none"
				});
				thisElement.find(".timeline-content .content-title, .timeline-content a, .timeline-content .ect-event-content p, .ect-accordion-date .ect-date-area").css({
					"color": "#" + txtcolor
				});
				thisElement.find(".timeline-content").addClass("no-arrow");
				thisElement.find(".timeline-content.no-arrow").css({ 
					"border-color": "#" + bgcolor
				});
				thisElement.find(".timeline-content .tribe_events_cat a").css({ 
					"border-color": "#" + txtcolor
				});
				if(thisElement.hasClass("ect-accordion-event")){
					thisElement.css({
						"border-left": "5px solid #" + bgcolor
					});
				}
				thisElement.find(".ect-accordion-date .ev-yr").css({
					"background": "#" + txtcolor,
					"color": "#" + bgcolor,
				});
			}

			if (thisElement.hasClass("style-3")) {
				thisElement.find(".ect-grid-event-area, .ect-carousel-event-area").css({
					"background": "#" + bgcolor,
					"box-shadow": "none",
					"border-color": "#" + bgcolor
				});
				thisElement.find(".ect-grid-event-area .ect-grid-title h4, .ect-grid-event-area a, .ect-grid-event-area .ect-venue-details, .ect-grid-event-area .ect-icon, .ect-grid-event-area .ect-rate, .ect-carousel-event-area .ect-carousel-title h4, .ect-carousel-event-area a, .ect-carousel-event-area .ect-venue-details, .ect-carousel-event-area .ect-icon, .ect-carousel-event-area .ect-rate, .timeline-content .content-title, .timeline-content a, .timeline-view-venue .ect-venue-details, .timeline-content .ect-icon, .timeline-content .ect-rate, .timeline-content .ect-date-area, .ect-slider-left .ect-slider-title h4, .ect-slider-left a, .ect-slider-left .ect-icon, .ect-slider-left .ect-venue-details, .ect-slider-left .ect-rate, .ect-accordion-header .ect-date-area, .ect-accordion-title, .ect-accordion-header .accordion-view-venue, .ect-accordion-header .ect-icon, .ect-accordion-header a.tribe-events-gmap .ect-accordion-content p, .ect-accordion-content a").css({
					"color": "#" + txtcolor
				});
				thisElement.find(".timeline-content a").css({
					"border-color": "#" + txtcolor
				});
				thisElement.find(".timeline-content").css({ 
					"background": "#" + bgcolor,
					"background-image": "none"
				});
				thisElement.find(".timeline-content").addClass("no-arrow");
				thisElement.find(".timeline-content.no-arrow").css({ 
					"border-color": "#" + bgcolor
				});
				thisElement.find(".ect-slider-left").css({ 
					"background": convertHex("#" + bgcolor, 0.95),
					"box-shadow": "none"
				});
				thisElement.find(".ect-slider-left, .tribe_events_cat a").css({
					"border-color": "#" + txtcolor
				});
				if(thisElement.hasClass("ect-accordion-event")){
					thisElement.css({
						"background": "#" + bgcolor
					});
				}
				thisElement.find(".ect-accordion-date .ev-yr").css({
					"background": "#" + txtcolor,
					"color": "#" + bgcolor,
				});
			}

			/*
				thisElement.find(".tribe-events-read-more").hover(
				function() {
					jQuery(this).css({ "background-color": "#" + bgcolor, "color": "#" + txtcolor, "box-shadow": "none" });
				},
				function() {
					jQuery(this).css({ "background-color": "", "color": "" });
				}
				);
			*/
		}
		});
	}


	/*---Covert Hex Color into RGB with color opacity - START---*/
	function convertHex(hex, opacity) {
		hex = hex.replace('#', '');
		r = parseInt(hex.substring(0, 2), 16);
		g = parseInt(hex.substring(2, 4), 16);
		b = parseInt(hex.substring(4, 6), 16);
		result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
		return result;
	}
	/*---Covert Hex Color into RGB with color opacity - END---*/
	
})(jQuery);