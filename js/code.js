$(document).ready(function(){
    insert_db();
    display();
    getrecord();
    update();
    getdelete_db();
})
// Insert in db
function insert_db()
{
    $(document).on('click','#btn_registro',function(){
        var User= $('#nombre').val();
        var Dom= $('#domicilio').val();
        var Dist= $('#distrito').val();
        var Tel= $('#telefono').val();
        if(User=="" || Dom=="" || Dist==""){
            $('#message').html("Por favor rellene los campos");
        }else{
            $.ajax({
                url:'insert.php',
                method:'post',
                data:{Uname:User,Domi:Dom,Distri:Dist,Phone:Tel},
                success: function(data){
                    $('#message').html(data);
                    $('#regis').modal('show');
                    display();
                }
            })
            $('form').trigger('reset');
            
        }
    })
    $(document).on('click','#btn_close',function(){
        $('form').trigger('reset');
    });
};

//Display record
function display(){
    console.log('display');
    $.ajax({
        url:'view.php',
        method:'post',
        success: function(data){
            $('ajaxtable').html(data);
            const ajaxdc= document.getElementById('ajaxtable');
            ajaxdc.innerHTML = data;
        }
    });
};

function getrecord(){
    $(document).on('click','#btn-edit',function(){
        var id=$(this).attr('dataid');
        var nm = document.getElementById(`${id}`);   
        var val = nm.textContent;
        $.ajax({
            url:'getdata.php',
            method:'post',
            data:{usn:val},
            dataType: 'JSON',
            success: function(data){
                $('#up_nombre').val(data[0]);
                $('#up_nombre_id').val(data[0]);
                $('#up_domicilio').val(data[1]);
                $('#up_distrito').val(data[2]);
                $('#up_telefono').val(data[3]);
                $('#editmodal').modal('show');
            }
        });
    })
};

function update(){
    $(document).on('click','#btn_update',function(){
        var usrid= $('#up_nombre_id').val();
        var usr= $('#up_nombre').val();
        var dmc= $('#up_domicilio').val();
        var dst= $('#up_distrito').val();
        var tlf= $('#up_telefono').val();
        if(usr=="" || dmc=="" || dst==""){
            $('#up-message').html("Por favor rellene los campos");
        }else{
            $.ajax({
                url:'update.php',
                method:'post',
                data:{userid:usrid,user:usr,domi:dmc,distrit:dst,telf:tlf},
                success: function(data){
                    $('#up-message').html(data);
                    $('#update').modal('show');
                    display();
                }
            })
            $('form').trigger('reset');
            
        }
    })
};
function getdelete_db(){
    $(document).on('click','#btn-delete',function(){
        var id=$(this).attr('dataid');
        var nm = document.getElementById(`${id}`);   
        var val = nm.textContent;
        $.ajax({
            url:'getdelete.php',
            method:'post',
            data:{name:val},
            dataType: 'JSON',
            success: function(data){
                $('#delete_nombre').val(data[0]);
                $('#delete_domicilio').val(data[1]);
                $('#delete_distrito').val(data[2]);
                $('#delete_telefono').val(data[3]);
                $('#deletemodal').modal('show');
            }
        });
        $(document).on('click','#eliminardb',function(){
            var delet= $('#delete_nombre').val();
            $.ajax({
                url:'delete.php',
                method:'post',
                data:{del:delet},
                dataType: 'JSON',
                success: function(data){
                    $('#delete-message').html(data);
                    $('#deletemodal').modal('show');
                    
                }
            });
            $('form').trigger('reset');
            setTimeout(display(),1);
        })
    })
}


