
<div class="menu_grid-container">
    <div class="menuHeader">
        <img  src="<?=base_url()?>/public/assets/general/typwind_logo.svg">
    </div>
    <div class = menuSubHeader>
        <div class="langWrap" >
            <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
            |
            <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
        </div>
    </div>

    <div class="menuItems" >

<!--        <a href="--><?php //=base_url()?><!--/experts/home"  class="home" >-->
        <a href="<?=base_url()?>/experts/home" >
            <img  src="<?=base_url()?>/public/assets/icons/Home_icon.svg" >
            <p>Home</p>
        </a>

<!--        <a href="--><?php //=base_url()?><!--/experts/studentsList"  class="students">-->
        <a href="<?=base_url()?>/experts/studentsList"  class="students">

            <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
            <p>Students</p>
        </a>

<!--        <a href="--><?php //=base_url()?><!--/experts/exercises"  class="exercises">       -->
        <a href="<?=base_url()?>/experts/exercises"  class="exercises">
            <img  src="<?=base_url()?>/public/assets/icons/Students_Icon.svg" >
            <p>Exercises</p>


        </a>

<!--        <a href="--><?php //=base_url()?><!--/experts/profile" class="profile">-->
        <a href="--><?php //=base_url()?><!--/experts/profile" class="profile">
            <img  src="<?=base_url()?>/public/assets/icons/profile_icon.svg" >
            <p>My Profile</p>

        </a>
    </div >
    <div  class="menuFooter">
        <a href="<?=base_url()?>/registration/welcome" title="Go home" class="download">
            <img  src="<?=base_url()?>/public/assets/icons/log_out_icon.svg" >
            Log out
        </a>
    </div>
</div>

