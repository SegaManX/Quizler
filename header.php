<div class="Header">
    <div class="Left">
        <span>
            <img src="images/gha.gif" style="width:100; height:100">
            <h1>Quizler</h1>
        </span>
    </div>
    <div class="Center">
        <form action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Type here">
            <input id="submit" type="submit" value="Search">
        </form>

    </div>
    <div class="Right">

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo 'Welcome, ' . $_SESSION['login_user'] . '!';?>
    <button>Log out</button>
    <?php } else {?>
        <form action="login.php" method="post">
        <label for="lusername">Username:</label> 
        <input id="lusername" name="lusername" required="" type="text" />
        <br>
        <label for="lpassword">Password:</label>
        <input id="lpassword" name="lpassword" required="" type="password" />
        <input name="login" type="submit" value="Login" />
    </form>

        <form action="register.php" method="post">
        <label for="username">Username:</label> 
        <input id="username" name="username" required="" type="text" />
        <br>
        <label for="email">Email:</label>
        <input id="email" name="email" required="" type="email" />
        <br>
        <label for="password">Password:</label>
        <input id="password" name="password" required="" type="password" />
        <input name="register" type="submit" value="Register" />
    </form>


    <?php } ?>

    </div>

</div>
