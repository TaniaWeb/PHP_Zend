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

function addUser()
{
	window.location.href = "/admin/user/add";
}

function editUser(event, user_id)
{
	event.preventDefault();
	event.stopPropagation();
	window.location.href = "/admin/user/edit?id="+user_id;
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