<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Typwind</h3>
        <div class="langWrap">
            <a href="#" id="<?php echo $_COOKIE["nederlandsActief"];?>" language='nederlands' class="active">NED</a>
            |
            <a href="#" id="<?php echo $_COOKIE["englishActive"];?>" language='english'>ENG</a>
        </div>
    </div>

    <ul class="list-unstyled components">
        <li><a href="<?=base_url()?>/experts/home" title="Go home" class="home" >Home</a></li>
        <li><a href="<?=base_url()?>/experts/studentsList" title="Look at students" class="students">Students</a></li>
        <li><a href="<?=base_url()?>/experts/exercises" title="Look at exercises" class="exercises">Exercises</a></li>
        <li><a href="<?=base_url()?>/experts/profile" title="Look at profile" class="profile">My Profile</a></li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="<?=base_url()?>/registration/welcome" title="Go home" class="download">Log Out</a></li>
    </ul>
</nav>