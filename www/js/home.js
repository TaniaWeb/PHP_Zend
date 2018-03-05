/******************* Home Page **********************/
function onGoBack()
{
	window.history.back();
}
function onClickEventItem(event_no)
{
	document.getElementById("myform").action = "/user/index/event?flag=event&event_no="+event_no;
	document.getElementById("myform").submit();
}

function onClickGroupItem(gp_no)
{
	document.getElementById("myform").action = "/user/member/index?gp_no="+gp_no;
	document.getElementById("myform").submit();
}

/******************* Top Banner **********************/
function gotoHome()
{
	if(confirm("トップメニューに移動します。 宜しいですか？")) {
		document.getElementById("myform").action = "/user/index/home";
		document.getElementById("myform").submit();	
	}
}


function gotoPrevPage(prevurl)
{
	if(prevurl == "/user/index/home") {
		var ctlyear = document.getElementById("year");
		if(ctlyear && ctlyear.value != "")
			prevurl = "/user/member/eventlist";

	}
	document.getElementById("myform").action = prevurl;
	document.getElementById("myform").submit();	
}

function onClearPrintPhotos()
{
	if(confirm("カート内を入れた写真を全てクリアーします。 宜しいですか？")) {
		document.getElementById("printphoto").value = "";

		if(document.getElementById("cntcart"))
			document.getElementById("cntcart").innerHTML = "0";
		document.getElementById("cartcount").value = 0;

		if(document.getElementById("sumcost"))
			document.getElementById("sumcost").innerHTML = "0";
		document.getElementById("totalcost").value = 0;	

		document.getElementById("type").value = "";
		document.getElementById("bonuscount").value = 0;
		document.getElementById("remainbonus").value = 0;
		document.getElementById("bonusphoto").value = "";
	
		document.getElementById("myform").action = "/user/index/home";
		document.getElementById("myform").submit();
	}
}

function onCart()
{
	if(document.getElementById("cartcount").value == 0)
	{
		alert("カート内に商品はありません。");
		return;
	}

	document.getElementById("myform").action = "/user/index/cart?flag=cart"
	document.getElementById("myform").submit();	
}

/******************* Member Page **********************/
function onClickMemberNo(mb_no)
{
	document.getElementById("myform").action = "/user/member/year?mb_no="+mb_no;
	document.getElementById("myform").submit();
}

function onClickYear(vyear)
{
	document.getElementById("myform").action = "/user/member/eventlist?year="+vyear;
	document.getElementById("myform").submit();	
}

function onClickMemberEvent(event_no)
{
	document.getElementById("myform").action = "/user/index/event?flag=member&event_no="+event_no;
	document.getElementById("myform").submit();
}

/******************* Event Page **********************/
function onChangePagePer(itemcount, gourl)
{
	document.getElementById("newpageper").value = itemcount;
	document.getElementById("myform").action = "/user/index/" + gourl;
	document.getElementById("myform").submit();	
}

function onClickPageNumber(pageno, gourl)
{
	document.getElementById("pageindex").value = pageno;
	document.getElementById("myform").action = "/user/index/" + gourl;
	document.getElementById("myform").submit();		
}

function onClickNextPage(pageno, gourl)
{
	document.getElementById("pageindex").value = pageno + 1;
	document.getElementById("myform").action = "/user/index/" + gourl;
	document.getElementById("myform").submit();			
}

function onClickPrevPage(pageno, gourl)
{
	document.getElementById("pageindex").value = pageno - 1;
	document.getElementById("myform").action = "/user/index/" + gourl;
	document.getElementById("myform").submit();
}

function onClickPrintPhotoCount(phno, incval)
{
	if(document.getElementById("type").value != "bonus") {
		var printcnt = parseInt(document.getElementById("printcnt_"+phno).innerHTML);

		printcnt = printcnt + incval;
		if(printcnt < 0)
			printcnt = 0;
		document.getElementById("printcnt_"+phno).innerHTML = printcnt;

		var printvalues = document.getElementById("printphoto").value.split('~');
		printvalues.pop();
		flagFound = false;
		printphoto = "";
		countcart = 0;
		for(i = 0; i < printvalues.length; i++)
		{
			tmp = printvalues[i].split(':');
			if(parseInt(tmp[0]) == phno) {
				printvalues[i] = phno + ":" + printcnt;
				flagFound = true;
			}
			printphoto = printphoto + printvalues[i] + "~";

			tmp = printvalues[i].split(':');
			countcart += parseInt(tmp[1]);
		}
		if(!flagFound) {
			printphoto = printphoto + phno + ":" + printcnt + "~";
			countcart += printcnt;
		}
		document.getElementById("printphoto").value = printphoto;

		document.getElementById("cntcart").innerHTML = countcart;
		document.getElementById("cartcount").value = countcart;

		document.getElementById("sumcost").innerHTML = countcart * parseInt(document.getElementById("photoprice").value);
		document.getElementById("totalcost").value = countcart * parseInt(document.getElementById("photoprice").value);
	}
	else {
		var limitcnt = parseInt(document.getElementById("remphcnt_"+phno).value);		
		var remainbonus =  parseInt(document.getElementById("remainbonus").value);
		var printcnt = limitcnt + parseInt(document.getElementById("printcnt_"+phno).innerHTML);

		tmpprintcnt = printcnt;
		printcnt = printcnt + incval;
		if(printcnt < limitcnt)
			printcnt = limitcnt;
		remainbonus = remainbonus - (printcnt - tmpprintcnt);
		if(remainbonus < 0) {
			remainbonus = 0;
			printcnt = tmpprintcnt;
		}

		document.getElementById("printcnt_"+phno).innerHTML = printcnt - limitcnt;
		document.getElementById("remainbonus").value = remainbonus;

		printcnt = printcnt - limitcnt;
		var printvalues = document.getElementById("bonusphoto").value.split('~');
		printvalues.pop();
		flagFound = false;
		printphoto = "";
		countcart = 0;
		for(i = 0; i < printvalues.length; i++)
		{
			tmp = printvalues[i].split(':');
			if(parseInt(tmp[0]) == phno) {
				printvalues[i] = phno + ":" + printcnt;
				flagFound = true;
			}
			printphoto = printphoto + printvalues[i] + "~";

			tmp = printvalues[i].split(':');
			countcart += parseInt(tmp[1]);
		}
		if(!flagFound) {
			printphoto = printphoto + phno + ":" + printcnt + "~";
		}
		document.getElementById("bonusphoto").value = printphoto;

		document.getElementById("spanbonus").innerHTML = remainbonus;
		if(remainbonus == 0)
			document.getElementById("divbonus").innerHTML = "<a href='javascript:onClickEndBonus();' class='highlightit'><img src='/images/user/btn_bonusconfirm.png' border=0></a>";
		else
			document.getElementById("divbonus").innerHTML = "<img src='/images/user/btn_bonusconfirm_disable.png' border=0>";
	}
}

function onPhotoPreview(phno)
{
	if(document.getElementById("type").value == "bonus")
		return;

	var cnt = document.getElementById("printcnt_"+phno).innerHTML;
	document.getElementById("myform").action = "/user/index/preview?ph_no="+phno+"&cnt="+cnt;
	document.getElementById("myform").submit();
}

/******************* Cart Page **********************/
function onConfirmCart()
{
	var cartcount = document.getElementById("cartcount").value;
	var bonusper = document.getElementById("bonusper").value;
	if(Math.floor(cartcount / bonusper) > 0)
	{
		document.getElementById("spanbonuscount").innerHTML = Math.floor(cartcount / bonusper);
		$('#basic-modal-content').modal();
	}
	else
		onClickEndBonus();
}

function onClickBonusOfAll()
{
	document.getElementById("myform").action = "/user/index/home?type=bonus";
	document.getElementById("myform").submit();
}

function onClickBonusOfCart()
{
	document.getElementById("myform").action = "/user/index/cart?type=bonus";
	document.getElementById("myform").submit();
}

function onClickEndBonus()
{
	document.getElementById("myform").action = "/user/final/index";
	document.getElementById("myform").submit();
}

/******************* Photo Preview Page **********************/
function onClickNumberPad(num)
{
	var pricespan = document.getElementById("pricespan");
	var countspan = document.getElementById("countspan");
	var sumspan = document.getElementById("sumspan");
	var photoprice = parseInt(document.getElementById('photoprice').value);

	countspan.innerHTML = countspan.innerHTML + num;
	cntvalue = parseInt(countspan.innerHTML);

	sumspan.innerHTML ='\\' + (photoprice * cntvalue);
	countspan.innerHTML = cntvalue;
}

function onClickNumberOne(num)
{
	var pricespan = document.getElementById("pricespan");
	var countspan = document.getElementById("countspan");
	var sumspan = document.getElementById("sumspan");
	var photoprice = parseInt(document.getElementById('photoprice').value);

	countspan.innerHTML = num;
	cntvalue = parseInt(countspan.innerHTML);

	sumspan.innerHTML ='\\' + (photoprice * cntvalue);
	countspan.innerHTML = cntvalue;
}

function onInputCart()
{
	var phno = parseInt(document.getElementById("ph_no").value);
	var printcnt = parseInt(document.getElementById("countspan").innerHTML);

	var printvalues = document.getElementById("printphoto").value.split('~');
	printvalues.pop();
	flagFound = false;
	printphoto = "";
	countcart = 0;
	for(i = 0; i < printvalues.length; i++)
	{
		tmp = printvalues[i].split(':');
		if(parseInt(tmp[0]) == phno) {
			printvalues[i] = phno + ":" + printcnt;
			flagFound = true;
		}
		printphoto = printphoto + printvalues[i] + "~";

		tmp = printvalues[i].split(':');
		countcart += parseInt(tmp[1]);
	}
	if(!flagFound) {
		printphoto = printphoto + phno + ":" + printcnt + "~";
		countcart += printcnt;
	}
	document.getElementById("printphoto").value = printphoto;
	document.getElementById("cartcount").value = countcart;
	document.getElementById("totalcost").value = countcart * parseInt(document.getElementById("photoprice").value);

	document.getElementById("myform").action = "/user/index/event";
	document.getElementById("myform").submit();
}


/******************* Final Page **********************/
function onEndOrderAddress()
{
	var od_address_name1 = document.getElementById("od_address_name1");
	var od_address_name2 = document.getElementById("od_address_name2");
	var od_address_mailnumber = document.getElementById("od_address_mailnumber");
	var od_address_dodo = document.getElementById("od_address_dodo");
	var od_address_1 = document.getElementById("od_address_1");
	var od_address_2 = document.getElementById("od_address_2");
	var od_address_3 = document.getElementById("od_address_3");
	var od_address_phone = document.getElementById("od_address_phone");

	if(od_address_name1.value == "")
	{
		alert("[氏名]を正しく入力してください。");
		od_address_name1.focus();
		od_address_name1.select();
		return;
	}

	if(od_address_name2.value == "")
	{
		alert("[氏名(カタカナ)]を正しく入力してください。");
		od_address_name2.focus();
		od_address_name2.select();
		return;
	}


	if(od_address_mailnumber.value == "")
	{
		alert("[郵便番号]を正しく入力してください。");
		od_address_mailnumber.focus();
		od_address_mailnumber.select();
		return;
	}

	if(od_address_dodo.value == "")
	{
		alert("[都道府県]を正しく入力してください。");
		od_address_dodo.focus();
		od_address_dodo.select();
		return;
	}

	if(od_address_1.value == "" && od_address_2.value == "" && od_address_3.value == "")
	{
		alert("[住所]を正しく入力してください。");
		od_address_1.focus();
		od_address_1.select();
		return;
	}

	if(od_address_phone.value == "")
	{
		alert("[電話番号]を正しく入力してください。");
		od_address_phone.focus();
		od_address_phone.select();
		return;
	}

	document.getElementById("myform").action = "/user/final/end";
	document.getElementById("myform").submit();
}

function onEndOrder()
{
	document.getElementById("myform").action = "/user/final/end";
	document.getElementById("myform").submit();
}
function onBackAddress()
{
	document.getElementById("myform").action = "/user/final/index";
	document.getElementById("myform").submit();
}
function onAddressOrder()
{
	document.getElementById("myform").action = "/user/final/address";
	document.getElementById("myform").submit();
}

function onConfirmOrdering()
{
	location.href = "/user/index/home";
}

function onZoomPreviewPhotoThumb(imgurl)
{
	document.getElementById("imgzoom").src = imgurl;
	$('#basic-modal-content').modal();
}