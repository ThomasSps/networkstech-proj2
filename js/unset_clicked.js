function unset_clicked (id){
    
    var selects = document.getElementsByClassName("selected");
    
    for (var i = 0, il = selects.length; i < il; i++){
        selects[i].style.display = " none";
    }
    
    $.post("unset_data.php", {
		
	}, function(data) {
        
        //alert(data);
            
	});
    
        
    
	
}