<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
     <div class="croud" style="margin-top:10px;">
     <button class="btn btn-primary load">Ajax load</button>
     <table class="table">
            <thead>
                <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">city</th>
                <th scope="col">action</th>
                </tr>
            </thead>
            <tbody id="user_info">
            @foreach($user as $row)
                <tr>
                  <input type="hidden" value="{{$row->id}}" id="userId">
                   <td>{{$row->name}}</td>
                   <td>{{$row->email}}</td>
                   <td>{{$row->number}}</td>
                   <td>{{$row->city}}</td>
                   <td>
                     <a href="#" class="btn btn-warning btn-sm edit">update</a>
                     <a href="#" class="btn btn-danger btn-sm delete">delete</a>
                   </td>
                </tr>
           @endforeach
            </tbody>
            </table>
</div>
</div>





  <!-- Modal -->
  @include('include.update_include')
  



<script>
 $(document).ready(function(){
        $.get("{{URL::to('user')}}",function(data){
               // console.log(data);
            // $.each(data,function(i,value){
            //     var tr = $("<tr/>");
            //     tr.append($("<td/>",{
            //         text: value.name
            //     })).append($("<td/>",{
            //         text: value.email
            //     })).append($("<td/>",{
            //         text: value.number
            //     })).append($("<td/>",{
            //         text: value.city
            //     })).append($("<td/>",{
            //         html: "<a href='' class='btn btn-warning btn-sm update'>update</a> <a href='' class='btn btn-danger btn-sm'>delete</a>"
            //     }))
            //     $('#user_info').append(tr);
            //   alert(value.name);
            // })
        })
    //*****update data******/
    $('.edit').on('click',function(){
            $('#myModal').modal({
            show: 'false'
        });
       var id = $(this).parents('tr').find('#userId').val();
      // alert(id);
       $.ajax({
        type: "get",
        url: '{{url('edit')}}/' + id,
        dataType: "json",
        success: function(data){
            console.log(data);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#number').val(data.number);
            $('#city').val(data.city);
            //alert(data.name);
        }
    });
    })

    $('.update').on('click',function(){
     // alert('update')
    })

 });


 $(document).ready(function(){

 });
</script>
</body>
</html>