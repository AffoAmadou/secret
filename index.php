<?php require_once("reused/header.php"); ?>



<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: homepage.php");
    exit;
} else { ?>
    <div class="contenue">

    </div>

<?php  } ?>


<a href="" data-toggle="modal" data-target="#exampleModal" class="float">
    <i class="fa fa-plus my-float"></i>
</a>

<script>
    $(document).ready(function() {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    index: "true"
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                // alert( "complete" );
            });
    });

    function uneFonction(val) {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    tag: val
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );)
            });
    }
</script>

<?php require_once("reused/footer.php"); ?>