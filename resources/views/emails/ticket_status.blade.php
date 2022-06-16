<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Status</title>
</head>
<body>
<p>
    Bonjour {{ ucfirst($ticketOwner->name) }},
</p>
<p>
    Votre ticket d'assistance portant l'ID #{{ $ticket->ticket_id }} a été marqué comme résolu et fermé.
</p>
</body>
</html>