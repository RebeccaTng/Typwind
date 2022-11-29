<!DOCTYPE html>
<html lang="eng">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/public/css/style5.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <!-- sidebar Toggle Js -->
    <script type="text/javascript" src="<?=base_url()?>/app/Controllers/sidebarToggle.js" defer></script>
    <!-- Language switch Js -->
    <script type="text/javascript" src="<?=base_url()?>/app/Models/languageData.js" defer></script>

</head>
<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Typwind</h3>
                <div class="langWrap">
                    <a href="#" language='nederlands' class="active">NED</a>
                    |
                    <a href="#" language='english'>ENG</a>
                </div>
        </div>

        <ul class="list-unstyled components">
            <li><a href="<?=base_url()?>/public/experthome" title="Go home" class="home" >Home</a></li>
            <li><a href="<?=base_url()?>/public/students" title="Look at students" class="students">Students</a></li>
            <li><a href="<?=base_url()?>/public/exercises" title="Look at exercises" class="exercises">Exercises</a></li>
            <li><a href="<?=base_url()?>/public/profile" title="Look at profile" class="profile">My Profile</a></li>
        </ul>

        <ul class="list-unstyled CTAs">
            <form method="post">
                <li><a href="<?=base_url()?>/public/signin" title="Go home" class="logout">Log out</a></li>
            </form>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <main>
            <?=$content?>
        </main>
    </div>
</div>

<footer>
    <p> C++ Group is the best group. Please do not try to contest us, you will be banned to Azkaban otherwise.
    </p>
</footer>

</body>
</html>