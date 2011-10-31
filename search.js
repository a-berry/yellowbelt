// DOM READY
window.addEvent('domready', function() {

console.log("search_moojax_json.js");

// EVENT ACTION
  $('search_form').addEvent('submit', function(e) {

    console.log('form submitted');

    e.preventDefault();

    var last_name = $('last_name').value;

      var req = new Request({
        method: 'get',
        url: 'search_results_json.php?last_name=' + encodeURIComponent(last_name),
        onRequest: function() {
          console.log('Request made. Please wait...');
        },

        onSuccess: function(responseText){
          console.log('Success...');

          $('debug').set('text', responseText);

          // Clear the current results content:
          var results = $('results');

          // Make the results box visible:
          $('results').set('styles', {
            display: 'block',
            border: '1px dotted green'
          });

          while (results.hasChildNodes()) {
            results.removeChild(results.lastChild);
          }

          // Get the data from the response:
          var data = JSON.parse(responseText);

          console.log('data is: '+data);

          // Check that some employees were returned:
          if (data.length > 0) {

            // Declare some necessary variables:
            var employee, span, name_node, dept_node, dept_label, br, strong, a, email;

            // Loop through each employee:
            for (var i = 0; i < data.length; i++) {

              employee = document.createElement('p');

              span = document.createElement('span');
              span.setAttribute('class', 'name');
              name_node = document.createTextNode(data[i].name);
              span.appendChild(name_node);
              employee.appendChild(span);

              br = document.createElement('br');
              employee.appendChild(br);

              strong = document.createElement('strong');
              dept_label = document.createTextNode('Department');
              strong.appendChild(dept_label);
              employee.appendChild(strong);
              dept_node = document.createTextNode(': ' + data[i].department);
              employee.appendChild(dept_node);

              br = document.createElement('br');
              employee.appendChild(br);

              a = document.createElement('a');
              a.setAttribute('href', 'mailto:' + data[i].email);
              email = document.createTextNode(data[i].email);
              a.appendChild(email);
              employee.appendChild(a);

              results.appendChild(employee);

            } // End of FOR loop.

          } else { // No employees, print a message.

            // Create a new paragraph:
            var node1 = document.createElement('p');

            // Add the class:
            node1.setAttribute('class', 'error');

            // Create a text node:
            var node2 = document.createTextNode('No dice.');

            // Add the text node to the paragraph:
            node1.appendChild(node2);

            // Add the paragraph to the results:
            results.appendChild(node1);

          }

        }, // end onSuccess: function()

        onComplete: function(responseText) {
          console.log('Request completed successfully.');
        }, // end onComplete: function()

      }).send(); // end Request

  }); // end EVENT ACTION

}); // end DOM READY