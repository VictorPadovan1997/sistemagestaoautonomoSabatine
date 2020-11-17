<?php
$this->extend('/Elements/index');
$this->assign('title', 'Categorias');
$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true
));
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Categoria.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-15',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

    $titulos = array(
        array($this->Paginator->sort('Categoria.nome', 'Nome') => array( 'width' => '26%', 'title' => 'Ordenar por Nome' )),
        array('' => array( 'width' => '15%' )),
    );
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    $detalhe = array();
    foreach ($categorias as $categoria) {
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger  fa-lg')), '/categorias/delete/' . $categoria['Categoria']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt fa-lg')), '/categorias/edit/' . $categoria['Categoria']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ',
            'escape' => false
        ));

     

        $detalhe[] = array(        
            $categoria['Categoria']['nome'],
            $excluir . $alterar
        );
    }

        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);

?>

  


