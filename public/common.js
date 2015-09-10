function test(){
	if (!document.createElement || !document.getElementById) return;

	
	var info = document.getElementById('info');
	　 /*（2）新たにテキストノードを作成する*/
	　 var textNode = document.createTextNode('こんにちは');
	　 /*（3）作成したテキストノードをPタグ要素の子要素として追加する*/
	　 info.appendChild(textNode);
}

function appendTest3() {
	if (!document.createElement) return;

	var ele = document.createElement("option");
	ele.value = "ddd";
	var str = document.createTextNode("DDD");
	ele.appendChild(str);

	document.form1.select1.appendChild(ele);
}

function show(inputData){
    var objID=document.getElementById( "layer_" + inputData );
    var buttonID=document.getElementById( "category_" + inputData );
    if(objID.className=='close') {
        objID.style.display='block';
        objID.className='open';
    }else{
        objID.style.display='none';
        objID.className='close';
    }
}

function editview(id){
	 var editview=document.getElementById( "editview"+id );
    if(editview.style.display=='none') {
        editview.style.display='block';
    }else{
        editview.style.display='none';
    }
    var comment=document.getElementById( "comment"+id );
    if(comment.style.display=='none') {
        comment.style.display='block';
    }else{
        comment.style.display='none';
    }
}