@if(session()->has('message'))
                    <div class="alert alert-info">
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>  
                    <span aria-hidden='true'>×</span></button>{{ session('message') }}
</div>  

@endif