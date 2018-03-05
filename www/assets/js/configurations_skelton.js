$(document).ready(function()
{
	function add_wish()
	{
		var wish_container = $(this).closest("div.panel-body").find(".wish_container");
		var wish_template = $("#wish_template");
		var wish_template_html = $("#wish_template").html();
		var wish_template_element = $(wish_template_html);
		wish_template_element.find(".wish_remove").click(remove_wish);
	    wish_template_element.find(".btn.btn-default.upload_skelton").click(uploadSkelton);
		wish_template_element.find(".removeIcon").click(removeIcon);

		collapse_id = "collapse_"+Math.floor(Date.now()/1000);
		wish_template_element.find("a[data-toggle='collapse']").prop("href", "#"+collapse_id);
		wish_template_element.find("div.panel-collapse").prop("id", collapse_id);
		wish_container.append(wish_template_element);

		// $(wish_template_element).find(".ckeditor").foreach()
		CKEDITOR.replace(wish_template_element.find("#editor1")[0], {
			height: 150,
			width: "95%",
		});

		CKEDITOR.replace(wish_template_element.find("#editor2")[0], {
			height: 150,
			width: "95%",
		});

		CKEDITOR.replace(wish_template_element.find("#editor3")[0], {
			height: 150,
			width: "95%",
		});
	}

	function remove_wish()
	{
		parent = $(this).parent();
		parent.remove();
	}

	function removeIcon()
	{
    	var _this = $(this);
    	var parent = _this.parent();
		parent.find("#upload_image").prop("src", "/img/upload_image.png");
		parent.find("#upload_image_path").val("");
	}

	function uploadSkelton()
	{
    	var _this = $(this);
    	var parent = _this.parent();

		var chooser = parent.find('#image_file');
		console.log(chooser[0]);
		chooser[0].addEventListener("change", function(evt) {
			var fileInput = parent.find('#image_file');
			

			var xhr = new XMLHttpRequest();
			xhr.open('POST', '/admin/index/configurationImage');

			xhr.upload.onprogress = function(e) 
			{
			    /* 
			    * values that indicate the progression
			    * e.loaded
			    * e.total
			    */
			};

			xhr.onload = function()
			{
			    // alert('upload complete');       
			};

			// upload success
			xhr.onreadystatechange = function() 
			{

			  if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
			  {
			      // alert(xhr.responseText);
			      parent.find("#upload_image").prop("src", xhr.responseText);
			      // document.getElementById('upload_image').src = xhr.responseText;
			      parent.find("#upload_image_path").val(xhr.responseText);
			  }
			}

			var form = new FormData();
			form.append('photo', fileInput[0].files[0]);
			xhr.send(form);
			//clear input files
			parent.find('#divfile').html(parent.find('#divfile').html());

			var reader = new FileReader();
			reader.onload = function (e) 
			{
			    // document.getElementById('upload_image').src = e.target.result;
			};
			reader.readAsDataURL(fileInput.files[0]);
		}, false);

		chooser.click();
	}

	$(".add_wish_btn").click(add_wish);

	$(".wish_remove").click(remove_wish);

	$(".removeIcon").click(removeIcon);

	for(var i=0; i<$(".CKEDITOR").length; i++ )
	{
		CKEDITOR.replace($(".CKEDITOR")[i], {
			height: 150,
			width: "95%",
		});
	}

    $(".btn.btn-default.upload_skelton").click(uploadSkelton);
});

