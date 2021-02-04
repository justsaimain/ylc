var exerciseId;


$('.true-btn').on('click',function(){
    let answer = true;
    let _token   = $('meta[name="csrf-token"]').attr('content');
    exerciseId = $(this).data('id');

    $.ajax({
        url: "/student/true-false-check",
        type: "POST",
        data: {
            exerciseId : exerciseId,
            answer: answer,
            _token: _token
        },
        success:function(response){
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


$('.false-btn').on('click',function(){
    let answer = false;
    let _token   = $('meta[name="csrf-token"]').attr('content');
    exerciseId = $(this).data('id');

    $.ajax({
        url: "/student/true-false-check",
        type: "POST",
        data: {
            exerciseId : exerciseId,
            answer: answer,
            _token: _token
        },
        success:function(response){
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

    console.log(exerciseId);

});
