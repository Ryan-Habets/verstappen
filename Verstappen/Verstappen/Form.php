<!DOCTYPE html>
<html>
    <head><meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reservation Form</title>
        <link rel="stylesheet" href="style.css">
    </head>


    <body>


        <img class="Background" src="./images/Zandvoort.jfif" alt="Background">




        <?php
        require "database.php";
        $_RSV = new Reservation();
        // PROCESS FORM WHEN SUBMITTED
        if (isset($_POST['name'])) {
          require "res-lib.php";
          echo $_RSV->save($_POST['name'], $_POST['email'], $_POST['date'], $_POST['place'], $_POST['amount'])
          ? "<div></div>" : "<div>".$_RSV->error."</div>";
        }
        ?>


        <!--RESERVATION FORM-->
                <div class="InputForm">
                    <form method="post" target="_self">


                        <input type="text" name="name" placeholder="First+LastName" required/>
                        <br>
                        <br>
                        <input type="email" name="email" placeholder="Email" required/>
                        <br>
                         <br>
                        <input type="date" name="date" placeholder="Date" required/>
                        <br>
                        <br>
                         <br><text>Plaats</text><br>
                             <select id='listid' name="place">
                                 <option value="Zandvoort Circuit">Zandvoort Circuit</option>
                                 <option value="MECC Maastricht">MECC Maastricht</option>
                                 <option value="Speedway Emmen">Speedway Emmen</option>
                            </select>
                        <br>
                        <br>
                        <br> <text>Aantal Personen</text><br>
                        <select id='listid' name="amount" placeholder="Amount">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <br>
                        <br>
                        <br>
                        <br>
                        <input class="Send" type="submit" value="SEND"/>
                    </form>
                </div>

    </body>
</html>