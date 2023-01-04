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

            <?php if (! empty($avatars) && is_array($avatars)):
                foreach ($avatars as $avatar):?>
<!--                    The id of this div is the same as the avatar-->
                    <div class="<?= $avatar['classCSS']?> " id =<?= $avatar['idAvatars']?> >
                        <div class="roundProfilePic">
                            <img src="/public/assets/avatars/<?= $avatar ['idAvatars']?>.svg" alt="User Icon">
                        </div>
                        <span class="coin"><?= $avatar['price']?></span>
                        <span class="errorMessage">Not enough money</span>
                    </div>
                <?php endforeach;
            endif;?>

        </div>
<!--        this is an example of how to call the buyAvatar in the controller -->
        <form action="http://localhost:8080/kids/buyAvatar/10" method="post">
            <div >
                <input id="seven" class="button buttonPrimary buttonExpert" type="submit" value="Save">
            </div>
        </form>
        <!--       End of example, please remove after not needed -->

    </div>

    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>