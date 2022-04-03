<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Задание 4</title>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="webform">

<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $massage = array();

    if(!empty($_COOKIE['save'])){
        setcookie('save','',1);
        $massage['succsess']= TRUE;
    }

    $error = array();

    $error['name_empty'] = !empty($_COOKIE['name_error_empty']);
    $error['name'] = !empty($_COOKIE['name_error']);
    $error['email_empty'] = !empty($_COOKIE['email_error_empty']);
    $error['email'] = !empty($_COOKIE['email_error']);
    $error['email'] = !empty($_COOKIE['email_error']);
    $error['bio'] = !empty($_COOKIE['bio_error']);
    $error['year'] = !empty($_COOKIE['year_error']);
    $error['gender'] = !empty($_COOKIE['gender_error']);
    $error['limbs'] = !empty($_COOKIE['limbs_error']);
    $error['ability'] = !empty($_COOKIE['ability_error']);
    $error['agree'] = !empty($_COOKIE['agree_error']);

    if($error['name_empty']){
        setcookie('name_error_empty','',1);
        $massage['name_empty'] = TRUE;
    }

    if($error['name']){
        setcookie('name_error','',1);
        $massage['name'] = TRUE;
    }

    if($error['email_empty']){
        setcookie('email_error_empty','',1);
        $massage['email_empty'] = TRUE;
    }

    if($error['email']){
        setcookie('email_error','',1);
        $massage['email'] = TRUE;
    }

    if($error['bio']){
        setcookie('bio_error','',1);
        $massage['bio'] = TRUE;
    }

    if ($error['year']) {
        setcookie('year_error', '', 100000);
        $messages['year'] = TRUE;
    }

    if ($error['gender']) {
        setcookie('gender_error', '', 100000);
        $message['gender'] = TRUE;
    }

    if ($error['limbs']) {
        setcookie('limbs_error', '', 100000);
        $messages['limbs'] = TRUE;
    }

    if($error['ability']){
        setcookie('ability_error','',1);
        $massage['ability'] = TRUE;
    }

    if($error['agree']){
        setcookie('agree_error','',1);
        $massage['agree'] = TRUE;
    }

    $value = array();

    $value['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
    $value['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $value['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
    $value['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
    $value['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
    $value['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
    if(empty($_COOKIE['ability_value']))
    $value_ability['ability'] = array();
    else
    $value_ability = explode(',',$_COOKIE['ability_value']);
    $value['agree'] = empty($_COOKIE['agree_value']) ? '' : $_COOKIE['agree_value'];


}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $regname = '/^.*[^А-яЁё].*$/';
    $errors = FALSE;
    $power1=in_array('s1',$_POST['capabilities']) ? '1' : '0';
    $power2=in_array('s2',$_POST['capabilities']) ? '1' : '0';
    $power3=in_array('s3',$_POST['capabilities']) ? '1' : '0';
    $power4=in_array('s4',$_POST['capabilities']) ? '1' : '0';


    if($power1 == 1){
        $ability .= 'immortal' . ',';
    }

    if($power2 == 1){
        $ability = 'noclip' . ',';
    }

    if($power3 == 1){
        $ability = 'flying' . ',';
    }

    if($power4 == 1){
        $ability = 'lazer' . ',';
    }

    if(empty(htmlentities($_POST['name']))){
        setcookie('name_error_empty','1',time() + 24 * 60 * 60);
        $errors = TRUE;
    }else if(preg_match($regname, $_POST['name'])){
        setcookie('name_error','1',time() + 24 * 60 * 60);
        setcookie('name_value',$_POST['name']);
        $errors = TRUE;
    }else{
        setcookie('name_value',$_POST['name'],time() + 24 * 60 * 60 * 30 * 12 );
    }

    if(empty($_POST['email'])){
        setcookie('email_error_empty','1',time() + 24 * 60 * 60);
        $errors = TRUE;
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        setcookie('email_error','1',time() + 24 * 60 * 60);
        setcookie('email_value',$_POST['email']);
        $errors = TRUE;
    }else{
        setcookie('email_value',$_POST['email'],time() + 24 * 60 * 60 * 30 * 12 );
    }

    if(empty($_POST['bio'])){
        setcookie('bio_error','1',time() + 24 * 60 *60);
        $errors = TRUE;
    }else{
        setcookie('bio_value',$_POST['bio'],time() + 24 * 60 * 60 * 30 * 12 );
    }


    if(empty($_POST['year'])){
        setcookie('year_error','1',time() + 24 * 60 *60);
        $errors = TRUE;
    }else{
        setcookie('year_value',$_POST['year'],time() + 24 * 60 * 60 * 30 * 12 );
    }

    if(empty($_POST['gender'])){
        setcookie('gender_error','1',time() + 24 * 60 *60);
        $errors = TRUE;
    }else{
        setcookie('gender_value',$_POST['gender'],time() + 24 * 60 * 60 * 30 * 12 );
    }

    if(empty($_POST['limbs'])){
        setcookie('limbs_error','1',time() + 24 * 60 *60);
        $errors = TRUE;
    }else{
        setcookie('limbs_value',$_POST['limbs'],time() + 24 * 60 * 60 * 30 * 12 );
    }

    if(empty($ability)){
        setcookie('ability_error','1',time() + 24 * 60 *60);
        $errors = TRUE;
    }else{
        setcookie('ability_value',$ability,time() + 24 * 60 * 60 * 30 * 12 );
    }

    if (empty($_POST['agree'])) {
        setcookie('agree_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
      }
      else {
        setcookie('agree_value', $_POST['agree'], time() + 12 * 30 * 24 * 60 * 60);
      }

      if ($errors) {
        header('Location: index.php');
        exit();
      }
      else {
        setcookie('name_error_empty','', 1);
        setcookie('name_error', '', 100000);
        setcookie('email_error_empty','',1);
        setcookie('email_error', '', 1);
        setcookie('bio_error','', 1);
        setcookie('year_error', '', 1);
        setcookie('gender_error', '', 1);
        setcookie('limbs_error', '', 1);
        setcookie('ability_error','', 1);
        setcookie('checkbox_error', '', 1);

        setcookie('save','1');

        header('Location: index.php');
      }





}

?>

    <div class="webform">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="webform__form d-flex justify-content-center">
                        <form id="form" class="form__body" method="post" action="">
                            <div>
                                <input class="webform__form-elem form__input _req"  id="names" type="text" name="name"
                                    placeholder="Имя" value= "<?php print($value['name']); ?>" >
                                    <div class="text-danger err "
                                        <?php
                                            if(!$error['name_empty'] || !$error['namne']){
                                                print('hidden');
                                            }
                                        ?>
                                    >
                                        <?php
                                            if($massage['name_empty'] == TRUE){
                                                print('Поле не может быть пустым');
                                            }else if($massage['name'] == TRUE){
                                                print('Введите имя кирилицей');
                                            }
                                        ?>
                                    </div>
                            </div>
                             <div>
                                <input class="webform__form-elem form__input _req _email" id="email" type="email" name="email"
                                        placeholder="E-mail" value= "<?php print($value['email']); ?>">
                                        <div class="text-danger err ">
                                        <?php
                                            if($massage['email_empty'] == TRUE){
                                                print('Поле не может быть пустым');
                                            }else if($massage['email'] == TRUE){
                                                print('Введите почту в правильном формате');
                                            }
                                        ?>
                                    </div>
                            </div>
                            <div>
                                <textarea id="comment" class="webform__form-elem form__input _req" type="text" name="bio" placeholder="Биография" value= "<?php print($value['bio']); ?>" ></textarea>
                                <div class="text-danger err ">
                                        <?php
                                            if($massage['bio'] == TRUE){
                                                print('Поле не может быть пустым');
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="form_item form-group">
                                <label for="formDate" style="color: white;">Дата рождения:</label>
                                <input type="date" class="form_input form__input _req form-control w-50  bg-white rounded" name="year" id="dates" value="<?php print($value['year']); ?>">
                                <div class="text-danger err ">
                                        <?php
                                            if($massage['year'] == TRUE){
                                                print('Укажите дату рождения');
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="gender">
                                <label style="margin-right: 5px;">Пол : </label>
                                <div>
                                    <input type="radio" id="male" name="gender" value="m"
                                        <?php
                                            if($value['gender'] == 'm'){
                                                print('checked');
                                            }
                                        ?>
                                    />
                                    <label for="male" id="male">мужской</label>
                                </div>
                                <div>
                                    <input type="radio" id="female"name="gender" value="f"
                                        <?php
                                            if($value['gender'] == 'f'){
                                                print('checked');
                                            }
                                        ?>
                                    />
                                    <label for="female" id="female">женский</label>
                                </div>
                                <div class="text-danger err ">
                                        <?php
                                            if($massage['gender'] == TRUE){
                                                print('Укажите пол');
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="limbs">
                                <label>Количество конечностей :</label>
                                <input type="radio" id="2" name="limbs" value="2"
                                    <?php
                                        if($value['limbs'] == '2'){
                                            print('checked');
                                        }
                                        ?>
                                >
                                <label for="2" id="2">2</label>
                                <input type="radio" id="4" name="limbs" value="4"
                                        <?php
                                            if($value['limbs'] == '4'){
                                                print('checked');
                                            }
                                        ?>
                                >
                                <label for="4" id="4">4</label>
                                <input type="radio" id="8" name="limbs" value="8"
                                    <?php
                                        if($value['limbs'] == '8'){
                                            print('checked');
                                        }
                                    ?>
                                >
                                <label for="8" id="8">8</label>
                                <input type="radio" id="16" name="limbs" value="16"
                                    <?php
                                        if($value['limbs'] == '16'){
                                            print('checked');
                                        }
                                    ?>
                                >
                                <label for="16" id="16">16</label>
                                <div class="text-danger err ">
                                        <?php
                                            if($massage['limbs'] == TRUE){
                                                print('Укажите количество конечностей');
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="capabilities">
                                <select name="capabilities[]" size="2" multiple>
                                    <option value="s1 "
                                        <?php
                                            if($value_ability[0] == 'immortal'){
                                                print('selected');
                                            }
                                        ?>
                                    >бессмертие</option>
                                    <option value="s2"
                                        <?php
                                            if($value_ability[0] == 'noclip' || $value_ability[1] == 'noclip'){
                                                print('selected');
                                            }
                                        ?>
                                    >прохождение сквозь стены</option>
                                    <option value="s3"
                                        <?php
                                            if($value_ability[0] == 'flying' || $value_ability[1] == 'flying' || $value_ability[2] == 'flying'){
                                                print('selected');
                                            }
                                        ?>
                                    >левитация</option>
                                    <option value="s4"
                                        <?php
                                            if($value_ability[0] == 'lazer' || $value_ability[1] == 'lazer' || $value_ability[2] == 'lazer' || $value_ability[3] == 'lazer' ){
                                                print('selected');
                                            }
                                        ?>
                                    >лазеры из глаз</option>
                                </select>
                                <div class="text-danger err ">
                                        <?php
                                            if($massage['ability'] == TRUE){
                                                print('Укажите одну или несколько способностей');
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="form__checkbox">
                                <input class="checkbox__input _req" type="checkbox" id="userAgreement"  name="agree"
                                    <?php
                                        if($massage['agree'] == TRUE ){
                                            pring('checked');
                                        }
                                    ?>
                                >
                                 <label class="checkbox__label" for="userAgreement">Отправляя заявку, я даю согласие на<a>обработку своих персональных данных</a>.<span>*</span></label>
                            </div>
                            <div class="text-danger err ">
                                        <?php
                                            if($massage['agree'] == TRUE){
                                                print('Пожалуйста подтвердите согласие на обработку данных');
                                            }
                                        ?>
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
   <script src="js/script.js"></script>
</body>
</html>