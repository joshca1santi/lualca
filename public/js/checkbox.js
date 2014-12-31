$(function () {
  $('.list-group.checked-list-box .list-group-item').each(function () {

    // Settings
    var $widget = $(this),
    $checkbox = $('<input type="checkbox" class="hidden" />'),
    color = ($widget.data('color') ? $widget.data('color') : "primary"),
    style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
    settings = {
      on: {
        icon: 'glyphicon glyphicon-check'
      },
      off: {
        icon: 'glyphicon glyphicon-unchecked'
      }
    };

    $widget.css('cursor', 'pointer')
    $widget.append($checkbox);

    // Event Handlers
    $widget.on('click', function () {
      $checkbox.prop('checked', !$checkbox.is(':checked'));
      $checkbox.triggerHandler('change');
      updateDisplay();
    });
    $checkbox.on('change', function () {
      updateDisplay();
    });


    // Actions
    function updateDisplay() {
      var isChecked = $checkbox.is(':checked');

      // Set the button's state
      $widget.data('state', (isChecked) ? "on" : "off");

      // Set the button's icon
      $widget.find('.state-icon')
      .removeClass()
      .addClass('state-icon ' + settings[$widget.data('state')].icon);

      // Update the button's color
      if (isChecked) {
        $widget.addClass(style + color + ' act');
      } else {
        $widget.removeClass(style + color + ' act');
      }
    }

    // Initialization
    function init() {

      if ($widget.data('checked') == true) {
        $checkbox.prop('checked', !$checkbox.is(':checked'));
      }

      updateDisplay();

      // Inject the icon if applicable
      if ($widget.find('.state-icon').length == 0) {
        $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
      }
    }
    init();
  });



  $("#check-list-box li").on('click', function(event) {
    event.preventDefault();
    var checkedItems = {}, counter = 0;
    var string;
    $checkbox = $('#check-list-box');

    $("#check-list-box li.act").each(function(idx, li) {
      checkedItems[counter] = $(li).attr('name');
      counter++
    });

    if (checkedItems[0] != null)
      var string = '"'+checkedItems[0]+'":1';
      if (checkedItems[1] != null)
        var string = string+',"'+checkedItems[1]+'":1';
        if (checkedItems[2] != null)
          var string = string+',"'+checkedItems[2]+'":1';
          if (checkedItems[3] != null)
            var string = string+',"'+checkedItems[3]+'":1';
            if (checkedItems[4] != null)
              var string = string+',"'+checkedItems[4]+'":1';

                string = '{'+string+'}';
                $('#var').val(string);

                if (string === '{undefined}')
                  $('#var').val('');

            });


});
