$(function()
{

  $(document).on('submit', '#login', function()
{
  var sArray = $(this).serializeArray();
  $.ajax({
    "type": "POST",
    "url": window.location.href.toString(),
    "data": sArray,
    "dataType": "json"
  }).done(function(result)
{

  if(result.doLogin === false)
  {
    if(typeof result.message !== 'undefined')
    {
      new PNotify({
        title: result.message,
        text: result.messageType,
        type: 'error'
      });
    }
  }
  else
  {
    window.location = 'dashboard';
  }
});

return false;
})
});
