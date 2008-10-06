$().ready(function() {
	$("a[@rel='facebox']").each( function(){
		//NO SE PORQUE NO ME DEVUELVE TODO EL OBJETO, POR ESO LO VUELVO A SELECCIONAR
		var link = ($("a[@href="+this+"]"));
		var name = link.attr("name");
		var id = name.substr(9);
		//HABRIA QUE INCLUIR EL PATH EN EL LINK SUPONGO
		link.attr("href","ajax/edit/" + id);
	});
});