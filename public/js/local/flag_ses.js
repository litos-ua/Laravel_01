// Запоминает флаг с помощью coockies (вроде как без кодировки). Работает нормально только с коррекцией middleware!

// $(document).ready(function () {
//     // Mapping of language codes to flag image filenames
//     var languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//         // Add more language codes and their corresponding flag filenames
//     };
//
//     // Function to update the flag icon in the language dropdown
//     function updateFlagIcon(language) {
//         var flagFilename = languageFlags[language];
//         var flagImageUrl = '/pictures/local/flags/' + flagFilename;
//         $('.flag-icon').attr('src', flagImageUrl);
//
//         // Save the selected language in a cookie (unencrypted) with path '/'
//         document.cookie = 'selectedLanguage=' + language + '; path=/;';
//     }
//
//     // Get the selected language from the cookie or set it to the default value ('en')
//     var selectedLanguage = getCookie('selectedLanguage') || 'en';
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Handle language selection and update the flag icon
//     $('.dropdown-menu a').on('click', function () {
//         var language = $(this).data('language');
//         updateFlagIcon(language);
//
//         // Update the selectedLanguage variable and save it in the cookie
//         selectedLanguage = language;
//         document.cookie = 'selectedLanguage=' + selectedLanguage + '; path=/;';
//     });
//
//     // Helper function to get cookie value by name
//     function getCookie(name) {
//         var value = '; ' + document.cookie;
//         var parts = value.split('; ' + name + '=');
//         if (parts.length === 2) return parts.pop().split(';').shift();
//         return null; // Return null if the cookie is not set
//     }
// });

//-------------------------------------------Работает через сессии------------------------------------------------------

// $(document).ready(function () {
//     alert('Document ready');
//     // Mapping of language codes to flag image filenames
//     var languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//         // Add more language codes and their corresponding flag filenames
//     };
//
//     // Function to update the flag icon in the language dropdown
//     function updateFlagIcon(language) {
//         var flagFilename = languageFlags[language];
//         var flagImageUrl = '/pictures/local/flags/' + flagFilename;
//         $('.flag-icon').attr('src', flagImageUrl);
//     }
//
//     // Handle language selection and update the flag icon
//     $('.dropdown-menu a').on('click', function () {
//         alert('Dropdown link clicked');
//         var language = $(this).data('language');
//         updateFlagIcon(language);
//
//         // Send an AJAX request to update the selected language in the session
//         $.post('/update-language', { language: language }, function (data) {
//             // Display a message using the alert function
//             alert('Language updated');
//             // Handle any response if needed
//         });
//     });
// });

$(document).ready(function () {
    alert('Document ready');
    // Mapping of language codes to flag image filenames
    var languageFlags = {
        'en': 'english-flag.png',
        'pl': 'poland-flag.png',
        'uk': 'ukraine-flag.png',
        // Add more language codes and their corresponding flag filenames
    };

    // Function to update the flag icon in the language dropdown
    function updateFlagIcon(language) {
        var flagFilename = languageFlags[language];
        var flagImageUrl = '/pictures/local/flags/' + flagFilename;
        $('.flag-icon').attr('src', flagImageUrl);
    }

    // Handle language selection and update the flag icon
    $('.dropdown-menu').on('click', 'button', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        var language = $(this).data('language');
        updateFlagIcon(language);

        // Redirect to the change-language route with the selected language
        window.location.href = '/change-language/' + language;
    });
});











