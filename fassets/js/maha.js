/*copy right@Sherin K.J. please do not modify */
var validateForm = function(v,err){
	if(document.getElementById(err).innerHTML.length==0) return true;
	return false;
};
var verifyPwd = function (v, err) {
	pwd = v.id;
    vpwd =document.getElementById(pwd).value;
    if(vpwd.length==0) return;
    if (vpwd.length < 8) {
        document.getElementById(err).innerHTML ="Need atleast 8 characters...";
		$("#" + pwd).focus();
		return;
    }
	/*Complex password starts...*/
	var hasUpperCase = /[A-Z]/.test(vpwd);
	var hasLowerCase = /[a-z]/.test(vpwd);
	var hasNumbers = /\d/.test(vpwd);
	var hasNonalphas = /\W/.test(vpwd);
	if (hasUpperCase + hasLowerCase + hasNumbers + hasNonalphas < 3){
		 document.getElementById(err).innerHTML ="Password need to follow atleast 3 rules(Upper case,Lower case,Numbers,Non-alpha numeric) ";
		 $("#" + pwd).focus();
		 return;
	}
	/*Complex password ends...*/
	document.getElementById(err).innerHTML ="";
};

var confirmPwd = function (pwd, cpwd, err) {
    vpwd = document.getElementById(pwd).value;
    vcpwd =document.getElementById(cpwd).value;
    if (vpwd !== vcpwd) {
        document.getElementById(err).innerHTML ="Password Not Matching !!";
    } else {
        document.getElementById(err).innerHTML ="";
    }
};
var verifyText = function (e,err) {
	document.getElementById(err).innerHTML ="";
    var code;
    if (!e)
        var e = window.event;
    if (e.keyCode)
        code = e.keyCode;
    else if (e.which)
        code = e.which;
    var character = String.fromCharCode(code);
    var AllowRegex = /^[\ba-zA-Z\s-]$/;
    if (AllowRegex.test(character))
        return true;
	document.getElementById(err).innerHTML =alert("Only Text Values");
    return false;
};
var varifyLength = function (v,err,min,max) {
	document.getElementById(err).innerHTML = '';
	if(v.value.length<max || v.value.length>max) {
		document.getElementById(err).innerHTML =alert("The number you have entered is greater than 10 digits and first 10 digits will be stored");
		return false;
        
	}
};
var verifyPhone = function (v,e,err,len) {
	document.getElementById(err).innerHTML ='';
	if(v.value.length>=len) {
		document.getElementById(err).innerHTML ="Max " + len + " allowed";
		return false;
	}
    var code;
    if (!e)
        var e = window.event;
    if (e.keyCode)
        code = e.keyCode;
    else if (e.which)
        code = e.which;
    var character = String.fromCharCode(code);
    var AllowRegex = /^[\b0-9\s-]$/;
    if (AllowRegex.test(character))
        return true;
	document.getElementById(err).innerHTML =alert("Only Text Value");
    return false;
};

var ageValidate = function(v,err,min,max,sh){
	dt = new Date(v.value);
	curdt = new Date();
	dif =curdt.getTime() - dt.getTime();
	y =  (1000 * 3600 * 24 * 365); // 1 year
	dif = Math.round(dif / y );
	if(dif < min || dif > max ){
		document.getElementById(err).innerHTML ="Age is: " + dif + ", Should between (" + min + " and " + max + ")";
		document.getElementById(sh).innerHTML = "";
	}else{
		document.getElementById(err).innerHTML ="";
		document.getElementById(sh).innerHTML = dif;
	}
};

var dateCompare = function(dt1,dt2,ndaysmin,ndaysmax,err,sh){
	x = new Date(document.getElementById(dt1).value);
	y = new Date(document.getElementById(dt2).value);
	
	dif =y.getTime() - x.getTime();
	d =  (1000 * 3600 * 24 ); // 1 day
	dif = Math.round(dif /d );
	if(ndaysmax==0 ){
		if(dif < ndaysmin){
			document.getElementById(err).innerHTML ="Date difference is: " + dif + ", Should >=n (" + ndaysmin + ")";
			document.getElementById(sh).innerHTML = "";
		}else{
			document.getElementById(err).innerHTML ="";
			document.getElementById(sh).innerHTML = dif;
		}
	}else if(dif < ndaysmin || dif > ndaysmax ){
		document.getElementById(err).innerHTML ="Date difference is: " + dif + ", Should between (" + ndaysmin + " and " + ndaysmax + ")";
		document.getElementById(sh).innerHTML = "";
	}else{
		document.getElementById(err).innerHTML ="";
		document.getElementById(sh).innerHTML = dif;
	}
};

var dateWithCur = function(dt1,ndaysmin,ndaysmax,err,sh){
	x = new Date(document.getElementById(dt1).value);
	y = new Date();
	
	dif = x.getTime() - y.getTime();
	d =  (1000 * 3600 * 24 ); // 1 day
	dif = Math.round(dif /d );
	if(ndaysmax==0 ){
		if(dif < ndaysmin){
			document.getElementById(err).innerHTML ="Date difference is: " + dif + ", Should >= (" + ndaysmin + ")";
			document.getElementById(sh).innerHTML = "";
		}else{
			document.getElementById(err).innerHTML ="";
			document.getElementById(sh).innerHTML = dif;
		}
	}else if(dif < ndaysmin || dif > ndaysmax ){
		document.getElementById(err).innerHTML ="Date difference is: " + dif + ", Should between (" + ndaysmin + " and " + ndaysmax + ")";
		document.getElementById(sh).innerHTML = "";
	}else{
		document.getElementById(err).innerHTML ="";
		document.getElementById(sh).innerHTML = dif;
	}
};