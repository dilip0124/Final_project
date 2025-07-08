document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function (e) {
      const inputs = form.querySelectorAll("input, textarea, select");
      for (let input of inputs) {
        if (!input.value.trim()) {
          alert("Please fill all the fields.");
          input.focus();
          e.preventDefault();
          return false;
        }
      }
    });
  });
});
