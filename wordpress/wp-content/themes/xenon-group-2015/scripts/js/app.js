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

    ajax: {
      $forms: $('.js-enquiry-form, .js-newsletter-form'),

      init: function() {
        app.ajax.$forms.on('submit', app.ajax.formHandler);
      },

      postAjax: function(data, action) {
        var postData = { 
          action     : action,
          nonce      : xe.nonce,
          serialized : data,
        };

        $.post(xe.ajax_url, postData, 
          app.ajax.ajaxResponse, 'json');
      },

      ajaxResponse: function(response) {
        if(response.success) {

        } else {

        }
      },

      formHandler: function(e) {
        e.preventDefault();
        var serialised_data = $(this).serialize(),
          action  = $(this).data('ajaxPost');

        if (typeof action !== 'undefined') {       
          app.ajax.postAjax(serialised_data, action);        
          $(this).find("button").prop('disabled',true); 
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