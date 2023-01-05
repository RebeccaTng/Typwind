<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<script type="text/javascript" src="<?=base_url()?>/public/js/shop.js"></script>

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
                foreach ($avatars as $avatar):
                    if($avatar['classCSS'] =="avatarChoice chosen" || $avatar['classCSS'] =="avatarChoice bought" ):?>
                        <div class="<?= $avatar['classCSS']?> " id =<?= $avatar['idAvatars']?>>
                            <div class="roundProfilePic">
                                <img src="/public/assets/avatars/<?= $avatar ['idAvatars']?>.svg" alt="User Icon">
                            </div>
                            <span class="coin"><?= $avatar['price']?></span>
                        </div>
                    <?php else:?>
                        <div id="confirm">
                            <div class="message"></div>
                            <button class="yes">Yes</button>
                            <button class="no">No</button>
                        </div>
    <!--                    The id of this div is the same as the avatar-->
                        <a href="#" onclick="post(<?php echo $avatar['idAvatars'] ?>)">
                            <div class="<?= $avatar['classCSS']?> " id =<?= $avatar['idAvatars']?>>
                                <div class="roundProfilePic">
                                    <img src="/public/assets/avatars/<?= $avatar ['idAvatars']?>.svg" alt="User Icon">
                                </div>
                                <span class="coin"><?= $avatar['price']?></span>
                                <span id="<?= $avatar['idAvatars']?>e" class="errorMessage" hidden >Not enough money</span>
                                <?php if(isset($response) && $idPurchasedAvatar== $avatar['idAvatars'] && $response == "error"):?>
                                    <script>
                                        var error = "<?= $avatar['idAvatars']?>e";
                                        message(error);
                                    </script>
                                <?php endif;?>
                                <?php if(isset($response) && ($idPurchasedAvatar== $avatar['idAvatars']) && ($response == "ok")): ?>
                                <script>
                                    functionConfirm("Are you sure?", function yes() {
                                            commit()
                                        },
                                        function no() {
                                            rollback();
                                        });
                                </script>


                                <?php endif;?>

                            </div>
                        </a>
                    <?php endif;?>

                <?php endforeach;
            endif;?>

        </div>


    </div>



    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>