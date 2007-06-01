<?php

class kriswiki
{
    function __construct( $dir ) 
    {
        $this->dir = $dir;
        $this->db = sqlite_open( $this->dir.'/database.sqlite' );
        if ( ! $this->author = $_SERVER[ 'REMOTE_USER' ] ) {
            $this->author = $_SERVER[ 'REMOTE_ADDR' ];
        }
        if ( ! $_REQUEST[ 'page' ] ) {
            $this->page = $this->get_page_info( $_REQUEST[ 'page' ] );
        } else {
            $this->page = $this->get_page_info( 'main' );
        }

    }

    /**
     * Get Page Info
     *
     * @param string $title
     * @return array
     */
    public function get_page_info( $title ) 
    {
        sqlite_query( $this->db, 'SELECT * FROM pages WHERE title = "'.$title.'"' );

    }

    /**
     * Debug
     *
     * @param mixed $var
     *
     * @return void
     */
    public function error( $var ) 
    {
        echo '<div class="debug" style="border: 1px dotted black; padding: .5em; font-family: monospace; font-size: 12px; white-space: pre;">';
        echo '<strong>';
        print_r( $var );
        echo '</strong>';
        echo "\n";
        debug_print_backtrace();
        echo '</div>'."\n";
    }


}
?>
