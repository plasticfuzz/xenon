(function() {

  var app = {

    deviceMD: '768',

    userInterface: {
      // for multi-box
      matchHeight: function(el) {
        el = $(el);

        var arr = $.makeArray();

        el.each(function(){
          arr.push($(this).outerHeight());
        });

        el.css('height', Math.max.apply( Math, arr ));
      }
    }

  };

  winWidth = $(window).width();

  if (winWidth > app.deviceMD) {
    app.userInterface.matchHeight('.js-multibox');
  }

})();