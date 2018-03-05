function addBrand()
{
	window.location.href = "/admin/product/addBrand";
}

function editBrand(event, brand_id)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/product/editBrand?id="+brand_id;
	return false;
}

function listBrand()
{
	window.location.href = "/admin/product/brandlist";
}

function listProduct(brand_id)
{
	window.location.href = "/admin/product/productlist?brand_id"+brand_id;
}

function submitUserSearch()
{
	document.getElementById("search_form").submit();
}

function searchByStatus(status)
{
	document.getElementById("search_status").value = status;
	submitUserSearch();
}

function searchWithOrder(key, asc)
{
	document.getElementById("search_orderby").value = key;
	document.getElementById("search_ordertype").value = asc;
	submitUserSearch();
}

function nextPage()
{
	if(document.getElementById("search_page").value=="")
		document.getElementById("search_page").value = 1;
	else
		document.getElementById("search_page").value += 1;

	submitUserSearch();
}

function prevPage()
{
	document.getElementById("search_page").value -= 1;

	submitUserSearch();
}

function viewUserProfile(user_id)
{
	window.location.href = "/admin/user/profile?user_id="+user_id;
}

function removeUser(event, user_id)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/user/remove?id="+user_id;
	return false;
}

function cancelSubmit(event)
{
	window.location.href = "/admin/index/users";
	return false;
}

function viewUserList()
{
	window.location.href = "/admin/user/list";
}