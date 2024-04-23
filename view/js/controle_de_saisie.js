console.log('mohamed');
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form'); // Change this selector if your form has a specific class
    form.addEventListener('submit', function(event) {
        let isValid = true;

        const titre = document.getElementById('exampleInputName1');
        if (/\d/.test(titre.value)) {
            console.error("Title validation failed: should not contain numbers");
            titre.classList.add('is-invalid');
            isValid = false;
        } else {
            titre.classList.remove('is-invalid');
        }

        const date = document.getElementById('date');
        if (date.value === "") {
            console.error("Date validation failed: date cannot be empty");
            date.classList.add('is-invalid');
            isValid = false;
        } else {
            date.classList.remove('is-invalid');
        }

        const subject = document.getElementById('id_subject');
        if (subject.value === "") {
            console.error("Subject validation failed: no subject selected");
            subject.classList.add('is-invalid');
            isValid = false;
        } else {
            subject.classList.remove('is-invalid');
        }

        const classSelection = document.getElementById('id_class');
        if (classSelection.value === "") {
            console.error("Class validation failed: no class selected");
            classSelection.classList.add('is-invalid');
            isValid = false;
        } else {
            classSelection.classList.remove('is-invalid');
        }

        if (!isValid) {
            console.error("Form validation failed, preventing submission.");
            event.preventDefault();
        } else {
            console.log("Form validated successfully, proceeding with submission.");
        }
    });
});
