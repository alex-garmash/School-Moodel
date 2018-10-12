<?php

class Page extends View
{
    //private members
    private $component = NULL;
    private $data = NULL;

    /**
     * Page constructor.
     * @param null $title
     */
    function __construct($title=NULL) {
        parent::__construct($title);
    }

    /**
     * Function set components to view page.
     * @param      $component
     * @param null $data
     */
    function setComponent($component,$data=NULL) {
        $this->component = $component;
        if($data) {
            $this->data = $data;
        }
    }

    /**
     * Function dump page.
     * @return mixed|void
     */
    function dumpView() {
        require "components/htmltop.php";
        require "components/htmlNavigation.php";
        require 'components/'.$this->component;
        require "components/htmlFooter.php";
    }

}