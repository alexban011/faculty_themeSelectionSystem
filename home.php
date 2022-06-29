<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="./app.css" />
    </head>
<body class="form">
    <?php 
        require_once "./config.php";
        if ($_SESSION["is_logged_in"] == false ) {
            header("Location: ./login_page.php");
            exit();
        }
    ?>
    
    <?php
        $name = $_SESSION['name'];
        echo "<h1>Bun venit, $name !</h1>";
    ?>
    <form action="./logout.php" method="post" id="logout">
        <input type="submit" name="submit" value="Logout">
    </form>

    <br>    
    
    <p>Aceasta este pagina de selectat tema de proiect.</p>
    <p>Alege tema mai jos si apasa pe submit.</p>
    <p>Dupa ce selectezi o tema, nu o poti schimba!</p>
    
    <br> 
    <div>
        <form action="./submit_tema.php" method="post" id="submit_tema">
        <label for="selectare_tema">Alege o tema de proiect:</label>
            <select name='tema_selectata' id="selectare_tema">
                <?php 
                    $sql_query = "SELECT * FROM teme_proiect WHERE taken=0";
                    $result = mysqli_query($con,$sql_query);

                    while($rows = $result->fetch_assoc()){
                        $name = $rows['name'];
                        echo "<option value='$name'>$name</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <br>

    <?php 
        $sql_query2 = "SELECT * FROM user WHERE `email`='".$_SESSION['email']."'";
        $result2 = mysqli_query($con,$sql_query2);
        $row2 = $result2->fetch_assoc();

        $tema_aleasa = $row2['tema_aleasa'];

        echo "Tema aleasa: <strong>$tema_aleasa</strong>";
    ?>
</body>
</html>