document.addEventListener("DOMContentLoaded", function () {
  const contactForm = document.querySelector("#contact-form");
  const formMessage = document.querySelector("#response");

  contactForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(contactForm);

    fetch("submit.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          formMessage.innerHTML = "Formulár bol úspešne odoslaný!";
        } else {
          formMessage.innerHTML = "Chyba. Prosím skúste to znova.";
        }
      })
      .catch((error) => {
        formMessage.innerHTML = "Chyba. Prosím skúste to znova.";
        console.error(error);
      });
  });
});
