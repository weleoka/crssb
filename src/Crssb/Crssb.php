<?php
namespace Weleoka\Crssb;

class Crssb
{
    private $feed;
    
    /**
     * Construct the SimplePie dependency object.
     *
     * @param string $feedUrls giving the service its data input.
     *
     */
    public function __construct( $feedUrls ) {	  
    	  // Load the dependencies SimplePie.
        require_once( __DIR__ . '/../../../../autoload.php' );
        // Create the object.
        $this->feed = new \SimplePie();
        
        $this->setCache( '/cache' );
   	  $this->setURL( $feedUrls );
		      
        // Run SimplePie.
        $this->feed->init();
        
        // This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
        $this->feed->handle_content_type();
    }

    /**
     * Print the CRSS-feed.
     *
     * @return string
     *
     */
    public function printFeed() {
        $html = "<div class='header'>
        <h1><a href='{$this->feed->get_permalink()}'>{$this->feed->get_title()}</a></h1>
        <p>{$this->feed->get_description()}</p>
        </div>";
        
        foreach ($this->feed->get_items() as $item) {
            $html .= "<div class='item'>
            <h2><a href='{$item->get_permalink()}'>{$item->get_title()}</a></h2>
            <p>{$item->get_description()}</p>
            <p><small>Posted on {$item->get_date('j F Y | g:i a')}</small></p>
            </div>";
        }
        return $html;
    }
    
    /**
     * Print the first of the items in CRSS-feed.
     *
     * @return string
     *
     */  
    public function oneFeed() {
		  $item = $this->feed->get_item();

        $html = "<div class='item'>
            <a href='{$item->get_permalink()}'>{$item->get_title()}</a> <small> - {$item->get_date('j F Y | g:i a')}</small>
				</div>";
        return $html;
    }
    
    /**
     * Print a reduced content item list of CRSS-feed.
     *
     * @return string
     *
     */    
    public function streamlineFeed() {
		  $html = '';    
    	  foreach ($this->feed->get_items() as $item) {
            $html .= "<div class='item'>
            <a href='{$item->get_permalink()}'>{$item->get_title()}</a><br><small> - {$item->get_date('j F Y | g:i a')}</small>
            </div>";
        }
        return $html;
    }
 
  	 /**
     * Set cache location.
     *
     * @return void
     *
     */ 
 	 public function setCache ( $cacheDir ) {
        $this->feed->set_cache_location(__DIR__ . $cacheDir );

        if (!is_writeable( $this->feed->cache_location )) {
    			throw new Exception( 'Can not write file to ' . $this->feed->cache_location . ' please change permissions.' );
  		  }
	 }
	 
  	 /**
     * Set the URL for RSS.
     *
     * @param string $feedUrls giving the service its data input.
     * @return void
     *
     */ 
	 public function setURL ( $feedUrls ) {
    	  		if ( !$this->isValidURL( $feedUrls )) {
    	  			throw new Exception( 'The feed URL is not valid, re-write it and include http:// (' . $feedUrls . ')');
    	  		} else {
        			$this->feed->set_feed_url( $feedUrls );
        		}
	 }

  	 /**
     * Test if input URL is valid.
     *
     * @param string $feedUrls giving the service its data input.
     * @return boolean
     *
     */ 
  	public function isValidURL( $url ) {
		if(filter_var($url, FILTER_VALIDATE_URL))	{
    		return true;
		} else {
    		return false;
		}  		
   }
}        