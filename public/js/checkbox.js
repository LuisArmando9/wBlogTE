$("#ckd-active").on( 'change', function() {
    if( $(this).is(':checked') ) {
        
        $(this).val("1")
    } else {
        $(this).val("0")
    }
  
});