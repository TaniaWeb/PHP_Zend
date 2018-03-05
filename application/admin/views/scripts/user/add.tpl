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
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>  
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">
          {if ($user.id==0)}
            Add a new User
          {else}
            Edit a User
          {/if}
          </h2>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <form action="/admin/user/save" style="border-radius: 0px;" class="group-border-dashed" method="post">
                    <input type="hidden" name="user_id" id="user_id" value="{$user.id}">
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Login</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-12" style="padding:0px;">User Activated</label>
                      <div class="switch-button switch-button-yesno">
                        <input name="activated" type="checkbox"
                          {if $user.activated==0}
                          {else}
                            checked
                          {/if}
                        id="activated">
                        <span>
                          <label for="activated"></label>
                        </span>
                      </div>
                    </div>                    
   
                    <div class="form-group col-sm-6">
                      <label>Email</label>
                      <input name="email" type="email" required="required" placeholder="Email" class="form-control" value="{$user.username}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Password</label>
                      <input name="password" type="password" {if ($user.id==null || $user.id==0)} required="required"{/if} placeholder="Password" class="form-control" value="">
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Standard Details</span>
                      <div class="panel-divider"></div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>User Name</label>
                      <input name="fullname" type="text" required="required" placeholder="Full Name" class="form-control" value="{$user.fullname}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Company</label>
                      <input name="company" type="text" placeholder="Company (optional)" class="form-control" value="{$user.company}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Phone Number</label>
                      <div>
                        <div class="be-radio col-sm-4">
                          <select name="phone_country" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <optgroup label="Country">
                              <option value="+49"
                                {if ($user.phone_country=="+49")}
                                    selected="true" 
                                {/if}
                              > 
                                German(+49)
                              </option>
                              <option value="+7"
                                {if ($user.phone_country=="+7")}
                                    selected="true" 
                                {/if}
                              >
                                Russia(+7)
                              </option>
                              <option value="+43"
                                {if ($user.phone_country=="+43")}
                                    selected="true" 
                                {/if}
                              >
                                Austria(+43)
                              </option>
                              <option value="+41"
                                {if ($user.phone_country=="SW")}
                                    selected="true" 
                                {/if}
                              >
                                Switzerland(+41)
                              </option>
                              <option value="+423"
                                {if ($user.phone_country=="+423")}
                                    selected="true" 
                                {/if}
                              >
                                Liechtenstein(+423)
                              </option>
                              <option value="+31"
                                {if ($user.phone_country=="+31")}
                                    selected="true" 
                                {/if}
                              >
                                Netherlands(+31)
                              </option>
                            </optgroup>
                          </select>
                        </div>
                        <div class="be-radio col-sm-7">
                          <input name="phone" type="text" placeholder="Phone" class="form-control" value="{$user.phonenumber}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Website</label>
                      <input name="website" type="url" placeholder="Website" class="form-control" value="{$user.website}">
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group col-sm-6" style="padding-left: 0px;">
                        <label>Type / Classification</label>
                        <select class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                          <optgroup label="Type / Classification">
                            <option value="Cosmethic Artist">Cosmethic Artist</option>
                            <option value="Visagist">Visagist</option>
                          </optgroup>
                        </select>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Upload a Image</label>
                        <div>
                          <img id="upload_image" src="{if ($user.avatar==null || $user.avatar=='')}/upload/avatar_app.png{else}{$user.avatar}{/if}" alt="Avatar">
                          <input name="avatar" id="avatar" type="hidden" value="{if ($user.avatar==null || $user.avatar=='')}/upload/avatar_app.png{else}{$user.avatar}{/if}">
                          <button class="btn btn-default upload_picture" type="button">Upload Picture</button>
                          <div id="divfile">
                            <input id="fileDialog" type="file" accept="image/*" style='display:none;'>
                          </div>                        
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Address</span>
                      <div class="panel-divider"></div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Address</label>
                      <input name="street" type="text" placeholder="Street + Number" class="form-control" value="{$user.street}">
                    </div>
                    <div class="form-group col-sm-3">
                      <label>Post Code</label>
                      <input name="postal" type="number" placeholder="Post Code" class="form-control col-sm-3" value="{$user.postal}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>City</label>
                      <input name="city" type="text" placeholder="City" class="form-control" value="{$user.city}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Country</label>
                      <select name="country" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <optgroup label="Country">
                          <option value="DE"
                            {if ($user.country=="DE")}
                                selected="true" 
                            {/if}
                          > 
                            German
                          </option>
                          <option value="RU"
                            {if ($user.country=="RU")}
                                selected="true" 
                            {/if}
                          >
                            Russia
                          </option>
                          <option value="AU"
                            {if ($user.country=="AU")}
                                selected="true" 
                            {/if}
                          >
                            Austria
                          </option>
                          <option value="SW"
                            {if ($user.country=="SW")}
                                selected="true" 
                            {/if}
                          >
                            Switzerland
                          </option>
                          <option value="LI"
                            {if ($user.country=="LI")}
                                selected="true" 
                            {/if}
                          >
                            Liechtenstein
                          </option>
                          <option value="NE"
                            {if ($user.country=="NE")}
                                selected="true" 
                            {/if}
                          >
                            Netherlands
                          </option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Modules Booked</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="col-sm-12">
                        <div class="be-checkbox col-sm-4">
                          <input name="bc_check" id="bc_check" type="checkbox"
                            {if ($user.bc_check)}
                                checked="true" 
                            {/if}
                          >
                          <label for="bc_check" class="check_label">Beauty Configurator</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="sv_check" id="sv_check" type="checkbox" disabled="true">
                          <label for="sv_check" class="check_label">Style & Visagistic</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="cc_check" id="cc_check" type="checkbox" disabled="true">
                          <label for="cc_check" class="check_label">Cosmetic Configurator</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="be-checkbox col-sm-4">
                          <input name="ds_check" id="ds_check" type="checkbox" disabled="true">
                          <label for="ds_check" class="check_label">Detox & Sliming</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="wlc_check" id="wlc_check" type="checkbox" disabled="true">
                          <label for="wlc_check" class="check_label">Weight Loss Configurator</label>
                        </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Account Details</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="col-sm-5">
                      <label>Account Type</label>
                      <div>
                        <div class="be-radio col-sm-6">
                          <input id="bba_radio" type="radio" name="account_type" value="0"
                          {if ($user.account_type==0)}
                          checked="checked"
                          {/if}
                          >
                          <label for="bba_radio" class="radio_label">Basic Business Account</label>
                        </div>
                        <div class="be-radio col-sm-6">
                          <input id="fa_radio" type="radio" name="account_type" value="1"
                          {if ($user.account_type==1)}
                          checked="checked"
                          {/if}
                          >
                          <label for="fa_radio" class="radio_label">Free Account</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label>Free Configurations</label>
                      <div>
                        <div class="be-radio col-sm-12">
                          <input name="free_count" id="free_count" class="form-control" type="input" value="{if ($user.free_count == null)}3{else}{$user.free_count}{/if}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label>Frontend Language</label>
                      <div>
                        <div class="be-radio col-sm-12">
                          <select name="language" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <optgroup label="Languages">
                              <option value="AK">German</option>
                              <option value="HI">USA</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Payment</span>
                      <div class="panel-divider"></div>                      
                      <input type="hidden" name="payment_id" id="payment_id" value="{$user.payment_id}">
                    </div>
                    <div class="form-group col-sm-3">
                      <label>Discount</label>
                      <div class="input-group">
                      <input name="payment_username" type="text" placeholder="Vorname" class="form-control" value="0">
                      <span class="input-group-addon" id="basic-addon2">%</span>
                      </div>
                    </div>
                    <div class="form-group col-sm-9">
                      <label>Subscription Type</label>
                      <div class="col-sm-12" style="padding-left: 0px;">
                        <div class="be-radio col-sm-3">
                          <input id="subc_radio1" type="radio" name="subscription_type" value="0"checked="checked">
                          <label for="subc_radio1" class="radio_label">6 Manats Paket</label>
                        </div>
                        <div class="be-radio col-sm-3">
                          <input id="subc_radio2" type="radio" name="subscription_type" value="1">
                          <label for="subc_radio2" class="radio_label">1 Jahres Account</label>
                        </div>
                        <div class="be-radio col-sm-3">
                          <input id="subc_radio3" type="radio" name="subscription_type" value="2">
                          <label for="subc_radio3" class="radio_label">2 Jahres Paket</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Produkte</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="form-group col-sm-12">
                      <label>Brands</label>
                      <div class="input-group col-sm-12" style="border-width: 1px; border-color: #dfdfdf; border-style: solid;">
                        <button class="btn btn-default add submit" type="button" style="margin: 10px; width: 100px; height:40px; font-size: 12px;">
                           <span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Teoxane
                        </button>
                      </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="form-group col-sm-6">
                      <button class="btn btn-default add submit" type="submit">Submit</button>
                      <button class="btn btn-default add cancel" type="button" onclick="viewUserList()">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>
      {include file='common/footer.tpl'}
    </div>
    
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="/assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="/assets/js/app-form-elements.js" type="text/javascript"></script>
    <script src="/assets/js/app-form-masks.js" type="text/javascript"></script>
    <script src="/assets/js/add.js" type="text/javascript"></script>
    <script src="/assets/js/user_manage.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap-formhelpers-phone.js" type="text/javascript"></script>

  </body>
</html>