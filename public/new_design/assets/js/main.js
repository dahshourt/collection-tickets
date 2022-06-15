function add_settlement_fields() {
    var transaction_amount = document.getElementById('transaction_amount').value;
    var error_message = document.getElementById('error_message').textContent;

    if (transaction_amount == '' && error_message == '') {

        var paragraph = document.getElementById("error_message");
        var text = document.createTextNode("please fill transaction Amount Firstly");
        paragraph.appendChild(text);

    } else if (error_message == '') {
        var transaction_amount_value = document.getElementById("transaction_amount").value;
        var settlement_values = document.getElementsByName("settlement[]");
        var total = 0;

        for (let u = 0; u < settlement_values.length; u++) {
            total = total + parseInt(settlement_values[u].value);
        }

        if (total > transaction_amount_value) {
            // console.log('no');
            var paragraph = document.getElementById("error_message");
            var text = document.createTextNode("settlement is biger than the transaction amount");
            paragraph.appendChild(text);

        } else {
            //console.log('ok');
            var button = document.createElement("input");
            button.type = "number";
            button.name = "settlement[]";
            button.setAttribute("oninput", "remove_error_message_of_wrong_total()");

            //button.id = 'submit';
            button.placeholder = "Settlement Amounts";
            button.className = "form-control";

            var account = document.createElement("input");
            account.type = "number";
            account.name = "account[]";

            //button.id = 'submit';
            account.placeholder = "Account";
            account.className = "form-control";

            var container = document.getElementById("settlement");
            container.appendChild(button);

            var containers = document.getElementById("settlement_account");
            containers.appendChild(account);

        }
    }
}

// function remove_error_message(){  
//   var error_message = document.getElementById('error_message').textContent  ;
//    if (error_message !== ''){
//     document.getElementById('error_message').innerHTML = "";
//    }

//    var account = document.getElementsByName("account[]");
//    var settlement = document.getElementsByName("settlement[]");
//    for(var i = 0 ; i <= parseInt(settlement.length); i++){
//     settlement[i].remove();
//     account[i].remove();
//    }
// }

function remove_error_message_of_wrong_total() {
    var error_message = document.getElementById('error_message').textContent;
    if (error_message !== '') {
        document.getElementById('error_message').innerHTML = "";
    }

}

function create_cheque_number() {
    var transaction_type_value = document.getElementById('transaction_type').value;
    console.log(transaction_type_value + ' pllll');
    if (transaction_type_value == 3) {
        //console.log('ok');
        var transaction_types = document.createElement("input");
        transaction_types.type = "number";
        transaction_types.name = "cheque_number";
        transaction_types.placeholder = "Cheque Number";
        transaction_types.className = "form-control";

        var new_element = document.getElementById("transaction");
        new_element.appendChild(transaction_types);
    } else //if(transaction_type_value !== 3 )
    {
        //console.log('no');
        var cheque_number_element = document.getElementsByName("cheque_number");
        //console.log(cheque_number);
        cheque_number_element[0].remove();
    }
}

function rejection_reasons() {
    var rejection_reason_element = document.getElementById("rejection_reason_id").value;

    //console.log(dropdown_reason + ' style');
    if (rejection_reason_element == 3) {
        document.getElementById("dropdown_reason").style.display = "block";
        // console.log('yes');
    } else {
        document.getElementById("dropdown_reason").style.display = "none";
        // console.log('no');
    }
}

function text_box_rejection_reasons() {
    var text_box_rejection_reasons = document.getElementById("rejection_reason_value").value;
    if (text_box_rejection_reasons == 4) {
        var transaction_types = document.createElement("input");
        transaction_types.type = "text";
        transaction_types.name = "rejection_reason_comment";
        transaction_types.placeholder = "Write Comment";
        transaction_types.className = "form-control";

        var new_element = document.getElementById("note_box");
        new_element.appendChild(transaction_types);
        console.log('yes');
    } else {
        console.log('no');
    }

}