# 📋 Project Management Tool (Laravel)

Dies ist ein einfaches Projektmanagement-Tool, das ich mit [Laravel](https://laravel.com) als persönliches Lernprojekt entwickelt habe. Es dient als **Code-Beispiel** für meine Bewerbungen und demonstriert den Einsatz moderner Webentwicklung mit PHP, Laravel, Blade, und mehr.

---

## 🚀 Features

- ✅ Benutzerregistrierung & Login (Laravel Breeze)
- ✅ Projekte und Aufgaben verwalten (CRUD)
- ✅ MVC-Struktur mit Models, Views und Controllern
- ✅ Migrationen und Seedings für die Datenbankstruktur
- ✅ Lokale Entwicklungsumgebung mit `artisan` und `npm`

---

## ⚙️ Installation (lokal)

### 1. Repository clonen
```bash
git clone https://github.com/ertz96/project_management.git
cd project_management
```

### 2. Abhängigkeiten installieren
```bash
composer install
npm install && npm run dev
```

### 3. .env-Datei erstellen und App-Key generieren
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Datenbank einrichten
Passe die `.env`-Datei an deine lokale Datenbank an und führe dann aus:
```bash
php artisan migrate
```

### 5. Lokalen Server starten
```bash
php artisan serve
```

Dann erreichst du das Projekt in deinem Browser unter [http://localhost:8000](http://localhost:8000)

---

## 🧠 Lernziele & Fokus

Dieses Projekt entstand im Rahmen meiner Weiterbildung und hat mir geholfen, folgende Themen praktisch umzusetzen:

- Laravel-Projektstruktur verstehen und nutzen
- Datenbankmodellierung mit Migrationen & Seedern
- Authentifizierung mit Laravel Breeze
- Blade-Templates zur Darstellung von UI-Komponenten
- Routing, Middleware und Controller-Logik

---

## 🔒 Hinweise

- **Achtung:** In diesem Repository befinden sich keine produktionsreifen Daten oder Sicherheitsmechanismen.
- Dieses Projekt ist **nicht für Live-Einsatz** gedacht, sondern als **Code-Referenz** für meine Bewerbungen.
- Die `.env`-Datei ist aus Sicherheitsgründen nicht enthalten.

---

## 📄 Lizenz

Dieses Projekt ist unter der MIT-Lizenz veröffentlicht. Du darfst den Code gerne einsehen, kopieren und anpassen – aber nur auf eigene Verantwortung. 😉

---

## 🤝 Kontakt

Wenn du Fragen hast oder Feedback geben möchtest, erreichst du mich über [GitHub](https://github.com/ertz96).

---
