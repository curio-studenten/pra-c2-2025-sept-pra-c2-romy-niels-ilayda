<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
    <title>contact</title>
</head>
    <body>
    <div class="contact-container">
        <h1>Contact</h1>
        <form class="contact-form">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Bericht</label>
        <textarea id="message" name="message" rows="6" required></textarea>

        <button type="submit">Verstuur</button>
        </form>
    </div>
    </body>
</html>