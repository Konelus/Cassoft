<?php
    require_once ($_SERVER["DOCUMENT_ROOT"]."/methods/crud.php");

    if (($_POST['enter']) || ($_POST['reg']) || ($_POST['exit']))
    {
        require_once ($_SERVER["DOCUMENT_ROOT"]."/methods/users.php");
        $USERS = new users();
        if ($_POST['enter']) { $USERS->login(); }
        elseif ($_POST['reg']) { $regError = $USERS->reg(); }
        elseif ($_POST['exit'])  { $USERS->logout();; }
    }
    elseif ($_GET['page'] == 'profile')
    {
        require_once ($_SERVER["DOCUMENT_ROOT"]."/methods/profile.php");
        $PROFILE = new profile();
        list($usersData, $groupsData) = $PROFILE->data();
    }
    elseif (($_GET['page'] == 'posts') || ($_GET['page'] == 'add') || ($_GET['page'] == 'message'))
    {
        require_once ($_SERVER["DOCUMENT_ROOT"]."/methods/posts.php");
        $POSTS = new posts();

        if ($_GET['page'] == 'posts')
        {
            $messages = $POSTS->messages();
            $userAccess = $POSTS->user_status();
        }
        elseif ($_GET['page'] == 'add')
        {
            $sections = $POSTS->all_sections();
            $users = $POSTS->all_users();
            if ($_POST['send_message']) { $POSTS->send_mail(); }
        }
        elseif ($_GET['page'] == 'message') { list($message, $author) = $POSTS->mail(); }
    }

    if ($_COOKIE['user'])
    {
        require_once ($_SERVER["DOCUMENT_ROOT"]."/methods/posts.php");
        $POSTS = new posts();
        $notifyCount = $POSTS->notify();
    }


?>