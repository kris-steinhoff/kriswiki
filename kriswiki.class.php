<?php

class kriswiki
{
    /**
     * The username of the current user, or their IP address.
     */
    public $user;

    function __construct() 
    {
       if ( ! $this->user = $_SERVER[ 'REMOTE_USER' ] ) {
           $this->user = $_SERVER[ 'REMOTE_ADDR' ];
       }
       $this->debug( $this->user );
    }

    /**
    * Debug
    *
    * @param mixed $var
    *
    * @return void
    */
    public function debug( $var ) {
        echo '<div class="debug" style="border: 1px dotted black; padding: .5em; font-family: courier, fixed-width; font-size: 10px; white-space: pre;">';
        echo '<strong>';
        var_dump( $var );
        echo '</strong>';
        echo "\n";
        debug_print_backtrace();
        echo '</div>'."\n";
    }
}
?>
