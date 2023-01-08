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

var phone;
function getotp(t){
  phone = document.getElementById('phone').value;
  var otpform= document.getElementById('otp-form');
    if(isNaN(phone)==false && phone.toString().length=='10'){
      loading_start();
      var data="phone="+phone;
      $.ajax({
        url: "include/isexist.php",
        type: "POST",
        data:  data,
        cache: false,
        success: function(data1)
          {
            if(data1=="true"){
            $.ajax({
              url: "include/login_otp.php",
              type: "POST",
              data:  data,
              cache: false,
              success: function(data)
                {
                    console.log(data);
                    changehtml(otpform,"html_include/verify-otp.html");
                    loading_stop();
                },
                error: function()
                {
                }
              });
            }else{
              alert("User Not found");
              loading_stop();
            }
          },
          error: function()
          {
          }
        });

    }else{
      alert("Wrong Number");
    }
}


function verifyotp(t){
  var otp = document.getElementById('otp').value;
  var data="phone="+phone+"&otp="+otp;
    loading_start();
  $.ajax({
    url: "include/login_otp_verify.php",
    type: "POST",
    data:  data,
    cache: false,
    success: function(data)
      {
          var message= document.getElementById('message').innerHTML=data;

      },
      error: function()
      {
      }
    });
    data="phone="+phone+"&name="+name+"&otp="+otp;
    $.ajax({
      url: "include/user_info.php",
      type: "POST",
      data:  data,
      cache: false,
      success: function(data)
        {
            console.log(data);
            var user_info= JSON.parse(data);
            loading_stop();
            if(user_info.status=="verified"){
              if(user_info.type=="admin"){
                window.location="admin/dashboard.php";
              }else{
                window.location="dashboard.php";
              }
            }
        },
        error: function()
        {
        }
      });
}
