<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
    <!--START OF PAGE CONTENT-->
    <!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

    <h1>My Avatar</h1>
    <div class="avatarContent">
            <div class="roundProfilePic currentPic">
                <?php if (! empty($idOfSelectedAvatar)):?>
                <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                <?php endif;?>
            </div>
            <div class="coins">
                <h3>My Coins</h3>
                <span class="coin">120</span>
            </div>
            <div class="card avatarCard">

<!--            --><?php //if (! empty($avatars) && is_array($avatars)):
//                foreach ($avatars as $avatar):?>
<!--                    The id of this div is the same as the avatar-->
<!--                    <div class="--><?php //= $avatar['classCSS']?><!-- " id =--><?php //= $avatar['idAvatars']?><!-- >-->
<!--                        <div class="roundProfilePic">-->
<!--                            <img src="/public/assets/avatars/--><?php //= $avatar ['idAvatars']?><!--.svg" alt="User Icon">-->
<!--                        </div>-->
<!--                        <span class="coin">--><?php //= $avatar['price']?><!--</span>-->
<!--                        <span class="errorMessage">Not enough money</span>-->
<!--                    </div>-->
<!--                --><?php //endforeach;
//            endif;?>

                <div class="avatarChoice chosen"> <!--ADD 'chosen' TO DIV IF IT IS THE CURRENT AVATAR-->
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/1.svg" alt="User Icon">
                    </div>
                    <span class="coin">Selected</span>
                    <span class="errorMessage">Not enough money</span>
                </div>
                <div class="avatarChoice bought"> <!--ADD 'bought' TO DIV IF IT IS THEY BOUGHT THE AVATAR ALREADY BUT IT IS NOT THE CURRENT ONE-->
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/2.svg" alt="User Icon">
                    </div>
                    <span class="coin">Purchased</span>
                    <span class="errorMessage">Not enough money</span>
                </div>
                <div class="avatarChoice locked"> <!--NOT BOUGHT AVATARS SHOULD HAVE 'locked'-->
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/3.svg" alt="User Icon">
                    </div>
                    <span class="coin">120</span>
                    <span class="errorMessage">Not enough money</span>
                </div>
                <div class="avatarChoice locked noMoney"> <!--'noMoney'-->
                    <div class="roundProfilePic">
                        <img src="/public/assets/avatars/4.svg" alt="User Icon">
                    </div>
                    <span class="coin">120</span>
                    <span class="errorMessage">Not enough money</span> <!--Only show message if there isn't enough money in a if statement-->
                </div>

            </div>


    </div>

    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>