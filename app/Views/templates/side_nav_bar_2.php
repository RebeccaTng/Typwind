<div class="menu_grid-container">
    <div class="menuHeader">
        <img  src="<?=base_url()?>/public/assets/general/typwind_logo.svg" width="100%" height="70">
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
                    <p class="<?=$menu['name']?>"><?=$menu['name']?></p>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div >
    <div  class="menuFooter">
        <a href="<?=base_url()?>/registration/welcome" title="Go home">
            <img  src="<?=base_url()?>/public/assets/icons/log_out_icon.svg" >
            <p class="logout" style="display:inline"> Log out </p>
        </a>
    </div>
</div>