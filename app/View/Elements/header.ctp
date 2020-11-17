<?php
$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];

$hidden = '';
if($actionName == 'add' || $actionName == 'view' || $actionName == 'edit' || $actionName == 'addDadosMateriaPrimaEmProdutos' || $actionName == 'editDadosMateriaPrimaEmProdutos'){
    $hidden = 'display: none';
} 

$nomeBotao = 'Incluir';
$nomeHeader = $this->Html->tag('h2', $this->fetch('title'));  
$novoButton = $this->Js->link(
    $this->Html->tag('i', '', array(
        'class' => 'fas fa-plus '
    )) . 
    '&nbsp;' . $nomeBotao,
    '/' . $controllerName . '/add', 
    array('class' => 'btn btn-primary float-right', 'escape' => false,'style' => $hidden, 'update' => '#content')
);
?>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <?php
                    echo $nomeHeader;
                    echo $this->Html->tag('hr');
                 ?>                     
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        </div>        
        <div class="kt-subheader__toolbar">
            <?php echo $novoButton ?>
        </div>
    </div>
</div>
