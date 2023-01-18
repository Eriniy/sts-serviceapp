<header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <button class="navbar-toggler dropdown" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="#collapseExample">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapseExample" role="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo (($_GET['active'] == 'main') ? 'active' : '') ?>" href="new1.php?active=main">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (($_GET['active'] == 'myPlays') ? 'active' : '') ?>" href="myPlays.php?active=myPlays">Мои игры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ((isset($_GET['activey'])) ? 'active' : '') ?>" href="#">Создать игру</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Инструкция</a>
                </li>
            </ul>
        </div>

        <div class="press-right">
            <a class="acc-link press-right" href="profile.php?active=profile"><img src="/img/profile.svg" class="account <?php echo (($_GET['active'] == 'profile') ? 'active-profile' : '') ?>"></a>
        </div>
    </nav>
</header>

<style>
    nav {
        font-size: 1.5vw;
    }



    #collapseExample {
        justify-content: center;
    }

    .press-right {
        display: flex;
        justify-content: end;
        float: right;
    }

    .nav-link {
        cursor: pointer;
    }

    .acc-link {
        margin-right: 20px;
    }

    .account {
        border-radius: 50%;
    }

    .account:hover {
        box-shadow: 0 0 5px 2px #F0F8FF;
    }

    .active-profile {
        box-shadow: 0 0 5px 2px #94ABFF;
    }
</style>