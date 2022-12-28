

<div class="menu_grid-container">

    <div class=" menuHeader ">
        <div class="  roundProfilePic ">
            <img src="/public/assets/icons/user.svg" alt="User Icon">
        </div>

    </div>
    <div class="langWrap menuSubHeader" >
        <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
        |
        <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
    </div>
    <div class="menuItems" >
        <?php if (! empty($menu_items)) :?>
            <?php foreach ($menu_items as $menu): ?>
                <a href="<?=base_url($menu['link'])?>" class="<?=$menu['className']?>" title="<?=$menu['title']?>">
                    <img  src="<?=base_url($menu['image'])?>" >
                    <p><?=$menu['name']?></p>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div >
    <div  class="menuFooter">
        <a href="<?=base_url()?>/registration/welcome" title="Go home" class="download">
            <img  src="<?=base_url()?>/public/assets/icons/log_out_icon.svg" >
            Log out
        </a>
    </div>
</div>