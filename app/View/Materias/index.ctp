<?php
$this->extend('/Elements/index');
$this->assign('title', 'Matéria Primas');
$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true
));
$searchFields = null;
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('MateriaPrima.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-15',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Materia.nome', 'Nome') => array( 'width' => '20%', 'title' => 'Ordenar por Nome' )),
    array($this->Paginator->sort('Materia.quantidade', 'Quantidade') => array( 'width' => '15%', 'title' => 'Ordenar por Nome' )),
    array($this->Paginator->sort('Materia.valor', 'Valor') => array( 'width' => '15%', 'title' => 'Ordenar por Nome' )),
    array('Produto' => array( 'width' => '26%', 'title' => 'Ordenar por Nome' )),
    array('' => array( 'width' => '15%' )),
);
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    $detalhe = array();

    foreach ($materias as $materiaprima) {
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger  fa-lg')), '/materias/delete/' . $materiaprima['Materia']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt fa-lg')), '/materias/edit/' . $materiaprima['Materia']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ',
            'escape' => false
        ));

        $detalhe[] = array(        
            $materiaprima['Materia']['nome'],
            $materiaprima['Materia']['quantidade'],
            $materiaprima['Materia']['valor'],
            $materiaprima['Produto']['nome'],
            $excluir . $alterar
        );
    }

        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);

?>

  


