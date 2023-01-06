<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>



    <h1>My Avatar</h1>
    <div class="avatarContent" id ="mainAvatar">
            <div class="roundProfilePic currentPic">
                <?php if (! empty($idOfSelectedAvatar)):?>
                <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                <?php endif;?>
            </div>
            <div class="coins">
                <h3>My Coins</h3>
                <span class="coin"><?=(!empty(session()->coins))? session()->coins:0;?></span>
            </div>

            <div class="card avatarCard">
                <button type="button" id="btnCustom">Custom</button>
<!--            --><?php //if (! empty($avatars) && is_array($avatars)):
//                foreach ($avatars as $avatar):?>
<!--                    <div class="--><?php //= $avatar['classCSS']?><!-- " id =--><?php //= $avatar['idAvatars']?><!-- >-->
<!--                        <div class="roundProfilePic">-->
<!--                            <img src="/public/assets/avatars/--><?php //= $avatar ['idAvatars']?><!--.svg" alt="User Icon">-->
<!--                        </div>-->
<!--                        <span class="coin">--><?php //= $avatar['price']?><!--</span>-->
<!--                        <span class="errorMessage">Not enough money</span>-->
<!--                    </div>-->
<!--                --><?php //endforeach;
//            endif;?>
<!--                <form action="/kids/avatar/buy" method="post">-->
<!---->
<!--                    <label for="coins">New coins value</label>-->
<!--                    <input type="input" name="$idOfAvatar" />-->
<!--                    <input type="submit" name="submit" value="update" />-->
<!--                </form>-->

            </div>
    </div>

<?= $this->endSection() ?>






