/*******************************************************************************************************
	FILENAME	: COMMON.JS
	PURPOSE	: 공통적으로 리용하는 Javascript함수들을 정의한다.
	AUTHOR	: jckim
	DATE   : 2016-01-16
********************************************************************************************************/
//문자가 암호나 아이디로 사용가능한 문자인가를 검사하는 함수
function isValidChar(ch)
{
	if(	 ch == '\'' || ch == '\"' || ch== ';' )
		return false;

	return true;
}

//문자렬이 암호나 아이디로 사용가능한 문자렬인가를 검사하는 함수
function isValidString(str)
{
	if ( str.length == 0 )
	{//빈문자렬
		return false;
	}

	/*var i;
	for( i = 0; i < str.length; i++ )
		if( !isValidChar( str.substring(i, i+1) ) )
			return false;*/

	return true;
}

//브라우저 타입 대응
function userAgent() {

    var browserType = "";
    if (navigator.userAgent.indexOf("MSIE") != -1) {
        browserType = "IE";
        return browserType;
    }
    if (navigator.userAgent.indexOf("Firefox") != -1) {
            browserType = "FF";
            return browserType;
    }
    if (navigator.userAgent.indexOf("Mozilla") != -1) {
            browserType = "MZ";
            return browserType;
    }
    if (navigator.userAgent.indexOf("Opera") != -1) {
            browserType = "OP";
            return browserType;
    }
    if (navigator.userAgent.indexOf("Safari") != -1) {
            browserType = "SF";
            return browserType;
    }
    if (navigator.userAgent.indexOf("Mac") != -1) {
            browserType = "MC";
            return browserType;
    }
    browserType = "NG";  // 지원하지 않는 브라우저
    return browserType;
}

// XMLHttpRequest 생성
function newXMLHttpRequest() {
    var reqHttp;   
    if (window.ActiveXObject) {	 // IE
        try {
            reqHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                reqHttp =  new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e1) {               
                reqHttp =  null;
            }
        }
    } else if (window.XMLHttpRequest){  // IE 이외
        try {
            reqHttp =  new XMLHttpRequest();
        } catch (e) {
            reqHttp =  null;
        }
    }
    return reqHttp;
}
