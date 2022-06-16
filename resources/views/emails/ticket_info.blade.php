<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Suppor Ticket Information</title>
</head>
<body>
<p>
    Merci {{ ucfirst($user->name) }} d'avoir contacté notre équipe d'assistance. Un ticket d'assistance a été ouvert pour vous. Vous serez averti lorsqu'une réponse sera apportée par e-mail. Les détails de votre billet sont indiqués ci-dessous :
</p>

<p>Title: {{ $ticket->title }}</p>
<p>Priorité: {{ $ticket->priority }}</p>
<p>Statut: {{ $ticket->status }}</p>

<p>
    Vous pouvez consulter le billet à tout moment sur {{ url('tickets/'. $ticket->ticket_id) }}
</p>

</body>
</html>