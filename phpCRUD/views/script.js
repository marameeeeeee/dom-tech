document.addEventListener('DOMContentLoaded', function() {
    i18next
      .use(i18nextXHRBackend)
      .use(i18nextBrowserLanguageDetector)
      .init({
        fallbackLng: 'en',
        debug: true,
        backend: {
          loadPath: '/traductions.php?lang={{lng}}',
        },
      }, function(err, t) {
        updateContent();
      });
  
    function updateContent() {
      document.getElementById('hello').textContent = i18next.t('Hello');
    }
  });
  