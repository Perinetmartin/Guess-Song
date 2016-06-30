<div class="formulaire formulaireRegister">
    <form method="post" action="">
    <!--    nom-->
        <div class="blocInput">
            <label for="nom">First Name</label>
            <input id="nom" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="nom" required />
        </div>

        <!--    prenom -->
        <div class="blocInput">
            <label for="prenom">Last Name</label>
            <input id="prenom" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="prenom" required />
        </div>

        <!--    pseudo -->
        <div class="blocInput">
            <label for="pseudo">Pseudo</label>
            <input id="pseudo" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="pseudo" required />
        </div>

    <!--    Email-->
        <div class="blocInput">
            <label for="email">Email</label>
            <input id="email" class="login_input champtext" type="email" name="email" required />
        </div>

        <div class="blocInput">
            <label for="password">Password (min. 6 characters)</label>
            <input id="password" type="password" class="champtext" name="password" pattern=".{6,}" required autocomplete="off" />
        </div>

    <!--    Repeter le password-->
        <div class="blocInput">
            <label for="password_repeat">Repeat password</label>
            <input id="password_repeat" type="password" class="champtext" name="password_repeat" pattern=".{6,}" required autocomplete="off" />
        </div>

    <!--    Soumettre le formulaire-->
        <input type="submit" value="Register" class="btn-submit"/>
    </form>
</div>