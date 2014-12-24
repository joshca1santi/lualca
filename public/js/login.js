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
      alert(result.message+result.messageType);
    }
    else if(typeof result.errorMessages !== 'undefined')
    {
      alert(result.errorMessages);
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
