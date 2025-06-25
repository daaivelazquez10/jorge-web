document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form.contact");
  if (!form) return;

  form.addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(form);

    try {
      const response = await fetch("form-handler.php", {
        method: "POST",
        body: formData,
      });

      const result = await response.text();

      if (response.ok && result === "OK") {
        alert("¡Consulta enviada correctamente!");
        form.reset();
      } else {
        alert("Error al enviar la consulta: " + result);
      }
    } catch (error) {
      alert("Error inesperado al enviar el formulario.");
      console.error(error);
    }
  });
});