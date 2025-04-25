<?php

namespace src;

class EmailService {

    private $destinatario;
    private $assunto;
    private $mensagem;
    private $remetente;

    public function __construct(
        string $destinatario = '', 
        string $assunto = '', 
        string $mensagem = '', 
        string $remetente = ''
    ) {
        $this->destinatario = $destinatario;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
        $this->remetente = $remetente;
    }
    
    public static function enviarEmailConfirmacao() {
        echo '<br/>.... envia e-mail de confirmação ...<br/>';
    }
    
}