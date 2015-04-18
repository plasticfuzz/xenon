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
      // for multi-box
      matchHeight: function(el, offset) {
        var arr  = $.makeArray();
        el = $(el);

        if (typeof offset === 'undefined')
          offset = 0;

        el.css('height', 'auto');

        el.each(function(){
          arr.push($(this).outerHeight());
        });

        el.css('height', Math.max.apply( Math, arr ) + offset);
      }
    }

  };

  $(window).bind("load resize", function() {

    screenWidth = $(window).width();

    if (screenWidth > app.deviceMD) {
      app.userInterface.matchHeight('.js-multibox');

      // XXX: Edge case
      $('.js-callout-container')
        .css('height', $('.js-multibox-container').outerHeight() -10);
    }

  });

  if (app.isTouchDevice) {
      include("dist/scripts/fastclick.min.js", function () {
          FastClick.attach(document.body);
      });
  }  

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