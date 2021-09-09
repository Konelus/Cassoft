<?php

    class posts
    {
        private $mysql;

        public function __construct()
        {
            $this->mysql = new CRUD;
        }

        function notify()
        {
            $notifyStatus = implode(mysqli_fetch_row($this->mysql->select("notify","users","`id` = '{$_COOKIE['user']}'")));
            if ($notifyStatus == true)
            { $notifyCount = implode(mysqli_fetch_row($this->mysql->select("COUNT(`id`)","messages","`recipient` = '{$_COOKIE['user']}' AND `status` = 0"))); }
            else { $notifyCount = 0; }

            return $notifyCount;
        }

        function user_status()
        {
            $groupNeeded = implode(mysqli_fetch_row($this->mysql->select("id", "groups","`name` = 'Пользователь имеющий право писать сообщения'")));
            $usersAccessTemp = $this->mysql->select("id","groups_compare","`users` = '{$_COOKIE['user']}' AND `groups` = '{$groupNeeded}'");
            if (is_array(mysqli_fetch_row($usersAccessTemp))) {$userAccess = true; }
            else { $userAccess = false; }

            return $userAccess;
        }

        function messages($id = '')
        {
            if ($id == '') { $messagesTemp = $this->mysql->select(
                "m`.`id`, `m`.`title`, `m`.`section`, `m`.`status`, `s`.`name`, `s`.`color",
                "messages` as `m`, `sections` as `s",
                "`m`.`recipient` = '{$_COOKIE['user']}' AND `s`.`id` = `m`.`section`"
            ); }
            elseif ($id != '') { $messagesTemp = $this->mysql->select("*","messages","`recipient` = '{$_COOKIE['user']}' AND `id` = '{$id}'"); }

            if ($messagesTemp)
            {
                while ($arr = mysqli_fetch_array($messagesTemp))
                { $messages[$arr['id']] = $arr; }
            }

            if ($messages != '')
            {
                foreach ($messages as $key => $value)
                {
                    foreach ($value as $key2 => $value2)
                    {
                        if (is_numeric($key2))
                        { unset($messages[$key][$key2]); }
                    }
                }
            }

            return array($messages);
        }

        function all_users()
        {
            $groupNeeded = implode(mysqli_fetch_row($this->mysql->select("id", "groups","`name` = 'Пользователь имеющий право писать сообщения'")));

            $preUsersListTemp = $this->mysql->select("users", "groups_compare","`groups` = '{$groupNeeded}'");
            if ($preUsersListTemp)
            {
                while ($arr = mysqli_fetch_array($preUsersListTemp))
                { $preUsersList[] = $arr[0]; }
            }

            if ($preUsersList != '')
            {
                $where = '';
                foreach ($preUsersList as $key => $value)
                {
                    if ($value != $_COOKIE['user'])
                    {
                        if ($where == '') { $where = "`id` = '{$value}'"; }
                        else { $where .= " OR `id` = '{$value}'"; }
                    }
                }

                $UsersTemp = $this->mysql->select("status`, `fio", "users","{$where}");
                if ($UsersTemp)
                {
                    $count = 0;
                    while ($arr = mysqli_fetch_array($UsersTemp))
                    {
                        $users[$count]['fio'] = $arr['fio'];
                        if ($arr['status'] == '1') { $users[$count]['status'] = '[online]'; }
                        elseif ($arr['status'] == '0') { $users[$count]['status'] = '[offline]'; }
                        $count++;
                    }
                }
            }

            return $users;
        }

        function all_sections()
        {
            $sectionsTemp = $this->mysql->select("name`, `color","sections");
            if ($sectionsTemp)
            {
                while ($arr = mysqli_fetch_array($sectionsTemp))
                { $sections[] = $arr; }
            }

            if ($sections != '')
            {
                foreach ($sections as $key => $value)
                {
                    foreach ($value as $key2 => $value2)
                    {
                        if (is_numeric($key2))
                        { unset($sections[$key][$key2]); }
                    }
                }
            }

            return $sections;
        }

        function send_mail()
        {
            list (,$recipient) = explode("] ","{$_POST['recipient']}");
            $sectionID = implode(mysqli_fetch_row($this->mysql->select("id","sections","`name` = '{$_POST['section']}'")));
            $userID = implode(mysqli_fetch_row($this->mysql->select("id","users","`fio` = '{$recipient}'")));

            $date = date("Y-m-d G:i:s");
            $this->mysql->insert("messages","null, '{$_POST['text']}', '{$_POST['title']}', '{$date}', '{$_COOKIE['user']}', '{$userID}', '{$sectionID}', '0'");
            header("Location: /?page=add");
        }

        function mail()
        {
            $messageTemp = $this->mysql->select("*","messages","`id` = '{$_GET['id']}'");
            if ($messageTemp)
            {
                while ($arr = mysqli_fetch_array($messageTemp))
                { $message = $arr; }
            }

            if ($message != '')
            {
                foreach ($message as $key => $value)
                {
                    if (is_numeric($key))
                    { unset($message[$key]); }
                }
            }

            $authorTemp = $this->mysql->select("fio`, `email","users","`id` = '{$message['author']}'");
            if ($authorTemp)
            {
                while ($arr = mysqli_fetch_array($authorTemp))
                { $author = $arr; }
            }

            if ($author != '')
            {
                foreach ($author as $key => $value)
                {
                    if (is_numeric($key))
                    { unset($author[$key]); }
                }
            }

            $this->mysql->update("messages","status","1","`id` = '{$_GET['id']}'");

            return array($message, $author);
        }

    }

?>