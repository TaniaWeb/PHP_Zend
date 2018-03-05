$(document).ready(function()
{
  var classMain   = new main();
});
var main          = function()
{
  
  var main              = this;
  main.canvas_width     = 600;
  main.canvas_height    = 530;

  main.face_mask        = null;
  main.mask_image       = null;

  main.canvas = new fabric.Canvas('canvas');
 
  main.canvas.isDrawingMode  = false;
  main.canvas.setWidth (main.canvas_width);
  main.canvas.setHeight(main.canvas_height);

    

  main.resize_image = function()
  {
    
    var curr_obj = null;
    main.count  = 0;
   
    for(var i = 0; i < main.canvas._objects.length +1; i ++) 
    {
      curr_obj = main.canvas._objects[i];
      

      if(i == 0 )
      {
        var start_left   = curr_obj.left;
        var start_top    = curr_obj.top;
        var start_width  = curr_obj.width;
        var start_height = curr_obj.width;
      }

      if( i!=0 && curr_obj.type!= "group")
      {
        main.count ++;

       var content_num     = $("#content_num");
       var content         = '<div class="row" style="margin:30px"><div class="col-md-12" style="height:"><div class="col-md-2" align="right"><div class="order-label">'+main.count+
                            '</div></div><div class="col-md-10"><div class="order-text">'+curr_obj.description+
                            '</div></div></div></div>';
       if(curr_obj.sub_category)
       {
         content          +='<div class="row"><div class="col-md-12"><div class="col-md-2"> </div><div class="col-md-10"><img src="/img/'
                            +curr_obj.sub_category+'.svg"/></div></div></div><div class="row"><div class="col-md-12"><div class="col-md-2"> </div><div class="col-md-10"><span>'+curr_obj.title+
                            '</span>';
            // if (object._title)
            // {
            //   content   +=  '<span>(' +
            //           object.sub_title +
            //           ')</span>';
            // }

            content     +=  '</div></div></div>';
       }
       content      += '<div class="row"><div class="col-md-12"><div class="col-md-2"> </div><div class="col-md-10"><div class="divider"></div></div></div></div>';

       $(content_num).append(content);
      }

      if(curr_obj.type == "image")
      {
        //width.start = 0;
        curr_obj.left   = (curr_obj.left - start_left)*600/start_width;
        curr_obj.top    = (curr_obj.top  - start_top+20)*580/start_height;
        curr_obj.width  = curr_obj.width*600/start_width;
        curr_obj.height = curr_obj.height*580/start_height;
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
                                           left:  curr_obj.left+curr_obj.width-10 , top: curr_obj.top+curr_obj.height/2-10
                                         });
            main.canvas.add(group);
        }


      }
      
     if(curr_obj.type == "path")
      {
        //width.start = 0;
        curr_obj.left   = (curr_obj.left - start_left)*600/start_width;
        curr_obj.top    = (curr_obj.top  - start_top+20)*580/start_height;
        curr_obj.width  = curr_obj.width*600/start_width;
        curr_obj.height = curr_obj.height*580/start_height;
        curr_obj.scaleX = 600/start_width;
        curr_obj.scaleY = 580/start_height;
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
                                           left:  curr_obj.left+curr_obj.width/2-10 , top: curr_obj.top-curr_obj.height/2-10
                                         });
            main.canvas.add(group);
        }
          
      }
    }
    
    main.canvas.renderAll();
  }

  if($("#points").val() == "" )
  {
  	var image_url = $("#image_url").val(); 
  	fabric.Image.fromURL(image_url, function(myImg)
    {
    	var img1 = myImg.set({ left: 0, top: 0 ,width:600,height:530});
    	main.canvas.setBackgroundImage(img1);
	    main.canvas.renderAll(); 
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



