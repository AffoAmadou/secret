<?php require_once("config.ini/config.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

<?php
session_start();


$result = $pdo->query("SELECT * FROM secret ORDER BY  creation DESC");

if (isset($_POST["down"])) {
    //$username = $_SESSION["username"];
    $id = $_POST["down"];
    $pdo->exec("UPDATE secret SET vote_negative = vote_negative + 1 WHERE id_secret = '$id' ");
}

if (isset($_POST["up"])) {
    //$username = $_SESSION["username"];
    $id = $_POST["up"];
    $pdo->exec("UPDATE secret SET vote_positive = vote_positive + 1 WHERE id_secret = '$id' ");
}


if (isset($_POST["idx"])) {
    $username = $_SESSION["username"];
    $id = $_POST["idx"];
    $pdo->exec("DELETE FROM secret WHERE id_secret = '$id'");

    $result = $pdo->query("SELECT * FROM secret 
    INNER JOIN users ON secret.user_id = users.id
    WHERE users.username = '$username'");
}

if (isset($_POST["tag"])) {
    if ($_POST["tag"] != "Chronologique")
        if ($_POST["tag"] == "Random") {

            $result = $pdo->query("SELECT * FROM secret ORDER BY RAND()");
        } else if ($_POST["tag"] == "Viral") {
            $result = $pdo->query("SELECT * FROM secret ORDER BY vote_positive DESC");
        } else {
            $tag = $_POST["tag"];
            $result = $pdo->query("SELECT * FROM secret WHERE hashtag = '$tag'");
        }
}

if (isset($_POST["sex"])) {
    if ($_POST["sex"] == "Homme") {

        $result = $pdo->query("SELECT * FROM secret
         INNER JOIN users ON secret.user_id = users.id
        WHERE users.gender = 'Homme'");
    } else if ($_POST["sex"] == "Femme") {

        $result = $pdo->query("SELECT * FROM secret
         INNER JOIN users ON secret.user_id = users.id
        WHERE users.gender = 'Femme'");
    } else if ($_POST["sex"] == "Non binary") {

        $result = $pdo->query("SELECT * FROM secret
         INNER JOIN users ON secret.user_id = users.id
        WHERE users.gender = 'Non binary'");
    }
}

if (isset($_POST["id"])) {
    $username = $_SESSION["username"];
    $result = $pdo->query("SELECT * FROM secret 
    INNER JOIN users ON secret.user_id = users.id
    WHERE users.username = '$username'");
}



?>
<div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>
    <?php
    while ($secretss = $result->fetch(PDO::FETCH_OBJ)) { ?>
        <?php $user = $pdo->query("SELECT age,gender FROM users WHERE id = '$secretss->user_id'");
        $curr = $user->fetch(PDO::FETCH_OBJ);

        // Header color 

        $gen = $curr->gender;

        switch ($gen) {
            case "Homme":
                $color = "#71A9F7";
                break;
            case "Femme":
                $color = "#E5446D";
                break;
            case "Non binary":
                $color = "#feb333";
                break;
        }
        ?>


        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-header" style=" background-color :<?php echo $color ?>">
                        <?php if (isset($_POST["id"]) || isset($_POST["idx"])) { ?>
                            <h5 class="card-title"><?php echo $curr->gender ?> de <?php echo $curr->age ?> ans </h5>
                            <a href="#"> <button value="<?php echo $secretss->id_secret; ?>" onclick="unDelete(this.value)">Eliminer</button></a>
                            <a href="#"> <button value="<?php echo $secretss->id_secret; ?>">Modifier</button></a>
                        <?php } else { ?>
                            <h5 class="card-title"><?php echo $curr->gender ?> de <?php echo $curr->age ?> ans</h5>
                        <?php } ?>
                    </div>
                    <p class="card-text"><?php echo $secretss->text_secret; ?></p>
                    <div class="card-details">
                        <?php
                        $score_p = $secretss->vote_positive;
                        $score_n = $secretss->vote_negative;
                        $score = $score_p - $score_n;
                        ?>
                        <p class="card-score"><i class="fas fa-trophy"> <?php echo $score; ?></i> pt </p>
                        <p class="card-time"><?php echo $secretss->creation; ?> </p>

                        <?php
                        switch ($secretss->hashtag) {
                            case "sex": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="fab fa-hotjar"></i> <?php echo $secretss->hashtag; ?></button></a>
                            <?php break;
                            case "cringe": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="far fa-grin-beam-sweat"></i> <?php echo $secretss->hashtag; ?></button></a>
                            <?php break;
                            case "drole": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="far fa-laugh-squint"></i> <?php echo $secretss->hashtag; ?></button></a>
                            <?php break;
                            case "amour": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="fas fa-heart"></i> <?php echo $secretss->hashtag; ?></button></a>
                            <?php break;
                            case "hot": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="fas fa-pepper-hot"></i> <?php echo $secretss->hashtag; ?></button></a>
                            <?php break;
                            case "lgbt": ?>
                                <a href="#" class="card-tag"><button value="<?php echo $secretss->hashtag; ?>" onclick="uneFonction(this.value)"><i class="fas fa-rainbow"></i> <?php echo $secretss->hashtag; ?></button></a>
                        <?php break;
                        }
                        ?>

                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-pos"><button value="<?php echo $secretss->id_secret; ?>" onclick="upvote(this.value)"><i class="fas fa-arrow-up"> <?php echo $secretss->vote_positive; ?></i></button></a>
                    <a href="#" class="card-neg"><button value="<?php echo $secretss->id_secret; ?>" onclick="downvote(this.value)"><i class="fas fa-arrow-down"> <?php echo $secretss->vote_negative; ?></i></button></a>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                        <a href="#" class="card-comment"><i class="fas fa-comments"></i> Comment</a>
                    <?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="card-comment">Comment</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

</div>

<!-- ------------------------------------------------- modal ------------------------------------------------ -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Oups, tu n'es pas connecté.</h2>

            </div>
            <div class="modal-body">
                Pour pouvoir écrire un secret ou un commentaire, tu dois avoir un compte
            </div>
            <div class="modal-footer">
                <a href="register.php"><button type="button" class="btn btn-primary">Register</button></a>
                <a href="login.php"><button type="button" class="btn btn-secondary">Login</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------------modal delete/update-------------------------  -->