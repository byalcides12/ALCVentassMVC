/*
Name:           Trixter
Written by:     Theme-fly - (https://theme-fly.com)
Theme Version:  1.1.0
*/

jQuery(function() {

  "use strict";

/* —-------------------------------------------------------------------------
* Slider Statements
* —-----------------------------------------------------------------------— */
jQuery('.owl-statements').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    slideSpeed: 100,
    paginationSpeed: 100,
  	dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


/* —-------------------------------------------------------------------------
* Menu close
* —-----------------------------------------------------------------------— */
jQuery(document).ready(function() {
jQuery('nav').on( 'click', 'li', function(){
  jQuery('.navbar-collapse').removeClass('open');
  jQuery('.navbar-toggler').removeClass('opened');
});
var toggle = document.querySelector('.nav-toggle');
var overlay = document.querySelector('#overlay');
  
  toggle.addEventListener('click', function(e) {
    this.classList.toggle('opened');
    this.classList.toggle('active');
    overlay.classList.toggle('open');
  });
});

/* —-------------------------------------------------------------------------
* ToTop
* —-----------------------------------------------------------------------— */
jQuery(window).on('scroll', function () {
  if(jQuery(this).scrollTop() > 300) {
    jQuery('#toTop').css("opacity", "1");
  } else {
    jQuery('#toTop').css("opacity", "0");
  }
});
jQuery('#toTop').on( 'click', function() {  
  jQuery('body,html').animate({scrollTop:0},800);
  return false;
});

/* —-------------------------------------------------------------------------
*  Portfolio Isotop.js
* —-----------------------------------------------------------------------— */
jQuery(document).ready(function() {
  jQuery(window).load(function(){
  function getHashFilter() {
  var hash = location.hash;
  // get filter=filterName
  var matches = location.hash.match( /filter=([^&]+)/i );
  var hashFilter = matches && matches[1];
  return hashFilter && decodeURIComponent( hashFilter );
}

  var $grid = jQuery('.no-gutter');

  // bind filter button click
  var $filters = jQuery('#filters').on( 'click', 'button', function() {
    var filterAttr = jQuery( this ).attr('data-filter');
    // set filter in hash
    location.hash = 'filter=' + encodeURIComponent( filterAttr );
  });

  var isIsotopeInit = false;

  function onHashchange() {
    var hashFilter = getHashFilter();
    if ( !hashFilter && isIsotopeInit ) {
      return;
    }
    isIsotopeInit = true;
    // filter isotope
    $grid.isotope({
      itemSelector: '.item',
      filter: hashFilter,
      isFitWidth: true,
    transitionDuration: 800
    });
    // set selected class on button
    if ( hashFilter ) {
      $filters.find('.is-checked').removeClass('is-checked');
      $filters.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
    }
  }

  jQuery(window).on( 'hashchange', onHashchange );
  // trigger event handler to init Isotope
  onHashchange();
});
  });

/* —-------------------------------------------------------------------------
*  Animate Math
* —-----------------------------------------------------------------------— */
jQuery(document).ready(function() {
  jQuery(window).load(function(){
		var show = true;
		var element = jQuery('.achievments');
    jQuery(window).on("scroll load resize", function () {	
		if(element.length == 0 || !show) return false;
		var w_top = jQuery(window).scrollTop(); 
        var e_top = element.offset().top; 
        var w_height = jQuery(window).height(); 
        var d_height = jQuery(document).height();
        var e_height = element.outerHeight(); 
        if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            jQuery('.data_achievments').css('opacity', '1');
            jQuery('.data_achievments').spincrement({
                thousandSeparator: "",
                duration: 2000
            });
             
            show = false;
        }
    });
  });
});
/* —-------------------------------------------------------------------------
*  Sticky menu
* —-----------------------------------------------------------------------— */
var $header = jQuery('nav'),
    $headerHeight = 90;

var navScroll = {
    
  init:function(){
    jQuery(window).on('scroll',function(){
      navScroll.navDrop();
    })
  },
  
  navDrop:function(){
    var $scrollTop = jQuery(window).scrollTop();
    
    if($scrollTop > $headerHeight){
      $header.addClass('scrolled'); 
    }
    else if($scrollTop == 0) {
      $header.removeClass('scrolled');
    }
    
  }
}
navScroll.init();

var sections = jQuery('section')
  , nav = jQuery('nav')
  , nav_height = nav.outerHeight();

jQuery(window).on('scroll', function () {
  var cur_pos = jQuery(this).scrollTop();
  
  sections.each(function() {
    var top = jQuery(this).offset().top - nav_height,
        bottom = top + jQuery(this).outerHeight();
    
    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('active');
      sections.removeClass('active');
      
      jQuery(this).addClass('active');
      nav.find('a[href="#'+jQuery(this).attr('id')+'"]').addClass('active');
    }
  });
});

jQuery('a[href^="#"]').on("click", function (event) {
    event.preventDefault();
    var id  = jQuery(this).attr('href'),
        top = jQuery(id).offset().top - 0;
    jQuery('body,html').animate({scrollTop: top}, 1500);

});

/* —-------------------------------------------------------------------------
*  Typed.js hero
* —-----------------------------------------------------------------------— */
jQuery(".typed").typed({
  stringsElement: jQuery(".typed-strings"),
  typeSpeed: 70,
  startDelay: 0,
  backSpeed: 70,
  backDelay: 1000,
  loop: true,
  showCursor: false,
  cursorChar: "|",
  attr: null,
  contentType: 'html',
  callback: function() {},
  preStringTyped: function() {},
  onStringTyped: function() {},
  resetCallback: function() {}
});

/* —-------------------------------------------------------------------------
*  Fancybox portfolio
* —-----------------------------------------------------------------------— */
jQuery('[data-fancybox="images"]').fancybox({
  buttons : [ 
    'share',
    'zoom',
    'download',
    'thumbs',
    'close'
  ],
  thumbs : {
    autoStart : true
  }
});

});( jQuery )

