function test() {
    swal({
            title: "هل انت متأكد؟",
            // text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("form_id").submit();
            } else {
                // window.location.href = "view_notifications";
            }
        });



}


function reason(reason) {
    swal({
            title: reason,
            icon: "warning",
            // buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                
            } else {
                // window.location.href = "view_notifications";
            }
        });
}

function rejection() {
    const input = document.createElement("input");
    input.type = "text";
    input.name = "rejection_reason"; // تحديد الاسم لحقل الإدخال
    input.placeholder = "أدخل سبب الرفض";
    swal({
        title: "سبب الرفض",
        content: input,
            // buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("hidden_reason").value = input.value;
                document.getElementById("form_id").submit();
            } else {
                // window.location.href = "view_notifications";
            }
        });
}