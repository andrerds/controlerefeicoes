 /* @author Andre
*/
jQuery(document).ready(function() {
    
        var $body = jQuery('body');
    
        ({
            mouseport: $body,
            yparallax: false,
            xparallax: -0.05,
            frameDuration: 30,
            xorigin: 0.5,
            yorigin: 0 
       ,
        
       
            mouseport: $body,
            yparallax: 0.1,
            xparallax: 0.1,
            frameDuration: 40,
            xorigin: 0.5,
            yorigin: 0
        ,
            mouseport: $body,
            yparallax: -0.1,
            xparallax: 0.05,
            frameDuration: 40,
            xorigin: 0.5,
            yorigin: 0
             
        });
 
});

var current = 0;

function scrollBg(wrapper, step, right){
        
        if(right) {
                
                current += step;
        
        } else {
		
                current -= step;
        
        }
        
		jQuery('#'+wrapper).css('background-position',current+'px 0');

}

var init = setInterval('scrollBg("moving-background", 1)', 50); 