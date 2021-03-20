<?php require_once("reused/header.php"); ?>
<?php
session_start();

if (isset($_POST["hash"])) {
    $name = $_SESSION["username"];
    $result = $pdo->query("SELECT id FROM users WHERE username = '$name'");
    $id = $result->fetch(PDO::FETCH_OBJ);
    
    
    $secret = $_POST['secret'];
    $hashtag = $_POST['hash'];
    $id = $id->id;

    $result = $pdo->exec("INSERT INTO secret (text_secret, hashtag, user_id) VALUES ('$secret', '$hashtag','$id')");
    echo $result . '<br>';
}
?>

<h1 style="text-align: center;">Salut <?php echo $_SESSION["username"]; ?>!</h1>

<div class="wrapper">
    <form method="POST">
        <div class="form-row">
            <div class="form-group">
                <textarea required class="form-control" name="secret" maxlength="400" data-min-rows="2" class="form-control" id="secret" placeholder="Ton secret"></textarea>
                <label style="padding-top:10px ;" id="sss" for="inputCity">400 characters left</label>

            </div>

            <div class="form-row">

                <div class="form-group ">
                    <label for="hash">Hashtag</label>
                    <select id="hash" name="hash" class="form-control form-control-sm" required>
                        <option value="" disabled selected>Choisir hashtag</option>
                        <option value="sex">Sex</option>
                        <option value="cringe">Cringe</option>
                        <option value="amour">amour</option>
                        <option value="lgbt">Lgbt</option>
                        <option value="drole">Drole</option>
                        <option value="hot">Hot</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary">Envoie</button>
            </div>
    </form>
</div>

<script>
    $('textarea').on("input", function() {
        var maxlength = $(this).attr("maxlength");
        var currentLength = $(this).val().length;

        if (currentLength >= maxlength) {
            $('#sss').html("You have reached the maximum number of characters.");
        } else {
            $('#sss').html(maxlength - currentLength + " chars left");
        }
    });


    $(document)
        .one('focus.textarea', '.form-control', function() {
            var savedValue = this.value;
            this.value = '';
            this.baseScrollHeight = this.scrollHeight;
            this.value = savedValue;
        })
        .on('input.textarea', '.form-control', function() {
            var minRows = this.getAttribute('data-min-rows') | 0,
                rows;
            this.rows = minRows;
            rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
            this.rows = minRows + rows;
        });
</script>