<div class = 'posts'>
    <?php if ($userAccess == true) { ?>
    <div class = 'row'>
        <div class = 'col'>
            <div class = 'mail-create'>
                <a href = '/?page=add'><div class = 'posts-btn'>Написать сообщение</div></a>
            </div>
        </div>
    </div>
    <div class = 'row'>
        <div class = 'col'>
            <div class = 'row'>
                <div class = 'col'>
                    <div class = 'title'>Прочитанные сообщения</div>
                </div>
            </div>
            <?php if ($messages[0] != '') { foreach ($messages[0] as $key => $value) { if ($value['status'] == 1) { ?>
             <a href = '?page=message&id=<?= $value['id'] ?>'>
                <div class = 'row mail-row'>
                    <div class = 'col mail-title'><span style = 'color: <?= $value['color'] ?>;'>&#9733;</span> <?= $value['title'] ?></div>
                    <div class = 'col'><?= $value['name'] ?></div>
                </div>
             </a>
            <?php } } } ?>
        </div>
        <div class = 'col'>
            <div class = 'row'>
                <div class = 'col'>
                    <div class = 'title'>Не прочитанные сообщения</div>
                </div>
            </div>
            <?php if ($messages[0] != '') { foreach ($messages[0] as $key => $value) { if ($value['status'] == 0) { ?>
            <a href = '?page=message&id=<?= $value['id'] ?>'>
                <div class = 'row mail-row'>
                    <div class = 'col mail-title'><span style = 'color: <?= $value['color'] ?>;'>&#9733;</span> <?= $value['title'] ?></div>
                    <div class = 'col'><?= $value['name'] ?></div>
                </div>
            </a>
            <?php } } } ?>
        </div>
    </div>
    <?php } else { ?>
    <div class = 'alert alert-dark'>Вы сможете отправлять сообщения после прохождения модерации!</div>
    <?php } ?>
</div>
