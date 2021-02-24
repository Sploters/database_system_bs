function origem_empresa(val) {
    if(val.value == 'jfr'){
        document.getElementById('id_pedido').style.display = 'show';
        document.getElementById('item_pedido').style.display = 'show';
     } else {
     	document.getElementById('id_pedido').style.display = 'block';
     	document.getElementById('item_pedido').style.display = 'block';
     }

	};