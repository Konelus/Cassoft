<div class = 'row header'>
    <div class = 'nav-div'>
        <div class = 'col'>
            <a href = '/?page=posts'>
                <div class = 'title'>
                    <div class = 'title-img'><img src = '/img/logo.png' alt = ''></div>
                    <div class = 'title-text'>Почтовый клиент</div>
                </div>
            </a>
        </div>
        <div class = 'col'>
            <a href = '/?page=profile'><div class = 'nav-btn'>Профиль</div></a>
            <a href = '/?page=posts'>
                <div class = 'nav-btn'>Сообщения
                <?php if ($notifyCount > 0) { ?>
                    (<span class = 'notify-count'><?= $notifyCount ?></span>)
                <?php } ?>
                </div>
            </a>
        </div>
    </div>
</div>