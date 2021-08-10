<?php require "header.php";
    echo '
    <table width="1200">
        <tr>
            <td><strong>Problem:</strong>  </td>
            <td> Since Covid19 affected plenty of South African, the government has decided to give Covid relief funds to
    it\'s citizens. While this is a good initiative the state is faced with the first problem of getting information of
    those who needs the funds. The second problem is that if everyone is registered to get the funds, people get crowded
    at the post office to get their funds. This is against the covid protocols as we need to practice Social Distancing.
            </td>
        </tr>
        <tr></tr>
        <tr></tr>

        <tr>
            <td><strong>Solution:</strong> </td>
            <td>To solve the above 2 problems I have decided to create an app that is going to allow citizens to register
    to get this funds. The citizens will also be able to choose a pay center near them on the app. To avoid crowding at
    the post office the will be a roaster for payments using the last 3 digits of citizen ID Number, so a user can check
    if its their pay day before heading out.
            </td>
        </tr>
    </table>';
?>

    <style>
    body{
        background-color: grey;
    }
    </style>
    <hr width="1200px" align="left">
    <h3>Register if you want a home care worker</h3>
    <form action= "task8.php" method= "POST">
        <p>
            <label> Id Number:</label>
            <input type="text" name="id_number" required>
        </p>

        <p>
            <label> Full Name:</label>
            <input type="text" name="full_name" required>
        </p>

        <p>
            <label for="pay_center">Choose your area:</label>
            <select name="pay_center" id="pay_center">
                <option value="Soweto">Soweto</option>
                <option value="orange farm">orange farm</option>
                <option value="Evaton">Evaton</option>
                <option value="Katlehong">Katlehong</option>
                <option value="Motlhabe">Motlhabe</option>
                <option value="Boitekong">Boitekong</option>
                <option value="Protea Park">Protea Park</option>
                <option value="Phokeng">Phokeng</option>
            </select>
        </p>
        <button type="submit" name="register" value="register">Register</button>
    </form><br>
    <hr width="1200px" align="left">

    <h3>Check your check Day</h3>
    <form action= "task8.php" method= "POST">
        <p>
            <label> Id Number:</label>
            <input type="text" name="id_number" required>
        </p>

        <button type="submit" name="check" value="check">Check</button><br>
    </form><br>
    <hr width="1200px" align="left">

    <h3>Delete account on database</h3>
    <form action= "task8.php" method= "POST">
        <p>
            <label> Id Number:</label>
            <input type="text" name="id_number" required>
        </p>

        <button type="submit" name="delete" value="delete">Delete Account</button><br>
    </form><br>
    <hr width="1200px" align="left">

<?php require "footer.php"?>