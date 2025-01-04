// WebSocket-Verbindung herstellen
let ws = new WebSocket('ws://localhost:8080');

// Wenn die Verbindung geöffnet wird
ws.onopen = () => {
    console.log('WebSocket verbunden');
};

// Wenn eine Nachricht empfangen wird (z.B. Statusänderung einer Aufgabe)
ws.onmessage = (event) => {
    switchStatus(event);
};

// Fehlerbehandlung
ws.onerror = (error) => {
    console.error('WebSocket Fehler:', error);
};

// Wenn die WebSocket-Verbindung geschlossen wird
ws.onclose = () => {
    console.log('WebSocket geschlossen');
};

function toggleTaskStatus(taskId, currentStatus) {
    if (!ws || ws.readyState !== WebSocket.OPEN) {
        console.error('WebSocket ist nicht verbunden');
        return;
    }

    const newStatus = currentStatus === 1 ? 0 : 1;

    // Anfrage an Laravel senden
    fetch(`/tasks/${taskId}/toggle`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ is_completed: newStatus })
    })
        .then(response => response.json())
        .then(data => {
            // Nachricht an den WebSocket-Server senden
            ws.send(JSON.stringify(data));

            switchStatus(JSON.stringify(data));

        })
        .catch(error => console.error('Fehler beim Umschalten des Task-Status:', error));

}

function switchStatus(data) {
    let jsonData;
    if (data.data === undefined)
        jsonData = JSON.parse(data);
    else
        jsonData = JSON.parse(data.data);

    const taskId = jsonData.id;
    const newStatus = jsonData.is_completed;  // 'completed' oder 'not_completed'

    // DOM aktualisieren, um den Task-Status anzuzeigen
    const taskElement = document.querySelector(`div[data-task-id='${taskId}']`);

    if (newStatus === true) {
        taskElement.textContent = 'Completed';
        taskElement.classList.remove('text-danger');
        taskElement.classList.add('text-success');
    } else {
        taskElement.textContent = 'Not Completed';
        taskElement.classList.remove('text-success');
        taskElement.classList.add('text-danger');
    }
}

function addEventAccordion() {
    document.querySelectorAll('.accordion-header').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;

            // Toggle "display" zwischen "none" und "block"
            if (content.style.display === 'block') {
                content.style.display = 'none';
            } else {
                content.style.display = 'block';
            }
        });
    });
}

function init() {
    addEventAccordion();
}

init();