$(document).ready(function(){
    let ustadzPage = $('#ustadz-page')

    if(ustadzPage.length){
        $(document).ready(function(){
            $('#togglePassword').on('click', function () {
                const input = $('#password');
                const icon = $('#eyeIcon');
                const type = input.attr('type') === 'password' ? 'text' : 'password';
        
                input.attr('type', type);
                icon.toggleClass('fa-eye fa-eye-slash');
            });
        })
    }
})