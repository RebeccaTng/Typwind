<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
    <!--START OF PAGE CONTENT-->
    <!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

    <h1>My Avatar</h1>
    <div class="avatarContent">
            <?php if (! empty($avatars) && is_array($avatars)):
                $idOfSelectedAvatar=1;
                if (! empty($avatarsBought) && is_array($avatarsBought)):
                    foreach ($avatarsBought as $avatarBought):
                        if($avatarBought->selected):
                            $idOfSelectedAvatar=$avatarBought->idAvatar_fk;
                            break;
                        endif;
                    endforeach;
                endif;?>
            <div class="roundProfilePic currentPic">
                <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
            </div>

            <div class="coins">
                <h3>My Coins</h3>
                <span class="coin">120</span>
            </div>
            <div class="card avatarCard">
            <?php foreach ($avatars as $avatar):
                        $selected=0;
                        $bought = 0;
                        if (! empty($avatarsBought) && is_array($avatarsBought)):
                            foreach ($avatarsBought as $avatarBought):
                                if($avatarBought->idAvatar_fk== $avatar->idAvatars):
                                    $bought = 1;
                                    if ($avatarBought->selected):
                                        $selected = 1;;
                                    endif;
                                    break;
                                endif;
                            endforeach;
                        endif;
                        if($idOfSelectedAvatar==$avatar->idAvatars):?>
                            <div class="avatarChoice chosen"> <!--EVERY AVATAR SHOULD HAVE 'avatarChoice'-->
                                <div class="roundProfilePic">
                                    <img src="/public/assets/avatars/<?= $avatar->idAvatars?>.svg" alt="User Icon">
                                </div>
                                <span class="coin"></span>
                            </div>
                        <?php elseif($bought ||$avatar->idAvatars==1):?>
                            <div class="avatarChoice bought"> <!--ADD 'bought' TO DIV IF IT IS THEY BOUGHT THE AVATAR ALREADY BUT IT IS NOT THE CURRENT ONE-->
                                <div class="roundProfilePic">
                                    <img src="/public/assets/avatars/<?= $avatar->idAvatars?>.svg" alt="User Icon">
                                </div>
                                <span class="coin"></span>
                            </div>
                        <?php else:?>
                            <div class="avatarChoice "> <!--EVERY AVATAR SHOULD HAVE 'avatarChoice'-->
                                <div class="roundProfilePic">
                                    <img src="/public/assets/avatars/<?= $avatar->idAvatars?>.svg" alt="User Icon">
                                </div>
                                <span class="coin"><?= $avatar->price?></span>
                            </div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>