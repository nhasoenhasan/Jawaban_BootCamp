<div class="container mt-5">
        <div class="text-right">
            
            <button class="btn btn-warning m-4 text-white" onclick="V_Tambah()"  >ADD</button>
        </div>
        
        <table class="table table-bordered ">
       
        <thead>
            <tr class="text-center">
            <th scope="col">Name</th>
            <th scope="col">Work</th>
            <th scope="col">Salary</th>
            <th scope="col" style="width:15%">Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
            
        </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
        tampil_data();
        });
        
        function tampil_data() {
        $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url()?>index.php/Karyawan/get_data',
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                '<td class="text-center">'+data[i].name+'</td>'+
                                    '<td class="text-center">'+data[i].nama+'</td>'+
                                '<td class="text-center">'+data[i].salary+'</td>'+
                                    '<td style="text-align:center;">'+
                                        '<a href="javascript:;" class="btn btn-warning btn-xs item_edit fas fa-edit" onclick="V_Edit('+data[i].id+')" ></a>'+' '+
                                        '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus fas fa-trash-alt" onclick="hapus('+data[i].id+')"></a>'+
                                    '</td>'+
                                    '</tr>';
                        }
                        $('#show_data').html(html);
                    }
                });
        }

        //Show Modal
        function  V_Tambah(){
            $('#tambahform')[0].reset();
            $('[name="name"]').empty();
            $('[name="work"]').empty();
            $('[name="salary"]').empty();
            var data2= $.ajax({
                url : "<?php echo site_url('index.php/Karyawan/work_select')?>/" ,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="work"]').append("<option selected>Work...</option>");
                    $.each(data, function (i, item) {
                        $('[name="work"]').append('<option value="' + data[i].id_work+  '"  >' + data[i].nama + '</option>');

                    });
                   
                }
            });

            var data1= $.ajax({
                url : "<?php echo site_url('index.php/Karyawan/salary_select')?>/" ,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="salary"]').append("<option selected>salary...</option>");
                    $.each(data, function (i, item) {
                        $('[name="salary"]').append('<option value="' + data[i].id_salary+'"  >' + data[i].salary + '</option>');

                    });
                   
                }
            })
            $('#Add').modal('show'); 
        }

        function  V_Edit(id){
            $('#editform')[0].reset();
            
            $('[name="work"]').empty();
            $('[name="salary"]').empty();
            var a=$.ajax({
                url : "<?php echo site_url('index.php/Karyawan/get_edit')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.id); 
                    $('[name="name"]').val(data.name);    
                    var salary=data.salary;
                    var work=data.nama;
                    var selected="selected";
                    var kosong="";

                    $.ajax({
                        url : "<?php echo site_url('index.php/Karyawan/work_select')?>/" ,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {         
                        
                            $.each(data, function (i, item) {
                                if(work == data[i].nama ){
                                    $('[name="work"]').append('<option value="' + data[i].id_work  +'" selected>' + data[i].nama + '</option>');
                                }else{
                                    $('[name="work"]').append('<option value="' + data[i].id_work  +'" >' + data[i].nama + '</option>');
                                }
                            });      
                        }
                    });
                    
                    $.ajax({
                        url : "<?php echo site_url('index.php/Karyawan/salary_select')?>/" ,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $.each(data, function (i, item) {
                                if(salary == data[i].salary ){
                                    $('[name="salary"]').append('<option value="' + data[i].id_salary  +'" selected>' + data[i].salary + '</option>');
                                }else{
                                    $('[name="salary"]').append('<option value="' + data[i].id_salary+'"  '+kosong+'>' + data[i].salary + '</option>');
                                }
                            });
                        
                        }
                    });
                    
                }
            });
            $('#Edit').modal('show'); 
        }

        //Action To Database
        function insert()
        {
            var url;
            url = "<?php echo site_url('index.php/Karyawan/insert')?>";
            // ajax adding data to database
            var formData = new FormData($('#tambahform')[0]);
            $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
                {
                if(data.status) //if success close modal and reload ajax table
                    {
                    $("#Add").modal("hide");
                    tampil_data();
                    }
                }
            });
        }

        function update()
        { 
            var url;
            url = "<?php echo site_url('index.php/Karyawan/update')?>";
            var formData = new FormData($('#editform')[0]);
            $.ajax({
                url : url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $("#Edit").modal("hide");
                        tampil_data();
                    }
                }
            });
        }

        function hapus(id)
        { 
            var data2= $.ajax({
                url : "<?php echo site_url('index.php/Karyawan/get_edit')?>/"+id ,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="name"]').text(data.name);  
                }
            });

            var a=$.ajax({
                url : "<?php echo site_url('index.php/Karyawan/delete')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {

                    $('#Delete').modal('show');   
                    tampil_data();
                }
            });
            
        }

    </script>

    <!--MODAL ADD-->
    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="tambahform">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name..." >
                </div>
                <div class="form-group">
                    <select class="form-control" name="work" id="exampleFormControlSelect1">

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="salary" id="exampleFormControlSelect1">

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" name="Submit" onclick="insert()" class="btn btn-warning text-white">ADD</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    <!--MODAL EDIT-->
    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editform">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" placeholder="Name..." >
                    <input type="text" class="form-control" name="name" placeholder="Name..." >
                </div>
                <div class="form-group">
                    <select class="form-control"  name="work" id="idwork" >

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="salary" id="idsalary">

                    </select>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="update()"  class="btn btn-warning text-white">ADD</button>
            </div>
            </div>
            <p id="demo"></p>
        </div>
    </div>
    <!--DELETE-->
    <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="text-center p-5" >    
                <img src="images/success.png" width="100px" alt="center">
                <h4 class="mt-4"> Data <span name="name"></span> Berhasil Di Hapus</h4>
            </div>
            </div>
        </div>
    </div>

</body>
</html>