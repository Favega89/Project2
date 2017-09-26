
$(function() {
  var count=0;
$('#tableUsuarios').DataTable({

});

$("#id").on('click',function(event){
})
$("#user").on('click',function(event){
  //To Do
})
$("#id").on('click',function(event){
  //To Do
})

$("#enviar").on('click',function(){
//  validator();
})
$("#formAjax").validate({
  rules:{
      email:{
        required:true,
        email:true
      },
      contrasenia:{
        required:true
      }
  },
  submitHandler:function(){
    var a = $('#formAjax').serialize();
    alert(a);
    $.ajax({
      type:"POST",
      dataType:"JSON",
      url:"sender.php",
      data:a
    })
    .then(function (response) {
      count++;
      $("#posts").append('<tr><th class="idtable">'+ count + '</th><td>'+ response.mail + '</td><td>'+ response.pass + '</td></tr>');
    })
    return false;
  }
});


// jquery get data sw
var $posts = $('#posts');
var root = 'https://jsonplaceholder.typicode.com'
$.ajax({
      url: root + '/users',
      method: 'GET',
      success: function(posts){
        console.log(posts);
        $.each(posts,function(i,data){
          count++;
           $("#posts").append('<tr><th class="idtable">'+ data.id + '</th><td>'+ data.email + '</td><td>'+ data.username + '</td></tr>');
        });
      }
});

});
