<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/style/main.css">
</head>

<body>
    <?php include('header.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-3 a">
                <div class="date">
                    <div class="row">
                        <div class="col">
                            <!-- <label>Выберите дату</label> -->
                            <input type="date" id="date" name="date" class="date-picker" />
                        </div>
                    </div>

                </div>

                <!-- ФИЛЬТР -->

                <div class="filter">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Вид спорта
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <form class="form">
                                        <div class="form-container">
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Район
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- КОНЕЦ ФИЛЬТРА -->

            <div class="col a">
                <div class="map-view"></div>
            </div>
            <!-- <div class="col-3 a">
                блок который будет появляться

            </div> -->


        </div>
    </div>

</body>

</html>