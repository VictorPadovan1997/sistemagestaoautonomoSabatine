
function tratamentoAddProdutos() {
    $( "#novoTamanho" ).click(function() {
        var div_p = document.getElementById("divMateriaPrima");
    //Obtém o primeiro filho do elemento div
    var p = div_p.firstChild;
    var elementos = document.getElementsByName("inputMateriaPrima");
    //Clona o elemento, no caso, um parágrafo
    
    var p_clone = p.cloneNode(true);
    console.log(p_clone);
    
    //Adiciona o clone do elemento <p> ao elemento <div>
    div_p.appendChild(p_clone)
    });
}