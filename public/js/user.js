$(function()
{

  $(document).on('submit', '#create-user', function()
{


  var sArray = $(this).serializeArray();
  $.ajax({
    "type": "POST",
    "url": window.location.href.toString(),
    "data": sArray,
    "dataType": "json"
  }).done(function(result)
{

  if(result.bool === false)
  {
    if(typeof result.message !== 'undefined')
    {

      new PNotify({
        title: result.message,
        text: result.messageType,
        type: 'error',
        nonblock: {
          nonblock: true,
          nonblock_opacity: .2
        }
      });
    }
    else if(typeof result.errorMessages !== 'undefined')
    {
      for(var errorType in result.errorMessages)
      {
        for(var i in result.errorMessages[errorType])
        {

          new PNotify({
            title: 'Error',
            text: result.errorMessages[errorType][i],
            type: 'error',
            nonblock: {
              nonblock: true,
              nonblock_opacity: .2
            }
          });
        }
      }
    }
  }
  else
  {
    new PNotify({
      title: result.message,
      text: result.messageType,
      type: 'success',
      nonblock: {
        nonblock: true,
        nonblock_opacity: .2
      }
    });
  }
});

return false;
}).on('click', '#delete-item', function()
{
if (!$('.table tbody tr td input:checkbox:checked').is(':checked')){

  new PNotify({
    title: 'Warning',
    text: 'Please select at least one user.',
    type: 'warning',
  });
}
else{
  $('#confirm-modal').modal();
}

}).on('click', '.confirm-action', function()
{
  $.each($('.table tbody tr td input:checkbox:checked'), function( key, value )
{

  $.ajax(
  {
    "url": window.location.href.toString()+"/../users/"+$(this).data('user-id'),
    "type": "DELETE"
  }).done(function(result)
{
  new PNotify({
    title: result.message,
    type: result.messageType,
    icon: result.icon
  });
  setTimeout(function() {
    window.location =  location.href;
  }, 2000);

});
});
$('#confirm-modal').modal('hide');

}).on('change', '.check-all', function()
{
  var parent = $(this).parents('.table');
  if($(this).is(':checked'))
  {
    parent.find("tbody input:checkbox").prop('checked', true);
    //$('#delete-item').css('display', 'inline-block');
  }
  else
  {
    parent.find("tbody input:checkbox").prop("checked", false);
  }
}).on('click', '#refresh', function(){
  $.ajax({
    url: ""
  }).done(function(){
    window.location =  location.href;
  });

}).on('click', '#activate-item', function()
{
  if (!$('.table tbody tr td input:checkbox:checked').is(':checked')){

    new PNotify({
      title: 'Warning',
      text: 'Please select at least one user.',
      type: 'warning',
    });
  }
  else{
    $('#confirm-modal2').modal();
  }

}).on('click', '.confirm-action2', function()
{
  $.each($('.table tbody tr td input:checkbox:checked'), function( key, value )
{

  $.ajax(
  {
    "url": window.location.href.toString()+"/../users/"+$(this).data('user-id'),
    "type": "PUT"
  }).done(function(result)
{
  new PNotify({
    title: result.message,
    text: result.messageType,
    icon: result.icon
  });
  $('#confirm-modal2').modal('hide');
  setTimeout(function() {
    window.location =  location.href;
  }, 2000);

});
});


});


});
