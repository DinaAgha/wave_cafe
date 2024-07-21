<!DOCTYPE html>


<head>
  <title>Clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
  <h2>Clients</h2>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Registration Date</th>
       <th>Name</th>
       <th>Username</th>
       <th>Email</th>
       <th>Active</th>
       <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <td>{{ $users->email_verified_at }}</td>
      <td>{{ $users->name }}</td>
      <td>{{ $users->usreName }}</td>
     <td>{{ $users->email }}</td>
     <td>{{ $users->active ? 'Yes' : 'No' }}</td>
     <td><a href="{{ route('editUsers', $users->id)}}">Edit</a></td>
       @csrf
       @method('DELETE')
            <input type="hidden" value="{{ $users->id }}" name="id">
            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this client?')">
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
    
                    
           