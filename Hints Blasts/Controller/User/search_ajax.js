    $('document').ready(function(){
        $('.search').keyup(function(){
           var search= $(this).val();
           $.get($('form').attr('action'),

            {'search':search},
            function(row){
                 $('.success').html(row);
            }
            )
        })
    });
