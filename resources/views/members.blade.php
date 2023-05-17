@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Member Details</div>
                  <div class="card-body">
                        <form action="{{ route('search') }}" method="POST">
                            <input type="text" name="search_text" id = 'search_text' />
                            <button type="submit">Search</button>
                            @csrf
                            <table align="center" border = 1> 
                                <tr >
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($members as $member)
                                    <tr >
                                        <td>{{$member['name']}}</td>
                                        <td>{{$member['email']}}</td>
                                        <td>{{$member['address']}}</td>
                                        <td>
                                            <button type="button">
                                                <a style="text-decoration:none; color:black;" href={{"insert"}}>Insert
                                                </a>
                                            </button>
                                            <button type="button">
                                                <a style="text-decoration:none; color:black;" href={{"edit/".$member['id']}}>Edit
                                                </a>
                                            </button>
                                            <button type="button" onclick='deleteFuction({{$member['id']}})'>Delete</button>
                                        </td>    
                                    </tr>
                                @endforeach    

                            </table>
                      </form>
                      <span >{{$members->links()}}</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
 
@endsection
<style type="text/css">
    .w-5{
            display:none;
        }
</style>

<script>
    function deleteFuction(id) {
        console.log(id);
        $.ajax(
            {
                url: "delete/"+id,
                type: 'GET',
                data: {
                    "id": id,
                },
                success: function (){
                    console.log("it Works");
                    window.location = '/get-members';
                }
        });
}
</script>
