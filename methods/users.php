<?php

    class users
    {
        private $mysql;

        public function __construct()
        {
            $this->mysql = new CRUD();
        }

        function login()
        {
            $result = $this->mysql->select("id","users","(`phone` = '{$_POST['login']}' OR `email` = '{$_POST['login']}') AND `password` = '{$_POST['password']}'","");
            if ($result)
            {
                $userID = implode(mysqli_fetch_row($result));
                $this->mysql->update("users","status","1","`id` = '{$userID}'");
                setcookie("user","{$userID}");
                header("Location: /");
            }
        }

        function reg()
        {
            $dataCheckTemp = $this->mysql->select("email`,`phone","users", "", "","");
            if ($dataCheckTemp)
            {
                $count = 0;
                while ($arr = mysqli_fetch_array($dataCheckTemp))
                {
                    $dataCheck[$count]['email'] = $arr['email'];
                    $dataCheck[$count]['phone'] = $arr['phone'];
                    $count++;
                }
            }

            if ($dataCheck != '')
            {
                foreach ($dataCheck as $key => $value)
                {
                    if (($value['email'] == $_POST['email']) || ($value['phone'] == $_POST['phone']))
                    { $error = true; break; }
                }
            }
            //pre($error); exit;

            if ($error != true)
            {
                if ($_POST['notify'] == 'Вкл') { $notify = '1'; }
                elseif ($_POST['notify'] == 'Выкл') { $notify = '0'; }

                $this->mysql->insert("users","null, '1', '{$_POST['fio']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['password']}', '{$notify}'","");
                $userID = implode(mysqli_fetch_row($this->mysql->select("id","users", "`fio` = '{$_POST['fio']}' AND `email` = '{$_POST['email']}' AND `phone` = '{$_POST['phone']}'")));

                $groupID = implode(mysqli_fetch_row($this->mysql->select("id","groups","`name` = 'Зарегистрированный пользователь'")));
                $this->mysql->insert("groups_compare","null, {$groupID}, {$userID}");

                setcookie("user","{$userID}");
                header("Location: /");
            }

            return $error;
        }

        function logout()
        {
            $this->mysql->update("users","status","0","`id` = '{$_COOKIE['user']}'");
            setcookie("user", "", time()-3600);
            header ("Location: /");
        }
    }



?>