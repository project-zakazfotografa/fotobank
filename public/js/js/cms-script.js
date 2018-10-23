
//// menu tabs
$('.cms-menu__item').click(function() {
  $(this).addClass('cms-menu__item--active').siblings().removeClass('cms-menu__item--active');
  $(this).closest('.cms').find('.cms-content__item').hide().eq($(this).index()).show();
});


//// переключение в таблице
$('.cms-btn--check__wrap').on("click", function() {
  $(this).toggleClass('cms-btn--check__active');
});

//// edit user
// show block
$('.cms-table__edit-button').click(function () {
  $('.cms-edit-user').show();
  $('.overlay').show();
});
// hide block
jQuery(function($){
	$(document).mouseup(function (e){
		var div = $('.cms-edit-user');
		if (!div.is(e.target)
		    && div.has(e.target).length === 0) {
			div.hide();
      $('.overlay').hide();
		}
	});
});
