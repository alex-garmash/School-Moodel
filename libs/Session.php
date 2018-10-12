<?php

class Session
{
    /**
     * Static function check if Session empty or not,
     * if empty return null,
     * if not return Session with data.
     * @return null
     */
    static function logged() {
        return (isset($_SESSION['logged'])) ? $_SESSION['logged'] : NULL;
    }

    /**
     * Static function set data to Session.
     * @param $u
     */
    static function setLogged($u) {
        $_SESSION['logged'] = $u;
    }

    /**
     * Static function clean Session.
     */
    static function logout() {
        session_destroy();
        $_SESSION = NULL;
    }
}