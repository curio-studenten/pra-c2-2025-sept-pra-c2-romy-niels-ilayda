<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
    <title>contact</title>
</head>
    <body>
    <div class="contact-container">
        <h1>Contact</h1>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <label for="fullname">Naam:</label>
            <input type="text" id="fullname" name="fullname" required><br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Bericht:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>

            <button type="submit">Versturen</button>
        </form>
    </div>
    </body>
</html>