<<<<<<< HEAD
$(function() {
  var count=0;
  $('#tableUsuarios').DataTable({
    "bInfo":false
  ,"bLengthChange":false
  ,"bFilter":false
  ,"bPaginate":false
  ,"bSort": false
  ,"language.infoEmpty":false
  });

  $("#formAjax").validate({
    rules:{
        email:{
          //required:true,
          //email:true
        },
        contrasenia:{
        //  required:true
        }
    },
    submitHandler:function(){
      var a = $('#formAjax').serialize();
      $.ajax({
        type:"POST",
        dataType:"JSON",
        url:"sender.php",
        data:a
      })
      .then(function (response){
        if(response.id == "1"){
          count++;
          $("#posts").append('<tr><th class="idtable">'+ count + '</th><td>'+ response.email + '</td><td>'+ response.pass + '</td></tr>');
          console.log(response.mensaje);
        }else{
          console.log(response.mensaje);
        }
      })
    }
  });

  var $posts = $('#posts');
  var root = 'https://jsonplaceholder.typicode.com'
  $.ajax({
        url: root + '/users',
        method: 'GET',
        success: function(posts){
          $.each(posts,function(i,data){
            count++;
             $("#posts").append('<tr><th class="idtable">'+ data.id + '</th><td>'+ data.email + '</td><td>'+ data.username + '</td></tr>');
          });
        }
  });
});
