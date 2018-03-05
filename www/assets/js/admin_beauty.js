$(document).ready(function()
{
  var classMain   = new main();
  $(window).resize(function()
  {
//    classMain.resize_image();
  });
});
var main          = function()
{
  var main              = this;
  main.canvas_width     = 1200;
  main.canvas_height    = 730;

  main.face_mask        = null;
  main.mask_image       = null;

  main.canvas = new fabric.Canvas('canvas');
 
  main.canvas.isDrawingMode  = false;
  // main.canvas.setWidth (main.canvas_width);
  // main.canvas.setHeight(main.canvas_height);

  main.is_hair_empty = function(hair_questions)
  {
    if(hair_questions.steps.length==0)
      return true;

    return false;
  };

  main.resize_image = function()
  {
    var canvas_width = $("#canvas_parent").width();
    var curr_obj = null;
    main.count  = 0;
    var factor = 1;

    for(var i = 0; i < main.canvas._objects.length +1; i ++) 
    {
      curr_obj = main.canvas._objects[i];
      
      if(i == 0 )
      {
        //window.alert(curr_obj.createdWidth);
        console.log(curr_obj);
        var start_left   = (canvas_width - curr_obj.createdWidth)/2;
        var start_top    = curr_obj.top;
        var start_width  = curr_obj.width;
        var start_height = curr_obj.height;

        if(curr_obj.createdWidth / canvas_width > 2 )
          factor = canvas_width / curr_obj.createdWidth * 1.5;

        start_left = start_left * factor;
        //factor = 0.5;
      }

      if( i!=0 && curr_obj!=null && curr_obj.type!= "group")
      {
        main.count ++;

        var point_html = $(".config-point").html();
        var $point_element = $(point_html);
        $point_element.find(".point-index").html(main.count);
        $point_element.find(".point-desc").html(curr_obj.description);
        if(curr_obj.sub_category)
        {
          // $point_element.find(".point-subcate").css("display", "block");
          $point_element.find(".subcate-img").prop("src", "/img/"+curr_obj.sub_category+".svg");
          $point_element.find(".subcate-title").html("<b>"+curr_obj.title+"</b>");
        }
        else
        {
          $point_element.find(".subcate-img").css("display", "none");
        }

        $(content_num).append($point_element);
      }

      if(curr_obj!=null && curr_obj.type == "image")
      {
        //width.start = 0;
        curr_obj.left   = curr_obj.left + start_left;
        // curr_obj.top    = (curr_obj.top  - start_top+20)*580/start_height;
        // curr_obj.width  = curr_obj.width*600/start_width;
        // curr_obj.height = curr_obj.height*580/start_height;
        var scaleX = curr_obj.scaleX;
        var scaleY = curr_obj.scaleY;
        var left = curr_obj.left;
        var top = curr_obj.top;

        var tempScaleX = scaleX * factor;
        var tempScaleY = scaleY * factor;
        var tempLeft = left * factor;
        var tempTop = top * factor;

        curr_obj.scaleX = tempScaleX;
        curr_obj.scaleY = tempScaleY;
        curr_obj.left = tempLeft;
        curr_obj.top = tempTop;

        if(main.count != 0)
        {
           var circle = new fabric.Circle({radius: 10,
                 fill       : 'black',
                 stroke     : 'black',
                 strokeWidth: 0,
                 originX    : 'center', 
                 originY    : 'center' 
               });
           
            var text = new fabric.Text(main.count.toString(),
                        {  fontSize: 20, 
                            originX: 'center', 
                            originY: 'center',
                            fill   : 'white' 
                          });
            var group = new fabric.Group([ circle, text ], { 
                                           left:  curr_obj.left+curr_obj.width*factor-10 , top: curr_obj.top+curr_obj.height*factor/2-10
                                         });
            main.canvas.add(group);
        }
      }
      
      if(curr_obj!=null && curr_obj.type == "path")
      {
        //width.start = 0;
        curr_obj.left   = curr_obj.left + start_left; //)*600/start_width;
        // curr_obj.top    = (curr_obj.top  - start_top+20)*580/start_height;
        // curr_obj.width  = curr_obj.width*600/start_width;
        // curr_obj.height = curr_obj.height*580/start_height;
        // curr_obj.scaleX = 600/start_width;
        // curr_obj.scaleY = 580/start_height;
        var scaleX = curr_obj.scaleX;
        var scaleY = curr_obj.scaleY;
        var left = curr_obj.left;
        var top = curr_obj.top;

        var tempScaleX = scaleX * factor;
        var tempScaleY = scaleY * factor;
        var tempLeft = left * factor;
        var tempTop = top * factor;

        curr_obj.scaleX = tempScaleX;
        curr_obj.scaleY = tempScaleY;
        curr_obj.left = tempLeft;
        curr_obj.top = tempTop;

        if(main.count != 0)
        {
           var circle = new fabric.Circle({radius: 10,
                 fill       : 'black',
                 stroke     : 'black',
                 strokeWidth: 0,
                 originX    : 'center', 
                 originY    : 'center' 
               });           
            var text = new fabric.Text(main.count.toString(),
                        {  fontSize: 20, 
                            originX: 'center', 
                            originY: 'center',
                            fill   : 'white' 
                          });
            var group = new fabric.Group([ circle, text ], { 
                                           left:  curr_obj.left+curr_obj.width*factor/2-10 , top: curr_obj.top-curr_obj.height*factor/2-10
                                         });
            main.canvas.add(group);
        }
      }
    }

    var hair_questions_str = $("#hair_questions").val();

  	var hair_questions = null;
  	if(hair_questions_str!=null && hair_questions_str!="")
  		hair_questions = JSON.parse(hair_questions_str);

    if(hair_questions!=null && !main.is_hair_empty(hair_questions))
    {

        main.count++; 

        var hair_html = $(".config-hair").html();
        var $hair_element = $(hair_html);
        $hair_element.find(".point-index").html(main.count);
        $hair_content = $hair_element.find(".hair-content");
        $(content_num).append($hair_element);

        for(var i=0; i<hair_questions.steps.length; i++)
        {
          var steps = hair_questions.steps[i];
          $hair_item_html = $(".hair-item").html();
          $hair_item_element = $($hair_item_html);
          $hair_item_element.find(".title").html(steps.name);
          $hair_content.append($hair_item_element);

          $category_container = $hair_item_element.find(".category-container");
          for(var j=0; j<steps.categories.length; j++)
          {
            var isVisible = false;
            var category = steps.categories[j];
            $category_html = $(".hair-category").html();
            $category_element = $($category_html);
            $category_element.find(".title").html(category.name);

            $subcategory_container = $category_element.find(".subcategory-container");
            var sub_count = 0;
            for(var k=0; k<category.subCategories.length; k++)
            {
              var subCategory = category.subCategories[k];
              if(subCategory.selected == false)
                continue;

              if(i!=3)
              {
                isVisible = true;
                $subcategory_html = $(".hair-subcategory").html();
                $subcategory_element = $($subcategory_html);
                $subcategory_element.find(".title").html(subCategory.name);
                if(i==2 && j==2)               
                  $subcategory_element.find("img").css("display", "none");
                else
                  $subcategory_element.find("img").prop("src", "/img/image_hair_"+(i+1)+"_"+(j+1)+"_"+(k+1)+".svg");
                $subcategory_container.append($subcategory_element);
              }else if(i==3)
              {
                sub_count += 1;
                isVisible = true;
                $subcategory_html = $(".hair4-subcategory").html();
                $subcategory_element = $($subcategory_html);
                $subcategory_element.find(".point-index").html(sub_count);
                $subcategory_element.find(".title").html(subCategory.name);
                $subcategory_container.append($subcategory_element);

                var descriptions = subCategory["descriptions"];
                var $hair4_container = $subcategory_element.find(".subcategory4-container");
                for(var l=0; l<descriptions.length; l++)
                {
                  if(descriptions[l]=="")
                    continue;
                  $hair4_html = $(".hair4-desc").html();
                  $hair4_element = $($hair4_html);
                  $hair4_element.find(".hair-text").html(descriptions[l]);

                  $hair4_container.append($hair4_element);
                }
              }
            }
            if(isVisible)
              $category_container.append($category_element);
          }
        }
    }
    main.canvas.setWidth (canvas_width);
    main.canvas.setHeight(start_height);
    main.canvas.renderAll();
  }
  if($("#points").val() == "" )
  {
  	var image_url = $("#image_url").val(); 
  	fabric.Image.fromURL(image_url, function(myImg)
    {
      var width, height, max_width=$("#canvas_parent").width();
      width = myImg.width;
      height = myImg.height;
      var rate = max_width/width;
      width = max_width;
      height = height * rate;

    	var img1 = myImg.set({ left: 0, top: 0 ,width:width,height:height});
    	main.canvas.setBackgroundImage(img1);
	    main.canvas.renderAll(); 
      main.canvas.setWidth (myImg.width);
      main.canvas.setHeight(myImg.width);
    });

  }
  else
  {
    main.canvas.loadFromJSON($("#points").val(), function()
    {
      main.resize_image();
    });
  }
}



