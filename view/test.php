<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./test.php" method="post">
        <label for="input-one">Enter your name:</label>
        <input type="text" name="input-one" id="input-one">
        <!-- <label for="input-two">Enter your pass:</label>
        <input type="text" name="input-two" id="input-two"> -->
        <!-- <?php
        if (isset($_POST['tester'])) {
            if ($_POST['exInput'] === 'Raden') {
                echo '<div><h3> This account is exist </h3></div>' . "<br>"; 
            }
        }
        ?> -->
    </form>
    <script>
        var inputone = document.getElementById("input-one");
        inputone.addEventListener("input", function() {
            if (this.value === "Raden") {
                this.setCustomValidity("This account is already exist.");
            } else {
                this.setCustomValidity("");
            }
        });

        // var inputtwo = document.getElementById("input-two");
        // inputtwo.addEventListener("input", function() {
        //     if (this.value === "Rouge") {
        //         this.setCustomValidity("This account is already exist.");
        //     } else {
        //         this.setCustomValidity("");
        //     }
        // });
    </script>
</body>
</html>
