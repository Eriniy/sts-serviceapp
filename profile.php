<?php
include("connectdb.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/style/profile.css">
</head>

<body>
    <?php include("header.php"); ?>
    <?php
    $user = mysqli_query($connect, "SELECT * FROM Users WHERE user_id =" . $_SESSION['user']['user_id']);
    $getUser = mysqli_fetch_assoc($user);
    ?>
    <div class="container-profile">
        <div class="card">
            <div class="username">
                <div class="row">
                    <div class="col-6">
                        <p class="name">Username</p>
                    </div>
                    <div class="col-6">
                        <div class="setting">Настройка профиля</div>
                    </div>
                </div>
            </div>
            <div class="config-container">
                <div class="config-item">
                    <div class="row row-item">
                        <div class="col-6">
                            <p class="label">Имя на сервере</p>
                            <p class="config-text"><?php echo $getUser['user_nickname'] ?></p>
                        </div>
                        <div class="col-6">
                            <button class="btn update" data-bs-toggle="modal" data-bs-target="#updateUserModal" data-bs-input="<?php echo $getUser['user_nickname'] ?>" data-bs-title="Имя на сервере" data-bs-nameArg="nickname">Изменить</button>
                        </div>
                    </div>
                </div>
                <div class="config-item">
                    <div class="row row-item">
                        <div class="col-6">
                            <p class="label">Фамилия</p>
                            <p class="config-text"><?php echo $getUser['user_lastname'] ?></p>
                        </div>
                        <div class="col-6">
                            <button class="btn update" data-bs-toggle="modal" data-bs-target="#updateUserModal" data-bs-input="<?php echo $getUser['user_lastname'] ?>" data-bs-title="Фамилия" data-bs-nameArg="lastname">Изменить</button>
                        </div>
                    </div>
                </div>
                <div class="config-item">
                    <div class="row row-item">
                        <div class="col-6">
                            <p class="label">Имя</p>
                            <p class="config-text"><?php echo $getUser['user_firstname'] ?></p>
                        </div>
                        <div class="col-6">
                            <button class="btn update" data-bs-toggle="modal" data-bs-target="#updateUserModal" data-bs-input="<?php echo $getUser['user_firstname'] ?>" data-bs-title="Имя" data-bs-nameArg="firstname">Изменить</button>
                        </div>
                    </div>
                </div>
                <div class="config-item">
                    <div class="row row-item">
                        <div class="col-6">
                            <p class="label">Возраст</p>
                            <p class="config-text"><?php echo $getUser['user_age'] ?></p>
                        </div>
                        <div class="col-6">
                            <button class="btn update" data-bs-toggle="modal" data-bs-target="#updateUserModal" data-bs-input="<?php echo $getUser['user_age'] ?>" data-bs-title="Возраст" data-bs-nameArg="age">Изменить</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="back-user.php" method="POST">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" name="input">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary send">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    const exampleModal = document.getElementById('updateUserModal')
    exampleModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const title = button.getAttribute('data-bs-title')
        const input = button.getAttribute('data-bs-input')
        const nameArg = button.getAttribute('data-bs-nameArg')

        const modalTitle = exampleModal.querySelector('.col-form-label')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        idButton = exampleModal.querySelector('.send')
        idButton.name = nameArg

        modalTitle.textContent = `${title}`
        modalBodyInput.value = input
    })
</script>