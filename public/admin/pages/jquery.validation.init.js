/**
 * Theme: Metrica - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Validation Js
 */


$(document).ready(function() {
    window.Parsley.addValidator('palindrome', {
        validateString: function(value) {
            return value == "2";
        },
        messages: {
            en: 'This string is not the reverse of itself',
            fr: "Cette valeur n'est pas l'inverse d'elle même."
        }
    });
    //$('.form-parsley').parsley().validate();
    $('.form-parsley').parsley();
});