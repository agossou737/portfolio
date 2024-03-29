// (function ($) {
//     "use strict";

//     // Navbar on scrolling
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 200) {
//             $('.navbar').fadeIn('slow').css('display', 'flex');
//         } else {
//             $('.navbar').fadeOut('slow').css('display', 'none');
//         }
//     });


//     // Smooth scrolling on the navbar links
//     $(".navbar-nav a").on('click', function (event) {
//         if (this.hash !== "") {
//             event.preventDefault();

//             $('html, body').animate({
//                 scrollTop: $(this.hash).offset().top - 45
//             }, 1500, 'easeInOutExpo');

//             if ($(this).parents('.navbar-nav').length) {
//                 $('.navbar-nav .active').removeClass('active');
//                 $(this).closest('a').addClass('active');
//             }
//         }
//     });


//     // Typed Initiate
//     if ($('.typed-text-output').length == 1) {
//         var typed_strings = $('.typed-text').text();
//         var typed = new Typed('.typed-text-output', {
//             strings: typed_strings.split(', '),
//             typeSpeed: 100,
//             backSpeed: 20,
//             smartBackspace: false,
//             loop: true
//         });
//     }


//     // Modal Video
//     $(document).ready(function () {
//         var $videoSrc;
//         $('.btn-play').click(function () {
//             $videoSrc = $(this).data("src");
//         });
//         console.log($videoSrc);

//         $('#videoModal').on('shown.bs.modal', function (e) {
//             $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
//         })

//         $('#videoModal').on('hide.bs.modal', function (e) {
//             $("#video").attr('src', $videoSrc);
//         })
//     });


//     // Scroll to Bottom
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 100) {
//             $('.scroll-to-bottom').fadeOut('slow');
//         } else {
//             $('.scroll-to-bottom').fadeIn('slow');
//         }
//     });


//     // Skills
//     $('.skill').waypoint(function () {
//         $('.progress .progress-bar').each(function () {
//             $(this).css("width", $(this).attr("aria-valuenow") + '%');
//         });
//     }, {offset: '80%'});


//     // Portfolio isotope and filter
//     var portfolioIsotope = $('.portfolio-container').isotope({
//         itemSelector: '.portfolio-item',
//         layoutMode: 'fitRows'
//     });
//     $('#portfolio-flters li').on('click', function () {
//         $("#portfolio-flters li").removeClass('active');
//         $(this).addClass('active');

//         portfolioIsotope.isotope({filter: $(this).data('filter')});
//     });


//     // Back to top button
//     $(window).scroll(function () {
//         if ($(this).scrollTop() > 200) {
//             $('.back-to-top').fadeIn('slow');
//         } else {
//             $('.back-to-top').fadeOut('slow');
//         }
//     });
//     $('.back-to-top').click(function () {
//         $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
//         return false;
//     });


//     // Testimonials carousel
//     $(".testimonial-carousel").owlCarousel({
//         autoplay: true,
//         smartSpeed: 1500,
//         dots: true,
//         loop: true,
//         items: 1
//     });

// })(jQuery);



function _0x2f3a(){var _0x21052a=['28tPDjcn','.navbar-nav\x20a','text','scrollTop','80%','click','#videoModal','.skill','split','.navbar','parents','offset','html,\x20body','28rlJerD','css','4820tJmiTv','waypoint','hide.bs.modal','fadeOut','active','.progress\x20.progress-bar','animate','each','.navbar-nav','.portfolio-container','easeInOutExpo','display','388020UIeoxo','?autoplay=1&amp;modestbranding=1&amp;showinfo=0','src','slow','shown.bs.modal','1849AglaLz','#video','1187316jnPpsV','3872331Qxgahq','.testimonial-carousel','24iIHLzp','fitRows','1635557zqKefZ','removeClass','ready','scroll','flex','isotope','addClass','1683708YjWMSp','top','filter','.typed-text-output','length','data','16QYjEtc','hash','owlCarousel','preventDefault','log','17534FgvbZp','attr','width','.back-to-top','fadeIn'];_0x2f3a=function(){return _0x21052a;};return _0x2f3a();}function _0x313c(_0x563cf7,_0x351733){var _0x2f3adf=_0x2f3a();return _0x313c=function(_0x313c59,_0x59188d){_0x313c59=_0x313c59-0x86;var _0xe252c6=_0x2f3adf[_0x313c59];return _0xe252c6;},_0x313c(_0x563cf7,_0x351733);}(function(_0x10ac5a,_0xc8421e){var _0x2a4d1a=_0x313c,_0x314d1d=_0x10ac5a();while(!![]){try{var _0xa8d025=parseInt(_0x2a4d1a(0x87))/0x1*(parseInt(_0x2a4d1a(0xb2))/0x2)+parseInt(_0x2a4d1a(0x95))/0x3+parseInt(_0x2a4d1a(0xa5))/0x4*(parseInt(_0x2a4d1a(0xc0))/0x5)+parseInt(_0x2a4d1a(0x8c))/0x6*(parseInt(_0x2a4d1a(0x8e))/0x7)+-parseInt(_0x2a4d1a(0x9b))/0x8*(parseInt(_0x2a4d1a(0x8a))/0x9)+parseInt(_0x2a4d1a(0xb4))/0xa*(-parseInt(_0x2a4d1a(0xa0))/0xb)+parseInt(_0x2a4d1a(0x89))/0xc;if(_0xa8d025===_0xc8421e)break;else _0x314d1d['push'](_0x314d1d['shift']());}catch(_0x189067){_0x314d1d['push'](_0x314d1d['shift']());}}}(_0x2f3a,0x82a1f),function(_0x34a483){'use strict';var _0x698d4e=_0x313c;_0x34a483(window)['scroll'](function(){var _0xdb8cd8=_0x313c;_0x34a483(this)['scrollTop']()>0xc8?_0x34a483(_0xdb8cd8(0xae))[_0xdb8cd8(0xa4)]('slow')[_0xdb8cd8(0xb3)]('display',_0xdb8cd8(0x92)):_0x34a483(_0xdb8cd8(0xae))[_0xdb8cd8(0xb7)]('slow')[_0xdb8cd8(0xb3)](_0xdb8cd8(0xbf),'none');}),_0x34a483(_0x698d4e(0xa6))['on'](_0x698d4e(0xaa),function(_0x2e9636){var _0x96697d=_0x698d4e;this[_0x96697d(0x9c)]!==''&&(_0x2e9636[_0x96697d(0x9e)](),_0x34a483(_0x96697d(0xb1))[_0x96697d(0xba)]({'scrollTop':_0x34a483(this['hash'])[_0x96697d(0xb0)]()[_0x96697d(0x96)]-0x2d},0x5dc,_0x96697d(0xbe)),_0x34a483(this)[_0x96697d(0xaf)](_0x96697d(0xbc))[_0x96697d(0x99)]&&(_0x34a483('.navbar-nav\x20.active')[_0x96697d(0x8f)](_0x96697d(0xb8)),_0x34a483(this)['closest']('a')['addClass'](_0x96697d(0xb8))));});if(_0x34a483('.typed-text-output')[_0x698d4e(0x99)]==0x1)var _0x2eb844=_0x34a483('.typed-text')[_0x698d4e(0xa7)](),_0xacba6d=new Typed(_0x698d4e(0x98),{'strings':_0x2eb844[_0x698d4e(0xad)](',\x20'),'typeSpeed':0x64,'backSpeed':0x14,'smartBackspace':![],'loop':!![]});_0x34a483(document)[_0x698d4e(0x90)](function(){var _0x5f5ab7=_0x698d4e,_0x522e12;_0x34a483('.btn-play')[_0x5f5ab7(0xaa)](function(){var _0x4d275e=_0x5f5ab7;_0x522e12=_0x34a483(this)[_0x4d275e(0x9a)]('src');}),console[_0x5f5ab7(0x9f)](_0x522e12),_0x34a483('#videoModal')['on'](_0x5f5ab7(0x86),function(_0x5a7a35){var _0xf66d66=_0x5f5ab7;_0x34a483(_0xf66d66(0x88))[_0xf66d66(0xa1)](_0xf66d66(0xc2),_0x522e12+_0xf66d66(0xc1));}),_0x34a483(_0x5f5ab7(0xab))['on'](_0x5f5ab7(0xb6),function(_0x11c5c7){var _0x1ef929=_0x5f5ab7;_0x34a483(_0x1ef929(0x88))['attr']('src',_0x522e12);});}),_0x34a483(window)[_0x698d4e(0x91)](function(){var _0x2c07d8=_0x698d4e;_0x34a483(this)[_0x2c07d8(0xa8)]()>0x64?_0x34a483('.scroll-to-bottom')[_0x2c07d8(0xb7)]('slow'):_0x34a483('.scroll-to-bottom')[_0x2c07d8(0xa4)](_0x2c07d8(0xc3));}),_0x34a483(_0x698d4e(0xac))[_0x698d4e(0xb5)](function(){var _0x31136a=_0x698d4e;_0x34a483(_0x31136a(0xb9))[_0x31136a(0xbb)](function(){var _0x59f153=_0x31136a;_0x34a483(this)[_0x59f153(0xb3)](_0x59f153(0xa2),_0x34a483(this)['attr']('aria-valuenow')+'%');});},{'offset':_0x698d4e(0xa9)});var _0x33bcbe=_0x34a483(_0x698d4e(0xbd))[_0x698d4e(0x93)]({'itemSelector':'.portfolio-item','layoutMode':_0x698d4e(0x8d)});_0x34a483('#portfolio-flters\x20li')['on'](_0x698d4e(0xaa),function(){var _0x1aa119=_0x698d4e;_0x34a483('#portfolio-flters\x20li')['removeClass']('active'),_0x34a483(this)[_0x1aa119(0x94)](_0x1aa119(0xb8)),_0x33bcbe['isotope']({'filter':_0x34a483(this)[_0x1aa119(0x9a)](_0x1aa119(0x97))});}),_0x34a483(window)[_0x698d4e(0x91)](function(){var _0x27f5da=_0x698d4e;_0x34a483(this)[_0x27f5da(0xa8)]()>0xc8?_0x34a483(_0x27f5da(0xa3))[_0x27f5da(0xa4)](_0x27f5da(0xc3)):_0x34a483(_0x27f5da(0xa3))[_0x27f5da(0xb7)](_0x27f5da(0xc3));}),_0x34a483(_0x698d4e(0xa3))['click'](function(){var _0x2dfc96=_0x698d4e;return _0x34a483('html,\x20body')[_0x2dfc96(0xba)]({'scrollTop':0x0},0x5dc,_0x2dfc96(0xbe)),![];}),_0x34a483(_0x698d4e(0x8b))[_0x698d4e(0x9d)]({'autoplay':!![],'smartSpeed':0x5dc,'dots':!![],'loop':!![],'items':0x1});}(jQuery));
