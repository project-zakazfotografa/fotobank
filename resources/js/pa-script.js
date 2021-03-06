$('.pa-user__features-item').click(function() {
  $(this).toggleClass('pa-user__features-item--active');
});

$('.pa-menu__nav-item').click(function() {
  $(this).addClass('pa-menu__nav-item--active').siblings().removeClass('pa-menu__nav-item--active');
  $(this).closest('.pa-menu').find('.pa-menu__tabs-content > div').hide().eq($(this).index()).show();
});


// options free
function userPriceFree() {
  if ($(this).is(":checked")) {
    $(this).closest('.pa-user__price-item').find('.pa-user__price-count input').attr("disabled", true);
  } else {
    $(this).closest('.pa-user__price-item').find('.pa-user__price-count input').attr("disabled", false);
  }
}
$('.pa-user__price-free input').change(function() {
  userPriceFree();
});

$('.user-page__price').on("DOMNodeInserted", function (event) {
  $('.pa-user__price-free input').change(function() {
    if ($(this).is(":checked")) {
      $(this).closest('.pa-user__price-item').find('.pa-user__price-count input').attr("disabled", true);
    } else {
      $(this).closest('.pa-user__price-item').find('.pa-user__price-count input').attr("disabled", false);
    }
  });
});

$(".sortable").sortable({});


// clone price item
$('.pa-user__price-add').click(function () {
  $('.pa-user__price-item-new').clone().appendTo(".pa-user__price-bottom");
  $('.pa-user__price-item:not(:last-child)').removeClass('pa-user__price-item-new');
});


// click tag
$('.pa-tag label').click(function () {
  $(this).parent().addClass('pa-tag--active');
  // $(this).toggleClass('test');
});

$('.pa-tag label').click(function () {

  var paTagInput = $(this).find('input');

  $(paTagInput).change(function () {
    if ($(this).is(":checked")) {
      $(this).closest('.pa-tag').addClass('pa-tag--active');
    } else {
      $(this).closest('.pa-tag').removeClass('pa-tag--active');
    }
  });

});
