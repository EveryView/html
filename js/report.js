$(document).ready(function () {
    $("form p a").click(function () {
        if($(this).parent().html().split(" ")[0]=="Videos"){
            return true;
        }
        if ($(this).parent().html().split(" ")[0] == "Daily") {
            $("[name='time']").val('1');
        } else {
            if ($(this).parent().html().split(" ")[0] == "Weekly") {
                $("[name='time']").val('7');
            } else {
                if ($(this).parent().html().split(" ")[0] == "Monthly") {
                    $("[name='time']").val('30');
                }
            }
        }
        if ($(this).html() == "csv") {
            $("[name='type']").val('csv');
        } else {
            if ($(this).html() == "xml") {
                $("[name='type']").val('xml');
            }
        }
        $(this).parent().parent().submit();
        return false;
    })
});