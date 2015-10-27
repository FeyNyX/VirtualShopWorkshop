<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
            <?php
            // displays login form if user is not set in session
            if (empty($_SESSION['userId'])) {
                echo('
                <form class="navbar-form navbar-left" id="loginForm" name="header" role="form" action="/VirtualShopWorkshop/checkLogin" method="post">
                <div class="form-group">
                    <input class="form-control" name="login" type="text" placeholder="Login">
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="text" placeholder="Password">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-sign-in"></i></span>
                    <input type="submit" class="form-control" id="log-in" value="Log in" aria-describedby="basic-addon2">
                </div>
                or <div class="input-group">
                    <a href="/VirtualShopWorkshop/rejestracja">REGISTER</a>
                </div>
                </form>
                ');
            } else {
                // otherwise displays logout form
                echo('
                <form class="navbar-form navbar-left" id="logoutForm" name="header" role="form" action="/VirtualShopWorkshop/logout" method="post">
                    <div class="input-group">
                       <span class="input-group-addon" id="basic-addon2"><i class="fa fa-sign-out"></i></span>
                       <input type="submit" class="form-control" id="log-out" value="Log out" aria-describedby="basic-addon2">
                    </div>
                    </form>
                    ');
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!empty($_SESSION['userId'])) {
                    echo "<li><a href='/VirtualShopWorkshop/userPanel/{$_SESSION["userId"]}'>USER PANEL</a></li>";
                }
                ?>
                <li><a href="#band">~</a></li>
                <li><a href="#tour">~</a></li>
                <li><a href="#contact">~</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
