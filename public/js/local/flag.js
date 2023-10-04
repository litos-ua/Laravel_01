

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
//_________________________________________________________________________________________________________________________




// Запоминает флаг с помощью coockies (вроде как без кодировки). Использует JQuery
// Работает нормально только с коррекцией middleware!

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

//______________________________________________________________________________________________________________________

// Запоминает флаг с помощью coockies (вроде как без кодировки). Только JS, не использует JQuery!
// Работает нормально только с коррекцией middleware!
// document.addEventListener('DOMContentLoaded', () => {
//     // Mapping of language codes to flag image filenames
//     let languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//     };
//
//     // Function to update the flag icon in the "Language Selector Dropdown"
//     function updateFlagIcon(language) {
//         let flagFilename = languageFlags[language];
//         document.querySelector('.flag-icon').src = '/pictures/local/flags/' + flagFilename;
//
//         // Save the selected language in a cookie (unencrypted) with path '/'
//         document.cookie = 'selectedLanguage=' + language + '; path=/;';
//     }
//
//     // Get the selected language from the cookie or set it to the default value ('en')
//     let selectedLanguage = getCookie('selectedLanguage') || 'en';
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Handle language selection and update the flag icon
//     let languageLinks = document.querySelectorAll('.dropdown-menu a');
//     languageLinks.forEach((link) => {
//         link.addEventListener('click', (event) => {
//             event.preventDefault(); // Prevent the default link behavior
//             let language = link.getAttribute('data-language');
//             updateFlagIcon(language);
//
//             // Update the selectedLanguage variable and save it in the cookie
//             selectedLanguage = language;
//             document.cookie = 'selectedLanguage=' + selectedLanguage + '; path=/;';
//
//             // Reload the page with the selected language
//             window.location.href = link.href;
//         });
//     });
//
//     // Helper function to get cookie value by name
//     function getCookie(name) {
//         let value = '; ' + document.cookie;
//         let parts = value.split('; ' + name + '=');
//         if (parts.length === 2) return parts.pop().split(';').shift();
//         return null; // Return null if the cookie is not set
//     }
// });
//
//
// //This code change all text from one language to another in asynchronous type.
// document.addEventListener('DOMContentLoaded', async () => {
//     const languageLinks = document.querySelectorAll('.dropdown-menu a');
//
// // Function to fetch and replace language strings
//     async function loadLanguage(locale) {
//         try {
//             const response = await fetch(`/lang/${locale}`); // Assuming this route fetches translations
//             const data = await response.json();
//
//             // Replace text content using translations from the data
//             document.querySelectorAll('[data-translate]').forEach((element) => {
//                 const translationKey = element.getAttribute('data-translate');
//                 const translation = data[translationKey];
//
//                 // Check if a translation exists and replace the text
//                 if (translation) {
//                     element.textContent = translation;
//                 }
//             });
//         } catch (error) {
//             console.error('Error loading language:', error);
//         }
//     }
//
//     // Get the selected language from the cookie
//     const selectedLanguage = getCookie('selectedLanguage') || 'en';
//
//     // Load the initial language
//     loadLanguage(selectedLanguage);
//
//     // Handle language selection
//     languageLinks.forEach((link) => {
//         link.addEventListener('click', async (event) => {
//             event.preventDefault();
//             const language = link.getAttribute('data-language');
//             await loadLanguage(language);
//             // Update the selectedLanguage cookie
//             document.cookie = `selectedLanguage=${language}; path=/;`;
//         });
//     });
//
//     // Helper function to get cookie value by name
//     function getCookie(name) {
//         const value = `; ${document.cookie}`;
//         const parts = value.split(`; ${name}=`);
//         if (parts.length === 2) return parts.pop().split(';').shift();
//         return null; // Return null if the cookie is not set
//     }
// });

//______________________________________________________________________________________________________________________

// В процессе корректировки. Работает частично. Идет на роут, получает через json содержимое файла auth и фетчит его.
// Перезагрузки нет. Но текст не меняется.
// document.addEventListener('DOMContentLoaded', () => {
//     // Mapping of language codes to flag image filenames
//     const languageFlags = {
//         'en': 'english-flag.png',
//         'pl': 'poland-flag.png',
//         'uk': 'ukraine-flag.png',
//     };
//
//     // Function to update the flag icon in the "Language Selector Dropdown"
//     function updateFlagIcon(language) {
//         const flagFilename = languageFlags[language];
//         const flagImageUrl = '/pictures/local/flags/' + flagFilename;
//         document.querySelector('.flag-icon').src = flagImageUrl;
//
//         // Save the selected language in a cookie (unencrypted) with path '/'
//         document.cookie = 'selectedLanguage=' + language + '; path=/;';
//     }
//
//     // Function to fetch and replace language strings
//     async function loadLanguageAndReplaceText(locale, file) {
//         try {
//             const response = await fetch(`/lang/${locale}/${file}`);
//             const data = await response.json();
//             console.log('Fetched language data:', data);
//
//             // Iterate over the translations and replace text content
//             document.querySelectorAll('[data-translate]').forEach((element) => {
//                 const translationKey = element.getAttribute('data-translate');
//                 const translation = data[translationKey];
//                 console.log('Replacing text for key:', translationKey, 'with value:', translation);
//
//                 // Check if a translation exists and replace the text
//                 if (translation) {
//                     element.textContent = translation;
//                 }
//             });
//         } catch (error) {
//             console.error('Error loading language:', error);
//         }
//     }
//
//     // Get the selected language from the cookie
//     const selectedLanguage = getCookie('selectedLanguage') || 'en';
//     const defaultFile = 'auth'; // Specify a default language file
//
//
//     // Initialize the flag icon with the default selected language
//     updateFlagIcon(selectedLanguage);
//
//     // Load the initial language and replace text
//     loadLanguageAndReplaceText(selectedLanguage, defaultFile); // Load the default file initially
//
//     // Handle language selection and update the flag icon
//     const languageLinks = document.querySelectorAll('.dropdown-menu a');
//     languageLinks.forEach((link) => {
//         link.addEventListener('click', async (event) => {
//             event.preventDefault();
//             const language = link.getAttribute('data-language');
//             const file = link.getAttribute('data-file'); // Get the language file name
//             updateFlagIcon(language);
//
//             // Update the selectedLanguage cookie
//             document.cookie = `selectedLanguage=${language}; path=/;`;
//
//             // Load the language and replace text asynchronously
//             loadLanguageAndReplaceText(language, file); // Pass the file name
//         });
//     });
//
//     // Helper function to get cookie value by name
//     function getCookie(name) {
//         const value = `; ${document.cookie}`;
//         const parts = value.split(`; ${name}=`);
//         if (parts.length === 2) return parts.pop().split(';').shift();
//         return null; // Return null if the cookie is not set
//     }
// });
//______________________________________________________________________________________________________________________





