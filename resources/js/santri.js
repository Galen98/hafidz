$(document).ready(function(){
    let santriPage = $('#santri-page')
    if(santriPage.length) {
       //halaman add
       let angkatanForm = '';
       let tahun = ''
       $('#angkatan').on('change', function(){
            angkatanForm = $(this).val()
            generateNis()
       })

       $('#tgl_lahir').on('change', function(){
           let tgl = $(this).val()
           tahun = new Date(tgl).getFullYear();
           generateNis()
       })
     
       function generateNis() {
            if(angkatanForm && tahun){
                $.ajax({
                    url: '/api/generate-nis',
                    method: 'GET',
                    data: {
                        angkatan: angkatanForm,
                        tahun: tahun
                    },
                    success: function(res) {
                        let nis = `${tahun}${angkatanForm.toString().padStart(3, '0')}${res.urut}`;
                        $('#nis').val(nis)
                    },
                    error: function() {
                        console.log('gagal')
                    }
                })
            }
       }

       $('.edit-btn').on('click', function(){
            $(this).text('Simpan')
            $(this).removeClass('edit-btn')
            $('#name').attr('readonly', false)
            $('#tgl_lahir').attr('disabled', false)
            $(this).hide()
            $('.edit-btn-submit').show()
       })

       $('.edit-btn-submit').on('click', function(){
        $(this).closest('form').submit();
      });
       
    }
})
