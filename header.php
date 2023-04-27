

<div class="Header">
    <div class="Left">
        <a href="index.php">
            <img src="images/gha.gif">
            <h1>Quizler</h1>
        </a>
    </div>
    <div class="Center">
        <form action="index.php" method="get">
            <input id="search" name="search" type="text" placeholder="Type here...">
            <input id="submit" type="submit" value="Search">
        </form>

    </div>
    <div class="Right">

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo 'Welcome, ' . $_SESSION['login_user'] . '!';?>
    <form action="logout.php" method="post">
        <input type="submit" value="Log Out">
    </form>
    <form action='create.php' method='get'>
        <input type="submit" value="Create">
    </form>
    <?php if($_SESSION['admin']){?>
    <form action='admin.php' method='get'>
        <input type="submit" value="Admin">
    </form>
    <?php }
    } else {?>
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
