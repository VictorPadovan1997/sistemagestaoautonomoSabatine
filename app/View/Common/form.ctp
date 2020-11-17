<?php
echo $this->element('header');
$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];

$nomeBotao = 'Gravar';
$icone = 'fas fa-check';
if($controllerName == 'produtos') {
    if(!empty($this->request->data['Materia'])) {
        $nomeBotao = 'Continuar';
        $icone = 'fas fa-arrow-right';
        
    }
}


$form = $this->fetch('formFields');

if ($actionName != 'view') {
    $form .= $this->Form->button($this->Html->tag('i', '', array('class' => $icone)) . ' ' .
        $nomeBotao,
        array(
            'type' => 'submit',
            'class' => 'btn btn-primary my-4',
            'div' => false,
            'update' => '#content'
        )
    );
}

$form .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
    ' Voltar',
    '/'. $controllerName,
    array(
        'class' => 'btn btn-secondary',
        'escape' => false,
        'update' => '#content'
    )
);
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');
$this->Js->buffer('ocultaMutipleSelect();');
$this->Js->buffer('tratamentoAddProdutos();');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>
