<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Company Name:</strong> {{ $contact->company_name }}</p>
    <p><strong>Employee Count:</strong> {{ $contact->employee_count }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contact->message }}</p>
</body>
</html>
