<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string 
 */
function genesis_process_css($css, $theme) {
    global $CFG;
    $themecolor = $theme->settings->themecolor;
    
    switch ($themecolor) {
        case 'blue':
            $color1 = "#00A5B6";
            $color2 = "#003050";
            $color3 = "#0094A3";
            $color4 = "#CADD09";
            break;
        case 'green':
            $color1 = "#5DBB71";
            $color2 = "#27736F";
            $color3 = "#4F9F60";
            $color4 = "#EDDC2A";
            break;
        case 'orange':
            $color1 = "#D58303";
            $color2 = "#5F6366";
            $color3 = "#C28425";
            $color4 = "#FED060";
            break;
        case 'custom':
            $color1 = $theme->settings->customColorScheme1;
            $color2 = $theme->settings->customColorScheme2;
            $color3 = $theme->settings->customColorScheme3;
            $color4 = $theme->settings->customColorScheme4;
            break;
    }
    
    $layoutStyle = $theme->settings->layoutStyle;
    $bgstyle = '';

    switch ($layoutStyle) {
        case 'bgcolor':
            $bgstyle = '
                        body{
                            left: 50%;
                            margin-left: -675px;
                            position: absolute;
                            width: 1350px;
                        }

                        html{
                            background: '.$theme->settings->bgcolor.'
                        }

                        ';
            break;
        case 'bgpattern':
            $bgstyle = '
                        body{
                            left: 50%;
                            margin-left: -675px;
                            position: absolute;
                            width: 1350px;
                        }

                        html{
                            background-image: url('.((isset($theme->settings->bgpatternCustom) && trim($theme->settings->bgpatternCustom) != "")?$theme->settings->bgpatternCustom:$CFG->wwwroot."/theme/genesis/pix/patterns/".$theme->settings->bgpattern).');
                            background-attachment: scroll;
                            background-size: auto;
                            background-position: 50% 50%;
                            background-repeat: repeat repeat;
                        }

                        ';
            break;
        case 'bgimage':
            $bgstyle = '
                        body{
                            left: 50%;
                            margin-left: -675px;
                            position: absolute;
                            width: 1350px;
                        }

                        html{
                            background-image: url('.$theme->settings->bgimage.');
                            background-attachment: fixed;
                            background-size: cover;
                            background-position: 50% 50%;
                            background-repeat: no-repeat no-repeat;
                        }

                        ';
            break;
    }

    $customCSS = '';
    $sliderPlugin = get_config('theme_genesis', 'sliderplugin');

    if($sliderPlugin == 'plume'){
        $slideritems = json_decode($theme->settings->slideshowdata);

        for($x=1;$x<=sizeof($slideritems);$x++){
            $customCSS .= '.bg-img-'.$x.' {
                               background-image: url('.$slideritems[$x-1]->image.');
                           }';
        }
    }

    $customCSS .= $theme->settings->customCSS;

    $css = str_replace("[[setting:color1]]", $color1, $css);
    $css = str_replace("[[setting:color2]]", $color2, $css);
    $css = str_replace("[[setting:color3]]", $color3, $css);
    $css = str_replace("[[setting:color4]]", $color4, $css);
    $css = str_replace("[[setting:logoHeight]]", $theme->settings->logoHeight.'px', $css);
    $css = str_replace("[[setting:headerPadding]]", $theme->settings->headerPadding.'px', $css);
    $css = str_replace("[[setting:menuMarginTop]]", $theme->settings->menuMarginTop.'px', $css);
    $css = str_replace("[[setting:footermod_aboutus_whitelogo]]", $theme->settings->footermod_aboutus_whitelogo, $css);
    $css = str_replace("[[setting:fontFamily]]", ucfirst($theme->settings->font), $css);
    $css = str_replace("[[setting:customCSS]]", $customCSS, $css);
    $css = str_replace("[[setting:sliderHeight]]", $theme->settings->sliderheight, $css);
    $css = str_replace("[[setting:bgstyle]]", $bgstyle, $css);
    $css = str_replace("[[setting:fontDir]]", $CFG->wwwroot.'/theme/genesis/fonts/', $css);

    // Return the CSS
    return $css;
}

?>