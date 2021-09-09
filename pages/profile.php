<div class = 'row profile'>
    <div class = 'col'>
        <div class = 'row'>
            <div class = 'col data-main-div'>
                <div class = 'title'>Данные пользователя</div>
                <div class = 'data-div'>
                    <?php
                    if ($usersData)
                    {
                        foreach ($usersData as $key => $value)
                        {
                            ?>
                            <div class = 'row data-row'>
                            <div class = 'col-2'></div>
                            <div class = 'col-4 data-key'><?= $value['key'] ?>:</div>
                            <div class = 'col data-value'><?= $value['value'] ?></div>
                            <div class = 'col-2'></div>
                            </div><?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class = 'col data-main-div'>
                <div class = 'title'>Группы</div>
                <div class = 'data-div'>
                    <?php
                    if ($groupsData)
                    {
                        foreach ($groupsData as $key => $value)
                        {
                            ?>
                            <div class = 'row'>
                            <div class = 'col-2'></div>
                            <div class = 'col data-row-groups'>
                                <div class = 'row'><div class = 'col data-key'><?= $value['name'] ?></div></div>
                                <div class = 'row'><div class = 'col'><?= $value['description'] ?></div></div>
                            </div>

                            <div class = 'col-2'></div>
                            </div><?php
                        }
                    }
                    else { ?><div class = 'exception'>Вы не состоите ни в одной группе!</div><?php }
                    ?>
                </div>
            </div>
        </div>
        <form method = "post">
            <div class = 'row'>
                <div class = 'col'>
                    <div class = 'logout-div'>
                        <input type = 'submit' class = 'btn btn-dark' value = 'Выход' name = 'exit'>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
