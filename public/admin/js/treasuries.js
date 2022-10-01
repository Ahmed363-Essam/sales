$(document).ready(function () {
    $("#search_by_name").on("keyup", function () {
        var name = $(this).val();
        if (name) {
            $.ajax({
                url: "/admin/ahmed/" + name,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $.each(data.msg.data, function (key, value) {
                            console.log(value);
                            $("#ajax_data").empty();
                            $("#ajax_data").append(
                                `
                                <tr>
                                   <td> ${value.id} </td>
                                   <td> ${value.name} </td>
                                   <td>  ${value.is_master}  </td>

                                   <td> ${value.last_isal_exchange} </td>
                                   <td>  ${value.last_isal_collect} </td>

                                   <td>  ${value.active} </td>

                                   <td>          <a href="{{ route('Treasures.edit',   $info->id) }}"
                                   class="btn btn-sm  btn-primary">تعديل</a>
                               <a href="{{ route('Treasures.show', $info->id) }}"
                                   class="btn btn-sm  btn-info">المزيد</a> </td>



                                </tr>
                                
                                `
                            );

                            console.log(value);
                        });
                    } else {
                    }
                },
            });
        } else {
            console.log("AJAX load did not work");
        }
    });
});
