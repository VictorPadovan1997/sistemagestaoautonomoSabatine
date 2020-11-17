<?php
$this->extend('/Elements/index');
$this->assign('title', 'Produtos');
$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true
));
$searchFields = null;
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Produto.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-15',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

    $titulos = array(
        array($this->Paginator->sort('Produto.nome', 'Nome') => array( 'width' => '25%', 'title' => 'Ordenar por Nome' )),
        array('Preço de Custo' => array('width' => '2%')),
        array('Preço de Venda' => array('width' => '2%')),
        array('Categoria' => array('width' => '15%')),
        array('' => array( 'width' => '0%' )),
    );
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    $detalhe = array();
    foreach ($produtos as $produto) {
        $produtoView = $this->Js->link($produto['Produto']['nome'], '/produtos/view/' . $produto['Produto']['id'], array('update' => '#content'));

        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger  fa-lg')), '/produtos/delete/' . $produto['Produto']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt fa-lg')), '/produtos/edit/' . $produto['Produto']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ',
            'escape' => false
        ));
        

 
        $detalhe[] = array(        
            $produtoView,
            $produto['Produto']['preco_custo'],
            $produto['Produto']['preco_venda'],
            $produto['Categoria']['nome'],
            $excluir .  $alterar . $relatorio
        );
    }

        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);

?>

  


