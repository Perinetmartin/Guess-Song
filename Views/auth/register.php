<form method="post" action="">
<!--    nom-->
    <label for="nom">First Name</label>
    <input id="nom" type="text" pattern="[a-zA-Z0-9]{2,64}" name="nom" required /><br/>

    <!--    prenom -->
    <label for="prenom">Last Name</label>
    <input id="prenom" type="text" pattern="[a-zA-Z0-9]{2,64}" name="prenom" required /><br/>

    <!--    pseudo -->
    <label for="pseudo">Pseudo (only letters and numbers, 2 to 64 characters)</label>
    <input id="pseudo" type="text" pattern="[a-zA-Z0-9]{2,64}" name="pseudo" required /><br/>

<!--    Email-->
    <label for="email">Email</label>
    <input id="email" class="login_input" type="email" name="email" required /><br/>

<!--    pattern = 6 caractère minimun -->
<!--    autocomplete désactive l'autocomplétion  -->
    <label for="password">Password (min. 6 characters)</label>
    <input id="password" type="password" name="password" pattern=".{6,}" required autocomplete="off" /><br/>

<!--    Repeter le password-->
    <label for="password_repeat">Repeat password</label>
    <input id="password_repeat" type="password" name="password_repeat" pattern=".{6,}" required autocomplete="off" /><br/>

<!--    Soumettre le formulaire-->
    <input type="submit" value="Register" />
</form>