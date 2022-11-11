const input = document.querySelector('input[name="name"]');

input.addEventListener("invalid", function (event) {
    if (event.target.validity.valueMissing) {
        event.target.setCustomValidity("Please enter valid input.");
    }
});

input.addEventListener("change", function (event) {
    event.target.setCustomValidity("");
});
