function dateiauswahl(evt) {
    // FileList-Objekt des input-Elements auslesen, auf dem 
    // das change-Event ausgelöst wurde (event.target)
    var files = evt.target.files; 
  
    // Deklarierung eines Array Objekts mit Namen "fragmente". Hier werden die Bausteine
    // für die erzeugte Listenausgabe gesammelt.
    var fragmente = [];
    // Zählschleife; bei jedem Durchgang den Namen, Typ und 
    // die Dateigröße der ausgewählten Dateien zum Array hinzufügen
    for (var i = 0, f; f = files[i]; i++) {
      fragmente.push('<li><strong>', f.name, '</strong> (', f.type || 'n/a', ') - ',
                     f.size, ' bytes</li>');
    }
    // Alle Fragmente im fragmente Array aneinanderhängen, in eine unsortierte Liste einbetten
    // und das alles als HTML-Inhalt in das output-Elements mit id='dateiListe' einsetzen.
    document.getElementById('dateiListe').innerHTML = '<ul>' + fragmente.join('') + '</ul>';
  }
  
  // UI-Events erst registrieren wenn das DOM bereit ist!
  document.addEventListener("DOMContentLoaded", function() {
    // Falls neue Eingabe, neuer Aufruf der Auswahlfunktion
    document.getElementById('dateien').addEventListener('change', dateiauswahl, false);
  });