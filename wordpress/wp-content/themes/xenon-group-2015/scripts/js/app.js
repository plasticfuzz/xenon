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
        // You'd have this active in a real situation, but it causes issues in an <iframe> (like here on CodePen) in Firefox. So commenting out.
        // window.history.replaceState("", "", hash);

        // Close menu, in case mobile
        anchor.closest("ul").removeClass("open");

      },

      // If the page has a hash on load, go to that tab
      pageLoadCorrectTab: function() {
        app.tabs.changeTab(document.location.hash);
      },

      toggleMobileMenu: function(event, el) {
        $(el).closest("ul").toggleClass("open");
      }

    },

    ajax: {
      $forms: $('.js-enquiry-form, .js-newsletter-form'),
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
    }
  };

  $(window).bind('load resize', function() {

    screenWidth = $(window).width();

    if (screenWidth > app.deviceMD) {
      app.userInterface.matchHeight('.js-multi-box');
      app.userInterface.matchHeight('.js-aside-box');
      app.userInterface.matchHeight('.js-introduction-box');

      // Header Nav
      $('.js-header-nav').slideDown();

      // XXX: Edge case
      $('.js-callout-container')
        .css('height', $('.js-multi-box-container').outerHeight() -10);
    }

    if (screenWidth < app.deviceMD) {
      // Header Mobile Nav
      $('.js-toggle-header-nav').one('click', app.userInterface.showHeaderNav);
      $('.js-header-nav').slideUp();
    }
  });

  if (app.isTouchDevice) {
    include("dist/scripts/fastclick.min.js", function () {
      FastClick.attach(document.body);
    });
  }  

  app.tabs.init();
  app.ajax.init();

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