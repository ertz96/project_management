<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebSocket Test</title>
</head>
<body>
  <h1>WebSocket Test</h1>
  <script>
    // WebSocket-Verbindung herstellen
    const ws = new WebSocket('ws://localhost:8080');

    // Verbindung geöffnet
    ws.onopen = () => {
      console.log('Verbindung zum WebSocket-Server hergestellt.');
      ws.send('Hallo Server!');
    };

    // Nachricht vom Server empfangen
    ws.onmessage = (event) => {
      console.log('Nachricht vom Server:', event.data);
    };

    // Verbindung geschlossen
    ws.onclose = () => {
      console.log('WebSocket-Verbindung geschlossen.');
    };

    // Fehler behandeln
    ws.onerror = (error) => {
      console.error('WebSocket-Fehler:', error);
    };
  </script>
</body>
</html>
