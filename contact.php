<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Yo, throw me an email dude!</h2>
<div class="row">
    <form class="col s12" name="contact" method="post" action="contact_pro.php">
        <div class="row">
            <div class="input-field col s6">
                <input id="firstName" name="firstName" type="text" class="validate" required="" aria-required="true">
                <label for="firstName">First Name</label>
            </div>
            <div class="input-field col s6">
                <input id="lastName" name="lastName" type="text" class="validate" required="" aria-required="true">
                <label for="lastName">Last Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" required="" aria-required="true">
                <label for="email">E-Mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="message" id="message" class="materialize-textarea" required="" aria-required="true"></textarea>
                <label for="message">Message</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Send
        </button>
    </form>
</div>
</div>
</body>
</html>