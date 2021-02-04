$('.option_images_input').on('change' , function(){

    var totalfiles = document.getElementById('option_images_input').files.length;

    var imageNames = [];
    var ul = document.getElementById('image_options_list');

    for (var index = 0; index < totalfiles; index++) {
        imageNames.push(document.getElementById('option_images_input').files[index]['name']);
        var li = document.createElement("li");
        li.className = 'list-group-item';
        li.appendChild(document.createTextNode(document.getElementById('option_images_input').files[index]['name']));
        ul.appendChild(li);
    }

});

$('.mcq_images_answer_btn').on('click',function(){
    var exerciseId;
    let answer = $(this).data('answer');
    let _token   = $('meta[name="csrf-token"]').attr('content');
    exerciseId = $(this).data('id');

    $.ajax({
        url: "/student/multiple-choice-check",
        type: "POST",
        data: {
            exerciseId : exerciseId,
            answer: answer,
            _token: _token
        },
        success:function(response){
            console.log(response);
            if(response.is_currect == true) {
                $('.result-box-text').text('Your answer is Currect.')
                $('.result-box').addClass('text-success');
                $('.result-box').css('display','block');
                $('.result-box-text').addClass('text-success');
                $('.result-box-icon').addClass('fa-check-circle');
                $('.result-box-text').removeClass('text-danger');
                $('.result-box').removeClass('text-danger');
                $('.result-box-icon').removeClass('fa-times-circle');
                $('.result-box').removeClass('d-none');
            } else{
                $('.result-box-text').text('Your answer is Wrong.')
                $('.result-box').css('display','block');
                $('.result-box-text').removeClass('text-success');
                $('.result-box-icon').removeClass('fa-check-circle');
                $('.result-box').addClass('text-danger');
                $('.result-box').removeClass('text-success');
                $('.result-box-text').addClass('text-danger');
                $('.result-box-icon').addClass('fa-times-circle');
                $('.result-box').removeClass('d-none');
            }
        }

    })

});
