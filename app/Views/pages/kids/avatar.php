<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
    <!--START OF PAGE CONTENT-->
    <!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

    <h1>My Avatar</h1>
    <div class="avatarContent">
        <div class="roundProfilePic currentPic">
            <img src="/public/assets/avatars/1.svg" alt="User Icon">
        </div>

        <div class="coins">
            <h3>My Coins</h3>
            <span class="coin">120</span>
        </div>

        <div class="card avatarCard">
            <div class="avatarChoice chosen"> <!--ADD 'chosen' TO DIV IF IT IS THE CURRENT AVATAR-->
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/1.svg" alt="User Icon">
                </div>
                <span class="coin"></span>
            </div>
            <div class="avatarChoice bought"> <!--ADD 'bought' TO DIV IF IT IS THEY BOUGHT THE AVATAR ALREADY BUT IT IS NOT THE CURRENT ONE-->
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/2.svg" alt="User Icon">
                </div>
                <span class="coin"></span>
            </div>
            <div class="avatarChoice locked"> <!--NOT BOUGHT AVATARS SHOULD HAVE 'locked'-->
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/3.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/4.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
                <span class="errorMessage">Not enough money</span> <!--Only show message if there isn't enough money in a if statement-->
            </div>
            <div class="avatarChoice undo"> <!--UNDO AVATAR PURCHASE-->
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/5.svg" alt="User Icon">
                </div>
                <span class="coin">UNDO</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/6.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/7.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/8.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/9.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
            <div class="avatarChoice locked">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/10.svg" alt="User Icon">
                </div>
                <span class="coin">120</span>
            </div>
        </div>
    </div>

    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>