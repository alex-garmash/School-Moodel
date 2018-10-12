<?php


class ErrorPage extends View
{
    //private members.
    private $error;
    private $production = false;

    /**
     * ErrorPage constructor.
     * @param $e
     */
    function __construct($e) {
        parent::__construct("Error");
        $this->error = $e;
        $this->dump();
    }

    /**
     * Dump error page.
     * @return mixed|void
     */
    public function dumpView() {
        require "components/htmlTop.php";
        echo <<<HTM
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="glyphicon glyphicon-exclamation-sign"></h2>
                <h3>Oooopsi, we had a little problem</h3>
                <h4>A message was sent to administrator</h4>
            </div>
HTM;
        $this->debug();
        echo '</div></div></div>';
        require "components/htmlbottom.php";
        die;
    }

    /**
     * function dump errors to page.
     */
    private function debug() {
        if(!$this->production) {
            echo '<pre>';
            $e = [];
            if(isset($this->error['message'])) {
                $e[] = $this->error['message'];
            }
            if(isset($this->error['code'])) {
                $e[] = "Code: {$this->error['code']}";
            }
            if(count($e)) {
                echo "<p>".implode($e,'<br>').'</p><hr>';
            }
            print_r(debug_backtrace());
            echo '</pre>';
        }

    }
}