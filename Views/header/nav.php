</head>
<body>
<div class="bloc_gauche">
    <?php
    if(empty($_SESSION)) {
        echo '';
    }else {
        ?>
        <a href="" class="lien-profil"><img src="assets/img/profil.png" alt="profil" class="img-profil"><br/>
            Profil</a>
        <?php
    }
    ?>
</div>
<div class="bloc_centrage">
    <header>
        <nav>
            <ul>
                <?php
                if(empty($_SESSION)){
                    ?>
                    <li><a href="" class="register">Register</a></li>
                    <li><a href="index.php?route=login" class="login">Login</a></li>
                    <li><a href="index.php?route=top">Top</a></li>
                    <li><a href="index.php?route=shots">shots</a></li>
                    <?php
                }else{
                    ?>
                    <a href="index.php?route=profil"><?= $_SESSION['pseudo'] ?></a>
                    <a href="index.php?route=disconnect">Disconnect</a>
                    <a href="index.php?route=top">Top</a>
                    <a href="index.php?route=shots">shots</a>
                    <a href="index.php?route=upload&num=<?= $_SESSION['id'] ?>">Upload</a>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <?php
        if(!empty($_SESSION)){
            echo '';
        }else {
            ?>
            <!--            Formulaire d'inscription et connexion-->
            <!--            Formulaire de connexion-->
            <div class="formulaire formulaireLogin">
                <form method="post" class="formualairea" action="index.php?route=login">
                    <!--    Pseudo-->
                    <div class="blocInput">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" id="pseudo" class="champtext" name="pseudo" required/><br/>
                    </div>

                    <!--    Password-->
                    <div class="blocInput">
                        <label for="password">Password : </label>
                        <input type="password" id="password" class="champtext" name="password" autocomplete="off"
                               required/><br/>
                    </div>

                    <input type="submit" value="Log in" class="btn-submit login-btn"/>
                </form>

                <a href="index.php?route=register" class="newAccount">Register new account</a>
            </div>

            <!--            Formulaire d'inscription-->
            <div class="formulaire formulaireRegister">
                <form method="post" action="index.php?route=register">
                    <!--    nom-->
                    <div class="blocInput">
                        <label for="nom">First Name</label>
                        <input id="nom" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="nom"
                               required/>
                    </div>

                    <!--    prenom -->
                    <div class="blocInput">
                        <label for="prenom">Last Name</label>
                        <input id="prenom" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="prenom"
                               required/>
                    </div>

                    <!--    pseudo -->
                    <div class="blocInput">
                        <label for="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" class="champtext" pattern="[a-zA-Z0-9]{2,64}" name="pseudo"
                               required/>
                    </div>

                    <!--    Email-->
                    <div class="blocInput">
                        <label for="email">Email</label>
                        <input id="email" class="login_input champtext" type="email" name="email" required/>
                    </div>

                    <div class="blocInput">
                        <label for="password">Password (min. 6 characters)</label>
                        <input id="password" type="password" class="champtext" name="password" pattern=".{6,}"
                               required autocomplete="off"/>
                    </div>

                    <!--    Repeter le password-->
                    <div class="blocInput">
                        <label for="password_repeat">Repeat password</label>
                        <input id="password_repeat" type="password" class="champtext" name="password_repeat"
                               pattern=".{6,}" required autocomplete="off"/>
                    </div>

                    <!--    Soumettre le formulaire-->
                    <input type="submit" value="Register" class="btn-submit"/>
                </form>
            </div>
            <?php
        }
        ?>
    </header>