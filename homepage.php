<?php require_once("reused/headerl.php"); ?>

<div class="contenue">

</div>

<a href="write.php" class="float">
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
                //rt( "complete" );
            });
    }

    function sexFonction(val) {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    sex: val
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );
            });
    }

    function mesSecret() {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    id: "val"
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );
            });
    }



    function unDelete(val) {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    idx: val
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );
            });
    }

    function upvote(val) {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    up: val
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );
            });
    }

    function downvote(val) {

        var jqxhr = $.ajax({
                method: "POST",
                url: "testajax.php",
                data: {
                    down: val
                }
            })
            .done(function(contenuDeLaPage) {
                $('.contenue').html(contenuDeLaPage);
            })
            .fail(function() {
                alert("error");
            })
            .always(function() {
                //rt( "complete" );
            });
    }
    // function alert() {
    //     alert("login");
    // }

    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function myFunction() {
        var element = document.body;
        element.classList.toggle("body-darkmode");
    }
</script>
<?php require_once("reused/footer.php"); ?>