<!DOCTYPE html>
<html lang="en">
<head>
    <title>UXWD Web Development</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="UXWD First HTML Page" />
    <meta name="description"
          content="This a first web page for the UXWD course." />
    <!-- Remove things between @'s here to get rid of the css -->
    <!-- @@@@@@@@@@@@@@@@ -->
    <!--The link under here defines the Typography-->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
    <!--The link under here makes everything adaptable and responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--The link under here defines the css -->
    <link href="<?=base_url()?>/public/css/potato.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?=base_url()?>/public/css/media_query.css">
    <!-- @@@@@@@@@@@@@@@@ -->
</head>

<body>
<header>
    <div id="logo">
        <h1><?=$title?>  </h1>
        <h2>Web Development</h2>
    </div>
    <nav>
        <div class="wrapper">
            <div class="row row-offcanvas row-offcanvas-left">
                <!-- sidebar -->
                <div class="column col-md-3 col-1 sidebar-offcanvas" id="sidebar">
                    <ul class="nav flex-column" id="menu">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-list-alt"></i> <span class="collapse show hidden-xsd-none d-sm-block">Link 1</span></a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-list"></i> <span class="collapse show hidden-xsd-none d-sm-block">Stories</span></a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-paperclip"></i> <span class="collapse show hidden-xsd-none d-sm-block">Saved</span></a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-refresh"></i> <span class="collapse show hidden-xsd-none d-sm-block">Refresh</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /sidebar -->
                <!-- main right col -->
                <div class="column col-md-9 col-11" id="main">
                    <p><a href="#" data-toggle="offcanvas"><i class="fa fa-navicon fa-2x"></i></a>
                    </p>
                    <p>Main content...</p>
                </div>
                <!-- /main -->
            </div>
        </div>
    </nav>
</header>
<main>

</main>
<footer>
    <p> C++ Group is the best group. Please do not try to contest us, you will be banned to Azkaban otherwise.
    </p>
</footer>
</body>
</html>