(function($) {
// 画面の高さとヘッダーの高さをカスタムプロパティに入れておく（スマホのアドレスバー対策）
const height = window.innerHeight;
const headerHeight = document.getElementById("js-measure").offsetHeight;
document.documentElement.style.setProperty("--windowHeight", height + "px");
document.documentElement.style.setProperty("--headerHeight", headerHeight + "px");

$("#js-openHamburger").on("click", function () {
  $("#js-hamburger").toggleClass("open");
  $('#js-hamburger__nav').slideToggle();
});

window.addEventListener("resize", function () {
  const width = $(window).width();
  if(width > 1200){
    $('#js-hamburger__nav').css('display','none');
  }
});

$('#js-top').click(function () {
  $('body,html').animate({
      scrollTop: 0//ページトップまでスクロール
  }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
  return false;//リンク自体の無効化
});

//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
  var scroll = $(window).scrollTop(); //スクロール値を取得
  if (scroll >= 200){
    $('#js-top').css('display','block');      
  }else{
    $('#js-top').css('display','none');    
  }
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

setTimeout(function() {
  $('.p-top__mv__sliderItem').eq(0).addClass('u-scale');
  $('.p-top__mv__slider').slick({ //{}を入れる
    autoplay: true, //「オプション名: 値」の形式で書く
    dots: false, //複数書く場合は「,」でつなぐ
    slidesToShow:1,
    arrows:false,
    autoplaySpeed: 8000,
    fade: true, // フェードインアニメーションを有効にする
    pauseOnHover: false,
  });
    $('.p-top__mv__slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    $('.p-top__mv__sliderItem').eq(currentSlide).removeClass('u-scale');
    $('.p-top__mv__sliderItem').eq(nextSlide).addClass('u-scale');
  });
}, 2000); 

$('.js-workSlider').slick({
    infinite: true,
    slidesToShow: 4, 
    slidesToScroll: 1,
    autoplay: false,
    speed:3000,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        autoplay:true,
        arrows:true,
        prevArrow: '<button type="button" class="slick-prev"></button>', // previous（前へ）矢印のHTMLを設定
        nextArrow: '<button type="button" class="slick-next"></button>' // next（次へ）矢印のHTMLを設定
      }
    },
    {
      breakpoint: 520,
      settings: {
        slidesToShow:1,
        autoplay:true
      }
    },
  ],
});

$('#js-staffSlider').slick({
  infinite: true,
  slidesToShow: 4,
  centerMode: true,   
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed:0, 
  speed:3000,
  cssEase: 'linear', 
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1,
      }
    }
  ],
});

$('.js-line-up__slider').slick({
  infinite: true,
  slidesToShow:4,
  //centerMode: true,
  //variableWidth: true, 
  //slidesToScroll: 1,
  autoplay: true,
  //autoplaySpeed: 0,/*slickを滑らかに動かすための記述*/
  //speed: 5000,/*slickを滑らかに動かすための記述*/
  //cssEase: 'linear',/*slickを滑らかに動かすための記述*/
  prevArrow: '<button type="button" class="slick-prev p-line-up__slider__prev">Previous</button>',
  nextArrow: '<button type="button" class="slick-next p-line-up__slider__next">Next</button>',
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow:2,
      }
    },
    {
      breakpoint:520,
      settings: {
        slidesToShow:2,
      }
    },
  ]
});




window.addEventListener("resize", function () {
  const height = window.innerHeight;
  const headerHeight = document.getElementById("js-measure").offsetHeight;

  document.documentElement.style.setProperty("--windowHeight", height + "px");
  document.documentElement.style.setProperty(
    "--headerHeight",
    headerHeight + "px"
  );
});


$('.other-month').remove();
$('.p-event__blog__listItem').hide();
const today = new Date();

// 年、月、日を取得
const todayYear = today.getFullYear();
const todayMonth = today.getMonth() + 1; // 0から始まるため+1が必要
const todayDate = today.getDate();

const formattedDate = `${todayYear}/${todayMonth.toString().padStart(2, '0')}/${todayDate.toString().padStart(2, '0')}`;

$('.p-event__blog__time').html(formattedDate);

$('.p-event__blog__listItem').each(function(index, element) {

    let todayStartDate = $(this).find('.p-event__blog__startDate').text().trim();
    let todayMatches = todayStartDate.match(/(\d+)月\s*(\d+),\s*(\d+)/);

    if (todayMatches) {
      todayStartMonth = parseInt(todayMatches[1], 10);
      todayStartDay = parseInt(todayMatches[2], 10);
      todayStartYear = parseInt(todayMatches[3], 10); // 年を取得
    }
    
    let todayEndDate = $(this).find('.p-event__blog__endDate').text().trim();
    let todayMatches2 = todayEndDate.match(/(\d+)月\s*(\d+),\s*(\d+)/);
  
    if (todayMatches2) {
      todayEndMonth = parseInt(todayMatches2[1], 10);
      todayEndDay = parseInt(todayMatches2[2], 10);
      todayEndYear = parseInt(todayMatches2[3], 10); // 年を取得
    }

    if ((todayYear > todayStartYear || (todayYear === todayStartYear && todayMonth > todayStartMonth) || (todayYear === todayStartYear && todayMonth === todayStartMonth && todayDate >= todayStartDay)) &&
        (todayYear < todayEndYear || (todayYear === todayEndYear && todayMonth < todayEndMonth) || (todayYear === todayEndYear && todayMonth === todayEndMonth && todayDate <= todayEndDay))) {
      $(this).show();
    }
  
});


const items = document.querySelectorAll('.p-event__blog__listItem');
for(let i = 0; i < items.length; i++){
  if( i >= 3){
    items[i].style.display = 'none';
  }
}


$('.p-event__blog__noPost').hide();
$(document).on('click', '.xo-event-calendar table.xo-month .month-dayname td div', function () {
  $('p-event__blog__noPost').hide();
  $('.p-event__blog__listItem').hide();
  let day = parseInt($(this).html().trim(), 10);
  let captionText = $(this).closest(".xo-month").find(".calendar-caption").text().trim();
  let matches = captionText.match(/(\d+)年\s*(\d+)月/);

  let year = parseInt(matches[1], 10);
  let month = parseInt(matches[2], 10);

  $('.p-event__blog__time').text(`${year}/${month}/${day}`);

  $('.p-event__blog__listItem').each(function() {
      let startDate = $(this).find('.p-event__blog__startDate').text().trim();
      let matches2 = startDate.match(/(\d+)月\s*(\d+),\s*(\d+)/);
      let startMonth = parseInt(matches2[1], 10);
      let startDay = parseInt(matches2[2], 10);
      let startYear = parseInt(matches2[3], 10);

      let endDate = $(this).find('.p-event__blog__endDate').text().trim();
      let matches3 = endDate.match(/(\d+)月\s*(\d+),\s*(\d+)/);
      let endMonth = parseInt(matches3[1], 10);
      let endDay = parseInt(matches3[2], 10);
      let endYear = parseInt(matches3[3], 10);

      if ((year > startYear || (year === startYear && month > startMonth) || (year === startYear && month === startMonth && day >= startDay)) &&
          (year < endYear || (year === endYear && month < endMonth) || (year === endYear && month === endMonth && day <= endDay))) {
          $(this).show();
     }
  });
});

function dayColor() {
let startYears = [];
let startMonths = [];
let startDays = [];
let endYears = [];
let endMonths = [];
let endDays = [];

$('.p-event__blog__listItem').each(function() {
  let startDateText = $(this).find('.p-event__blog__startDate').text().trim();
  let matches2 = startDateText.match(/(\d+)月\s*(\d+),\s*(\d+)/);
  startYears.push(parseInt(matches2[3], 10));
  startMonths.push(parseInt(matches2[1], 10));
  startDays.push(parseInt(matches2[2], 10));

  let endDateText = $(this).find('.p-event__blog__endDate').text().trim();
  let matches3 = endDateText.match(/(\d+)月\s*(\d+),\s*(\d+)/);
  endYears.push(parseInt(matches3[3], 10));
  endMonths.push(parseInt(matches3[1], 10));
  endDays.push(parseInt(matches3[2], 10));
});

$('.xo-event-calendar table.xo-month .month-dayname td div').each(function() {
  let day = parseInt($(this).html().trim(), 10);
  let captionText = $(this).closest(".xo-month").find(".calendar-caption").text().trim();
  let matches = captionText.match(/(\d+)年\s*(\d+)月/);
  let year = parseInt(matches[1], 10);
  let month = parseInt(matches[2], 10);

  for (let i = 0; i < startYears.length; i++) {
    let startYear = startYears[i];
    let startMonth = startMonths[i];
    let startDay = startDays[i];
    let endYear = endYears[i];
    let endMonth = endMonths[i];
    let endDay = endDays[i];

    if ((year > startYear || (year === startYear && month > startMonth) || (year === startYear && month === startMonth && day >= startDay)) &&
        (year < endYear || (year === endYear && month < endMonth) || (year === endYear && month === endMonth && day <= endDay))) {
        $(this).css('background','red');
    }
  }
});
}

dayColor();


$(document).on('click', '.xo-event-calendar table.xo-month button span', function(){
  $('.xo-event__wrap').css('opacity','0');
  $('#xo-event-calendar').ready(function() {
    setTimeout(function() {
      $('.other-month').remove();
      $('.xo-event__wrap').css('opacity','1');
      dayColor();
    },1000);
  });
});

$(document).on('click', '.xo-event-calendar table.xo-month td a', function(event){
  event.preventDefault(); // デフォルトの動作を無効化
});


//イベント詳細ページの日つけを取得して表示を整理し別の要素へ挿入する//
function formatDate(dateElementSelector, dateElementClass) {
  $(dateElementSelector).each(function() {
    let singleStart = $(this).text().trim();
    let singleStartMatches = singleStart.match(/(\d+)月\s*(\d+),\s*(\d+)/);
    let singleStartMonth = parseInt(singleStartMatches[1], 10);
    let singleStartDay = parseInt(singleStartMatches[2], 10);
    let singleStartYear = parseInt(singleStartMatches[3], 10);
    $(dateElementClass).prepend(`${singleStartYear}年${singleStartMonth}月${singleStartDay}日`);
    $(this).remove();
  });
}
// 使用例
formatDate('.p-event__start__date', '.p-event__single__startDate');
formatDate('.p-event__end__date', '.p-event__single__endDate');



// 動きのきっかけとなるアニメーションの名前を定義
function fadeAnime(){

  // ふわっ
  $('.js-up').each(function(){ //fadeUpTriggerというクラス名が
    var elemPos = $(this).offset().top-50;//要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
    $(this).addClass('u-up');// 画面内に入ったらfadeUpというクラス名を追記
    }else{
    $(this).removeClass('u-up');// 画面外に出たらfadeUpというクラス名を外す
    }
  });
}

// 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function (){
    fadeAnime();/* アニメーション用の関数を呼ぶ*/
  });// ここまで画面をスクロールをしたら動かしたい場合の記述

  setTimeout(function() {
  fadeAnime();/* アニメーション用の関数を呼ぶ*/
  // ここまで画面が読み込まれたらすぐに動かしたい場合の記述
  }, 2000);

  const spinner = document.getElementById('loading');
  // setTimeoutを使用してクラスを追加を遅延実行
  setTimeout(function() {
    spinner.classList.add('loaded');
  }, 2000); // 2000ミリ秒（2秒）後にクラスを追加

  //mvテキストアニメーション
  setTimeout(function() {
    $('.p-top__mv__txt').addClass('u-up')
  }, 2500); // 2000ミリ秒（2秒）後にクラスを追加*/
  
function mousePosition(a, b) {
  const mouse = document.querySelector(".u-mouse");
  window.onmousemove = (e) => {
    const x = e.clientX;
    const y = e.clientY;
    mouse.style.transform = `translate(${x}px, ${y}px) translate(-${a}%, -${b}%)`;
  };
}

mousePosition(23, 23);

function scale(element){
  $(element).each(function() {
    $(this).on('mouseover', function() {
      $('.u-mouse').addClass('u-mouse__hovered');
      mousePosition(50, 50);
    }).on('mouseout', function() {
      $('.u-mouse').removeClass('u-mouse__hovered');
      mousePosition(23, 23);
    });
  });
}

/*
function scale(element){
  $(element).each(function() {
    $(this).on('mouseover', function() {
      if(!$(this).hasClass('other-month')) { // other-monthクラスを持つ場合は処理しない
        $('.u-mouse').addClass('u-mouse__hovered');
        mousePosition(50, 50);
      }
    }).on('mouseout', function() {
      if(!$(this).hasClass('other-month')) { // other-monthクラスを持つ場合は処理しない
        $('.u-mouse').removeClass('u-mouse__hovered');
        mousePosition(23, 23);
      }
    });
  });
}
*/

scale('a');
scale('.p-form__button');
scale('.p-contact__button');


function hovered() {
  const width = $(window).width();
  if (width > 768) {
    $(document).on('mousemove', function(event) {
      if ($(event.target).hasClass('u-hovered')) {
        $(event.target).css('opacity', '1');
      }
    });
  } else {
    $(document).on('mousemove', function(event) {
      if ($(event.target).hasClass('u-hovered')) {
        $(event.target).css('opacity', '0');
      }
    });
  }

  // '.p-exterior__lineUp__item'要素がmouseoutされたときの処理
  $('.p-exterior__lineUp__item').mouseout(function() {
    $(this).css('opacity', '0');
  });
}

hovered();

window.addEventListener("resize", function () {
  hovered();
});




$(document).on('mousemove', function(event) {
  if ($(event.target).hasClass('c-overlay')) {
    $(event.target).find('.c-overlay__img').addClass('c-overlay__anime');
    $(event.target).addClass('c-overlay__after');
  }
}).on('mouseout', function(event) {
  $(event.target).find('.c-overlay__img').removeClass('c-overlay__anime');
  $(event.target).removeClass('c-overlay__after');
});

  //mousemoveはevent.target を取得できる
  //onmousemoveはevent.target を取得できない
  setTimeout(function() {
  $('.js-opacity').css('opacity','0');
  },4000)
 
var googleMapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.347272732625!2d130.51804647561133!3d31.51462067421655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e6430dc230151%3A0x4b1dce406f19099d!2z44CSODkxLTAxMjMg6bm_5YWQ5bO255yM6bm_5YWQ5bO25biC5Y245pys55S677yW4oiS77yU!5e0!3m2!1sja!2sjp!4v1708686059523!5m2!1sja!2sjp";
  
  $.ajax({
    url: googleMapUrl,
    dataType: "html",
    success: function(response){
        var iframeCode = '<iframe src="' + googleMapUrl + '" width="100%" height="342" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        $(".p-guide__access__content").prepend(iframeCode);
      }
  });


})(jQuery);

    
  
