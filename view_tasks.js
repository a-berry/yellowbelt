// moojax.js

// DOM READY
window.addEvent('domready', function() {

  console.log('view tasks.jsrunning, DOM ready');

  var view_tasks = $('view_tasks');
    if(!view_tasks){
      alert("whoops view_tasks form not here");
      return false;
    }

  // ADD
  $('view_tasks').addEvent('submit', function(e) {

  console.log('view_tasks submitted');

  e.preventDefault();

  // Get the department_id:
 
  var did = ($('did').value);
  console.log("did is: ");
  console.log(did);
  console.log(typeOf(did));
  console.log("end did info");
  //parseInt(did);
  // console.log(typeOf(did));

  var data;
  
  // post data (adding records)
    var req = new Request({
      method: 'get',
      url: 'view_tasks_json.php?did=' + encodeURIComponent(did),
      data: did,
      onRequest: function() {

        console.log('Request made. Please wait...'); 
        console.log('punting..'+did); 

      },
      onSuccess: function(responseText) {

        console.log('Success. Please wait...');

        // Get the JSON response data:
        data = responseText;
        
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