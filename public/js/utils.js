$(document).ready(function () {
    // Cache DOM elements
    const $submitButton = $('button');
    const $cityInput = $('#city');

    // Event listener for input changes in the city input field
    $cityInput.on('input', function (e) {
        e.preventDefault();

        // Get the value of the city input field
        const cityValue = $(this).val();

        // Disable the submit button if the input is empty
        $submitButton.prop('disabled', cityValue.trim() === '');

        // Prevent default form submission
        return false;
    });
});
