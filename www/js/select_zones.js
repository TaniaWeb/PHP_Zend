/********************************************************************
// 		Decription 	 : Main javascript function for drawing
//		Created By 	 : Sergey Kuznetov
//		Created Date : 2016/12/05
*********************************************************************/

var classDrawingTool 		= function(canvasID, pare_obj)
{
	var main 				= this;

	main.canvas 			= null;
	main.canv_parent 		= "canvas_area";
	main.canv_width 		= 800;
	main.canv_height 		= 500;

	main.mode				= 4;
	main.sub_mode			= 1;
	main.face_mask			= null;
	main.mask_image			= null;

	main.clickedPointer		= 0.0;
	main.prev_pointer 		= 0.0;
	main.clickedIndex 		= -1;
	main.main_zone_index	= 0;
	main.sub_zone_index		= 0;

	main.hoverObject		= null;
	main.isMoving			= false;
	main.resWidth			= 0;

	var zoneList	      	=   [
	                                {
	                                    "category"  	: "eye_region",                                
	                                    "sub_category"	: [
	                                    					{
	                                    						"image"				: "brow_lift",
	                                    						"title"				: "Augenbrauen",
	                                    						"sub_title"			: "Brow lift"
	                                    					},
	                                    					{
	                                    						"image"				: "crow_fleet",
	                                    						"title"				: "Augenfalten",
	                                    						"sub_title"			: "Crow Fleet"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrows_tear",
	                                    						"title"				: "Augenringe & Tränenringe",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "glabella",
	                                    						"title"				: "Zonesfalten",
	                                    						"sub_title"			: "Glabella"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrow_lift",
	                                    						"title"				: "Augenbraun Lift",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "morefresh_eyes",
	                                    						"title"				: "Frischere Augen",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "crowfoot",
	                                    						"title"				: "Krähenfüße",
	                                    						"sub_title"			: ""
	                                    					}
	                                    				  ]
	                                },
	                                {
	                                    "category"  	: "nasal_region",                                
	                                    "sub_category"	: [
	                                    					{
	                                    						"image"				: "brow_lift",
	                                    						"title"				: "Augenbrauen",
	                                    						"sub_title"			: "Brow lift"
	                                    					},
	                                    					{
	                                    						"image"				: "crow_fleet",
	                                    						"title"				: "Augenfalten",
	                                    						"sub_title"			: "Crow Fleet"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrows_tear",
	                                    						"title"				: "Augenringe & Tränenringe",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "glabella",
	                                    						"title"				: "Zonesfalten",
	                                    						"sub_title"			: "Glabella"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrow_lift",
	                                    						"title"				: "Augenbraun Lift",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "morefresh_eyes",
	                                    						"title"				: "Frischere Augen",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "crowfoot",
	                                    						"title"				: "Krähenfüße",
	                                    						"sub_title"			: ""
	                                    					}
	                                    				  ]
	                                },
	                                {
	                                    "category"  	: "forehead_region",                                
	                                    "sub_category"	: [
	                                    					{
	                                    						"image"				: "brow_lift",
	                                    						"title"				: "Augenbrauen",
	                                    						"sub_title"			: "Brow lift"
	                                    					},
	                                    					{
	                                    						"image"				: "crow_fleet",
	                                    						"title"				: "Augenfalten",
	                                    						"sub_title"			: "Crow Fleet"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrows_tear",
	                                    						"title"				: "Augenringe & Tränenringe",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "glabella",
	                                    						"title"				: "Zonesfalten",
	                                    						"sub_title"			: "Glabella"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrow_lift",
	                                    						"title"				: "Augenbraun Lift",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "morefresh_eyes",
	                                    						"title"				: "Frischere Augen",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "crowfoot",
	                                    						"title"				: "Krähenfüße",
	                                    						"sub_title"			: ""
	                                    					}
	                                    				  ]
	                                },
	                                {
	                                    "category"  	: "mouth_region",                                
	                                    "sub_category"	: [
	                                    					{
	                                    						"image"				: "brow_lift",
	                                    						"title"				: "Augenbrauen",
	                                    						"sub_title"			: "Brow lift"
	                                    					},
	                                    					{
	                                    						"image"				: "crow_fleet",
	                                    						"title"				: "Augenfalten",
	                                    						"sub_title"			: "Crow Fleet"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrows_tear",
	                                    						"title"				: "Augenringe & Tränenringe",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "glabella",
	                                    						"title"				: "Zonesfalten",
	                                    						"sub_title"			: "Glabella"
	                                    					},
	                                    					{
	                                    						"image"				: "eyebrow_lift",
	                                    						"title"				: "Augenbraun Lift",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "morefresh_eyes",
	                                    						"title"				: "Frischere Augen",
	                                    						"sub_title"			: ""
	                                    					},
	                                    					{
	                                    						"image"				: "crowfoot",
	                                    						"title"				: "Krähenfüße",
	                                    						"sub_title"			: ""
	                                    					}
	                                    				  ]
	                                }
	                            ];

	main.init 				= function()
	{
		main.initFabric();
		main.initEvt();
		main.initCSS();
		main.initBackground();
		main.initWorkspaceInfo();
	}

	main.initFabric 		= function()
	{
		main.canvas 		= new fabric.Canvas(canvasID);

		main.canvas.observe('mouse:over', function(e) { main.mouseover(e); });
		main.canvas.observe('mouse:out', function(e) { main.mouseout(e); });
		main.canvas.observe('mouse:down', function(e) { main.mousedown(e); });
		main.canvas.observe('object:moving', function(e) { main.objectmoving(e); });
		main.canvas.observe('object:scaling', function(e) { main.objectscaling(e); });
		main.canvas.observe('path:created', function(e) { main.drawnObjectCreated(e); });

		main.setCanvSize();
	}

	main.initSummary 		= function()
	{
		var json 			= main.canvas.toJSON(['selectable','lockMovementX', 'lockMovementY', 'hasControls', 'hasBorders', 'id', 'description', 'category', 'sub_category', 'title', 'sub_title', 'patternColor', 'myCustomOptionKeepStrokeWidth', 'mode', 'createdWidth', 'height']);
		var summary_width 	= $("#project_summary_area").width();
		var summary_order_label 	= $(".summary_order_label");
		var summary_content_area 	= $("#summary_content_area");

		$(summary_order_label).remove();
		$(summary_content_area).empty();

		$("#project_summary_area").css("display", "block");
		$("#summary_canvas_area").css("left", (100 - summary_width / 4) + "px");

		main.summary_canvas 				= new fabric.Canvas("summary_canvas");
		main.summary_canvas.isDrawingMode	= false;

		main.summary_canvas.setWidth ($("#summary_canvas_area").width());
		main.summary_canvas.setHeight($("#summary_canvas_area").height());

		main.summary_canvas.loadFromJSON(JSON.stringify(json), main.renderSummaryCanvas());
	}

	main.hideSummary		= function()
	{
		$("#project_summary_area").css("display", "none");
	}

	main.initSignModal 		= function()
	{
		$('#sign_layer_area').modal('setting', 'closable', false).modal('show');
		setTimeout(function()
        {
			main.sign_canvas 					= new fabric.Canvas("sign_canvas");
			main.sign_canvas.isDrawingMode		= true;

			main.sign_canvas.setWidth ($("#draw_sign_area").width());
			main.sign_canvas.setHeight($("#draw_sign_area").height());

			// main.sign_canvas.freeDrawingBrush.color 				= "rgb(79, 203, 128)";
			main.sign_canvas.freeDrawingBrush.width 				= 6;
        }, 500);
   	}
    main.initEvt        	= function()
    {
        $("#zone_select_area #save_point_button").click(function()
        {
        	main.initBtnZoneGroup();
        	main.initWishList();

        	main.hoverObject.description 	= $("#zone_select_area input").val();
        	main.hoverObject.category 		= zoneList[main.main_zone_index].category;
        	main.hoverObject.sub_category	= zoneList[main.main_zone_index].sub_category[main.sub_zone_index].image;
        	main.hoverObject.title 			= zoneList[main.main_zone_index].sub_category[main.sub_zone_index].title;
        	main.hoverObject.sub_title		= zoneList[main.main_zone_index].sub_category[main.sub_zone_index].sub_title;

            $('#zone_select_area').modal('hide');
            main.canvas.renderAll();

            setTimeout(function()
            {
            	main.save_canvas();
            }, 500);
        });

        $("#zone_select_area #cancel_point_button").click(function()
        {
        	main.initBtnZoneGroup();
        	main.initWishList();

        	main.canvas.remove(main.hoverObject);

	    	if ($("#edit_canvas_buttons").css("display") == "block")
	    	{
	    		$("#edit_canvas_buttons").css("display", "none");
	    	}

            $('#zone_select_area').modal('hide');
        });

        $("#draw_comment_area #save_point_button").click(function()
        {     
        	main.hoverObject.description 	= $("#draw_comment_area textarea").val();
        	main.canvas.renderAll();
            $('#draw_comment_area').modal('hide');

            setTimeout(function()
            {
            	main.save_canvas();
            }, 500);
        });

        $("#draw_comment_area #cancel_point_button").click(function()
        {
        	main.canvas.remove(main.hoverObject);

	    	if ($("#edit_canvas_buttons").css("display") == "block")
	    	{
	    		$("#edit_canvas_buttons").css("display", "none");
	    	}

            $('#draw_comment_area').modal('hide');
        });

        $("#edit_canvas_buttons #edit_object_button").click(function()
        {
        	main.showInitEditModal();
        });

        $("#edit_canvas_buttons #cancel_object_button").click(function()
        {
        	main.canvas.remove(main.hoverObject);

	    	if ($("#edit_canvas_buttons").css("display") == "block")
	    	{
	    		$("#edit_canvas_buttons").css("display", "none");
	    	}
	    });

        $("#edit_canvas_buttons #move_object_button").click(function()
        {
        	main.hoverObject.selectable	= 
			main.isMoving				= true;

			if(main.hoverObject.get('type') 	== "path")
			{
				main.canvas.isDrawingMode		= false;
			}
        });

        $("#save_button").click(function()
        {
        	main.save_canvas();
        });

        $("#continue_button").click(function()
        {
        	main.initSummary();
        });

        $("#summary_back_button").click(function()
        {
        	main.hideSummary();
        });

        $("#make_appointment_button").click(function()
        {
            main.initSignModal();
        });

        $("#sign_layer_area #save_edit_button").click(function()
        {
            $('#sign_layer_area').modal('hide');

            if ($("#created").val() == true)
            {
            	main.saveSignatureImage();
            }
            else
            {
	            setTimeout(function()
	            {
	            	$('#confirm_layer_area').modal('setting', 'closable', false).modal('show');
	            }, 500);
        	}
        });

        $("#sign_layer_area #cancel_edit_button").click(function()
        {
 			$('#sign_layer_area').modal('hide');
        });

        $("#erase_canvas_button").click(function()
        {
            main.sign_canvas.clear();
        });

        $("#confirm_continue_button").click(function()
        {
            main.saveSignatureImage();
        });
    }

	main.initCSS 			= function()
	{
		$(window).on("resize", function()
		{
			// main.setCanvSize();	
		});
	}

	main.setCanvSize 		= function()
	{
        if (main.mobileAndTabletcheck())
        {
            $("#right_sidebar_area a").css("width", "100px");
            $("#summary_canvas_area").css("width", "calc(100% - 100px) !important");
            $("#right_btn_area").css("width", "100px");
            $("#right_btn_area button").css("width", "85px");
            $("#right_btn_area button").css("margin-left", "7px");
            $("#right_btn_area button").css("padding", "0px");
            $("#canvas_area").css("width", "calc(100% - 100px)");
            $("#workspace_area").css("width", "calc(100% - 100px)");
            $("#right_sidebar_area_mask").css("width", "100px");
            $("#right_btn_area #name").css("display", "none");
            $("#right_btn_area #title").html("Kunde Bearbeiten");
            $("#right_btn_area #title").css("width", "85px");
            $("#right_btn_area #title").css("height", "43px");
            $("#right_btn_area #title").css("margin", "20px 8px 10px 7px");
            $("#right_btn_area #title").css("border", "1.5px solid rgb(183, 204, 210)");
            $("#right_sidebar_area a:nth-child(2) label").html("Selekieren");
            $("#right_sidebar_area a:nth-child(3) label").html("Zeichnen");
            $("#right_sidebar_area a:nth-child(4) label").html("Auswählen");
            $("#help_button span").css("display", "none");
            $("#help_button").css("width", "50px");
            $("#help_button").css("padding", "0px");
            $("#take_picture_button span").css("display", "none");
            $("#take_picture_button").css("width", "50px");
            $("#take_picture_button").css("padding", "0px");
            $("#take_picture_button").css("right", "115px");
            $(".image_wish_item").css("margin-left", "55px");
            $(".project_card").css("min-width", "0px");
        }
        else
        {
            $("#workspace_area").css("width", "calc(100% - 200px)");
        }

		$("#right_sidebar_area").css("display", "block");
		$("#help_button").css("display", "block");
		$("#take_picture_button").css("display", "block");

		if ($("#points").val())
		{
			var objJSON 		= JSON.parse($("#points").val());

			var canv_obj 		= objJSON.objects;
			var createdWidth 	= 0;
			var currentWidth 	= $("#canvas_area").width();

			canv_obj.forEach(function(object) 
			{
				if (object.id 	== 0)
				{
					createdWidth	= object.createdWidth;					
				}
			});

			$("#canvas_area").width((createdWidth - currentWidth) / 2 + currentWidth);
			$("#canvas_area").css("left", (currentWidth - createdWidth) / 2 + "px");
			main.resWidth 		= $("#canvas_area").position().left;
		}

		main.canv_width 	= $("#canvas_area").width();
		main.canv_height 	= $("#canvas_area").height();
		
		main.canvas.setWidth (main.canv_width);
		main.canvas.setHeight(main.canv_height);
		// main.canvas.setZoom(0.6);

		main.setWorkspace();
	}
	
	main.setWorkspace	 	= function()
	{
		if (main.canvas.backgroundImage)
		{
			var backgroundImage 	= main.canvas.backgroundImage;
			var originLeft			= backgroundImage.left;

	    	backgroundImage.scaleToHeight(main.canv_height);
	    	backgroundImage.left	= (main.canv_width - backgroundImage.width * backgroundImage.scaleX) / 2;

			if (main.face_mask /*&& main.canvas.isDrawingMode*/)
			{
	    		main.face_mask.left	= (main.canv_width - main.face_mask.width * backgroundImage.scaleX) / 2;		    	
		    	main.face_mask.scale(backgroundImage.scaleX);
			}

	    	main.canvas.renderAll();	    	
		}		
	}

	main.canvas_size 		= function()
	{
		$("#canvas").css('width',  main.canv_width  + "px");
		$("#canvas").css('height', main.canv_height + "px");
	}

	main.initBackground		= function()
	{
		if ($("#points").val() == "")
		{
		    fabric.Image.fromURL($("#canvas").attr("src"), function(img)
		    {
		    	// img.scaleToHeight(main.canvas.getHeight());
	    		// var image_width = main.canvas.getHeight() / img.height * img.width;
	    		// img.left		= (main.canv_width - image_width) / 2;
		    	
		    	// img.evented 	= false;
				img.toObject 		= (function(toObject) 
				{
					return function() 
					{
					  	return fabric.util.object.extend(toObject.call(this), 
					    {
					    	id 				: this.id,
					    	createdWidth 	: this.createdWidth,
					    	hasControls 	: this.hasControls,
					    	hasBorders 		: this.hasBorders,
					    	lockMovementX 	: this.lockMovementX,
					    	lockMovementY 	: this.lockMovementY,
					    	selectable		: this.selectable
					    });
					};
				})(img.toObject);

				img.hasControls 	= img.hasBorders = false;
		    	img.selectable 		= false;

				img.createdWidth	= $("#canvas_area").width();
				img.id 				= 0;

		    	main.bgImage 		= img;
		    	// main.canvas.backgroundImage = img;
		    	main.canvas.add(img);
		    	main.canvas.centerObject(img);
		      	main.canvas.renderAll();

		      	main.facePattern();
		    });
		}
		else
		{
			// main.canvas.loadFromJSON($("#points").val(), main.canvas.renderAll.bind(main.canvas));
			// main.canvas.loadFromJSON($("#points").val(), main.renderCanvas());
			var backgroundImageCount 	= 0;
			var index 					= 0;
			main.canvas.loadFromJSON($("#points").val(), main.canvas.renderAll.bind(main.canvas), function(o, object) 
			{
				if (object.id == 0)
				{
					backgroundImageCount ++;
					main.facePattern();	
				}				

				if (backgroundImageCount > 1)
				{
					// main.canvas.remove(object);
					main.canvas.moveTo(object,0);
					main.canvas.renderAll();
				}

				if (object.type == 'path' && object.height < $("#edit_canvas_buttons").height())
				{
					var pathObj 	= object;
					main.canvas.remove(object);
					pathObj.height 	= Math.max(pathObj.height, $("#edit_canvas_buttons").height());
					main.canvas.add(pathObj);
					main.canvas.moveTo(pathObj,index);
					main.canvas.renderAll();		
				}

				index ++;
			});
		}
	}

	main.initWorkspaceInfo		= function()
	{
		if ($("#created").val() == true)
		{
			main.initSignModal();
		}

        setTimeout(function()
        {
			if ($("#mode").val())
			{
				pare_obj.selectRightSidebarItem($("#mode").val());	
			}
        }, 500);
	}

	main.changeBackground 	= function()
	{
		var canv_obj 		= main.canvas.getObjects();
		// console.log(canv_obj);
		canv_obj.forEach(function(object) 
		{
			// console.log(object.type);
			if (object.id 	== 0)
			{
				main.canvas.remove(object);
			}
		});

	    fabric.Image.fromURL($("#canvas").attr("src"), function(img)
	    {
			img.toObject 		= (function(toObject) 
			{
				return function() 
				{
				  	return fabric.util.object.extend(toObject.call(this), 
				    {
				    	id 				: this.id,
				    	createdWidth 	: this.createdWidth,
				    	hasControls 	: this.hasControls,
				    	hasBorders 		: this.hasBorders,
				    	lockMovementX 	: this.lockMovementX,
				    	lockMovementY 	: this.lockMovementY,
				    	selectable		: this.selectable
				    });
				};
			})(img.toObject);

			img.hasControls 	= img.hasBorders = false;
			// img.lockMovementX 	= true;
	  //   	img.lockMovementY 	= true;
	    	img.selectable 		= false;

			img.createdWidth	= $("#canvas_area").width();
			img.id 				= 0;
		    main.bgImage 		= img;    	

	    	// main.canvas.backgroundImage = img;
	    	main.canvas.add(img);
	    	main.canvas.centerObject(img);
	    	main.canvas.moveTo(img,0);
	      	// main.canvas.renderAll();
	      	pare_obj.setMaskView();
	      	// var json 			= main.canvas.toJSON(['selectable','lockMovementX', 'lockMovementY', 'hasControls', 'hasBorders', 'id', 'description', 'category', 'sub_category', 'title', 'sub_title', 'patternColor', 'myCustomOptionKeepStrokeWidth', 'mode', 'createdWidth', 'height']);
	      	// main.save_canvas();
	    });
	}

	main.renderCanvas		= function()
	{
		main.canvas.renderAll();

        main.facePattern();
  
        setTimeout(function()
        {
			var canv_obj 	= main.canvas.getObjects();
			var index 		= 0;

			// console.log(canv_obj);
			canv_obj.forEach(function(object) 
			{
				// console.log(object.type);
				// if (object.id == 1)
				// {
				// 	main.canvas.remove(object);
				// 	main.facePattern();
				// }

				if (object.type == 'path' && object.height < $("#edit_canvas_buttons").height())
				{
					var pathObj 	= object;
					main.canvas.remove(object);
					pathObj.height 	= Math.max(pathObj.height, $("#edit_canvas_buttons").height());
					main.canvas.add(pathObj);
					main.canvas.moveTo(pathObj,index);
					main.canvas.renderAll();			
				}
				index ++;
			});
			main.canvas.renderAll();
        }, 500);
 		
	}
    
    main.mobileAndTabletcheck      = function()
    {
        // return navigator.userAgent.match(/iPad/i) != null;
        var check = false;
  		(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  		return check;
    }

	main.renderSummaryCanvas		= function()
	{
		if ($("#summary_client_gender").html() == "0")
		{
			$("#summary_client_gender").html("weiblich");
		}
		else
		{
			$("#summary_client_gender").html("männlich");
		}
		$("#summary_client_gender").css("display", "block");

		main.summary_canvas.renderAll();

	    setTimeout(function()
        {
        	var canv_obj 		= main.summary_canvas.getObjects();
			var summary_width 	= $("#project_summary_area").width();
			var index 			= 0;

			var project_summary_area 	= $("#project_summary_area");
			var summary_content_area 	= $("#summary_content_area");
			var content_header			= '<div class="row header"><div class="column">Konfiguration</div></div>';
			$(summary_content_area).append(content_header);

			canv_obj.forEach(function(object)
			{
				console.log(canv_obj);
				if (object.id != 0 && object.id != 1)
				{
					index ++;
					var pointer 		= object.getPointByOrigin("right", "center");
					var left 			= pointer.x + (100 - summary_width / 4) - 15;
					var top 			= pointer.y  + 60 - 15;				
					
					var order_label		= 	'<span class="summary_order_label" style="left:' + 
											left +
											'px; top:' + 
											top + 
											'px;">' +
											index +
                        					'</span>';
					$(project_summary_area).append(order_label);

					var content 		=	'<div class="row title"><div class="one wide column"><div class="order_label">' + 
											index +
											'</div></div><div class="fifteen wide column"><span class="content_header">' +
											object.description + 
											'</span></div></div>';
					if (object.sub_category)
					{
						content 		+=	'<div class="row content icon"><div class="fifteen wide column"><img src = "/img/' +
											object.sub_category + 
											'.svg"/></div></div><div class="row content description"><div class="fifteen wide column"><span class="main">' + 
											object.title + 
											'</span>';
						if (object.sub_title)
						{
							content 	+= 	'<span class="sub"> (' +
											object.sub_title +
											')</span>';
						}

						content 		+= 	'</div></div>';
					}
					content 			+= '<div class="ui section divider"></div>';

					$(summary_content_area).append(content);

	                // console.log(order_label);
					object.selectable	= 
					object.hasControls  = 
					object.hasBorders 	= false;
				}
			});

			main.summary_canvas.renderAll();
		}, 500);
	}

	main.facePattern 		= function()
	{
		var forehead_image		= null;
		var righteye_image		= null;
		var lefteye_image		= null;
		var nose_image			= null;
		var rightcheek_image	= null;
		var leftcheek_image		= null;
		var mouth_image			= null;
		var chin_image			= null;

		var zoneOpacity			= 0.0;

	    fabric.Image.fromURL('/img/mask_face.svg', function(img)
	    {
			img.set(
			{
				left 	: 0,
				top 	: 0,
				opacity	: 0.0
			});
	    	
	      	main.mask_image  = img;

		    fabric.Image.fromURL('/img/mask_forehead.svg', function(img)
		    {
				img.set(
				{
					left 	: 20,
					top 	: 28,
					opacity	: zoneOpacity
				});

		    	forehead_image  = img;

			    fabric.Image.fromURL('/img/mask_righteye.svg', function(img)
			    {
					img.set(
					{
						left 	: 19,
						top 	: 225,
						opacity	: zoneOpacity
					});

					righteye_image  = img;

				    fabric.Image.fromURL('/img/mask_lefteye.svg', function(img)
				    {
						img.set(
						{
							left 	: 181,
							top 	: 225,
							opacity	: zoneOpacity
						});

						lefteye_image  = img;

					    fabric.Image.fromURL('/img/mask_nose.svg', function(img)
					    {
							img.set(
							{
								left 	: 132,
								top 	: 232,
								opacity	: zoneOpacity
							});

							nose_image  = img;

						    fabric.Image.fromURL('/img/mask_rightcheek.svg', function(img)
						    {
								img.set(
								{
									left 	: 20,
									top 	: 301,
									opacity	: zoneOpacity
								});

								rightcheek_image  = img;

							    fabric.Image.fromURL('/img/mask_leftcheek.svg', function(img)
							    {
									img.set(
									{
										left 	: 200,
										top 	: 301,
										opacity	: zoneOpacity
									});

									leftcheek_image  = img;

								    fabric.Image.fromURL('/img/mask_mouth.svg', function(img)
								    {
										img.set(
										{
											left 	: 96,
											top 	: 385,
											opacity	: zoneOpacity
										});

										mouth_image  = img;

									    fabric.Image.fromURL('/img/mask_chin.svg', function(img)
									    {
											img.set(
											{
												left 	: 85,
												top 	: 445,
												opacity	: zoneOpacity
											});

									    	chin_image  		= img;
											main.face_mask 		= new fabric.Group([ main.mask_image, 
																				forehead_image, 
																				righteye_image, 
																				lefteye_image, 
																				nose_image, 
																				rightcheek_image, 
																				leftcheek_image, 
																				mouth_image, 
																				chin_image ], 
											{
												left 	: (main.canv_width  - main.mask_image.width - main.resWidth)  / 2,
												top 	: 20,
												opacity	: 1.0
											});

											main.face_mask.hasControls 	= main.face_mask.hasBorders = false;
											main.face_mask.selectable 	= false;
											// main.face_mask.evented 		= false;
											main.face_mask.id 			= 1;
											main.canvas.add(main.face_mask);
											main.canvas.moveTo(main.face_mask,1);

	      									main.canvas.renderAll();
											main.face_mask.on('mousedown', function(e)
											{
											    var innerTarget  	= main._searchPossibleTargets(e.e);
											});
										});
								    });
							    });
							});
						});
					});
	    		});
	    	});    	
	    });
	}
	
	main._searchPossibleTargets = function(e)
	{
	    main.clickedPointer		= main.canvas.getPointer(e, true);

	    var i 					= 8;//main.face_mask._objects.length;
	    var localPointer 		= main.face_mask.toLocalPoint(main.clickedPointer	, "center", "center");
		
	    while (i--)
	    {
	        if (main.face_mask._objects[i].containsPoint(localPointer))
	        {
	            switch(main.mode)
		        {
		            case 1:
		            	main.addPoint();
		                main.showInitZoneModal(i);
		            break;
		            case 2:
			            switch(main.sub_mode)
				        {
				            case 1:
				            	main.canvas.isDrawingMode	= false;
				            	main.addContour1();
				            break;
				            case 2:
				            	main.canvas.isDrawingMode	= false;
				            	main.addContour2();
				            break;
				            case 3:
				            	main.canvas.isDrawingMode	= false;
				            	main.addShape1();
				            break;
				            case 4:
				            	main.canvas.isDrawingMode	= false;
				            	main.addShape2();
				            break;
				            case 5:
				            	main.canvas.isDrawingMode	= true;
				            break;				            
				         }	                
		            break;		            
		            case 3:
		            	if (main.clickedIndex != -1)
		            	{
		            		main.showDefinedZone(main.clickedIndex);	
		            	}
		                
		            break;
		        }

	            return main.face_mask._objects[i];
	        }
	    }
	    return null;
	}

	main.save_canvas		= function()
	{
		var canv_obj 		= main.canvas.getObjects();
		// console.log(canv_obj);
		canv_obj.forEach(function(object) 
		{
			// console.log(object.type);
			if (object.id == 1)
			{
				main.canvas.remove(object);
			}
		});

		var json 			= main.canvas.toJSON(['selectable','lockMovementX', 'lockMovementY', 'hasControls', 'hasBorders', 'id', 'description', 'category', 'sub_category', 'title', 'sub_title', 'patternColor', 'myCustomOptionKeepStrokeWidth', 'mode', 'createdWidth', 'height']);

        $("#points").val(JSON.stringify(json));
        $("#points_count").val(canv_obj.length - 1);
        $("#emotions_shown").val(JSON.stringify(pare_obj.bottomBars[0].showns));

        main.saveConfigurationImage();
	}

    main.saveConfigurationImage	    = function()
    {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/user/index/configurationphoto');

		$.ajax(
		{
		  type: "POST",
		  url: "/user/index/configurationphoto",
		  data:
		  { 
		     imgBase64: main.canvas.toDataURL('png')
		  }
		}).done(function(o) 
		{
			$("#photourl").val(o);
			$("#update_points").submit();
		});
    }

    main.saveSignatureImage	    	= function()
    {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/user/index/signatureimage');

		$.ajax(
		{
		  type: "POST",
		  url: "/user/index/signatureimage",
		  data:
		  { 
		     imgBase64: main.sign_canvas.toDataURL('png')
		  }
		}).done(function(o)
		{
			$("#signature").val(o);
			$("#do_sign").submit();			
		});
    }

	main.showInitEditModal	= function()
	{
		if (!(main.hoverObject.get('type') 	== "path"	||
			  main.hoverObject.get('type') 	== "circle"	||
			  main.hoverObject.get('type') 	== "polygon"))
		{
			if (main.hoverObject.getSrc().indexOf("zone_point") > 0)
			{
				$("#zone_select_area input").val(main.hoverObject.description);

				for (i = 0; i < zoneList.length; i++) 
				{
					if (zoneList[i].category == main.hoverObject.category)
					{							
						main.main_zone_index = i;

						for (j = 0; j < zoneList[i].sub_category.length; j++) 
						{
							if (zoneList[i].sub_category[j].image == main.hoverObject.sub_category)
							{
								main.sub_zone_index = j;
							}
						}								
					}    						
				}

				main.showZoneModal();
			}
			else
			{
				$("#draw_comment_area textarea").val(main.hoverObject.description);
    			$("#draw_comment_area #save_point_button").css("background-color", "rgb(245, 175, 98)");
        		$('#draw_comment_area').modal('setting', 'closable', false).modal('show');
			}
		}
		else
		{
			$("#draw_comment_area textarea").val(main.hoverObject.description);
        	$("#draw_comment_area #save_point_button").css("background-color", "rgb(131, 214, 164)");
            $('#draw_comment_area').modal('setting', 'closable', false).modal('show');
		}
	}

	main.showInitZoneModal	= function(index)
	{
		main.initZoneModal();

		setTimeout(function() 
		{
			var i = 0;
        	switch(index)
	        {     	
	            case 2:
	            case 3:
	                i = 1;
	            break;
	            case 1:
	                i = 3;
	            break;
	            case 4:
	                i = 2;
	            break;
	            case 7:
	                i = 4;
	            break;
	            default:
	            	i = 1;
	            break;          
	        }

        	var preSelectedZone		= "#btn_zone_select_group div:nth-child(" + i + ")";
        	main.main_zone_index 	= i - 1;

        	main.selectBtnZone(preSelectedZone);

		}, 500);

		$("#zone_select_area input").val("");
		$('#zone_select_area').modal('setting', 'closable', false).modal('show');		
	}

	main.showZoneModal 		= function()
	{
		var preSelectedZone		= "#btn_zone_select_group div:nth-child(" + (main.main_zone_index + 1) + ")";
		var preSelectedWish		= "#wish_list_section .card:nth-child(" + (main.sub_zone_index + 1) + ")";

		main.initZoneModal();
		main.initBtnZoneGroup();
        main.initWishList();

		main.selectBtnZone(preSelectedZone);
		main.selectWishCard(preSelectedWish);

		$('#zone_select_area').modal('setting', 'closable', false).modal('show');	
	}

	main.mouseover			= function(e)
	{
		// e.target.setFill('red');
		var hoverObject		= e.target;
		var pointer 		= hoverObject.getPointByOrigin("center", "bottom");

		if (e.target.get('id') == 0 || e.target.get('id') == 1)
		{
			if (!main.canvas.isDrawingMode && main.mode == 2 && main.sub_mode == 5)
			{
				main.canvas.isDrawingMode	= true;
			}
					
			if (main.hoverObject)
			{
		    	if ($("#edit_canvas_buttons").css("display") == "block")
		    	{
		    		$("#edit_canvas_buttons").css("display", "none");
		    	}
	    	}	
			return;
		}

		if (e.target.get('type') == "image"||
			e.target.get('type') == "path"	||
			e.target.get('type') == "circle"||
			e.target.get('type') == "polygon")
		{
			$("#edit_canvas_buttons").css("left", pointer.x - 30 + main.resWidth);
			$("#edit_canvas_buttons").css("top", pointer.y + 50);
			$("#edit_canvas_buttons").css("display", "block");
			$("#edit_canvas_buttons #edit_object_button").css("background-color", hoverObject.patternColor);
			
			// if (hoverObject.get('mode') != main.mode)
			// {
			// 	hoverObject.selectable 	=
			// 	hoverObject.hasControls =
			// 	hoverObject.hasBorders 	= false;
			// }
			// else
			// {
			// 	hoverObject.selectable 	= true;
			// }
			if (main.canvas.isDrawingMode && main.mode == 2 && main.sub_mode == 5)
			{
				main.canvas.isDrawingMode	= false;
			}
			main.hoverObject	= hoverObject;
		}
		else
		{
			if (main.hoverObject)
			{
		    	if ($("#edit_canvas_buttons").css("display") == "block")
		    	{
		    		$("#edit_canvas_buttons").css("display", "none");
		    	}
	    	}
		}

    	main.canvas.renderAll();
	}

	main.mouseout			= function(e)
	{
		// e.target.setFill('green');
		var mousePointer	= main.canvas.getPointer(e.e, true);
		var	externalPointer	= new fabric.Point(mousePointer.x, mousePointer.y - 60);

		if (main.hoverObject)
		{
			if (main.hoverObject.containsPoint(mousePointer) ||
				main.hoverObject.containsPoint(externalPointer))
			{
				return;
			}
		}

		if (!main.canvas.isDrawingMode && main.mode == 2 && main.sub_mode == 5)
		{
			main.canvas.isDrawingMode	= true;
		}

    	if ($("#edit_canvas_buttons").css("display") == "block")
    	{
    		$("#edit_canvas_buttons").css("display", "none");
    	}

    	main.canvas.renderAll();
	}
	
	main.mousedown			= function(e)
	{
		var mousePointer	= main.canvas.getPointer(e.e, true);

		main.clickedPointer = mousePointer;
		main.prev_pointer	= mousePointer;

		if (main.hoverObject)
		{
			if (main.hoverObject.containsPoint(mousePointer))
			{
				return;
			}			
		}

    	if ($("#edit_canvas_buttons").css("display") == "block")
    	{
    		$("#edit_canvas_buttons").css("display", "none");
    	}

		if (main.isMoving)
		{
			main.isMoving					= 
			// main.hoverObject.selectable		= 
			main.hoverObject.hasControls 	= 
			main.hoverObject.hasBorders 	= false;

			if (main.hoverObject.get('type') 	== "path")
			{
				main.canvas.isDrawingMode	= true;
			}
		}    	

    	main.canvas.renderAll();
	}

	main.objectmoving		= function(e)
	{
		var mousePointer	= main.canvas.getPointer(e.e, true);

		var hoverObject		= e.target;
		if (hoverObject.get('id') == 0)
		{
			return;
		}

		if (hoverObject.get('id') == 1 && hoverObject.selectable == true)
		{
			hoverObject.left 	= hoverObject.left - (mousePointer.x - main.clickedPointer.x);
			hoverObject.top 	= hoverObject.top  - (mousePointer.y - main.clickedPointer.y);

			main.bgImage.left 	= main.bgImage.left + (mousePointer.x - main.prev_pointer.x);
			main.bgImage.top 	= main.bgImage.top  + (mousePointer.y - main.prev_pointer.y);

			main.prev_pointer 	= mousePointer;
			return;
		}

		var pointer 		= hoverObject.getPointByOrigin("center", "bottom");

		if (e.target.get('type') == "image" || 
			e.target.get('type') == "path"	||
			e.target.get('type') == "circle"||
			e.target.get('type') == "polygon")
		{
			$("#edit_canvas_buttons").css("left", pointer.x - 30 + main.resWidth);
			$("#edit_canvas_buttons").css("top", pointer.y + 50);
			$("#edit_canvas_buttons").css("display", "block");

			main.hoverObject	= hoverObject;
		}			

    	main.canvas.renderAll();
	}

	main.objectscaling		= function(e)
	{
        var obj 			= e.target;

        if(obj.myCustomOptionKeepStrokeWidth)
        {
        	console.log(obj.strokeWidth);
            var newStrokeWidth 	= obj.myCustomOptionKeepStrokeWidth  / ((obj.scaleX + obj.scaleY) / 2);
            var newDash1 		= (obj.myCustomOptionKeepStrokeWidth + 1) / ((obj.scaleX + obj.scaleY) / 2);
            var newDash2 		= (obj.myCustomOptionKeepStrokeWidth + 2) / ((obj.scaleX + obj.scaleY) / 2);            

            obj.set('strokeWidth', newStrokeWidth);
            obj.set('strokeDashArray', [newDash1, newDash2]);
        }		

    	main.canvas.renderAll();
	}

	main.showInitDrawModal	= function(styleColor)
	{
    	$("#draw_comment_area textarea").val("");
    	$("#draw_comment_area #save_point_button").css("background-color", styleColor);
        $('#draw_comment_area').modal('setting', 'closable', false).modal('show');
	}

	main.addPoint			= function()
	{
	    fabric.Image.fromURL('/img/zone_point.svg', function(img)
	    {			
			// img.selectable		= false;
			main.hoverObject	= img;

			img.setPositionByOrigin(main.clickedPointer, "center", "center");

			img.toObject 		= (function(toObject) 
			{
				return function() 
				{
				  	return fabric.util.object.extend(toObject.call(this), 
				    {
				    	description : this.description,
				    	category 	: this.category,
				    	sub_category: this.sub_category,
				    	title 		: this.title,
				    	sub_title 	: this.sub_title,
				    	patternColor: this.patternColor,
				    	mode 		: this.mode,
				    	hasControls : this.hasControls,
				    	hasBorders	: this.hasBorders
				    });
				};
			})(img.toObject);

			img.hasControls 	= 
			img.hasBorders 		= false;

			img.patternColor	= "rgb(43, 176, 212)";
			img.mode 			= 1;
			main.canvas.add(img);
			main.canvas.renderAll();			
		});
	}

	main.showDefinedShape	= function()
	{

	}

	main.drawnObjectCreated	= function(e)
	{
        var drawnObject 	= e.path;
        main.canvas.remove(drawnObject);

		drawnObject.toObject = (function(toObject)
		{
			return function()
			{
			  	return fabric.util.object.extend(toObject.call(this),
			    {
			    	description : this.description,
			    	patternColor: this.patternColor,
			    	myCustomOptionKeepStrokeWidth	: this.myCustomOptionKeepStrokeWidth,
			    	mode 		: this.mode
			    });
			};
		})(drawnObject.toObject);

		drawnObject.patternColor					= "rgb(131, 215, 164)";
		drawnObject.mode 							= 2;
		drawnObject.myCustomOptionKeepStrokeWidth	= 1.6;

		drawnObject.width 							= Math.max(drawnObject.width,  $("#edit_canvas_buttons").width());
		drawnObject.height 							= Math.max(drawnObject.height, $("#edit_canvas_buttons").height());

        main.hoverObject							= drawnObject;		

        switch(main.mode)
        {     	
            case 2:
            	main.showInitDrawModal("rgb(131, 214, 164)");
            break;
        }

		main.canvas.add(drawnObject);
        main.canvas.renderAll();
	}

	main.addDefinedShape	= function(obj)
	{
		obj.patternColor					= "rgb(131, 215, 164)";
		obj.mode 							= 2;
		obj.myCustomOptionKeepStrokeWidth	= 1.6;

		obj.width 							= Math.max(obj.width,  $("#edit_canvas_buttons").width());
		obj.height 							= Math.max(obj.height, 50);
		obj.originX 						= "center";
		obj.originY 						= "center";

		obj.setPositionByOrigin(main.clickedPointer, "center", "center");

		main.hoverObject 					= obj;

		main.canvas.add(obj);
		main.canvas.renderAll();

		main.showInitDrawModal("rgb(131, 215, 164)");		
	}

	main.addContour1		= function()
	{		
		var contour1 		= new fabric.Path("M4,7.58007813 C4,7.58007813 24.7426758,25.6437988 51.7543945,6.03442383", 
		{
            stroke 			: "#83D7A4",
            strokeWidth 	: 1.6,
            strokeLineCap	: "round",
            strokeLineJoin  : "round",
            strokeDashArray	: [3, 4],
            fill 			: "rgba(255, 255, 255, 0)" 
		});

		contour1.toObject 	= (function(toObject) 
		{
			return function() 
			{
			  	return fabric.util.object.extend(toObject.call(this), 
			    {
			    	description : this.description,
			    	patternColor: this.patternColor,
			    	myCustomOptionKeepStrokeWidth	: this.myCustomOptionKeepStrokeWidth,
			    	mode 		: this.mode
			    });
			};
		})(contour1.toObject);

		main.addDefinedShape(contour1);
	}

	main.addContour2		= function()
	{
		var contour2 		= new fabric.Path("M4.18400092,3.03442383 L51.7543945,3.03442383", 
		{
            stroke 			: "#83D7A4",
            strokeWidth 	: 1.6,
            strokeLineCap	: "round",
            strokeLineJoin  : "round",
            strokeDashArray	: [3, 4],
            fill 			: "rgba(255, 255, 255, 0)" 
		});

		contour2.toObject 	= (function(toObject) 
		{
			return function() 
			{
			  	return fabric.util.object.extend(toObject.call(this), 
			    {
			    	description : this.description,
			    	patternColor: this.patternColor,
			    	height 		: this.height,
			    	myCustomOptionKeepStrokeWidth	: this.myCustomOptionKeepStrokeWidth,
			    	mode 		: this.mode
			    });
			};
		})(contour2.toObject);

		main.addDefinedShape(contour2);
	}

	main.addShape1			= function()
	{
	  	var shape1 			= new fabric.Circle(
	  	{
		    radius			: 15.5,
		    strokeWidth 	: 1.6,
		    stroke 			: "#83D7A4",
		    selectable		: true,
		    strokeDashArray	: [3, 4],
		    fill 			: "rgba(255, 255, 255, 0)"
	  	});

		shape1.toObject 	= (function(toObject)
		{
			return function() 
			{
			  	return fabric.util.object.extend(toObject.call(this), 
			    {
			    	description : this.description,
			    	patternColor: this.patternColor,
			    	height 		: this.height,
			    	myCustomOptionKeepStrokeWidth	: this.myCustomOptionKeepStrokeWidth,
			    	mode 		: this.mode
			    });
			};
		})(shape1.toObject);

		main.addDefinedShape(shape1);
	}

	main.addShape2			= function()
	{
	  	var startPoints 	= 
	  	[
		    {x: 20.5, y: 0},
		    {x: 37, y: 29},
		    {x: 4, y: 29}
	  	];

	  	var shape2 			= new fabric.Polygon(startPoints, 
	  	{
            stroke 			: "#83D7A4",
            strokeWidth 	: 1.6,
            strokeLineCap	: "round",
            strokeLineJoin  : "round",
            strokeDashArray	: [3, 4],
            fill 			: "rgba(255, 255, 255, 0)" 
	  	});

		shape2.toObject 	= (function(toObject)
		{
			return function() 
			{
			  	return fabric.util.object.extend(toObject.call(this), 
			    {
			    	description : this.description,
			    	patternColor: this.patternColor,
			    	height 		: this.height,
			    	myCustomOptionKeepStrokeWidth	: this.myCustomOptionKeepStrokeWidth,
			    	mode 		: this.mode
			    });
			};
		})(shape2.toObject);

		main.addDefinedShape(shape2);
	}

	main.showDefinedZone	= function(index)
	{
		var image       	= "/img/defined_" + pare_obj.bottomBars[3].images[index] + ".svg";
	    fabric.Image.fromURL(image, function(img)
	    {
	    	var face_mask_point	= main.face_mask.getPointByOrigin("left", "top");
            var left 			= face_mask_point.x + 10;
            var top 			= face_mask_point.y + 10;

            switch(index)
            {
                case 0: //right eye
                    left 		= face_mask_point.x + 43;
                    top 		= face_mask_point.y + 248;
                break;            	
                case 1: //nose
                    left 		= face_mask_point.x + 122;
                    top 		= face_mask_point.y + 245;
                break;
                case 2: //cheek
                    left 		= face_mask_point.x + 25;
                    top 		= face_mask_point.y + 272;
                break;
                case 3: //forehead
                    left 		= face_mask_point.x + 55;
                    top 		= face_mask_point.y + 130;
                break;
                case 4: //mouth
                    left 		= face_mask_point.x + 102;
                    top 		= face_mask_point.y + 405;
                break;
                case 5: //chin
                    left 		= face_mask_point.x + 122;
                    top 		= face_mask_point.y + 460;
                break;
                case 6: //neck
                    left 		= face_mask_point.x + 95;
                    top 		= face_mask_point.y + 520;
                break;
                case 7: //teeth
                    left 		= face_mask_point.x + 92;
                    top 		= face_mask_point.y + 405;
                break;
                case 8: //hair
                    left 		= face_mask_point.x;
                    top 		= face_mask_point.y;
                break;
            }

			img.set(
			{
				left 	: left,
				top 	: top
			});

			// img.hasControls 	= 
			// img.hasBorders 		= false;
			main.hoverObject	= img;
			// img.setPositionByOrigin(main.localPointer, "center", "center");
			
			img.toObject 		= (function(toObject)
			{
				return function() 
				{
				  	return fabric.util.object.extend(toObject.call(this), 
				    {
				    	description : this.description,
				    	patternColor: this.patternColor,
				    	sub_category: this.sub_category,
				    	title 		: this.title,
				    	mode 		: this.mode
				    });
				};
			})(img.toObject);

			img.patternColor	= "rgb(245, 175, 98)";
			img.sub_category 	= "zones_" + pare_obj.bottomBars[3].images[index];
			img.title 			= pare_obj.bottomBars[3].labels[index];
			img.mode 			= 3;
			main.canvas.add(img);			
			main.canvas.renderAll();

			main.showInitDrawModal("rgb(245, 175, 98)");	
		});
	}

	main.showMask			= function()
	{
		main.mode 					= 0;
		main.canvas.isDrawingMode	= false;
		main.mask_image.opacity		= 1.0;
		main.bgImage.selectable		= true;
		main.face_mask.selectable 	= true;
		main.canvas.renderAll();
	}

	main.zoominMask			= function()
	{
		var scale 			= main.bgImage.getScaleY();
		scale 				= Math.min(2, scale + 0.05);
		main.bgImage.scale(scale);
		main.canvas.renderAll();
	}

	main.zoomoutMask		= function()
	{
		var scale 			= main.bgImage.getScaleY();
		scale 				= Math.max(0.2, scale - 0.05);
		main.bgImage.scale(scale);
		main.canvas.renderAll();
	}

	main.saveMaskPosition	= function()
	{
		main.canvas.isDrawingMode	= false;
		main.bgImage.selectable		= false;
		main.mask_image.opacity 	= 0.0;
		main.face_mask.selectable 	= false;

		main.canvas.renderAll();
	}

	main.selectPointMode	= function()
	{
		main.mode 					= 1;
		main.canvas.isDrawingMode	= false;
		// main.face_mask.selectable	= false;
	}

	main.drawLineMode		= function()
	{
		main.mode 					= 2;
		main.canvas.isDrawingMode	= false;
		main.canvas.freeDrawingBrush.strokeDashArray 	= [3, 4];
		main.canvas.freeDrawingBrush.color 				= "rgb(79, 203, 128)";
		main.canvas.freeDrawingBrush.width 				= 1.6;
		// main.canvas.freeDrawingBrush.selectable			= false;
	}

	main.selectZoneMode		= function()
	{
		main.mode 					= 3;		
		main.canvas.isDrawingMode	= false;
		// main.face_mask.selectable	= false;
	}

	main.emotionMode		= function()
	{
		main.mode 					= 4;		
		main.canvas.isDrawingMode	= false;
		// main.face_mask.selectable	= false;
	}

	main.loadZoneModal 		= function()
	{

	}
	main.initZoneModal		= function()
	{
        var patternColor			= "rgb(43, 176, 212)";
        pare_obj.patternColor		= patternColor;

		$('#zone_select_area img').each(function()
        {
            pare_obj.loadSVG(this);
        });

        $("#btn_zone_select_group div").each(function()
        {
	        $(this).click(function()
	        {
	            main.main_zone_index	= $(this).index() * 1;

	            main.initBtnZoneGroup();
	            main.selectBtnZone(this);
	        });
        });

        $("#wish_list_section .card").each(function()
        {
        	$(this).click(function()
	        {
	            main.sub_zone_index    	= $(this).index() * 1;

	            main.initWishList();
	            main.selectWishCard(this);
	        });
        });
	}

    main.initBtnZoneGroup  	= function()
    {
        $("#btn_zone_select_group div").css("background-color", pare_obj.whiteColor);
        $("#btn_zone_select_group div").css("color", "rgba(32, 40, 51, 0.4)");
		
		if($("#btn_zone_select_group div").hasClass("no_border"))
		{
			$("#btn_zone_select_group div").removeClass("no_border");
			$("#btn_zone_select_group div").addClass("border_btn_zone_select");
		}		

        $("#btn_zone_select_group div").each(function()
        {
           $(this).find("g").each(function()
            {
                pare_obj.revertSVGColor(this);
            });

           $(this).find("path").each(function()
            {
                pare_obj.revertSVGColor(this);
            });                
        });
    }

    main.selectBtnZone		= function(tagObj)
    {
        $(tagObj).css("background-color", pare_obj.patternColor);
        $(tagObj).css("color", "white");
		// $(this).css({"border" : "0px !important"});

		if($(tagObj).hasClass("border_btn_zone_select"))
		{
			$(tagObj).removeClass("border_btn_zone_select");
			$(tagObj).addClass("no_border");
		}
        
        $(tagObj).find("g").each(function()
        {
            pare_obj.convertBtnSVGColor(this);
        });

        $(tagObj).find("path").each(function()
        {
            pare_obj.convertBtnSVGColor(this);
        });    	
    }

    main.selectWishCard		= function(tagObj)
    {
        $(tagObj).css("background-color", pare_obj.patternColor);
        $(tagObj).find(".header").css("color", "white");
        $(tagObj).find("span").css("color", "white");
		// $(this).css({"border" : "0px !important"});

		if($(tagObj).hasClass("border_wish_card"))
		{
			$(tagObj).removeClass("border_wish_card");
			$(tagObj).addClass("no_border");
		}
        
        $(tagObj).find("g").each(function()
        {
            pare_obj.convertBtnSVGColor(this);
        });

        $(tagObj).find("path").each(function()
        {
            pare_obj.convertBtnSVGColor(this);
        });
    }

    main.initWishList  		= function()
    {
        $("#wish_list_section .card").css("background-color", pare_obj.whiteColor);
        $("#wish_list_section .card").find(".header").css("color", "rgba(32, 40, 51, 0.4)");
        $("#wish_list_section .card").find("span").css("color", "rgba(32, 40, 51, 0.4)");
		
		if($("#wish_list_section .card").hasClass("no_border"))
		{
			$("#wish_list_section .card").removeClass("no_border");
			$("#wish_list_section .card").addClass("border_wish_card");
		}		

        $("#wish_list_section .card").each(function()
        {
           $(this).find("g").each(function()
            {
                pare_obj.revertSVGColor(this);
            });

           $(this).find("path").each(function()
            {
                pare_obj.revertSVGColor(this);
            });                
        });
    }

	main.init();
}