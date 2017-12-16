<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/model/Alternativa.php';

class AlternativaDao {
   public function inserirAlternativa(Alternativa $alternativa){
      $idQuestionario = $alternativa->getIdQuestionario();
      $seqAlternativa = $alternativa->getSeqAlternativa();
      $seqPergunta = $alternativa->getSeqPergunta();
      $textoAlternativa = $alternativa->getTextoAlternativa();
        
      $query = "INSERT INTO alternativa VALUES (?,?,?,?)";
      $con = ConexaoBD::getConexao();  
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiis", $idQuestionario, $seqPergunta, $seqAlternativa, $textoAlternativa);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      return $stmt->errno.' - '.$stmt->error;
    }
}
