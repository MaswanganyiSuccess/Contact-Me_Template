document.getElementById("contact_form").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent default form submission

  let formData = new FormData(this);

  fetch("Contact_me.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      alert(data.message); // Show message as an alert
  })
  .catch(error => {
      alert("An error occurred: " + error);
  });
});
