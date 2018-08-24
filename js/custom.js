"use strict";

$('ul.slimmenu').slimmenu({
    resizeWidth: '992',
    collapserTitle: 'Main Menu',
    animSpeed: 250,
    indentChildren: true,
    childrenIndenter: ''
});


// Countdown
$('.countdown').each(function() {
    var count = $(this);
    $(this).countdown({
        zeroCallback: function(options) {
            var newDate = new Date(),
                newDate = newDate.setHours(newDate.getHours() + 130);

            $(count).attr("data-countdown", newDate);
            $(count).countdown({
                unixFormat: true
            });
        }
    });
});

$('.btn').button();

$("[rel='tooltip']").tooltip();

//$("[data-toggle='tooltip']").popover({trigger: 'hover', placement: 'left',delay: { show: 500, hide: 100 }});




//$("[data-toggle='tooltip']").popover('toggle');

$('.form-group').each(function() {
    var self = $(this),
        input = self.find('input');

    input.focus(function() {
        self.addClass('form-group-focus');
    })

    input.blur(function() {
        if (input.val()) {
            self.addClass('form-group-filled');
        } else {
            self.removeClass('form-group-filled');
        }
        self.removeClass('form-group-focus');
    });
});





$('.typeahead_int').typeahead({
    hint: true,
    highlight: true,
    minLength: 3,
    limit: 8
}, {
    source: function(q, cb) {	
        var  rrr = $.ajax({
            dataType: 'json',
            type: 'get',
            url: '/autoCompleteCity/international?q='+q,
            //url: 'http://gd.geobytes.com/AutoCompleteCity?callback=?&q=new',
            cache: false,
            contentType: "application/json",
            success: function(data) {
        	
                var result = [];
                $.each(data, function(index, val) {
                    result.push({
                        value: val
                    });
                });                
                cb(result);
            }
        });
        //alert(rrr);
    }
});



$('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
    todayHighlight: true,
    format: 'yyyy-mm-dd',
    autoclose: true
});



/*$('input.date-pick, .input-daterange input[name="start_r"]').datepicker('setDate', '+1d');
$('.input-daterange input[name="end_r"]').datepicker('setDate', '+7d');
$('input.date-pick, .input-daterange input[name="start_o"]').datepicker('setDate', '+1d');
$('.input-daterange input[name="end"]').datepicker('setDate', '+7d');
*/


$('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})

$('input.date-pick-years').datepicker({
    startView: 2
});


$('.booking-item-price-calc .checkbox label').click(function() {
    var checkbox = $(this).find('input'),
        // checked = $(checkboxDiv).hasClass('checked'),
        checked = $(checkbox).prop('checked'),
        price = parseInt($(this).find('span.pull-right').html().replace('$', '')),
        eqPrice = $('#car-equipment-total'),
        tPrice = $('#car-total'),
        eqPriceInt = parseInt(eqPrice.attr('data-value')),
        tPriceInt = parseInt(tPrice.attr('data-value')),
        value,
        animateInt = function(val, el, plus) {
            value = function() {
                if (plus) {
                    return el.attr('data-value', val + price);
                } else {
                    return el.attr('data-value', val - price);
                }
            };
            return $({
                val: val
            }).animate({
                val: parseInt(value().attr('data-value'))
            }, {
                duration: 500,
                easing: 'swing',
                step: function() {
                    if (plus) {
                        el.text(Math.ceil(this.val));
                    } else {
                        el.text(Math.floor(this.val));
                    }
                }
            });
        };
    if (!checked) {
        animateInt(eqPriceInt, eqPrice, true);
        animateInt(tPriceInt, tPrice, true);
    } else {
        animateInt(eqPriceInt, eqPrice, false);
        animateInt(tPriceInt, tPrice, false);
    }
});


$('div.bg-parallax').each(function() {
    var $obj = $(this);
    if($(window).width() > 992 ){
        $(window).scroll(function() {
            var animSpeed;
            if ($obj.hasClass('bg-blur')) {
                animSpeed = 10;
            } else {
                animSpeed = 15;
            }
            var yPos = -($(window).scrollTop() / animSpeed);
            var bgpos = '50% ' + yPos + 'px';
            $obj.css('background-position', bgpos);

        });
    }
});



$(document).ready(
    function() {

    $('html').niceScroll({
        cursorcolor: "#000",
        cursorborder: "0px solid #fff",
        railpadding: {
            top: 0,
            right: 0,
            left: 0,
            bottom: 0
        },
        cursorwidth: "10px",
        cursorborderradius: "0px",
        cursoropacitymin: 0.2,
        cursoropacitymax: 0.8,
        //boxzoom: true,
        horizrailenabled: false,
        zindex: 9999,
        
        bouncescroll: true,        
        //touchbehavior:true
        grabcursorenabled: true
        
    });


        // Owl Carousel
        var owlCarousel = $('#owl-carousel'),
            owlItems = owlCarousel.attr('data-items'),
            owlCarouselSlider = $('#owl-carousel-slider'),
            owlNav = owlCarouselSlider.attr('data-nav');
        // owlSliderPagination = owlCarouselSlider.attr('data-pagination');

        owlCarousel.owlCarousel({
            items: owlItems,
            navigation: true,
            navigationText: ['', '']
        });

        owlCarouselSlider.owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            // pagination: owlSliderPagination,
            singleItem: true,
            navigation: true,
            navigationText: ['', ''],
            transitionStyle: 'fade',
            autoPlay: 4500
        });


    // footer always on bottom
    var docHeight = $(window).height();
   var footerHeight = $('#main-footer').height();
   var footerTop = $('#main-footer').position().top + footerHeight;
   
   if (footerTop < docHeight) {
    $('#main-footer').css('margin-top', (docHeight - footerTop) + 'px');
   }
    }
);


$('.nav-drop').dropit();


$("#price-slider").ionRangeSlider({
    type: 'double',
    prefix: "Rs ",
    // maxPostfix: "+",
    prettify: false,
    hasGrid: true,
    onChange: function (obj) {      // callback is called on every slider change
        //console.log(obj.fromNumber +':'+obj.toNumber);
        returnFlight(obj.fromNumber,obj.toNumber);
    }
});
function showallflights()
{
	 var res= $("#onwardtrip_ul span.onward_fare");
     var i=0;
     for(i=0;i<res.length;i++)
 	 {
     	var id=res[i].id.split("_")[1];
     	$('#onwardli'+id).removeClass('show hide');        	  	
 	 }
     var res= $("#returntrip_ul span.return_fare");          
     for(i=0;i<res.length;i++)
 	 {
     	var id=res[i].id.split("_")[1];
     	$('#returnli'+id).removeClass('show hide');        	  	
 	 }
}
function returnFlight(from,to)
{	 
	var i=0;
	showallflights();
    var res= $("#onwardtrip_ul span.onward_fare");        
    for(i=0;i<res.length;i++)
	{
    	var id=res[i].id.split("_")[1];
    	if(res[i].innerHTML >=from && res[i].innerHTML <=to)        	        		        		
    		$('#onwardli'+id).addClass('show');        	
    	else        		        	        		
    		$('#onwardli'+id).addClass('hide');        		
	}
    
    var res= $("#returntrip_ul span.return_fare");        
    for(i=0;i<res.length;i++)
	{
    	var id=res[i].id.split("_")[1];
    	if(res[i].innerHTML >=from && res[i].innerHTML <=to)        	        		        		
    		$('#returnli'+id).addClass('show');        	
    	else        		        	        		
    		$('#returnli'+id).addClass('hide');        		
	}        
}       


$('.i-check, .i-radio').iCheck({
    checkboxClass: 'i-check',
    radioClass: 'i-radio'
});




$('.booking-item-review-expand').click(function(event) {
    console.log('baz');
    var parent = $(this).parent('.booking-item-review-content');
    if (parent.hasClass('expanded')) {
        parent.removeClass('expanded');
    } else {
        parent.addClass('expanded');
    }
});


$('.stats-list-select > li > .booking-item-rating-stars > li').each(function() {
    var list = $(this).parent(),
        listItems = list.children(),
        itemIndex = $(this).index();

    $(this).hover(function() {
        for (var i = 0; i < listItems.length; i++) {
            if (i <= itemIndex) {
                $(listItems[i]).addClass('hovered');
            } else {
                break;
            }
        };
        $(this).click(function() {
            for (var i = 0; i < listItems.length; i++) {
                if (i <= itemIndex) {
                    $(listItems[i]).addClass('selected');
                } else {
                    $(listItems[i]).removeClass('selected');
                }
            };
        });
    }, function() {
        listItems.removeClass('hovered');
    });
});

$('.booking-item-container').children('.booking-item').click(function(event) {

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).parent().removeClass('active');
    } else {
        $(this).addClass('active');
        $(this).parent().addClass('active');
        $(this).delay(1500).queue(function() {
            $(this).addClass('viewed')
        });
    }
});



$('.form-group-cc-number input').payment('formatCardNumber');
$('.form-group-cc-date input').payment('formatCardExpiry');
$('.form-group-cc-cvc input').payment('formatCardCVC');



if ($('#map-canvas').length) {
    var map,
        service;

    jQuery(function($) {
        $(document).ready(function() {
            var latlng = new google.maps.LatLng(latitude, langitude);
            
            var myOptions = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);


            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            marker.setMap(map);


            $('a[href="#google-map-tab"]').on('shown.bs.tab', function(e) {
                google.maps.event.trigger(map, 'resize');
                map.setCenter(latlng);
            });
        });
    });
}


$('.card-select > li').click(function() {
    //self = this;
    $(this).addClass('card-item-selected');
    $(this).siblings('li').removeClass('card-item-selected');
    $('.form-group-cc-number input').click(function() {
        $(this).removeClass('card-item-selected');
    });
});
// Lighbox gallery
$('#popup-gallery').each(function() {
    $(this).magnificPopup({
        delegate: 'a.popup-gallery-image',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

// cghbox image
$('.popup-image').magnificPopup({
    type: 'image'
});

// Lighbox text
$('.popup-text').magnificPopup({
    removalDelay: 500,
    closeBtnInside: true,
    callbacks: {
        beforeOpen: function() {
            this.st.mainClass = this.st.el.attr('data-effect');
        }
    },
    midClick: true
});

// Lightbox iframe
$('.popup-iframe').magnificPopup({
    dispableOn: 700,
    type: 'iframe',
    removalDelay: 160,
    mainClass: 'mfp-fade',
    preloader: false
});


$('.form-group-select-plus').each(function() {
    var self = $(this),
        btnGroup = self.find('.btn-group').first(),
        select = self.find('select');
    btnGroup.children('label').last().click(function() {
        btnGroup.addClass('hidden');
        select.removeClass('hidden');
    });
});
// Responsive videos
$(document).ready(function() {
    $("body").fitVids();    
});

$(function($) {
    $("#twitter").tweet({
        username: "remtsoy", //!paste here your twitter username!
        count: 3
    });
});

$(function($) {
    $("#twitter-ticker").tweet({
        username: "remtsoy", //!paste here your twitter username!
        page: 1,
        count: 20
    });
});

$(document).ready(function() {
    var ul = $('#twitter-ticker').find(".tweet-list");
    var ticker = function() {
        setTimeout(function() {
            ul.find('li:first').animate({
                marginTop: '-4.7em'
            }, 850, function() {
                $(this).detach().appendTo(ul).removeAttr('style');
            });
            ticker();
        }, 5000);
    };
    ticker();
    var d = new Date();

    var currDate = d.getDate();
    var currMonth = d.getMonth();
    var currYear = d.getFullYear();

    var start_dateStr = currYear + "-" + (currMonth+1) + "-" + currDate;
    var end_dateStr = (currYear+1) + "-" + (currMonth+1) + "-" + currDate ;        
    $('#start_r').datepicker({
    	todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    	startDate: start_dateStr,
        endDate: end_dateStr        
    }).on('changeDate', function(e){
        if(trip_Name == 'ROUND')
        {
    	if($('#start_r').val() == ""){$('#start_r').datepicker('setDate', 'today');}
    	var onward_date = e.date;
    	var start_return_dateStr = onward_date.getFullYear() + "-" + (onward_date.getMonth()+1) + "-" + onward_date.getDate();
        var end_return_dateStr = (onward_date.getFullYear() + 1) + "-" + (onward_date.getMonth()+1) + "-" + onward_date.getDate();
        
    	 $('#end_r').datepicker({
    	    	todayHighlight: true,
    	        format: 'yyyy-mm-dd',
    	        autoclose: true,
    	    	startDate: start_return_dateStr,
    	        endDate: end_return_dateStr        
    	    });        
    	 $('#end_r').datepicker('setDate', start_return_dateStr);    	 
    	 $('#end_r').datepicker('setStartDate',start_return_dateStr);
        }
    });
    $('#start_r').datepicker('setDate', 'today');
    
    
        
    /*$('#date_depart_o').datepicker({
    	todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    	startDate: start_dateStr,
        endDate: end_dateStr        
    });     
    $('#date_depart_o').datepicker('setDate', 'today');*/    
});
$(function() {
    $('#ri-grid').gridrotator({
        rows: 4,
        columns: 8,
        animType: 'random',
        animSpeed: 1200,
        interval: 1200,
        step: 'random',
        preventClick: false,
        maxStep: 2,
        w992: {
            rows: 5,
            columns: 4
        },
        w768: {
            rows: 6,
            columns: 3
        },
        w480: {
            rows: 8,
            columns: 3
        },
        w320: {
            rows: 5,
            columns: 4
        },
        w240: {
            rows: 6,
            columns: 4
        }
    });

});


$(function() {            
    $('#ri-grid-no-animation').gridrotator({
        rows: 4,
        columns: 8,
        slideshow: false,
        w1024: {
            rows: 4,
            columns: 6
        },
        w768: {
            rows: 3,
            columns: 3
        },
        w480: {
            rows: 4,
            columns: 4
        },
        w320: {
            rows: 5,
            columns: 4
        },
        w240: {
            rows: 6,
            columns: 4
        }
    });

});

var tid = setInterval(tagline_vertical_slide, 2500);

// vertical slide
function tagline_vertical_slide() {
    var curr = $("#tagline ul li.active");
    curr.removeClass("active").addClass("vs-out");
    setTimeout(function() {
        curr.removeClass("vs-out");
    }, 500);

    var nextTag = curr.next('li');
    if (!nextTag.length) {
        nextTag = $("#tagline ul li").first();
    }
    nextTag.addClass("active");
}

function abortTimer() { // to be called when you want to stop the timer
    clearInterval(tid);
}
function isNumeric(eventObj){var keycode;if(eventObj.keyCode)
keycode=eventObj.keyCode;else if(eventObj.Which)
keycode=eventObj.Which;else
keycode=eventObj.charCode;if(keycode!=9&keycode!=8)
{if((keycode>=48&&keycode<=57) || keycode==39 || keycode==37 || keycode==8 || keycode==46 )
return true;else
return false;}}

