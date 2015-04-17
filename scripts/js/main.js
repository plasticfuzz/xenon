(function() {
  var app = {

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

  app.userInterface.matchHeight('.js-multibox');
})();