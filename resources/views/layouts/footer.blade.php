


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::asset('resources/assets/js/parsley.js')}}"></script>

<script>

function changeValue(e) {
    //alert();
    if ($(e).prop("checked") == true) {
        //alert('jj');
        var checkBoxClass = $(e).attr('class');
        $.each($('.' + checkBoxClass), function (key, value) {
            console.log("dddd");
            $(this).prev().attr('value', 0);
        });
        $(e).prev().attr('value', 1);
    } else {
        $(e).val(0);
    }
}

$('body').on('change', 'input[type=checkbox]', function (e) {
        var a = $(this).attr("class");
        var questionid = parseInt(a);
        //$('input[name=name]').val();
        var questionType = $('select[name=' + questionid + '_questiontype]').val();
        if(questionType == 2){
            $('.'+a).not(this).prop('checked', false);
                    
//alert();
        }
        
        // $('input.example').not(this).prop('checked', false);  
        
    });


function changeValueForMultiple(e) {
    if ($(e).prop("checked") == true) {
        $(e).prev().attr('value', 1);
        $(e).val(1);
    } else {
        $(e).prev().attr('value', 0);
        $(e).val(0);
    }
}
$('body').on('change', '.selectquestiontype', function (e) {
    e.preventDefault();
    var randomNumber = $(this).next().next().val();
    var questionType = $(this).val();

    if (questionType == 1) {
        $("#textTypeQuestion input:eq(0)").attr('name', randomNumber + '_question');
        $("#textTypeQuestion input:eq(1)").attr('name', randomNumber + '_answer');
        $(this).attr('name', randomNumber + '_questiontype');
        var questionHtml = $('#textTypeQuestion').html();
        $(this).next('.detailFields').html('');
        $(this).next('.detailFields').html(questionHtml);
    } else if (questionType == 2) {
        $("#multipleWithSingle input:eq(0)").attr('name', randomNumber + '_question');
        $("#multipleWithSingle input:eq(1)").attr('name', randomNumber + '_option[]');
        $("#multipleWithSingle input:eq(4)").attr('name', randomNumber + '_option[]');
        $("#multipleWithSingle input:eq(7)").attr('name', randomNumber + '_option[]');
		
		//hidden
		$("#multipleWithSingle input:eq(2)").attr('name', randomNumber + '_optionBoxValue[]');
		$("#multipleWithSingle input:eq(5)").attr('name', randomNumber + '_optionBoxValue[]');
		$("#multipleWithSingle input:eq(8)").attr('name', randomNumber + '_optionBoxValue[]');
		
		
        $("#multipleWithSingle input:eq(3)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(3)").attr('class', randomNumber + 'singlechoice');
        $("#multipleWithSingle input:eq(6)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(6)").attr('class', randomNumber + 'singlechoice');
        $("#multipleWithSingle input:eq(9)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(9)").attr('class', randomNumber + 'singlechoice');

        $(this).attr('name', randomNumber + '_questiontype');
        var questionHtml = $('#multipleWithSingle').html();
        $(this).next('.detailFields').html('');
        $(this).next('.detailFields').html(questionHtml);

    } else if (questionType == 3) {
        $("#multipleWithSingle input:eq(0)").attr('name', randomNumber + '_question');
        $("#multipleWithSingle input:eq(1)").attr('name', randomNumber + '_option[]');
        $("#multipleWithSingle input:eq(4)").attr('name', randomNumber + '_option[]');
        $("#multipleWithSingle input:eq(7)").attr('name', randomNumber + '_option[]');
		
		//hidden
		$("#multipleWithSingle input:eq(2)").attr('name', randomNumber + '_optionBoxValue[]');
		$("#multipleWithSingle input:eq(5)").attr('name', randomNumber + '_optionBoxValue[]');
		$("#multipleWithSingle input:eq(8)").attr('name', randomNumber + '_optionBoxValue[]');
		
		
        $("#multipleWithSingle input:eq(3)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(3)").attr('class', randomNumber + 'singlechoice');
        $("#multipleWithSingle input:eq(6)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(6)").attr('class', randomNumber + 'singlechoice');
        $("#multipleWithSingle input:eq(9)").attr('name', randomNumber + '_singleoption[]');
        $("#multipleWithSingle input:eq(9)").attr('class', randomNumber + 'singlechoice');

        $(this).attr('name', randomNumber + '_questiontype');
        var questionHtml = $('#multipleWithSingle').html();
        $(this).next('.detailFields').html('');
        $(this).next('.detailFields').html(questionHtml);
    }
    $('#formtoadd').parsley();
});

$('#addnewquestion').on('click', function (e) {
    var randomNumber = Date.now();
    $('#sampleQuestion #uniqueIdForQuestion').val(randomNumber);
    var newQuestion = $('#sampleQuestion').html();

    $('#addNewQuestion').append(newQuestion);
    $('#formtoadd').parsley();
});


$('body').on('click', ".delQuestionOption", function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
        type: "post",
        url: "http://localhost/Quentionair/delChoice",
        data: {delChoice: id},
        success: function (data) {
            if (data == 'exists') {
                $('#' + id).parent().parent().remove();
            } else if (data == 'notExists') {
                $('#' + id).parent().parent().remove();
            }
        }

    });
});
$(".addQuestionOption").on('click', function (e) {
    e.preventDefault();
	
	var randomNumber = Date.now();

	var questionNo =  $(this).attr('id');
        //console.log(questionNo);
	var questionNo = questionNo.split('_');
	
	
	//$("#multipleWithSingle input:eq(0)").attr()
       // console.log(questionNo[0]);
        
        
        var questionType = $('select[name=' + questionNo[0] + '_questiontype]').val();
        
        //_questiontype
	
	$("#sampleOptionChoice input:eq(0)").attr('name', questionNo[0] + '_option[]');
	
	$("#sampleOptionChoice input:eq(1)").attr('name', questionNo[0] + '_optionBoxValue[]');
	
	
	
	$("#sampleOptionChoice input:eq(2)").attr('name', questionNo[0] + '_singleoption[]');
        $("#sampleOptionChoice input:eq(2)").attr('class', questionNo[0] + 'singlechoice');
        
	
	$("#sampleOptionChoice input:eq(3)").attr('name', questionNo[0] + '_optionids[]');
	$("#sampleOptionChoice input:eq(3)").attr('value', randomNumber);
        if(questionType == 2){
            alert('2');
            $("#sampleOptionChoice input:eq(2)").prop('onClick', 'changeValue(this);');
        }else if(questionType == 3){
            alert('3');
            $("#sampleOptionChoice input:eq(2)").attr('onClick', 'changeValueForMultiple(this)');
        }
        
        
	
	var newChoice = $('#sampleOptionChoice').html();
	
	
    //var newChoice = $(this).parents(':eq(1)').prev().prev().html();
    $(newChoice).insertAfter($(this).parents(':eq(1)').prev().prev());
    $('#formtoadd').parsley();
});

</script>
</body>
</html>