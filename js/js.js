$(function () {
    $body = $("body");

    $(document).on({
        ajaxStart: function () {
            $body.addClass("loading");
        },
        ajaxStop: function () {
            $body.removeClass("loading");
        }
    });

    $("#apply").on("click", function () {

        $.ajax({
            url: "search.php",
            type: "post",
            data: $("#form").serialize(),
            beforeSend: function () {
                $("#result").empty();
            },
            success: function (resp) {
                $("#result").empty().append(
                    '<table id="example" class="display compact" style="width:100%"></table>'
                );
                $('#example').DataTable({
                    "data": resp,
                    columns: [{
                        title: ""
                    }, {
                        title: "Name"
                    },
                    {
                        title: "Size"
                    },
                    {
                        title: "Forks"
                    },
                    {
                        title: "Stars"
                    },
                    {
                        title: "Watchers"
                    }
                    ]
                });
            }
        });

    });

    $("#clear").on("click", function () {
        $("#result").empty();
        var $block = $("#clone");
        $(".clone").remove();
        $block.appendTo("#form");
    });

    $("#add").on("click", function () {
        $("#clone").clone().appendTo("#form");
    });

    $(document).on('click', '.delete', function () {
        if ($('.delete').length > 1) {
            $("#result").empty();
            $(this).parent().parent().remove();
        }
    });
})