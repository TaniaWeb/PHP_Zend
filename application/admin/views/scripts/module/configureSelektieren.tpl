<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/Artboard.png">
    <title>AestheticConfigurator Admin</title>
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/customize.css" type="text/css"/>
    <script src="/ckeditor/ckeditor.js"></script>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content be-no-padding">
        <div class="main-content">
          <div style="background-color:#eee">
            <div class="row">
              <div class="col-md-12"  >
                <div class="module-header">Configure Beauty Configurator</div>
              </div>
            </div>
            <div class="container">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading" style="height:60px">
                    <div class="col-md-12" style="padding:0px">
                      <div class="col-md-4" align="left" style="font-weight:bold; padding:0px; margin:0px">
                          Facial Regions
                      </div>
                      <div class="col-md-8  " align="right" style="padding-right:0px; margin-right:0px">
                        <a data-toggle="collapse" href="#collapse0"><img src="/img/down_arrow.svg"></a>    
                      </div>
                    </div>
                  </div>
                  <div id="collapse0" class="panel-collapse collapse in">
                    <div class="panel-body"></div>
                  </div>
                </div>
                {foreach from=$regions item=region_info}
                <div class="panel panel-default">
                  <form id="region_save" action="/admin/module/saveRegion" method="post">
                  <input type=hidden name="region_id" id="region_id" value={$region_info.id}>

                  <div class="panel-heading" style="height:60px">
                    <div class="col-md-12" style="padding:0px">
                      <div class="col-md-1" align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; width:50px">
                          Region
                      </div>
                      <div class="col-md-1" style="padding:0px;">
                          <h4 class="panel-title" style="padding-left:0px;  font-weight:bold;">
                           {$region_info.region_name}
                          </h4>    
                      </div>
                      <div class="col-md-1" style="padding:2px">
                        <div class="state-label" style="background-color:#2E3CC1"></div>
                      </div>
                      <div class="col-md-9" align="right" style="padding-right:0px; margin-right:0px">
                        <a data-toggle="collapse" href="#collapse{$region_info.id}"><img src="/img/down_arrow.svg"></a>    
                      </div>
                    </div>
                  </div>

                  <div id="collapse{$region_info.id}" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="form-group col-sm-6" style="padding:0px; padding-top:10px">
                        <input name="region_name" required="required" placeholder="Eye Region" class="form-control" style="width:95%" value="{$region_info.region_name}">
                        <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Region Name</label>
                      </div>
                      <div class="form-group col-sm-6" style="padding-top:10px">
                        <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Icon</label>
                        <div>
                          <img id="upload_image" {if ($region_info.region_img=="") } src="/img/upload_image.png"
                          {else}
                            src="{$region_info.region_img}"
                          {/if}
                          >
                          <input name="region_img_path" id="upload_image_path" type="hidden" value="{$region_info.region_img}">
                          <button class="btn btn-default upload_skelton" type="button">Upload Picture</button>
                          <button class="btn btn-default removeIcon" id="remove_image" type="button" >remove</button>
                          <div id="divfile">
                            <input name="region_img" id="image_file" type="file" accept="image/*" style='display:none;'>
                          </div>                        
                        </div>                         
                      </div>
                      <div class="col-sm-12 sub_heading" style="margin-left:0px" >
                         <div class="panel-divider"></div>
                         <span class="sub_title">Add  Wishes</span>
                      </div>
                      <div class="wish_container">
                        {foreach from=$region_info.wishes item=region_wish}
                        <div>
                          <div class="form-group col-sm-1 wish_remove" style="height:40px; padding:0px; margin-top:35px; width:40px">
                            <div class="order-label" style="font-weight:bold; font-size:40px;"><span style="position: relative; left:0px; top:-5px;">-</span></div>
                          </div>
                          <div class="form-group col-sm-6" style="padding:0px; padding-top:10px">
                            <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Wish</label>
                            <input name="wish_ids[]" type="hidden" value="{$region_wish.id}">
                            <input name="wish_names[]" type="Eye Region" required="required" placeholder="Wish" class="form-control" style="width:95%" value="{$region_wish.wish_name}">
                          </div>
                          <div class="form-group col-sm-5" style="padding-top:10px">
                            <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Icon</label>
                            <div>
                              <img id="upload_image" 
                              {if ($region_wish.img=="") } 
                                src="/img/upload_image.png"
                              {else}
                                src="{$region_wish.img}"
                              {/if}
                              >
                              <input name="wish_img_paths[]" id="upload_image_path" type="hidden" value="{$region_wish.img}">
                              <button class="btn btn-default upload_skelton" type="button">Upload Picture</button>
                              <button class="btn btn-default removeIcon" id="remove_image" type="button" >remove icon</button>
                              <div id="divfile">
                                <input name="wish_img"" id="image_file" type="file" accept="image/*" style='display:none;'>
                              </div>                        
                            </div>                         
                          </div>
                          <div class="col-sm-12 sub_heading" style="margin-left:40px; margin-right:20px; width:96%" >
                             <span class="">Info Details</span>
                             <a data-toggle="collapse" href="#collapse{$region_info.id}_{$region_wish.id}" class="" aria-expanded="true"><img src="/img/down_arrow.svg"></a>
                          </div>
                          <div id="collapse{$region_info.id}_{$region_wish.id}" class="panel-collapse collapse" style="margin-left:40px; margin-right:20px; width:96%">
                            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
                              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">1. Entstehung</label>
                              <textarea cols="80" rows="6" id="editor1" name="wish_info1[]" class="form-control CKEDITOR" style="width:95%">{$region_wish.text1}</textarea>
                            </div>
                            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
                              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">2. Anatomie</label>
                              <textarea cols="80" rows="6" id="editor2" name="wish_info2[]" class="form-control CKEDITOR" style="width:95%">{$region_wish.text2}</textarea>
                            </div>
                            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
                              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">3. Behandlung</label>
                              <textarea cols="80" rows="6" id="editor3" name="wish_info3[]" class="form-control CKEDITOR" style="width:95%">{$region_wish.text3}</textarea>
                            </div>
                            <div>
                              <img id="upload_image"
                              {if ($region_wish.detail_img=="") } 
                                src="/img/upload_image.png"
                              {else}
                                src="{$region_wish.detail_img}"
                              {/if}
                              >
                              <input name="detail_img_paths[]" id="upload_image_path" type="hidden" value="{$region_wish.detail_img}">
                              <button class="btn btn-default upload_skelton" type="button">Upload Picture</button>
                              <button class="btn btn-default removeIcon" id="remove_image" type="button" >remove picture</button>
                              <div id="divfile">
                                <input name="detail_imgs[]" id="image_file" type="file" accept="image/*" style='display:none;'>
                              </div>                        
                            </div>                         
                          </div>
                        </div>
                        {/foreach}
                      </div>
                      <div class="form-group col-sm-12 sub_heading" style="margin-left:40px; margin-right:20px; width:96%;" >
                        <div class="panel-divider">
                        </div>
                        <button type="button" class="btn btn-default action_button add_wish_btn" style="font-size:16px;margin-left:0px; height:50px">Add wishes</button>
                        <button class="btn btn-default action_button" style="font-size:16px;margin-left:0px; height:50px">Save Region</button>
                      </div>   
                    </div>
                  </div>

                  </form>

                </div>
                {/foreach}
              </div> 
            </div>
          </div>
        </div>
      </div>

      <div id="wish_template" style="display: none;">
        <div>
          <div class="form-group col-sm-1 wish_remove" style="height:40px; padding:0px; margin-top:35px; width:40px">
            <div class="order-label" style="font-weight:bold; font-size:40px;"><span>-</span></div>
          </div>
          <div class="form-group col-sm-6" style="padding:0px; padding-top:10px">
            <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Wish</label>
            <input name="wish_ids[]" type="hidden" value="">
            <input name="wish_names[]" type="Eye Region" required="required" placeholder="Wish" class="form-control" style="width:95%" value="">
          </div>
          <div class="form-group col-sm-5" style="padding-top:10px">
            <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">Icon</label>
            <div>
              <img id="upload_image" src="/img/upload_image.png">
              <input name="wish_img_paths[]" id="upload_image_path" type="hidden" value="">
              <button class="btn btn-default upload_skelton" type="button">Upload Picture</button>
              <button class="btn btn-default removeIcon" id="remove_image" type="button" >remove icon</button>
              <div id="divfile">
                <input name="wish_imgs[]"" id="image_file" type="file" accept="image/*" style='display:none;'>
              </div>                        
            </div>                         
          </div>
          <div class="col-sm-12 sub_heading" style="margin-left:40px; margin-right:20px; width:96%" >
             <span class="">Info Details</span>
             <a data-toggle="collapse" href="#collapse" class="" aria-expanded="true"><img src="/img/down_arrow.svg"></a>
          </div>
          <div id="collapse" class="panel-collapse collapse" style="margin-left:40px; margin-right:20px; width:96%">
            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">1. Entstehung</label>
              <textarea cols="80" rows="6" id="editor1" name="wish_info1[]" class="form-control" style="width:95%"></textarea>
            </div>
            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">2. Anatomie</label>
              <textarea cols="80" rows="6" id="editor2" name="wish_info2[]" class="form-control" style="width:95%"></textarea>
            </div>
            <div class="form-group col-sm-12" style="padding:0px; padding-top:0px">
              <label align="left" style="color:#aaa; font-size:13px; font-weight:bold; padding:0px; margin:0px; ">3. Behandlung</label>
              <textarea cols="80" rows="6" id="editor3" name="wish_info3[]" class="form-control" style="width:95%"></textarea>
            </div>
            <div>
              <img id="upload_image" src="/img/upload_image.png">
              <input name="detail_img_paths[]" id="upload_image_path" type="hidden" value="">
              <button class="btn btn-default upload_skelton" type="button">Upload Picture</button>
              <button class="btn btn-default removeIcon" id="remove_image" type="button" >remove picture</button>
              <div id="divfile">
                <input name="detail_imgs[]" id="image_file" type="file" accept="image/*" style='display:none;'>
              </div>                        
            </div>                         
          </div>
        </div>
      </div>
      {include file='common/footer.tpl'}
    </div>
   
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/configurations_skelton.js" type="text/javascript"></script>
    <script src="/assets/js/configurations.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>
  </body>
</html>