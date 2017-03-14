$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<span><div class="form-group col-md-7"><label>Question Title</label><input class="form-control" type="textarea" name="ques_title[]" value=""  /></div><div class="form-group col-md-2"><label>Help Text</label><input class="form-control" type="text" name="ques_help[]" value=""/></div><div class="form-group col-md-2"><label>Compulsory?</label><select class="form-control"  name="quest_opt[]" ><option value="0" >No</option><option value="1" >Yes</option></select></div><div class="form-group col-md-1"><a href="javascript:void(0);" class="remove_button" title="Remove Question"><i class=" glyphicon glyphicon-minus-sign big_ico"></i></a></div></span>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').parent('span').remove(); //Remove field html
        x--; //Decrement field counter
    });
});