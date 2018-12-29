

      var client = new ZeroClipboard( $('.copy') );
	 var url = $("#copy_content").html();
 
      client.on( 'ready', function(event) {
        // console.log( 'movie is loaded' );
 
        client.setText(url);
 
        client.on( 'aftercopy', function(event) {
         	alert('复制成功');
        } );
      } );
 
      client.on( 'error', function(event) {
		alert(event.message);
        ZeroClipboard.destroy();
      } );
	  
	  
