(function ($) {
  showSuccessToast = function (message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Success',
      text: String(message),
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: 'Bottom-right'
    })
  };
  showInfoToast = function (message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Info',
      text: String(message),
      showHideTransition: 'slide',
      icon: 'info',
      loaderBg: '#46c35f',
      position: 'top-right'
    })
  };
  showWarningToast = function (message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Warning',
      text: String(message),
      showHideTransition: 'slide',
      icon: 'warning',
      loaderBg: '#57c7d4',
      position: 'top-right'
    })
  };
  showDangerToast = function (message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Danger',
      text: String(message),
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#f2a654',
      position: 'top-right'
    })
  };
  showToastPosition = function (position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      position: String(position),
      icon: 'info',
      stack: false,
      loaderBg: '#f96868'
    })
  }
  showToastInCustomPosition = function () {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Custom positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      icon: 'info',
      position: {
        left: 120,
        top: 120
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  resetToastPosition = function () {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }
})(jQuery);
