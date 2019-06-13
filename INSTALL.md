# Installation

1. Kopieren Sie den Inhalt des Ordners *copy_this/* auf Ihren Server.

2. Führen Sie dann die Datei *install.sql* aus. Gehen Sie dazu ins Backend auf *Service -> Tools* und wählen Sie dort diese Datei aus. Starten Sie das Update, und klicken Sie dann auf *VIEWS jetzt updaten*. Leeren Sie dann den *tmp/*-Ordner Ihres Shops.

3. Jetzt können Sie das Modul unter *Erweiterungen -> Module* aktivieren.

Die zusätzlichen Tabs lassen sich jetzt bei jedem Produkt im Tab "zusätzliche Tabs" einzeln konfigurieren.


## Verwendung des TinyMCE-Moduls

Sie können das TinyMCE-Modul für OXID ([http://marat.ws/bla-tinymce/](http://marat.ws/bla-tinymce/)) verwenden, um die Inhalte für die Tabs einfacher zu bearbeiten.

Gehen Sie dazu in die Moduleinstellungen des TinyMCE-Moduls (*Erweiterungen -> Module -> TinyMCE -> Einstellungen*), und fügen Sie dort im Eingabefeld, das mit **Liste der Backend-Klassen, wo TinyMCE angezeigt werden soll** beschriftet ist, folgende Zeile hinzu:

    article_moretabs

