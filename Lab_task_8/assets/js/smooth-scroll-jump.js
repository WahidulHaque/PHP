$(function(){
	
	$.jumper = {
		
		/**
		 *	Initialization and event listeners
		 */
		init: function(){
			$this = this; // this points to $.jumper object
			
			//check if there are links to attached this plugin
			if( ! $('[smooth-scroll-jump]').length ){
				return;
			}
			
			//listener when clicking jumper element
			$(document).on('click', '[smooth-scroll-jump]', $this.jump);
		},

		/**
		 * Do the jump 
		 */
		jump: function( event ){
			event.preventDefault(); //do not set the hash for now, we will set it later based on the given option

			var prefix		= 'jump-', //identifier for other settings
				el			= $(this), //the jumper element
				target		= this.hash,
				animate		= el.attr(prefix + 'animate') || true,
				speed		= el.attr(prefix + 'speed') || 500,
				distance	= el.attr(prefix + 'distance') || 20,
				targetAttr	= el.attr(prefix + 'target-attr') || 'id',
				changeHash	= el.attr(prefix + 'change-hash') || false,
				header		= el.attr(prefix + 'header') || '',
				offset		= '';

			//identify position of the target
			if( $('[' + targetAttr + '="' + target.substr(1) + '"]').length ){
				offset = $('[' + targetAttr + '="' + target.substr(1) + '"]').offset();
			} else {
				return; //do not do anything if target element is missing
			}

			//check for positioning if header is provided, we only re-calculate scroll distance if header is in a fixed position
			if( header && $( header ).length && $( header ).css('position') == 'fixed' ){
				offset.top -= $( header ).outerHeight(true);
			}

			//add the distance
			if( distance ){
				offset.top -= parseInt(distance);
			}

			//set speed to zero if animate option is disabled
			if( animate !== true ){
				speed = 0;
			}

			//jump to the target
			$('html, body').animate({
				scrollTop: offset.top
			}, parseInt(speed), function(){
				//check if hash needs to be changed or not
				if( changeHash ){
					window.location.hash = target
				}
			});
		},
		
	};
	
	$.jumper.init(); //initialize
	
});
