(function($) {
    var $main_nav = $('#main-nav');
    var $toggle = $('.toggle');
    
    var defaultData = {
      maxWidth: false,
      customToggle: $toggle,
      navTitle: 'IprevSantos',
      levelTitles: true,
      insertClose: 1,
      closeLevels: false
    };
    
    // call our plugin
    var Nav = $main_nav.hcOffcanvasNav(defaultData);
    
  })(jQuery);