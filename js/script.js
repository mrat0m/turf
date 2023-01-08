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

function cancel(d){
  $("#exampleModal").modal();
  document.getElementById('cancel_id').value=d;
}

function cancel_acc(){
  $("#cancel_acc").modal();
}

function get_otp(){
  var data = "phone="+document.getElementById('phone').value;
  var phone = document.getElementById('phone').value;
  var otpform= document.getElementById('otp-form');
    if(isNaN(phone)==false && phone.toString().length=='10'){
      loading_start();
      var data1=data;
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

               var alert_ht="<div class='alert alert-warnig alert-dismissible fade show' role='alert'>";
                alert_ht+=" Phone is <strong>Already registered</strong>";
                alert_ht+="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                alert_ht+="<span aria-hidden='true'>&times;</span>;"
                 alert_ht+="</button> </div>";
                document.getElementById('message').innerHTML=alert_ht;
                loading_stop();

            }else{
              $.ajax({
                url: "include/update_phone_send_otp.php",
                type: "POST",
                data:  data,
                cache: false,
                success: function(data)
                  {
                      console.log(data);
                      changehtml(otpform,"html_include/verify-otp_t2.html");
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

function ver_otp(){

}
