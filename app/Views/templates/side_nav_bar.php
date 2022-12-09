
<div class="menu_grid-container">
    <div class="menuHeader">
        <img  src="<?=base_url()?>/public/assets/general/typwind_logo.svg" width="100%" height="70">

    </div>
    <div class=" menuSubHeader">
        <a type="submit" id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
        |
        <a type="submit" id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
    </div>
    <div class="menuItems" >
        <a href="<?=base_url()?>/experts/home"  class="home" >
            <img  src="<?=base_url()?>/public/assets/icons/Home_icon.svg" >
            Home
        </a>
        <a href="<?=base_url()?>/experts/studentsList"  class="students">
            <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
            Students
        </a>
        <a href="<?=base_url()?>/experts/exercises"  class="exercises">
            <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
            Exercises
        </a>
        <a href="<?=base_url()?>/experts/profile" >
            <img  src="<?=base_url()?>/public/assets/icons/profile_icon.svg" >
                My Profile
        </a>
    </div >
    <div  class="menuFooter">
        <a href="<?=base_url()?>/registration/welcome" title="Go home" class="download">
            <img  src="<?=base_url()?>/public/assets/icons/log_out_icon.svg" >
            Log out
        </a>
    </div>
</div>

