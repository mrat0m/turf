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
var name;
function getotp(t){
  phone = document.getElementById('phone').value;
  name = document.getElementById('name').value;
  var otpform= document.getElementById('otp-form');
    if(isNaN(phone)==false && phone.toString().length=='10'){
      loading_start();
      var data="phone="+phone+"&name="+name;
      var data1="phone="+phone+"&name="+name;
      $.ajax({
        url: "include/isexist.php",
        type: "POST",
        data:  data1,
        cache: false,
        success: function(data1)
          {
            console.log(data1);
            var  usr = JSON.parse(data1);
            if(usr.isexist==true){

               var alert_ht="<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
                alert_ht+=" Phone is <strong>Already registered</strong>";
                alert_ht+="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                alert_ht+="<span aria-hidden='true'>&times;</span>";
                 alert_ht+="</button> </div>";
                document.getElementById('message').innerHTML=alert_ht;
                loading_stop();

            }else{
              $.ajax({
                url: "include/send_otp.php",
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
  var data="phone="+phone+"&name="+name+"&otp="+otp;
    loading_start();
  $.ajax({
    url: "include/verify_otp.php",
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
              //alert("ASDsad");
              window.location="dashboard.php";
            }
        },
        error: function()
        {
        }
      });

}
