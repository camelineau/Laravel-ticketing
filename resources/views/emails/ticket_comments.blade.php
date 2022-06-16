<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>

---
<p>Réponse de: {{ $user->name }}</p>

<p>Titre: {{ $ticket->title }}</p>
<p>ID Ticket: {{ $ticket->ticket_id }}</p>
<p>Statut: {{ $ticket->status }}</p>

<p>
    Vous pouvez consulter le billet à tout moment sur {{ url('tickets/'. $ticket->ticket_id) }}
</p>

</body>
</html>