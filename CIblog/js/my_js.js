
/*
function startTime()
{
var today=new Date()
var h=today.getHours()
var m=today.getMinutes()
var s=today.getSeconds()
// add a zero in front of numbers<10
m=checkTime(m)
s=checkTime(s)
document.getElementById('time').innerHTML=h+":"+m+":"+s
t=setTimeout('startTime()',500)
}

function checkTime(i)
{
if (i<10) 
  {i="0" + i}
  return i
}


$(function)(){
	$("#signin-email").bind({
		keyup:function(){
			if(this.value.length != 0){
				$(this).next().hide();
			}
		},
		blur:function(){
			if(this.value.length == 0){
				$(this).next().slideDown("fast");
			}
		}
	});
}


$(function() {
  // 你可以在这里继续使用$作为别名...
  $("#signin-email").keyup(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length != 0){
  $(this).next().hide();
  }
});
});

$(function() {
  // 你可以在这里继续使用$作为别名...
  $("#signin-email").blur(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length == 0){
  $(this).next().slideDown("fast");
  }
});
});*/

$(function() {
  // 你可以在这里继续使用$作为别名...
  $("#signin-email").keyup(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length != 0){
  $(this).next().hide();
  }
}).blur(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length == 0){
  $(this).next().slideDown("fast");
  }
});
});
/*
$(function() {
  // 你可以在这里继续使用$作为别名...
  $("#signin-email").blur(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length == 0){
  $(this).next().slideDown("fast");
  }
});
});


*/

$(function() {
  // 你可以在这里继续使用$作为别名...
  $("#signin-password").keyup(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length != 0){
  $(this).next().hide();
  }
}).blur(function(){
  //$("lable[for = 'signin-email']").hide();
  if(this.value.length == 0){
  $(this).next().slideDown("fast");
  }
});
});


/*
jquery(document).ready(function() {
	$("#signin-email").ready(function(){
	if(this.value.length != 0){
	$(this).next().hide();
	}
});
});
*/
function test(){
	var a = document.getElementById("signin-email");
		var b = a.nextElementSibling;
	if(a.value.length !=0){
		b.display = "none" ;
		b.overflow = "hidden" ;
	}
}