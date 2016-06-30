<div class="formulaire formulaireLogin">
    <form method="post" class="formualairea" action="index.php?route=login">
    <!--    Pseudo-->
        <div class="blocInput">
            <label for="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" class="champtext" name="pseudo" required /><br/>
        </div>

    <!--    Password-->
        <div class="blocInput">
            <label for="password">Password : </label>
            <input type="password" id="password" class="champtext" name="password" autocomplete="off" required /><br/>
        </div>

        <input type="submit" value="Log in" class="btn-submit login-btn" />
    </form>

    <a href="index.php?route=register" class="newAccount">Register new account</a>
</div>