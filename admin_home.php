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

    <h1>Bun venit, Admin</h1>

    <form action="./logout.php" method="post" id="logout">
        <input type="submit" name="submit" value="Logout">
    </form>

    <br>    
    
    <p>Aceasta este pagina de admin pentru sistemul de alegeri de teme proiect.</p>
    <br>

    <p>Vizualiza-ti ce teme si-au ales studentii:</p>
    <table>
        <tr>
            <th>Nume student</th>
            <th>Email student</th>
            <th>Tema aleasa</th>
        </tr>
        <?php 
            $sql_query = "SELECT * FROM `user`";
            $result = mysqli_query($con,$sql_query);

            while($rows = $result->fetch_assoc()){
                echo "<tr>";
                
                $name = $rows['name'];
                $email = $rows['email'];
                $tema_aleasa = $rows['tema_aleasa'];
                if ($tema_aleasa == 0) {
                    $tema_aleasa = "";
                }

                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$tema_aleasa</td>";

                echo "</tr>";
            }
        ?>
    </table>
    <br><br>

    <p>Vizualiza temele si disponibilitatea:</p>
    <table>
        <tr>
            <th>Nume tema</th>
            <th>Este luata deja?</th>
        </tr>
        <?php 
            $sql_query = "SELECT * FROM `teme_proiect`";
            $result = mysqli_query($con,$sql_query);

            while($rows = $result->fetch_assoc()){
                echo "<tr>";
                
                $name = $rows['name'];
                $taken = $rows['taken'];
                

                echo "<td>$name</td>";
                if ($taken == 0) {
                    $taken = "Nu";
                    echo "<td class=\"eroareSelectie2\">$taken</td>";
                }
                if ($taken == 1) {
                    $taken = "Da";
                    echo "<td class=\"eroareSelectie\">$taken</td>";
                }

                echo "</tr>";
            }
        ?>
    </table>
    <br><br>

    <p>Adaugare tema</p>
    <form action="./addTema.php" method="post">
			<input type="text" name="text" placeholder="Nume proiect" id="text" required>
			<input class="smallButton" type="submit" name="submit" value="Adauga">
	</form>
    <br><br>

    <p>Stergerea unei teme din baza de date:</p>
    <div class="form">
        <form action="./removeTema.php" method="post" id="submit_tema">
            <select name='tema'>
                <?php 
                    $sql_query = "SELECT * FROM teme_proiect WHERE 1";
                    $result = mysqli_query($con,$sql_query);

                    while($rows = $result->fetch_assoc()){
                        $name = $rows['name'];
                        echo "<option value='$name'>$name</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Sterge">
        </form>
    </div>

    <p>Stergerea unui user din baza de date:</p>
    <div class="form">
        <form action="./removeUser.php" method="post" id="remove_user">
            <select name='user'>
                <?php 
                    $sql_query = "SELECT * FROM user WHERE 1";
                    $result = mysqli_query($con,$sql_query);

                    while($rows = $result->fetch_assoc()){
                        $name = $rows['name'];
                        echo "<option value='$name'>$name</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Sterge">
        </form>
    </div>
</body>
</html>
