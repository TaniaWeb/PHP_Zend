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
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          {if ($company_info.id==0)}
            Add a new Company
          {else}
            Edit a Company
          {/if}
          </h2>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">

                  <form action="/admin/company/save" style="border-radius: 0px;" class="group-border-dashed">
                    <input type="hidden" name="company_id" id="company_id" value="{$company_info.id}">

                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Company Login</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-12" style="padding:0px;">Activated</label>
                      <div class="switch-button switch-button-yesno">
                        <input name="activated" type="checkbox" 
                          {if $company_info.activated==0}
                          {else}
                            checked
                          {/if}
                          id="activated" value="1" >
                        <span>
                          <label for="activated"></label>
                        </span>
                      </div>
                    </div>                    
                    <div class="form-group col-sm-6">
                      <label>Email</label>
                      <input name="email" type="email" required="required" placeholder="Email" class="form-control" value="{$company_info.email}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Password</label>
                      <input name="password" type="password" required="required" placeholder="Password" class="form-control" value="{$company_info.password}">
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Company Details</span>
                      <div class="panel-divider"></div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Company Name</label>
                      <input name="fullname" type="text" required="required" placeholder="Full Name" class="form-control" value="{$company_info.fullname}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Type</label>
                      <select class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="type">
                        <optgroup label="Type / Classification">
                          <option value="0" {if ($company_info.type==0)} selected{/if}>Hotel</option>
                          <option value="1" {if ($company_info.type==1)} selected{/if}>Spa</option>
                          <option value="2" {if ($company_info.type==2)} selected{/if}>Hairdress</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Phone Number</label>
                      <input name="phone" type="text" data-mask="phone" placeholder="Phone" class="form-control" value="{$company_info.phone}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Website</label>
                      <input name="website" type="url" placeholder="Website" class="form-control" value="{$company_info.website}">
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label>Company Logo</label>
                      <div>
                        <img id="upload_image" src="/img/upload_image.png" alt="Avatar">
                        <input name="avatar" id="avatar" type="hidden"  value="{$company_info.avatar}">
                        <button class="btn btn-default upload_picture" type="button">Upload Picture</button>
                        <div id="divfile">
                          <input id="fileDialog" type="file" accept="image/*" style='display:none;'>
                        </div>                        
                      </div>
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label>Info Email</label>
                      <input name="infoemail" type="infoemail" required="required" placeholder="Info Email(optional)" class="form-control" value="{$company_info.infoemail}">
                    </div>

                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Address</span>
                      <div class="panel-divider"></div>
                    </div>                
                    <div class="form-group col-sm-6">
                      <label>Address</label>
                      <input name="street" type="text" placeholder="Street + Number" class="form-control" value="{$company_info.street}">
                    </div>
                    <div class="form-group col-sm-3">
                      <label>Post Code</label>
                      <input name="postal" type="number" placeholder="Post Code" class="form-control col-sm-3" value="{$company_info.postal}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>City</label>
                      <input name="city" type="text" placeholder="City" class="form-control" value="{$company_info.city}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Country</label>
                      <select name="country" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <optgroup label="Country">
                          <option value="DE" {if ($company_info.country=="DE")} selected {/if}>German</option>
                          <option value="RU" {if ($company_info.country=="RU")} selected {/if}>Russia</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Modules Booked</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="col-sm-12">
                        <div class="be-checkbox col-sm-4">
                          <input name="bc_check" id="bc_check" type="checkbox" value="1"  {if ($company_info.bc_check==1)} checked {/if}>
                          <label for="bc_check" class="check_label">Beauty Configurator</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="sv_check" id="sv_check" type="checkbox" value="1" disabled="true">
                          <label for="sv_check" class="check_label">Style & Visagistic</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="cc_check" id="cc_check" type="checkbox" value="1" disabled="true">
                          <label for="cc_check" class="check_label">Cosmetic Configurator</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="be-checkbox col-sm-4">
                          <input name="ds_check" id="ds_check" type="checkbox" value="1" disabled="true">
                          <label for="ds_check" class="check_label">Detox & Sliming</label>
                        </div>
                        <div class="be-checkbox col-sm-4">
                          <input name="wlc_check" id="wlc_check" type="checkbox" value="1" disabled="true">
                          <label for="wlc_check" class="check_label">Weight Loss Configurator</label>
                        </div>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Account Details</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label>Fontend Language</label>
                      <select name="frontend_language" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <optgroup label="Languages">
                          <option value="AK"  {if ($company_info.frontend_language=="AK")} selected {/if}>German</option>
                          <option value="HI"  {if ($company_info.frontend_language=="HI")} selected {/if}>USA</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <span class="sub_title">Payment</span>
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="col-sm-12">
                      <div>
                        <div class="be-radio col-sm-3">
                          <input id="sl_radio" type="radio" name="paymenttype" value="0"  {if ($company_info.paymenttype==0)} checked {/if}>
                          <label for="sl_radio" class="radio_label">SEPA Lastschrift</label>
                        </div>
                        <div class="be-radio col-sm-3">
                          <input id="cc_radio" type="radio" name="paymenttype" value="1"{if ($company_info.paymenttype==1)} checked {/if}>
                          <label for="cc_radio" class="radio_label">Credit Card</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Name</label>
                      <input name="payment_name" type="text" placeholder="Vorname" class="form-control" value="{$company_info.payment_name}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Nachname</label>
                      <input name="payment_nachname" type="text" placeholder="Vorname" class="form-control" value="{$company_info.payment_nachname}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>IBAN</label>
                        <input name="payment_iban" type="text" placeholder="Street + Number" class="form-control" value="{$company_info.payment_iban}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Geburtsdatum</label>
                      <input name="payment_geburtsdatum" type="text" data-mask="date" placeholder="dd/mm/yyyy" class="form-control" value="{$company_info.payment_geburtsdatum}">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Phone number</label>
                      <input name="payment_phonenumber" type="text" data-mask="phone" placeholder="Phone number" class="form-control" value="{$company_info.payment_phonenumber}">
                    </div>
                    <div class="col-sm-12 sub_heading">
                      <div class="panel-divider"></div>                      
                    </div>
                    <div class="form-group col-sm-6">
                      <button class="btn btn-default add submit" type="submit">Submit</button>
                      <button class="btn btn-default add cancel1" onclick="cancelSubmit(event)">Cancel</button>
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
    <script src="/assets/js/company.js" type="text/javascript"></script>
    <script src="/assets/js/company_manage.js" type="text/javascript"></script>

  </body>
</html>