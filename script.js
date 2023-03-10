// Select the form and add a submit event listener
document.querySelector("form").addEventListener("submit", function (event) {
  // Prevent the default form submission
  event.preventDefault();

  // Get the form data
  const name = document.querySelector("#name").value;
  const tel = document.querySelector("#tel").value;
  const email = document.querySelector("#email").value;
  const wherefrom = document.querySelector("#wherefrom").value;
  const whereto = document.querySelector("#whereto").value;
  const message = document.querySelector("#message").value;

  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set the request method and URL
  xhr.open("POST", "contact.php");

  // Set the request header
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Set the response type
  xhr.responseType = "json";

  // Set the onload event handler
  xhr.onload = function () {
    // Parse the JSON response from the server
    const response = JSON.parse(xhr.responseText);

    // Check the response status
    if (response.status === "success") {
      // If the response is successful, display the success message
      document.getElementById("result").innerHTML = response.message;
    } else {
      // If the response is not successful, display the error message
      document.getElementById("result").innerHTML = response.error;
    }
  };

  // Set the onerror event handler
  xhr.onerror = function () {
    // Display an error message in the result div
    document.querySelector("#result").innerHTML =
      "An error occurred while sending the form data.";
  };

  // Send the form data
  xhr.send(
    `name=${name}&tel=${tel}&email=${email}&wherefrom=${wherefrom}&whereto=${whereto}&message=${message}`
  );
});
