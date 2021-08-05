<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <h3 align="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br />
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
                <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button></th>
            </tr>
        </thead>
    </table>
</div>

<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('ajaxdata.getdata')); ?>",
        "columns":[
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "action", orderable:false, searchable: false},
            { "data":"checkbox", orderable:false, searchable:false}
        ]
     });

    $('#add_data').click(function(){
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Data');
    });

    $('#student_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"<?php echo e(route('ajaxdata.postdata')); ?>",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#student_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                    $('#student_table').DataTable().ajax.reload();
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"<?php echo e(route('ajaxdata.fetchdata')); ?>",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#student_id').val(id);
                $('#studentModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('update');
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"<?php echo e(route('ajaxdata.removedata')); ?>",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#student_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 

    $(document).on('click', '#bulk_delete', function(){
        var id = [];
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $('.student_checkbox:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0)
            {
                $.ajax({
                    url:"<?php echo e(route('ajaxdata.massremove')); ?>",
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#student_table').DataTable().ajax.reload();
                    }
                });
            }
            else
            {
                alert("Please select atleast one checkbox");
            }
        }
    });

});
</script>
</body>
</html>
<?php /**PATH /var/www/html/programmation/resources/views/student/ajaxdata.blade.php ENDPATH**/ ?>