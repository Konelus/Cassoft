<div class = 'row message'>
    <div class = 'col'>
        <div class = 'row'>
            <div class = 'col'>
                <div class = 'row content-div'>
                    <div class = 'col-4'>
                        <div class = 'title'>Заголовок:</div>
                    </div>
                    <div class = 'col-8'>
                        <div class = 'content'><?= $message['title'] ?></div>
                    </div>
                </div>
            </div>
            <div class = 'col'>
                <div class = 'row content-div'>
                    <div class = 'col-4'>
                        <div class = 'title'>Дата:</div>
                    </div>
                    <div class = 'col-8'>
                        <div class = 'content'><?= $message['created'] ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class = 'row'>
            <div class = 'col'>
                <div class = 'row content-div'>
                    <div class = 'col-4'>
                        <div class = 'title'>ФИО:</div>
                    </div>
                    <div class = 'col-8'>
                        <div class = 'content'><?= $author['fio'] ?></div>
                    </div>
                </div>
            </div>
            <div class = 'col'>
                <div class = 'row content-div'>
                    <div class = 'col-4'>
                        <div class = 'title'>Email:</div>
                    </div>
                    <div class = 'col-8'>
                        <div class = 'content'><?= $author['email'] ?></div>
                    </div>
                </div>
            </div>
        </div>


        <div class = 'row'>
            <div class = 'col'>
                <div class = 'row content-div'>
                    <div class = 'content-text-div'>
                        <div class = 'content-text-title'>Текст</div>
                        <div class = 'content'><?= $message['text'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>