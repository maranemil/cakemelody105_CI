 /*
 * TipTip
 * Copyright 2010 Drew Wilson
 * www.drewwilson.com
 * code.drewwilson.com/entry/tiptip-jquery-plugin
 *
 * Version 1.3   -   Updated: Mar. 23, 2010
 *
 * This Plug-In will create a custom tooltip to replace the default
 * browser tooltip. It is extremely lightweight and very smart in
 * that it detects the edges of the browser window and will make sure
 * the tooltip stays within the current window size. As a result the
 * tooltip will adjust itself to be displayed above, below, to the left 
 * or to the right depending on what is necessary to stay within the
 * browser window. It is completely customizable as well via CSS.
 *
 * This TipTip jQuery plug-in is dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($){
	$.fn.tipTip = function(options) {
		let tiptip_arrow;
		let tiptip_content;
		let tiptip_holder;
		const defaults = {
			activation: "hover",
			keepAlive: false,
			maxWidth: "200px",
			edgeOffset: 3,
			defaultPosition: "bottom",
			delay: 400,
			fadeIn: 200,
			fadeOut: 200,
			attribute: "title",
			content: false, // HTML or String to fill TipTIp with
			enter: function () {
			},
			exit: function () {
			}
		};
		const opts = $.extend(defaults, options);

		// Setup tip tip elements and render them to the DOM
	 	if($("#tiptip_holder").length <= 0){
	 		tiptip_holder = $('<div id="tiptip_holder" style="max-width:'+ opts.maxWidth +';"></div>');
			tiptip_content = $('<div id="tiptip_content"></div>');
			tiptip_arrow = $('<div id="tiptip_arrow"></div>');
			$("body").append(tiptip_holder.html(tiptip_content).prepend(tiptip_arrow.html('<div id="tiptip_arrow_inner"></div>')));
		} else {
			tiptip_holder = $("#tiptip_holder");
			tiptip_content = $("#tiptip_content");
			tiptip_arrow = $("#tiptip_arrow");
		}
		
		return this.each(function(){
			let org_title;
			const org_elem = $(this);
			if(opts.content){
				org_title = opts.content;
			} else {
				org_title = org_elem.attr(opts.attribute);
			}
			if(org_title !== ""){
				if(!opts.content){
					org_elem.removeAttr(opts.attribute); //remove original Attribute
				}
				let timeout = false;

				if(opts.activation === "hover"){
					org_elem.hover(function(){
						active_tiptip();
					}, function(){
						if(!opts.keepAlive){
							deactive_tiptip();
						}
					});
					if(opts.keepAlive){
						tiptip_holder.hover(function(){}, function(){
							deactive_tiptip();
						});
					}
				} else if(opts.activation === "focus"){
					org_elem.focus(function(){
						active_tiptip();
					}).blur(function(){
						deactive_tiptip();
					});
				} else if(opts.activation === "click"){
					org_elem.click(function(){
						active_tiptip();
						//return false;
					}).hover(function(){},function(){
						if(!opts.keepAlive){
							deactive_tiptip();
						}
					});
					if(opts.keepAlive){
						tiptip_holder.hover(function(){}, function(){
							deactive_tiptip();
						});
					}
				}
			
				function active_tiptip(){
					opts.enter.call(this);
					tiptip_content.html(org_title);
					tiptip_holder.hide().removeAttr("class").css("margin","0");
					tiptip_arrow.removeAttr("style");

					const top = parseInt(org_elem.offset()['top']);
					const left = parseInt(org_elem.offset()['left']);
					const org_width = parseInt(org_elem.outerWidth());
					const org_height = parseInt(org_elem.outerHeight());
					const tip_w = tiptip_holder.outerWidth();
					const tip_h = tiptip_holder.outerHeight();
					const w_compare = Math.round((org_width - tip_w) / 2);
					const h_compare = Math.round((org_height - tip_h) / 2);
					let marg_left = Math.round(left + w_compare);
					let marg_top = Math.round(top + org_height + opts.edgeOffset);
					let t_class = "";
					let arrow_top = "";
					let arrow_left = Math.round(tip_w - 12) / 2;

					if(opts.defaultPosition === "bottom"){
                    	t_class = "_bottom";
                   	} else if(opts.defaultPosition === "top"){
                   		t_class = "_top";
                   	} else if(opts.defaultPosition === "left"){
                   		t_class = "_left";
                   	} else if(opts.defaultPosition === "right"){
                   		t_class = "_right";
                   	}

					const right_compare = (w_compare + left) < parseInt($(window).scrollLeft());
					const left_compare = (tip_w + left) > parseInt($(window).width());

					if((right_compare && w_compare < 0) || (t_class === "_right" && !left_compare) || (t_class === "_left" && left < (tip_w + opts.edgeOffset + 5))){
						t_class = "_right";
						arrow_top = Math.round(tip_h - 13) / 2;
						arrow_left = -12;
						marg_left = Math.round(left + org_width + opts.edgeOffset);
						marg_top = Math.round(top + h_compare);
					} else if((left_compare && w_compare < 0) || (t_class === "_left" && !right_compare)){
						t_class = "_left";
						arrow_top = Math.round(tip_h - 13) / 2;
						arrow_left =  Math.round(tip_w);
						marg_left = Math.round(left - (tip_w + opts.edgeOffset + 5));
						marg_top = Math.round(top + h_compare);
					}

					const top_compare = (top + org_height + opts.edgeOffset + tip_h + 8) > parseInt($(window).height() + $(window).scrollTop());
					const bottom_compare = ((top + org_height) - (opts.edgeOffset + tip_h + 8)) < 0;

					if(top_compare || (t_class === "_bottom" && top_compare) || (t_class === "_top" && !bottom_compare)){
						if(t_class === "_top" || t_class === "_bottom"){
							t_class = "_top";
						} else {
							t_class = t_class+"_top";
						}
						arrow_top = tip_h;
						marg_top = Math.round(top - (tip_h + 5 + opts.edgeOffset));
					} else if(bottom_compare | (t_class === "_top" && bottom_compare) || (t_class === "_bottom" && !top_compare)){
						if(t_class === "_top" || t_class === "_bottom"){
							t_class = "_bottom";
						} else {
							t_class = t_class+"_bottom";
						}
						arrow_top = -12;						
						marg_top = Math.round(top + org_height + opts.edgeOffset);
					}
				
					if(t_class === "_right_top" || t_class === "_left_top"){
						marg_top = marg_top + 5;
					} else if(t_class === "_right_bottom" || t_class === "_left_bottom"){
						marg_top = marg_top - 5;
					}
					if(t_class === "_left_top" || t_class === "_left_bottom"){
						marg_left = marg_left + 5;
					}
					tiptip_arrow.css({"margin-left": arrow_left+"px", "margin-top": arrow_top+"px"});
					tiptip_holder.css({"margin-left": marg_left+"px", "margin-top": marg_top+"px"}).attr("class","tip"+t_class);
					
					if (timeout){ clearTimeout(timeout); }
					timeout = setTimeout(function(){ tiptip_holder.stop(true,true).fadeIn(opts.fadeIn); }, opts.delay);	
				}
				
				function deactive_tiptip(){
					opts.exit.call(this);
					if (timeout){ clearTimeout(timeout); }
					tiptip_holder.fadeOut(opts.fadeOut);
				}
			}				
		});
	}
})(jQuery);  	