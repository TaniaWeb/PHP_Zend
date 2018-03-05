$(document).ready(function()
{
    var main            = new class_main();
    // var draw_tool       = new classDrawingTool("canvas");
})

var class_main                  =   function()
{
    var main                    =   this;
    var draw_tool               =   new classDrawingTool("canvas", main);

    var menu_index              =   0;
    var pattern_colors          =   ["rgb(89, 114, 203)", "rgb(43, 176, 212)", "rgb(131, 215, 164)", "rgb(245, 175, 98)"];
    var pattern_hex_colors      =   ["#5972cb", "#2bb0d4", "#83d7a4", "#f5af62"];    
    
    main.whiteColor             =   "rgb(255, 255, 255)";
    main.whiteHexColor          =   "#ffffff";

    main.patternColor           =   pattern_colors[0];
    main.patternHexColor        =   pattern_hex_colors[0];

    var shownPredefinedZone     =   false;
    main.bottomBars             =   [
                                {
                                    "width"     : "155px",
                                    "height"    : "114px",                                    
                                    "images"    : ["natural_look", "fresh_relaxed", "authentic", "restoration"],
                                    "labels"    : ["Natural Look", "Frische & Erholt", "Authentisch", "Wiederherstellung"],
                                    "showns"    : [false, false, false, false]
                                },    
                                {
                                    "width"     : "0px",
                                    "height"    : "0px",                                    
                                    "images"    : [],
                                    "labels"    : []
                                },
                                {
                                    "width"     : "124px",
                                    "height"    : "85px",                                    
                                    "images"    : ["draw_contour1", "draw_contour2", "draw_form1", "draw_form2", "draw_freehand"],
                                    "labels"    : ["Kontur 1", "Kontur 2", "Form 1", "Form 2", "Freihand"]
                                },
                                {
                                    "width"     : "80.5px",
                                    "height"    : "85px",                                    
                                    "images"    : ["eyes", "nose", "cheek", "forehead", "mouth", "chin", "neck", "teeth", "hair"],
                                    "labels"    : ["Augen", "Nase", "Wange", "Stirn", "Mund & Lippen", "Kinn", "Hals", "Zähne", "Haut & Haare"],
                                    "showns"    : [false, false, false, false, false, false, false, false, false] 
                                }
                            ];

    main.init           = function()
    {
        main.initEvt();
        main.initSVG();
        // main.setMaskView();
    }

    main.initEvt        = function()
    {       
        // $('.ui.dropdown')
        //   .dropdown()
        // ;
        $("#save_account_button").click(function()
        {
            // $("#edit_account_form").submit();
        });  

        $(document).click(function()
        {
            $("#dashboard_menu").animate({"height" : "0px"});
        });

        $("#new_project").click(function()
        {
            $('#edit_layer_area').modal('show');
        });

        $("#edit_layer_area #save_edit_button").click(function()
        {
            main.addClient();
        });

        $("#edit_layer_area #cancel_edit_button").click(function()
        {
            $('.ui.modal').modal('hide');
        });

        $("#edit_layer_area #save_edit_label").click(function()
        {
            main.addClient();
        });

        $("#cancel_edit_label").click(function()
        {
            $('.ui.modal').modal('hide');
        });

        $("#configuration").click(function()
        {
            $('#edit_layer_area').modal('show');
        });
        
        $(".right.menu .item:nth-child(1)").click(function()
        {
             $("#editaccount").submit();
        });

        $("#edit_account_item").click(function()
        {
             $("#editaccount").submit();
        });

        $("#logoutitem").click(function()
        {
             $("#logout").submit();
        });

        $("#go_panel_project").click(function()
        {
             $("#gopanelproject").submit();
        });

        $("#right_btn_area #title").click(function()
        {
            $('#edit_layer_area').modal('show');
            if ($("#gender").val() == 0)
            {
                main.female_select();
            }
            else
            {
                main.male_select();
            }            
        });

        $("#right_btn_area #name").click(function()
        {
            $('#edit_layer_area').modal('show');
            if ($("#gender").val() == 0)
            {
                main.female_select();
            }
            else
            {
                main.male_select();
            }            
        });

        $("#female_button").click(function()
        {
            main.female_select();
        });

        $("#male_button").click(function()
        {
            main.male_select();
        });

        $("#right_sidebar_area .item").click(function()
        {
            var index           = $(this).index() * 1;
            if (index           != 4)
            {
                main.selectRightSidebarItem(index);
            }            
        });

        $("#edit_position_button").click(function()
        {
            main.setMaskView();        
        });

        $("#take_picture_button").click(function()
        {
            main.changeCustomerPhoto();
            // main.setMaskView();
        });
        
        $("#save_mask_button").click(function()
        {
            main.saveMaskView();   
        });

        $("#edit_mask_menu .item").click(function()
        {
            var index           = $(this).index() * 1;
            switch(index)
            {
                case 1:
                    draw_tool.zoominMask();
                break;
                case 2:
                    draw_tool.zoomoutMask();
                break;                
            }
        });    
        
        $("#own_picture_button").click(function()
        {
            main.uploadMemberPhoto();  
        });

        $("#image_list_field .ui.images img").click(function()
        {
            var width           = $(this).width()  / 0.92;
            var height          = $(this).height() / 0.92;
            var left            = width * $(this).index() - width * 0.02 + 'px';

            $("#selected_model_mask").width(width);
            $("#selected_model_mask").height(height);
            $("#selected_model_mask").css("left",  left);

            var index           = $(this).index() * 1;

            $("#image_src").val("/upload/model_" + (index + 1) + ".png");
        });

        $(".right.menu .item:nth-child(2)").click(function(evt)
        {
            $("#dashboard_menu").css("display", "block");
            $("#dashboard_menu").animate({"height" : "208px"}, 500);

            evt.stopPropagation();
        });     
    }

    main.initSVG            = function()
    {
        $('#right_sidebar_area img').each(function()
        {
            main.loadSVG(this);
        });    
    }

    main.addClient          = function()
    {        
        var clientname  = $("#clientname").val();
        var email       = $("#clientemail").val();

        if( !isValidString( clientname ) )
        {
            document.getElementById("clientname").focus();
            document.getElementById("clientname").select();
            return;
        }

        if( !isValidString( email ) )
        {
            document.getElementById("clientemail").focus();
            document.getElementById("clientemail").select();
            return;
        }
        
        $("#edit_client").submit();
    }
    
    main.female_select      = function()
    {
        $("#female_button").css("background-color", "rgb(230, 100, 142)");
        $("#female_button span").css("color", "white");
        $("#female_image").attr("src", "/img/female_selected.svg");

        $("#male_button").css("background-color", "rgb(243, 244, 242)");
        $("#male_button span").css("color", "rgb(168, 190, 196)");
        $("#male_image").attr("src", "/img/male.svg");

        $("#gender").attr("value", "0");        
    }

    main.male_select        = function()
    {
        $("#female_button").css("background-color", "rgb(243, 244, 242)");
        $("#female_button span").css("color", "rgb(168, 190, 196)");
        $("#female_image").attr("src", "/img/female.svg");

        $("#male_button").css("background-color", "rgb(230, 100, 142)");
        $("#male_button span").css("color", "white");
        $("#male_image").attr("src", "/img/male_selected.svg");

        $("#gender").attr("value", "1");        
    }
    
    main.selectRightSidebarItem = function(index)
    {
        menu_index              = index;
        main.patternColor       = pattern_colors[index];
        main.patternHexColor    = pattern_hex_colors[index];

        main.initWorkspace();
        main.initBottomBar();
        main.initRightSideBar();

        var menu_item       = "#right_sidebar_area .item:nth-child(" + (index * 1 + 1) + ")";

        $(menu_item).css("background-color", main.patternColor);
        $(menu_item).find("label").css("color", "white");

        $(menu_item).find("path").each(function()
        {
            main.convertSVGColor(this);
        });

        $("#mode").val(index);
    }
    main.uploadMemberPhoto  = function() 
    {
        var chooser         = document.querySelector('#fileDialog');
        chooser.addEventListener("change", function(evt) 
        {
            var fileInput   = document.querySelector('#fileDialog');

            var xhr         = new XMLHttpRequest();
            xhr.open('POST', '/user/index/memberphoto');

            xhr.upload.onprogress   = function(e) 
            {
                /* 
                * values that indicate the progression
                * e.loaded
                * e.total
                */
            };

            xhr.onload      = function()
            {
                // alert('upload complete');   
            };

            // upload success
            xhr.onreadystatechange  = function() 
            {
              if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
              {
                  // alert(xhr.responseText);
                  // document.getElementById('upload_image').src = xhr.responseText;
                  $("#image_src").val(xhr.responseText);
              }
            }

            var form        = new FormData();
            form.append('photo', fileInput.files[0]);
            xhr.send(form);
            //clear input files
            $('#divfile').html($('#divfile').html());

            var reader      = new FileReader();
            reader.onload = function (e) 
            {
                // console.log(e.target.result);
                // document.getElementById('upload_image').src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }, false);

        chooser.click();
    }

    main.changeCustomerPhoto    = function() 
    {
        var chooser             = document.querySelector('#fileDialog_change');
        chooser.addEventListener("change", function(evt) 
        {
            var fileInput       = document.querySelector('#fileDialog_change');

            var xhr             = new XMLHttpRequest();
            xhr.open('POST', '/user/index/memberphoto');

            xhr.upload.onprogress = function(e) 
            {
            };

            xhr.onload          = function()
            {
                // alert('upload complete');   
            };

            // upload success
            xhr.onreadystatechange = function() 
            {
              if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
              {
                  $("#canvas").attr("src", xhr.responseText);
                  
                  draw_tool.changeBackground();
                  // main.setMaskView();
              }
            }

            var form            = new FormData();
            form.append('photo', fileInput.files[0]);
            xhr.send(form);
            //clear input files
            $('#divfile_change').html($('#divfile_change').html());

            var reader          = new FileReader();
            reader.onload       = function (e) 
            {
                // console.log(e.target.result);
                // document.getElementById('upload_image').src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }, false);

        chooser.click();
    }
    main.setMaskView        = function ()
    {
        $("#right_sidebar_area_mask").css("display", "block");
        $("#take_picture_button").css("display", "none");
        $("#edit_position_button").css("display", "none");
        $("#bottom_bar_area").css("display", "none");
        $("#save_mask_button").css("display", "block");
        $("#clear_mask_button").css("display", "block");
        $("#edit_mask_menu").css("display", "block");

        main.initRightSideBar();

        draw_tool.showMask();
    }

    main.saveMaskView       = function ()
    {
        $("#right_sidebar_area_mask").css("display", "none");        
        $("#take_picture_button").css("display", "block");
        $("#edit_position_button").css("display", "block");         
        // $("#bottom_bar_area").css("display", "flex");
        $("#save_mask_button").css("display", "none");
        $("#clear_mask_button").css("display", "none");
        $("#edit_mask_menu").css("display", "none");        

        draw_tool.saveMaskPosition();
    }

    main.loadSVG            = function(tagObj)
    {
        var $img            = jQuery(tagObj);
        var imgID           = $img.attr('id');
        var imgClass        = $img.attr('class');
        var imgURL          = $img.attr('src');

        jQuery.get(imgURL, function(data) 
        {
            // Get the SVG tag, ignore the rest
            var $svg        = jQuery(data).find('svg');
            // Add replaced image's ID to the new SVG

            if(typeof imgID !== 'undefined')
            {
                $svg        = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined')
            {
                $svg        = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg            = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');
    }

    main.convertSVGColor    = function(tagObj)
    {
        if ($(tagObj).css("stroke") == main.whiteColor)
        {
            $(tagObj).css("stroke", main.patternColor);
            $(tagObj).attr("org_stroke_color", main.whiteColor);
        }
        else if ($(tagObj).css("stroke") == main.patternColor)
        {
            $(tagObj).css("stroke", main.whiteColor);
            $(tagObj).attr("org_stroke_color", main.patternColor);
        }

        if ($(tagObj).css("fill") == main.whiteColor)
        { 
            $(tagObj).css("fill", main.patternColor);
            $(tagObj).attr("org_fill_color", main.whiteColor);
        }
        else if ($(tagObj).css("fill") == main.patternColor)
        {
            $(tagObj).css("fill", main.whiteColor);
            $(tagObj).attr("org_fill_color", main.patternColor);
        }

        if ($(tagObj).css("stroke") == main.whiteHexColor)
        {
            $(tagObj).css("stroke", main.patternHexColor);
            $(tagObj).attr("org_stroke_color", main.whiteHexColor);
        }
        else if ($(tagObj).css("stroke") == main.patternHexColor)
        {
            $(tagObj).css("stroke", main.whiteHexColor);
            $(tagObj).attr("org_stroke_color", main.patternHexColor);
        }

        if ($(tagObj).css("fill") == main.whiteHexColor)
        { 
            $(tagObj).css("fill", main.patternHexColor);
            $(tagObj).attr("org_fill_color", main.whiteHexColor);
        }
        else if ($(tagObj).css("fill") == main.patternHexColor)
        {
            $(tagObj).css("fill", main.whiteHexColor);
            $(tagObj).attr("org_fill_color", main.patternHexColor);
        }
    }

    main.convertBtnSVGColor = function(tagObj)
    {
        if($(tagObj).attr("stroke") && $(tagObj).css("stroke") != "" && $(tagObj).css("stroke") != "none")
        {
            if ($(tagObj).css("stroke") == main.whiteColor)
            {
                $(tagObj).css("stroke", main.patternColor);
                $(tagObj).attr("org_stroke_color", main.whiteColor);
            }
            else
            {
                $(tagObj).attr("org_stroke_color", $(tagObj).css("stroke"));
                $(tagObj).css("stroke", main.whiteColor);
            }
        }
        if($(tagObj).attr("fill") && $(tagObj).css("fill") != "" && $(tagObj).css("fill") != "none")
        {
            if ($(tagObj).css("fill") == main.whiteColor)
            {
                $(tagObj).css("fill", main.patternColor);
                $(tagObj).attr("org_fill_color", main.whiteColor);
            }
            else
            {
                $(tagObj).attr("org_fill_color", $(tagObj).css("fill"));
                $(tagObj).css("fill", main.whiteColor);
            }
        }
    }

    main.revertSVGColor     = function(tagObj)
    {
        if($(tagObj).attr("org_stroke_color") || $(tagObj).attr("org_stroke_color") != "")
        {
            $(tagObj).css('stroke', $(tagObj).attr("org_stroke_color"));
            $(tagObj).removeAttr("org_stroke_color");        
        }
        if($(tagObj).attr("org_fill_color") || $(tagObj).attr("org_fill_color") != "")
        {
            $(tagObj).css('fill', $(tagObj).attr("org_fill_color"));
            $(tagObj).removeAttr("org_fill_color");
        }
    }

    main.initWorkspace      = function()
    {
        $("#edit_position_button").css("display", "none");

        if ($("#emotions_shown").val())
        {
            main.bottomBars[0].showns = JSON.parse($("#emotions_shown").val());
            main.initTopleftBar();
        }

        switch(menu_index * 1)
        {
            case 0:
                draw_tool.emotionMode();
            break;            
            case 1:
                draw_tool.selectPointMode();
            break;
            case 2:
                draw_tool.drawLineMode();
            break;
            case 3:
                // shownPredefinedZone     = false;
                draw_tool.selectZoneMode();
            break;
        }
    }

    main.initRightSideBar   = function()
    {
        $("#right_sidebar_area .item").css("background-color", main.whiteColor);
        $("#right_sidebar_area .item label").css("color", "rgb(32, 40, 51)");

        $("#right_sidebar_area .item").each(function()
        {
           $(this).find("path").each(function()
            {
                main.revertSVGColor(this);
            });
        });
    }

    main.initBottomBarItem      = function()
    {
        $("#bottom_bar_area .item").css("background-color", main.whiteColor);
        $("#bottom_bar_area .item label").css("color", "rgb(32, 40, 51)");

        $("#bottom_bar_area .item").each(function()
        {
            $(this).find("path").each(function()
            {
                main.revertSVGColor(this);
            });
            $(this).find("use").each(function()
            {
                main.revertSVGColor(this);
            })
            $(this).find("polygon").each(function()
            {
                main.revertSVGColor(this);
            });    
            $(this).find("polyline").each(function()
            {
                main.revertSVGColor(this);
            });
            $(this).find("circle").each(function()
            {
                main.revertSVGColor(this);
            });
        });
    }

    main.revertBottomBarItem    = function(item)
    {
        $(item).css("background-color", main.whiteColor);
        $(item).find("label").css("color", "rgb(32, 40, 51)");

        $(item).find("path").each(function()
        {
            main.revertSVGColor(this);
        });
        $(item).find("use").each(function()
        {
            main.revertSVGColor(this);
        })
        $(item).find("polygon").each(function()
        {
            main.revertSVGColor(this);
        });    
        $(item).find("polyline").each(function()
        {
            main.revertSVGColor(this);
        });
        $(item).find("circle").each(function()
        {
            main.revertSVGColor(this);
        });
    }

    main.convertBottomBarItem  = function(item)
    {
        $(item).css("background-color", main.patternColor);
        $(item).find("label").css("color", "white");
        
        $(item).find("path").each(function()
        {
            main.convertSVGColor(this);
        });
        $(item).find("use").each(function()
        {
            main.convertSVGColor(this);
        });            
        $(item).find("polygon").each(function()
        {
            main.convertSVGColor(this);
        });
        $(item).find("polyline").each(function()
        {
            main.convertSVGColor(this);
        });
        $(item).find("circle").each(function()
        {
            main.convertSVGColor(this);
        });
    }

    main.initBottomBar      = function()
    {
        var bar             = main.bottomBars[menu_index];
        var barTag          = "#bottom_bar_area";

        $(barTag).empty();

        $(barTag).css("height", bar.height);

        for (var i = 0; i < bar.images.length; i++)
        {
            var item        = barTag + " a:nth-child(" + (i + 1) + ")";
            var e           = $('<a class="item"><div><span class="helper"></span><img class="ui middle aligned image"></div><label></label></a>');

            $(barTag).append(e);
            $(barTag).css("height", bar.height);            
            $(item).css("width", bar.width);

            if (draw_tool.mode == 3)
            {
                $(item + " img").attr("src", "/img/zones_" + bar.images[i] + ".svg");
            }
            else
            {
                $(item + " img").attr("src", "/img/" + bar.images[i] + ".svg");
            }

            main.loadSVG(item + " img");
            $(item + " label").html(bar.labels[i]);
            // $(item).click(main.onBottomBarItemClicked);
            $(item).click(function()
            {
                var index           = $(this).index() * 1;
                main.selectBottomBarItem(index);
            });
        }

        if (bar.height      == "0px")
        {
            $(barTag).css("display", "none");
        }
        else
        {
            $(barTag).css("display", "flex");
        }

        var left            = ($("#workspace_area").width() - $(barTag).width()) / 2;
        $(barTag).css("left", left + "px");
        $(barTag + " a div").height(parseInt(bar.height, 10) * 0.5);       

        if (draw_tool.mode  == 2 && $("#sub_mode").val() == 0)
        {
            setTimeout(function()
            {
                $(barTag + " a:nth-child(1)").click();
                draw_tool.sub_mode  = 1;
            }, 500);
        }
        else if (draw_tool.mode  == 4)
        {
            main.initTopleftBar();
            var index       = 0;
            setTimeout(function()
            {
                $("#bottom_bar_area .item").each(function()
                {
                    if (main.bottomBars[0].showns[index])
                    {
                        main.convertBottomBarItem(this);
                    }

                    index ++;
                });
            }, 500);
        }
        else
        {
            setTimeout(function()
            {
                if ($("#sub_mode").val())
                {
                    main.selectBottomBarItem($("#sub_mode").val());
                }
            }, 500);
        }
    }

    main.initTopleftBar     = function()
    {
        var bar             = main.bottomBars[0];
        var barTag          = "#topleft_bar_area";
        var index           = 0;

        $(barTag).empty();
        $(barTag).css("height", bar.height);

        for (var i = 0; i < bar.images.length; i++)
        {
            if (main.bottomBars[0].showns[i])
            {
                var item        = barTag + " a:nth-child(" + (index + 1) + ")";
                var e           = $('<a class="item"><div><span class="helper"></span><img class="ui middle aligned image"></div><label></label></a>');

                $(barTag).append(e);
                $(barTag).css("height", bar.height);

                $(item).css("width", 100);
                $(item + " img").attr("src", "/img/" + bar.images[i] + ".svg");
                $(item + " label").html(bar.labels[i]);

                index++;
            }
        }
    }

    main.selectBottomBarItem = function(index)
    {
        // var index           = $(this).index() * 1;
        var bottom_item     = "#bottom_bar_area a:nth-child(" + (index * 1 + 1) + ")";
        draw_tool.sub_mode  = index + 1;

        if (/*!shownPredefinedZone && */draw_tool.mode == 3)
        {
            var bar         = main.bottomBars[menu_index];
            var image       = "/img/defined_" + bar.images[index] + ".svg";
            // draw_tool.showDefinedZone(index);
            draw_tool.clickedIndex  = index;
            shownPredefinedZone = true;
        }

        if (draw_tool.sub_mode == 5 && draw_tool.mode == 2)
        {
            draw_tool.canvas.isDrawingMode  = true;
        }
        else
        {
            draw_tool.canvas.isDrawingMode  = false;
        }

        if (draw_tool.mode  == 4)
        {
            main.bottomBars[0].showns[index] = !main.bottomBars[0].showns[index];
            // console.log(main.bottomBars[0].showns[index]);
            
            // if (main.bottomBars[0].showns[index])
            // {
            //     main.convertBottomBarItem(this);
            // }
            // else
            // {
            //     main.revertBottomBarItem(this);
            // }

            // main.initTopleftBar();
            draw_tool.save_canvas();
        }
        else
        {
            main.initBottomBarItem();
            main.convertBottomBarItem(bottom_item);
        }

        $("#sub_mode").val(index);
    };

    main.init();
}