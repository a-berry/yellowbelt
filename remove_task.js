// DOM READY
window.addEvent('domready', function() {

  console.log('remove task.jsrunning, DOM ready');

  var remove_task_form = $('remove_task_form');
  if(!remove_task_form){
    alert("whoops form not here");
    return false;
  }

  // REMOVE
  $('remove_task_form').addEvent('submit', function(e) {

    console.log('remove task submitted');

    e.preventDefault();

    var value = $('did').value;

    console.log('did value: '+value);
    console.log(typeOf(value));

    var req = new Request({
      method: 'get',
      url: 'remove_task_json.php?did=' + encodeURIComponent(value),
      data: value,
      onRequest: function() { 

        console.log('Request made. Please wait...');
        console.log('value sumbit: '+value); 

      },
      onSuccess: function(responseText) {
      
        console.log('Success. Please wait...');
        data = responseText;
        console.log('response data is: '+data);

         $('results').set('text', data);

        $('results').set('styles', {
          display: 'block',
          border: '1px dotted green'
        });

      },
      onComplete: function(responseText) {

        console.log('Request completed successfully.');

      }

    }).send();

  });

});