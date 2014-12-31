$(function()
{

  $(document).on('submit', '#create-group', function()
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
        type: 'error',
      });
    }
  }
  else
  {

    new PNotify({
      title: result.message,
      text: result.messageType,
      type: 'success',
    });
  }
});

return false;
}).on('click', '#delete-item', function()
{

  $('#confirm-modal').modal();

}).on('click', '.confirm-action', function()
{
  $.each($('.table tbody tr td input:checkbox:checked'), function( key, value )
{

  $.ajax(
  {
    "url": window.location.href.toString()+"/../group/"+$(this).data('group-id'),
    "type": "DELETE"
  }).done(function(result)
{
  new PNotify({
    title: result.message,
    text: result.messageType,
    icon: result.icon
  });

});
});
$('#confirm-modal').modal('hide');
}).on('change', '.check-all', function()
{
  var parent = $(this).parents('.table');
  if($(this).is(':checked'))
  {
    parent.find("tbody input:checkbox").prop('checked', true);
    $('#delete-item').css('display', 'inline-block');
  }
  else
  {
    parent.find("tbody input:checkbox").prop("checked", false);
  }
});

});
