$( "#create-user" ).submit(function( event ) {
  event.preventDefault();
  var sArray = $(this).serializeArray();
  $.ajax({
    "type": "POST",
    "url": window.location.href.toString(),
    "data": sArray,
    "dataType": "json",
  }).done(function(result)
  {
    if(result.bool === false)
    {
      error(result);
    }
    if(result.bool === true)
    {
      success(result.message, result.messageType, true)
    }
  });
  return false;
});



function error(result){
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
  console.log('Error');
}
function success(tittle, text , reload){
  new PNotify({
    title: tittle,
    text: text,
    type: 'success',
    nonblock: {
      nonblock: true,
      nonblock_opacity: .2
    }
  });
  console.log('Success');
    if (reload === true){
      setTimeout(function() {
        location.reload();
      }, 1500);
    }
}
