<?php

    class profile
    {
        private $mysql;

        public function __construct()
        {
            $this->mysql = new CRUD();
        }

        function data()
        {
            $resultUsers = $this->mysql->select("*","users","`id` = '{$_COOKIE['user']}'");

            while ($array = mysqli_fetch_array($resultUsers))
            { $usersData = $array; }
            if ($usersData != '')
            {
                foreach ($usersData as $key => $value)
                {
                    if ((is_numeric($key)) || ($key == 'id'))
                    {
                        unset($usersData[$key]);
                        unset($key);
                    }

                    switch ($key)
                    {
                        case 'status':
                            unset($usersData[$key]);
                            $usersData[$key]['key'] = 'Статус';
                            if ($value == 1) { $usersData[$key]['value'] = 'Активен'; }
                            if ($value == 0) { $usersData[$key]['value'] = 'Не активен';  }
                            break;
                        case 'fio': unset($usersData[$key]); $usersData[$key]['key'] = 'ФИО'; $usersData[$key]['value'] = $value; break;
                        case 'email': unset($usersData[$key]); $usersData[$key]['key'] = 'Почта'; $usersData[$key]['value'] = $value; break;
                        case 'phone': unset($usersData[$key]); $usersData[$key]['key'] = 'Номер телефона'; $usersData[$key]['value'] = $value; break;
                        case 'password': unset($usersData[$key]); $usersData[$key]['key'] = 'Пароль'; $usersData[$key]['value'] = $value; break;
                        case 'notify':
                            unset($usersData[$key]);
                            $usersData[$key]['key'] = 'Уведомления';
                            if ($value == 1) { $usersData[$key]['value'] = 'Включены'; }
                            if ($value == 0) { $usersData[$key]['value'] = 'Отключены'; }
                            break;
                        default;

                    }
                }
            }

            $groupsDataTemp = $this->mysql->select(
                "gc`.`groups`, `g`.`name`, `g`.`description",
                "groups_compare` as `gc`, `groups` as `g",
                "`gc`.`users` = '{$_COOKIE['user']}' AND `g`.`id` = `gc`.`groups`"
            );

            if ($groupsDataTemp)
            {
                $count = 0;
                while ($arr = mysqli_fetch_array($groupsDataTemp))
                {
                    $groupsData[$count]['name'] = $arr['name'];
                    if ($arr['description']) { $groupsData[$count]['description'] = $arr['description']; }
                    else { $groupsData[$count]['description'] = 'Описание отсутствует!'; }
                    $count++;
                }
            }

            return array($usersData, $groupsData);
        }
    }
?>