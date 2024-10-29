import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

// Form validation on submission
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms
        var forms = document.getElementsByTagName('form');
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
