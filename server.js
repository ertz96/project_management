const WebSocket = require('ws');
const server = new WebSocket.Server({ port: 8080 });

console.log('WebSocket-Server läuft auf ws://localhost:8080');

server.on('connection', (socket) => {
    console.log('Neue Verbindung');

    socket.on('message', (message) => {
        const data = JSON.parse(message);
        const { id, is_completed } = data;
        console.log('Nachricht vom Client:', data);

        // Iteriere über alle Clients und sende die Nachricht an andere Clients
        server.clients.forEach((client) => {
            console.log('Vergleiche client und socket:', client === socket);  // Sollte immer false sein
            if (client !== socket && client.readyState === WebSocket.OPEN) {
                client.send(JSON.stringify({ id, is_completed }));
            }
        });
    });

    socket.on('close', () => {
        console.log('Verbindung geschlossen');
    });

    socket.on('error', (error) => {
        console.log('Fehler:', error);
    });
});

