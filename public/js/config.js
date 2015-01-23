$(function() {


  $(document).on('click', '#config', function()
{

    var $btn = $("#seed-button").button('loading')
    // business logic...

    $.ajax({
      "type": "POST",
      "url": window.location.href.toString(),
    }).done(function(result)
  {

    $btn.button('reset');


  });


}).on('click', '#migration', function()
{

  var $btn = $("#migration-button").button('loading')
  // business logic...

  $.ajax({
    "type": "POST",
    "url": window.location.href.toString(),
  }).done(function(result)
{
  //  alert('sd');
  $btn.button('reset');


});


});

});
