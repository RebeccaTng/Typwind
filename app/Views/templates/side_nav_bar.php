
<div class="menu_grid-container">
    <div class="menuHeader">
        <img  src="<?=base_url()?>/public/assets/general/typwind_logo.svg" width="100%" height="70">
    </div>
    <div class="langWrap">
        <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
        |
        <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
    </div>
    <div class="menuItems" >
        <img  src="<?=base_url()?>/public/assets/icons/Home_icon.svg" >
        <a href="<?=base_url()?>/experts/home"  class="home" >
            Home
        </a>
        <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
        <a href="<?=base_url()?>/experts/studentsList"  class="students">
            Students
        </a>
        <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
        <a href="<?=base_url()?>/experts/exercises"  class="exercises">
            Exercises
        </a>
        <img  src="<?=base_url()?>/public/assets/icons/profile_icon.svg" >
        <a href="<?=base_url()?>/experts/profile" class="profile">
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

