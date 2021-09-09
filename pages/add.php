<form method = "post">
    <div class = 'row add'>
        <div class = 'col'>
            <div class = 'row'>
                <div class = 'col input-group'>
                    <div class = 'input-group-prepend'>
                        <div class = 'input-group-text'>Заголовок</div>
                    </div>
                    <input type = 'text' class = 'form-control' name = 'title' autocomplete = 'off'>
                </div>
                <div class = 'col-3'>
                    <select class = 'controller form-control' name = 'recipient'>
                        <option selected class = 'd-none'>Пользователь</option>
                        <?php foreach ($users as $key => $value) { ?>
                            <option><?= $value['status'].' '.$value['fio'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class = 'col-3'>
                    <select class = 'controller form-control' name = 'section'>
                        <option selected class = 'd-none'>Секция</option>
                        <?php foreach ($sections as $key => $value) { ?>
                            <option style = 'background: <?= $value['color'] ?>'><?= $value['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class = 'row'>
                <div class = 'col'>
                    <div class = 'row message-title-row'>
                        <div class = 'col message-title'>
                            Текст сообщения
                        </div>
                    </div>
                    <div class = 'row message-row'>
                        <div class = 'col'>
                            <textarea class = 'form-control' name = 'text'></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class = 'row controls-div'>
                <div class = 'row'>
                    <div class = 'col'>
                        <div class = 'input-div'>
                            <input type = 'submit' name = 'send_message' class = 'btn btn-dark'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>