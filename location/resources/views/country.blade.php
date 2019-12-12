@extends('layouts.default')
@section('content')
   <div>
        <label>Select Country:</label>
        <select id="country">
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
		</select>
   </div>
   <div id="demo">
        <label>Select state:</label>
            <select id="stateId">   
		</select>
   </div>
   <div id="demo">
        <label>Select state:</label>
            <select id="city">   
		</select>
   </div>
  
@endsection
@section('script')
    <script type="text/javascript">
    //    $(document
        $("#country").on('change', function() {
            var id=$(this).val();
            var requestURL = "{{url('/get-country')}}/" + id;
            console.log(requestURL);
            //  alert(id);
            $.ajax({
			  type: "GET",
			  url: requestURL,
			  success: function(data) {
                var data = JSON.parse(data);
             console.log(data);
             $("#stateId").html("");
                 //alert(data);
                 //var s ="<select id='state'>";
                 var length=data.length;
               // alert(length);
               
               var name ="";
                 for(item in data) 
                  {
                      var s=data[item];
                     name += "<option value='" + s["id"] + "'>" + s["state_name"] + "</option>";
			  	 	$("#stateId").append(name);
                 }
            }}); 
        });
        $("#stateId").on('change',function(){
            var id=$(this).val();
            var requestURL = "{{url('/get-state')}}/" + id;
            $.ajax({
			  type: "GET",
			  url: requestURL,
			  success: function(data) {
                var data = JSON.parse(data);
             console.log(data);
             $("#city").html("");
                 //alert(data);
                 //var s ="<select id='state'>";
                 var length=data.length;
               // alert(length);
               
               var name ="";
                 for(item in data) 
                  {
                      var s=data[item];
                     name += "<option value='" + s["id"] + "'>" + s["city_name"] + "</option>";
			  	 	$("#city").append(name);
                 }
            }}); 
        });
       
    </script>
    @endsection