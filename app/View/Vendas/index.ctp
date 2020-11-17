<?php
$this->extend('/Elements/index');
$this->assign('title', 'Vendas');
$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true
));
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Venda.numero', array(
        'placeholder' => 'Número', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-15',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Venda.numero', 'Número') => array( 'width' => '10%', 'title' => 'Ordenar por Número')),
    array($this->Paginator->sort('Cliente.nome', 'Cliente') => array( 'width' => '20%', 'title' => 'Ordenar por Nome')),
    array($this->Paginator->sort('Produto.nome', 'Produto') => array( 'width' => '26%', 'title' => 'Ordenar por Produto')),
    array('' => array( 'width' => '15%' )),
);

$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);
$detalhe = array();
foreach ($vendas as $venda) {
    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger  fa-lg')), '/vendas/delete/' . $venda['Venda']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt fa-lg')), '/vendas/edit/' . $venda['Venda']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ',
        'escape' => false
    ));

    $detalhe[] = array(        
        $venda['Venda']['numero'],
        $venda['Cliente']['nome'],
        $venda['Produto']['nome'],
        $excluir . $alterar
    );
}

    $tableCells = $this->Html->tableCells($detalhe);
    $this->assign('tableCells', $tableCells);

?>

  


