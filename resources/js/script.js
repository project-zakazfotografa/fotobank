$(".advert__review_btn").click(function(){
  $(this).hide();
})
var give_code_check = true;
$("#btn-give-code").click(function(){
	if(give_code_check){
  		$('#login-sms').show();
  		$('#login').hide();
	}

})
/*function code(){
	if(give_code_check){
  		$('#login-sms').show();
  		$('#login').hide();
	}
}*/

$("#btn-back-to-log").click(function(){
  $('#login-sms').hide();
  $('#login').show();
})

function valid_input(){
	var id = $(this).attr('id');
    var val = $(this).val();
    switch(id){
    	case 'login-phone':
           var regexp_tel = /^\d{10}$/;
           if(regexp_tel.test(val)){
              $(this).removeClass('login-control-invalid');
              $(this).siblings('.login-control-invalid-feedback').hide();
              give_code_check = true;
              return true;
          }
           else{
              $(this).addClass('login-control-invalid');
              $(this).siblings('.login-control-invalid-feedback').show();
              give_code_check = false;
              return false;

           }
       break;
       case 'login-code':
       		var regexp_code = /^\d{4}$/;
           	if(regexp_code.test(val)){
              $(this).removeClass('login-control-invalid');
              $(this).siblings('.login-control-invalid-feedback').hide();
              return true;
          	}
           	else{
              $(this).addClass('login-control-invalid');
              $(this).siblings('.login-control-invalid-feedback').show();
              return false;
           	}

    }
	return false;
}

// $(function(){
// 	console.log($("#login-phone"));
//  	$("#login-phone").mask("(999) 999-99-99", {placeholder: "(xxx) xxx-xx-xx" });
// });

$('.tabs-nav__item').click(function() {
  $(this).addClass('tabs-nav__item--active').siblings().removeClass('tabs-nav__item--active');
  $(this).closest('.tabs').find('.tabs-content > div').hide().eq($(this).index()).show();
});


// show hide contact info
$.fn.textToggle = function(d, b, e) {
   return this.each(function(f, a) {
       a = $(a);
       var c = $(d).eq(f),
           g = [b, c.text()],
           h = [a.text(), e];
       c.text(b).show();
       $(a).click(function(b) {
           b.preventDefault();
           c.text(g.reverse()[0]);
           a.text(h.reverse()[0])
       })
   })
};
$(function(){
  $('.user-contacts-site--show').textToggle(".user-contacts-site","");
  $('.user-contacts-email--show').textToggle(".user-contacts-email","");
});

$('.user-contacts-site--show').click(function () {
  $(this).hide();
});
$('.user-contacts-email--show').click(function () {
  $(this).hide();
});

$(function(){
  $('.contact-tel--show').textToggle(".contact-tel--hide","+7 XXX XXX-XX-XX")
});

// filters show more
$('.filter__show-more').click(function () {
  $(this).closest('.filter-type').find('.filter-list').toggleClass('filter-list--open');
});


// popup gallery
$('.js-photo-popup').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  closeBtnInside: false,
  fixedContentPos: true,
  mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
  image: {
    verticalFit: true
  },
  zoom: {
    enabled: true,
    duration: 300 // don't foget to change the duration also in CSS
  }
});

// $(function(){
// $('.click-tel').textToggle(".hide-tail","+7XXXXXXX","скрыть телефон")
// });


/*$(document).ready(function (){
	$('input').unbind().blur( function(){
		valid_input.call(this);
	});

});*/
