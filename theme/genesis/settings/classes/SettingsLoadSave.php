<?php

class SettingsLoadSave {
	private $themeKey = 'theme_genesis';

    protected function preSave(){
    	
    }

    protected function preLoad($key){
    	$newKey = '';

		switch ($key) {
			case 'themeColor':
			case 'generalSidebar':
			case 'logoURL':
			case 'faviconURL':
				$newKey = get_config($this->themeKey,strtolower($key));
				break;
			case 'headerSocialIcons':
				$newKey = get_config($this->themeKey,'headersocialicon');
				break;
			case 'footerSocialIcons':
				$newKey = get_config($this->themeKey,'footersocialicon');
				break;		
			case 'module1':
			case 'module2':
			case 'module3':
				$newKey = get_config($this->themeKey,'footer'.$key);
				break;		
			case 'mainMenu':
				$newKey = get_config($this->themeKey,'menudata');
				break;
			default:
				$newKey = get_config($this->themeKey,$key);		
				break;
		}

		return $newKey;
    }

    protected function save(){
    	if(isset($_POST) && sizeof($_POST)>0){
    		/* POSTs */
		    $general                = $_POST["general"];
		    $header                 = $_POST["header"];
		    $footer                 = $_POST["footer"];
		    $footermodule           = $_POST["footer_module"];
		    $frontpage		        = $_POST["frontpage"];
		    $social                 = $_POST["socials"];

		    /* Saving Configs */
    
		    #GENERAL
		    set_config('moodleVersion', $general["moodleVersion"], $this->themeKey);
		    set_config('themecolor', $general["themeColor"], $this->themeKey);

		    set_config('customColorScheme1', $general["customColorScheme1"], $this->themeKey);
		    set_config('customColorScheme2', $general["customColorScheme2"], $this->themeKey);
		    set_config('customColorScheme3', $general["customColorScheme3"], $this->themeKey);
		    set_config('customColorScheme4', $general["customColorScheme4"], $this->themeKey);

		    
		    set_config('layoutStyle', $general["layoutStyle"], $this->themeKey);
		    set_config('bgcolor', $general["bgcolor"], $this->themeKey);		 
		    set_config('bgpattern', $general["bgpattern"], $this->themeKey);	
		    set_config('bgpatternCustom', $general["bgpatternCustom"], $this->themeKey);	
		    set_config('bgimage', $general["bgimage"], $this->themeKey);		    		    	    
		    set_config('faviconurl', $general["faviconURL"], $this->themeKey);
		    set_config('font', $general["font"], $this->themeKey);
		    set_config('shibbolethLogin', $general["shibbolethLogin"], $this->themeKey);
		    set_config('guestLogin', $general["guestLogin"], $this->themeKey);

		    set_config('generalsidebar', $general["generalSidebar"], $this->themeKey);
		    set_config('breadcrumb', $general["breadcrumb"], $this->themeKey);
		    set_config('editPageButton', $general["editPageButton"], $this->themeKey);
		    set_config('googleAnalytics', $general["googleAnalytics"], $this->themeKey);
		    set_config('customCSS', $general["customCSS"], $this->themeKey);

		    #HEADER
		    set_config('headerType',$header["headerType"],$this->themeKey);
		    set_config('headersocialicon',$header["headerSocialIcons"],$this->themeKey);
		    set_config('logourl', $header["logoURL"], $this->themeKey);		 
		    set_config('logoHeight', $header["logoHeight"], $this->themeKey);		
		    set_config('headerPadding', $header["headerPadding"], $this->themeKey);		
		    set_config('registerLink', $header["registerLink"], $this->themeKey);		
		    set_config('loggedAs', $header["loggedAs"], $this->themeKey);		
		    set_config('menuMarginTop', $header["menuMarginTop"], $this->themeKey);		
		    if(isset($header["mainMenu"]))
		        set_config('menudata',json_encode($header["mainMenu"]),$this->themeKey);

		    #FOOTER
			set_config('footermodule1',$footer["module1"], $this->themeKey);
		    set_config('footermodule2',$footer["module2"], $this->themeKey);
		    set_config('footermodule3',$footer["module3"], $this->themeKey);
		    set_config('copyright',$footer["copyright"], $this->themeKey);
		    set_config('footersocialicon',$footer["footerSocialIcons"], $this->themeKey);

			#FOOTER MODULE
		    set_config('footermod_aboutus_whitelogo', $footermodule["footermod_aboutus_whitelogo"], $this->themeKey);
		    set_config('footermod_aboutus_text',$footermodule["footermod_aboutus_text"], $this->themeKey);
		    if(isset($footermodule["footermod_links"]))
		        set_config('footermod_links',json_encode($footermodule["footermod_links"]), $this->themeKey);
		    set_config('footermod_contact_address',$footermodule["footermod_contact_address"], $this->themeKey);
		    set_config('footermod_contact_city',$footermodule["footermod_contact_city"], $this->themeKey);
		    set_config('footermod_contact_phone',$footermodule["footermod_contact_phone"], $this->themeKey);
		    set_config('footermod_contact_mail',$footermodule["footermod_contact_mail"], $this->themeKey);
		    set_config('footermod_image_title',$footermodule["footermod_image_title"], $this->themeKey);
		    set_config('footermod_image_url',$footermodule["footermod_image_url"], $this->themeKey);

			#FRONTPAGE
		    set_config('slidermode',$frontpage["slidermode"], $this->themeKey);
		    set_config('sliderplugin',$frontpage["sliderplugin"], $this->themeKey);
		    set_config('sliderspeed',$frontpage["sliderspeed"], $this->themeKey);
		    set_config('sliderheight',$frontpage["sliderheight"], $this->themeKey);

		    if(isset($frontpage["slideshowdata"]))
		        set_config('slideshowdata',json_encode($frontpage["slideshowdata"]), $this->themeKey);
		    set_config('sliderpattern',$frontpage["sliderpattern"], $this->themeKey);
		    set_config('frontpagesidebar',$frontpage["frontpagesidebar"], $this->themeKey);
		    set_config('showfeaturedcourses',$frontpage["showfeaturedcourses"], $this->themeKey); 
		    set_config('courseName',$frontpage["courseName"], $this->themeKey); 
		    if(isset($frontpage["featuredcourses"]))
		        set_config('featuredcourses',  json_encode($frontpage["featuredcourses"]), $this->themeKey);
		    set_config('showlinkboxes',$frontpage["showlinkboxes"], $this->themeKey);
		    if(isset($frontpage["linkboxdata"]))
		        set_config('linkboxdata',json_encode($frontpage["linkboxdata"]), $this->themeKey);

		    #SOCIAL
		    set_config('social_rss',$social["social_rss"], $this->themeKey);
		    set_config('social_twitter',$social["social_twitter"], $this->themeKey);
		    set_config('social_dribbble',$social["social_dribbble"], $this->themeKey);
		    set_config('social_vimeo',$social["social_vimeo"], $this->themeKey);
		    set_config('social_facebook',$social["social_facebook"], $this->themeKey);
		    set_config('social_youtube',$social["social_youtube"], $this->themeKey);
		    set_config('social_flickr',$social["social_flickr"], $this->themeKey);
		    set_config('social_gplus',$social["social_gplus"], $this->themeKey);
		    set_config('social_linkedin',$social["social_linkedin"], $this->themeKey);
		    set_config('social_tumblr',$social["social_tumblr"], $this->themeKey);
		    set_config('social_wordpress',$social["social_wordpress"], $this->themeKey);
		    set_config('social_pinterest',$social["social_pinterest"], $this->themeKey);

		    redirect('index.php?lp='.$_POST['lastPage']);
    	}
    }

    protected function load($key){
		return $this->preLoad($key);
    }
}

?>
