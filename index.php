<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Задание 4</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body class="webform">
    <div class="webform">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="webform__form d-flex justify-content-center">
                        <form id="form" class="form__body" method="POST">
                            <div>
                                <input class="webform__form-elem form__input _req" id="names" type="text" name="name"
                                    placeholder="Имя" value="">
                                <?php echo $err['name'] ?>
                            </div>
                            <div>
                                <input class="webform__form-elem form__input _req _email" id="email" type="email"
                                    name="email" placeholder="E-mail">
                            </div>
                            <div>
                                <textarea id="comment" class="webform__form-elem form__input _req" type="text"
                                    name="bio" placeholder="Биография"></textarea>
                            </div>
                            <div class="form_item form-group">
                                <label for="formDate" style="color: white;">Дата рождения:</label>
                                <input type="date"
                                    class="form_input form__input _req form-control w-50  bg-white rounded"
                                    name="dayofbirth" id="dates" value="">
                            </div>
                            <div class="gender">
                                <label style="margin-right: 5px;">Пол : </label>
                                <div>
                                    <input type="radio" id="male" name="gender" value="m" checked />
                                    <label for="male" id="male">мужской</label>
                                </div>
                                <div>
                                    <input type="radio" id="female" name="gender" value="f" />
                                    <label for="female" id="female">женский</label>
                                </div>
                            </div>
                            <div class="limbs">
                                <label>Количество конечностей :</label>
                                <input type="radio" id="2" name="limbs" value="2">
                                <label for="2" id="2">2</label>
                                <input type="radio" id="4" name="limbs" value="4" checked>
                                <label for="4" id="4">4</label>
                                <input type="radio" id="8" name="limbs" value="8">
                                <label for="8" id="8">8</label>
                                <input type="radio" id="16" name="limbs" value="16">
                                <label for="16" id="16">16</label>
                            </div>
                            <div class="capabilities">
                                <select name="capabilities[]" size="2" multiple required>
                                    <option value="s1">бессмертие</option>
                                    <option value="s2">прохождение сквозь стены</option>
                                    <option value="s3">левитация</option>
                                    <option value="s4">лазеры из глаз</option>
                                </select>
                            </div>
                            <div class="form__checkbox">
                                <input class="checkbox__input _req" type="checkbox" id="userAgreement" name="agree">
                                <label class="checkbox__label" for="userAgreement">Отправляя заявку, я даю согласие
                                    на<a>обработку своих персональных данных</a>.<span>*</span></label>
                            </div>
                            <div>
                                <input class="webform__form-btn" type="submit" name="submit" value="Отправить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>