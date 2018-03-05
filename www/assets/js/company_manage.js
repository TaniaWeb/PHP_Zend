function submitCompanySearch()
{
	document.getElementById("search_form").submit();
}

function searchByStatus(status)
{
	document.getElementById("search_status").value = status;
	submitCompanySearch();
}

function searchWithOrder(key)
{
	document.getElementById("search_orderby").value = key;
	submitCompanySearch();
}

function nextPage()
{
	if(document.getElementById("search_page").value=="")
		document.getElementById("search_page").value = 1;
	else
		document.getElementById("search_page").value += 1;

	submitCompanySearch();
}

function prevPage()
{
	document.getElementById("search_page").value -= 1;

	submitCompanySearch();
}

function viewCompanyProfile(company_id)
{
	window.location.href = "/admin/company/profile?company_id="+company_id;
}

function removeCompany(event, company_id)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/company/remove?id="+company_id;
	return false;
}

function editCompany(event, company_id)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/company/edit?id="+company_id;
	return false;
}

function cancelSubmit(event)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/company/list";
	return false;
}

function addNewUser(company_id)
{
	window.location.href = "/admin/user/add?company_id="+company_id;
}

function removeUser(user_id)
{
	//window.location.href = "/admin/index/add?id="+company_id;
}

function editUser(user_id)
{
	window.location.href = "/admin/user/edit?id="+user_id;
}