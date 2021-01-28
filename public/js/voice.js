var speechRecognition = window.webkitSpeechRecognition

var recognition = new speechRecognition();

recognition.lang = 'en-US';

var textbox = $('.voice-text-result');

var instructions = $('.instructions');

var content = '';

var exerciseId;

instructions.text('Click start to answer.');



recognition.continuous = true;

// recognition start

recognition.onstart = function(){
    $('.voice-start-btn').css('display','none');
    $('.result-box').css('display','none');
    textbox.val = '';
    content = '';
    instructions.text('Voice Recognition is on.');
}

recognition.onspeechend = function(){
    recognition.stop();
    instructions.text('Voice Recognition is ended.');
}

recognition.onerror = function(event){
    instructions.text('Voice Recognition on Error. Try Again.');
}

recognition.onresult = function(event){



    var current = event.resultIndex;

    var transcript = event.results[current][0].transcript

    content += transcript;

    recognition.stop();



    $('.voice-text-result').val(content);

    let resultText = content;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    instructions.text('Voice Recognition on Success.');

    // start request
    $.ajax({
        url: "/student/voice-test-check",
        type:"POST",
        data:{
            exerciseId : exerciseId,
            result : resultText,
            _token: _token
        },
        success:function(response){
            content += '';
            console.log(response);
            if(response.is_currect == true) {
                console.log('Your Answer is currect.');
                $('.result-box-text').text('Your answer is Currect.')
                $('.result-box').addClass('text-success');
                $('.result-box').css('display','block');
                $('.result-box-text').addClass('text-success');
                $('.result-box-icon').addClass('fa-check-circle');
                $('.result-box-text').removeClass('text-danger');
                $('.result-box').removeClass('text-danger');
                $('.result-box-icon').removeClass('fa-times-circle');
                $('.result-box').removeClass('d-none');
            }else{
                $('.result-box-text').text('Your answer is Wrong.')
                $('.result-box').css('display','block');
                $('.result-box-text').removeClass('text-success');
                $('.result-box-icon').removeClass('fa-check-circle');
                $('.result-box').addClass('text-danger');
                $('.result-box').removeClass('text-success');
                $('.result-box-text').addClass('text-danger');
                $('.result-box-icon').addClass('fa-times-circle');
                $('.result-box').removeClass('d-none');
                console.log('Your Answer is wrong.');
            }
        },
       });

    textbox = '';

    $('.voice-start-btn').css('display','inline-block');

}

$('.voice-start-btn').on('click',function(event){

    exerciseId = $(this).data('id');
    if(content.length){
       content = '';
    }

    recognition.start();
})

$('.tab-click').on('click',function(){
    $('.result-box').css('display','none');
});
