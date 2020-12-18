$('#region_select').on('change',function(){
    var region_id = $('option:selected', this).attr('data-reg');
    $.ajax({
        url : 'http://myancity.devsm.net/api/region/' + region_id,
        data: {
          "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'get',
        dataType: 'json',
        success: function( result )
        {
            $('#township_select').empty();
            $.each( result, function(k, v) {
                $('#township_select').append($('<option>', {value:v.name, text:v.name}));
             });
        },
        error: function()
       {
           //handle errors
           alert('Township API Errors!!!');
       }
     });
});
