// Не запоминает выбранный флаг

// $(document).ready(function () {
//     // Mapping of language codes to flag image filenames
//     var languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//         // Add more language codes and their corresponding flag filenames
//     };
//
//     // Set the default language code based on the currently selected language (you can get this value from your backend)
//     var selectedLanguage = 'en'; // Example: 'en' for English, 'pl' for Polish, 'uk' for Ukrainian, etc.
//
//     // Function to update the flag icon in the language dropdown
//     function updateFlagIcon(language) {
//         var flagFilename = languageFlags[language];
//         var flagImageUrl = '/pictures/local/flags/' + flagFilename;
//         $('.flag-icon').attr('src', flagImageUrl);
//     }
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Handle language selection and update the flag icon
//     $('.dropdown-menu a').on('click', function () {
//         var language = $(this).data('language');
//         updateFlagIcon(language);
//     });
// });

// Запоминает флаг без cookies

// $(document).ready(function () {
//     // Mapping of language codes to flag image filenames
//     var languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//         // Add more language codes and their corresponding flag filenames
//     };
//     // Function to update the flag icon in the language dropdown
//     function updateFlagIcon(language) {
//         var flagFilename = languageFlags[language];
//         var flagImageUrl = '/pictures/local/flags/' + flagFilename;
//         $('.flag-icon').attr('src', flagImageUrl);
//
//         // Save the selected language in local storage
//         localStorage.setItem('selectedLanguage', language);
//     }
//
//     // Get the selected language from local storage or set it to the default value
//     var selectedLanguage = localStorage.getItem('selectedLanguage') || 'en';
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Handle language selection and update the flag icon
//     $('.dropdown-menu a').on('click', function () {
//         var language = $(this).data('language');
//         updateFlagIcon(language);
//     });
// });

// Запоминает флаг с помощью coockies (вроде как кодирует). Работает нормально!

//     $(document).ready(function () {
//     // Mapping of language codes to flag image filenames
//     var languageFlags = {
//     'en': 'english-flag.png',
//     'pl': 'poland-flag.png',
//     'uk': 'ukraine-flag.png',
//     // Add more language codes and their corresponding flag filenames
// };
//
//     // Function to update the flag icon in the language dropdown
//     function updateFlagIcon(language) {
//     var flagFilename = languageFlags[language];
//     var flagImageUrl = '/pictures/local/flags/' + flagFilename;
//     $('.flag-icon').attr('src', flagImageUrl);
//
//     // Save the selected language in local storage
//     try {
//     localStorage.setItem('selectedLanguage', language);
// } catch (e) {
//     // If local storage is not available, use cookies as a fallback
//     $.cookie('selectedLanguage', language, { expires: 30 });
// }
// }
//
//     // Get the selected language from local storage or cookies, and set the default value to 'en'
//     var selectedLanguage = localStorage.getItem('selectedLanguage') || $.cookie('selectedLanguage') || 'en';
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Handle language selection and update the flag icon
//     $('.dropdown-menu a').on('click', function () {
//     var language = $(this).data('language');
//     updateFlagIcon(language);
// });
// });

// Запоминает флаг с помощью coockies (вроде как без кодировки). Работает нормально только с коррекцией middleware!

$(document).ready(function () {
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

        // Save the selected language in a cookie (unencrypted) with path '/'
        document.cookie = 'selectedLanguage=' + language + '; path=/;';
    }

    // Get the selected language from the cookie or set it to the default value ('en')
    var selectedLanguage = getCookie('selectedLanguage') || 'en';

    // Initialize the flag icon with the default selected language
    updateFlagIcon(selectedLanguage);

    // Handle language selection and update the flag icon
    $('.dropdown-menu a').on('click', function () {
        //alert('Document ready. Button click. Flag.js');
        var language = $(this).data('language');
        updateFlagIcon(language);

        // Update the selectedLanguage variable and save it in the cookie
        selectedLanguage = language;
        document.cookie = 'selectedLanguage=' + selectedLanguage + '; path=/;';
    });

    // Helper function to get cookie value by name
    function getCookie(name) {
        var value = '; ' + document.cookie;
        var parts = value.split('; ' + name + '=');
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null; // Return null if the cookie is not set
    }
});















