(function($) {
  
//完成までの流れの高さを取得してcssで使用する//
const listElement = document.querySelector(".p-flow__list");
const listHeight = listElement.offsetHeight;
document.documentElement.style.setProperty("--listHeight", listHeight + "px");

window.addEventListener("resize", function () {
  const listElement = document.querySelector(".p-flow__list");
  const listHeight = listElement.offsetHeight;
  document.documentElement.style.setProperty("--listHeight", listHeight + "px");
});

function fadeAnime() {
  $('.js-color').each(function () {
    const itemHeight = $(this).outerHeight();
    var windowHeight = $(window).height(); 
    var fortyVH = windowHeight * 0.45; // 45vhに相当するピクセル値を計算
    var elemPos = $(this).offset().top - fortyVH - 10;
    var endElemPos = elemPos + itemHeight;
    var scroll = $(window).scrollTop();
    if (scroll > elemPos && scroll < endElemPos) {
      $(this).css('background', '#F0F0F0');
    } else {
      $(this).css('background', 'initial');
    }
  });
}

$(window).scroll(function () {
  fadeAnime();
});

fadeAnime();

})(jQuery);