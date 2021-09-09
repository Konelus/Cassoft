<?php
    $login = array();
    if ($_GET['reg'] != true) { $selected['login'] = 'selected'; $selected['submit_name'] = 'enter'; $selected['submit_value'] = 'Вход'; }
    elseif ($_GET['reg'] == true) { $selected['registration'] = 'selected'; $selected['submit_name'] = 'reg'; $selected['submit_value'] = 'Регистрация'; }
?>

<form method = "post">
    <div class = 'modal login'>
        <div class = 'modal-dialog'>
            <div class = 'modal-content'>
                <div class = 'modal-header'>
                    <div class = 'title'>
                        <a href = '/'><span class = '<?= $selected['login'] ?>'>Авторизация</span></a> /
                        <a href = '/?reg=true'><span class = '<?= $selected['registration'] ?>'>Регистрация</span></a>
                    </div>
                </div>
                <div class = 'modal-body'>
                    <?php if ($_GET['reg'] != true) { ?>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>Почта/Телефон</div>
                        <div class = 'col text'><input type = 'text' class = 'form-control' placeholder = 'Почта/Телефон' name = 'login' autocomplete = 'off' required></div>
                    </div>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>Пароль</div>
                        <div class = 'col text'><input type = 'password' class = 'form-control' placeholder = 'Пароль' name = 'password' autocomplete = 'off'required></div>
                    </div>
                    <?php } else {
                    if ($regError == true) { ?><div class = 'alert alert-danger'>Пользователь с такими данными уже зарегистрирован!</div><?php } ?>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>ФИО</div>
                        <div class = 'col text'><input type = 'text' class = 'form-control' placeholder = 'ФИО' name = 'fio' autocomplete = 'off'required></div>
                    </div>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>Email</div>
                        <div class = 'col text'><input type = 'text' class = 'form-control' placeholder = 'Email' name = 'email' autocomplete = 'off'required></div>
                    </div>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>Телефон</div>
                        <div class = 'col text'><input type = 'text' class = 'form-control' placeholder = 'Телефон' name = 'phone' autocomplete = 'off'required></div>
                    </div>
                    <div class = 'row modal-row'>
                        <div class = 'col-5 label'>Пароль</div>
                        <div class = 'col text'><input type = 'password' class = 'form-control' placeholder = 'Пароль' name = 'password' autocomplete = 'off'required></div>
                    </div>
                        <div class = 'row modal-row'>
                            <div class = 'col-5 label'>Уведомления</div>
                            <div class = 'col text'>
                                <select name = 'notify' class = 'form-control'>
                                    <option>Вкл</option>
                                    <option>Выкл</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class = 'modal-footer'>
                    <input type = 'submit' class = 'btn btn-success' value = '<?= $selected['submit_value'] ?>' name = '<?= $selected['submit_name'] ?>'>
                </div>
            </div>
        </div>
    </div>
</form>
