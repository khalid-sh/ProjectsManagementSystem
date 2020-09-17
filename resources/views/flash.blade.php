@if ($errors->any())
    
        <ul class="list-group ">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul><br>
    
@endif
@if (Session::has('success'))
    
    <ul class="list-group ">
            <li class="list-group-item list-group-item-success">{{ Session::get('success') }}</li>
      
    </ul><br>

@endif
@if (Session::has('warning'))
    
    <ul class="list-group ">
            <li class="list-group-item list-group-item-warning">{{ Session::get('warning') }}</li>
      
    </ul><br>

@endif
@if (Session::has('danger'))
    
    <ul class="list-group ">
            <li class="list-group-item list-group-item-danger">{{ Session::get('danger') }}</li>
      
    </ul><br>

@endif