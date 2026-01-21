// JScript File

var $ = jQuery.noConflict();

function AllowNumericLimit(thisobj)
{ 
    var limitamount = $(thisobj).attr('rel');   
    var currentamt = ($(thisobj).val() == "" ? "0" : $(thisobj).val()); 
    if(parseFloat(currentamt) <= parseFloat(limitamount)){
        return true;
    }
    else
    {
        jAlert('Your topup limit is exceeded!','Error');
        $(thisobj).val(parseFloat(limitamount).toFixed(0));
        return false;
    }
}

/*Numeric Validation*/
function AllowAlphabet(evt) { return filterInputCommonForAllValidation(0, evt, ''); }

function AllowNumericAndAlphabet(evt) { return filterInputCommonForAllValidation(2, evt, ''); }

function AllowNumeric(evt) { return filterInputCommonForAllValidation(1, evt, ''); }

function AllowNumericWithoutDecimal(evt) { return filterInputCommonForAllValidation(4, evt, ''); }

function AllowNumericWithDecimal(evt) { return filterInputCommonForAllValidation(3, evt, ''); }

function AllowCustomFormat(evt, custom) { return filterInputCommonForAllValidation(6, evt, custom); }

/*Common For All*/
function filterInputCommonForAllValidation(filterType, evt, customfrm) {
    var keyCode, Char, inputField, filter = '';
    var alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ. ';
   
    var num = '0123456789.';
    var number = '0123456789';
    var splchr = '/';
    var splchr = '@_~$&*#/-';
    if (window.event) {
        keyCode = window.event.keyCode;
        evt = window.event;
    }
    else if (evt) keyCode = evt.which;
    else return true;

    if (filterType == 0) filter = alpha;
    else if (filterType == 1) filter = num;
    else if (filterType == 2) filter = alpha + num;
    else if (filterType == 3) filter = num;
    else if (filterType == 4) filter = number;
    else if (filterType == 5) filter = alpha + num + splchr;
    else if (filterType == 6) filter = customfrm;

    if (filter == '') return true;

    inputField = evt.srcElement ? evt.srcElement : evt.target || evt.currentTarget;
    if ((keyCode == null) || (keyCode == 0) || (keyCode == 8) || (keyCode == 9) || (keyCode == 13) || (keyCode == 27)) return true;
    Char = String.fromCharCode(keyCode);
    if ((filter.indexOf(Char) > -1)) return true;
    else return false;
}

function EnableKeyFunctional(){
    $(document).keydown(function (event) {
        var frame = (document.getElementById("frmMaster") == undefined ? window.parent.document.getElementById("frmMaster") : document.getElementById("frmMaster"));
       
        if (event.keyCode == 112) {//f1            
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "home.aspx");
        }
        else if (event.keyCode == 113) {//f2
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgCreateWallet.aspx");
        }
        else if (event.keyCode == 114) {//f3
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgdomestic.aspx");
        }
        else if (event.keyCode == 115) {//f4
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgAgentTransactionHistory.aspx");
        }
        else if (event.keyCode == 116) {//f5
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', $(frame).attr('src'));
        }
        else if (event.keyCode == 117) {//f6
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgcomingsoon.aspx");
        }
        else if (event.keyCode == 118) {//f7
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgcomingsoon.aspx");
        }
        else if (event.keyCode == 119) {//f8
            event.preventDefault();
            event.originalEvent.keyCode = 0;
            $(frame).attr('src', "pgcomingsoon.aspx");
        }
    });
}

function CreateDatatableOptions(tableId,havingcount) {
    //alert('hai');
    var header = "<thead>" + $('#'+tableId+' tbody').find("tr").eq(0).html() + "</thead>";    
    var counthtml = "";
    if(havingcount == "1"){
        var trlength =$('#'+tableId+' tbody').find("tr").length;
         counthtml = "<tfoot>"+$('#'+tableId+' tbody').find("tr").eq(trlength-1).html()+"</tfoot>";
        $('#'+tableId+' tbody').find("tr").eq(trlength-1).remove();
    }
    var htmlstr = header + $('#'+tableId).html();
    htmlstr += counthtml;
    //alert(htmlstr);
    $('#'+tableId).html(htmlstr);    
    $('#'+tableId+' tbody').find("tr").eq(0).remove();
    $('#'+tableId).dataTable({"aLengthMenu": [
         [-1],
         ["All"]
     ], "iDisplayLength": "-1"});
}

function CreateDatatableOptions1(tableId, havingcount) {
    //alert('hai');
    var header = "<thead>" + $('#' + tableId + ' tbody').find("tr").eq(0).html() + "</thead>";
    var counthtml = "";
    if (havingcount == "1") {
        var trlength = $('#' + tableId + ' tbody').find("tr").length;
       // counthtml = "<tfoot>" + $('#' + tableId + ' tbody').find("tr").eq(trlength - 1).html() + "</tfoot>";
        $('#' + tableId + ' tbody').find("tr").eq(trlength - 1).remove();
    }
    var htmlstr = header + $('#' + tableId).html();
    //htmlstr += counthtml;
    //alert(htmlstr);
    $('#' + tableId).html(htmlstr);
    $('#' + tableId + ' tbody').find("tr").eq(0).remove();
    $('#' + tableId).dataTable({ "aLengthMenu": [
         [-1],
         ["All"]
     ], "iDisplayLength": "-1"
    });
}

$(function() {
    setTimeout(function() { $("#hideDiv").fadeOut(2000); }, 2000)
});

// let timerOn = true;
// function timer(remaining) {
//     var m = Math.floor(remaining / 60);
//     var s = remaining % 60;
//     m = m < 10 ? '0' + m : m;
//     s = s < 10 ? '0' + s : s;
//     document.getElementById('timer').innerHTML = m + ':' + s;
//     remaining -= 1;
//     // alert(remaining);
//     if(remaining > 0 && timerOn) {
//         setTimeout(function() {
//             timer(remaining);
//         }, 1000);
//         return;
//     }
//     if(remaining == 0) {
//         var t = $('.time1').val();
//         // alert(t);
//         // alert('time-out');
//         $.ajax({url: "timer.php",
//             type: "post",
//             data: { t:t },
//             success: function(result) {
//                 alert('OTP expired.Please resend your OTP');
//         }});
//     }
//     if(!timerOn) {
//         // Do validate stuff here
//         return;
//     }
//     // Do timeout stuff here
// }
// timer(60);