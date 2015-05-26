(function (window, document) {
  "use strict";  

  // Init globals
  var screenWidth; 

  var app = {

    isTouchDevice: window.Modernizr.touch,

    deviceSM: '568',
    deviceMD: '768',
    deviceLG: '1024',
    deviceXL: '1280',

    userInterface: {
      init: function() {

        // Team Member Binds
        $('.js-members-box-title').on('click', function() {
          var $this = $(this).closest('.js-member-box'),
              $icon = $this.find('.js-members-box-title-icon');

          if ($this.hasClass('our-team-member-box--is-open')) {
            $this.removeClass('our-team-member-box--is-open');
            $icon
              .removeClass('icon-chevron-down')
              .addClass('icon-chevron-up');
          } else {
            $this.addClass('our-team-member-box--is-open');
            $icon
              .removeClass('icon-chevron-up')
              .addClass('icon-chevron-down');          
          }
        });        
      },
      
      matchHeight: function(el, offset) {
        el = $(el);        
        var arr  = $.makeArray();

        if (typeof offset === 'undefined')
          offset = 0;

        el.css('height', 'auto');

        el.each(function(){
          arr.push($(this).outerHeight());
        });

        el.css('height', Math.max.apply( Math, arr ) + offset);
      },

      showHeaderNav: function(e) {
        e.preventDefault();  
        $(this).one('click', app.userInterface.hideHeaderNav);   
        $('.js-header-nav').removeClass('default-state');       
        $('.js-header-nav').slideDown();
      },

      hideHeaderNav: function(e) {
        e.preventDefault();             
        $(this).one('click', app.userInterface.showHeaderNav);  
        $('.js-header-nav').slideUp();             
      }             
    },

    // tabs: {
    //   $tabs: $('.js-tabs'),
    //   $tab: $('.js-tab'),
    //   $currentTab : $('.js-tab-current'),

    //   init: function() {
    //     app.tabs.$tab.on('click', app.tabs.showTab);
    //   },

    //   showTab: function(e) {
    //     e.preventDefault();   
    //     app.tabs.$tabs.find('.js-tab-current').removeClass('js-tab-current');
    //     $(this).addClass('js-tab-current');

    //     var tab = $(this).attr("href");
    //     $(".js-tab-section").not(tab).css("display", "none");
    //     $(tab).fadeIn();
    //   }
    // },

    accordion: {

      $item: $('.js-accordion-link'),

      init: function() {
        app.accordion.bindUIfunctions();
      },

      bindUIfunctions: function() {
        this.$item.on('click', function(e) {
          $(this).next('div').slideToggle();
          e.preventDefault();          
        });
      }

    },

    tabs: {

      init: function() {
        app.tabs.bindUIfunctions();
        app.tabs.pageLoadCorrectTab();
      },

      bindUIfunctions: function() {

        // Delegation
        $(document)
          .on("click", ".transformer-tabs a[href^='#']:not('.active')", function(event) {
            app.tabs.changeTab(this.hash);
            event.preventDefault();
          })
          .on("click", ".transformer-tabs a.active", function(event) {
            app.tabs.toggleMobileMenu(event, this);
            event.preventDefault();
          });

      },

      changeTab: function(hash) {

        var anchor = $('[href="' + hash + '"]');
        var div = $(hash);

        // activate correct anchor (visually)
        anchor.addClass("active").parent().siblings().find("a").removeClass("active");

        // activate correct div (visually)
        div.addClass("active").siblings().removeClass("active");

        // update URL, no history addition
        // window.history.replaceState("", "", hash);

        // Close menu, in case mobile
        anchor.closest("ul").removeClass("open");

      },

      // If the page has a hash on load, go to that tab
      pageLoadCorrectTab: function() {
        var hash = document.location.hash;
        if(hash.length > 0)
          app.tabs.changeTab(hash);
      },

      toggleMobileMenu: function(event, el) {
        $(el).closest("ul").toggleClass("open");
      }

    },

    ajax: {
      $forms: $('.js-contact-form, .js-newsletter-form'),
      $submitBtn: null,
      buttonText: null,
      loadingText: 'Please wait...',

      init: function() {
        app.ajax.$forms.on('submit', app.ajax.formHandler);
        app.ajax.$forms.validate({
          highlight: function (el) {
            $(el).addClass('is-error')
              .removeClass('is-valid').closest('.form-group')
              .addClass('is-error').removeClass('is-valid');
          },
          unhighlight: function (el) {
            $(el).addClass('is-valid')
              .removeClass('is-error').closest('.form-group')
              .addClass('is-valid').removeClass('is-error');
          },
          //errorPlacement: function(error, element) {}          
        });
      },

      postAjax: function(data, action) {
        var postData = { 
          action : action,
          nonce  : xe.nonce,
          data   : data,
        };

        $.post(xe.ajax_url, postData, 
          app.ajax.ajaxResponse, 'json');
      },

      ajaxResponse: function(response) {
        if(response.success) {
          app.ajax.$submitbtn.text(response.data.message);
        } else {
          app.ajax.$submitbtn.prop('disabled', false)
            .text(response.data.message);
        }
      },

      formHandler: function(e) {
        e.preventDefault();

        if(! $(this).valid()) return false;

        var serialised_data = $(this).serialize(),
          action  = $(this).data('ajaxPost');

        if (typeof action !== 'undefined') {       
          app.ajax.$submitbtn = $(this).find('.js-submit');
          app.ajax.buttonText = app.ajax.$submitbtn.text();
          app.ajax.$submitbtn.prop('disabled', true)
            .text(app.ajax.loadingText);
          app.ajax.postAjax(serialised_data, action);          
        } else {
          console.log('Invalid AJAX action.');
        }
      }    
    },

    sliders: {

      $clientsSlider: $('.clients-slider'),
      $heroSlider: $('.hero-slider'),

      init: function() {     

        $('.js-client-slider-next').click(function(e) {
            e.preventDefault();
            app.sliders.$clientsSlider.slick('slickNext');
        });

        $('.js-client-slider-prev').click(function(e) {
            e.preventDefault();
            app.sliders.$clientsSlider.slick('slickPrev');
        }); 

        this.$clientsSlider.slick({
          slidesToShow: 8,
          slidesToScroll: 1,
          arrows: false,
          responsive: [
            {
              breakpoint: app.deviceLG,
              settings: {
                slidesToShow: 6
              }
            },    
            {
              breakpoint: app.deviceMD,
              settings: {
                slidesToShow: 4
              }
            },
            {
              breakpoint: app.deviceSM,
              settings: {
                slidesToShow: 2
              }
            }
          ]    
        });

        this.$heroSlider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          responsive: [
            {
              breakpoint: app.deviceMD,
              settings: {
                dots: false,
                fade: true
              }
            }
          ],              
          customPaging: function(slick,index) {
            return '<div></div>';
          }
        });        

      }
    }
  };

  $(window).bind('load resize', function() {

    screenWidth = $(window).width();

    if (screenWidth > app.deviceMD) {

      // Reset Team Member Box
      $('.js-member-box')
        .css('height', 'auto');
      $('.our-team-member-box__wrap')
        .css('margin-top', 'auto');

      app.userInterface.matchHeight('.js-multi-box');
      app.userInterface.matchHeight('.js-aside-box');
      app.userInterface.matchHeight('.js-introduction-box');
      app.userInterface.matchHeight('.js-member-box');    
      app.userInterface.matchHeight('.js-tutor-box');
      app.userInterface.matchHeight('.js-testimonial-box');

      // Team Member Box
      $('.our-team-member-box__wrap')
        .css('margin-top', $('.js-member-box').outerHeight() - 70);

      // XXX: Edge case
      $('.js-callout-container')
        .css('height', $('.js-multi-box-container').outerHeight() -10);
    }

    if (screenWidth > app.deviceLG) {
      // Header Nav
      $('.js-header-nav').slideDown();
    }

    if (screenWidth < app.deviceLG) {
      // Header Mobile Nav
      $('.js-toggle-header-nav').one('click', app.userInterface.showHeaderNav);
      //$('.js-header-nav').slideUp();
    }
  });

  if (app.isTouchDevice) {
    include("dist/scripts/fastclick.min.js", function () {
      FastClick.attach(document.body);
    });
  }  

  app.userInterface.init();
  app.accordion.init();  
  app.tabs.init();
  app.ajax.init();  
  app.sliders.init();

}(this, document));

// Async load Google Fonts
var WebFontConfig = {
  google: { families: [ 'Open+Sans:400,700,800,300:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

function g_init() {

  var styles = 
    [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}];

  $('.gmap').each(function (index, Element) {
    var lat = $(Element).data('lat'),
        lng = $(Element).data('lng');

    var latlng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng)); 

    var styledMap = new google.maps.StyledMapType(styles,
      {name: "Styled Map"});

    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: false,
      mapTypeControl: false,
      streetViewControl: false,
      zoomControl: true,
      zoomControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style'],
        style: google.maps.ZoomControlStyle.SMALL
      }
    };

    var map = new google.maps.Map(Element, myOptions);

    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');      

    var pinColor = "868686";
    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
        new google.maps.Size(21, 34),
        new google.maps.Point(0,0),
        new google.maps.Point(10, 34));
    var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));

    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      icon: pinImage,
      shadow: pinShadow
    });
  });
}
google.maps.event.addDomListener(window, "load", g_init);