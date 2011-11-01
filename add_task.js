// DOM READY
window.addEvent('domready', function() {

  console.log('moojax-add_employee.jsrunning, DOM ready');

  var emp_form = $('emp_form');
    if(!emp_form){
      alert("whoops form not here");
      return false;
  }

  // ADD
  $('emp_form').addEvent('submit', function(e) {

  console.log('emp_form submitted');

  e.preventDefault();

  // Assemble all the form data:
  var fields = ['first_name', 'last_name', 'email', 'department_id',
'phone_ext'];

    // encoded uri values can get passed to data object on Request
  for (var i = 0; i < fields.length; i++) {
    fields[i] = fields[i] + '=' + encodeURIComponent($(fields[i]).value);
  console.log(typeOf(fields[i])); // log datatype of field sumbits
  }
  var values = fields.join('&');



  var data;
  
  // post data (adding records)
    var req = new Request({
      method: 'post',
      url: 'add_task_json.php',
      data: values,
      onRequest: function() { 
        console.log('Request made. Please wait...'); 

      },
      onSuccess: function(responseText) {

        console.log('Success. Please wait...');

        // Get the JSON response data:
        data = responseText;
        console.log(responseText);

        console.log('response data is: '+data);
        console.log('test data results: '+data[0]);

        $('debug').set('text', data);

        $('results').set('styles', {
          display: 'block',
          border: '1px dotted green'
        });
        
        $('results').set('text', data);

      },
      onComplete: function() {

        console.log('Request completed successfully.');

      }
    }).send();
  });

});