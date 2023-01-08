var loader = document.getElementById('loader');

function changehtml(div_obj,f){
  var xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  xhr.open('get', f, true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
          div_obj.innerHTML = xhr.responseText;
      }
  }
  xhr.send();
}

function loading_start(){
  loader.style.display="block";
}
function loading_stop(){
  loader.style.display="none";
}

function get_ver_otp(){
  var pescode = document.getElementById('pescode').value;
  var otpform= document.getElementById('otp-form');
  loading_start();
  var data="pescode="+pescode;
  var data1="pescode="+pescode;
  $.ajax({
    url: "include/booking_ver_otp.php",
    type: "POST",
    data:  data,
    cache: false,
    success: function(data)
      {

        otpform.innerHTML=data;
        //document.getElementById('pescode').value=pescode;
        loading_stop();

      },
      error: function()
      {
      }
    });
}

function verifyotp(pescode){
loading_start();
var data="pescode="+pescode+"&otp="+$('#otp').val();
var otpform= document.getElementById('otp-form');
$.ajax({
  url: "include/booking_ver_paymnt.php",
  type: "POST",
  data:  data,
  cache: false,
  success: function(data)
    {

      otpform.innerHTML=data;
      //document.getElementById('pescode').value=pescode;
      loading_stop();

    },
    error: function()
    {
    }
  });
}

function verify_conf(pescode,otp){
loading_start();
var data="pescode="+pescode+"&otp="+otp;
var otpform= document.getElementById('otp-form');
$.ajax({
  url: "include/booking_ver_conf.php",
  type: "POST",
  data:  data,
  cache: false,
  success: function(data)
    {
      otpform.innerHTML=data;
      loading_stop();
    },
    error: function()
    {
    }
  });
}

function back(){
  var otpform= document.getElementById('otp-form');
  changehtml(otpform,"html_include/enter_pes_code.html");
}
